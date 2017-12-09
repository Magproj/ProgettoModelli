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
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Contacts
 */
class ContactsTemplateHelperRoute extends PagesTemplateHelperRoute
{
    public function message($config = array())
    {
        $config   = new Library\ObjectConfig($config);
        $config->append(array(
            'layout'   => null,
            'category' => null
        ));

        $contact = $config->row;

        $needles = array(
            array('view' => 'contact' , 'id' => $contact->id),
            array('view' => 'category', 'id' => $contact->category),
        );

        $route = array(
            'view'     => 'message',
            'id'       => $contact->getSlug(),
            'layout'   => $config->layout,
            'category' => $config->category
        );

        if($item = $this->_findPage($needles)) {
            $route['Itemid'] = $item->id;
        };

        return $this->getTemplate()->getView()->getRoute($route);
    }

    public function contact($config = array())
	{
        $config   = new Library\ObjectConfig($config);
        $config->append(array(
            'layout'   => null,
            'category' => null
        ));

        $contact = $config->row;

        $needles = array(
            array('view' => 'contact' , 'id' => $contact->id),
            array('view' => 'category', 'id' => $contact->category),
		);

        $route = array(
            'view'     => 'contact',
            'id'       => $contact->getSlug(),
            'layout'   => $config->layout,
            'category' => $config->category
        );

		if($item = $this->_findPage($needles)) {
			$route['Itemid'] = $item->id;
		};

		return $this->getTemplate()->getView()->getRoute($route);
	}

    public function category($config = array())
    {
        $config   = new Library\ObjectConfig($config);
        $config->append(array(
            'layout' => null
        ));

        $category = $config->row;

        $needles = array(
            array('view' => 'contacts', 'category' => $category->id),
        );

        $route = array(
            'view'     => 'contacts',
            'category' => $category->getSlug(),
            'layout'   => $config->layout
        );

        if($page = $this->_findPage($needles))
        {
            if(isset($page->getLink()->query['layout'])) {
                $route['layout'] = $page->getLink()->query['layout'];
            }

            $route['Itemid'] = $page->id;
        };

        return $this->getTemplate()->getView()->getRoute($route);
    }
}