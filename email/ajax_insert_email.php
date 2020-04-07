<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_edicion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_email.php');
 

 
error_reporting(0); 
 
// error_reporting(1); 
$link = obrirBD();
if (isset($_GET['email']))
    $thisEmail = getEmailByEmail($_GET['email'], $link);
else
    $thisEmail = getEmailByEmail($_POST['email'], $link);
tancarBD($link);

?>

<?php if ( $thisEmail == null ){
    $email = $_POST['email'];
        echo 'new email: '.$email;
        $link = obrirBD();
        insertEmail($email, $link);
        tancarBD($link);
        echo "<div class='message_ok' > addEmaill Succeed! </div>";
}else
        echo "<div class='message_error' > Email already Exist! </div>";
    ?>
