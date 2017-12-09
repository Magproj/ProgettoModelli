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
 * File Controller
 *
 * @author  Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @package Nooku\Component\Files
 */
class ControllerFile extends ControllerAbstract
{
	public function __construct(Library\ObjectConfig $config)
	{
		parent::__construct($config);

		$this->registerCallback('before.add' , array($this, 'addFile'));
        $this->registerCallback('before.edit', array($this, 'addFile'));
	}
	
    protected function _initialize(Library\ObjectConfig $config)
	{
		$config->append(array(
			'behaviors' => array('com:files.controller.behavior.thumbnailable')
		));

		parent::_initialize($config);
	}

	public function addFile(Library\CommandContext $context)
	{
		$file = $context->request->data->get('file', 'raw');
		$name = $context->request->data->get('name', 'raw');

		if (empty($file) && $context->request->files->has('file.tmp_name'))
		{
			$context->request->data->set('file', $context->request->files->get('file.tmp_name', 'raw'));
			
			if (empty($name)) {
				$context->request->data->set('name', $context->request->files->get('file.name', 'raw'));
			}
		}
	}

    protected function _actionRender(Library\CommandContext $context)
    {
        $model = $this->getModel();

        if($model->getState()->isUnique())
        {
            $file = $this->getModel()->getRow();

            if (!file_exists($file->fullpath)) {
                throw new Library\ControllerExceptionNotFound(\JText::_('File not found'));
            }

            //Set the data in the response
            $context->response
                ->attachTransport('chunked')
                ->setPath('file://'.$file->fullpath, $file->mimetype);
        }
        else parent::_actionRender($context);
    }
}
