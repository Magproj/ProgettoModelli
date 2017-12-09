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

class DatabaseRowStreet extends Library\DatabaseRowTable
{
    public function save()
    {
        $result = parent::save();

        if($this->islp) {
            if(is_numeric($this->islp) && !count($this->getObject('com:streets.model.streets_islps')->islp($this->islp)->getRowset()))
            {
                $this->saveIslp();
            } elseif(!is_numeric($this->islp)) {
                $this->saveIslp();
            }
        }

        return $result;
    }

    public function saveIslp()
    {
        $islp = $this->getObject('com:streets.database.row.streets_islps');
        $islp->id    = $this->streets_street_identifier;

        if($islp->load())
        {
            $islp->islp  = $this->islp;
            $islp->save();
        } else {
            $islp->id    = $this->streets_street_identifier;
            $islp->islp  = $this->islp;
            $islp->save();
        }
    }
}