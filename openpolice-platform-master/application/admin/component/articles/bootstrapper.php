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
 * Bootstrapper
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Articles
 */
 class ArticlesBootstrapper extends Library\BootstrapperAbstract
{
    public function bootstrap()
    {
        $manager = $this->getObjectManager();

        $manager->registerAlias('com:articles.model.tags'           , 'com:tags.model.tags');
        $manager->registerAlias('com:articles.model.categories'     , 'com:categories.model.categories');
        $manager->registerAlias('com:articles.controller.attachment', 'com:attachments.controller.attachment');
        $manager->registerAlias('com:articles.view.attachment.file' , 'com:attachments.view.attachment.file');
    }
}