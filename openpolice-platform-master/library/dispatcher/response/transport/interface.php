<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2007 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Library;

/**
 * Dispatcher Response Transport Interface
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Dispatcher
 */
interface DispatcherResponseTransportInterface
{
    /**
     * Priority levels
     */
    const PRIORITY_HIGHEST = 1;
    const PRIORITY_HIGH    = 2;
    const PRIORITY_NORMAL  = 3;
    const PRIORITY_LOW     = 4;
    const PRIORITY_LOWEST  = 5;

    /**
     * Send the response
     *
     * @param DispatcherResponseInterface $response
     * @return DispatcherResponseTransportInterface
     */
    public function send(DispatcherResponseInterface $response);

    /**
     * Get the priority of a behavior
     *
     * @return  integer The command priority
     */
    public function getPriority();
}