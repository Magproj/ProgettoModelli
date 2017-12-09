<?php
/**
 * Belgian Police Web Platform - Support Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<div class="scopebar">
    <div class="scopebar__group">
        <a class="<?= is_null($state->search) && is_null($state->created_by) && is_null($state->status) ? 'active' : ''; ?>" href="<?= route('search=&created_by=&status' ) ?>">
            <?= translate('All') ?>
        </a>
    </div>
    <div class="scopebar__group">
        <a class="<?= is_numeric($state->created_by) ? 'active' : ''; ?>" href="<?= route(is_numeric($state->created_by) ? 'created_by=' : 'created_by='.$user) ?>">
            <?= translate('Created by me') ?>
        </a>
    </div>
    <div class="scopebar__group">
        <? foreach($statuses as $status) : ?>
            <a class="<?= $state->status == $status ? 'active' : ''; ?>" href="<?= route('status='.$status) ?>">
                <?= translate($status) ?>
            </a>
        <? endforeach ?>
    </div>
    <div class="scopebar__search">
        <?= helper('grid.search') ?>
    </div>
</div>