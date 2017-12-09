<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library, Nooku\Component\Users;

/**
 * Activateable Controller Behavior
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Users
 */
class UsersControllerBehaviorActivatable extends Users\ControllerBehaviorActivatable
{
    protected function _initialize(Library\ObjectConfig $config)
    {
        $parameters = $this->getObject('application.extensions')->users->params;

        $config->append(array(
            'enable' => $parameters->get('useractivation', '1')
        ));

        parent::_initialize($config);
    }

    protected function _afterControllerAdd(Library\CommandContext $context)
    {
        $user = $context->result;

        if ($user->getStatus() == Library\Database::STATUS_CREATED && $user->activation)
        {
            $url = $context->request->getUrl()
                ->toString(Library\HttpUrl::SCHEME | Library\HttpUrl::HOST | Library\HttpUrl::PORT) . $this->_getActivationUrl();

            // TODO Uncomment and fix after Langauge support is re-factored.
            //$subject = JText::_('User Account Activation');
            //$message = sprintf(JText::_('SEND_MSG_ACTIVATE'), $user->name,
            //    $this->getObject('application')->getCfg('sitename'), $url, $site_url);
            $subject = 'User Account Activation';
            $message = $url;

            if ($user->notify(array('subject' => $subject, 'message' => $message))) {
                $context->response->addMessage('Activation E-mail sent');
            } else {
                $context->reponse->addMessage('Failed to send activation E-mail', 'error');
            }
        }
    }

    protected function _getActivationUrl()
    {
        $user = $this->getModel()->getRow();

        $extension = $this->getObject('application.extensions')->getExtension('users');
        $page      = $this->getObject('application.pages')->find(array(
            'extensions_extension_id' => $extension->id,
            'access'                  => 0,
            'link'                    => array(array('view' => 'user'))));

        $url                      = $page->getLink();
        $url->query['activation'] = $user->activation;
        $url->query['uuid']       = $user->uuid;

        $this->getObject('application')->getRouter()->build($url);

        return $url;
    }
}