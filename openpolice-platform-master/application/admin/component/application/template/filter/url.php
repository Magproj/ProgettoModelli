<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2007 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

/**
 * Url Template Filter
 *
 * Filter allows to create url aliases that are replaced on compile and render. A default assets:// alias is
 * added that is rewritten to '<baseurl>/assets/'.
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Template
 */
class ApplicationTemplateFilterUrl extends Library\TemplateFilterUrl
{
    /**
     * Initializes the options for the object
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param   Library\ObjectConfig $config Configuration options
     * @return  void
     */
    protected function _initialize(Library\ObjectConfig $config)
    {
        //Make asset paths absolute
        $base = $this->getObject('request')->getBaseUrl();
        $path = $this->getObject('request')->getBaseUrl()->getPath().'/assets/';

        $config->append(array(
            'priority' => self::PRIORITY_LOW,
            'aliases'  => array('"/assets/' => '"'.$path),
        ));

        parent::_initialize($config);
    }
}
