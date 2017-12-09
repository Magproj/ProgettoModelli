<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Categories;

use Nooku\Library;

/**
 * Node Database Row
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Categories
 */
class DatabaseRowNode extends Library\DatabaseRowTable
{
    /**
     * Nodes object or identifier
     *
     * @var string|object
     */
    protected $_children = null;

    /**
     * Node object or identifier
     *
     * @var string|object
     */
 	protected $_parent   = null;

    /**
     * Initializes the options for the object
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param   Library\ObjectConfig $object An optional Library\ObjectConfig object with configuration options
     * @return  void
     */
    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'children'  => null,
            'parent'	=> null,
        ));

        parent::_initialize($config);
    }
    
    /**
     * Insert a child row
     *
     * The row will be stored by it's identity_column if set or otherwise by it's object handle.
     *
     * @param  object $node A Library\DatabaseRow object to be inserted
     * @return Library\DatabaseRowsetInterface
     */
	public function insertChild(Library\DatabaseRowInterface $node)
 	{
 		//Track the parent
 		$node->setParent($this);

 		//Insert the row in the rowset
 		$this->getChildren()->insert($node);
 		
 		return $this;
 	}

    /**
     * Check if the node has children
     *
     * @return bool True if the node has one or more children
     */
    public function hasChildren()
	{
        return (boolean) count($this->_children);
	}

	/**
     * Get the children rowset
     *
     * @return	Library\DatabaseRowsetInterface
     */
	public function getChildren()
	{
        if(!($this->_children instanceof Library\DatabaseRowsetInterface))
        {
            $identifier         = clone $this->getIdentifier();
            $identifier->path   = array('database', 'rowset');
            $identifier->name   = Library\StringInflector::pluralize($this->getIdentifier()->name);
            
            //The row default options
            $options  = array(
                'identity_column' => $this->getIdentityColumn()
            );
               
            $this->_children = $this->getObject($identifier, $options);
        }

	    return $this->_children;
	}

	/**
     * Get the parent node
     *
     * @return	Library\DatabaseRowInterface
     */
	public function getParent()
	{
		return $this->_parent;
	}

	/**
     * Set the parent node
     *
     * @param object $node The parent node
     * @return DatabaseRowNode
     */
	public function setParent(Library\DatabaseRowInterface $node )
	{
		$this->_parent = $node;
		return $this;
	}
}