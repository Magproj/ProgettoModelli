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

/**
 * Locatable Database Behavior
 */
class DatabaseBehaviorLocatable extends Library\DatabaseBehaviorAbstract
{
    /**
     * Get a list of streets
     *
     * @return DatabaseRowsetStreets
     */
    public function getStreets()
    {
        // $this->getTable()->getName()
        $model = $this->getObject('com:streets.model.streets');

        if(!$this->isNew())
        {
            $languages = $this->getObject('application.languages');

            $streets = $model->row($this->id)
                ->table($this->getTable()->getBase())
                ->iso($languages->getActive()->slug)
                ->getRowset();

            if (count($streets))
            {
                return $streets;
            }
        }

        return false;
    }
}