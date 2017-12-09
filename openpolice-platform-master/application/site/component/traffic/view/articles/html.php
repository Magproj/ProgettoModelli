<?php
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class TrafficViewArticlesHtml extends Library\ViewHtml
{
    public function render()
    {
        //Get the parameters
        $this->params = $this->getObject('application')->getParams();

        //Set the pathway
        if($this->getModel()->getState()->category) {
            $category = $this->getCategory();
            $this->category = $category;
        }

        $this->url  = $this->getObject('application')->getRequest()->getUrl()->toString(Library\HttpUrl::HOST);
        $this->zone = $this->getObject('com:police.model.zones')->id($this->getObject('application')->getSite())->getRow();

        return parent::render();
    }

    public function getCategory()
    {
        //Get the category
        $category = $this->getObject('com:traffic.model.categories')
            ->id($this->getModel()->getState()->category)
            ->getRow();

        return $category;
    }
}