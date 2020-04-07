<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_smile.php');

$idEdicion = $_POST['edicion'];

$columna1 = $_POST['columna1'];
$columna2 = $_POST['columna2'];

$link = obrirBD();
updateSmile($idEdicion, $columna1, $columna2, $link);
tancarBD($link);

$dir = $_PATH . '/admin/smile/?ok';
header("Location: $dir ");
?>
 