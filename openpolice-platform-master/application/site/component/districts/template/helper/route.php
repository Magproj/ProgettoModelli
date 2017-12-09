<?php
/**
 * Belgian Police Web Platform - Districts Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class DistrictsTemplateHelperRoute extends PagesTemplateHelperRoute
{
    public function district($config = array())
    {
        $config   = new Library\ObjectConfig($config);
        $config->append(array(
            'layout'   => null
        ));

        $relation = $config->row;

        $district = $this->getObject('com:districts.model.district')->id($relation->districts_district_id)->getRow();

        $route = array(
            'view'     => 'district',
            'id'       => $district->getSlug(),
            'layout'   => $config->layout,
            'street'   => $relation->streets_street_identifier,
            'number'   => $config->state->number
        );

        return $this->getTemplate()->getView()->getRoute($route);
    }
}