<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<!DOCTYPE HTML>
<html lang="<?= $language; ?>" dir="<?= $direction; ?>">
<head>
    <link rel="stylesheet" href="assets://application/stylesheets/error.css" type="text/css" />
    <title><?= translate('Error').': '.$code; ?></title>
</head>
<body>
<table width="550" align="center" class="outline">
    <tr>
        <td align="center">
            <h1><?= $code ?> - <?= translate('An error has occurred') ?></h1>
        </td>
    </tr>
    <tr>
        <td width="39%" align="center">
            <p><?= $message ?></p>
            <p>
                <? if(count($trace)) : ?>
                <?= import('default_backtrace.html'); ?>
                <? endif; ?>
            </p>
        </td>
    </tr>
</table>
</body>
</html>