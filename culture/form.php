<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/menu.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_culture.php');

$link = obrirBD();
$thisCulture = getCultureVisibleByEdicion_new($_EDICION['id'], $link);
tancarBD($link);
$seccion = array(0, 1, 2, 3);
$secName = array('Music', 'Geography', 'Arts', 'History');
$levName = array(1 => 'Easy', 2 => 'Medium', 3 => 'Hard', 4 => 'Very Difficult');
$level = array(1, 2, 3, 4);

/*
  echo '<pre>';
  print_r($thisCulture);
  echo '</pre>';
 */
?>

<style>
            .options {		
							height:75px;
						}
</style>


<script type="text/javascript">
    function changeSeccion() {
        // cojer el valor del selector
        // 
	var selectorLevel = document.getElementById('seccion_level');
	selectorLevel.selectedIndex = 0;
        var seccion = document.getElementById("culture_seccion")[document.getElementById("culture_seccion").selectedIndex].value;
       
        // 
        var div_a = document.getElementById("sec_0");
        var div_b = document.getElementById("sec_1");
        var div_c = document.getElementById("sec_2");
        var div_d = document.getElementById("sec_3");
        
        // enfuncion level mostrar / ocultar
        
        div_a.style.display = ((seccion == 0) ? "inherit":"none");
        div_b.style.display = seccion == 1 ? "inherit":"none";
        div_c.style.display = seccion == 2 ? "inherit":"none";
        div_d.style.display = seccion == 3 ? "inherit":"none";   
        
        changeLevel(); // actualizar la seeció i deprés actualitzar el nivell
    }

    function changeLevel() {
        // cojer el valor del selector
        // selecciónar el nivell de la secció corresponenet

        var level = document.getElementById("seccion_level")[document.getElementById("seccion_level").selectedIndex].value;
        var seccion = document.getElementById("culture_seccion")[document.getElementById("culture_seccion").selectedIndex].value;

        
 
        if(seccion==0)
        {
            var lev_a1 = document.getElementById("lev_01");
            var lev_a2 = document.getElementById("lev_02");
            var lev_a3 = document.getElementById("lev_03");
            var lev_a4 = document.getElementById("lev_04");
            lev_a1.style.display = level == 1 ? "inherit":"none";
            lev_a2.style.display = level == 2 ? "inherit":"none";
            lev_a3.style.display = level == 3 ? "inherit":"none";
            lev_a4.style.display = level == 4 ? "inherit":"none";
        }
        else
    
        if(seccion==1)
    {
        var lev_b1 = document.getElementById("lev_11");
        var lev_b2 = document.getElementById("lev_12");
        var lev_b3 = document.getElementById("lev_13");
        var lev_b4 = document.getElementById("lev_14");
        lev_b1.style.display = level == 1 ? "inherit":"none";
        lev_b2.style.display = level == 2 ? "inherit":"none";
        lev_b3.style.display = level == 3 ? "inherit":"none";
        lev_b4.style.display = level == 4 ? "inherit":"none";
    }
    else
        if(seccion==2)
    {
        var lev_c1 = document.getElementById("lev_21");
        var lev_c2 = document.getElementById("lev_22");
        var lev_c3 = document.getElementById("lev_23");
        var lev_c4 = document.getElementById("lev_24");
        lev_c1.style.display = level == 1 ? "inherit":"none";
        lev_c2.style.display = level == 2 ? "inherit":"none";
        lev_c3.style.display = level == 3 ? "inherit":"none";
        lev_c4.style.display = level == 4 ? "inherit":"none";
    }
    else
        if(seccion==3)
    {
 
        var lev_d1 = document.getElementById("lev_31");
        var lev_d2 = document.getElementById("lev_32");
        var lev_d3 = document.getElementById("lev_33");
        var lev_d4 = document.getElementById("lev_34");
        lev_d1.style.display = level == 1 ? "inherit":"none";  
        lev_d2.style.display = level == 2 ? "inherit":"none";  
        lev_d3.style.display = level == 3 ? "inherit":"none";  
        lev_d4.style.display = level == 4 ? "inherit":"none"; 
         
    }
    // enfuncion level mostrar / ocultar
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
            1 : 0,
            2 : 1,
            3 : 2,
            4 : 3
        };
        
        var seccion = $_GET['seccion'];
        var level =  levels[$_GET['level']];
        
        var selectorSeccion = document.getElementById('culture_seccion');
        selectorSeccion.selectedIndex = seccion;
        changeSeccion();
        
        var selectorLevel = document.getElementById('seccion_level');
        selectorLevel.selectedIndex = level;
        changeLevel();
    }
</script>

<script type="text/javascript" >
    function submitform()
    {
	document.getElementById("loading").style.display = "inherit";
	document.forms['culture_form'].submit();
    }
</script>

<form name="culture_form" method="POST" id="culture_form" action="save_culture.php" enctype="multipart/form-data">
    <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>">
    <select id="culture_seccion" name="seccion" onchange="javascript:changeSeccion()">
        <option value=0>Music</option>
        <option value=1>Geography</option>
        <option value=2>Arts</option>
        <option value=3>History</option>
    </select>


    <select id="seccion_level" name="level" onchange="javascript:changeLevel()">
        <option value="1">Easy</option>
        <option value="2">Medium</option>
        <option value="3">Hard</option>
        <option value="4">Very Difficult</option>
    </select>





    <?php foreach ($seccion as $sec) { ?>  
        <div id="sec_<?php echo $sec; ?>" <?php if ($sec != 0) echo "style='display:none;'"; ?>>
            <?php foreach ($level as $lev) { ?>  
                <div id="lev_<?php echo $sec . $lev; ?>" <?php if ($lev != 1) echo "style='display:none;'"; ?> >
                    <table class="table_edit">
                        <caption>Culture Vulture: <?php echo $secName[$sec] . ' ' . $levName[$lev]; ?></caption>
                        <tr>
                            <td colspan="3">
                                <?php echo 'Question:' ?>
                                <textarea  name="pregunta_<?php echo $sec . $lev; ?>" >
                                    <?php echo $thisCulture[$sec]['pregunta_' . $lev]; ?>
                                </textarea>
                            </td>
                        </tr> 
                        <tr>
                            <td  style="width:1%;" >Option 1:
                            </td> 
							<td>
								<textarea class="options"  name="respuesta_<?php echo $sec . $lev; ?>1" 
										  ><?php echo $thisCulture[$sec]['respuesta_' . $lev . '1']; ?></textarea>
							</td>	 
                            <td style="width:10px;"><input type="radio" name="correcta_<?php echo $sec . $lev; ?>" value="1"
                                <?php
                                if ($thisCulture[$sec]['correcta_' . $lev] == 1)
                                    echo 'checked';
                                ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Option 2:
                            </td>
							<td>
								<textarea class="options"  name="respuesta_<?php echo $sec . $lev; ?>2" 
										  ><?php echo $thisCulture[$sec]['respuesta_' . $lev . '2']; ?></textarea>
							</td>	 
                    
                            <td><input type="radio" name="correcta_<?php echo $sec . $lev; ?>" value="2"
                                <?php
                                if ($thisCulture[$sec]['correcta_' . $lev] == 2)
                                    echo 'checked';
                                ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
								Option 3:
                            </td>
							<td>
								<textarea class="options"  name="respuesta_<?php echo $sec . $lev; ?>3" 
										  ><?php echo $thisCulture[$sec]['respuesta_' . $lev . '3']; ?></textarea>
							</td>	 
                        
                           
                            <td><input type="radio" name="correcta_<?php echo $sec . $lev; ?>" value="3"
                                <?php
                                if ($thisCulture[$sec]['correcta_' . $lev] == 3)
                                    echo 'checked';
                                ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Option 4:
                            </td>
   							<td>
								<textarea class="options"  name="respuesta_<?php echo $sec . $lev; ?>4" 
										  ><?php echo $thisCulture[$sec]['respuesta_' . $lev . '4']; ?></textarea>
							</td>	 
                 
                            <td><input type="radio" name="correcta_<?php echo $sec . $lev; ?>" value="4"
                                <?php
                                if ($thisCulture[$sec]['correcta_' . $lev] == 4)
                                    echo 'checked';
                                ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Picture:
                            </td>
                            <td colspan="2">
                                <input type="file" id="imagen_<?php echo $sec . $lev; ?>" name="imagen_<?php echo $sec . $lev; ?>">
                            </td>

                        </tr>
                        <?php
                        if (!is_null($thisCulture[$sec]['imagen_' . $lev])) {
                            $UploadDir = $_PATH . '/images/edicion/' . $_EDICION['id'] . '/' . $thisCulture[$sec]['imagen_' . $lev];
                            ?>      
                            <tr>
                                <td>

                                </td>
                                <td colspan="2" >  
                                    
                                    <img src="<?php echo $UploadDir; ?>" width="110" height="140" />
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3">
                                Text
                                <textarea name="texto_<?php echo $sec . $lev; ?>" >
                                    <?php echo $thisCulture[$sec]['texto'][$lev]; ?>
                                </textarea>
                            </td>
                        </tr>
                        <?php if ($sec == 0) { ?>
                            <tr>
                                <td>

                                    Audio: 

                                </td>
                                <td colspan="2">
                                     
                                    <input type="file" id="audio_<?php echo $sec . $lev; ?>" 
                                           name="audio_a<?php echo $lev; ?>">
                                </td>
                            </tr>
                            <?php
                            if (!is_null($thisCulture[$sec]['audio_a' . $lev])) {
                                $audio = explode(".", $thisCulture[$sec]['audio_a' . $lev]);
                                $UploadDir = $_PATH . '/media/edicion/' . $_EDICION['id'] . '/' . $audio[0];
                                ?>   
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td colspan="2">
                                        <audio controls>
                                                
                                              <source src="<?php echo $UploadDir; ?>.ogg" type="audio/ogg">
                                              <source src="<?php echo $UploadDir; ?>.mp3" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                            <!-- 
                                           
                                                <?php
                                                system ('ffmpeg -i /tmp/a.wav -ar 22050 /tmp/a.mp2', $retval); // took from the ffmpeg documentation. it's just an example
                                                // add " > /dev/null &" if you want to execute in background
                                                ?>
                                            -->
                                       </audio>
                                    </td>
                                </tr>
                            <?php } ?>   

                        <?php }// fin if  ?>
                    </table>
                </div>

            <?php }// fin for ?>
        </div>
    <?php }// fin for ?>

    <!-- AUDIO -->
    <table style="width:100%;">
        <tr >
            
            <td>
		<img id="loading" style="display: none;" src="<?php echo $_PATH."/admin/images/loading.gif"; ?>"/>
                <?php if (isset($_GET['ok'])) { ?>
                    <div class='message_ok'> 
                        Saved! 
                        <script type="text/javascript">  
                            setLevel(); 
                        </script> 
                    </div> 
                <?php } ?>
            </td>
            <td  colspan="2" align="right">
                <a class="button-blue" href="javascript:submitform()">Save!</a>
            </td>
        </tr>
    </table>


</form>    

<script type="text/javascript">


var seccion = new Array('0','1','2','3');




for( sec in seccion)
    for ( lev=1; lev<=4 ;lev++ )
{
    
    CKEDITOR.replace('pregunta_'+sec+lev);
    CKEDITOR.replace('texto_'+sec+lev);
}
 
</script>