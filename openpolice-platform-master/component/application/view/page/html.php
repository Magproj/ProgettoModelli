<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Application;

use Nooku\Library;

/**
 * Html Page View
 *
 * @author      Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Application
 */
class ViewPageHtml extends ViewHtml
{
    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'template_filters' => array('expire','module'),
        ));

        parent::_initialize($config);
    }

    public function render()
    {
        // Build the sorted message list
        $this->messages = $this->getObject('response')->getMessages();

        //Set the component, layout and view information
        $this->extension = $this->getObject('component')->getIdentifier()->package;
        $this->layout    = $this->getObject('component')->getController()->getView()->getLayout();
        $this->view      = $this->getObject('component')->getController()->getView()->getName();

        return parent::render();
    }
}