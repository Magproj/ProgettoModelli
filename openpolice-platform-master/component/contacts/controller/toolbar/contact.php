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
 * Contact Controller Toolbar
 *
 * @author  Isreal Canasa <http://nooku.assembla.com/profile/israelcanasa>
 * @package Nooku\Component\Contacts
 */
class ControllerToolbarContact extends Library\ControllerToolbarActionbar
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
    }  
}