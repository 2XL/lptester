<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_think.php');

$link = obrirBD();
$thisThink = getThinkVisibleByEdicion($_EDICION['id'], $link);

tancarBD($link);
$lletres = array('a', 'b', 'c', 'd');

?>


<style>
            .options {		
							height:75px;
						}
</style>

<script>
    function changeLevel() {
        // cojer el valor del selector
        // 
        var level = document.getElementById("think_level")[document.getElementById("think_level").selectedIndex].value;
        // 
        var div_a = document.getElementById("div_a");
        var div_b = document.getElementById("div_b");
        var div_c = document.getElementById("div_c");
        var div_d = document.getElementById("div_d");
        
        // enfuncion level mostrar / ocultar
        
        div_a.style.display = ((level == "a") ? "inherit":"none");
        div_b.style.display = level == "b" ? "inherit":"none";
        div_c.style.display = level == "c" ? "inherit":"none";
        div_d.style.display = level == "d" ? "inherit":"none";
        
        
    }
    function $_GET(q,s) { 
        s = s ? s : window.location.search; 
        var re = new RegExp('&'+q+'(?:=([^&]*))?(?=&|$)','i'); 
        return (s=s.replace('/^?/','&').match(re)) ? (typeof s[1] == 'undefined' ? '' : decodeURIComponent(s[1])) : undefined; 
    } 

    function setLevel() {
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }
        var levels = {
            a : 0,
            b : 1,
            c : 2,
            d : 3
        };
        var level =  levels[$_GET['level']];
        var selector = document.getElementById('think_level');
        selector.selectedIndex = level;
        
        changeLevel();
    }
    
</script>

<script type="text/javascript" >
    function submitform()
    {
		document.forms['think_form'].submit();
    }
</script>


<form name="think_form" method="POST" id="think_form" action="save_think.php">


    <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>">


    <select id="think_level" name="level" onchange="javascript:changeLevel();">
        <option value="a">Easy</option>
        <option value="b">Medium</option>
        <option value="c">Hard</option>
        <option value="d">Very difficult</option>
    </select>



	<?php foreach ($lletres as $lletra) { ?>    

		<div id="div_<?php echo $lletra; ?>" <?php if ($lletra != 'a') echo "style='display:none'"; ?> >

			<table class="table_edit" >
				<caption>Think language <?php echo $lletra ?></caption>
				<tr>

					<td colspan="3"> Question: <textarea rows="5" cols="50" name="pregunta_<?php echo $lletra; ?>" ><?php echo $thisThink['pregunta_' . $lletra]; ?></textarea></td>

				</tr>

				<tr>
					<td style="width:10px;" >Option1:  </td>
					<td>
						<textarea class="options" name="respuesta_<?php echo $lletra; ?>1"><?php echo $thisThink['respuesta_' . $lletra . '1']; ?></textarea>
					</td>
					<td style="width:10px;" ><input type="radio" name="correcta_<?php echo $lletra; ?>" value="1"  <?php if ($thisThink['correcta_' . $lletra] == 1) echo 'checked'; ?>>   </td>
				</tr>
				<tr>       
					<td colspan="3"> Explanation 1: <textarea rows="5" cols="50" name="texto_<?php echo $lletra; ?>1" ><?php echo $thisThink['texto_' . $lletra . '1']; ?></textarea></td>
				</tr>

				<tr>
					<td>Option2: </td>
					<td >
						<textarea class="options" name="respuesta_<?php echo $lletra; ?>2"><?php echo $thisThink['respuesta_' . $lletra . '2']; ?></textarea> 
					</td>
					<td ><input type="radio" name="correcta_<?php echo $lletra; ?>" value="2" <?php if ($thisThink['correcta_' . $lletra] == 2) echo 'checked'; ?>>    </td>
				</tr>
				<tr>       
					<td colspan="3"> Explanation 2: <textarea rows="5" cols="50" name="texto_<?php echo $lletra; ?>2"><?php echo $thisThink['texto_' . $lletra . '2']; ?></textarea></td>
				</tr>
				<tr>
					<td>Option3: </td>  
					<td>
						<textarea class="options" name="respuesta_<?php echo $lletra; ?>3"><?php echo $thisThink['respuesta_' . $lletra . '3']; ?></textarea>
					</td>
					<td><input type="radio" name="correcta_<?php echo $lletra; ?>" value="3" <?php if ($thisThink['correcta_' . $lletra] == 3) echo 'checked'; ?>></td>
				</tr>
				<tr>       
					<td colspan="3"> Explanation 3: <textarea rows="5" cols="50" name="texto_<?php echo $lletra; ?>3"><?php echo $thisThink['texto_' . $lletra . '3']; ?></textarea></td>
				</tr>
				<tr>
					<td>Option4: </td>
					<td>
						<textarea class="options" name="respuesta_<?php echo $lletra; ?>4"><?php echo $thisThink['respuesta_' . $lletra . '4']; ?></textarea>
					</td>   
					<td><input type="radio" name="correcta_<?php echo $lletra; ?>" value="4" <?php if ($thisThink['correcta_' . $lletra] == 4) echo 'checked'; ?>>  </td>

				</tr>
				<tr>       
					<td colspan="3"> Explanation 4: <textarea rows="5" cols="50" name="texto_<?php echo $lletra; ?>4"><?php echo $thisThink['texto_' . $lletra . '4']; ?></textarea></td>
				</tr>
			</table>
		</div>

	<?php } ?>

    <table class="table_edit" >
        <tr>

            <td>
				<?php if (isset($_GET['ok'])) { ?>
					<div class='message_ok'> 
						Saved! 
						<script type="text/javascript">  
							setLevel(); 
						</script> 
					</div> 
				<?php } ?>
            </td>
            <td align="right">
                <a  class="button-blue" href="javascript:submitform()">Save!</a>
			</td>
        </tr>
    </table>






</form>

<script type="text/javascript">

	var heigth_pregunta=100; 
	var heigth_texto=200;
	
	CKEDITOR.replace("pregunta_a", {height:heigth_pregunta});
	CKEDITOR.replace("pregunta_b", {height:heigth_pregunta});
	CKEDITOR.replace("pregunta_c", {height:heigth_pregunta});
	CKEDITOR.replace("pregunta_d", {height:heigth_pregunta});
    CKEDITOR.replace("texto_a1",  {height:heigth_texto});
    CKEDITOR.replace("texto_b1",  {height:heigth_texto});
    CKEDITOR.replace("texto_c1",  {height:heigth_texto});
    CKEDITOR.replace("texto_d1",  {height:heigth_texto});
    CKEDITOR.replace("texto_a2",  {height:heigth_texto});
    CKEDITOR.replace("texto_b2",  {height:heigth_texto});
    CKEDITOR.replace("texto_c2",  {height:heigth_texto});
    CKEDITOR.replace("texto_d2",  {height:heigth_texto});
    CKEDITOR.replace("texto_a3",  {height:heigth_texto});
    CKEDITOR.replace("texto_b3",  {height:heigth_texto});
    CKEDITOR.replace("texto_c3",  {height:heigth_texto});
    CKEDITOR.replace("texto_d3",  {height:heigth_texto});
    CKEDITOR.replace("texto_a4",  {height:heigth_texto});
    CKEDITOR.replace("texto_b4",  {height:heigth_texto});
    CKEDITOR.replace("texto_c4",  {height:heigth_texto});
    CKEDITOR.replace("texto_d4",  {height:heigth_texto});
</script>
