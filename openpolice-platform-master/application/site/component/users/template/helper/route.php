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
 * Route Template Helper
 *
 * @author Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Users
 */
class UsersTemplateHelperRoute extends PagesTemplateHelperRoute
{
	public function session($config = array())
	{
        $config   = new Library\ObjectConfig($config);
        $config->append(array(
           'layout' => null
        ));

        $needles = array(
            array('view' => 'session'),
		);

        $route = array(
            'view'     => 'session',
            'layout'   => $config->layout,
        );

        if($this->getObject('user')->isAuthentic()) {
            $route['id'] = $this->getObject('user')->getSession()->getId();
        }

        if (($page = $this->_findPage($needles))) {
            $route['Itemid'] = $page->id;
        }

		return $this->getTemplate()->getView()->getRoute($route);
	}

    public function user($config = array())
    {
        $config = new Library\ObjectConfig($config);
        $config->append(array(
            'access' => null,
            'layout' => null
        ));

        $route = array(
            'view'   => 'user',
            'layout' => $config->layout,
        );

        $needles = array(
            'extensions_extension_id' => $this->getObject('application.extensions')
                ->getExtension($this->getIdentifier()->package)->id,
            'link'                    => array(
                array('view' => 'user'))
        );

        if (isset($config->access)) {
            $needles['access'] = $config->access;
        }

        if ($page = $this->getObject('application.pages')->find($needles)) {
            $route['Itemid'] = $page->id;
        }

        return $this->getTemplate()->getView()->getRoute($route);
    }
}