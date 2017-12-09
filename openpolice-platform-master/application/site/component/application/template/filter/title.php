<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;
use Nooku\Component\Application;

/**
 * Title Template Filter
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Application
 */
class ApplicationTemplateFilterTitle extends Application\TemplateFilterTitle
{
    public function render(&$text)
    {
        $title = $this->_parseTags($text);

        //Get the parameters of the active menu item
        $page   = $this->getObject('application.pages')->getActive();
        $params = new JParameter($page->params);

        if($params->get('page_title')) {
            $title = $this->_renderTag(array(), $params->get('page_title'));
        }

        $text = str_replace('<ktml:title>', $title, $text);
    }
}