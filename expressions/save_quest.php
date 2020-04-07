<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_expressions_quest.php');

$idEdicion = $_POST['edicion'];
$pregunta = $_POST['question'];
$respuesta1 = $_POST['option1'];
$respuesta2 = $_POST['option2'];
$respuesta3 = $_POST['option3'];
$respuesta4 = $_POST['option4'];
$correcta = $_POST['correcta'];
$descripcion = $_POST['description'];

$link = obrirBD();
$result = updateExpressionsQuest($idEdicion, $pregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $correcta, $descripcion, $link);
tancarBD($link);

$dir = $_PATH . '/admin/expressions/?ok';
header("Location: $dir ");

echo '<br>' . $result;
?>
             