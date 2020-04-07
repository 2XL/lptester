<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_smile.php');

$link = obrirBD();
$thisSmile = getSmileVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);
/*
  echo '<pre>';
  print_r($thisSmile);
  echo '</pre>';
 */
?>

<script type="text/javascript" >
    function submitform()
    {
       document.forms['smile_form'].submit();
    }
</script>

<form name="smile_form" id="smile_form" method="POST" action="save_smile.php">
    <table class="table_edit" name="x">
        <caption>Smile for a while</caption>
        <tr>
            <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>"><td>
        </tr>
            <tr>
                <td colspan="2"> to use image type [IMAGE] with claudator <img src="<?php echo $_PATH . '/images/eof.png'; ?>" width="110" /> </td>
            </tr>
        <tr>
            <td >column 1: </td>
            <td >column 2: </td>
        </tr>
        <tr>
            <td  ><textarea rows="5" cols="50" name="columna1"><?php echo $thisSmile['columna1']; ?></textarea></td>
            <td  ><textarea rows="5" cols="50" name="columna2"><?php echo $thisSmile['columna2']; ?></textarea></td>
        </tr>
        <tr>
           
            <td>
                <?php
                if (isset($_GET['ok'])) {
                    echo "<div class='message_ok' > Saved! </div>";
                }?>
            </td>
             <td align="right">
                <a  class="button-blue" href="javascript:submitform()">Save!</a>
          
            </td>
        </tr>
    </table>
</form>

<script type="text/javascript">

    CKEDITOR.replace("columna1", {height:"500", width:"300"});
    CKEDITOR.replace("columna2", {height:"500", width:"300"});
    
</script>
