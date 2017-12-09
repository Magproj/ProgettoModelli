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
 * Module Login Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Users
 */
class UsersModuleLoginHtml extends PagesModuleDefaultHtml
{
    protected function _initialize(Library\ObjectConfig $config)
    { 
        $config->append(array(
            'layout' => $this->getObject('user')->isAuthentic() ? 'logout' : 'login'
        ));
        
        parent::_initialize($config);
    }
    
    public function render()
    { 
        $this->name          = $this->module->params->get('name');
        $this->usesecure     = $this->module->params->get('usesecure');
        $this->show_title    = $this->module->params->get('show_title', false);
        $this->allow_registration = $this->getObject('application.extensions')->users->params->get('allowUserRegistration');

        return parent::render();
    }
} 