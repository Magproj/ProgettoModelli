<?
/**
 * Belgian Police Web Platform - Streets Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<ul class="navigation">
    <li>
        <a class="<?= $state->province == null ? 'active' : ''; ?>" href="<?= route('province=' ) ?>">
            <?= 'All provinces' ?>
        </a>
    </li>
    <? foreach ($provinces as $province) : ?>
        <li>
            <a class="<?= $state->province == $province->id ? 'active' : ''; ?>" href="<?= route('province='.$province->id ) ?>">
                <?= escape($province->title) ?>
            </a>
        </li>
    <? endforeach ?>
</ul>