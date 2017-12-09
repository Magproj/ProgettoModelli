<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Files;

use Nooku\Library;

/**
 * File Validator Command
 *
 * @author  Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @package Nooku\Component\Files
 */
class CommandValidatorNode extends Library\Command
{
	protected function _databaseBeforeSave(Library\CommandContext $context)
	{
		$row = $context->getSubject();

		if (!$row->isNew() && !$row->overwrite)
        {
			$row->setStatusMessage(\JText::_('Resource already exists and overwrite switch is not present.'));
			return false;
		}

		return true;
	}

	protected function _databaseBeforeCopy(Library\CommandContext $context)
	{
		$row = $context->getSubject();

		if (!array_intersect(array('destination_folder', 'destination_name'), $row->getModified()))
        {
            $row->setStatusMessage(\JText::_('Please supply a destination.'));
			return false;
		}

		if ($row->fullpath === $row->destination_fullpath)
        {
            $row->setStatusMessage(JText::_('Source and destination are the same.'));
			return false;
		}

		$dest_adapter = $row->getContainer()->getAdapter($row->getIdentifier()->name, array(
			'path' => $row->destination_fullpath
		));

		$exists = $dest_adapter->exists();

		if ($exists)
		{
			if (!$row->overwrite)
            {
                $row->setStatusMessage(\JText::_('Destination resource already exists.'));
				return false;
			}
            else $row->overwritten = true;
		}

		return true;
	}

	protected function _databaseBeforeMove(Library\CommandContext $context)
	{
		return $this->_databaseBeforeCopy($context);
	}
}