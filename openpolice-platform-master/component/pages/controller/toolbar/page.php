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
 * Pages Controller Toolbar
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Nooku\Component\Pages
 */
class ControllerToolbarPage extends Library\ControllerToolbarActionbar
{
    /**
     * Add default toolbar commands
     * .
     * @param	Library\CommandContext	$context A command context object
     */
    protected function _afterControllerBrowse(Library\CommandContext $context)
    {
        parent::_afterControllerBrowse($context);

        $this->addSeparator();
        $this->addEnable(array('label' => 'publish', 'attribs' => array('data-data' => '{published:1}')));
        $this->addDisable(array('label' => 'unpublish', 'attribs' => array('data-data' => '{published:0}')));
        $this->addSeparator();
        $this->addDefault();
    }

    protected function _commandDefault(Library\ControllerToolbarCommand $command)
    {
        $command->label = \JText::_('Make Default');

        $command->append(array(
            'attribs' => array(
                'data-action' => 'edit',
                'data-data'   => '{home:1}'
            )
        ));
    }

    protected function _commandRestore(Library\ControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs' => array(
                'data-action' => 'edit',
            )
        ));
    }
    
    protected function _commandNew(Library\ControllerToolbarCommand $command)
    {
        $menu = $this->getController()->getModel()->getState()->menu;
        $command->href = 'option=com_pages&view=page&menu='.$menu;
    }
}
