<?php
/**
 * Belgian Police Web Platform - Streets Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Streets;
use Nooku\Library;

class ModelCities extends Library\ModelTable
{
    public function __construct(Library\ObjectConfig $config)
    {
        parent::__construct($config);

        $this->getState()
            ->insert('zone' , 'int')
            ->insert('searchword' , 'string')
            ->insert('sort'             , 'cmd'     , 'title')
            ->insert('direction'        , 'cmd'     , 'ASC');
    }

    protected function _buildQueryColumns(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryColumns($query);

        $query->columns(array(
            'province'  => 'province.title',
            'region'    => 'region.title'
        ));
    }

    protected function _buildQueryJoins(Library\DatabaseQuerySelect $query)
    {
        $languages = $this->getObject('application.languages');
        $language = $languages->getActive()->slug;

        $query->join(array('province' => $language == 'fr' ? 'data.fr-be_streets_provinces' : 'data.streets_provinces'), 'province.streets_province_id = tbl.streets_province_id')
              ->join(array('region' => $language == 'fr' ? 'data.fr-be_streets_regions' : 'data.streets_regions'), 'region.streets_region_id = tbl.streets_region_id');
    }

    protected function _buildQueryWhere(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryWhere($query);
        $state = $this->getState();

        $site = $this->getObject('application')->getSite();

        if ($state->search) {
            $query->where('tbl.title LIKE :search OR tbl.streets_city_id LIKE :search OR tbl.police_zone_id LIKE :search')->bind(array('search' => '%'.$state->search.'%'));
        }

        if ($state->searchword) {
            $query->where('tbl.title LIKE :searchword')->bind(array('searchword' => '%'.$state->searchword.'%'));
        }
    }
}
