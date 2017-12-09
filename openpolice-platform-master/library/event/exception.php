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
 * Exception Event
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Event
 */
class EventException extends Event implements Exception
{
    /**
     * Set the exception
     *
     * @param \Exception $exception
     */
    public function setException(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Get the exception
     *
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Return the error message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->exception->getMessage();
    }

    /**
     * Return the error code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->exception->getCode();
    }

    /**
     * Return the source filename
     *
     * @return string
     */
    public function getFile()
    {
        return $this->exception->getFile();
    }

    /**
     * Return the source line number
     *
     * @return integer
     */
    public function getLine()
    {
        return $this->exception->getLine();
    }

    /**
     * Return the backtrace information
     *
     * @return array
     */
    public function getTrace()
    {
        return $this->exception->getTrace();
    }

    /**
     * Return the backtrace as a string
     *
     * @return string
     */
    public function getTraceAsString()
    {
        return $this->exception->getTraceAsString();
    }

    /**
     * Format the error for display
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exception;
    }
}