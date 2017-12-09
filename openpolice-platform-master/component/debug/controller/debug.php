<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Debug;

use Nooku\Library;

/**
 * Debug Controller
 *
 * @author  Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @package Nooku\Component\Debug
 */
class ControllerDebug extends Library\ControllerView
{
    protected function _initialize(Library\ObjectConfig $config)
    {
        parent::_initialize($config);

        //Don't dispatch event or allow callbacks
        $config->dispatch_events  = false;
        $config->enable_callbacks = false;
    }
}