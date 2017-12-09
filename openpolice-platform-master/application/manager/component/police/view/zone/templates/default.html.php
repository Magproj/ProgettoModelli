<?
/**
 * Belgian Police Web Platform - Police Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<!--
<script src="assets://js/koowa.js" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<form action="" method="post" class="-koowa-form">
    <input type="hidden" name="banner" value="0" />

    <div class="main">
		<div class="title">
		    <input class="required" <?= $zone->id ? 'disabled' : '' ?> type="text" name="id" maxlength="4" value="<?= $zone->id ?>" placeholder="<?= translate('ID') ?>" />
		</div>
	
		<div class="scrollable">
            <fieldset>
                <legend><?= translate( 'Zone Names' ); ?>:</legend>
                <div>
                    <label for="titles[nl]">
                        <?= translate( 'Dutch' ); ?>
                    </label>
                    <div>
                        <input type="text" name="titles[nl]" value="<?= isset($zone->titles->nl) ? $zone->titles->nl : ''; ?>" />
                    </div>
                </div>
                <div>
                    <label for="titles[fr]">
                        <?= translate( 'French' ); ?>
                    </label>
                    <div>
                        <input type="text" name="titles[fr]" value="<?= isset($zone->titles->fr) ? $zone->titles->fr : ''; ?>" />
                    </div>
                </div>
                <div>
                    <label for="titles[de]">
                        <?= translate( 'German' ); ?>
                    </label>
                    <div>
                        <input type="text" name="titles[de]" value="<?= isset($zone->titles->de) ? $zone->titles->de : ''; ?>" />
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend><?= translate( 'Basic information' ); ?>:</legend>
                <div>
                    <label for="language">
                        <?= translate( 'Language' ); ?>
                    </label>
                    <div>
                        <?= helper('listbox.language', array('deselect' => false)) ?>
                    </div>
                </div>
                <div>
                    <label for="platform">
                        <?= translate( 'Platform' ); ?>
                    </label>
                    <div>
                        <?= helper('listbox.platform', array('deselect' => true)) ?>
                    </div>
                </div>
                <div>
                    <label for="banner"><?= translate('Custom Banner') ?></label>
                    <div>
                        <input type="checkbox" name="banner" value="1" <?= $zone->banner ? 'checked="checked"' : '' ?> />
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend><?= translate( 'Contact information' ); ?>:</legend>
                <div>
                    <label for="url">
                        <?= translate( 'URL' ); ?>
                    </label>
                    <div>
                        <input type="text" name="url" value="<?= $zone->url ?>" />
                    </div>
                </div>
                <div>
                    <label for="phone_information">
                        <?= translate( 'Phone Information' ); ?>
                    </label>
                    <div>
                        <input type="text" name="phone_information" value="<?= $zone->phone_information ?>" />
                    </div>
                </div>
                <div>
                    <label for="phone_emergency">
                        <?= translate( 'Phone Emergency' ); ?>
                    </label>
                    <div>
                        <input type="text" name="phone_emergency" value="<?= $zone->phone_emergency ?>" />
                    </div>
                </div>
                <div>
                    <label for="email">
                        <?= translate( 'Email' ); ?>
                    </label>
                    <div>
                        <input type="text" name="email" value="<?= $zone->email ?>" />
                    </div>
                </div>
            </fieldset>
            <? $channels = array('twitter', 'facebook', 'youtube', 'instagram') ?>
            <? $languages = array('nl' => 'Dutch', 'fr' => 'French', 'de' => 'German') ?>
            <? foreach($channels as $channel) : ?>
            <fieldset>
                <legend><?= translate(ucfirst($channel)); ?>:</legend>
                <? foreach($languages as $slug => $name) : ?>
                <div>
                    <label for="social[<?= $channel ?>][<?= $slug ?>]">
                        <?= translate(ucfirst($name)); ?>
                    </label>
                    <div>
                        <input type="text" name="social[<?= $channel ?>][<?= $slug ?>]" value="<?= isset($zone->social->{$channel}->{$slug}) ? $zone->social->{$channel}->{$slug} : ''; ?>" />
                    </div>
                </div>
                <? endforeach ?>
            </fieldset>
            <? endforeach ?>
		</div>
	</div>
</form>