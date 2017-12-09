<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Application;

use Nooku\Library;

/**
 * Script Template Filter
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Application
 */
class TemplateFilterScript extends Library\TemplateFilterScript
{
    public function render(&$text)
    {
        $scripts = $this->_parseTags($text);
        $text = str_replace('<ktml:script>', $scripts, $text);
    }
}