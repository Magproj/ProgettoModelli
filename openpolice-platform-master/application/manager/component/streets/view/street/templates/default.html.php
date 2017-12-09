<?
/**
 * Belgian Police Web Platform - Streets Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<?= helper('behavior.validator'); ?>

<!--
<script src="assets://js/koowa.js" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<form action="" method="post" class="-koowa-form">
	<div class="main">
		<div class="title">
		    <input disabled class="required" type="text" name="title" maxlength="255" value="<?= escape($street->title) ?>" placeholder="<?= translate('Title') ?>" />
		</div>
	
		<div class="scrollable">
			<fieldset>
				<legend><?= translate( 'Information' ); ?>:</legend>
                <div>
                    <label for="streets_street_id">
                        <?= translate( 'CRAB' ); ?>
                    </label>
                    <div>
                        <input disabled class="required" type="text" name="streets_street_id" value="<?= $street->id ?>" />
                    </div>
                </div>
                <div>
                    <label for="islp">
                        <?= translate( 'ISLP' ); ?>
                    </label>
                    <div>
                        <input type="text" name="islp" class="required" value="<?= escape($street->islp) ?>" />
                    </div>
                </div>
			</fieldset>
		</div>
	</div>
</form>