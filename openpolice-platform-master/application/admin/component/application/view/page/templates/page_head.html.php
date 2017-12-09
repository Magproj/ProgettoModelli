<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<head>
    <base href="<?= escape(url()); ?>" />
    <title><?= title().' - '. translate( 'Administration'); ?></title>

    <meta content="text/html; charset=utf-8" http-equiv="content-type"  />
    <meta content="chrome=1" http-equiv="X-UA-Compatible" />

    <ktml:title>
    <ktml:meta>
    <ktml:link>
    <ktml:style>
    <ktml:script>

    <link href="assets://application/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <script src="assets://js/mootools.js" />
    <script src="assets://application/js/application.js" />
    <script src="assets://application/js/chromatable.js" />

    <style src="assets://application/stylesheets/default.css" />

    <script src="assets://application/js/jquery.js" /></script>
    <script type="text/javascript">
        var $jQuery = jQuery.noConflict();
    </script>
    <script src="assets://application/js/select2.js" /></script>
</head>
