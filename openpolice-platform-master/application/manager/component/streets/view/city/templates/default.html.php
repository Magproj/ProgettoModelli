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
            <input disabled class="required" type="text" name="title" maxlength="255" value="<?= $city->title ?>" placeholder="<?= translate('Title') ?>" />
        </div>

        <div class="scrollable">
            <fieldset>
                <legend><?= translate( 'Information' ); ?>:</legend>
                <div>
                    <label for="streets_city_id">
                        <?= translate( 'NIS' ); ?>
                    </label>
                    <div>
                        <input disabled class="required" type="text" name="streets_city_id" value="<?= $city->id ?>" />
                    </div>
                </div>
                <div>
                    <label for="police_zone_id">
                        <?= translate( 'Zone ID' ); ?>
                    </label>
                    <div>
                        <input type="text" name="police_zone_id" class="required" value="<?= $city->police_zone_id ?>" />
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>