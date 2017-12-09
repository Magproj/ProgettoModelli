<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<div class="scopebar">
    <div class="scopebar__group">
        <a class="<?= is_null($state->published) ? 'active' : ''; ?>" href="<?= route('published=' ) ?>">
            <?= translate('All') ?>
        </a>
    </div>
    <div class="scopebar__group">
        <a class="<?= $state->published === true ? 'active' : ''; ?>" href="<?= route($state->published === true ? 'published=' : 'published=1') ?>">
            <?= translate('Published') ?>
        </a>
        <a class="<?= $state->published === false ? 'active' : ''; ?>" href="<?= route($state->published === false ? 'published=' : 'published=0' ) ?>">
            <?= translate('Unpublished') ?>
        </a>
    </div>
</div>