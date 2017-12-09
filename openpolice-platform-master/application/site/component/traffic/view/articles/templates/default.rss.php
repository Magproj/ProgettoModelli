<?
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<rss version="2.0"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/">

    <channel>
        <title><![CDATA[<?= escape($params->get('page_title')).' - '.translate('police').' '.$zone->title;  ?>]]></title>
        <description><![CDATA[<?= escape($params->get('page_title')).' - '.translate('police').' '.$zone->title;  ?>]]></description>
        <link><?= route(array('format' => 'html')) ?></link>
        <lastBuildDate><?= helper('date.format') ?></lastBuildDate>
        <generator>http://www.nooku.org?v=<?= \Nooku::VERSION ?></generator>
        <language><?= JFactory::getLanguage()->getTag() ?></language>

        <dc:language><?= JFactory::getLanguage()->getTag() ?></dc:language>
        <dc:rights>Copyright <?= helper('date.format', array('format' => 'Y')) ?></dc:rights>
        <dc:date><?= helper('date.format') ?></dc:date>

        <sy:updatePeriod><?= $update_period ?></sy:updatePeriod>
        <sy:updateFrequency><?= $update_frequency ?></sy:updateFrequency>

        <atom:link href="<?= route() ?>" rel="self" type="application/rss+xml"/>

        <? foreach($articles as $article) : ?>
            <item>
                <title><![CDATA[<?= escape($article->title) ?> - <?= helper('date.timestamp', array('start_on'=> $article->start_on, 'end_on' => $article->end_on)) ?>]]></title>
                <link><?= helper('route.article', array('row' => $article)) ?></link>
                <dc:creator><?= @translate('Police') ?> <?= $zone->title ?></dc:creator>
                <guid isPermaLink="false"><?= helper('route.article', array('row' => $article)) ?></guid>
                <description>
                    <![CDATA[
                        <?= $article->text ?>
                        <p>
                            <? if($streets = $this->getObject('com:traffic.model.streets')->article($article->id)->getRowset()->street) : ?>
                                Straten: <?= implode(", ", $streets) ?>
                            <? else : ?>
                                <?= translate('Grondgebied van Politie').' '.$zone->title ?>
                            <? endif ?>
                        </p>
                    ]]>
                </description>
                <pubDate><?= helper('date.format', array('date' => $article->created_on)) ?></pubDate>
                <dc:date><?= helper('date.format', array('date' => $article->created_on)) ?></dc:date>
            </item>
        <? endforeach; ?>
    </channel>
</rss>
