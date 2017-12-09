<?php
/**
 * Belgian Police Web Platform - Police Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class StreetsControllerMunicipality extends Library\ControllerModel
{
    public function getRequest()
    {
        $request = parent::getRequest();

        $request->query->sort = 'title';

        return $request;
    }

    public function _actionBrowse(Library\CommandContext $context)
    {
        $municipalities = parent::_actionBrowse($context);

        $query = $this->getObject("request")->query;

        // Redirect the user if the request doesn't include layout=form
        if ($context->request->getFormat() == 'html' && (count($municipalities) == '1' || is_numeric($query->search)))
        {
            $municipality = $municipalities->top();

            if ($municipality->police_zone_id) {
                $url    = $this->getObject('application')->getRequest()->getUrl();
                $host   = $url->getHost();

                $this->getObject('component')->redirect('http://'.$host.'/'.$municipality->police_zone_id.'/');

                return true;
            }
        }

        return $municipalities;
    }
}