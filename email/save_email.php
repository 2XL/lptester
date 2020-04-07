<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/time.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_email.php');

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    echo 'trobat';

    $link = obrirBD();

    $newsletter = getEmailById($id, $link);
    
    if (isset($_POST['email']) && $_POST['activo'] != "")
    {   echo 'update email <br>';
        $email = $_POST['email'];
        echo $_POST['email'].'<br>';
        updateEmail($id, $email, $link);
    if (isset($_POST['activo']) && $_POST['activo'] == 1 ) {
        enableEmail($_POST['email'], $link);
        echo ' enable email';
    } else {
	if ($newsletter['activo']) {
	    disableEmail($_POST['id'], $link, 1);
	} else {
	    disableEmail($_POST['id'], $link, $newsletter['motivo_baja']);
	}
        echo ' disable email';   
    }}

    tancarBD($link);
 
    echo "<div class='message_ok' > Update Succeed! </div>";
                                
 //   $dir = $_PATH . '/admin/email/form.php?email='.$_POST['e-mail'].'&ok';
} else {
    echo "<div class='message_error' > Error: no such id... </div>";
 
//    $dir = $_PATH . '/admin/email/form.php?email='.$_POST['e-mail'].'&fail';
}

 
//header("Location: $dir ");

?>