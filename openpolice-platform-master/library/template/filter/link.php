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
 * Link Template Filter
 *
 * Filter to parse link tags.
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Template
 */
class TemplateFilterLink extends TemplateFilterTag
{
	/**
	 * Parse the text for script tags
	 *
	 * @param string $text  The text to parse
	 * @return string
	 */
	protected function _parseTags(&$text)
	{
		$tags = '';

		$matches = array();
		if(preg_match_all('#<link\ href="([^"]+)"(.*)\/>#iU', $text, $matches))
		{
			foreach(array_unique($matches[1]) as $key => $match)
			{
                //Set required attributes
                $attribs = array(
                    'href' => $match
                );

                $attribs = array_merge($this->parseAttributes( $matches[2][$key]), $attribs);

				$tags .= $this->_renderTag($attribs);
			}

			$text = str_replace($matches[0], '', $text);
		}

		return $tags;
	}

    /**
     * Render the tag
     *
     * @param 	array	$attribs Associative array of attributes
     * @param 	string	$content The tag content
     * @return string
     */
    protected function _renderTag($attribs = array(), $content = null)
	{
		$attribs = $this->buildAttributes($attribs);

		$html = '<link '.$attribs.'/>'."\n";
		return $html;
	}
}