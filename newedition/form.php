<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_edicion.php');
?>

<script type="text/javascript" >
    function submitform()
    {
       document.forms['newedition_form'].submit();
    }
</script>

<form name="newedition" method="POST" id="newedition_form" action="create_newedition.php">
    <table class="table_edit">
        <caption>Edition</caption>
        <tr>
            <td style="width:1%;">Date</td>

            <td><input class="datepicker" type="text" name="date" id="date" /></td>
        </tr>
        <tr>
            <td>Titular</td>
            <td><input type="text" name="titular" id="titular"  /></td>
        </tr>
        <tr>
            <td>Visible</td>
            <td><input type="checkbox" name="visible" value="1" id="visible"  /></td>
        </tr>
        <tr>
            <td colspan="2">
                Description:
                <textarea name="descripcion" id="descripcion" > </textarea>
            </td>
        </tr>
        <tr>
            <td> 
                <a  class="button-blue" href="javascript:submitform()">Create new edition!</a>
                
            </td>
            <td>
                <?php
                if (isset($_GET['error'])) {
                    echo "<div class='message_error' > please input date! </div>";
                }?>
            </td>
        </tr>
    </table>
</form>

<script>
    CKEDITOR.replace('descripcion');
</script>