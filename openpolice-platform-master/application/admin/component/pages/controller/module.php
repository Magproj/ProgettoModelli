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
 * Module Controller
 *
 * @author  Tom Janssens <http://nooku.assembla.com/profile/tomjanssens>
 * @package Component\Pages
 */
class PagesControllerModule extends Library\ControllerModel
{
    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'editable',
                'com:languages.controller.behavior.translatable'
            )
        ));

        parent::_initialize($config);
    }
}