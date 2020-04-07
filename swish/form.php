<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_swish.php');

$link = obrirBD();
$thisSwish = getSwishVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);
?>

<style>
	.options {		
		height:75px;
	}
</style>

<script type="text/javascript" >
    
    function submitform()
    {
		document.forms['swish_form'].submit();
    }
</script>


<form name="swish_form" id='swish_form' method="POST" action="save_swish.php">

    <table class="table_edit" >
        <caption>SWISH</caption>

        <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>"> 
 
         
        <tr>
            <td colspan="3">
				Question: 
                <textarea  name="pregunta"><?php echo $thisSwish['pregunta']; ?></textarea>
            </td>
        </tr>

        <tr>

            <td style="width:1px;">Option1: </td>
			<td>
				<textarea class="options"  name="respuesta1" 
						  ><?php echo $thisSwish['respuesta1']; ?></textarea>
			</td> 
 
            <td style="width:1px;"><input type="radio" name="correcta" value="1"

										 <?php
										 if ($thisSwish['correcta'] == 1)
											 echo 'checked';
										 ?>

										 ></td>
        </tr>

        <tr>
            <td>Option2: </td>
			<td>
				<textarea class="options"  name="respuesta2" 
						  ><?php echo $thisSwish['respuesta2']; ?></textarea>
			</td> 
            <td><input type="radio" name="correcta" value="2"

					   <?php
					   if ($thisSwish['correcta'] == 2)
						   echo 'checked';
					   ?>

                       ></td>
        </tr>
        <tr>
            <td>Option3: </td>
			<td>
				<textarea class="options"  name="respuesta3" 
						  ><?php echo $thisSwish['respuesta3']; ?></textarea>
			</td> 
            <td><input type="radio" name="correcta" value="3"

					   <?php
					   if ($thisSwish['correcta'] == 3)
						   echo 'checked';
					   ?>

                       ></td>
        </tr>
        <tr>
            <td>Option4: </td>
			<td>
				<textarea class="options"  name="respuesta4" 
						  ><?php echo $thisSwish['respuesta4']; ?></textarea>
			</td> 
            <td><input type="radio" name="correcta" value="4"

					   <?php
					   if ($thisSwish['correcta'] == 4)
						   echo 'checked';
					   ?>

                       ></td>
        </tr>

 
        <tr>
            <td colspan="3">
				Description:
                <textarea  name="descripcion"><?php echo $thisSwish['descripcion']; ?></textarea>
            </td>
        </tr>
        <tr>

            <td>
				<?php
				if (isset($_GET['ok'])) {
					echo "<div class='message_ok' > Saved! </div>";
				}
				?>
            </td>
            <td colspan="2" align="right">
                <a  class="button-blue" href="javascript:submitform()">Save!</a>
              
            </td>
        </tr>

    </table>


</form>

<script type="text/javascript">
    CKEDITOR.replace("pregunta", {height:"100"});
    CKEDITOR.replace("descripcion");
</script>
