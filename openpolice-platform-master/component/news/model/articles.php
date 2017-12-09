<?php
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\News;
use Nooku\Library;

class ModelArticles extends Library\ModelTable
{
	public function __construct(Library\ObjectConfig $config)
	{
		parent::__construct($config);

		$this->getState()
		    ->insert('published'        , 'int')
		    ->insert('exclude'          , 'int')
            ->insert('sticky'           , 'boolean' , false)
            ->insert('sort'             , 'cmd'     , 'ordering_date')
            ->insert('direction'        , 'cmd'     , 'DESC');
	}
    
    protected function _buildQueryColumns(Library\DatabaseQuerySelect $query)
	{
		parent::_buildQueryColumns($query);
	
		$query->columns(array(
			'thumbnail'         => 'attachments.path',
            'created_by_name'   => 'creator.name',
            'ordering_date'     => 'IF(tbl.published_on, tbl.published_on, tbl.publish_on)',
            'draft'             => 'IF(tbl.published_on OR tbl.publish_on, 0, 1)'
		));
	}
    
    protected function _buildQueryJoins(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryJoins($query);

        $query->join(array('attachments'  => 'attachments'), 'attachments.attachments_attachment_id = tbl.attachments_attachment_id')
              ->join(array('creator'  => 'users'), 'creator.users_user_id = tbl.created_by');
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

        if($state->sticky === true) {
            $query->where('tbl.sticky = :sticky')->bind(array('sticky' => '1'));
        }

        if ($state->exclude) {
            $query->where('tbl.news_article_id != :news_article_id')->bind(array('news_article_id' => $state->exclude));
        }
	}

    protected function _buildQueryOrder(Library\DatabaseQuerySelect $query)
    {
        $state = $this->getState();

        if ($state->sort == 'ordering_date')
        {
            $query->order('draft', $state->direction)
                    ->order('ordering_date', $state->direction);
        } else {
            $query->order($state->sort, strtoupper($state->direction));
        }
    }
}