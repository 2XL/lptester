<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_acceso.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$edition = $_EDICION['id'];


$link = obrirBD();
$edicionIndex =  getLastEdicionVisible($link);
$edicionActual =  $edicionIndex['id'];
 

if($edition==$edicionActual)
{ 
	$captionSpec = 'Edicion actual';
	$color='color:green;';
}elseif ($edition<$edicionActual) {
	$captionSpec = 'Edicion pasada';
	$color='color:red;';
}elseif ($edition>$edicionActual) {
	$captionSpec = 'Edicion futura';
	$color='';
}
				 
?>

<table class="table_edit" name="stats_table" id="stats_table">
    <caption>
		EDICION <?php echo $edition. " - ".date("d-m-Y", strtotime($_EDICION['fecha']));; //fecha ?> 
		<br> 
			<span style="font-size: 20px;<?php echo $color; ?>">
				<?php echo $captionSpec;?> 
			</span>
	</caption>

    <tr>
        <td>
            envios
        </td> 
        <td>
			<?php
			echo getNumEnviosByEdicion($edition, $link);
			?>
        </td>
    </tr>
	<tr>
		<td>
			lecturas correo
		</td>
		<td>
			<?php
			echo getNumLecturasByEdicion($edition, $link);
			?>
		</td> 
	</tr>
 
    <tr>
        <td>
            visitas desde correo
        </td>

        <td>
			<?php
			echo getNumVisitaDesdeCorreoByEdicion($edition, $link);
			?> 
        </td>
    </tr>

    <tr>
        <td>
            visitas fuera correo
        </td>

        <td> 

			<?php
			echo getNumVisitaFueraCorreoByEdicion($edition, $link);
			?>   

        </td>
    </tr>

	<tr>
        <td>
            total visitas
        </td>
        <td>
			<?php
			echo getNumVisitasByEdicion($edition, $link);
			?> 
        </td>
    </tr>
	<tr>
		<td>
			<br>
			<?php
			$timeNowEpoch = time();
			$dti = new DateTime("@$timeNowEpoch");
			$timeNow = $dti->format('Y-m-d H:i:s');
			?>
			<br>
		</td>
	</tr>
</table>


<?php tancarBD($link); ?>