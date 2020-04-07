<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_expressions.php');

$link = obrirBD();
$thisExpressions = getExpressionsVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);
?>

<script type="text/javascript" >
    function submitform()
    {
       document.forms['expressions_form'].submit();
    }
</script>

<form name="expressions_form" method="POST" id="expressions_form" action="save_expressions.php">

    <table class="table_edit">
        <caption>Foreign words & expressions</caption>
        <tr>
            <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>"><td>
        </tr>
        <tr>
            <td>Text: 
                <textarea rows="5" cols="50" name="texto"><?php echo $thisExpressions['texto']; ?></textarea>
            </td>
        </tr>
    </table>
    <table class="table_edit">
           <tr>
            
            <td>
             <?php   
             if(isset($_GET['ok']))
                 { 
                echo "<div class='message_ok' > Saved! </div>"; 
                } ?>
            </td>
            <td align="right">
                <a  class="button-blue" href="javascript:submitform()">Save!</a>
       
            </td>
        </tr>
    </table>


</form>

<script type="text/javascript">
    CKEDITOR.replace("texto", {height:"500"});
</script>
