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
 * Command Context Interface
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Command
 */
interface CommandContextInterface
{
    /**
    * Get the command subject 
    *     
    * @return ObjectInterface The command subject
    */
    public function getSubject();

    /**
     * Set the command subject
     *
     * @param ObjectInterface $subject The command subject
     * @return CommandContextInterface
     */
    public function setSubject(ObjectInterface $subject);
}
