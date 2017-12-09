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
 * Listbox Template Helper
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Cache
 */
class CacheTemplateHelperListbox extends Library\TemplateHelperListbox
{
	public function groups( $config = array())
	{	
	    $config = new Library\ObjectConfig($config);
		$config->append(array(
			'model'	=> 'groups',
			'name' 	=> 'group',
			'value'	=> 'name',
			'label'	=> 'name'
		));
	
		return parent::_listbox($config);
	}
}