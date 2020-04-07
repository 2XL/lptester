<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_expressions.php');

$idEdicion = $_POST['edicion'];
$txt = $_POST['texto'];



$link = obrirBD();
$result = updateExpressions($idEdicion, $txt, $link);
tancarBD($link);
$dir = $_PATH . '/admin/expressions/?ok';
header("Location: $dir ");
?>
 