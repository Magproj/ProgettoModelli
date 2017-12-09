<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Pages;

use Nooku\Library;

/**
 * Abstract Orderable Database Behavior
 *
 * @author  Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @package Nooku\Component\Pages
 */
class DatabaseBehaviorOrderableAbstract extends Library\DatabaseBehaviorAbstract implements DatabaseBehaviorOrderableInterface
{
    public function getMixableMethods(Library\ObjectMixable $mixer = null)
    {
        $methods = parent::getMixableMethods($mixer);
        unset($methods['is'.ucfirst($this->getIdentifier()->name)]);
        
        return $methods;
    }
}