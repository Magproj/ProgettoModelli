<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2007 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Library;

/**
 * Object Config Json
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Object
 */
class ObjectConfigJson extends ObjectConfigFormat
{
    /**
     * Read from a string and create an array
     *
     * @param  string $string
     * @return ObjectConfigJson|false   Returns a ObjectConfig object. False on failure.
     * @throws \RuntimeException
     */
    public static function fromString($string)
    {
        $data = array();

        if(!empty($string))
        {
            $data = json_decode($string, true);

            if($data === null) {
                throw new \RuntimeException('Cannot decode JSON string');
            }
        }

        $config = new static($data);

        return $config;
    }

    /**
     * Write a config object to a string.
     *
     * @param  ObjectConfig $config
     * @return string|false     Returns a JSON encoded string on success. False on failure.
     */
    public function toString()
    {
        $data = $this->toArray();

        return json_encode($data);
    }
}