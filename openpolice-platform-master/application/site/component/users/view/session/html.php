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
 * Session Html View
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Component\Users
 */
class UsersViewSessionHtml extends Library\ViewHtml
{
    public function render()
    {
        $title = JText::_('Login');
        $this->getObject('application')->getPathway()->addItem($title);

        $this->user       = $this->getObject('user');;
        $this->parameters = $this->getParameters();

        return parent::render();
    }
    
    public function getParameters()
    {
        $active = $this->getObject('application.pages')->getActive();
        $parameters = new JParameter($active->params);

        $parameters->def('description_login_text', 'LOGIN_DESCRIPTION');
        $parameters->def('registration', $this->getObject('application.extensions')->users->params->get('allowUserRegistration'));

        return $parameters;
    }
}