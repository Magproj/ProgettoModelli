<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class AttachmentsViewAttachmentHtml extends Library\ViewHtml
{
    public function render()
    {
        //Get the attachment
        $attachment = $this->getModel()->getData();

        $container = $this->getObject('com:files.model.container')->slug($attachment->container)->getRow();
        $thumbnail_size = $container->parameters->thumbnail_size;

        if(is_array($thumbnail_size))
        {
            $this->aspect_ratio = $thumbnail_size['x'] / $thumbnail_size['y'];
        } else {
            $this->aspect_ratio = $thumbnail_size ? $thumbnail_size : "4/3";
        }

        return parent::render();
    }
}