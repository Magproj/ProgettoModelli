<?php
/**
 * Belgian Police Web Platform - About Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\About;
use Nooku\Library;

class ModelArticles extends Library\ModelTable
{
    public function __construct(Library\ObjectConfig $config)
    {
        parent::__construct($config);

        $this->getState()
            ->insert('published', 'int')
            ->insert('category' , 'string')
            ->insert('sort'     , 'cmd', 'ordering');
    }

    protected function _buildQueryColumns(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryColumns($query);

        $query->columns(array(
            'thumbnail'         => 'attachments.path'
        ));
    }

    protected function _buildQueryJoins(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryJoins($query);

        $query->join(array('categories'  => 'about_categories'), 'categories.about_category_id = tbl.about_category_id')
              ->join(array('attachments'  => 'attachments'), 'attachments.attachments_attachment_id = tbl.attachments_attachment_id');
    }

    protected function _buildQueryWhere(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryWhere($query);
        $state = $this->getState();

        if ($state->search) {
            $query->where('tbl.title LIKE :search')->bind(array('search' => '%'.$state->search.'%'));
        }

        if (is_numeric($state->published)) {
            $query->where('tbl.published = :published')->bind(array('published' => $state->published));
        }

        if(!is_numeric($state->category) && !is_null($state->category)) {
            $query->where('categories.slug = :category')->bind(array('category' => $state->category));
        }

        if (is_numeric($state->category)) {
            $query->where('tbl.about_category_id = :category')->bind(array('category' => $state->category));
        }
    }
}