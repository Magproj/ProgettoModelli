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
 * Extensions Database Rowset
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Application
 */
class ApplicationDatabaseRowsetLanguages extends Library\DatabaseRowsetAbstract implements Library\ObjectMultiton
{
    protected $_active;
    protected $_primary;

    public function __construct(Library\ObjectConfig $config )
    {
        parent::__construct($config);

        //TODO : Inject raw data using $config->data
        $languages = $this->getObject('com:languages.model.languages')
            ->enabled(true)
            ->application('site')
            ->getRowset();

        $this->merge($languages);
    }

    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->identity_column = 'id';
        parent::_initialize($config);
    }

    public function setActive($active)
    {
        if(is_numeric($active)) {
            $this->_active = $this->find($active);
        } else {
            $this->_active = $active;
        }

        return $this;
    }

    public function getActive()
    {
        return $this->_active;
    }

    public function getPrimary()
    {
        if(!isset($this->_primary)) {
            $this->_primary = $this->find(array('primary' => 1))->top();
        }

        return $this->_primary;
    }
}