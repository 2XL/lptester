<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'].$_PATH.'/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_news.php');

$link = obrirBD();
$thisNews = getNewsVisibleByEdicion($_EDICION['id'], $link);
tancarBD($link);
?>

<?php
// echo '<pre>';
// print_r($thisNews);
// echo '</pre>';
// http://www.w3schools.com/php/php_file_upload.asp
?>

<script type="text/javascript" >
    function submitform()
    {
       document.forms['news_form'].submit();
    }
</script>

<form name="news_form" method="POST" id="news_form" action="save_news.php" enctype="multipart/form-data">

    <table class="table_edit" >
        <caption>LP Comment</caption>

        <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>"> 

        <tr>
            <td style="width:1%;">Titol: </td>
            <td><input type="text" name="titulo" value="<?php echo $thisNews['titulo']; ?>"></td>
        </tr>
        <tr>

            <td colspan="2"> 
                Text:  
                <textarea rows="5" cols="50" name="texto">
                    <?php echo $thisNews['texto']; ?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td >Picture: </td>
            <td><input type="file" id="file" name="file"></td>
        </tr>

        <?php
        if (!is_null($thisNews['imagen'])) {
            $UploadDir = $_PATH . '/images/edicion/' . $_EDICION['id'] . '/' . $thisNews['imagen'];
            ?>      
        <tr>
            <td>

            </td>
            <td >  
                <img src="<?php echo $UploadDir; ?>" width="110" height="140" />
            </td>
        </tr>
        <?php } ?>

        </tr>
        <tr>
         
            <td>
                <?php
                if (isset($_GET['ok'])) {
                    echo "<div class='message_ok' > Saved! </div>";
                }
                ?>
            </td>
               <td align="right">
        
                <a  class="button-blue" href="javascript:submitform()">Save!</a>
            </td>
        </tr>
    </table>


</form>

<script type="text/javascript">

    CKEDITOR.replace("texto", {height:"400"});
   
</script>
