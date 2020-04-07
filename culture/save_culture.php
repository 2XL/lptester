<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_culture.php');

function updateFile($type, $idEdicion, $section, $level, $name, $PATH, $link) {
    
    $fileName =  str_replace(' ', '_', $name["name"]);
    
    
    $UploadDir = $_SERVER['DOCUMENT_ROOT'] . $PATH . '/' . $type . '/edicion/' . $idEdicion . '/' . $fileName;
    // echo $UploadDir.' this is the upload dir';

    if ($name["error"] > 0) {
        //echo "Error: " . $name["error"] . "<br>";
    } else {
        move_uploaded_file($name["tmp_name"], $UploadDir);
        if ($type == "images")
            updateCultureImage($idEdicion, $section, $level, $fileName, $link);
        else
        if ($type == "media")
            updateCultureAudio($idEdicion, $section, $level, $fileName, $link);
    }
}

$idEdicion = $_POST['edicion'];

// init transaccion
$link = obrirBD();

//--- A
$pregunta_a1 = $_POST['pregunta_01'];
$pregunta_a2 = $_POST['pregunta_02'];
$pregunta_a3 = $_POST['pregunta_03'];
$pregunta_a4 = $_POST['pregunta_04'];

$correcta_a1 = $_POST['correcta_01'];
$correcta_a2 = $_POST['correcta_02'];
$correcta_a3 = $_POST['correcta_03'];
$correcta_a4 = $_POST['correcta_04'];

$respuesta_a11 = $_POST['respuesta_011'];
$respuesta_a21 = $_POST['respuesta_021'];
$respuesta_a31 = $_POST['respuesta_031'];
$respuesta_a41 = $_POST['respuesta_041'];

$respuesta_a12 = $_POST['respuesta_012'];
$respuesta_a22 = $_POST['respuesta_022'];
$respuesta_a32 = $_POST['respuesta_032'];
$respuesta_a42 = $_POST['respuesta_042'];

$respuesta_a13 = $_POST['respuesta_013'];
$respuesta_a23 = $_POST['respuesta_023'];
$respuesta_a33 = $_POST['respuesta_033'];
$respuesta_a43 = $_POST['respuesta_043'];

$respuesta_a14 = $_POST['respuesta_014'];
$respuesta_a24 = $_POST['respuesta_024'];
$respuesta_a34 = $_POST['respuesta_034'];
$respuesta_a44 = $_POST['respuesta_044'];

$texto_a1 = $_POST['texto_01'];
$texto_a2 = $_POST['texto_02'];
$texto_a3 = $_POST['texto_03'];
$texto_a4 = $_POST['texto_04'];

$imagen_a1 = $_FILES['imagen_01'];
$imagen_a2 = $_FILES['imagen_02'];
$imagen_a3 = $_FILES['imagen_03'];
$imagen_a4 = $_FILES['imagen_04'];

$audio_a1 = $_FILES['audio_a1'];
$audio_a2 = $_FILES['audio_a2'];
$audio_a3 = $_FILES['audio_a3'];
$audio_a4 = $_FILES['audio_a4'];

updateCultureSeccionA($idEdicion, $pregunta_a1, $pregunta_a2, $pregunta_a3, $pregunta_a4, $respuesta_a11, $respuesta_a12, $respuesta_a13, $respuesta_a14, $respuesta_a21, $respuesta_a22, $respuesta_a23, $respuesta_a24, $respuesta_a31, $respuesta_a32, $respuesta_a33, $respuesta_a34, $respuesta_a41, $respuesta_a42, $respuesta_a43, $respuesta_a44, $correcta_a1, $correcta_a2, $correcta_a3, $correcta_a4, $link);
// 
// updateFile($typeFolder, $idEdicion, $section, $level, $name, $PATH, $link)
updateFile("media", $idEdicion, '0', '1', $audio_a1, $_PATH, $link);
updateFile("media", $idEdicion, '0', '2', $audio_a2, $_PATH, $link);
updateFile("media", $idEdicion, '0', '3', $audio_a3, $_PATH, $link);
updateFile("media", $idEdicion, '0', '4', $audio_a4, $_PATH, $link);

updateFile("images", $idEdicion, '0', '1', $imagen_a1, $_PATH, $link);
updateFile("images", $idEdicion, '0', '2', $imagen_a2, $_PATH, $link);
updateFile("images", $idEdicion, '0', '3', $imagen_a3, $_PATH, $link);
updateFile("images", $idEdicion, '0', '4', $imagen_a4, $_PATH, $link);

updateSectionText($idEdicion, 'a', '1', $texto_a1, $link);
updateSectionText($idEdicion, 'a', '2', $texto_a2, $link);
updateSectionText($idEdicion, 'a', '3', $texto_a3, $link);
updateSectionText($idEdicion, 'a', '4', $texto_a4, $link);

//--- fin A
//--- B

$pregunta_b1 = $_POST['pregunta_11'];
$pregunta_b2 = $_POST['pregunta_12'];
$pregunta_b3 = $_POST['pregunta_13'];
$pregunta_b4 = $_POST['pregunta_14'];

$correcta_b1 = $_POST['correcta_11'];
$correcta_b2 = $_POST['correcta_12'];
$correcta_b3 = $_POST['correcta_13'];
$correcta_b4 = $_POST['correcta_14'];

$respuesta_b11 = $_POST['respuesta_111'];
$respuesta_b21 = $_POST['respuesta_121'];
$respuesta_b31 = $_POST['respuesta_131'];
$respuesta_b41 = $_POST['respuesta_141'];

$respuesta_b12 = $_POST['respuesta_112'];
$respuesta_b22 = $_POST['respuesta_122'];
$respuesta_b32 = $_POST['respuesta_132'];
$respuesta_b42 = $_POST['respuesta_142'];

$respuesta_b13 = $_POST['respuesta_113'];
$respuesta_b23 = $_POST['respuesta_123'];
$respuesta_b33 = $_POST['respuesta_133'];
$respuesta_b43 = $_POST['respuesta_143'];

$respuesta_b14 = $_POST['respuesta_114'];
$respuesta_b24 = $_POST['respuesta_124'];
$respuesta_b34 = $_POST['respuesta_134'];
$respuesta_b44 = $_POST['respuesta_144'];

$texto_b1 = $_POST['texto_11'];
$texto_b2 = $_POST['texto_12'];
$texto_b3 = $_POST['texto_13'];
$texto_b4 = $_POST['texto_14'];

$imagen_b1 = $_FILES['imagen_11'];
$imagen_b2 = $_FILES['imagen_12'];
$imagen_b3 = $_FILES['imagen_13'];
$imagen_b4 = $_FILES['imagen_14'];

updateCultureSeccionB($idEdicion, $pregunta_b1, $pregunta_b2, $pregunta_b3, $pregunta_b4, $respuesta_b11, $respuesta_b12, $respuesta_b13, $respuesta_b14, $respuesta_b21, $respuesta_b22, $respuesta_b23, $respuesta_b24, $respuesta_b31, $respuesta_b32, $respuesta_b33, $respuesta_b34, $respuesta_b41, $respuesta_b42, $respuesta_b43, $respuesta_b44, $correcta_b1, $correcta_b2, $correcta_b3, $correcta_b4, $link);

updateFile("images", $idEdicion, '1', '1', $imagen_b1, $_PATH, $link);
updateFile("images", $idEdicion, '1', '2', $imagen_b2, $_PATH, $link);
updateFile("images", $idEdicion, '1', '3', $imagen_b3, $_PATH, $link);
updateFile("images", $idEdicion, '1', '4', $imagen_b4, $_PATH, $link);

updateSectionText($idEdicion, 'b', '1', $texto_b1, $link);
updateSectionText($idEdicion, 'b', '2', $texto_b2, $link);
updateSectionText($idEdicion, 'b', '3', $texto_b3, $link);
updateSectionText($idEdicion, 'b', '4', $texto_b4, $link);

//--- fin B
//
//
//--- C
$pregunta_c1 = $_POST['pregunta_21'];
$pregunta_c2 = $_POST['pregunta_22'];
$pregunta_c3 = $_POST['pregunta_23'];
$pregunta_c4 = $_POST['pregunta_24'];

$correcta_c1 = $_POST['correcta_21'];
$correcta_c2 = $_POST['correcta_22'];
$correcta_c3 = $_POST['correcta_23'];
$correcta_c4 = $_POST['correcta_24'];

$respuesta_c11 = $_POST['respuesta_211'];
$respuesta_c21 = $_POST['respuesta_221'];
$respuesta_c31 = $_POST['respuesta_231'];
$respuesta_c41 = $_POST['respuesta_241'];

$respuesta_c12 = $_POST['respuesta_212'];
$respuesta_c22 = $_POST['respuesta_222'];
$respuesta_c32 = $_POST['respuesta_232'];
$respuesta_c42 = $_POST['respuesta_242'];

$respuesta_c13 = $_POST['respuesta_213'];
$respuesta_c23 = $_POST['respuesta_223'];
$respuesta_c33 = $_POST['respuesta_233'];
$respuesta_c43 = $_POST['respuesta_243'];

$respuesta_c14 = $_POST['respuesta_214'];
$respuesta_c24 = $_POST['respuesta_224'];
$respuesta_c34 = $_POST['respuesta_234'];
$respuesta_c44 = $_POST['respuesta_244'];

$texto_c1 = $_POST['texto_21'];
$texto_c2 = $_POST['texto_22'];
$texto_c3 = $_POST['texto_23'];
$texto_c4 = $_POST['texto_24'];

$imagen_c1 = $_FILES['imagen_21'];
$imagen_c2 = $_FILES['imagen_22'];
$imagen_c3 = $_FILES['imagen_23'];
$imagen_c4 = $_FILES['imagen_24'];

updateCultureSeccionC($idEdicion, $pregunta_c1, $pregunta_c2, $pregunta_c3, $pregunta_c4, $respuesta_c11, $respuesta_c12, $respuesta_c13, $respuesta_c14, $respuesta_c21, $respuesta_c22, $respuesta_c23, $respuesta_c24, $respuesta_c31, $respuesta_c32, $respuesta_c33, $respuesta_c34, $respuesta_c41, $respuesta_c42, $respuesta_c43, $respuesta_c44, $correcta_c1, $correcta_c2, $correcta_c3, $correcta_c4, $link);

updateFile("images", $idEdicion, '2', '1', $imagen_c1, $_PATH, $link);
updateFile("images", $idEdicion, '2', '2', $imagen_c2, $_PATH, $link);
updateFile("images", $idEdicion, '2', '3', $imagen_c3, $_PATH, $link);
updateFile("images", $idEdicion, '2', '4', $imagen_c4, $_PATH, $link);

updateSectionText($idEdicion, 'c', '1', $texto_c1, $link);
updateSectionText($idEdicion, 'c', '2', $texto_c2, $link);
updateSectionText($idEdicion, 'c', '3', $texto_c3, $link);
updateSectionText($idEdicion, 'c', '4', $texto_c4, $link);
//--- fin A
//--- D

$pregunta_d1 = $_POST['pregunta_31'];
$pregunta_d2 = $_POST['pregunta_32'];
$pregunta_d3 = $_POST['pregunta_33'];
$pregunta_d4 = $_POST['pregunta_34'];

$correcta_d1 = $_POST['correcta_31'];
$correcta_d2 = $_POST['correcta_32'];
$correcta_d3 = $_POST['correcta_33'];
$correcta_d4 = $_POST['correcta_34'];

$respuesta_d11 = $_POST['respuesta_311'];
$respuesta_d21 = $_POST['respuesta_321'];
$respuesta_d31 = $_POST['respuesta_331'];
$respuesta_d41 = $_POST['respuesta_341'];

$respuesta_d12 = $_POST['respuesta_312'];
$respuesta_d22 = $_POST['respuesta_322'];
$respuesta_d32 = $_POST['respuesta_332'];
$respuesta_d42 = $_POST['respuesta_342'];

$respuesta_d13 = $_POST['respuesta_313'];
$respuesta_d23 = $_POST['respuesta_323'];
$respuesta_d33 = $_POST['respuesta_333'];
$respuesta_d43 = $_POST['respuesta_343'];

$respuesta_d14 = $_POST['respuesta_314'];
$respuesta_d24 = $_POST['respuesta_324'];
$respuesta_d34 = $_POST['respuesta_334'];
$respuesta_d44 = $_POST['respuesta_344'];

$texto_d1 = $_POST['texto_31'];
$texto_d2 = $_POST['texto_32'];
$texto_d3 = $_POST['texto_33'];
$texto_d4 = $_POST['texto_34'];

$imagen_d1 = $_FILES['imagen_31'];
$imagen_d2 = $_FILES['imagen_32'];
$imagen_d3 = $_FILES['imagen_33'];
$imagen_d4 = $_FILES['imagen_34'];

updateCultureSeccionD($idEdicion, $pregunta_d1, $pregunta_d2, $pregunta_d3, $pregunta_d4, $respuesta_d11, $respuesta_d12, $respuesta_d13, $respuesta_d14, $respuesta_d21, $respuesta_d22, $respuesta_d23, $respuesta_d24, $respuesta_d31, $respuesta_d32, $respuesta_d33, $respuesta_d34, $respuesta_d41, $respuesta_d42, $respuesta_d43, $respuesta_d44, $correcta_d1, $correcta_d2, $correcta_d3, $correcta_d4, $link);

updateFile("images", $idEdicion, '3', '1', $imagen_d1, $_PATH, $link);
updateFile("images", $idEdicion, '3', '2', $imagen_d2, $_PATH, $link);
updateFile("images", $idEdicion, '3', '3', $imagen_d3, $_PATH, $link);
updateFile("images", $idEdicion, '3', '4', $imagen_d4, $_PATH, $link);

updateSectionText($idEdicion, 'd', '1', $texto_d1, $link);
updateSectionText($idEdicion, 'd', '2', $texto_d2, $link);
updateSectionText($idEdicion, 'd', '3', $texto_d3, $link);
updateSectionText($idEdicion, 'd', '4', $texto_d4, $link);

$level = $_POST['level'];
$seccion = $_POST['seccion'];

//--- fin D
tancarBD($link);
// fin transaction
# $result = updateCulture( );

$dir = $_PATH . '/admin/culture/?ok&level='.$level.'&seccion='.$seccion;
header("Location: $dir ");
?>
                        
