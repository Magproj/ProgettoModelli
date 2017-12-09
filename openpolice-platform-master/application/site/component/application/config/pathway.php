<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

/**
 * Pathway Config
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Component\Application
 */
class ApplicationConfigPathway extends Library\ObjectConfig
{
    /**
     * Add item to pathway
     *
     * @param $name
     * @param null $link
     * @return ApplicationConfigPathway
     */
    public function addItem($name, $link = null)
    {
        $item = new \stdClass();
        $item->name = html_entity_decode($name, ENT_COMPAT, 'UTF-8');
        $item->link = $link;

        $this->_data['items'][] = $item;

        return $this;
    }
}