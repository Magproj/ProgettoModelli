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
 * Settings Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Extensions
 */
class ExtensionsViewSettingsHtml extends Library\ViewHtml
{
    public function render()
    {
        $settings = $this->getModel()->getRowset();
        
        foreach($settings as $setting) 
        {
	    	if($setting->getType() == 'extension' && $setting->getPath()) {
	    	    \JFactory::getLanguage()->load($setting->getName(), JPATH_APPLICATION);
	    	}
        } 
       
        return parent::render();
    }
}