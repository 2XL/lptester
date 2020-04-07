<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/bd/bd_edicion.php');

/*
$link = obrirBD();
$last_edition = getLastEdicionVisible($link);
tancarBD($link);

$warning = "";
if ($_EDICION != $edicion['id']) {
    $warning = "Warning: You are not editing the last edition";
}

if ($_EDICION == $last_edition['id']) {
    $warning = "Warning: You are editing the current edition";
}
*/
?>

<div id="header">
    <table style="width: 100%;">
	<tr style="height: 27px;">
	    <td><span id="datetime"><?php whats_the_time(); ?></span></td>
	    <td></td>
	    <td align="right">
		<span>Welcome, <strong><?php echo $_USUARIO['username']; ?></strong></span>
		<span>|</span>
		<a href="<?php echo $_PATH."/admin/logout.php"; ?>" class="logout">Logout</a>
	    </td>
	</tr>
	<tr style="height: 77px;">
	    <td>
		<a href="<?php echo $_PATH."/admin"; ?>" class="logo"><?php echo $_WEBNAME; ?></a>
	    </td>

	    <td style="vertical-align: bottom;">
		<span style="font-size: x-large;">
		    <b><?php echo "Ed. ".$_EDICION['id']." - ".date("d-m-Y", strtotime($_EDICION['fecha'])); ?></b>
			<a href="<?php echo $_PATH."/?id=".$_EDICION['id'].'&key='.  md5($_EDICION['id']); ?>" target="_blank" alt="web preview" title="web preview">
			<img src="<?php echo $_PATH."/admin/images/preview.png"; ?>" alt="web preview" title="web preview"/>
		    </a>
		</span>
	    </td>
	    
	    <td align="right" style="vertical-align: top;">
		<table id="header_menu">
		    <tr>
                        <td class="first"><a href="<?php echo $_PATH."/admin/email"; ?>">Newsletter</a></td>
			<td><a href="<?php echo $_PATH."/admin/newedition"; ?>">New edition</a></td>
		    </tr>
		</table>
	    </td>
	</tr>
    </table>
</div>