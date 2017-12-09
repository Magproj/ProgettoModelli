<?
/**
 * Belgian Police Web Platform - Districts Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<h1 class="article__header"><?= escape($params->get('page_title')); ?></h1>

<? if ($category->image || $category->description) : ?>
<div class="clearfix">
    <? if ($category->image) : ?>
        <?= helper('com:categories.string.image', array('row' => $category)) ?>
    <? endif; ?>
    <?= $category->description; ?>
</div>
<? endif; ?>

<?= import('default_search.html'); ?>
