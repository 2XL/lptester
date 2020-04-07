<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_news.php');


$idEdicion = $_POST['edicion'];
$texto = $_POST['texto'];
$titulo = $_POST['titulo'];


if ($_FILES["file"]["error"] > 0) {
    // echo "Error: " . $_FILES["file"]["error"] . "<br>"; DEBUG !
} else {
    move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $_PATH . '/images/edicion/' . $idEdicion . '/' . $_FILES["file"]["name"]);
    $imagen = $_FILES["file"]["name"];
    $link = obrirBD();
    $result = updateNewsImagen($idEdicion, $imagen, $link);
    tancarBD($link);
}

$link = obrirBD();

$result = updateNews($idEdicion, $titulo, $texto, $link);

tancarBD($link);

$dir = $_PATH . '/admin/news/?ok';
header("Location: $dir ");
?>
 