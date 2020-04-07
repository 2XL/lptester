<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_edicion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_email.php');
$param=0;

 
error_reporting(0); 
 
// error_reporting(1); 
$link = obrirBD();
if (isset($_GET['email']))
    $thisEmail = getEmailByEmail($_GET['email'], $link);
else
    $thisEmail = getEmailByEmail($_POST['email'], $link);
tancarBD($link);



if (isset($_POST['email']) && $_POST['email'] != "") {
    $email = $_POST['email'];
    $param++;
}
?>

<?php if ( $thisEmail != null ){ ?>

<form name="newsletter_form" method="POST" id="newsletter_form" action="save_email.php">
    <table class="table_edit">
        <tr>
            <td style="width:1%;">
                id:
            </td>
            <td>
                <input type="text" id="e-id" name="id" value="<?php echo $thisEmail['id']; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>
                email:
            </td>
            <td>
                <input type="text" id="e-mail" name="e-mail" value="<?php echo $thisEmail['email']; ?>" >
            </td>
        </tr>
        <tr>
            <td>
                active:
            </td>
            <td>
                <input type="checkbox" id="e-activo" name="activo" <?php if ($thisEmail['activo']) echo 'checked' ?>>
            </td>
        </tr>
        <tr>
            <td>
                register date:
            </td>
            <td>
                <input type="text" value="<?php echo $thisEmail['fecha_registro']; ?>" readonly>
            </td>

        </tr>
        <tr>
            <td>
                modified date:
            </td>
            <td>
                <input type="text" value="<?php echo $thisEmail['fecha_modificacion']; ?>" readonly>
            </td>

        </tr>
    <?php    
    $link = obrirBD();
    $lastEdition = getLastEdicionVisible($link);
    $thisActivity = getEmailLate5ActivityIndex($thisEmail['id'], $lastEdition['id'] ,$link);
    tancarBD($link);
    ?>   
        <tr>
            <td>
                Reputation:
            </td>
            <td>
                 <?php 
                 $UploadDir = $_PATH . '/admin/images/';
                 for($i=0; $i<5; $i++){
                    if($thisActivity > $i)
                        {
                        ?> <img src="<?php echo $UploadDir.'star_enabled.png'; ?>" width="16" height="16" /> <?php
                        
                        }
                    else 
                        {
                        ?> <img src="<?php echo $UploadDir.'star_disabled.png'; ?>" width="16" height="16" /> <?php
                        }
                    } 
                 ?> 
            </td>
        </tr>
        <tr>
            <td> 
                <a  class="button-blue" href="javascript:update_email()">Update!</a>
            </td>
            <td>
                <?php
                if (isset($_GET['ok']))
                    echo "<div class='message_ok' > Update Succeed! </div>";
                if (isset($_GET['fail']))
                    echo "<div class='message_ok' > Error: no such id... </div>";
                ?>        
            </td>
        </tr>
    </table>
    <br>
 
</form>

<?php } else echo "<div class='message_error' > Error: no such email... </div>";

    ?>



 
