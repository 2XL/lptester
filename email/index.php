<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/time.php');
?>

<script type="text/javascript" >
    function submitformEdit()
    {
       document.forms['newsletter_index_edit'].submit();
    }
    function submitformInsert()
    {
       document.forms['newsletter_index_insert'].submit();
    }
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/head.php'); ?>
    </head>

    <body onload="javascript:timer();">

        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/header.php'); ?>
        <div id="content">
            <table style="width: 100%;">
                <tr>
                    <td class="lateral">
                        <?php require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/menu.php'); ?>
                    </td>
                    <td class="centro">
                        <?php require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/email/form.php'); ?>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>


