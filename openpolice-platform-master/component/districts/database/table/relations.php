<?php
/**
 * Belgian Police Web Platform - Districts Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Districts;
use Nooku\Library;

class DatabaseTableRelations extends Library\DatabaseTableAbstract
{
    public function  _initialize(Library\ObjectConfig $config)
    {        
        $config->append(array(
               'behaviors' =>  array(
                   'lockable', 'creatable', 'modifiable',
                   'com:streets.database.behavior.locatable',
               )
           ));
        
           parent::_initialize($config);
     }
}