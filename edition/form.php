<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_edicion.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_resume.php');

$link = obrirBD();
$thisResume = getResumeVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);

?>

<script type="text/javascript">
    function save_edition() {
        var date = document.getElementById("date").value;
        var visible = document.getElementById("visible").checked ? 1:0;
        var titular = CKEDITOR.instances.titular.getData();
        var descripcion =      CKEDITOR.instances.descripcion.getData();
        var culture_vulture =  CKEDITOR.instances.culture_vulture.getData();
        var grammar_hammer =   CKEDITOR.instances.grammar_hammer.getData();
        var think_language =   CKEDITOR.instances.think_language.getData();
        
        $.post(
            "ajax_save_edition.php",
            {
                date: date,
                visible: visible,
                titular: titular,
                descripcion: descripcion,
                culture_vulture : culture_vulture,
                grammar_hammer : grammar_hammer,
                think_language : think_language
            },
            function (data){
                var message = document.getElementById("message");
                message.innerHTML = data;
                setTimeout(function(){message.innerHTML = ""}, 5000);
            }
    );
    }
	
	
	function confirmVisible(completo){ 
		var cbox = document.getElementById("visible")
		if( completo == 0 && cbox.checked == true){
		var r=confirm("Aviso: edición no esta completada!"); 
		document.getElementById("visible").checked=r;  
		} 
	}
	
</script>

<form>
    <table class="table_edit">
        <caption>Edition</caption>
        <tr>
            <td style="width:1%;">Date</td>
         
            <td><input class="datepicker" type="text" name="date" id="date" value="<?php if ($_EDICION['fecha'] != "") echo date("d-m-Y", strtotime($_EDICION['fecha'])); ?>"/></td>
        </tr>
        <tr>
            <td colspan="2">
                Titular<br/>
                <textarea name="titular" id="titular"><?php echo $_EDICION['titular']; ?></textarea>
            </td>
            
            
        </tr>
        <tr>
            <td>Visible</td>
      
            <td onclick="confirmVisible(<?php echo $editionEnd; ?>)"><input type="checkbox" id="visible" <?php if ($_EDICION['visible']) { echo "checked"; } ?>/></td>
        </tr>
        <tr>
            <td colspan="2">
                Description<br/>
                <textarea name="descripcion" id="descripcion"><?php echo $_EDICION['descripcion']; ?></textarea>
            </td>
        </tr>


        <tr><td colspan="2"><img src="<?php echo $_PATH . "/images/sections.png"; ?>"/></td></tr>
        <!--
        <tr><td><img src="<?php echo $_PATH . "/images/??.png"; ?>"/></td></tr>
        <tr>
            <td>
                <textarea name="??" id="??" ><?php echo $thisResume['texto_1']; ?></textarea>
            </td>
        </tr>
        -->
        <tr><td colspan="2"><img src="<?php echo $_PATH . "/images/culture_vulture.png"; ?>"/></td></tr>
        <tr>
            <td colspan="2">
                <textarea name="culture_vulture" id="culture_vulture" ><?php echo $thisResume['texto_2']; ?></textarea>
            </td>
        </tr>
        <tr><td colspan="2"><img src="<?php echo $_PATH . "/images/grammar.png"; ?>"/></td></tr>
        <tr>
            <td colspan="2">
                <textarea name="grammar_hammer" id="grammar_hammer" ><?php echo $thisResume['texto_3']; ?></textarea>
            </td>
        </tr>
        <tr><td colspan="2"><img src="<?php echo $_PATH . "/images/think.png"; ?>"/></td></tr>
        <tr>
            <td colspan="2">
                <textarea name="think_language" id="think_language" ><?php echo $thisResume['texto_4']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td align="right" colspan="2">
                <a class="button-blue" href="javascript:save_edition();">Save</a>
            </td>
        </tr>
        <tr>
            <td colspan="2"><div id="message"/></td>
        </tr>
    </table>
</form>


<script>
    CKEDITOR.replace('titular');
    CKEDITOR.replace('descripcion');
    CKEDITOR.replace('culture_vulture');
    CKEDITOR.replace('grammar_hammer');
    CKEDITOR.replace('think_language');
</script>