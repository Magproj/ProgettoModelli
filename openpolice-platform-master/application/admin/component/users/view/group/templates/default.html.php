<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<?= helper('behavior.validator') ?>

<!--
<script src="assets://js/koowa.js" />
<style src="assets://css/koowa.css" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<form action="" method="post" class="-koowa-form" id="group-form">
    <div class="main">
        <div class="title">
            <input class="required" type="text" name="name" maxlength="255" value="<?= $group->name ?>" placeholder="<?= translate('Group name') ?>" />
        </div>
        <div class="scrollable">
    		<fieldset>
    			<legend><?= translate('Users') ?></legend>
    			<div>
    			    <div>
    			        <?= helper('select.users', array('selected' => $users, 'name' => 'users')) ?>
    			    </div>
    			</div>
    		</fieldset>
        </div>
    </div>
</form>