<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<script src="assets://ckeditor/ckeditor/ckeditor.js" />
<script src="assets://ckeditor/js/ckeditor.koowa.js" />

<script>
    jQuery(document).ready(function() {
        CKEDITOR.replace( '<?= $id ?>', {
            baseHref   : '<?= $settings->baseHref ?>',
            toolbar    : '<?= $settings->options->toolbar ?>',
            height     : '<?= $settings->height ?>',
            width      : '<?= $settings->width ?>',
            language   : '<?= $settings->language ?>',
            contentsLanguage     : '<?= $settings->contentsLanguage ?>',
            contentsLangDirection: '<?= $settings->contentsLangDirection ?>',
            scayt_autoStartup    : '<?= $settings->scayt_autoStartup ?>',
            removeButtons        : '<?= $settings->removeButtons ?>'
        });
    });
</script>

<textarea id="<?= $id ?>" name="<?= $name ?>" class="ckeditor editable-<?= $id ?> validate-editor <?= $class ?>" style="visibility:hidden"><?= $text ?></textarea>
