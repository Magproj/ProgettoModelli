<?php
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\News;
use Nooku\Library;

class DatabaseTableArticles extends Library\DatabaseTableAbstract
{
    public function  _initialize(Library\ObjectConfig $config)
    {        
        $config->append(array(
            'name'         => 'news',
            'behaviors'    =>  array(
                'sluggable', 'creatable', 'modifiable', 'lockable',
                'stickable', 'publishable',
                'com:attachments.database.behavior.attachable',
                'com:languages.database.behavior.translatable',
            ),
          	'filters' => array(
          	    'introtext'   => array('html', 'tidy'),
          	    'fulltext'    => array('html', 'tidy'),
                'params'      => 'json'
          	)
        ));
     
        parent::_initialize($config);
     }
}