<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

/**
 * Category Controller
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Component\Categories
 */
abstract class CategoriesControllerCategory extends Library\ControllerModel
{ 
    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'model' => 'com:categories.model.categories'
        ));

        parent::_initialize($config);
    }
    
    protected function _actionRender(Library\CommandContext $context)
    {
        $view = $this->getView();

        //Set the layout
        if($view instanceof Library\ViewTemplate)
        {
            $layout = clone $view->getIdentifier();
            $layout->name  = $view->getLayout();

            $alias = clone $layout;
            $alias->package = 'categories';

            $this->getObject('manager')->registerAlias($layout, $alias);
        }

        return parent::_actionRender($context);
    }
    
    public function getRequest()
	{
		$request = parent::getRequest();

        $request->query->table     = $this->getIdentifier()->package;
        $request->query->access    = $this->getUser()->isAuthentic();
        $request->query->published = 1;

	    return $request;
	}
}