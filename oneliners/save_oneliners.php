<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_oneliners.php');

$idEdicion = $_POST['edicion'];
$txtverde = $_POST['texto_verde'];
$txtrosa = $_POST['texto_rosa'];


$link = obrirBD();
$result = updateOneLiners($idEdicion, $txtverde, $txtrosa, $link);
tancarBD($link);

$dir = $_PATH . '/admin/oneliners/?ok';
header("Location: $dir ");
?>
 