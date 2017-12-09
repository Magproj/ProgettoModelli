<?
/**
 * Belgian Police Web Platform - Trafficinfo Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<fieldset>
	<legend><?= translate('Density').' '.$name ?></legend>
	<div>
	    <label for="densities['.$number.'][traffic]">
	    	<?= translate( 'Traffic type' ); ?>
	    </label>
	    <div>
	        <?= helper('listbox.items', array('autocomplete' => true, 'name' => 'densities['.$number.'][traffic]', 'selected' => $density->type, 'validate' => false, 'url' => $url.'traffic')) ?>
	    </div>
	</div>
	<div>
	    <label for="densities['.$number.'][start]">
	    	<?= translate( 'Start' ); ?>
	    </label>
	    <div>
	        <?= helper('listbox.items', array('autocomplete' => true, 'name' => 'densities['.$number.'][start]', 'selected' => $density->start, 'validate' => false, 'url' => $url.'places')) ?>
	    </div>
	</div>
	<div>
	    <label for="densities['.$number.'][end]">
	    	<?= translate( 'End' ); ?>
	    </label>
	    <div>
	        <?= helper('listbox.items', array('autocomplete' => true, 'name' => 'densities['.$number.'][end]', 'selected' => $density->end, 'validate' => false, 'url' => $url.'places')) ?>
	    </div>
	</div>
</fieldset>