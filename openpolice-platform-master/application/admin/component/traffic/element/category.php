<?php
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class JElementCategory extends JElement
{
    var $_name = 'category';

    public function fetchElement($name, $value, &$node, $control_name)
    {
        $config = array(
            'name'     => $control_name . '[' . $name . ']',
            'selected' => $value,
            'attribs'  => array('class' => 'inputbox'),
        );

        $template = Library\ObjectManager::getInstance()->getObject('com:pages.view.page')->getTemplate();
        $html = Library\ObjectManager::getInstance()->getObject('com:traffic.template.helper.listbox',  array('template' => $template))->categories($config);
        return $html;
    }
}