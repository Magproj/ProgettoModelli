<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Pages;

use Nooku\Library;

/**
 * Menu Controller Toolbar
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Nooku\Component\Pages
 */
class ControllerToolbarMenu extends Library\ControllerToolbarActionbar
{
    protected function _commandNew(Library\ControllerToolbarCommand $command)
    {
        $application = $this->getController()->getModel()->getState()->application;
        $command->href = 'option=com_pages&view=menu&application='.$application;
    }
}
