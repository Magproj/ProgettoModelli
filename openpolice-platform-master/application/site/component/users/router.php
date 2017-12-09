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
 * Users Router
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package     Nooku_Server
 * @subpackage  Users
 */

class UsersRouter extends Library\DispatcherRouter
{
    public function build(Library\HttpUrl $url)
    {
        $segments = array();
        $query    = &$url->query;

        if(isset($query['view']))
        {
            if(!empty($query['Itemid']))
            {
                $page = $this->getObject('application.pages')->getPage($query['Itemid'] );
                if(!isset($page->getLink()->query['view']) || $page->getLink()->query['view'] != $query['view']) {
                    $segments[] = $query['view'];
                }
            }
            else $segments[] = $query['view'];

            unset($query['view']);
        }

        return $segments;
    }

    public function parse(Library\HttpUrl $url)
    {
        $vars = array();
        $path = &$url->path;

        $count = count($path);
        if(!empty($count)) {
            $vars['view'] = $path[0];
        }

        if($count > 1) {
            $vars['id'] = $path[$count - 1];
        }

        return $vars;
    }
}


