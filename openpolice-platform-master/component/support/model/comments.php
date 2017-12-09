<?php
/**
 * Belgian Police Web Platform - Support Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Support;

use Nooku\Library;
use Nooku\Component\Comments;

class ModelComments extends Comments\ModelComments
{
    protected function _buildQueryColumns(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryColumns($query);

        $query->columns(array(
            'created_by_name' => 'creator.name'
        ));
    }

    protected function _buildQueryJoins(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryJoins($query);

        $query->join(array('creator' => 'users'), 'creator.users_user_id = tbl.created_by');
    }
}