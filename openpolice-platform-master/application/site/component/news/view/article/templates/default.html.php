<?
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<?= import('com:news.view.article.metadata.html') ?>

<ktml:module position="left">
    <? $modules = object('com:pages.model.modules')->position('quicklinks')->published('true')->getRowset(); ?>

    <? foreach($modules as $module) : ?>
        <div class="sidebar__element">
            <h3><?= $module->title ?></h3>
            <?= $module->content ?>
        </div>
    <? endforeach ?>
</ktml:module>

<title content="replace"><?= escape($article->title) ?></title>

<article class="article" itemscope itemtype="http://schema.org/Article">
    <header class="article__header">
        <h1 itemprop="name"><?= escape($article->title) ?></h1>
        <time class="text--small" itemprop="datePublished" datetime="<?= $article->published_on_utc ?>">
            <?= helper('date.format', array('date'=> $article->published_on, 'format' => translate('DATE_FORMAT_LC5'), 'attribs' => array('class' => 'published'))) ?>
        </time>
    </header>

    <div class="article__text">
        <? if($article->attachments_attachment_id) : ?>
        <a onClick="ga('send', 'event', 'Attachments', 'Modalbox', 'Image');" class="article__thumbnail" href="attachments://<?= $article->thumbnail ?>" data-gallery="enabled">
            <?= helper('com:police.image.thumbnail', array(
            'attachment' => $article->attachments_attachment_id,
            'attribs' => array('width' => '400', 'height' => '300', 'itemprop'=> "image"))) ?>
        </a>
        <? endif ?>

        <div itemprop="articleBody">
            <div<?= $article->fulltext ? ' class="article__introtext"' : '' ?>>
                <?= $article->introtext ?>
            </div>
            <?= $article->fulltext ?>
        </div>
    </div>

    <?= import('default_youtube.html', array('youtube' => $article->params->get('youtube', false))) ?>

    <?= import('com:attachments.view.attachments.default.html', array('attachments' => $attachments, 'exclude' => array($article->attachments_attachment_id))) ?>
</article>

<script src="assets://application/components/jquery/dist/jquery.min.js" />
<script src="assets://application/components/magnific-popup/dist/jquery.magnific-popup.min.js" />
<script data-inline>
    $(document).ready(function() {
        // This will create a single gallery from all elements that have class data-gallery="enabled"
        $('[data-gallery="enabled"]').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
        });
    });
</script>
