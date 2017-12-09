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
 * Object Registry Interface
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Object
 */
interface ObjectRegistryInterface
{
    /**
     * Get a an object from the registry
     *
     * @param  ObjectIdentifier $identifier
     * @return  ObjectInterface   The object
     */
    public function get(ObjectIdentifier $identifier);

    /**
     * Set an object in the registry
     *
     * @param  ObjectIdentifier $identifier
     * @param  mxixed           $data
     * @return ObjectRegistryInterface
     */
    public function set(ObjectIdentifier $identifier, $data = null);

    /**
     * Check if an object exists in the registry
     *
     * @param  ObjectIdentifier $identifier
     * @return  boolean
     */
    public function has(ObjectIdentifier $identifier);

    /**
     * Remove an object from the registry
     *
     * @param  ObjectIdentifier $identifier
     * @return  ObjectRegistryInterface
     */
    public function remove(ObjectIdentifier $identifier);

    /**
     * Clears out all objects from the registry
     *
     * @return  ObjectRegistryInterface
     */
    public function clear();

    /**
     * Register an alias for an identifier
     *
     * @param mixed $alias      The alias
     * @param ObjectIdentifier  $identifier
     * @return ObjectRegistry
     */
    public function alias($alias, ObjectIdentifier $identifier);

    /**
     * Get a list of all the identifier aliases
     *
     * @return array
     */
    public function getAliases();

    /**
     * Get a list of all identifiers in the registry
     *
     * @return  array  An array of objects
     */
    public function getIdentifiers();
}