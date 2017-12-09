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
<style src="assets://css/koowa.css" />
-->

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<ktml:module position="sidebar">
	<?= import('default_sidebar.html'); ?>
</ktml:module>

<form action="" method="get" class="-koowa-grid">
	<?= import('default_scopebar.html'); ?>
	<table>
	<thead>
		<tr>
			<th width="10">
				<?= helper( 'grid.checkall'); ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'title')) ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'zones_zone_id', 'title' => 'Zone ID')) ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'language')) ?>
			</th>
            <th>
                <?= helper('grid.sort', array('column' => 'platform')) ?>
            </th>
            <th>
                <?= helper('grid.sort', array('column' => 'cities')) ?>
            </th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="6">
				<?= helper('com:application.paginator.pagination', array('total' => $total)) ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<? foreach ($zones as $zone) : ?>
		<tr>
			<td align="center">
				<?= helper('grid.checkbox', array('row' => $zone))?>
			</td>
			<td>
				<a href="<?= route( 'view=zone&task=edit&id='. $zone->id ); ?>"><?= escape($zone->title); ?></a>
			</td>
			<td>
				<?= $zone->id ?>
			</td>
			<td>
				<?= helper('com:police.grid.language', array('language' => $zone->language)) ?>
			</td>
            <td>
                <?= $zone->platform ? $zone->platform : translate('External') ?>
            </td>
            <td>
                <?= $zone->cities ?>
            </td>
		</tr>
		<? endforeach; ?>
	</tbody>
	</table>
</form>