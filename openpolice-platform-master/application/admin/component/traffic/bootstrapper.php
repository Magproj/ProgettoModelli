<?php
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class TrafficBootstrapper extends Library\BootstrapperAbstract
{
    public function bootstrap()
    {
        $manager = $this->getObjectManager();

        $manager->registerAlias('com:traffic.view.attachment.file', 'com:attachments.view.attachment.file');
        $manager->registerAlias('com:traffic.controller.attachment', 'com:articles.controller.attachment');
    }
}