<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Files;

use Nooku\Library;

/**
 * Json View
 *
 * @author  Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @package Nooku\Component\Files
 */
class ViewJson extends Library\ViewJson
{
    protected function _getRow()
    {
        $row  = $this->getModel()->getRow();
        $data = parent::_getRow();

        $status = $row->getStatus() !== Library\Database::STATUS_FAILED;
		$data['status'] = $status;
        if ($data === false){
            $data['error'] = $row->getStatusMessage();
        }

        return $data;
    }
}
