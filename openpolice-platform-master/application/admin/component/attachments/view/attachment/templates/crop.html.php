<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
 ?>

<script src="assets://attachments/js/jquery.Jcrop.min.js" />
<style src="assets://attachments/css/jquery.Jcrop.min.css" />

<script src="assets://js/koowa.js" />
<script src="assets://attachments/js/attachments.list.js" />
<script src="assets://files/js/uri.js" />

<script>
    window.addEvent('domready', function() {
        new Attachments.List({
            container: 'attachment',
            action: '<?= route('view=attachment&format=json&layout=crop&id='.$attachment->id) ?>',
            token: '<?= $this->getObject('user')->getSession()->getToken() ?>',
            aspectRatio: <?= $aspect_ratio ?>
        });
    });
</script>

<div id="attachment">
    <img id="target" src="files/<?= $this->getObject('application')->getSite() ?>/attachments/<?= $attachment->path ?>" />
    <a class="btn btn-success btn-block" style="margin-top: 10px" href="#" data-action="crop" data-id="<?= $attachment->id; ?>">
        <?= translate('Save') ?>
    </a>
</div>
