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
 * Users Html View
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Component\Users
 */
class UsersViewUsersHtml extends Library\ViewHtml
{
	public function render()
	{
	    $this->groups       = $this->getObject('com:users.model.groups')->getRowset();
		$this->roles        = $this->getObject('com:users.model.roles')->getRowset();
		$this->groups_users = $this->getObject('com:users.model.groups_users')->getRowset();

		return parent::render();
	}
}