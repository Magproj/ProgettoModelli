<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Attachments;

use Nooku\Library;

/**
 * Attachments Database Table
 *
 * @author  Steven Rombauts <https://nooku.assembla.com/profile/stevenrombauts>
 * @package Nooku\Component\Attachments
 */
class DatabaseTableAttachments extends Library\DatabaseTableAbstract
{
	protected function _initialize(Library\ObjectConfig $config)
    {
    	$config->append(array(
    		'name'      => 'attachments',
    		'behaviors' => array('creatable', 'modifiable', 'lockable'),
    	    'filters'   => array(
                'description' => array('html', 'tidy')
            )
    	));
    	
		parent::_initialize($config);
    }
}