<?
/**
 * Belgian Police Web Platform - Theme
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<title content="replace"><?= escape($params->get('page_title')); ?></title>

<h1 class="article__header"><?= escape($params->get('page_title')); ?></h1>

<form action="" method="get" class="-koowa-form">
    <table class="table table--striped">
        <thead>
        <tr>
            <th style="width: 70%"><?=translate('Name')?></th>
        </tr>
        </thead>
        <tbody>
        <? foreach($folders as $folder): ?>
            <tr>
                <td>
                    <i class="icon-folder-close"></i>
                    <a href="<?= route('&view=folder&folder='.$folder->path);?>">
                        <?=escape($folder->display_name)?>
                    </a>
                </td>
            </tr>
        <? endforeach; ?>

        <? foreach($files as $file): ?>
            <tr>
                <td>
                    <i class="icon-file"></i>
                    <a class="files-download" data-path="<?= escape($file->path); ?>"
                       href="<?= route('&view=file&folder='.$state->folder.'&name='.$file->name);?>"
                       onClick="ga('send', 'event', 'Downloads', 'Download', '<?=escape($file->display_name)?>');">
                        <?=escape($file->display_name)?>
                        <span class="text--small">(<?= $file->extension; ?>, <?= helper('com:files.filesize.humanize', array('size' => $file->size));?>)</span>
                    </a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>

    <? if(count($files) != $total): ?>
        <?= helper('paginator.pagination', array(
            'limit' => $state->limit,
            'offset' => $state->offset,
            'total' => $total,
            'show_limit' => false,
            'show_count' => false
        )); ?>
    <? endif; ?>
</form>
