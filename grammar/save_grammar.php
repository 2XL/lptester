<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_grammar.php');

$level = $_POST['level'];

$idEdicion = $_POST['edicion'];
$txt_a = $_POST['texto_a'];
$txt_b = $_POST['texto_b'];
$txt_c = $_POST['texto_c'];
$txt_d = $_POST['texto_d'];
$txt_e = $_POST['texto_e'];

$link = obrirBD();
$result = updateGrammar($idEdicion, $txt_a, $txt_b, $txt_c, $txt_d, $txt_e, $link);
tancarBD($link);
$dir = $_PATH . '/admin/grammar/?ok&level=' .$level;
header("Location: $dir ");
?>
                        



