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
 * Html View
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Application
 */
class ViewHtml extends Library\ViewHtml
{
    public function __construct(Library\ObjectConfig $config)
    {
        parent::__construct($config);

        $path  = $this->getObject('request')->getBaseUrl()->getPath();
        $path .= '/theme/'.$this->getObject('application')->getTheme().'/';

        $this->getTemplate()->getFilter('url')->addAlias('/assets/application/', $path);
    }

    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'auto_assign'      => false,
            'template_filters' => array('script', 'style', 'link', 'meta', 'title'),
        ));

        parent::_initialize($config);
    }

    public function render()
    {
        //Get the active language
        $languages  = $this->getObject('application.languages');
        $active     = $languages->getActive()->iso_code;

        //Set the language information
        $this->language  = $active ? $active : 'en-GB';
        $this->direction = \JFactory::getLanguage()->isRTL() ? 'rtl' : 'ltr';

        // Set the site information
        $this->site  = $this->getObject('application')->getSite();

        return parent::render();
    }
}