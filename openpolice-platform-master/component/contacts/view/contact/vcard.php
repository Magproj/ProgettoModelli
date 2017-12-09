<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Contacts;

use Nooku\Library;

/**
 * Contact Vcard View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Contacts
 */
class ViewContactVcard extends Library\ViewVcard
{
    public function render()
    {
        $contact = $this->getModel()->getRow();
       
        if(!empty($contact->email_to)) {
            $this->setEmail($contact->email_to);
        }

        if(!empty($contact->title)) {
            $this->setFormattedName($contact->title);
        } 

        if(!empty($contact->con_position)) {
            $this->setTitle($contact->con_position);
        }
        
        if(!empty($contact->address) || !empty($contact->suburb) || !empty($contact->state) || !empty($contact->postcode) || !empty($contact->country)) {
            $this->setAddress('', '', $contact->address, $contact->suburb, $contact->state, $contact->postcode, $contact->country, 'WORK;POSTAL;');
        }

        if(!empty($contact->mobile)) {
            $this->setPhoneNumber($contact->telephone, 'WORK;CELL;');
        }

        if(!empty($contact->telephone)) { 
            $this->setPhoneNumber($contact->telephone);
        }

        if(!empty($contact->fax)) {
           $this->setPhoneNumber($contact->fax, 'WORK;FAX;');
        }

        if(!empty($contact->misc)) {
            $this->setNote($contact->misc);
        }

        if(!empty($contact->webpage)) {
            $this->setURL($contact->webpage);
        }

        return parent::render();
    }
}