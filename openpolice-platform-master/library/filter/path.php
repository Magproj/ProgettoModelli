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
 * Path Filter
 *
 * Filters Windows and Unix style file paths
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Filter
 */
class FilterPath extends FilterAbstract implements FilterTraversable
{
	const PATTERN = '#^(?:[a-z]:/|~*/)[a-z0-9_\.-\s/~]*$#i';

    /**
     * Validate a value
     *
     * @param   scalar  $value Value to be validated
     * @return  bool    True when the variable is valid
     */
    public function validate($value)
    {
        $value = trim(str_replace('\\', '/', $value));
        return (is_string($value) && (preg_match(self::PATTERN, $value)) == 1);
    }

    /**
     * Sanitize a value
     *
     * @param   scalar  $value Value to be sanitized
     * @return  string
     */
    public function sanitize($value)
    {
        $value = trim(str_replace('\\', '/', $value));
        preg_match(self::PATTERN, $value, $matches);
        $match = isset($matches[0]) ? $matches[0] : '';

        return $match;
    }
}