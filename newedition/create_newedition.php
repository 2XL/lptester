<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');

require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_edicion.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_swish.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_culture.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_smile.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_expressions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_expressions_quest.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_think.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_grammar.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_news.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_oneliners.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_resume.php');

$fecha = date("Y-m-d", strtotime($_POST['date']));

$titular = $_POST['titular'];
$visible = isset($_POST['visible']) ? 1 : 0;
$descripcion = $_POST['descripcion'];

// aixo cal implementarho en forma d'una transacció

if(isset($_POST['date']) && $_POST['date'] != ""){

$link = obrirBD();

$idEdicion = insertEdicion($fecha, $visible, $titular, $descripcion, $link);

insertSwish($idEdicion, $link);

insertCulture($idEdicion, $link);

insertCultureText($idEdicion, $link);

insertSmile($idEdicion, $link);

if($idEdicion < 5)
	insertExpressions($idEdicion, $link); // insertar todo els camps o sera variable?
else
	insertExpressionsQuest($idEdicion, $link);
insertThink($idEdicion, $link);

insertGrammar($idEdicion, $link);

insertNews($idEdicion, $link);

insertOneLiners($idEdicion, $link);

insertResume($idEdicion, $link);

tancarBD($link);
// crear las carpetas para imagenes e sonido
mkdir($_SERVER['DOCUMENT_ROOT'].$_PATH.'/images/edicion/'.$idEdicion);
mkdir($_SERVER['DOCUMENT_ROOT'].$_PATH.'/media/edicion/'.$idEdicion);

$dir = $_PATH . '/admin/edition/?ok&idEdicion='.$idEdicion;
header("Location: $dir ");
 
}else
{
  
$dir = $_PATH . '/admin/newedition/?error';
header("Location: $dir ");

}
?>
    

              
