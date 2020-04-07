<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_edicion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_resume.php');
$param = 0;

if (isset($_POST['date']) && $_POST['date'] != "") {
    $date = date("Y-m-d", strtotime($_POST['date']));
    $param++;
}

if (isset($_POST['visible']) && $_POST['visible'] != "") {
    $visible = $_POST['visible'];
    $param++;
}

if (isset($_POST['titular']) && $_POST['titular'] != "") {
    $titular = $_POST['titular'];
    $param++;
}

if (isset($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion'];
    $param++;
}

 
$texto_1 = "";
$texto_2 = $_POST['culture_vulture'];
$texto_3 = $_POST['grammar_hammer'];
$texto_4 = $_POST['think_language'];
 

if ($param == 4) {
    $link = obrirBD();
    updateEdicion($_EDICION['id'], $date, $visible, $titular, $descripcion, $link);
    updateResume($_EDICION['id'], $texto_1, $texto_2, $texto_3, $texto_4, $link);
    
    tancarBD($link);
    
    
    ?><div class='message_ok'><span><b>Saved!</b></span></div><br><?php
} else {
    ?><div class='message_error'><span><b>Error!</b></span></div><?php
}
?>
