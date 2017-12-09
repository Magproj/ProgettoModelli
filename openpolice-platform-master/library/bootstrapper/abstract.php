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
 * Abstract Bootstrapper
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Bootstrapper
 */
abstract class BootstrapperAbstract extends Object implements BootstrapperInterface
{
    /**
     * The bootstrapper priority
     *
     * @var integer
     */
    protected $_priority;

    /**
     * Constructor.
     *
     * @param ObjectConfig $config An optional ObjectConfig object with configuration options
     */
    public function __construct(ObjectConfig $config)
    {
        parent::__construct($config);

        $this->_priority = $config->priority;
    }

    /**
     * Initializes the options for the object
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param  ObjectConfig $config An optional ObjectConfig object with configuration options
     * @return void
     */
    protected function _initialize(ObjectConfig $config)
    {
        $config->append(array(
            'priority' => self::PRIORITY_NORMAL,
        ));

        parent::_initialize($config);
    }

    /**
     * Bootstrap the object manager
     *
     * @return void
     */
    abstract public function bootstrap();

    /**
     * Get the object manager
     *
     * @return ObjectManagerInterface
     */
    public function getObjectManager()
    {
        return $this->getObject('manager');
    }

    /**
     * Get the class loader
     *
     * @return ClassLoaderInterface
     */
    public function getClassLoader()
    {
        return $this->getObject('manager')->getClassLoader();
    }

    /**
     * Get the priority of the bootstrapper
     *
     * @return  integer The priority level
     */
    public function getPriority()
    {
        return $this->_priority;
    }
}