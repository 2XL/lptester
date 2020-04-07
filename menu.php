<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_moondaytimes.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/admin/redirect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_edicion.php');

$link = obrirBD();

$ediciones = getEdiciones($link);

$swishEnd = isFinished_Swish($_EDICION['id'], $link);
$cultureEnd = isFinished_CultureVulture($_EDICION['id'], $link);
$smileEnd = isFinished_Smile4While($_EDICION['id'], $link);
$expressionsEnd = $_EDICION['id'] < 5 ? isFinished_ForeignWenX($_EDICION['id'], $link) 
		: isFinished_ForeignWenXQuests($_EDICION['id'], $link);
$thinkEnd = isFinished_ThinkLang($_EDICION['id'], $link);
$grammarEnd = isFinished_GrammarUnHammer($_EDICION['id'], $link);
$newsEnd = isFinished_LPComment($_EDICION['id'], $link);
$onelinersEnd = isFinished_Oneliners($_EDICION['id'], $link);
$editionEnd =(	$swishEnd + 
				$cultureEnd + 
				$smileEnd +
				$expressionsEnd + 
				$thinkEnd + 
				$grammarEnd + 
				$newsEnd + 
				$onelinersEnd	
			) == 8 ? 1 : 0;

$url = explode("/", $_SERVER['PHP_SELF']);
$menu = $url[count($url) - 2];
?>


<table id="change_edition">
    <tr>
        <td>Change edition</td>
        <td>
            <form id="edition_form" action="<?php echo $_PATH . "/admin"; ?>" method="get">
                <select name="idEdicion" onchange="javascript:document.forms['edition_form'].submit();" style="width: 100%;">
                    <?php
						foreach ($ediciones as $edicion) {
							if ($edicion['id'] == $_EDICION['id']) {
								?><option selected value="<?php echo $edicion['id']; ?>"><?php echo "[".$edicion['id']."] - ".date("d-m-Y", strtotime($edicion['fecha'])); ?></option><?php
							} else {
								?><option value="<?php echo $edicion['id']; ?>"><?php echo "[".$edicion['id']."] - ".date("d-m-Y", strtotime($edicion['fecha'])); ?></option><?php
							}
						}
                    ?>
                </select>
            </form>
        </td>
    </tr>
</table>

<table id="menu" cellpadding="0" cellspacing="0">
    <tr class="first <?php if ($menu == "stats") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/stats"; ?>">
                Stats 
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "edition") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/edition"; ?>">
                Edition 
				<?php if($editionEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="24" height="24" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "swish") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/swish"; ?>">
                SWISH
				<?php if($swishEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "culture") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/culture"; ?>">
                Culture Vulture 
				<?php if($cultureEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "smile") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/smile"; ?>">
                Smile for a while
				<?php if($smileEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "expressions") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/expressions"; ?>">
               <?php   echo 'Foreign words & expressions';  ?> 
				<?php if($expressionsEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "think") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/think"; ?>">
                Think language
				<?php if($thinkEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "grammar") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/grammar"; ?>">
                Grammar under the hammer  
				<?php if($grammarEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
				
            </a>
        </td>
    </tr>
    <tr class="<?php if ($menu == "news") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/news"; ?>">
                LP Comment 
				<?php if($newsEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
    <tr class="last <?php if ($menu == "oneliners") echo "active"; ?>">
        <td>
            <a href="<?php echo $_PATH . "/admin/oneliners"; ?>">
                Oneliners 
				<?php if($onelinersEnd){ ?>
				<img src="<?php echo $_PATH."/admin/images/ok.png"; ?>" width="12" height="12" style="margin-top: 5px; float: right;"/>
				<?php } ?>
            </a>
        </td>
    </tr>
</table>