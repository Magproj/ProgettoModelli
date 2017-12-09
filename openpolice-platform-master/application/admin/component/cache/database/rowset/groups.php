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
 * Groups Database Rowset
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Cache
 */
 
class CacheDatabaseRowsetGroups extends Library\DatabaseRowsetAbstract
{	
    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'identity_column'   => 'name'
        ));

        parent::_initialize($config);
    }
    
	/**
	 * Get a value by key
	 *
	 * @param   string  The key name.
	 * @return  string  The corresponding value.
	 */
	public function __get($column)
	{
	    $result = null;
	    
	    if($column == 'count') 
		{
            $result = 0;
		    foreach($this as $row) {
		        $result += $row->count;
            }
        }

	    if($column == 'size' && empty($this->_data['size'])) 
		{
		    $result = 0;
		    foreach($this as $row) {
		        $result += $row->size;
            }
        }
	   
		return $result;
	}
}