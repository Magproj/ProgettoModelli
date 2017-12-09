<?php
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Traffic;

use Nooku\Library;

class TemplateHelperListbox extends Library\TemplateHelperListbox
{
    public function categories($config = array())
    {
        $config = new Library\ObjectConfig($config);
        $config->append(array(
            'name'      => 'category',
            'deselect'  => true,
            'selected'  => $config->category,
            'prompt'	=> '- Select -',
            'table'     => '',
            'parent'    => '',
            'max_depth' => 9,
        ));

        if($config->deselect) {
            $options[] = $this->option(array('label' => $this->translate($config->prompt), 'value' => 0));
        }

        $categories = $this->getObject('com:traffic.model.categories')
            ->sort('title')
            ->getRowset();

        foreach($categories as $category)
        {
            $options[] = $this->option(array('label' => $category->title, 'value' => $category->id));
        }

        $config->options = $options;

        return $this->optionlist($config);
    }
}
