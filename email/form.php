<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
?>



<?php
 if(isset($_GET['email'])) 
     $email=$_GET['email'];
?>
<script type="text/javascript">

function update_email(){

    var id = document.getElementById('e-id').value;
    var email = document.getElementById('e-mail').value;
    var activo = document.getElementById('e-activo').checked ? 1 : 0;
    
    $.post(
        "save_email.php",
            {
                  id : id,
                  email : email,
                  activo : activo
            },
                function (data)
                {
                    var formulario = document.getElementById("formulario");
                    formulario.innerHTML = data;
                    setTimeout(function(){formulario.innerHTML = ""}, 5000);
                }
        
        );
}

function find_email(){
    
    var email = document.getElementById("email").value;
        $.post(
            "ajax_update_email.php", 
                {
                   email : email  
                }, 
                    function (data)
                    {
                        var formulario = document.getElementById("formulario");
                        formulario.innerHTML = data;
                  
                    }
            ); 
}


function add_email(){
  
    var email = document.getElementById("email").value;
    var formulario = document.getElementById("formulario");
    formulario.innerHTML="o.O'";
    
    $.post(
            "ajax_insert_email.php", 
                {
                   email : email  
                }, 
                    function (data)
                    {
                        var formulario = document.getElementById("formulario");
                        formulario.innerHTML = data;
                    }
            ); 
}






</script>


<form>
    <table class="table_edit">
        <caption>Newsletter</caption>
        <tr>
            <td>
              E-mail:
            </td>
            <td>
                <input type="text" name="email" id="email" >
            </td>
             <td> 
                 <a  class="button-blue" href="javascript:find_email();" >Find</a>
            </td>
            <td>
                 <a class="button-blue" href="javascript:add_email()" > Add </a>
            </td>
            <td>
                <?php // check if already exist per get return warning ?> 
            </td>
            
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="4"><div id="formulario"/></td>
        </tr>
    </table>
</form>




