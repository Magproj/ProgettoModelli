<?php
/**
 * Belgian Police Web Platform - Support Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class SupportBootstrapper extends Library\BootstrapperAbstract
{
    /**
     * Bootstrap the component
     *
     * @return void
     */
    public function bootstrap()
    {
        $manager = $this->getObjectManager();

        $manager->registerAlias('com:support.controller.attachment', 'com:attachments.controller.attachment');
    }
}