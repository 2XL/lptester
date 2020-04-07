<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_swish.php');

$idEdicion = $_POST['edicion'];
$pregunta = $_POST['pregunta'];
$respuesta1 = $_POST['respuesta1'];
$respuesta2 = $_POST['respuesta2'];
$respuesta3 = $_POST['respuesta3'];
$respuesta4 = $_POST['respuesta4'];
$correcta = $_POST['correcta'];
$descripcion = $_POST['descripcion'];

$link = obrirBD();
$result = updateSwish($idEdicion, $pregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $correcta, $descripcion, $link);
tancarBD($link);

$dir = $_PATH . '/admin/swish/?ok';
header("Location: $dir ");

echo '<br>' . $result;
?>
                        



