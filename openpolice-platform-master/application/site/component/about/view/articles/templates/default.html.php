<?
/**
 * Belgian Police Web Platform - About Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<title content="replace"><?= escape($params->get('page_title')) ?></title>

<? if(count($articles) > '1') : ?>
<ktml:module position="left">
    <?= import('com:categories.view.categories.list.html') ?>
</ktml:module>
<? endif ?>

<? foreach ($articles as $article) : ?>
    <? if(count($articles) == '1') : ?>
        <?= import('com:news.view.article.metadata.html') ?>
        <?= import('com:about.view.article.default.html', array('article' => $article)) ?>
    <? else : ?>

    <article class="article">
        <? $link = helper('route.article', array('row' => $article)); ?>
        <h1 class="article__header">
            <? if($article->fulltext) : ?>
                <a href="<?= $link ?>">
                    <?= escape($article->title) ?>
                </a>
            <? else : ?>
                <?= escape($article->title) ?>
            <? endif; ?>
        </h1>

        <? if($article->attachments_attachment_id): ?>
            <? if($article->fulltext) : ?>
                <a class="article__thumbnail" tabindex="-1" href="<?= $link ?>">
                    <?= helper('com:police.image.thumbnail', array(
                        'attachment' => $article->attachments_attachment_id,
                        'attribs' => array('width' => '400', 'height' => '300'))) ?>
                </a>
            <? else : ?>
                <?= helper('com:police.image.thumbnail', array(
                    'attachment' => $article->attachments_attachment_id,
                    'attribs' => array('class' => 'article__thumbnail', 'width' => '400', 'height' => '300'))) ?>
            <? endif; ?>

        <? endif; ?>

        <?= $article->introtext ?>

        <? if ($article->fulltext) : ?>
            <a href="<?= $link ?>"><?= translate('Read more') ?></a>
        <? endif; ?>
    </article>
    <? endif ?>
 <? endforeach; ?>
