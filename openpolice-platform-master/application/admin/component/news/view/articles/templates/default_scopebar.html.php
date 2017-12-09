<?
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<div class="scopebar">
    <div class="scopebar__group">
        <a class="<?= is_null($state->search) && is_null($state->published) ? 'active' : ''; ?>" href="<?= route('search=&published=' ) ?>">
            <?= translate('All') ?>
        </a>
    </div>
    <div class="scopebar__group">
    	<a class="<?= $state->published === 1 ? 'active' : ''; ?>" href="<?= route($state->published === 1 ? 'published=' : 'published=1' ) ?>">
    	    <?= translate('Published') ?>
    	</a>
    	<a class="<?= $state->published === 0 ? 'active' : ''; ?>" href="<?= route($state->published === 0 ? 'published=' : 'published=0' ) ?>">
    	    <?= translate('Unpublished') ?>
    	</a>
    </div>
    <div class="scopebar__search">
        <?= helper('grid.search') ?>
    </div>
</div>