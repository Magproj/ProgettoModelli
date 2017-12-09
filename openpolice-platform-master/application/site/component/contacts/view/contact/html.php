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
 * Contact Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Contacts
 */
class ContactsViewContactHtml extends Library\ViewHtml
{
    public function render()
    {
        //Get the parameters
        $params = $this->getObject('application')->getParams();
        
        //Get the contact
        $contact = $this->getModel()->getData();

        //Get the category
        $category = $this->getCategory();

        //Get the parameters of the active menu item
        $page = $this->getObject('application.pages')->getActive();

        //Set the breadcrumbs
        $pathway = $this->getObject('application')->getPathway();

        if($page->getLink()->query['view'] == 'categories' )
        {
            $pathway->addItem($category->title, $this->getTemplate()->getHelper('route')->category(array('row' => $category)));
            $pathway->addItem($contact->title, '');
        }

        if($page->getLink()->query['view'] == 'contacts' ) {
            $pathway->addItem($contact->title, '');
        }

        //Get the top attachment (thumbnail)
        if($contact->isAttachable()) {
            $attachment = $contact->getAttachments()->top();

            if(isset($attachment) && $attachment->file->isImage()) {
                $this->thumbnail = $attachment->thumbnail;
            }
        }

        // Get the street
        if($contact->isLocatable() && $streets = $contact->getStreets())
        {
            if(count($streets) > 1)
            {
                $languages = $this->getObject('application.languages');
                $language = $languages->getActive()->slug;

                // Temporary fix since streets are not available in all languages
                if(count($streets->find(array('iso' => $language))) == 1)
                {
                    $streets = $streets->find(array('iso' => $language));
                }
            }

            $contact['street'] = $streets->top()->title_short;
            $contact['city'] = $streets->top()->city;
        }

        $this->params   = $params;
        $this->category = $category;

        return parent::render();
    }

    public function getCategory()
    {
        //Get the category
        $category = $this->getObject('com:contacts.model.categories')
                         ->id($this->getModel()->getState()->category)
                         ->getRow();

        return $category;
    }
}