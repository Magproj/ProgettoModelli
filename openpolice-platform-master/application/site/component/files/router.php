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
 * Router
 *
 * @author   Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @package Component\Files
 */
class FilesRouter extends Library\DispatcherRouter
{
	public function build(Library\HttpUrl $url)
	{
        $segments = array();
        $query    = &$url->query;

		if (isset($query['Itemid'])) {
			$page = $this->getObject('application.pages')->getPage($query['Itemid']);
		} else {
			$page = $this->getObject('application.pages')->getActive();
		}

		$menu_query = $page->getLink()->query;

		if (isset($query['view']) && $query['view'] === 'file') {
			$segments[] = 'file';
		}
		
		if (isset($query['layout']) && isset($menu_query['layout']) && $query['layout'] === $menu_query['layout']) {
			unset($query['layout']);
		}
		
		if (isset($query['folder']))
		{
			if (empty($menu_query['folder'])) {
				$segments[] = str_replace('%2F', '/', $query['folder']);
			}
			else if ($query['folder'] == $menu_query['folder']) { 
				// do nothing
			}
			else if (strpos($query['folder'], $menu_query['folder']) === 0) {
				$segments[] = str_replace($menu_query['folder'].'/', '', $query['folder']);
			}
		}

		if (isset($query['name']))
		{
			$segments[] = $query['name'];
		}

		unset($query['view']);
		unset($query['folder']);
		unset($query['name']);

		return $segments;
	}

    public function parse(Library\HttpUrl $url)
    {
        $vars = array();
        $path = &$url->path;

		$page  = $this->getObject('application.pages')->getActive();
		$query = $page->getLink()->query;
		
		if ($path[0] === 'file')
		{ // file view
			$vars['view']    = array_shift($path);
			$vars['name']    = array_pop($path).'.'.$url->getFormat();
			$vars['folder']  = $query['folder'] ? $query['folder'].'/' : '';
			$vars['folder'] .= implode('/', $path);
		}
		else
		{ // directory view
			$vars['view']   = 'directory';
			$vars['layout'] = $query['layout'];
			$vars['folder'] = $query['folder'].'/'.implode('/', $path);
		}

		$vars['folder'] = str_replace('%2E', '.', $vars['folder']);
		$vars['layout'] = $query['layout'];

		return $vars;
    }
}