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
 * Extension Controller
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Component\Languages
 */
class LanguagesControllerExtension extends Library\ControllerView
{
    protected function _actionEdit(Library\CommandContext $context)
    {
        if($context->request->data->has('id'))
        {
            $this->getObject('com:languages.model.tables')
                ->extension($context->request->data->get('id', 'int'))
                ->getRowset()
                ->setData(array('enabled' => $context->request->data->get('enabled', 'int')))
                ->save();
        }
    }
}
