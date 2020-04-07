<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_expressions_quest.php');

$link = obrirBD();
$thisQuest = getExpressionsQuestByEdicion($_EDICION['id'], $link);
tancarBD($link);
 
?>

<script type="text/javascript" >
    
    function submitform()
    {
		document.forms['quest_form'].submit();
    }
</script>

<style>
            .options {		
							height:75px;
						}
</style>

<form name="quest_form" id='quest_form' method="POST" action="save_quest.php">

    <table class="table_edit">
        <caption>Expressions Quests</caption>

        <input type="hidden" name="edicion" value="<?php echo $_EDICION['id']; ?>"> 
 
        <tr>
            <td colspan="2">
				Question:
                <textarea   name="question"><?php echo $thisQuest['question']; ?></textarea>
            </td>
        </tr> 
        <tr>  
			<td style="width: 10px;">
				Option1:
			</td>
			<td>
				<textarea class="options"  name="option1"
						  ><?php echo $thisQuest['option1']; ?></textarea> 
			</td> 
            <td><input type="radio" name="correcta" value="1"

										 <?php
										 if ($thisQuest['correct'] == 1)
											 echo 'checked';
										 ?>

										 ></td>
        </tr>

        <tr> 
			<td>
				Option2:
			</td>
			<td >
				
				<textarea class="options"  name="option2"
						  ><?php echo $thisQuest['option2']; ?></textarea> 
			</td> 
            <td ><input type="radio" name="correcta" value="2"

					   <?php
					   if ($thisQuest['correct'] == 2)
						   echo 'checked';
					   ?>

                       ></td>
        </tr>
        <tr> 
			<td>
				Option3:
			</td>
			<td>
				
		<textarea class="options"  name="option3"
				  ><?php echo $thisQuest['option3']; ?></textarea>  </td>
		<td><input type="radio" name="correcta" value="3"

				   <?php
				   if ($thisQuest['correct'] == 3)
					   echo 'checked';
				   ?>

				   ></td>
        </tr>
        <tr> 
			<td>
			Option4:	
			</td>
			<td>	
				
		<textarea class="options"   name="option4"
				  ><?php echo $thisQuest['option4']; ?></textarea> 
				</td>
		<td><input type="radio" name="correcta" value="4"

				   <?php
				   if ($thisQuest['correct'] == 4)
					   echo 'checked';
				   ?> 
				   ></td>
        </tr> 
 
        <tr>
            <td colspan="2">
				 Description:
                <textarea name="description"><?php echo $thisQuest['description']; ?></textarea>
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
            <td  align="right">
                <a  class="button-blue" href="javascript:submitform()">Save!</a>
            </td>
        </tr>

    </table>


</form>

<script type="text/javascript">
    CKEDITOR.replace("question", {height:"100"});
    CKEDITOR.replace("description");
</script>
