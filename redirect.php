<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_admin.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_edicion.php');

$link = obrirBD();
$access = false;

if (isset($_POST['login'])) {
    $param = 0;
    
    if (isset($_POST['username']) && $_POST['username'] != "") {
	$username = $_POST['username'];
	$param++;
    }
    
    if (isset($_POST['password'])) {
	$password = md5($_POST['password']);
	$param++;
    }
    
    if ($param == 2) {
	if (existsAdminPwd($username, $password, $link)) {
	    $_USUARIO = getAdminByUsername($username, $link);
	    setcookie("idUser", $_USUARIO['id'], time()+(3600*8));
	    setcookie("tokenUser", sha1($_USUARIO['fecha_creacion']), time()+(3600*8));
	    $access = true;
	}
    }
}


if (!$access) {
    $param = 0;
    
    if (isset($_COOKIE['idUser']) && $_COOKIE['idUser'] != "") {
	$id_user = $_COOKIE['idUser'];
	$param++;
    }
    
    if (isset($_COOKIE['tokenUser']) && $_COOKIE['tokenUser'] != "") {
	$token = $_COOKIE['tokenUser'];
	$param++;
    }
    
    if ($param == 2) {
	$_USUARIO = getAdminById($id_user, $link);
	if (sha1($_USUARIO['fecha_creacion']) == $token) {
	    $access = true;
	}
    }
}

if ($access) {
    $_EDICION = 0;
    if (isset($_REQUEST['idEdicion']) && is_numeric($_REQUEST['idEdicion'])) {
		if (existsEdicion($_REQUEST['idEdicion'], $link)) { 
				$_EDICION = getEdicionById($_REQUEST['idEdicion'], $link); 
				setcookie("edicion", $_EDICION['id'], time()+(3600*8));
				 
	 
		}
    } elseif (isset($_COOKIE['edicion']) && $_COOKIE['edicion'] != "" && is_numeric($_COOKIE['edicion'])) {
		if (existsEdicion($_COOKIE['edicion'], $link)) {  
				$_EDICION = getEdicionById($_COOKIE['edicion'], $link);  
		}
    }
	 
	   
    if ($_EDICION == 0) { 
    	$_EDICION = getLastEdicionVisible($link);
		if(existsEdicion($_EDICION['id']+1, $link)) 
			$_EDICION = getEdicionById($_EDICION['id']+1, $link);
		setcookie("edicion", $_EDICION['id'], time()+(3600*8));
		 
	} 
}

tancarBD($link);

if (!$access) {
    require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/logout.php');
}  
?>