<?php
/**
 * Belgian Police Web Platform - Questions Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

class QuestionsControllerQuestion extends Library\ControllerModel
{
    public function getRequest()
    {
        $request = parent::getRequest();

        // Only return published items.
        $request->query->published          = 1;
        $request->query->published_category = 1;

        return $request;
    }
}
