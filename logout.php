<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');

setcookie("idUser", "", time()+(3600*8));
setcookie("tokenUser", "", time()+(3600*8));
unset($_COOKIE['idUser']);
unset($_COOKIE['tokenUser']);
unset($_COOKIE['edicion']);

if (isset($_POST['login'])) {
    header("Location: login.php?error");
} else {
    header("Location: ".$_PATH."/admin/login.php");
}
?>
