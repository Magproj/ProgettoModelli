<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Pages;

use Nooku\Library;

/**
 * Pages Database Rowset
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Nooku\Component\Pages
 */
class DatabaseRowsetPages extends Library\DatabaseRowsetTable
{
    public function find($needle)
    {
        if(is_array($needle) && array_key_exists('link', $needle) && is_array($needle['link']))
        {
            $query = $needle['link'];
            unset($needle['link']);

            $pages  = parent::find($needle);
            $result = null;

            foreach($pages as $page)
            {
                foreach($query as $parts)
                {
                    $result = $page;
                    foreach($parts as $key => $value)
                    {
                        if(!(isset($page->getLink()->query[$key]) && $page->getLink()->query[$key] == $value))
                        {
                            $result = null;
                            break;
                        }
                    }

                    if(!is_null($result)) {
                        break(2);
                    }
                }
            }
        }
        else $result = parent::find($needle);

        return $result;
    }
}
