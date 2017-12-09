<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;
use Nooku\Component\Users;

/**
 * Resettable Controller Behavior
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Users
 */
class UsersControllerBehaviorResettable extends Users\ControllerBehaviorResettable
{
    protected function _beforeControllerAdd(Library\CommandContext $context)
    {
        // Force a password reset.
        if (!$context->request->data->get('password', 'string')) {
            $context->request->data->password_reset = true;
        }
    }

    protected function _afterControllerAdd(Library\CommandContext $context)
    {
        $user = $context->result;
        if ($context->request->data->get('password_reset', 'boolean') && $user->getStatus() !== Library\Database::STATUS_FAILED)
        {
            if (!$this->token($context)) {
                $context->response->addMessage('Failed to deliver the password reset token', 'error');
            }
        }
    }

    protected function _afterControllerEdit(Library\CommandContext $context)
    {
        return $this->_afterControllerAdd($context);
    }
}