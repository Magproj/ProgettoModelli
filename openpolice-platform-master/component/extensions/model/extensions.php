<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Extensions;

use Nooku\Library;

/**
 * Extensions Model
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Extensions
 */
class ModelExtensions extends Library\ModelTable
{
	public function __construct(Library\ObjectConfig $config)
	{
		parent::__construct($config);
	
		$this->getState()
		 	->insert('enabled', 'boolean')
		 	->insert('name', 'cmd')
            ->insert('sort', 'tbl.name');
	}
	
	protected function _buildQueryWhere(Library\DatabaseQuerySelect $query)
	{
	    parent::_buildQueryWhere($query);

		$state = $this->getState();
	
		if($state->search) {
			$query->where('tbl.name LIKE :search')->bind(array('search' => '%'.$state->search.'%'));
		}
		
		if($state->name) {
			$query->where('tbl.name = :name')->bind(array('name' => $state->name));
		}

		if(is_bool($state->enabled)) {
			$query->where('tbl.enabled = :enabled')->bind(array('enabled' => (int) $state->enabled));
		}
	}
}