<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_oneliners.php');

$link = obrirBD();
$thisOneLiners = getOnelinersVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);
?>

<script type="text/javascript" >
    function submitform()
    {
       document.forms['oneliners_form'].submit();
    }
</script>

<form name="oneliners_form" method="POST" id="oneliners_form" action="save_oneliners.php">

    <table class="table_edit" >
        <caption>Oneliners</caption>
            
            <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>"><td>
    
        <tr>
            <td>Yellow section: 
                <textarea rows="5" cols="50" name="texto_verde"><?php echo $thisOneLiners['texto_verde']; ?></textarea></td>

        </tr>
        <tr>

            <td>Grey section:  
                <textarea rows="5" cols="50" name="texto_rosa"><?php echo $thisOneLiners['texto_rosa']; ?></textarea></td>
            
        </tr>
    </table>
    <table style="width:100%;">
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

    CKEDITOR.replace("texto_rosa");
    CKEDITOR.replace("texto_verde");
</script>
