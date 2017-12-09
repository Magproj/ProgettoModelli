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

<form action="" method="get" class="-koowa-grid">
	<?= import('default_scopebar.html'); ?>
	<table>
	<thead>
		<tr>
			<th>
				<?= helper('grid.sort', array('column' => 'title')) ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'language')) ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'postcode', 'title' => 'Postcode')) ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'city_title', 'title' => 'City')) ?>
			</th>
			<th>
				<?= helper('grid.sort', array('column' => 'police_zone_id', 'title' => 'Zone ID')) ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="7">
				<?= helper('com:application.paginator.pagination', array('total' => $total)) ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<? foreach ($municipalities as $municipality) : ?>
		<tr>
			<td>
				<?= escape($municipality->title); ?>
			</td>
			<td>
				<?= escape($municipality->language); ?>
			</td>
			<td>
				<?= escape($municipality->postcode); ?>
			</td>
			<td>
				<?= escape($municipality->city_title); ?> <?= $municipality->city_postcode ? '('.escape($municipality->streets_city_id).')' : ''; ?>
			</td>
			<td>
				<?= escape($municipality->police_zone_id); ?>
			</td>
		</tr>
		<? endforeach; ?>
	</tbody>
	</table>
</form>