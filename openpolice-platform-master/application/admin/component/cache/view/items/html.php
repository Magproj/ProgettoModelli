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
 * Items Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Cache
 */
class CacheViewItemsHtml extends Library\ViewHtml
{
	public function render()
	{
        $group = $this->getModel()->getState()->group;
        
	    $this->groups = $this->getObject('com:cache.model.groups')->getRowset();
	    $this->size   = !empty($group) ? $this->groups->find($group)->size : $this->groups->size;
        $this->count  = !empty($group)? $this->groups->find($group)->count : $this->groups->count;
        
		return parent::render();
	}
}