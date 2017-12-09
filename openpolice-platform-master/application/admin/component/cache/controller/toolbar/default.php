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
 * Default Controller Toolbar
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Cache
 */
class CacheControllerToolbarDefault extends Library\ControllerToolbarActionbar
{
    public function getCommands()
    {
        $this->addPurge();
		     
        return parent::getCommands();
    }
     
    protected function _commandPurge(Library\ControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs' => array(
                'data-novalidate' =>'novalidate',
                'data-action'     => 'purge'
            )
        ));
    }
}