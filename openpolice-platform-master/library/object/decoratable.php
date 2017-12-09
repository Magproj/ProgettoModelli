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
 * Object Decoratable Interface
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Object
 */
interface ObjectDecoratable
{
    /**
     * Decorate the object
     *
     * When using decorate(), the object will be decorated by the decorator. The decorator needs to extend from
     * ObjectDecorator.
     *
     * @param   mixed $identifier An ObjectIdentifier, identifier string or object implementing ObjectDecorator
     * @param    array $config  An optional associative array of configuration options
     * @return   ObjectDecorator
     * @throws   ObjectExceptionInvalidIdentifier If the identifier is not valid
     * @throws  \UnexpectedValueException If the decorator does not extend from ObjectDecorator
     */
    public function decorate($decorator, $config = array());
}