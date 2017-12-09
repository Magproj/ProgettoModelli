<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;
use Nooku\Component\Pages;

/**
 * Default Module Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Pages
 */
class PagesModuleDefaultHtml extends Pages\ModuleDefaultHtml
{
    /**
     * Renders and echo's the views output
     *
     * @return PagesModuleDefaultHtml
     */
    public function render()
    {
        JFactory::getLanguage()->load($this->getIdentifier()->package, $this->module->name);
        return parent::render();
    }
}