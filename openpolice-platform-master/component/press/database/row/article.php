<?php
/**
 * Belgian Police Web Platform - Press Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Press;
use Nooku\Library;

class DatabaseRowArticle extends Library\DatabaseRowTable
{
    public function save()
    {
        // If created_on is modified then convert it to GMT/UTC
        if ($this->isModified('created_on') && !$this->isNew())
        {
            $this->created_on = gmdate('Y-m-d H:i:s', strtotime($this->created_on));
        }
        
        $result   = parent::save();

        return $result;
    }
}