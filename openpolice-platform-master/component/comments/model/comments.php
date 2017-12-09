<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Comments;

use Nooku\Library;

/**
 * Comments Model
 *
 * @author  Steven Rombauts <https://nooku.assembla.com/profile/stevenrombauts>
 * @package Nooku\Component\Comments
 */
class ModelComments extends Library\ModelTable
{
	public function __construct(Library\ObjectConfig $config)
	{
		parent::__construct($config);

        $this->getState()
			->insert('table', 'cmd')
			->insert('row', 'int');
	}
	
	protected function _buildQueryWhere(Library\DatabaseQuerySelect $query)
	{
		parent::_buildQueryWhere($query);
		
		if(!$this->getState()->isUnique())
        {
			if($this->getState()->table) {
				$query->where('tbl.table = :table')->bind(array('table' => $this->getState()->table));
			}

			if($this->getState()->row) {
				$query->where('tbl.row = :row')->bind(array('row' => $this->getState()->row));
			}
		}
	}
}