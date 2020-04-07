<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_grammar.php');

$link = obrirBD();
$thisGrammar = getGrammarVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);
?>



<script>
    function changeLevel() {
        // cojer el valor del selector
        // 
        // alert("hola");
        var level = document.getElementById("grammar_level")[document.getElementById("grammar_level").selectedIndex].value;
        // 
        var div_a = document.getElementById("div_a");
        var div_b = document.getElementById("div_b");
        var div_c = document.getElementById("div_c");
        var div_d = document.getElementById("div_d");
        var div_e = document.getElementById("div_e");
        
        // enfuncion level mostrar / ocultar
        
        div_a.style.display = ((level == "a") ? "inherit":"none");
        div_b.style.display = level == "b" ? "inherit":"none";
        div_c.style.display = level == "c" ? "inherit":"none";
        div_d.style.display = level == "d" ? "inherit":"none";
        div_e.style.display = level == "e" ? "inherit":"none";
        
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
            d : 3,
            e : 4
        };
        var level =  levels[$_GET['level']];
        var selector = document.getElementById('grammar_level');
        selector.selectedIndex = level;
        changeLevel();
    }
  
    
</script>

<script type="text/javascript" >
    function submitform()
    {
        document.forms['grammar_form'].submit();
    }
</script>

<form name="grammar_form" method="POST" id="grammar_form" action="save_grammar.php">
    <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>">

    <select id="grammar_level" name="level" onchange="javascript:changeLevel();">
        <option value="a">Elementary</option>
        <option value="b">Pre-intermediate</option>
        <option value="c">Intermediate</option>
        <option value="d">Advanced</option>
        <option value="e">Native</option>
    </select>

    <div id="div_a" > 
        <table class="table_edit" name="x">
            <caption>Grammar under the hammer</caption>
            <tr>
                <td> Elementary: </td>
            </tr><tr>
                <td>
                    <textarea rows="5" cols="50" name="texto_a"><?php echo $thisGrammar['texto_a']; ?></textarea>
                </td>

            </tr>
        </table>
    </div> 
    <div id="div_b" style="display:none" >
        <table class="table_edit" name="x">
            <caption>Grammar under the hammer</caption>
            <tr>
                <td>Pre-intermediate:</td>
            </tr><tr>
                <td>
                    <textarea rows="5" cols="50" name="texto_b"><?php echo $thisGrammar['texto_b']; ?></textarea>
                </td>

            </tr>
        </table>
    </div>   
    <div id="div_c" style="display:none" >
        <table class="table_edit" name="x">
            <caption>Grammar under the hammer</caption>
            <tr>
                <td>Intermediate:</td>
            </tr><tr>
                <td>
                    <textarea rows="5" cols="50" name="texto_c"><?php echo $thisGrammar['texto_c']; ?></textarea>
                </td>

            </tr>
        </table>
    </div>
    <div id="div_d" style="display:none" >
        <table class="table_edit" name="x">
            <caption>Grammar under the hammer</caption>
            <tr>
                <td>Advanced:</td>
            </tr><tr>
                <td>
                    <textarea rows="5" cols="50" name="texto_d"><?php echo $thisGrammar['texto_d']; ?></textarea>
                </td>
            </tr>
        </table>
    </div> 
    <div id="div_e" style="display:none" >
        <table class="table_edit" name="x">
            <caption>Grammar under the hammer</caption>
            <tr>
                <td>Native:</td>
            </tr><tr>
                <td>
                    <textarea rows="5" cols="50" name="texto_e"><?php echo $thisGrammar['texto_e']; ?></textarea>
                </td>

            </tr> 
        </table>
    </div>

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
    CKEDITOR.replace("texto_a");
    CKEDITOR.replace("texto_b");
    CKEDITOR.replace("texto_c");
    CKEDITOR.replace("texto_d");
    CKEDITOR.replace("texto_e");
</script>
