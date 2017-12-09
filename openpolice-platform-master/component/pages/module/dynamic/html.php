<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Pages;

use Nooku\Library;

/**
 * Dynamic Module Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Pages
 */
class ModuleDynamicHtml extends ModuleDefaultHtml implements Library\ObjectMultiton
{
    public function render()
    {
        //Dynamically attach the chrome filter
        if(!empty($this->module->chrome))
        {
            $this->getTemplate()->attachFilter('com:pages.template.filter.chrome', array(
                'module' => $this->getIdentifier(),
                'styles' => $this->module->chrome
            ));
        }

        $this->_content = $this->getTemplate()
            ->loadString($this->_content, $this->_data)
            ->render();

        return $this->_content;
    }
}