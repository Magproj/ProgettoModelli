<?
/**
 * Belgian Police Web Platform - Questions Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<?= helper('behavior.validator') ?>

<!--
<script src="assets://js/koowa.js" />
<style src="assets://css/koowa.css" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<? if($category->isTranslatable()) : ?>
<ktml:module position="actionbar" content="append">
    <?= helper('com:languages.listbox.languages', array('attribs' => array('disabled' => 'true'))) ?>
</ktml:module>
<? endif ?>

<form action="" method="post" class="-koowa-form" id="category-form">
    <input type="hidden" name="published" value="0" />
    <input type="hidden" name="attachments_attachment_id" value="0" />

    <div class="main">
        <div class="title">
            <input class="required" type="text" name="title" maxlength="255" value="<?= $category->title; ?>" placeholder="<?= translate( 'Title' ); ?>" />
            <div class="slug">
                <span class="add-on"><?= translate('Slug'); ?></span>
                <input type="text" name="slug" maxlength="255" value="<?= $category->slug ?>" />
            </div>
        </div>
    </div>

    <div class="sidebar">
        <?= import('com:categories.view.category.default_sidebar.html'); ?>
    </div>
</form>
