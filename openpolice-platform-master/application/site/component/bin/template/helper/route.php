<?php
/**
 * Belgian Police Web Platform - Bin Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class BinTemplateHelperRoute extends PagesTemplateHelperRoute
{
    public function district($config = array())
    {
        $config   = new Library\ObjectConfig($config);
        $config->append(array(
            'layout'   => null
        ));

        $relation = $config->row;

        $district = $this->getObject('com:bin.model.district')->id($relation->bin_district_id)->getRow();

        $route = array(
            'view'     => 'district',
            'id'       => $district->getSlug(),
            'layout'   => $config->layout
        );

        return $this->getTemplate()->getView()->getRoute($route);
    }
}