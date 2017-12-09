<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<table class="adminlist">
	<thead>
    	<tr>
    		<th class="-koowa-sortable"><?= translate('Identifier') ?></th>
    		<th class="-koowa-sortable"><?= translate('Event'); ?></th>
    		<th class="-koowa-sortable"><?= translate('Time'); ?></th>
    		<th class="-koowa-sortable"><?= translate('Memory'); ?></th>
    	</tr>
  	</thead>
  	<tbody>
  		<? foreach ( $events as $event ) : ?>
  		<tr>  
			<td class="-koowa-sortable"><?= $event['target'] ?></td>
			<td class="-koowa-sortable"><?= $event['target'] ?></td>
            <td class="-koowa-sortable"><?= $event['message'] ?></td>
            <td class="-koowa-sortable" data-comparable="<?= $event['time'] ?>"><?= sprintf('%.3f', $event['time']).' seconds' ?></td>
            <td class="-koowa-sortable"><?= $event['memory'] ?></td>
        </tr>
         <? endforeach; ?>
  	</tbody>
</table>
