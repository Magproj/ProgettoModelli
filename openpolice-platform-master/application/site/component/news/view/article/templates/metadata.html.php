<?
/**
 * Belgian Police Web Platform - News Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<? if($zone->twitter) : ?>
    <meta content="summary" name="twitter:card" />
    <meta content="@<?= $zone->twitter ?>" name="twitter:site" />
<? endif ?>
    <meta content="<?= @translate('Police') ?> <?= $zone->title ?>" property="og:site_name" />
    <meta content="<?= escape(url()); ?>" property="og:url" />
<? if(isset($article->title)) : ?>
    <meta content="<?= escape($article->title) ?>" property="og:title" />
<? endif ?>
<? if(isset($article->introtext) || isset($article->text) || isset($article->description)) : ?>
    <meta content="<?= trim(preg_replace('/\s+/', ' ', strip_tags(substr($article->introtext ? $article->introtext : $article->text ? $article->text : $article->description, 0, 350)))).'...' ?>" property="og:description" />
<? endif ?>
<? if(isset($article->thumbnail)) : ?>
    <meta content="http://<?= $url ?>attachments://<?= $article->thumbnail ?>" property="og:image" />
<? endif ?>
    <meta content="article" property="og:type" />
<? if(isset($article->published_on_utc)) : ?>
    <meta content="<?= $article->published_on_utc ?>" property="article:published_time" />
<? endif ?>
<? if($zone->facebook) : ?>
    <meta content="https://www.facebook.com/<?= $zone->facebook ?>" property="article:publisher" />
<? endif ?>
