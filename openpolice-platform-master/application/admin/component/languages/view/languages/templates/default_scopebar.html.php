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
        <a href="<?= route('enabled=') ?>" class="<?= is_null($state->enabled) ? 'active' : '' ?>">
            <?= translate('All') ?>
        </a>
    </div>
    <div class="scopebar__group">
        <a href="<?= route('enabled=1') ?>" class="<?= $state->enabled === true ? 'active' : '' ?>">
            <?= translate('Enabled') ?>
        </a>
        <a href="<?= route('enabled=0') ?>" class="<?= $state->enabled === false ? 'active' : '' ?>">
            <?= translate('Disabled') ?>
        </a>
    </div>
    <div class="scopebar__search">
        <?= helper('grid.search') ?>
    </div>
</div>