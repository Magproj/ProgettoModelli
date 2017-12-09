<?
/**
 * Belgian Police Web Platform - Trafficinfo Component
 *
 * @copyright	Copyright (C) 2012 - 2017 Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<?= helper('behavior.validator'); ?>

<ktml:module position="actionbar">
    <ktml:toolbar type="actionbar">
</ktml:module>

<script>
window.addEvent('domready', function() {
	
	$('items').addEvent('change', function(event)
	{
		event.stop();

		if(!this.value) {
			return;
		}
		
		var req = new Request({
		    method: 'get',
		    url: '<?= route('view=item&format=json') ?>' + '&id=' + this.value,
		    onComplete: function(response) {
		    	var object = JSON.decode(response);

		    	if(!object.item) {
			    	return;
		    	}

		    	TrafficInfo.editor.insertText('<p>' + object.item.text + '</p>');
		    	$('items').selectedIndex = 0;
		    }
		}).send();
	});
	
});
</script>

<!--
<script src="assets://js/koowa.js" />
-->

<form action="" method="post" class="-koowa-form">
	<input type="hidden" name="trafficinfo_category_id" value="<?= $event->id ? $event->trafficinfo_category_id : $state->category ?>" />
	
	<div class="form-body">		
		<?// object('com:trafficinfo.controller.editor')->name('text')->id('text')->text($event->text)->display() ?>
		<?// object('com:trafficinfo.controller.editor')->name('text_fr')->id('text_fr')->text($event->text)->display() ?>
	</div> 
	
	<div class="sidebar" style="width: 600px;">
        <fieldset class="form-horizontal" style="margin: 20px 20px 20px 0;">
            <legend><?= translate( 'Text' ); ?></legend>
            <div>
                <label for="name">
                    <?= translate( 'Text' ); ?>
                </label>
                <div>
                    <?= helper('listbox.items', array('autocomplete' => false, 'value' => 'id', 'name' => 'trafficinfo_item_id_source', 'selected' => $event->trafficinfo_item_id_source, 'validate' => false, 'filter' => array('group' => 'text'), 'attribs' => array('id' => 'items'))) ?>
                </div>
            </div>
        </fieldset>
	
        <?
        switch ($event->id ? $event->trafficinfo_category_id : $state->category) {
            case 2:
                echo import('form_workers');
                break;
            case 3:
                echo import('form_ghost');
                break;
            case 5:
                echo import('form_actua');
                break;
            case 4:
                echo import('form_density');
                break;
            default:
                echo import('form_default');
        }
         ?>
	 </div>
</form>