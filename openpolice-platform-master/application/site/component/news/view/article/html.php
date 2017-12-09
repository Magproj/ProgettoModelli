<?php
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class NewsViewArticleHtml extends Library\ViewHtml
{
    public function render()
    {
        //Get the article
        $article = $this->getModel()->getData();

        //Set the pathway
        $this->getObject('application')->getPathway()->addItem($article->title, '');

        $this->url  = $this->getObject('application')->getRequest()->getUrl()->toString(Library\HttpUrl::HOST);
        $this->zone = $this->getObject('com:police.model.zone')->id($this->getObject('application')->getSite())->getRow();

        //Get the attachments
        if ($article->id && $article->isAttachable()) {
            $this->attachments($article->getAttachments());
        }

        $published_on = new DateTime($article->published_on);
        $article->published_on_utc = $published_on->format('c');

        return parent::render();
    }
}