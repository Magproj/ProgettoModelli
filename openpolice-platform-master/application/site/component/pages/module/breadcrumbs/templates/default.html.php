<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<ul class="breadcrumb">
	<? foreach($list as $item) : ?>
		<? // If not the last item in the breadcrumbs add the separator ?>
        <? if($item !== end($list)) : ?>
			<? if(!empty($item->link)) : ?>
				<li><a href="<?= $item->link ?>" class="pathway"><?= escape($item->name) ?></a></li>
			<? else : ?>
				<li><?= escape($item->name) ?></li>
			<? endif ?>
			<span class="divider">&rsaquo;</span>
		<? else : ?>
		    <li><?= escape($item->name) ?></li>
		<? endif ?>
	<? endforeach ?>
</ul>