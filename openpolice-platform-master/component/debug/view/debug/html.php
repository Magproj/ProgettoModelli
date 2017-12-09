<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Debug;

use Nooku\Library;

/**
 * Debug Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Debug
 */
class ViewDebugHtml extends Library\ViewHtml
{
    public function render()
    {
        $database = $this->getObject('com:debug.event.subscriber.database');
        $profiler = $this->getObject('com:debug.event.profiler');
        $language = \JFactory::getLanguage();

        //Remove the template includes
        $includes = get_included_files();

        foreach($includes as $key => $value)
        {
            //Find the real file path
            if($alias = Library\ClassLoader::getInstance()->getAlias($value)) {
                $includes[$key] = $alias;
            };
        }

	    $this->memory    = $profiler->getMemory();
	    $this->events    = (array) $profiler->getEvents();
	    $this->queries   = (array) $database->getQueries();
	    $this->languages = (array) $language->getPaths();
	    $this->includes  = (array) $includes;
	    $this->strings   = (array) $language->getOrphans();
                        
        return parent::render();
    }
}