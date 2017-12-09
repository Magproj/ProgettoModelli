<?
/**
 * Belgian Police Web Platform - Wanted Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<!--
<script src="assets://js/koowa.js" />
<style src="assets://css/koowa.css" />
-->
<?= helper('behavior.sortable') ?>

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<? if($categories->isTranslatable()) : ?>
    <ktml:module position="actionbar" content="append">
        <?= helper('com:languages.listbox.languages') ?>
    </ktml:module>
<? endif ?>

<ktml:module position="sidebar">
    <?= import('default_sidebar.html'); ?>
</ktml:module>

<form action="" method="get" class="-koowa-grid">
    <?= import('default_scopebar.html'); ?>
    <table>
        <thead>
        <tr>
            <th width="1">
                <?= helper('grid.checkall') ?>
            </th>
            <th width="1"></th>
            <th>
                <?= helper('grid.sort', array('column' => 'title')) ?>
            </th>
            <? if($categories->isTranslatable()) : ?>
                <th width="70">
                    <?= translate('Translation') ?>
                </th>
            <? endif ?>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="7">
                <?= helper('com:application.paginator.pagination', array('total' => $total)) ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <? foreach($categories as $category) : ?>
            <tr>
                <td align="center">
                    <?= helper('grid.checkbox' , array('row' => $category)) ?>
                </td>
                <td align="center">
                    <?= helper('grid.enable', array('row' => $category, 'field' => 'published')) ?>
                </td>
                <td class="ellipsis">
                    <a href="<?= route('view=category&id='.$category->id) ?>">
                        <?= escape($category->title) ?>
                    </a>
                </td>
                <? if($category->isTranslatable()) : ?>
                    <td>
                        <?= helper('com:languages.grid.status', array(
                            'status'   => $category->translation_status,
                            'original' => $category->translation_original,
                            'deleted'  => $category->translation_deleted));
                        ?>
                    </td>
                <? endif ?>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>