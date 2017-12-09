<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<!--
<script src="assets://js/koowa.js" />
<style src="assets://css/koowa.css" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<form action="" method="post" class="-koowa-form" id="tag-form">
    <input type="hidden" name="table" value="<?= $state->table ?>" />
    
    <div class="main">
		<div class="title">
			<input class="required" type="text" name="title" maxlength="255" value="<?= $tag->title; ?>" placeholder="<?= translate( 'Title' ); ?>" />
		    <div class="slug">
		        <span class="add-on"><?= translate('Slug'); ?></span>
		        <input type="text" name="slug" maxlength="255" value="<?= $tag->slug ?>" />
		    </div>
		</div>

		<div class="scrollable">

		</div>
	</div>
</form>