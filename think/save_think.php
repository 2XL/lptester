<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_think.php');

$level = $_POST['level'];

$idEdicion = $_POST['edicion'];
$correcta_a = $_POST['correcta_a'];
$correcta_b = $_POST['correcta_b'];
$correcta_c = $_POST['correcta_c'];
$correcta_d = $_POST['correcta_d'];

$pregunta_a = $_POST['pregunta_a'];
$pregunta_b = $_POST['pregunta_b'];
$pregunta_c = $_POST['pregunta_c'];
$pregunta_d = $_POST['pregunta_d'];

$respuesta_a1 = $_POST['respuesta_a1'];
$respuesta_b1 = $_POST['respuesta_b1'];
$respuesta_c1 = $_POST['respuesta_c1'];
$respuesta_d1 = $_POST['respuesta_d1'];

$respuesta_a2 = $_POST['respuesta_a2'];
$respuesta_b2 = $_POST['respuesta_b2'];
$respuesta_c2 = $_POST['respuesta_c2'];
$respuesta_d2 = $_POST['respuesta_d2'];

$respuesta_a3 = $_POST['respuesta_a3'];
$respuesta_b3 = $_POST['respuesta_b3'];
$respuesta_c3 = $_POST['respuesta_c3'];
$respuesta_d3 = $_POST['respuesta_d3'];

$respuesta_a4 = $_POST['respuesta_a4'];
$respuesta_b4 = $_POST['respuesta_b4'];
$respuesta_c4 = $_POST['respuesta_c4'];
$respuesta_d4 = $_POST['respuesta_d4'];

$texto_a1 = $_POST['texto_a1'];
$texto_b1 = $_POST['texto_b1'];
$texto_c1 = $_POST['texto_c1'];
$texto_d1 = $_POST['texto_d1'];

$texto_a2 = $_POST['texto_a2'];
$texto_b2 = $_POST['texto_b2'];
$texto_c2 = $_POST['texto_c2'];
$texto_d2 = $_POST['texto_d2'];

$texto_a3 = $_POST['texto_a3'];
$texto_b3 = $_POST['texto_b3'];
$texto_c3 = $_POST['texto_c3'];
$texto_d3 = $_POST['texto_d3'];

$texto_a4 = $_POST['texto_a4'];
$texto_b4 = $_POST['texto_b4'];
$texto_c4 = $_POST['texto_c4'];
$texto_d4 = $_POST['texto_d4'];


$link = obrirBD();
updateThink($idEdicion, $pregunta_a, $pregunta_b, $pregunta_c, $pregunta_d, $respuesta_a1, $respuesta_a2, $respuesta_a3, $respuesta_a4, $respuesta_b1, $respuesta_b2, $respuesta_b3, $respuesta_b4, $respuesta_c1, $respuesta_c2, $respuesta_c3, $respuesta_c4, $respuesta_d1, $respuesta_d2, $respuesta_d3, $respuesta_d4, $correcta_a, $correcta_b, $correcta_c, $correcta_d, $texto_a1, $texto_a2, $texto_a3, $texto_a4, $texto_b1, $texto_b2, $texto_b3, $texto_b4, $texto_c1, $texto_c2, $texto_c3, $texto_c4, $texto_d1, $texto_d2, $texto_d3, $texto_d4, $link);
tancarBD($link);

$dir = $_PATH . '/admin/think/?ok&level=' .$level;
header("Location: $dir ");
?>
 