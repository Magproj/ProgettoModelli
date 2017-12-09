<?php
/**
 * Belgian Police Web Platform - Streets Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Streets;
use Nooku\Library;

class ModelDistricts extends Library\ModelTable
{
    public function __construct(Library\ObjectConfig $config)
    {
        parent::__construct($config);

        $this->getState()
            ->insert('province' , 'int');
    }

    protected function _buildQueryWhere(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryWhere($query);
        $state = $this->getState();

        if (is_numeric($state->province)) {
            $query->where('tbl.streets_province_id = :province')->bind(array('province' => $state->province));
        }
    }
}