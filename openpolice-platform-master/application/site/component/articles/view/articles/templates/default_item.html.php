<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<article>
    <header>
        <h1><a href="<?= helper('route.article', array('row' => $article)) ?>"><?= highlight($article->title) ?></a></h1>
        <?= helper('date.timestamp', array('row' => $article, 'show_modify_date' => false)); ?>
        <? if (!$article->published) : ?>
        <span class="label label-info"><?= translate('Unpublished') ?></span>
        <? endif ?>
        <? if ($article->access) : ?>
        <span class="label label-important"><?= translate('Registered') ?></span>
        <? endif ?>
    </header>

    <?= helper('com:police.image.thumbnail', array(
        'attachment' => $article->attachments_attachment_id,
        'attribs' => array('width' => '200', 'align' => 'right', 'class' => 'thumbnail'))) ?>

    <? if ($article->introtext) : ?>
        <?= highlight($article->introtext) ?>
        <a class="article__readmore" href="<?= helper('route.article', array('row' => $article)) ?>"><?= translate('Read more') ?></a>
    <? endif; ?>
</article>