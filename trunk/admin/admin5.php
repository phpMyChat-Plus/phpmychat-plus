<?php
// Configuration panel by DigiozMultimedia and Ciprian Murariu <ciprianmp@yahoo.com>
// This sheet is diplayed when the admin wants to modify settings of the chat server

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

if (!isset($ChatPath)) $ChatPath = "";
$mydate = isset($_POST["date1"]) ? $_POST["date1"] : $INSTALL_DATE;
if($mydate != "") $_POST['vINSTALL_DATE'] = $mydate;

if (C_NO_SWEAR) include("./lib/swearing.lib.php");
$pptype = "big";
require_once("./lib/support.lib.php");
require("./plugins/calendar/tc_calendar.php");

// Added for configuration sheet optional translation (default English)
if (file_exists("./localization/${L}/localized.config.php")) require_once("./localization/${L}/localized.config.php");
elseif (file_exists("./localization/english/localized.config.php"))
{
	require_once("./localization/english/localized.config.php");
	if ($L != "english") $translate_it = 1;
}
?>

<script type="text/javascript" language="javascript">
<!--
window.onload=show;
// Open the Skins preview popup
function styles_popup() {
		window.focus();
		styles_popupWin = window.open("<?php echo($ChatPath); ?>styles_popup.php?<?php echo("L=$L&pmc_username=$pmc_username&pmc_password=$pmc_password&startStyle=1"); ?>","styles_popup","width=780,height=740,resizable=no,scrollbars=no,toolbar=no,menubar=no,status=yes,location=no");
		styles_popupWin.focus();
}
function files_popup() {
		window.focus();
		files_popupWin = window.open("<?php echo($ChatPath); ?>files_popup.php?<?php echo("L=$L&pmc_username=$pmc_username&pmc_password=$pmc_password"); ?>","files_popup","width=800,height=620,resizable=no,scrollbars=yes,toolbar=no,menubar=no,status=yes,location=no");
		files_popupWin.focus();
}
function swapImage(img,imgid) {
	var image = document.getElementById(imgid);
	var dropd = document.getElementById(img);
	if (imgid == "flagToSwap")
	{
		var path = '<?php echo("./".$ChatPath."localization/"); ?>';
		var dropd = document.getElementById(img);
		var type = document.getElementById('3Dflag').value;
		var enfmt = document.getElementById('ENflag').value;
		if(type == "1")
		{
			if(enfmt == "US" && dropd.value == "english") var flagtype = '/images/flag_us.gif';
			else var flagtype = '/images/flag.gif';
		}
		else
		{
			if(enfmt == "US" && dropd.value == "english") var flagtype = '/images/flag_us0.gif';
			else var flagtype = '/images/flag0.gif';
		}
		image.src = path + dropd.value + flagtype;
	}
	if (imgid == "ENToSwap")
	{
		if (dropd.value == "UK")
		{
			if(document.getElementById('3Dflag').value == "1") var flagtype = 'flag.gif';
			else var flagtype = 'flag0.gif';
		}
		else
		{
			if(document.getElementById('3Dflag').value == "1") var flagtype = 'flag_us.gif';
			else var flagtype = 'flag_us0.gif';
		}
		var path = '<?php echo("./".$ChatPath."localization/english/images/"); ?>';
		image.src = path + flagtype;
	}
	if (imgid == "3DToSwap")
	{
		if (dropd.value == "1")
		{
			if (document.getElementById('ENflag').value == 'UK') var flagtype = 'flag.gif';
			else var flagtype = 'flag_us.gif';
			var flagstype = '/images/flag.gif';
		}
		else
		{
			if (document.getElementById('ENflag').value == 'UK') var flagtype = 'flag0.gif';
			else var flagtype = 'flag_us0.gif';
			var flagstype = '/images/flag0.gif';
		}
		var path_flag = '<?php echo("./".$ChatPath."localization/"); ?>';
		var path = '<?php echo("./".$ChatPath."localization/english/images/"); ?>';
		document.getElementById('flagToSwap').src = path_flag + document.getElementById('flags').value + flagstype;
		document.getElementById('ENToSwap').src = '<?php echo("./".$ChatPath."localization/english/images/"); ?>' + flagtype;
		image.src = path + flagtype;
 	}
	if (imgid == "doorToSwap")
	{
		if (dropd.value == "1") image.src = '<?php echo("./".$ChatPath."localization/".$L."/images/exitdoor.gif"); ?>';
		else image.src = '<?php echo("./".$ChatPath."images/gender_none.gif"); ?>';
	}
	if (imgid == "use_avatarsToSwap")
	{
		if (dropd.value == "1") image.src = '<?php echo("./".$ChatPath.$AVA_RELPATH); ?>' + document.getElementById('def_avatar').value;
		else image.src = '<?php echo("./".$ChatPath."images/gender_none.gif"); ?>';
	}
	if (imgid == "prof_buttonToSwap")
	{
		if (dropd.value == "1") image.src = '<?php echo("./".$ChatPath."images/avatarbutton.gif"); ?>';
		else image.src = '<?php echo("./".$ChatPath."images/gender_none.gif"); ?>';
	}
	if (imgid == "def_avatarToSwap")
	{
		image.src = '<?php echo("./".$ChatPath.$AVA_RELPATH); ?>' + dropd.value;
		if (document.getElementById('use_avatars').value == "1") document.getElementById('use_avatarsToSwap').src = '<?php echo("./".$ChatPath.$AVA_RELPATH); ?>' + dropd.value;
	}
	if (imgid == "gendersToSwap")
	{
		if (dropd.value == "1") image.src = '<?php echo("./".$ChatPath."images/gender_couple.gif"); ?>';
		else image.src = '<?php echo("./".$ChatPath."images/gender_none.gif"); ?>';
	}
	if (imgid == "gravatarsToSwap")
	{
		if (dropd.value == "0")
		{
			image.src = '<?php echo("./".$ChatPath."images/gender_none.gif"); ?>';
			document.getElementById('gravatars_defToSwap').src= '<?php echo("./".$ChatPath."images/gender_none.gif"); ?>';
		}
		else
		{
			image.src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g&d=' + document.getElementById('gravatars_def').value;
			document.getElementById('gravatars_defToSwap').src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g&d=' + document.getElementById('gravatars_def').value;
		}
	}
	if (imgid == "gravatars_defToSwap")
	{
		if (document.getElementById('gravatars').value != "0")
		{
			if (dropd.value == "") image.src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g';
			else if (dropd.value == "identicon") image.src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g&d=identicon';
			else if (dropd.value == "monsterid") image.src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g&d=monsterid';
			else if (dropd.value == "wavatar") image.src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g&d=wavatar';
			document.getElementById('gravatarsToSwap').src = 'http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=<?php echo($AVA_WIDTH); ?>&r=g&d=' + dropd.value;
		}
		else
		{
			image.src = '<?php echo ("./".$ChatPath."images/gender_none.gif"); ?>';
		}
	}
}
function show(id) {
var d = document.getElementById(id);
	for (var i = 1; i<=10; i++) {
		if (document.getElementById('smenu'+i)) document.getElementById('smenu'+i).style.display='none';
	}
if (d) d.style.display='block';
}
function hide(id) {
var d = document.getElementById(id);
if (d) d.style.display='none';
}
//-->
</script>
<style type="text/css" media="screen">
<!--
body {
position: absolute;
margin: 0px;
padding: 0px;
font: 80% verdana, arial, sans-serif;
}
dl, dt, dd, ul, li {
margin: 0px;
padding: 0px;
list-style-type: none;
z-index: 100;
}
#menu {
position: absolute; /* Menu position that can be changed at will */
top: 0px;
left: 0px;
z-index: 100;
width: 100%; /* precision for Opera */
margin-left: 5px;
}
#menu dl {
float: left;
width: 12em;
z-index: 100;
}
#menu dt {
cursor: pointer;
text-align: center;
font-weight: bold;
background: aaa;
border: 1px solid gray;
margin: 0px;
}
#menu dl.nav{
float: left;
width: 6em;
z-index: 100;
}
#menu .save, #menu .save a, #menu .save a:hover, #menu .save a:focus {
color: #f00;
}
#menu dd {
display: none;
border: 1px solid gray;
}
#menu li {
text-align: center;
background: #fff;
}
#menu li a, #menu dt a {
color: #000;
text-decoration: none;
display: block;
height: 100%;
border: 0px none;
}
#menu li a:hover, #menu li a:focus, #menu dt a:hover, #menu dt a:focus {
background: #eee;
}
#site {
position: absolute;
z-index: 100;
top : 70px;
left : 10px;
color: #000;
background-color: #ddd;
padding: 5px;
border: 1px solid gray;
}
#container {
position: relative;
top: 20px;
left: auto;
width: 800px;
height: 480px;
margin-left:10px;
z-index: 0;
overflow:auto;
}
-->
</style>
<?php
// Display the Config menu bar (only on first load, not after submit)
if ($action != "submit")
{
	//Cache for Gravatars check
	if (version_compare(PHP_VERSION,'5') >= 0 && ini_get("allow_url_fopen") && function_exists('file_get_contents')) $cache_supported = 1;
	else $cache_supported = 0;
	if (!@fsockopen("gravatar.com", 80, $errno, $errstr, 2))
	{
		$server_blocked = 1;
		$cache_supported = 0;
	}
	// Get bot id
	$bot_loaded = 0;
	$DbLink->query("SELECT id FROM bot_bots WHERE id!='0'");
	if($DbLink->num_rows() > 0)
	{
		list($bot_id) = $DbLink->next_record();
		$DbLink->clean_results();
		$bot_loaded = 1;
	}
$ColorList = str_replace('"', "", COLORLIST);
	settype($app_version = APP_VERSION, "float");
	$selected = ((L_SELECTED_F != "") ? L_SELECTED_F : L_SELECTED);
	$not_selected = ((L_NOT_SELECTED_F != "") ? L_NOT_SELECTED_F : L_NOT_SELECTED);
	$null = ((L_NULL_F != "") ? L_NULL_F : L_NULL);
	$selected = " (".$selected.")";
	$not_selected = " ".$null." (".$not_selected.")";
function skin_selection($no,$roomskin)
{
		$skins = 'skins/';
		$skinfiles = opendir($skins); #open directory
				$i = 0;
				while (false !== ($skinfile = readdir($skinfiles)))
				{
# 					if (!eregi('\.html',$skinfile) && !eregi('\.css',$skinfile) && !is_dir($skinfile) && $skinfile!=='.' && $skinfile!=='..')
##					if (stripos($skinfile,".html") === false && stripos($skinfile,".css") === false && !is_dir($skinfile) && !preg_match("/^[\.]/", $skinfile))
					if (!preg_match("/(\.html|\.css)/i",$skinfile) && !is_dir($skinfile) && !preg_match("/^[\.]/", $skinfile))
					{
						$skinsfile[]=$skinfile;
						$i++;
			 		}
			 	}
				closedir($skinfiles);
				if ($skinsfile)
				{
				  	natsort($skinsfile);
				}
				$j = 1;
				$what = "";
				foreach ($skinsfile as $skinname)
				{
					$skinno = str_replace("style","",$skinname);
					$skinno = str_replace(".php","",$skinno);
					$what .= "<option value=\"".$skinno."\"";
					if($roomskin == $skinno) $what .= " selected";
					include($skins.$skinname);
					$what .= ">".$j.". ".$SKIN_NAME."</option>\n";
				$j++;
				}
		unset($skinsfile);
		echo($what);
}

if (UPD_CHECK)
{
	// Check for application update on main sites (ciprianmp.com & sourceforge) resources.
	$updatepath1 = "http://ciprianmp.com/latest/lib/update.php";
	$updatepath2 = "http://phpmychat.svn.sourceforge.net/viewvc/*checkout*/phpmychat/trunk/lib/update.php";
	if (@fsockopen("ciprianmp.com", 80, $errno, $errstr, 2))
	{
		$upd_possible = 1;
		if (isset($_GET['alv']) && isset($_GET['alm'])) {
			define("APP_LAST_VERSION", $alv);
			define("APP_LAST_MINOR", $alm);
			settype($app_last_version = APP_LAST_VERSION, "float");
		} else {
		  echo "<script language=\"javascript\" type=\"text/javascript\" src=\"$updatepath1\"></script>\n";
		  echo "<script language=\"javascript\">\n";
		  echo "location.href=\"".$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']."&alv=\" + alv + \"&alm=\" + alm;\n";
		  echo "</script>\n";
		  exit();
		}
	}
	elseif (@fsockopen("phpmychat.svn.sourceforge.net", 80, $errno, $errstr, 2))
	{
		$upd_possible = 1;
		if (isset($_GET['alv']) && isset($_GET['alm'])) {
			define("APP_LAST_VERSION", $alv);
			define("APP_LAST_MINOR", $alm);
			settype($app_last_version = APP_LAST_VERSION, "float");
		} else {
		  echo "<script language=\"javascript\" type=\"text/javascript\" src=\"$updatepath2\"></script>\n";
		  echo "<script language=\"javascript\">\n";
		  echo "location.href=\"".$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']."&alv=\" + alv + \"&alm=\" + alm;\n";
		  echo "</script>\n";
		  exit();
		}
	}
	else
	{
		$upd_possible = 0;
		settype($app_last_version = APP_VERSION, "float");
	}
}
?>
<div id="menu">
	<dl>
		<dt onmouseover="javascript:show('smenu1');"><?php echo A_CONF_0; ?></dt>
			<dd id="smenu1" onmouseover="javascript:show('smenu1');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#server"><?php echo A_CONF_1; ?></a></li>
					<li><a href="#languages"><?php echo A_CONF_2; ?></a></li>
					<li><a href="#owner"><?php echo A_CONF_3; ?></a></li>
					<li><a href="#registration"><?php echo A_CONF_4; ?></a></li>
					<li><a href="#functionality"><?php echo A_CONF_5; ?></a></li>
					<li><a href="#timings"><?php echo A_CONF_6; ?></a></li>
					<li><a href="#schedule"><?php echo A_CONF_7; ?></a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu2');"><?php echo A_CONF_26; ?></dt>
			<dd id="smenu2" onmouseover="javascript:show('smenu2');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#layout"><?php echo A_CONF_8; ?></a></li>
					<li><a href="#skins"><?php echo A_CONF_9; ?></a></li>
					<li><a href="#colors"><?php echo A_CONF_10; ?></a></li>
					<li><a href="#sounds"><?php echo A_CONF_11; ?></a></li>
					<li><a href="#profanity"><?php echo A_CONF_12; ?></a></li>
					<li><a href="files_popup.php?<?php echo("L=$L&pmc_username=$pmc_username&pmc_password=$pmc_password"); ?>" onClick="files_popup(); return false" target="_blank"><?php echo A_CONF_13; ?></a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu3');"><?php echo A_CONF_14; ?></dt>
			<dd id="smenu3" onmouseover="javascript:show('smenu3');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#pm"><?php echo A_CONF_15; ?></a></li>
					<li><a href="#bot"><?php echo A_CONF_16; ?></a></li>
					<li><a href="#commands"><?php echo A_CONF_17; ?></a></li>
					<li><a href="#mmedia"><?php echo A_CONF_18; ?></a></li>
					<li><a href="#quick"><?php echo A_CONF_19; ?></a></li>
					<li><a href="#avatars"><?php echo A_CONF_20; ?></a></li>
					<li><a href="#logging"><?php echo A_CONF_21; ?></a></li>
					<li><a href="#lurking"><?php echo A_CONF_22; ?></a></li>
					<li><a href="#quote"><?php echo A_CONF_23; ?></a></li>
					<li><a href="#ghost"><?php echo A_CONF_24; ?></a></li>
					<li><a href="#bday"><?php echo A_CONF_25; ?></a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu4');"><?php echo A_CONF_27; ?></dt>
			<dd id="smenu4" onmouseover="javascript:show('smenu4');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="http://sourceforge.net/projects/phpmychat/files/phpMyChat_Plus/" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_28)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_28)); ?>.'; return true"><?php echo A_CONF_28; ?></a></li>
					<li><a href="http://www.ciprianmp.com/atm/index.php?directory=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo(APP_LAST_VERSION); ?>" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_29)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_29)); ?>.'; return true"><?php echo A_CONF_29; ?></a></li>
					<li><a href="http://sourceforge.net/projects/phpmychat/" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_30)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_30)); ?>.'; return true"><?php echo A_CONF_30; ?></a></li>
					<li><a href="http://phpmychat.svn.sourceforge.net/svnroot/phpmychat/trunk/" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_31)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_31)); ?>.'; return true"><?php echo A_CONF_31; ?></a></li>
					<li><a href="http://tech.groups.yahoo.com/group/phpmychat/" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_32)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_32)); ?>.'; return true"><?php echo A_CONF_32; ?></a></li>
					<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Fixes readme.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo(APP_VERSION); ?>" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, sprintf(A_CONF_33, APP_NAME." - ".APP_VERSION.APP_MINOR))); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, sprintf(A_CONF_33, APP_NAME." - ".APP_VERSION.APP_MINOR))); ?>.'; return true"><?php echo (sprintf(A_CONF_33, APP_VERSION.APP_MINOR)); ?></a></li>
 <?php
# if(UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && ((APP_LAST_MINOR == "" && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR))) || (ereg("f",APP_LAST_MINOR) && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR) || APP_MINOR == "")) || (ereg("RC",APP_LAST_MINOR) && ereg("ß",APP_MINOR)) || (ereg("ß",APP_LAST_MINOR) && ereg("ß",APP_MINOR) && str_replace("-ß","",APP_LAST_MINOR) > str_replace("-ß","",APP_MINOR)) || (ereg("f",APP_LAST_MINOR) && ereg("f",APP_MINOR) && str_replace("-f","",APP_LAST_MINOR) > str_replace("-f","",APP_MINOR)) || (ereg("RC",APP_LAST_MINOR) && ereg("RC",APP_MINOR) && str_replace("-RC","",APP_LAST_MINOR) > str_replace("-RC","",APP_MINOR))))))
 if(UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && ((APP_LAST_MINOR == "" && (stripos(APP_MINOR,"RC") !== false || strpos(APP_MINOR,"ß") !== false)) || (stripos(APP_LAST_MINOR,"f") !== false && (stripos(APP_MINOR,"RC") !== false || strpos(APP_MINOR,"ß") !== false || APP_MINOR == "")) || (stripos(APP_LAST_MINOR,"RC") !== false && strpos(APP_MINOR,"ß") !== false) || (strpos(APP_LAST_MINOR,"ß") !== false && strpos(APP_MINOR,"ß") !== false && str_replace("-ß","",APP_LAST_MINOR) > str_replace("-ß","",APP_MINOR)) || (stripos(APP_LAST_MINOR,"f") !== false && stripos(APP_MINOR,"f") !== false && str_ireplace("-f","",APP_LAST_MINOR) > str_ireplace("-f","",APP_MINOR)) || (stripos(APP_LAST_MINOR,"RC") !== false && stripos(APP_MINOR,"RC") && str_ireplace("-RC","",APP_LAST_MINOR) > str_ireplace("-RC","",APP_MINOR))))))
 {
#  	if (ereg("f",APP_LAST_MINOR) || ereg("ß",APP_LAST_MINOR) || ereg("RC",APP_LAST_MINOR)) $minor_dir = "/Fixes/";
 	$minor_dir = "/";
 	if (stripos(APP_LAST_MINOR,"f") !== false) $minor_dir = "/Fixes/";
# 	elseif (strpos(APP_LAST_MINOR,"ß") !== false || stripos(APP_LAST_MINOR,"RC") !== false) $minor_dir = "/Betas/";
 	?>
 						<li><a href="http://www.ciprianmp.com/atm/index.php?directory=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo(APP_LAST_VERSION.$minor_dir); ?>" target=_blank Title="<?php echo sprintf(A_CONF_ERR_3b, APP_LAST_VERSION.APP_LAST_MINOR); ?>" onMouseOver="window.status='<?php echo sprintf(A_CONF_ERR_3b, APP_LAST_VERSION.APP_LAST_MINOR); ?>.'; return true"><?php echo sprintf(A_CONF_35, APP_LAST_VERSION.APP_LAST_MINOR); ?></a></li>
 <?php
 }
 	?>
					<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Plus FAQ.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_36)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_36)); ?>'; return true"><?php echo A_CONF_36; ?></a></li>
					<li><a href="http://www.ciprianmp.com/latest/" target=_blank Title="<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_37)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS, L_LINKS_15, A_CONF_37)); ?>.'; return true"><?php echo A_CONF_37; ?></a></li>
					<li><a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank><?php echo A_CONF_38; ?></a></li>
					<li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=ciprianmp%40hotmail%2ecom&item_name=Support%20for%20phpMyChat%20Plus%20development&no_shipping=1&cn=Optional%20Thoughts&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8" onClick="return confirm('<?php echo(L_SUPP_WARN); ?>');" onMouseOver="window.status='Wish to keep <?php echo(APP_NAME); ?> FREE?'; return true;" title="Wish to keep <?php echo(APP_NAME); ?> FREE?" target="_blank"><?php echo A_CONF_39; ?></a></li> <!-- Wish to donate? -->
<?php
					if ($translate_it)
					{
?>
						<li><a onClick="javascript:alert('<?php echo("Would you like this Configuration page\\nfully translated into your ".mb_convert_case(str_replace("_"," ",$L),MB_CASE_TITLE,$Charset)." language?\\n\\nYou can contribute yourself by copying the file\\nlocalization/english/localized.config.php\\ninto your language folder localization/".$L."/\\nand then translate it using Notepad++ (free),\\navailable at http://notepad-plus-plus.org.\\n\\nDon\'t forget to send your final file to the developer\\nat ".PLUS_DEVELOPER_EMAIL." for review and packing.\\n\\nThank you and Good luck!\\n".PLUS_DEVELOPER); ?>')" Title="<?php echo("Translate this configuration file"); ?>" onMouseOver="window.status='<?php echo("Translate this configuration file"); ?>'; return true"><?php echo("Translate it!"); ?></a></li>
<?php
					}
					$longdtformatrel = ($L == "english" ? str_replace("%d of", ((stristr(PHP_OS,'win') ? "%#d" : "%e").date('S',strtotime(RELEASE_DATE)))." of", L_LONG_DATE) : L_LONG_DATE);
?>
					<li><a onClick="javascript:alert('<?php echo(sprintf(trim(A_SHEET5_0),":\\n".APP_NAME." - ".APP_VERSION.APP_MINOR) . "\\n\\n" . sprintf(A_CONF_40, (stristr(PHP_OS,'win') ? ((strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) ? str_replace(" ","",utf_conv(WIN_DEFAULT,$Charset,strftime($longdtformatrel, strtotime(RELEASE_DATE)))) : utf_conv(WIN_DEFAULT,$Charset,strftime($longdtformatrel, strtotime(RELEASE_DATE)))) : strftime($longdtformatrel, strtotime(RELEASE_DATE)))) . "\\n\\n" . A_CONF_42 . "\\n\\n" . sprintf(A_CONF_41, PLUS_DEVELOPER) . "\\n&copy; 2000-" . date('Y')); ?>')" Title="<?php echo(A_CONF_43); ?>" onMouseOver="window.status='<?php echo(A_CONF_43); ?>'; return true"><?php echo(A_CONF_44); ?></a></li>
				</ul>
			</dd>
	</dl>
	<dl class="nav">
		<dt onmouseover="javascript:show();"><a href="#home" title="<?php echo A_CONF_46a; ?>"><?php echo A_CONF_46; ?></a></dt>
	</dl>
	<dl class="nav">
		<dt onmouseover="javascript:show();"><a class="save" href="#save_settings" title="<?php echo A_CONF_47a; ?>"><?php echo A_CONF_47; ?></a></dt>
	</dl>
</div>
<div id="container">
<?php
	if (UPD_CHECK)
	{
		?>
<div><p><table align=center align=center border=0 cellpadding=0 class=menu style=background:white><tr><td class=success align=center><?php echo("<br />- ".sprintf(A_SHEET5_0, APP_NAME." - ".APP_VERSION.APP_MINOR)." -<br />"); ?>
<?php
# 		if (($app_last_version > $app_version) || (($app_last_version == $app_version) && ((APP_LAST_MINOR == "" && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR))) || (ereg("f",APP_LAST_MINOR) && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR) || APP_MINOR == "")) || (ereg("RC",APP_LAST_MINOR) && ereg("ß",APP_MINOR)) || (ereg("ß",APP_LAST_MINOR) && ereg("ß",APP_MINOR) && str_replace("-ß","",APP_LAST_MINOR) > str_replace("-ß","",APP_MINOR)) || (ereg("f",APP_LAST_MINOR) && ereg("f",APP_MINOR) && str_replace("-f","",APP_LAST_MINOR) > str_replace("-f","",APP_MINOR)) || (ereg("RC",APP_LAST_MINOR) && ereg("RC",APP_MINOR) && str_replace("-RC","",APP_LAST_MINOR) > str_replace("-RC","",APP_MINOR)))))
		if (($app_last_version > $app_version) || (($app_last_version == $app_version) && ((APP_LAST_MINOR == "" && (stripos(APP_MINOR,"RC") !== false || strpos(APP_MINOR,"ß") !== false)) || (stripos(APP_LAST_MINOR,"f") !== false && (stripos(APP_MINOR,"RC") !== false || strpos(APP_MINOR,"ß") !== false || APP_MINOR == "")) || (stripos(APP_LAST_MINOR,"RC") !== false && strpos(APP_MINOR,"ß") !== false) || (strpos(APP_LAST_MINOR,"ß") !== false && strpos(APP_MINOR,"ß") !== false && str_replace("-ß","",APP_LAST_MINOR) > str_replace("-ß","",APP_MINOR)) || (stripos(APP_LAST_MINOR,"f") !== false && stripos(APP_MINOR,"f") !== false && str_ireplace("-f","",APP_LAST_MINOR) > str_ireplace("-f","",APP_MINOR)) || (stripos(APP_LAST_MINOR,"RC") !== false && stripos(APP_MINOR,"RC") !== false && str_ireplace("-RC","",APP_LAST_MINOR) > str_ireplace("-RC","",APP_MINOR)))))
		{
		?>
			<script type="text/javascript" language="javascript">
			<!--
		alert("<?php echo("- ".sprintf(A_SHEET5_0, APP_VERSION.APP_MINOR)." -") ?>\n<?php echo(sprintf(A_SHEET5_1, APP_LAST_VERSION.$alm)); ?>")
			// -->
			</script>
<?php
			echo("</td></tr><tr><td class=error align=center><h3>".sprintf(A_SHEET5_1,APP_LAST_VERSION.APP_LAST_MINOR)."<br />".sprintf(A_CONF_ERR_3, APP_LAST_VERSION.APP_LAST_MINOR, "<a href=\"http://www.ciprianmp.com/atm/index.php?directory=programming/phpMyChat/Ciprian_releases/Plus_version/".APP_LAST_VERSION.$minor_dir."\" target=\"_blank\" Title=\"".sprintf(A_CONF_ERR_3b, APP_LAST_VERSION.APP_LAST_MINOR)."\" onMouseOver=\"window.status='".sprintf(A_CONF_ERR_4, APP_LAST_VERSION.APP_LAST_MINOR).".'; return true\">".A_CONFHERE."</a></h3>"));
		}
?>
<br /></td></tr></table></p></div>
<?php
	}
};

?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="support" target="_blank" onSubmit="return confirm('<?php echo(L_SUPP_WARN); ?>');">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?php echo($ppbutton); ?>">
<input type="image" style="background-color: transparent;" src="<?php echo($donate); ?>" border="0" name="submit" alt="<?php echo($ppalt."&#10;".L_SUPP_ALT); ?>" title="<?php echo($ppalt."&#10;".L_SUPP_ALT); ?>" onMouseOver="window.status='<?php echo($ppalt); ?>'; return true;">
</form>
<?php

// If form is submitted update values in the database
if (isset($FORM_SEND) && $FORM_SEND == 5)
{
  while(list($name,$value) = each($_GET))
  {
           $$name = $value;
  };
  while(list($name,$value) = each($_POST))
  {
           $$name = $value;
  };

  if($vNUM_AVATARS > $max_num_avatars) $vNUM_AVATARS = $max_num_avatars;
  $query = "UPDATE ".C_CFG_TBL." SET ".
						"MSG_DEL = '$vMSG_DEL', ".
						"USR_DEL = '$vUSR_DEL', ".
						"REG_DEL = '$vREG_DEL', ".
						"LANGUAGE = '$vLANGUAGE', ".
						"MULTI_LANG = '$vMULTI_LANG', ".
						"REQUIRE_REGISTER = '$vREQUIRE_REGISTER', ".
						"REQUIRE_NAMES = '$vREQUIRE_NAMES', ".
						"EMAIL_PASWD = '$vEMAIL_PASWD', ".
						"PASS_LENGTH = '$vPASS_LENGTH', ".
						"ADMIN_NOTIFY = '$vADMIN_NOTIFY', ".
						"ADMIN_NAME = '".trim(str_replace("'", "’", $vADMIN_NAME))."', ".
						"ADMIN_EMAIL = '$vADMIN_EMAIL', ".
						"CHAT_URL = '$vCHAT_URL', ".
						"SHOW_ADMIN = '$vSHOW_ADMIN', ".
						"SHOW_DEL_PROF = '$vSHOW_DEL_PROF', ".
						"VERSION = '$vVERSION', ".
						"BANISH = '$vBANISH', ".
						"NO_SWEAR = '$vNO_SWEAR', ".
						"SWEAR_EXPR = '$vSWEAR_EXPR', ".
						"SAVE = '$vSAVE', ".
						"USE_SMILIES = '$vUSE_SMILIES', ".
						"HTML_TAGS_KEEP = '$vHTML_TAGS_KEEP', ".
						"HTML_TAGS_SHOW = '$vHTML_TAGS_SHOW', ".
						"TMZ_OFFSET = '$vTMZ_OFFSET', ".
						"MSG_ORDER = '$vMSG_ORDER', ".
						"MSG_NB = '$vMSG_NB', ".
						"MSG_REFRESH = '$vMSG_REFRESH', ".
						"SHOW_TIMESTAMP = '$vSHOW_TIMESTAMP', ".
						"NOTIFY = '$vNOTIFY', ".
						"WELCOME = '$vWELCOME', ".
						"SMILEY_COLS = '$vSMILEY_COLS', ".
						"SMILEY_COLS_POP = '$vSMILEY_COLS_POP', ".
						"ALLOW_ENTRANCE_SOUND = '$vALLOW_ENTRANCE_SOUND', ".
						"ENTRANCE_SOUND = '$vENTRANCE_SOUND', ".
						"ALLOW_BUZZ_SOUND = '$vALLOW_BUZZ_SOUND', ".
						"BUZZ_SOUND = '$vBUZZ_SOUND', ".
						"TOPIC_DIFF = '$vTOPIC_DIFF', ".
						"SHOW_TUT = '$vSHOW_TUT', ".
						"SHOW_INFO = '$vSHOW_INFO', ".
						"SET_CMDS = '$vSET_CMDS', ".
						"CMDS = '$vCMDS', ".
						"SET_MODS = '$vSET_MODS', ".
						"MODS = '$vMODS', ".
						"SET_BOT = '$vSET_BOT', ".
						"ROOM_SAYS = '".trim(str_replace("'", "’", $vROOM_SAYS))."', ".
						"DEMOTE_MOD = '$vDEMOTE_MOD', ".
						"PRIV_POPUP = '$vPRIV_POPUP', ".
						"SHOW_ETIQ_IN_HELP = '$vSHOW_ETIQ_IN_HELP', ".
						"SHOW_LOGO = '$vSHOW_LOGO', ".
						"LOGO_IMG = '$vLOGO_IMG', ".
						"LOGO_OPEN = '$vLOGO_OPEN', ".
						"LOGO_ALT = '".trim(str_replace("'", "’", $vLOGO_ALT))."', ".
						"SHOW_OWNER = '$vSHOW_OWNER', ".
						"SHOW_PRIV = '$vSHOW_PRIV', ".
						"SHOW_PRIV_MOD = '$vSHOW_PRIV_MOD', ".
						"SHOW_PRIV_USR = '$vSHOW_PRIV_USR', ".
						"SHOW_COUNTER = '$vSHOW_COUNTER', ".
						"INSTALL_DATE = '$vINSTALL_DATE', ".
						"USE_SKIN = '$vUSE_SKIN', ".
						"ROOM1 = '".trim(str_replace("'", "’", $vROOM1))."', ".
						"ROOM2 = '".trim(str_replace("'", "’", $vROOM2))."', ".
						"ROOM3 = '".trim(str_replace("'", "’", $vROOM3))."', ".
						"ROOM4 = '".trim(str_replace("'", "’", $vROOM4))."', ".
						"ROOM5 = '".trim(str_replace("'", "’", $vROOM5))."', ".
						"ROOM6 = '".trim(str_replace("'", "’", $vROOM6))."', ".
						"ROOM7 = '".trim(str_replace("'", "’", $vROOM7))."', ".
						"ROOM8 = '".trim(str_replace("'", "’", $vROOM8))."', ".
						"ROOM9 = '".trim(str_replace("'", "’", $vROOM9))."', ".
						"SWEAR1 = '".trim(str_replace("'", "’", $vSWEAR1))."', ".
						"SWEAR2 = '".trim(str_replace("'", "’", $vSWEAR2))."', ".
						"SWEAR3 = '".trim(str_replace("'", "’", $vSWEAR3))."', ".
						"SWEAR4 = '".trim(str_replace("'", "’", $vSWEAR4))."', ".
						"COLOR_FILTERS = '$vCOLOR_FILTERS', ".
						"COLOR_ALLOW_GUESTS = '$vCOLOR_ALLOW_GUESTS', ".
						"ROOM_SKIN1 = '$vROOM_SKIN1', ".
						"ROOM_SKIN2 = '$vROOM_SKIN2', ".
						"ROOM_SKIN3 = '$vROOM_SKIN3', ".
						"ROOM_SKIN4 = '$vROOM_SKIN4', ".
						"ROOM_SKIN5 = '$vROOM_SKIN5', ".
						"ROOM_SKIN6 = '$vROOM_SKIN6', ".
						"ROOM_SKIN7 = '$vROOM_SKIN7', ".
						"ROOM_SKIN8 = '$vROOM_SKIN8', ".
						"ROOM_SKIN9 = '$vROOM_SKIN9', ".
						"COLOR_CA = '$vCOLOR_CA', ".
						"COLOR_CA1 = '$vCOLOR_CA1', ".
						"COLOR_CA2 = '$vCOLOR_CA2', ".
						"COLOR_CM = '$vCOLOR_CM', ".
						"COLOR_CM1 = '$vCOLOR_CM1', ".
						"COLOR_CM2 = '$vCOLOR_CM2', ".
						"QUICKA = '".addslashes(trim(str_replace("'", "’", $vQUICKA)))."', ".
						"QUICKM = '".addslashes(trim(str_replace("'", "’", $vQUICKM)))."', ".
						"QUICKU = '".addslashes(trim(str_replace("'", "’", $vQUICKU)))."', ".
						"COLOR_NAMES = '$vCOLOR_NAMES', ".
						"USE_AVATARS = '$vUSE_AVATARS', ".
						"NUM_AVATARS = '$vNUM_AVATARS', ".
						"AVA_RELPATH = '$vAVA_RELPATH', ".
						"DEF_AVATAR = '$vDEF_AVATAR', ".
						"AVA_WIDTH = '$vAVA_WIDTH', ".
						"AVA_HEIGHT = '$vAVA_HEIGHT', ".
						"AVA_PROFBUTTON = '$vAVA_PROFBUTTON', ".
						"MAX_DICES = '$vMAX_DICES', ".
						"MAX_ROLLS = '$vMAX_ROLLS', ".
						"BOT_CONTROL = '$vBOT_CONTROL', ".
						"MAX_PIC_SIZE = '$vMAX_PIC_SIZE', ".
						"USERS_SORT_ORD = '$vUSERS_SORT_ORD', ".
						"CHAT_LOGS = '$vCHAT_LOGS', ".
						"LOG_DIR = '$vLOG_DIR', ".
						"SHOW_LOGS_USR = '$vSHOW_LOGS_USR', ".
						"CHAT_LURKING = '$vCHAT_LURKING', ".
						"SHOW_LURK_USR = '$vSHOW_LURK_USR', ".
						"BAN_IP = '$vBAN_IP', ".
						"REG_CHARS_ALLOWED = '$vREG_CHARS_ALLOWED', ".
						"EXIT_LINK_TYPE = '$vEXIT_LINK_TYPE', ".
						"CHAT_EXTRAS = '$vCHAT_EXTRAS', ".
						"EMAIL_USER = '$vEMAIL_USER', ".
						"BOT_HELLO = '".trim(str_replace("'", "’", $vBOT_HELLO))."', ".
						"BOT_BYE = '".trim(str_replace("'", "’", $vBOT_BYE))."', ".
						"BOT_PUBLIC = '$vBOT_PUBLIC', ".
						"ENABLE_PM = '$vENABLE_PM', ".
						"EN_ROOM1 = '$vEN_ROOM1', ".
						"EN_ROOM2 = '$vEN_ROOM2', ".
						"EN_ROOM3 = '$vEN_ROOM3', ".
						"EN_ROOM4 = '$vEN_ROOM4', ".
						"EN_ROOM5 = '$vEN_ROOM5', ".
						"EN_ROOM6 = '$vEN_ROOM6', ".
						"EN_ROOM7 = '$vEN_ROOM7', ".
						"EN_ROOM8 = '$vEN_ROOM8', ".
						"EN_ROOM9 = '$vEN_ROOM9', ".
						"CHAT_BOOT = '$vCHAT_BOOT', ".
						"WELCOME_SOUND = '$vWELCOME_SOUND', ".
						"WORLDTIME = '$vWORLDTIME', ".
						"UPD_CHECK = '$vUPD_CHECK', ".
						"QUOTE = '$vQUOTE', ".
						"QUOTE_TIME = '$vQUOTE_TIME', ".
						"QUOTE_COLOR = '$vQUOTE_COLOR', ".
						"QUOTE_PATH = '$vQUOTE_PATH', ".
						"HIDE_ADMINS = '$vHIDE_ADMINS', ".
						"HIDE_MODERS = '$vHIDE_MODERS', ".
						"LAST_SAVED_ON = NOW(), ".
						"LAST_SAVED_BY = '$pmc_username', ".
						"CHAT_SYSTEM = '$vCHAT_SYSTEM', ".
						"NUKE_BB_PATH = '$vNUKE_BB_PATH', ".
						"CHAT_NAME = '".trim(str_replace("'", "’", $vCHAT_NAME))."', ".
						"ENGLISH_FORMAT = '$vENGLISH_FORMAT', ".
						"FLAGS_3D = '$vFLAGS_3D', ".
						"ALLOW_REGISTER = '$vALLOW_REGISTER', ".
						"DISP_GENDER = '$vDISP_GENDER', ".
						"SPECIAL_GHOSTS = '$vSPECIAL_GHOSTS', ".
						"FILLED_LOGIN = '$vFILLED_LOGIN', ".
						"BACKGR_IMG = '$vBACKGR_IMG', ".
						"BACKGR_IMG_PATH = '$vBACKGR_IMG_PATH', ".
						"POPUP_LINKS = '$vPOPUP_LINKS', ".
						"ITALICIZE_POWERS = '$vITALICIZE_POWERS', ".
						"MAIL_GREETING = '".trim(str_replace("'", "’", $vMAIL_GREETING))."', ".
						"PM_KEEP_DAYS = '$vPM_KEEP_DAYS', ".
						"ALLOW_PM_DEL = '$vALLOW_PM_DEL', ".
						"LOGIN_COUNTER = '$vLOGIN_COUNTER', ".
						"ALLOW_GRAVATARS = '$vALLOW_GRAVATARS', ".
						"GRAVATARS_CACHE = '$vGRAVATARS_CACHE', ".
						"GRAVATARS_CACHE_EXPIRE = '$vGRAVATARS_CACHE_EXPIRE', ".
						"GRAVATARS_RATING = '$vGRAVATARS_RATING', ".
						"GRAVATARS_DYNAMIC_DEF = '$vGRAVATARS_DYNAMIC_DEF', ".
						"GRAVATARS_DYNAMIC_DEF_FORCE = '$vGRAVATARS_DYNAMIC_DEF_FORCE', ".
						"ALLOW_UPLOADS = '$vALLOW_UPLOADS', ".
						"RES_ROOM1 = '$vRES_ROOM1', ".
						"RES_ROOM2 = '$vRES_ROOM2', ".
						"RES_ROOM3 = '$vRES_ROOM3', ".
						"RES_ROOM4 = '$vRES_ROOM4', ".
						"RES_ROOM5 = '$vRES_ROOM5', ".
						"EN_STATS = '$vEN_STATS', ".
						"ALLOW_VIDEO = '$vALLOW_VIDEO', ".
						"VIDEO_WIDTH = '$vVIDEO_WIDTH', ".
						"VIDEO_HEIGHT = '$vVIDEO_HEIGHT', ".
						"REQUIRE_BDAY = '$vREQUIRE_BDAY', ".
						"SEND_BDAY_EMAIL = '$vSEND_BDAY_EMAIL', ".
						"SEND_BDAY_TIME = '$vSEND_BDAY_TIME', ".
						"SEND_BDAY_INTVAL = '$vSEND_BDAY_INTVAL', ".
						"SEND_BDAY_PATH = '$vSEND_BDAY_PATH', ".
						"EN_WMPLAYER = '$vEN_WMPLAYER', ".
						"WMP_STREAM = '$vWMP_STREAM', ".
						"OPEN_ALL_BEG = '$vOPEN_ALL_BEG', ".
						"OPEN_ALL_END = '$vOPEN_ALL_END', ".
						"OPEN_SUN_BEG = '$vOPEN_SUN_BEG', ".
						"OPEN_SUN_END = '$vOPEN_SUN_END', ".
						"OPEN_MON_BEG = '$vOPEN_MON_BEG', ".
						"OPEN_MON_END = '$vOPEN_MON_END', ".
						"OPEN_TUE_BEG = '$vOPEN_TUE_BEG', ".
						"OPEN_TUE_END = '$vOPEN_TUE_END', ".
						"OPEN_WED_BEG = '$vOPEN_WED_BEG', ".
						"OPEN_WED_END = '$vOPEN_WED_END', ".
						"OPEN_THU_BEG = '$vOPEN_THU_BEG', ".
						"OPEN_THU_END = '$vOPEN_THU_END', ".
						"OPEN_FRI_BEG = '$vOPEN_FRI_BEG', ".
						"OPEN_FRI_END = '$vOPEN_FRI_END', ".
						"OPEN_SAT_BEG = '$vOPEN_SAT_BEG', ".
						"OPEN_SAT_END = '$vOPEN_SAT_END', ".
						"ALLOW_TEXT_COLORS = '$vALLOW_TEXT_COLORS', ".
						"TAGS_POWERS = '$vTAGS_POWERS', ".
						"ALLOW_MATH = '$vALLOW_MATH', ".
						"SRC_MATH = '$vSRC_MATH' ".
				"WHERE ID='0'";

		$DbLink->query($query);

if(C_BOT_NAME != $vBOT_NAME || C_BOT_FONT_COLOR != $vBOT_FONT_COLOR || C_BOT_AVATAR != $vBOT_AVATAR)
{
	$query_botname1 = "UPDATE bot_bot SET ".
						"value = '".stripslashes($vBOT_NAME)."'".
				" WHERE name='name'";
	$query_botname2 = "UPDATE bot_bots SET ".
						"botname = '".stripslashes($vBOT_NAME)."'".
				" WHERE botname!='$vBOT_NAME'";
	$query_botname3 = "UPDATE ".C_REG_TBL." SET ".
						"username = '".stripslashes($vBOT_NAME)."', ".
						"colorname = '$vBOT_FONT_COLOR', ".
						"avatar = '$vBOT_AVATAR'".
				" WHERE email='bot@bot.com'";
	$query_botname4 = "UPDATE ".C_USR_TBL." SET ".
						"username = '".stripslashes($vBOT_NAME)."'".
				" WHERE email='bot@bot.com'";
	if (trim($vBOT_NAME) == "" && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = sprintf(A_CONF_ERR_6, A_CONFBOT);
	}
#	else if (ereg("[\, \']", stripslashes($vBOT_NAME)) && C_BOT_NAME != $vBOT_NAME)
	else if(preg_match("/[ |,|'|\\\\]/", $vBOT_NAME) && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = A_CONF_ERR_7."<br />".$REG_CHARS_ALLOWED."<br />".sprintf(A_CONF_ERR_8, A_CONFBOT, "(".$vBOT_NAME.")");
	}
	else if((C_NO_SWEAR && checkwords($vBOT_NAME, true, $Charset)) && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = sprintf(A_CONF_ERR_9, A_CONFBOT, "(".$vBOT_NAME.")");
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$vBOT_NAME'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0 && C_BOT_NAME != $vBOT_NAME)
		{
			$Error = sprintf(A_CONF_ERR_10, A_CONFBOT, "(".$vBOT_NAME.")");
		}
		else
		{
			$DbLink->query($query_botname1);
			$DbLink->query($query_botname2);
			$DbLink->query($query_botname3);
			$DbLink->query($query_botname4);
		}
	}
}

// Random Quote mod by Ciprian
if((C_QUOTE_NAME != $vQUOTE_NAME || C_QUOTE_FONT_COLOR != $vQUOTE_FONT_COLOR || C_QUOTE_AVATAR != $vQUOTE_AVATAR) && $vQUOTE)
{
	$query_quote1 = "UPDATE ".C_REG_TBL." SET ".
						"username = '".stripslashes($vQUOTE_NAME)."', ".
						"colorname = '$vQUOTE_FONT_COLOR', ".
						"avatar = '$vQUOTE_AVATAR'".
				" WHERE email='quote@quote.com'";
	if (trim($vQUOTE_NAME) == "" && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = sprintf(A_CONF_ERR_6, A_CONFRDQ);
	}
# 	else if (ereg("[\, \']", stripslashes($vQUOTE_NAME)) && C_QUOTE_NAME != $vQUOTE_NAME)
	else if(preg_match("/[ |,|'|\\\\]/", $vQUOTE_NAME) && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = A_CONF_ERR_7."<br />".$REG_CHARS_ALLOWED."<br />".sprintf(A_CONF_ERR_8, A_CONFRDQ, "(".$vQUOTE_NAME.")");
	}
	else if((C_NO_SWEAR && checkwords($vQUOTE_NAME, true, $Charset)) && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = sprintf(A_CONF_ERR_9, A_CONFRDQ, "(".$vQUOTE_NAME.")");
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$vQUOTE_NAME'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0 && C_QUOTE_NAME != $vQUOTE_NAME)
		{
			$Error = sprintf(A_CONF_ERR_10, A_CONFRDQ, "(".$vQUOTE_NAME.")");
		}
		else
		{
			$DbLink->query($query_quote1);
		}
	}
}

if (isset($Error))
{
	echo "<div><p><table align=center border=0 cellpadding=3 class=menu style=\"background: white;\"><tr><td class=error align=center><br /><h3>".$Error."</h3></td></tr></table></p></div>";
}
else
{
	echo "<div><p><table align=center border=0 cellpadding=3 class=menu style=\"background: white;\"><tr><td class=success align=center><br /><h3>".A_CONF_ERR_1."</h3></td></tr></table></p>";
	if(C_LOG_DIR != $vLOG_DIR)
	{
		echo "<p><table align=center border=0 cellpadding=3 class=menu style=\"background: white;\"><tr><td class=notify2 align=center valign=TOP>".A_CONFIMPORTANT."</td><td class=success align=center>".sprintf(A_CONF_ERR_2, "<span style=background-color:white>".C_LOG_DIR."</span>", "<span style=background-color:white>".$vLOG_DIR."</span><br />")."</td></tr></table>";
	}
	echo "</p></div>";
}

	if(($USE_AVATARS !== $vUSE_AVATARS) || ($DISP_GENDER !== $vDISP_GENDER) || ($COLOR_NAMES !== $vCOLOR_NAMES) || ($PRIV_POPUP !== $vPRIV_POPUP) || ($USE_SKIN !== $vUSE_SKIN) || ($EN_WMPLAYER !== $vEN_WMPLAYER))
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES (1, 'Admin Panel', 'SYS announce', '$Latin1', ".time().", ' *', 'L_RELOAD_CHAT', '', '')");
	}
}
else
{
?>
<a name="home"></a>
<p class=title><?php echo(APP_NAME); ?> <?php echo (A_CONFTITLE_0);?></p>
<?php
if (C_LAST_SAVED_ON)
{
	settype($last_saved_on = mysql_to_ts(C_LAST_SAVED_ON), "integer");
	if (C_TMZ_OFFSET) settype($tmz_offset = C_TMZ_OFFSET, "integer");
	$Last_Saved_On = $last_saved_on + $tmz_offset*60*60;
	$longdtformat = ($L == "english" ? str_replace("%d of", ((stristr(PHP_OS,'win') ? "%#d" : "%e")."<sup>".date('S',$Last_Saved_On))."</sup> of", L_LONG_DATETIME) : L_LONG_DATETIME);
	$Last_Saved_On = strftime($longdtformat, $Last_Saved_On);
	if(stristr(PHP_OS,'win'))
	{
		$Last_Saved_On = utf_conv(WIN_DEFAULT,$Charset,$Last_Saved_On);
		if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $Last_Saved_On = str_replace(" ","",$Last_Saved_On);
	}
}
if (C_LAST_SAVED_ON || C_LAST_SAVED_BY)
{
	?>
	<div><p><table align=center border=0 cellpadding=0 class=menu style=background:white><tr><td class=success align=right><?php echo sprintf(A_CONF_ERR_5, (C_LAST_SAVED_ON ? " <span class=error>".$Last_Saved_On."</span>" : ""), (C_LAST_SAVED_BY ? "<span class=error>".C_LAST_SAVED_BY."</span>" : "")); ?></td></tr></table></div>
	<?php
}
	?>
<form action="<?php echo("$From?$URLQueryBody"); ?>" method="POST" autocomplete="" name="Form5">
		<input type=hidden name="From" value="<?php echo($From); ?>">
		<input type=hidden name="URLQueryBody" value="<?php echo($URLQueryBody); ?>">
		<input type=hidden name="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
		<input type=hidden name="pmc_password" value="<?php echo($pmc_password); ?>">
		<input type=hidden name="FORM_SEND" id="FORM_SEND" value="5">
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="server"></a><b><?php echo A_CONF_1; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_1; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_2); ?></i>
	</td>
    <td>
        <select name="vUPD_CHECK">
	        <option value="0"<?php if($UPD_CHECK==0 || !$upd_possible){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($UPD_CHECK==1 && $upd_possible){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_3; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_4); ?></i>
	</td>
    <td>
        <select name="vEN_STATS">
	        <option value="0"<?php if($EN_STATS==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_STATS==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_5; ?></b>
	</td>
    <td>
		<input name="vMSG_DEL" type="text" size="7" maxlength="3" value="<?php echo $MSG_DEL; ?>">&nbsp;(<?php echo $MSG_DEL == 1 ? L_HOUR : L_HOURS; ?>)</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_7; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_8); ?></i>
	</td>
    <td>
        <select name="vCHAT_BOOT">
	        <option value="0"<?php if($CHAT_BOOT==0){ echo " selected"; } ?>><?php echo L_DISABLED ?></option>
	        <option value="1"<?php if($CHAT_BOOT==1){ echo " selected"; } ?>><?php echo L_ENABLED ?></option>
        </select><br />
    	<input name="vUSR_DEL" type="text" size="7" maxlength="2" value="<?php echo $USR_DEL; ?>">&nbsp;(<?php echo $USR_DEL == 1 ? L_MIN : L_MINS; ?>)</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_10 ?></b>
    </td>
    <td>
		<input name="vREG_DEL" type="text" size="7" maxlength="4" value="<?php echo $REG_DEL; ?>">&nbsp;(<?php echo $REG_DEL == 1 ? L_DAY : L_DAYS; ?>)</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="languages"></a><b><?php echo A_CONF_2 ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1 ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2 ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_12; ?></b>
	</td>
    <td>
		<?php
			// Available languages
			$AvailableLanguages = array();
			$languageDirectories = dir('./'.$ChatPath.'localization/');
			while($name = $languageDirectories->read())
			{
				if(is_dir('./'.$ChatPath.'localization/'.$name)
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/regex.txt')
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/localized.chat.php')
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/images/flag.gif'))
				{
					list($key) = file('./'.$ChatPath.'localization/'.$name.'/regex.txt');
					$AvailableLanguages[$key] = $name;
				};
			};
			$languageDirectories->close();
			if (!function_exists("krsort")) include("./${ChatPath}localization/sort_languages.php");
			krsort($AvailableLanguages);
			asort($AvailableLanguages);
			reset($AvailableLanguages);
		?>
		    <select name="vLANGUAGE" id="flags" onChange="swapImage('flags','flagToSwap')">
		<?php
			$i = 0;
			while(list($key, $name) = each($AvailableLanguages))
			{
				if ($name == "argentinian_spanish" && L_ORIG_LANG_AR != "L_ORIG_LANG_AR") $FLAG_NAME = L_ORIG_LANG_AR;
				elseif ($name == "bulgarian" && L_ORIG_LANG_BG != "L_ORIG_LANG_BG") $FLAG_NAME = L_ORIG_LANG_BG;
				elseif ($name == "brazilian_portuguese" && L_ORIG_LANG_BR != "L_ORIG_LANG_BR") $FLAG_NAME = L_ORIG_LANG_BR;
				elseif ($name == "catalan" && L_ORIG_LANG_CA != "L_ORIG_LANG_CA") $FLAG_NAME = L_ORIG_LANG_CA;
				elseif ($name == "chinese_simplified" && L_ORIG_LANG_CNS != "L_ORIG_LANG_CNS") $FLAG_NAME = L_ORIG_LANG_CNS;
				elseif ($name == "chinese_traditional" && L_ORIG_LANG_CNT != "L_ORIG_LANG_CNT") $FLAG_NAME = L_ORIG_LANG_CNT;
				elseif ($name == "czech" && L_ORIG_LANG_CZ != "L_ORIG_LANG_CZ") $FLAG_NAME = L_ORIG_LANG_CZ;
				elseif ($name == "danish" && L_ORIG_LANG_DA != "L_ORIG_LANG_DA") $FLAG_NAME = L_ORIG_LANG_DA;
				elseif ($name == "dutch" && L_ORIG_LANG_NL != "L_ORIG_LANG_NL") $FLAG_NAME = L_ORIG_LANG_NL;
				elseif ($name == "english" && L_ORIG_LANG_EN != "L_ORIG_LANG_EN") $FLAG_NAME = L_ORIG_LANG_EN;
				elseif ($name == "french" && L_ORIG_LANG_FR != "L_ORIG_LANG_FR") $FLAG_NAME = L_ORIG_LANG_FR;
				elseif ($name == "georgian" && L_ORIG_LANG_KA != "L_ORIG_LANG_KA") $FLAG_NAME = L_ORIG_LANG_KA;
				elseif ($name == "german" && L_ORIG_LANG_DE != "L_ORIG_LANG_DE") $FLAG_NAME = L_ORIG_LANG_DE;
				elseif ($name == "greek" && L_ORIG_LANG_GR != "L_ORIG_LANG_GR") $FLAG_NAME = L_ORIG_LANG_GR;
				elseif ($name == "hebrew" && L_ORIG_LANG_HE != "L_ORIG_LANG_HE") $FLAG_NAME = L_ORIG_LANG_HE;
				elseif ($name == "hindi" && L_ORIG_LANG_HI != "L_ORIG_LANG_HI") $FLAG_NAME = L_ORIG_LANG_HI;
				elseif ($name == "hungarian" && L_ORIG_LANG_HU != "L_ORIG_LANG_HU") $FLAG_NAME = L_ORIG_LANG_HU;
				elseif ($name == "indonesian" && L_ORIG_LANG_ID != "L_ORIG_LANG_ID") $FLAG_NAME = L_ORIG_LANG_ID;
				elseif ($name == "italian" && L_ORIG_LANG_IT != "L_ORIG_LANG_IT") $FLAG_NAME = L_ORIG_LANG_IT;
				elseif ($name == "japanese" && L_ORIG_LANG_JA != "L_ORIG_LANG_JA") $FLAG_NAME = L_ORIG_LANG_JA;
				elseif ($name == "nepali" && L_ORIG_LANG_NE != "L_ORIG_LANG_NE") $FLAG_NAME = L_ORIG_LANG_NE;
				elseif ($name == "norwegian_bokmal" && L_ORIG_LANG_NB != "L_ORIG_LANG_NB") $FLAG_NAME = L_ORIG_LANG_NB;
				elseif ($name == "norwegian_nynorsk" && L_ORIG_LANG_NN != "L_ORIG_LANG_NN") $FLAG_NAME = L_ORIG_LANG_NN;
				elseif ($name == "persian" && L_ORIG_LANG_FA != "L_ORIG_LANG_FA") $FLAG_NAME = L_ORIG_LANG_FA;
				elseif ($name == "polish" && L_ORIG_LANG_PL != "L_ORIG_LANG_PL") $FLAG_NAME = L_ORIG_LANG_PL;
				elseif ($name == "portuguese" && L_ORIG_LANG_PT != "L_ORIG_LANG_PT") $FLAG_NAME = L_ORIG_LANG_PT;
				elseif ($name == "romanian" && L_ORIG_LANG_RO != "L_ORIG_LANG_RO") $FLAG_NAME = L_ORIG_LANG_RO;
				elseif ($name == "russian" && L_ORIG_LANG_RU != "L_ORIG_LANG_RU") $FLAG_NAME = L_ORIG_LANG_RU;
				elseif ($name == "serbian_latin" && L_ORIG_LANG_SRL != "L_ORIG_LANG_SRL") $FLAG_NAME = L_ORIG_LANG_SRL;
				elseif ($name == "serbian_cyrillic" && L_ORIG_LANG_SRC != "L_ORIG_LANG_SRC") $FLAG_NAME = L_ORIG_LANG_SRC;
				elseif ($name == "slovak" && L_ORIG_LANG_SK != "L_ORIG_LANG_SK") $FLAG_NAME = L_ORIG_LANG_SK;
				elseif ($name == "spanish" && L_ORIG_LANG_ES != "L_ORIG_LANG_ES") $FLAG_NAME = L_ORIG_LANG_ES;
				elseif ($name == "swedish" && L_ORIG_LANG_SV != "L_ORIG_LANG_SV") $FLAG_NAME = L_ORIG_LANG_SV;
				elseif ($name == "thai" && L_ORIG_LANG_TH != "L_ORIG_LANG_TH") $FLAG_NAME = L_ORIG_LANG_TH;
				elseif ($name == "turkish" && L_ORIG_LANG_TR != "L_ORIG_LANG_TR") $FLAG_NAME = L_ORIG_LANG_TR;
				elseif ($name == "ukrainian" && L_ORIG_LANG_UK != "L_ORIG_LANG_UK") $FLAG_NAME = L_ORIG_LANG_UK;
				elseif ($name == "urdu" && L_ORIG_LANG_UR != "L_ORIG_LANG_UR") $FLAG_NAME = L_ORIG_LANG_UR;
				elseif ($name == "vietnamese" && L_ORIG_LANG_VI != "L_ORIG_LANG_VI") $FLAG_NAME = L_ORIG_LANG_VI;
				elseif ($name == "yoruba" && L_ORIG_LANG_YO != "L_ORIG_LANG_YO") $FLAG_NAME = L_ORIG_LANG_YO;
				else
				{
					$FLAG_NAME = str_replace("_"," ",$name);
					$FLAG_NAME = mb_convert_case($FLAG_NAME,MB_CASE_TITLE,$Charset);
				}
				$i++;
				?>
				<option value="<?php echo $name ?>" <?php if($LANGUAGE==$name){ echo " selected"; $namesel = $name; } ?>><?php echo ($FLAG_NAME); ?></option>
					<?php
			};
			unset($AvailableLanguages);
			if($namesel == "english" && C_ENGLISH_FORMAT == "US")
			{
				$flagsel_3d = "flag_us.gif";
				$flagsel = "flag_us0.gif";
			}
			else
			{
				$flagsel_3d = "flag.gif";
				$flagsel = "flag0.gif";
			}
			?>
	    </select>&nbsp;<img style="vertical-align:middle" id="flagToSwap" src="<?php echo("./".$ChatPath."localization/".$namesel."/images/".($FLAGS_3D ? $flagsel_3d : $flagsel)); ?>" <?php echo("border=0 ALT=\"".A_CONFCONTENT_12a."\" Title=\"".A_CONFCONTENT_12a."\""); ?> />
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_13; ?></b>
	</td>
    <td><select name="vENGLISH_FORMAT" id="ENflag" onChange="swapImage('ENflag','ENToSwap'); swapImage('3Dflag','3DToSwap'); swapImage('flags','flagToSwap')">
	        <option value="UK"<?php if($ENGLISH_FORMAT=="UK"){ echo " selected"; $ENsel = ($FLAGS_3D) ? "flag.gif" : "flag0.gif"; } ?>><?php echo(L_ORIG_LANG_ENUK); ?></option>
	        <option value="US"<?php if($ENGLISH_FORMAT=="US"){ echo " selected"; $ENsel = ($FLAGS_3D) ? "flag_us.gif" : "flag_us0.gif"; } ?>><?php echo(L_ORIG_LANG_ENUS); ?></option>
        </select>&nbsp;<img style="vertical-align:middle" id="ENToSwap" src="<?php echo(($FLAGS_3D) ? "./".$ChatPath."localization/english/images/".$ENsel."" : "./".$ChatPath."localization/english/images/".$ENsel.""); ?>" <?php echo("border=0 ALT=\"".A_CONFCONTENT_13a."\" Title=\"".A_CONFCONTENT_13a."\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_14; ?></b>
	</td>
    <td>
        <select name="vMULTI_LANG">
	        <option value="0"<?php if($MULTI_LANG==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_14_1; ?></option>
	        <option value="1"<?php if($MULTI_LANG==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_14_2; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_15; ?></b>
	</td>
    <td><select name="vFLAGS_3D" id="3Dflag" onChange="swapImage('3Dflag','3DToSwap'); swapImage('ENflag','ENToSwap'); swapImage('flags','flagToSwap')">
	        <option value="0"<?php if($FLAGS_3D==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_15b; ?></option>
	        <option value="1"<?php if($FLAGS_3D==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_15c; ?></option>
        </select>&nbsp;<img style="vertical-align:middle" id="3DToSwap" src="<?php echo(($FLAGS_3D) ? "./".$ChatPath."localization/english/images/flag.gif" : "./".$ChatPath."localization/english/images/flag0.gif"); ?>" <?php echo("border=0 ALT=\"".A_CONFCONTENT_15a."\" Title=\"".A_CONFCONTENT_15a."\""); ?> />
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="owner"></a><b><?php echo A_CONF_3; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2 ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><a name="ownername"></a><b><?php echo A_CONFCONTENT_16; ?></b>
	</td>
    <td>
		<input name="vADMIN_NAME" type="text" size="25" maxlength="35" value="<?php echo $ADMIN_NAME; ?>">
	</td>
</tr>
<tr>
    <td><a name="admin_email"></a><b><?php echo A_CONFCONTENT_17; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_18); ?></i>
    </td>
    <td>
		<input name="vADMIN_EMAIL" type="text" size="25" maxlength="35" value="<?php echo $ADMIN_EMAIL; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_19; ?></b>
	</td>
    <td>
		<input name="vCHAT_URL" type="text" size="25" maxlength="100" value="<?php echo $CHAT_URL; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_20; ?></b><br />
    		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_21); ?></i>
   	</td>
    <td>
		<textarea name="vMAIL_GREETING" rows=3 cols=28 wrap=on><?php echo $MAIL_GREETING; ?></textarea>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_22; ?></b>
	</td>
    <td>
		<input name="vCHAT_NAME" type="text" size="25" maxlength="255" value="<?php echo $CHAT_NAME; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_23; ?></b><br />
    		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_24); ?></i><br />
    		<?php echo A_CONFCONTENT_25; ?>
    </td>
    <td>
		<select name="vSHOW_LOGO">
	        <option value="0"<?php if($SHOW_LOGO==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_23_1; ?></option>
	        <option value="1"<?php if($SHOW_LOGO==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_23_2; ?></option>
        </select><br />
		<input name="vLOGO_IMG" type="text" size="25" maxlength="255" value="<?php echo $LOGO_IMG; ?>"><br />
		<img src="<?php echo($LOGO_IMG); ?>" border=0 width=180 <?php echo("ALT=\"".$LOGO_ALT."\" Title=\"".$LOGO_ALT."\""); ?> />
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_26; ?></b></td>
    <td>
		<input name="vLOGO_OPEN" type="text" size="25" maxlength="255" value="<?php echo $LOGO_OPEN; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_27; ?></b>
	</td>
    <td>
		<input name="vLOGO_ALT" type="text" size="25" maxlength="255" value="<?php echo $LOGO_ALT; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="registration"></a><b><?php echo A_CONF_4; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_28; ?></b><br />
    	<font color=red><?php echo A_CONFCONTENT_29; ?></font>
	</td>
    <td>
        <select name="vALLOW_REGISTER">
	        <option value="0"<?php if($ALLOW_REGISTER==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($ALLOW_REGISTER==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
		<font color=red> * - <?php echo L_ENABLED; ?></font>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_30; ?></b>
	</td>
    <td>
        <select name="vREQUIRE_REGISTER">
	        <option value="0"<?php if($REQUIRE_REGISTER==0){ echo " selected"; } ?>><?php echo A_CONFOPTIONAL; ?></option>
	        <option value="1"<?php if($REQUIRE_REGISTER==1){ echo " selected"; } ?>><?php echo A_CONFREQUIRED; ?></option>
        </select>
		<font color=red> *</font>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_31; ?></b>
	</td>
    <td>
        <select name="vREQUIRE_NAMES">
	        <option value="0"<?php if($REQUIRE_NAMES==0){ echo " selected"; } ?>><?php echo A_CONFOPTIONAL; ?></option>
	        <option value="1"<?php if($REQUIRE_NAMES==1){ echo " selected"; } ?>><?php echo A_CONFREQUIRED; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_32; ?></b>
	</td>
    <td>
        <select name="vEMAIL_PASWD">
	        <option value="0"<?php if($EMAIL_PASWD==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EMAIL_PASWD==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
		<font color=red> * - <?php echo L_ENABLED; ?></font>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_33; ?></b>
	</td>
    <td>
		<input name="vPASS_LENGTH" type="text" size="7" maxlength="2" value="<?php echo $PASS_LENGTH; ?>">
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_34; ?></b>
	</td>
    <td>
        <select name="vEMAIL_USER">
	        <option value="0"<?php if($EMAIL_USER==0){ echo " selected"; } ?>><?php echo A_CONFNOTSEND; ?></option>
	        <option value="1"<?php if($EMAIL_USER==1){ echo " selected"; } ?>><?php echo A_CONFSEND; ?></option>
        </select>
		<font color=red> * - <?php echo A_CONFNOTSEND; ?></font>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_35; ?></b>
	</td>
    <td>
        <select name="vADMIN_NOTIFY">
	        <option value="0"<?php if($ADMIN_NOTIFY==0){ echo " selected"; } ?>><?php echo A_CONFNOTSEND; ?></option>
	        <option value="1"<?php if($ADMIN_NOTIFY==1){ echo " selected"; } ?>><?php echo A_CONFSEND; ?></option>
        </select>
		<font color=red> * - <?php echo A_CONFSEND; ?></font>
    </td>
</tr>
<tr>
    <td colspan="2"><a name="reg_hint"></a>
	<b><font color=red>* <?php echo sprintf(A_CONFHINT, A_CONFCONTENT_37); ?></b></font>
			<i><ul>
				<li>- <?php echo A_CONFCONTENT_38; ?> <b><font color=blue><?php echo L_ENABLED; ?></font></b></li>
				<li>- <?php echo sprintf(A_CONFCONTENT_39, "<b><font color=blue>".A_CONFREQUIRED."</font></b>"); ?></li>
				<li>- <?php echo A_CONFCONTENT_41; ?> <b><font color=blue><?php echo L_ENABLED; ?></font></b></li>
				<li>- <?php echo A_CONFCONTENT_42; ?> <b><font color=blue><?php echo A_CONFNOTSEND; ?></font></b></li>
				<li>- <?php echo A_CONFCONTENT_43; ?> <b><font color=blue><?php echo A_CONFSEND; ?></font></b></li>
			</ul>
			<?php echo A_CONFCONTENT_44; ?><br />
			<?php echo A_CONFCONTENT_45; ?>
			<li><?php echo A_CONFCONTENT_46; ?></li>
			<li><?php echo A_CONFCONTENT_47; ?></li><br />
			<?php echo sprintf(A_CONFCONTENT_48, "\"".A_MENU_4."\""); ?><br />
			<font color=red><?php echo sprintf(A_CONFIMPORTANT, sprintf(A_CONFCONTENT_50, "<a href=#admin_email class=\"ChatLink\">".A_CONFHERE."</a>")); ?></i>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="functionality"></a><b><?php echo A_CONF_5; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_53; ?></b><br />
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_54); ?></i>
	</td>
    <td>
    	<input name="vBANISH" type="text" size="7" maxlength="3" value="<?php echo $BANISH; ?>">&nbsp;(<?php echo $BANISH == 1 ? L_DAY : L_DAYS; ?>)
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_55; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_56); ?>
		<li><?php echo A_CONFCONTENT_57; ?>
		<li><?php echo A_CONFCONTENT_58; ?></i>
    </td>
    <td>
        <select name="vBAN_IP">
	        <option value="0"<?php if($BAN_IP==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_59; ?></option>
	        <option value="1"<?php if($BAN_IP==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_60; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_61; ?></b>
	</td>
    <td>
        <select name="vUSE_SMILIES">
	        <option value="0"<?php if($USE_SMILIES==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_62; ?></option>
	        <option value="1"<?php if($USE_SMILIES==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_63; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_64; ?></b><br />
    <i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_65); ?></i>
	</td>
    <td>
        <select name="vHTML_TAGS_KEEP">
	        <option value="0"<?php if($HTML_TAGS_KEEP=='simple'){ echo " selected"; } ?>><?php echo A_CONFCONTENT_66; ?></option>
	        <option value="1"<?php if($HTML_TAGS_KEEP=='none'){ echo " selected"; } ?>><?php echo A_CONFCONTENT_67; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_68; ?></b>
	</td>
    <td>
        <select name="vHTML_TAGS_SHOW">
	        <option value="0"<?php if($HTML_TAGS_SHOW==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_69; ?></option>
	        <option value="1"<?php if($HTML_TAGS_SHOW==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_70; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_71; ?></b><br />
			<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_72); ?></i>
	</td>
    <td>
        <select name="vPOPUP_LINKS">
	        <option value="0"<?php if($POPUP_LINKS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_73; ?></option>
	        <option value="1"<?php if($POPUP_LINKS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_74; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_75; ?></b><br />
    	<font color=red><?php echo A_CONFCONTENT_76; ?></font><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_77); ?></i>
    </td>
    <td>
        <select name="vMSG_ORDER">
	        <option value="0"<?php if($MSG_ORDER==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_78; ?></option>
	        <option value="1"<?php if($MSG_ORDER==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_79; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_80; ?></b><br />
    	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_81); ?></font><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_82); ?></i>
    </td>
    <td>
		<input name="vMSG_NB" type="text" size="7" maxlength="2" value="<?php echo $MSG_NB; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_83; ?></b>
	</td>
    <td>
        <select name="vNOTIFY">
	        <option value="0"<?php if($NOTIFY==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_84; ?></option>
	        <option value="1"<?php if($NOTIFY==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_85; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_86; ?></b>
	</td>
    <td>
        <select name="vWELCOME">
	        <option value="0"<?php if($WELCOME==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_87; ?></option>
	        <option value="1"<?php if($WELCOME==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_88; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_89; ?></b>
	</td>
    <td>
		<input name="vSMILEY_COLS" type="text" size="7" maxlength="2" value="<?php echo $SMILEY_COLS; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_90; ?></b>
	</td>
    <td>
		<input name="vSMILEY_COLS_POP" type="text" size="7" maxlength="2" value="<?php echo $SMILEY_COLS_POP; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_91; ?></b>
	</td>
    <td>
        <select name="vSHOW_ETIQ_IN_HELP">
	        <option value="0"<?php if($SHOW_ETIQ_IN_HELP==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_92; ?></option>
	        <option value="1"<?php if($SHOW_ETIQ_IN_HELP==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_93; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_94; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_95); ?></i>
    </td>
    <td>
        <select name="vEXIT_LINK_TYPE" id="door" onChange="swapImage('door','doorToSwap')">
	        <option value="0"<?php if($EXIT_LINK_TYPE==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_96; ?></option>
	        <option value="1"<?php if($EXIT_LINK_TYPE==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_97; ?></option>
        </select>&nbsp;<img id="doorToSwap" src="<?php echo(($EXIT_LINK_TYPE == 1) ? "./".$ChatPath."localization/".$L."/images/exitdoor.gif" : "./".$ChatPath."images/gender_none.gif"); ?>" border=0 <?php echo("ALT=\"".A_CONFCONTENT_97."\" Title=\"".A_CONFCONTENT_97."\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_98; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, sprintf(A_CONFCONTENT_99, "</i><b>a-zA-Z0-9_.-@#$%^&*()=<>?~{}|`:</b><i>")); ?><br />
    	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_101); ?></font><br /></i>
		<?php echo A_CONFCONTENT_102; ?>
    </td>
    <td>
		<input name="vREG_CHARS_ALLOWED" type="text" size="25" maxlength="50" value="<?php echo $REG_CHARS_ALLOWED; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="timings"></a><b><?php echo A_CONF_6; ?></b></td></tr
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_103; ?></b><br />
    	<?php echo A_CONFCONTENT_104; ?><br />
    	<i><?php echo A_CONFCONTENT_105; ?><br />
    	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_106); ?></font></i>
    </td>
    <td>
		<input name="vTMZ_OFFSET" type="text" size="7" maxlength="5" value="<?php echo $TMZ_OFFSET; ?>">&nbsp;(<?php echo abs($TMZ_OFFSET) == 1 ? L_HOUR : L_HOURS; ?>)<br />
        <select name="vWORLDTIME">
	        <option value="0"<?php if($WORLDTIME==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_107; ?></option>
	        <option value="1"<?php if($WORLDTIME==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_108; ?></option>
	        <option value="2"<?php if($WORLDTIME==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_109; ?></option>
        </select>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_110; ?></b><br />
    	<?php echo A_CONFCONTENT_111; ?>
    </td>
    <td>
        <select name="vSHOW_TIMESTAMP">
	        <option value="0"<?php if($SHOW_TIMESTAMP==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_112; ?></option>
	        <option value="1"<?php if($SHOW_TIMESTAMP==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_113; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_114; ?></b>
	</td>
    <td>
		<input name="vMSG_REFRESH" type="text" size="7" maxlength="2" value="<?php echo $MSG_REFRESH; ?>">&nbsp;(<?php echo $MSG_REFRESH == 1 ? L_SEC : L_SECS; ?>)
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_116; ?></b><br />
	<?php echo A_CONFCONTENT_117; ?>
    </td>
    <td>
        <select name="vLOGIN_COUNTER">
	        <option value="0"<?php if($LOGIN_COUNTER==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_118; ?></option>
	        <option value="1"<?php if($LOGIN_COUNTER==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_119; ?></option>
	        <option value="60"<?php if($LOGIN_COUNTER==60){ echo " selected"; } ?>><?php echo A_CONFCONTENT_120; ?></option>
	        <option value="1440"<?php if($LOGIN_COUNTER==1440){ echo " selected"; } ?>><?php echo A_CONFCONTENT_121; ?></option>
	        <option value="10080"<?php if($LOGIN_COUNTER==10080){ echo " selected"; } ?>><?php echo A_CONFCONTENT_122; ?></option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="schedule"></a><b><?php echo A_CONF_7; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_123; ?></b><br />
    	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_124); ?></font></i>
    </td>
    <td align="center">
		<b><font color=blue><?php echo A_CONFCONTENT_125; ?></font><br />
		<input name="vOPEN_ALL_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_ALL_BEG; ?>" class=success DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_ALL_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_ALL_END; ?>" class=success DISABLED><br />
		<font color=red><?php echo A_CONFCONTENT_126; ?></font><br />
		<input name="vOPEN_SUN_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_SUN_BEG; ?>" class=notify2 DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_SUN_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_SUN_END; ?>" class=notify2 DISABLED><br />
		<?php echo A_CONFCONTENT_127; ?><br />
		<input name="vOPEN_MON_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_MON_BEG; ?>" class=notify DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_MON_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_MON_END; ?>" class=notify DISABLED><br />
		<?php echo A_CONFCONTENT_128; ?><br />
		<input name="vOPEN_TUE_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_TUE_BEG; ?>" class=notify DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_TUE_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_TUE_END; ?>" class=notify DISABLED><br />
		<?php echo A_CONFCONTENT_129; ?><br />
		<input name="vOPEN_WED_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_WED_BEG; ?>" class=notify DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_WED_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_WED_END; ?>" class=notify DISABLED><br />
		<?php echo A_CONFCONTENT_130; ?><br />
		<input name="vOPEN_THU_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_THU_BEG; ?>" class=notify DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_THU_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_THU_END; ?>" class=notify DISABLED><br />
		<?php echo A_CONFCONTENT_131; ?><br />
		<input name="vOPEN_FRI_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_FRI_BEG; ?>" class=notify DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_FRI_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_FRI_END; ?>" class=notify DISABLED><br />
		<?php echo A_CONFCONTENT_132; ?><br />
		<input name="vOPEN_SAT_BEG" type="text" size="4" maxlength="8" value="<?php echo $OPEN_SAT_BEG; ?>" class=notify DISABLED>&nbsp;÷&nbsp;
		<input name="vOPEN_SAT_END" type="text" size="4" maxlength="8" value="<?php echo $OPEN_SAT_END; ?>" class=notify DISABLED></b>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="layout"></a><b><?php echo A_CONF_8; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_133; ?></b>
	</td>
    <td>
        <select name="vFILLED_LOGIN">
	        <option value="0"<?php if($FILLED_LOGIN==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_134; ?></option>
	        <option value="1"<?php if($FILLED_LOGIN==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_135; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_136; ?></b><br />
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_137); ?></i><br />
    	<?php echo A_CONFCONTENT_138; ?>
	</td>
    <td>
        <select name="vBACKGR_IMG">
	        <option value="0"<?php if($BACKGR_IMG==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_139; ?></option>
	        <option value="1"<?php if($BACKGR_IMG==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_140; ?></option>
        </select><br />
		<?php echo A_CONFCONTENT_141; ?><br />
		<input name="vBACKGR_IMG_PATH" type="text" size="25" maxlength="255" value="<?php echo $BACKGR_IMG_PATH; ?>">
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_142; ?></b><br />
    	<?php echo A_CONFCONTENT_143; ?>
	</td>
    <td>
        <select name="vSHOW_DEL_PROF">
	        <option value="0"<?php if($SHOW_DEL_PROF==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_144; ?></option>
	        <option value="1"<?php if($SHOW_DEL_PROF==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_145; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_146; ?></b><br />
    	<?php echo A_CONFCONTENT_147; ?>
    </td>
    <td>
        <select name="vSHOW_ADMIN">
	        <option value="0"<?php if($SHOW_ADMIN==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_148; ?></option>
	        <option value="1"<?php if($SHOW_ADMIN==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_149; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_150; ?></b>
	</td>
    <td>
        <select name="vSHOW_TUT">
	        <option value="0"<?php if($SHOW_TUT==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_151; ?></option>
	        <option value="1"<?php if($SHOW_TUT==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_152; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_153; ?></b><br />
    	<?php echo A_CONFCONTENT_154; ?>
    </td>
    <td>
        <select name="vSHOW_INFO">
	        <option value="0"<?php if($SHOW_INFO==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_155; ?></option>
	        <option value="1"<?php if($SHOW_INFO==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_156; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_157; ?></b>
	</td>
    <td>
        <select name="vSET_CMDS">
	        <option value="0"<?php if($SET_CMDS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_158; ?></option>
	        <option value="1"<?php if($SET_CMDS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_159; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_160; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_161); ?></i>
    </td>
    <td>
		<input name="vCMDS" type="text" size="25" maxlength="255" value="<?php echo $CMDS; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_162; ?></b>
	</td>
    <td>
        <select name="vSET_MODS">
	        <option value="0"<?php if($SET_MODS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_163; ?></option>
	        <option value="1"<?php if($SET_MODS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_164; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_165; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_161); ?></i>
    </td>
    <td>
		<input name="vMODS" type="text" size="25" maxlength="255" value="<?php echo $MODS; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_167; ?></b>
	</td>
    <td>
        <select name="vSET_BOT">
	        <option value="0"<?php if($SET_BOT==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_168; ?></option>
	        <option value="1"<?php if($SET_BOT==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_169; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_170; ?></b>
	</td>
    <td>
        <select name="vSHOW_COUNTER">
	        <option value="0"<?php if($SHOW_COUNTER==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_171; ?></option>
	        <option value="1"<?php if($SHOW_COUNTER==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_172; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_173; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_174); ?> - <a href=#ownername class="ChatLink"><?php echo A_CONFCONTENT_175; ?></a></i>
    </td>
    <td>
        <select name="vSHOW_OWNER">
	        <option value="0"<?php if($SHOW_OWNER==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_176; ?></option>
	        <option value="1"<?php if($SHOW_OWNER==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_177; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_178; ?></b>
    </td>
    <td class=success>
		<?php
		  $myCalendar = new tc_calendar("date1", true, false);
		  $myCalendar->zindex = 150; //default 1
		  $myCalendar->setIcon("./plugins/calendar/images/iconCalendar.gif");
		  $myCalendar->setPath("./plugins/calendar/");
		  if($INSTALL_DATE && $INSTALL_DATE != "")
		  {
		    $installdate = strtotime($INSTALL_DATE);
			$myCalendar->setDate(date('d',$installdate), date('m',$installdate), date('Y',$installdate));
		  }
		  else
		  {
			$CorrectedTime = mktime(date("G") + C_TMZ_OFFSET*60*60,date("i"),date("s"),date("m"),date("d"),date("Y"));
			$myCalendar->setDate(date('d',$CorrectedTime), date('m',$CorrectedTime), date('Y',$CorrectedTime));
		  }
		  $myCalendar->setYearInterval(2000, date('Y'));
		  $myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
		  $myCalendar->setAlignment('left', 'bottom'); //optional
		  $myCalendar->writeScript();
		?>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="skins"></a><b><?php echo A_CONF_9; ?></b></td></tr><!--Rooms & Skins-->
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_179; ?></b><br />
    	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONF_ERR_11); ?></font><br />
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_181); ?></i>
	</td>
    <td>
        <select name="vUSE_SKIN">
	        <option value="0"<?php if($USE_SKIN==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_182; ?></option>
	        <option value="1"<?php if($USE_SKIN==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_183; ?></option>
        </select><br />
	<a href="styles_popup.php?<?php echo("L=$L&startStyle=1"); ?>" onClick="styles_popup(); return false" class="ChatLink" target="_blank"><?php echo A_CONFCONTENT_184; ?></a>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_185; ?></b><br />
        <li>0 : <?php echo A_CONFCONTENT_186; ?></li>
        <li>1 : <?php echo A_CONFCONTENT_187; ?></li>
        <li>2 : <?php echo A_CONFCONTENT_188; ?></li>
    </td>
    <td>
        <select name="vVERSION">
	        <option value="0"<?php if($VERSION==0){ echo " selected"; } ?>>0 - <?php echo A_CONFCONTENT_189; ?></option>
	        <option value="1"<?php if($VERSION==1){ echo " selected"; } ?>>1 - <?php echo A_CONFCONTENT_190; ?></option>
	        <option value="2"<?php if($VERSION==2){ echo " selected"; } ?>>2 - <?php echo A_CONFCONTENT_191; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><a name="roomnames"></a><b>1. <?php echo A_CONFCONTENT_192; ?></b><br />
    	<font color=red><i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_193); ?></i></font><br />
		<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_194); ?></i>
	</td>
    <td>
		<input name="vROOM1" type="text" size="25" maxlength="25" value="<?php echo $ROOM1; ?>"><br />
        <select name="vEN_ROOM1">
	        <option value="0"<?php if($EN_ROOM1==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM1==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM1==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select>&nbsp;
        <select name="vRES_ROOM1">
	        <option value="0"<?php if($RES_ROOM1==0){ echo " selected"; } ?>><?php echo A_CONFUNRESTRICT; ?></option>
	        <option value="1"<?php if($RES_ROOM1==1){ echo " selected"; } ?>><?php echo A_CONFRESTRICT; ?></option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN1\">\n");
		skin_selection(1,$ROOM_SKIN1);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>2. <?php echo A_CONFCONTENT_195; ?></b>
	</td>
    <td>
		<input name="vROOM2" type="text" size="25" maxlength="25" value="<?php echo $ROOM2; ?>"><br />
        <select name="vEN_ROOM2">
	        <option value="0"<?php if($EN_ROOM2==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM2==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM2==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select>&nbsp;
        <select name="vRES_ROOM2">
	        <option value="0"<?php if($RES_ROOM2==0){ echo " selected"; } ?>><?php echo A_CONFUNRESTRICT; ?></option>
	        <option value="1"<?php if($RES_ROOM2==1){ echo " selected"; } ?>><?php echo A_CONFRESTRICT; ?></option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN2\">\n");
		skin_selection(2,$ROOM_SKIN2);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. <?php echo A_CONFCONTENT_196; ?></b>
	</td>
    <td>
		<input name="vROOM3" type="text" size="25" maxlength="25" value="<?php echo $ROOM3; ?>"><br />
        <select name="vEN_ROOM3">
	        <option value="0"<?php if($EN_ROOM3==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM3==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM3==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select>&nbsp;
        <select name="vRES_ROOM3">
	        <option value="0"<?php if($RES_ROOM3==0){ echo " selected"; } ?>><?php echo A_CONFUNRESTRICT; ?></option>
	        <option value="1"<?php if($RES_ROOM3==1){ echo " selected"; } ?>><?php echo A_CONFRESTRICT; ?></option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN3\">\n");
		skin_selection(3,$ROOM_SKIN3);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>4. <?php echo A_CONFCONTENT_197; ?></b>
	</td>
    <td>
		<input name="vROOM4" type="text" size="25" maxlength="25" value="<?php echo $ROOM4; ?>"><br />
        <select name="vEN_ROOM4">
	        <option value="0"<?php if($EN_ROOM4==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM4==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM4==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select>&nbsp;
        <select name="vRES_ROOM4">
	        <option value="0"<?php if($RES_ROOM4==0){ echo " selected"; } ?>><?php echo A_CONFUNRESTRICT; ?></option>
	        <option value="1"<?php if($RES_ROOM4==1){ echo " selected"; } ?>><?php echo A_CONFRESTRICT; ?></option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN4\">\n");
		skin_selection(4,$ROOM_SKIN4);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>5. <?php echo A_CONFCONTENT_198; ?></b>
	</td>
    <td>
		<input name="vROOM5" type="text" size="25" maxlength="25" value="<?php echo $ROOM5; ?>"><br />
        <select name="vEN_ROOM5">
	        <option value="0"<?php if($EN_ROOM5==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM5==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM5==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select>&nbsp;
        <select name="vRES_ROOM5">
	        <option value="0"<?php if($RES_ROOM5==0){ echo " selected"; } ?>><?php echo A_CONFUNRESTRICT; ?></option>
	        <option value="1"<?php if($RES_ROOM5==1){ echo " selected"; } ?>><?php echo A_CONFRESTRICT; ?></option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN5\">\n");
		skin_selection(5,$ROOM_SKIN5);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>6. <?php echo A_CONFCONTENT_199; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_200); ?></i>
    </td>
    <td>
		<input name="vROOM6" type="text" size="25" maxlength="25" value="<?php echo $ROOM6; ?>"><br />
        <select name="vEN_ROOM6">
	        <option value="0"<?php if($EN_ROOM6==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM6==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM6==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN6\">\n");
		skin_selection(6,$ROOM_SKIN6);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>7. <?php echo A_CONFCONTENT_201; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_200); ?></i>
    </td>
    <td>
		<input name="vROOM7" type="text" size="25" maxlength="25" value="<?php echo $ROOM7; ?>"><br />
        <select name="vEN_ROOM7">
	        <option value="0"<?php if($EN_ROOM7==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM7==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM7==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN7\">\n");
		skin_selection(7,$ROOM_SKIN7);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>8. <?php echo A_CONFCONTENT_203; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_204); ?></i>
    </td>
    <td>
		<input name="vROOM8" type="text" size="25" maxlength="25" value="<?php echo $ROOM8; ?>"><br />
        <select name="vEN_ROOM8">
	        <option value="0"<?php if($EN_ROOM8==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM8==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM8==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN8\">\n");
		skin_selection(8,$ROOM_SKIN8);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>9. <?php echo A_CONFCONTENT_205; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_206); ?></i>
    </td>
    <td>
		<input name="vROOM9" type="text" size="25" maxlength="25" value="<?php echo $ROOM9; ?>"><br />
        <select name="vEN_ROOM9">
	        <option value="0"<?php if($EN_ROOM9==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_ROOM9==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	    <!--    <option value="2"<?php if($EN_ROOM9==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_132a; ?></option> -->
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN9\">\n");
		skin_selection(9,$ROOM_SKIN9);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>1. <?php echo A_CONFCONTENT_207; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_208); ?></i><br />
		<?php echo A_CONFCONTENT_209; ?>
    </td>
    <td>
        <select name="vSHOW_PRIV">
	        <option value="0"<?php if($SHOW_PRIV==0){ echo " selected"; } ?>><?php echo A_CONFHIDE; ?></option>
	        <option value="1"<?php if($SHOW_PRIV==1){ echo " selected"; } ?>><?php echo A_CONFSHOW; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>2. <?php echo A_CONFCONTENT_210; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_211); ?> <font color=red><?php echo A_CONFCONTENT_212; ?></font></i>
    </td>
    <td>
        <select name="vSHOW_PRIV_MOD">
	        <option value="0"<?php if($SHOW_PRIV_MOD==0){ echo " selected"; } ?>><?php echo A_CONFHIDE; ?></option>
	        <option value="1"<?php if($SHOW_PRIV_MOD==1){ echo " selected"; } ?>><?php echo A_CONFSHOW; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b>3. <?php echo A_CONFCONTENT_213; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_214); ?> <font color=red><?php echo A_CONFCONTENT_212; ?></font></i>
    </td>
    <td>
        <select name="vSHOW_PRIV_USR">
	        <option value="0"<?php if($SHOW_PRIV_USR==0){ echo " selected"; } ?>><?php echo A_CONFHIDE; ?></option>
	        <option value="1"<?php if($SHOW_PRIV_USR==1){ echo " selected"; } ?>><?php echo A_CONFSHOW; ?></option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="colors"></a><b><?php echo A_CONF_10; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_216; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONF_ERR_11); ?></font><br />
	<?php echo sprintf(A_CONFHINT, A_CONFCONTENT_218); ?></i>
    </td>
    <td>
        <select name="vCOLOR_NAMES">
	        <option value="0"<?php if($COLOR_NAMES==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($COLOR_NAMES==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr>
	<td><b><?php echo A_CONFCONTENT_219; ?></b><br />
    	<?php echo A_CONFCONTENT_220; ?><br />
		<i><?php echo sprintf(A_CONFHINT, sprintf(A_CONFCONTENT_221, "<font color=".$COLOR_CA.">".$COLOR_CA."</font>", "<font color=".$COLOR_CM.">".$COLOR_CM."</font>")); ?></i>
	</td>
    <td>
        <select name="vITALICIZE_POWERS">
	        <option value="0"<?php if($ITALICIZE_POWERS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_224; ?></option>
	        <option value="1"<?php if($ITALICIZE_POWERS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_225; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
	<td><b><?php echo A_CONFCONTENT_226; ?></b><br />
    	<?php echo A_CONFCONTENT_227; ?><br />
    	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_228); ?></font><br />
		<i><?php echo A_CONFCONTENT_229; ?></i>
	</td>
    <td>
		<input name="vTAGS_POWERS" type="text" size="3" maxlength="5" value="<?php echo $TAGS_POWERS; ?>">
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_230; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_231); ?></i>
    </td>
    <td>
        <select name="vCOLOR_FILTERS">
	        <option value="0"<?php if($COLOR_FILTERS==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($COLOR_FILTERS==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_232; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_233); ?></i>
	</td>
    <td>
 		<?php
#		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CA\" style=\"background-color:".$COLOR_CA.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vCOLOR_CA\" style=\"background-color:".$COLOR_CA.";\">\n");
		else echo("<select name=\"vCOLOR_CA\">");
			$CCA = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCA))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($COLOR_CA == $ColorCode) echo(" selected");
				if ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select><br />
		<?php
# 		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CA1\" style=\"background-color:".$COLOR_CA1.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vCOLOR_CA1\" style=\"background-color:".$COLOR_CA1.";\">\n");
		else echo("<select name=\"vCOLOR_CA1\">");
			$CCA1 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCA1))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($COLOR_CA1 == $ColorCode) echo(" selected");
				if ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select><br />
		<?php
#		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CA2\" style=\"background-color:".$COLOR_CA2.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vCOLOR_CA2\" style=\"background-color:".$COLOR_CA2.";\">\n");
		else echo("<select name=\"vCOLOR_CA2\">");
			$CCA2 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCA2))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($COLOR_CA2 == $ColorCode) echo(" selected");
				if ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_234; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_233); ?><br />
		<?php echo A_CONFCONTENT_236; ?></i>
    </td>
    <td>
		<?php
#		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CM\" style=\"background-color:".$COLOR_CM.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vCOLOR_CM\" style=\"background-color:".$COLOR_CM.";\">\n");
		else echo("<select name=\"vCOLOR_CM\">");
			$CCM = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCM))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($COLOR_CM == $ColorCode) echo(" selected");
				if ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select><br />
		<?php
#		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CM1\" style=\"background-color:".$COLOR_CM1.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vCOLOR_CM1\" style=\"background-color:".$COLOR_CM1.";\">\n");
		else echo("<select name=\"vCOLOR_CM1\">");
			$CCM1 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCM1))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($COLOR_CM1 == $ColorCode) echo(" selected");
				if ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select><br />
		<?php
# 		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CM2\" style=\"background-color:".$COLOR_CM2.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vCOLOR_CM2\" style=\"background-color:".$COLOR_CM2.";\">\n");
		else echo("<select name=\"vCOLOR_CM2\">");
			$CCM2 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCM2))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if ($COLOR_CM2 == $ColorCode) echo(" selected");
				if ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_237; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_238); ?></i>
    </td>
    <td>
        <select name="vCOLOR_ALLOW_GUESTS">
	        <option value="0"<?php if($COLOR_ALLOW_GUESTS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_239; ?></option>
	        <option value="1"<?php if($COLOR_ALLOW_GUESTS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_240; ?></option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="sounds"></a><b><?php echo A_CONF_11; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_241; ?></b><!--Play a sound on entrance.-->
	</td>
    <td>
        <select name="vALLOW_ENTRANCE_SOUND">
	        <option value="0"<?php if($ALLOW_ENTRANCE_SOUND==0){ echo " selected"; } ?>>0 - <?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($ALLOW_ENTRANCE_SOUND==1){ echo " selected"; } ?>>1 - <?php echo A_CONFCONTENT_242; ?></option>
	        <option value="2"<?php if($ALLOW_ENTRANCE_SOUND==2){ echo " selected"; } ?>>2 - <?php echo A_CONFCONTENT_243; ?></option>
	        <option value="3"<?php if($ALLOW_ENTRANCE_SOUND==3){ echo " selected"; } ?>>3 - <?php echo A_CONFCONTENT_244; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_245; ?></b><br />
    	<i><?php echo A_CONFCONTENT_246; ?></i>
    </td>
    <td><?php echo A_CONFCONTENT_247; ?><br />
		<input name="vENTRANCE_SOUND" type="text" size="20" maxlength="255" value="<?php echo $ENTRANCE_SOUND; ?>"><br />
    	<?php echo A_CONFCONTENT_248; ?><br />
		<input name="vWELCOME_SOUND" type="text" size="20" maxlength="255" value="<?php echo $WELCOME_SOUND; ?>">
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_249; ?></b><br />
    	<?php echo A_CONFCONTENT_250; ?>
    </td>
    <td>
        <select name="vALLOW_BUZZ_SOUND">
	        <option value="0"<?php if($ALLOW_BUZZ_SOUND==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_251; ?></option>
	        <option value="1"<?php if($ALLOW_BUZZ_SOUND==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_252; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_253; ?></b><br />
    	<i><?php echo A_CONFCONTENT_254; ?></i>
    </td>
    <td>
		<input name="vBUZZ_SOUND" type="text" size="25" maxlength="255" value="<?php echo $BUZZ_SOUND; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="profanity"></a><b><?php echo A_CONF_12; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_255; ?></b><br />
    	<?php echo A_CONFCONTENT_256; ?>
    </td>
    <td>
        <select name="vNO_SWEAR">
	        <option value="0"<?php if($NO_SWEAR==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_257; ?></option>
	        <option value="1"<?php if($NO_SWEAR==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_258; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_259; ?></b>
	</td>
    <td>
		<input name="vSWEAR_EXPR" type="text" size="7" maxlength="5" value="<?php echo $SWEAR_EXPR; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. <?php echo A_CONFCONTENT_260; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_261); ?></i>
    </td>
    <td>
		<input name="vSWEAR1" type="text" size="25" maxlength="25" value="<?php echo $SWEAR1; ?>">
	</td>
</tr>
<tr>
    <td><b>2. <?php echo A_CONFCONTENT_260; ?></b>
	</td>
    <td>
		<input name="vSWEAR2" type="text" size="25" maxlength="25" value="<?php echo $SWEAR2; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. <?php echo A_CONFCONTENT_260; ?></b>
	</td>
    <td>
		<input name="vSWEAR3" type="text" size="25" maxlength="25" value="<?php echo $SWEAR3; ?>">
	</td>
</tr>
<tr>
    <td><b>4. <?php echo A_CONFCONTENT_260; ?></b>
	</td>
    <td>
		<input name="vSWEAR4" type="text" size="25" maxlength="25" value="<?php echo $SWEAR4; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="pm"></a><b><?php echo A_CONF_15; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_263; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_264); ?></i>
    </td>
    <td>
        <select name="vENABLE_PM">
	        <option value="0"<?php if($ENABLE_PM==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($ENABLE_PM==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_265; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_266); ?><br />
	<?php echo A_CONFCONTENT_267; ?><br />
	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONF_ERR_11); ?></font></i><br />
	<?php echo A_CONFCONTENT_269; ?>
    </td>
    <td>
        <select name="vPRIV_POPUP">
	        <option value="0"<?php if($PRIV_POPUP==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($PRIV_POPUP==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_270; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_271); ?></i>
    </td>
    <td>
        <select name="vALLOW_PM_DEL">
	        <option value="0"<?php if($ALLOW_PM_DEL==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_272; ?></option>
	        <option value="1"<?php if($ALLOW_PM_DEL==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_273; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_274; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_275); ?></font></i>
	</td>
    <td>
		<input name="vPM_KEEP_DAYS" type="text" size="7" maxlength="3" value="<?php echo $PM_KEEP_DAYS; ?>">&nbsp;(<?php echo $PM_KEEP_DAYS == 1 ? L_DAY : L_DAYS; ?>)
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="bot"></a><b><?php echo A_CONF_16; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_276; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_277); ?></font></i>
    </td>
    <td>
        <select name="vBOT_CONTROL">
	        <option value="0"<?php if($BOT_CONTROL==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($BOT_CONTROL==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_278; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_279); ?></i>
    </td>
    <td>
        <select name="vBOT_PUBLIC">
	        <option value="0"<?php if($BOT_PUBLIC==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_280; ?></option>
	        <option value="1"<?php if($BOT_PUBLIC==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_281; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_282; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, sprintf(A_CONFCONTENT_283, "<a href=\"./bot/talk.php\" target=\"_blank\">Talk2Bot</a>")); ?></i>
		<?php if (!$bot_id) echo "<br />" . sprintf(A_CONFNOTE, sprintf(A_CONFCONTENT_284, "install/manual installation/Manual Instructions.txt")); ?></font>
    </td>
    <td>
			<input name="vBOT_NAME" type="text" size="25" maxlength="25" value="<?php echo $BOT_NAME; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_285; ?></b><br />
    	<?php if ($bot_id <> 1) echo "<i><font color=red>" . sprintf(A_CONFIMPORTANT, A_CONFCONTENT_286) . "</i></font>"; ?>
    </td>
    <td>
			<?php
			if (!$bot_loaded)
			{
				echo ("<font color=red>" . A_CONFCONTENT_287 . ((file_exists("bot/aiml/startup.xml") && file_exists("bot/botloader.php")) ? "<br />" . A_CONFCONTENT_288 : ""));
			}
			elseif ($bot_id)
			{
				echo(($bot_id == 1) ? "<font color=green>" . A_CONFCONTENT_289 . "</font><input name=\"BotId\" type=\"text\" size=\"7\" maxlength=\"2\" value=\"$bot_id\" DISABLED READONLY>" : "<font color=red>" . A_CONFCONTENT_289 . "</font><input name=\"BotId\" type=\"text\" size=\"7\" maxlength=\"2\" value=\"$bot_id\" DISABLED READONLY><br />" . A_CONFCONTENT_291);
			}
			?>
		</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_292; ?></b>
	</td>
    <td>
		<?php
# 		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vBOT_FONT_COLOR\" style=\"background-color:".$BOT_FONT_COLOR.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vBOT_FONT_COLOR\" style=\"background-color:".$BOT_FONT_COLOR.";\">\n");
		else echo("<select name=\"vBOT_FONT_COLOR\">");
			$BOTF = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($BOTF))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($BOT_FONT_COLOR == $ColorCode) echo(" selected");
				if ($ColorCode == $BOT_FONT_COLOR && $ColorCode != "") echo(">".$ColorCode.$selected."</option>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CA || $ColorCode == COLOR_CA1 || $ColorCode == COLOR_CA2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".A_ADMIN.")</option>" : ">".$ColorCode."</option>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CM || $ColorCode == COLOR_CM1 || $ColorCode == COLOR_CM2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".A_MODER.")</option>" : ">".$ColorCode."</option>");
				elseif ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
			?>
		</select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_293; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_294); ?></i>
    </td>
    <td>
		<input name="vBOT_AVATAR" type="text" size="20" maxlength="255" value="<?php echo $BOT_AVATAR; ?>">
		<?php echo(($BOT_AVATAR != "") ? "&nbsp;<img id=\"bot_avatarToSwap\" src=\"".$BOT_AVATAR."\" border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"".A_CONFCONTENT_294a."\" Title=\"".A_CONFCONTENT_294a."\" />" : ""); ?>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_295; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_296); ?></i>
    </td>
    <td>
		<input name="vBOT_HELLO" type="text" size="25" maxlength="100" value="<?php echo $BOT_HELLO; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_297; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_296); ?></i>
    </td>
    <td>
		<input name="vBOT_BYE" type="text" size="25" maxlength="100" value="<?php echo $BOT_BYE; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="commands"></a><b><?php echo A_CONFTITLE_1; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_299; ?></b><br />
    	<i><?php echo A_CONFCONTENT_300; ?></i>
    </td>
    <td>
		<input name="vSAVE" type="text" size="7" maxlength="2" value="<?php echo $SAVE; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_301; ?></b><br />
    	<?php echo A_CONFCONTENT_302; ?><br />
		<i><?php echo sprintf(A_CONFHINT, sprintf(A_CONFCONTENT_303, "localized.chat.php/", "localized/_owner/owner.php")); ?></i>
    </td>
    <td>
        <select name="vTOPIC_DIFF">
	        <option value="0"<?php if($TOPIC_DIFF==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_304; ?></option>
	        <option value="1"<?php if($TOPIC_DIFF==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_305; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_306; ?></b><br />
    	<i><?php echo A_CONFCONTENT_307; ?></i>
    </td>
    <td>
		<input name="vROOM_SAYS" type="text" size="25" maxlength="255" value="<?php echo $ROOM_SAYS; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_308; ?></b><br />
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_309); ?></i>
	</td>
    <td>
        <select name="vDEMOTE_MOD">
	        <option value="0"<?php if($DEMOTE_MOD==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_310; ?></option>
	        <option value="1"<?php if($DEMOTE_MOD==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_311; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_312; ?></b><br />
    	<i><font color=red><?php echo A_CONFCONTENT_313; ?></font><br />
		<?php echo sprintf(A_CONFHINT, A_CONFCONTENT_314); ?></i>
    </td>
    <td>
		<input name="vMAX_DICES" type="text" size="7" maxlength="2" value="<?php echo $MAX_DICES; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_315; ?></b>
	</td>
    <td>
		<input name="vMAX_ROLLS" type="text" size="7" maxlength="3" value="<?php echo $MAX_ROLLS; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_316; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_317); ?></i>
    </td>
    <td>
        <select name="vUSERS_SORT_ORD">
	        <option value="0"<?php if($USERS_SORT_ORD==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_318; ?></option>
	        <option value="1"<?php if($USERS_SORT_ORD==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_319; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_320; ?></b>
	</td>
    <td>
		<input name="vMAX_PIC_SIZE" type="text" size="7" maxlength="3" value="<?php echo $MAX_PIC_SIZE; ?>">&nbsp;(<?php echo A_CONFPX; ?>)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
	<td><b><?php echo A_CONFCONTENT_321; ?></b><br />
    	<?php echo A_CONFCONTENT_322; ?><br />
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_323); ?></i><br />
		<?php echo A_CONFCONTENT_324; ?>
	</td>
    <td>
        <select name="vALLOW_MATH">
	        <option value="0"<?php if($ALLOW_MATH==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($ALLOW_MATH==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select><br />
		<?php echo A_CONFCONTENT_325; ?><br />
		<input name="vSRC_MATH" type="text" size="25" maxlength="255" value="<?php echo $SRC_MATH; ?>">
    </td>
</tr>

</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="mmedia"></a><b><?php echo A_CONF_18; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_326; ?></b><br />
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_327); ?></i>
	</td>
    <td>
        <select name="vALLOW_VIDEO">
	        <option value="0"<?php if($ALLOW_VIDEO==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($ALLOW_VIDEO==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
	        <option value="2"<?php if($ALLOW_VIDEO==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_328; ?></option>
        </select>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_329; ?></b>
	</td>
    <td align=right>
		<?php echo A_CONFWIDTH; ?>:&nbsp;<input name="vVIDEO_WIDTH" type="text" size="7" maxlength="3" value="<?php echo $VIDEO_WIDTH; ?>">&nbsp;(<?php echo A_CONFPX; ?>)<br />
		<?php echo A_CONFHEIGHT; ?>:&nbsp;<input name="vVIDEO_HEIGHT" type="text" size="7" maxlength="3" value="<?php echo $VIDEO_HEIGHT; ?>">&nbsp;(<?php echo A_CONFPX; ?>)
	</td>

</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_330; ?></b><br />
    	<?php echo A_CONFCONTENT_331; ?><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONF_ERR_11); ?></font><br />
    	<?php echo sprintf(A_CONFHINT, A_CONFCONTENT_333); ?></i>
	</td>
    <td>
        <select name="vEN_WMPLAYER">
	        <option value="0"<?php if($EN_WMPLAYER==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($EN_WMPLAYER==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_334; ?></option>
	        <option value="2"<?php if($EN_WMPLAYER==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_335; ?></option>
        </select>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_336; ?></b><br />
    	<?php echo A_CONFCONTENT_336a; ?>
	</td>
    <td>
		<input name="vWMP_STREAM" type="text" size="25" maxlength="255" value="<?php echo $WMP_STREAM; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="quick"></a><b><?php echo A_CONF_19; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_337; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_340a); ?></i><br />
		<?php echo A_CONFCONTENT_340; ?>
    </td>
    <td><textarea name="vQUICKA" rows=5 cols=28 wrap=on><?php echo $QUICKA; ?></textarea>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_338; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_340a); ?></i><br />
		<?php echo A_CONFCONTENT_341; ?>
    </td>
    <td><textarea name="vQUICKM" rows=5 cols=28 wrap=on><?php echo $QUICKM; ?></textarea>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_339; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_340a); ?></i><br />
		<?php echo A_CONFCONTENT_342; ?>
    </td>
    <td><textarea name="vQUICKU" rows=5 cols=28 wrap=on><?php echo $QUICKU; ?></textarea>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="avatars"></a><b><?php echo A_CONF_20; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_343; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONF_ERR_11); ?></font></i>
    </td>
    <td>
        <select name="vUSE_AVATARS" id="use_avatars" onChange="swapImage('use_avatars','use_avatarsToSwap')">
	        <option value="0"<?php if($USE_AVATARS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_345; ?></option>
	        <option value="1"<?php if($USE_AVATARS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_346; ?></option>
        </select>&nbsp;<img id="use_avatarsToSwap" src="<?php echo(($USE_AVATARS==1) ? "./".$ChatPath.$AVA_RELPATH.$DEF_AVATAR : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"".A_CONFCONTENT_352."\" Title=\"".A_CONFCONTENT_352."\""); ?> />
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_347; ?></b>
	</td>
    <td>
        <select name="vAVA_PROFBUTTON" id="prof_button" onChange="swapImage('prof_button','prof_buttonToSwap')">
	        <option value="0"<?php if($AVA_PROFBUTTON==0){ echo " selected"; } ?>><?php echo A_CONFHIDE; ?></option>
	        <option value="1"<?php if($AVA_PROFBUTTON==1){ echo " selected"; } ?>><?php echo A_CONFSHOW; ?></option>
        </select>&nbsp;<img id="prof_buttonToSwap" src="<?php echo(($AVA_PROFBUTTON==1) ? "./".$ChatPath."images/avatarbutton.gif" : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"".A_CONFCONTENT_351."\" Title=\"".A_CONFCONTENT_351."\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_348; ?></b>
	</td>
    <td>
		<input name="vAVA_RELPATH" type="text" size="25" maxlength="55" value="<?php echo $AVA_RELPATH == "" ? "images/avatars/" : $AVA_RELPATH; ?>">
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_349; ?></b><br />
	<i><?php echo sprintf(A_CONFHINT, sprintf(A_CONFCONTENT_350, $NUM_AVATARS)); ?></i>
	</td>
    <td>
		<?php
		$avatars = $AVA_RELPATH;
		$avatarfiles = opendir($avatars); #open directory
			$i = 0;
			while (false !== ($avatarfile = readdir($avatarfiles)))
			{
# 				if (!eregi("\.html",$avatarfile) && !eregi("uploaded",$avatarfile) && !eregi("quote_avatar",$avatarfile) && !eregi("bot_avatar",$avatarfile) && $avatarfile!=='.' && $avatarfile!=='..')
				if (!preg_match("/(\.html|uploaded|quote_avatar\.gif|bot_avatar\.gif)$/i", $avatarfile) && !preg_match("/^[\.]/", $avatarfile))
				{
					$avatarsfile[]=$avatarfile;
			 		$i++;
				}
			}
			closedir($avatarfiles);
			$max_num_avatars = $i-2;
?>
		<input name="vNUM_AVATARS" type="text" size="7" maxlength="3" value="<?php echo (($NUM_AVATARS > $max_num_avatars) ? $max_num_avatars : $NUM_AVATARS); ?>">
		&nbsp;(<= <?php echo($max_num_avatars); ?>)
		<input name="max_num_avatars" type="hidden" value="<?php echo $max_num_avatars; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_352; ?></b>
	</td>
    <td>
		<select name="vDEF_AVATAR" id="def_avatar" onChange="swapImage('def_avatar','def_avatarToSwap')">
<?php
			if ($avatarsfile)
			{
			  	natsort($avatarsfile);
			}
			$j = 1;
			foreach ($avatarsfile as $avatarname)
			{
				echo("<option value=\"".$avatarname."\"");
				if($DEF_AVATAR == $avatarname) echo(" selected");
				echo(">".$avatarname."</option>");
			$j++;
			}
		unset($avatarsfile);
		?>
		</select><?php echo("&nbsp;<img id=\"def_avatarToSwap\" src=\"./".$ChatPath.$AVA_RELPATH.$DEF_AVATAR."\" border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"".A_CONFCONTENT_352."\" Title=\"".A_CONFCONTENT_352."\""); ?> />
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_353; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_354); ?></i>
	</td>
    <td align=right>
		<?php echo A_CONFWIDTH; ?>:&nbsp;<input name="vAVA_WIDTH" type="text" size="7" maxlength="3" value="<?php echo $AVA_WIDTH; ?>">&nbsp;(<?php echo A_CONFPX; ?>)<br />
		<?php echo A_CONFHEIGHT; ?>:&nbsp;<input name="vAVA_HEIGHT" type="text" size="7" maxlength="3" value="<?php echo $AVA_HEIGHT; ?>">&nbsp;(<?php echo A_CONFPX; ?>)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_355; ?></b><br />
	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_356); ?></font></i>
	</td>
    <td>
        <select name="vALLOW_UPLOADS">
	        <option value="0"<?php if($ALLOW_UPLOADS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_357; ?></option>
	        <option value="1"<?php if($ALLOW_UPLOADS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_358; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_359; ?></b>
	</td>
    <td>
        <select name="vDISP_GENDER" id="genders" onChange="swapImage('genders','gendersToSwap')">
	        <option value="0"<?php if($DISP_GENDER==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_360; ?></option>
	        <option value="1"<?php if($DISP_GENDER==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_361; ?></option>
        </select>&nbsp;<img style="vertical-align:middle" id="gendersToSwap" src="<?php echo(($DISP_GENDER==1) ? "./".$ChatPath."images/gender_couple.gif" : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 ALT=\"".A_CONFCONTENT_351a."\" Title=\"".A_CONFCONTENT_351a."\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><a name="force"></a><b><?php echo A_CONFCONTENT_362; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_363); ?></font><br />
		<?php echo sprintf(A_CONFHINT, A_CONFCONTENT_364); ?></i>
    </td>
    <td>
        <select name="vALLOW_GRAVATARS" id="gravatars" onChange="swapImage('gravatars','gravatarsToSwap')">
	        <option value="0"<?php if($ALLOW_GRAVATARS==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($ALLOW_GRAVATARS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_365; ?></option>
	        <option value="2"<?php if($ALLOW_GRAVATARS==2){ echo " selected"; } ?>><?php echo A_CONFCONTENT_366; ?></option>
        </select>&nbsp;<img id="gravatarsToSwap" src="<?php echo(($ALLOW_GRAVATARS) ? "http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=".$AVA_WIDTH."&r=g&d=".$GRAVATARS_DYNAMIC_DEF : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 ALT=\"Gravatar\" Title=\"Gravatar\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
	<td colspan="2">
    	<i><font color=blue><?php echo A_CONFCONTENT_367; ?></font><br />
    	<?php echo A_CONFCONTENT_368; ?><br />
		<font color=blue><?php echo A_CONFCONTENT_369; ?></font></i>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_370; ?></b><br />
	<i><?php echo A_CONFCONTENT_371 . "<br /><font color=red>" . sprintf(A_CONFIMPORTANT, A_CONFCONTENT_371a); ?><br />
	<?php echo((!$cache_supported || $server_blocked) ? "<b>".A_CONFCONTENT_371b."</b><br />" : ""); ?>
		</font><font color=blue><?php echo A_CONFCONTENT_372; ?>&nbsp;<b><?php echo($_SERVER['SERVER_ADDR']); ?></b> <?php echo(!$server_blocked ? "" : "<b><font color=red>".A_CONFCONTENT_371c."</font></b>"); ?></font><br />
		<font color=blue><?php echo A_CONFCONTENT_377; ?>&nbsp;<b><?php echo(mysql_get_server_info()); ?></b></font><br />
		<font color=blue><?php echo A_CONFCONTENT_373; ?>&nbsp;<b><?php echo(version_compare(PHP_VERSION,'5') >= 0 ? "<font color=red>".PHP_VERSION."</font>" : PHP_VERSION); ?></b></font><br />
		<font color=blue><?php echo A_CONFCONTENT_374; ?>&nbsp;<b><?php echo(!(ini_get("allow_url_fopen")) ? "<font color=red>".L_DISABLED."</font>" : L_ENABLED); ?></b></font><br />
		<font color=blue><?php echo A_CONFCONTENT_375; ?>&nbsp;<b><?php echo(!(ini_get("allow_url_include")) ? "<font color=red>".L_DISABLED."</font>" : L_ENABLED); ?></b></font><br />
		<font color=blue><?php echo A_CONFCONTENT_376; ?>&nbsp;<b><?php echo(!(function_exists("file_get_contents")) ? "<font color=red>".L_DISABLED."</font>" : L_ENABLED); ?></b></font></i>
	</td>
    <td>
		<input type="radio" value="0" name="vGRAVATARS_CACHE" <?php if($GRAVATARS_CACHE==0 || !$cache_supported || $server_blocked) { echo " checked"; }; ?>>&nbsp;<?php echo A_CONFCONTENT_378; ?><br />
		<input type="radio" value="1" name="vGRAVATARS_CACHE" <?php if($GRAVATARS_CACHE==1 && $cache_supported){ echo " checked"; }; if(!$cache_supported || $server_blocked){ echo " disabled"; }; ?>>&nbsp;<?php echo A_CONFCONTENT_379; ?><br />
		<?php echo A_CONFCONTENT_380; ?><!--Cache Age:--><br /><input name="vGRAVATARS_CACHE_EXPIRE" type="text" size="7" maxlength="3" value="<?php echo $GRAVATARS_CACHE_EXPIRE; ?>"<?php if(!$cache_supported || $server_blocked){ echo " readonly"; }; ?>>&nbsp;(<?php echo $GRAVATARS_CACHE_EXPIRE == 1 ? L_DAY : L_DAYS; ?>)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_381; ?></b>
	</td>
    <td>
        <select name="vGRAVATARS_RATING">
	        <option value="G"<?php if($GRAVATARS_RATING=="G"){ echo " selected"; } ?>>G</option>
	        <option value="PG"<?php if($GRAVATARS_RATING=="PG"){ echo " selected"; } ?>>PG</option>
	        <option value="R"<?php if($GRAVATARS_RATING=="R"){ echo " selected"; } ?>>R</option>
	        <option value="X"<?php if($GRAVATARS_RATING=="X"){ echo " selected"; } ?>>X</option>
	        <option value="ANY"<?php if($GRAVATARS_RATING=="ANY"){ echo " selected"; } ?>><?php echo A_CONFCONTENT_382; ?></option>
        </select>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td colspan=2>
		<i><?php echo A_CONFCONTENT_383; ?><br />
		<?php echo A_CONFCONTENT_385; ?><br />
		<?php echo A_CONFCONTENT_386; ?><br />
		<?php echo A_CONFCONTENT_387; ?></i>
	</td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_388; ?></b><br />
	<i><?php echo A_CONFCONTENT_389; ?><br />
	<font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_390); ?></font></i>
    </td>
    <td>
        <select name="vGRAVATARS_DYNAMIC_DEF" id="gravatars_def" onChange="swapImage('gravatars_def','gravatars_defToSwap')">
	        <option value=""<?php if($GRAVATARS_DYNAMIC_DEF==""){ echo " selected"; } ?>>Blue G</option>
	        <option value="identicon"<?php if($GRAVATARS_DYNAMIC_DEF=="identicon"){ echo " selected"; } ?>>identicon</option>
	        <option value="monsterid"<?php if($GRAVATARS_DYNAMIC_DEF=="monsterid"){ echo " selected"; } ?>>monsterid</option>
	        <option value="wavatar"<?php if($GRAVATARS_DYNAMIC_DEF=="wavatar"){ echo " selected"; } ?>>wavatar</option>
        </select>
        <?php
        if ($ALLOW_GRAVATARS)
        {
        	if ($GRAVATARS_DYNAMIC_DEF=="")
        	$grav_def_src = "http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=$AVA_WIDTH&r=g";
        	elseif ($GRAVATARS_DYNAMIC_DEF=="identicon")
        	$grav_def_src = "http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=$AVA_WIDTH&r=g&d=identicon";
        	elseif ($GRAVATARS_DYNAMIC_DEF=="monsterid")
        	$grav_def_src = "http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=$AVA_WIDTH&r=g&d=monsterid";
        	elseif ($GRAVATARS_DYNAMIC_DEF=="wavatar")
        	$grav_def_src = "http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=$AVA_WIDTH&r=g&d=wavatar";
        	else $grav_def_src = "./".$ChatPath."images/gender_none.gif";
        }
        ?>
        &nbsp;<img id="gravatars_defToSwap" src="<?php echo((isset($grav_def_src) && $grav_def_src!= "") ? $grav_def_src : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 ALT=\"".A_CONFCONTENT_388a."\" Title=\"".A_CONFCONTENT_388a."\""); ?> /><br />
        <select name="vGRAVATARS_DYNAMIC_DEF_FORCE">
	        <option value="0"<?php if($GRAVATARS_DYNAMIC_DEF_FORCE==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_391; ?></option>
	        <option value="1"<?php if($GRAVATARS_DYNAMIC_DEF_FORCE==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_392; ?></option>
        </select>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="logging"></a><b><?php echo A_CONF_21; ?></b></td></tr><!--Logging Mod-->
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_393; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_394); ?></i>
    </td>
    <td>
        <select name="vCHAT_LOGS">
	        <option value="0"<?php if($CHAT_LOGS==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($CHAT_LOGS==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_395; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_396); ?></font><br />
    	<?php echo sprintf(A_CONFHINT, A_CONFCONTENT_397); ?></i>
    </td>
    <td>
		<input name="vLOG_DIR" type="text" size="25" maxlength="25" value="<?php echo $LOG_DIR; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_398; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_399); ?></i>
    </td>
    <td>
        <select name="vSHOW_LOGS_USR">
	        <option value="0"<?php if($SHOW_LOGS_USR==0){ echo " selected"; } ?>><?php echo A_CONFHIDE; ?></option>
	        <option value="1"<?php if($SHOW_LOGS_USR==1){ echo " selected"; } ?>><?php echo A_CONFSHOW; ?></option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="lurking"></a><b><?php echo A_CONF_22; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_400; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_401); ?></i>
    </td>
    <td>
        <select name="vCHAT_LURKING">
	        <option value="0"<?php if($CHAT_LURKING==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($CHAT_LURKING==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_402; ?></b><br />
    	<i><?php echo sprintf(A_CONFNOTE, A_CONFCONTENT_403); ?></i>
    </td>
    <td>
        <select name="vSHOW_LURK_USR">
	        <option value="0"<?php if($SHOW_LURK_USR==0){ echo " selected"; } ?>><?php echo A_CONFHIDE; ?></option>
	        <option value="1"<?php if($SHOW_LURK_USR==1){ echo " selected"; } ?>><?php echo A_CONFSHOW; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_404; ?></b>
	</td>
    <td>
        <select name="vCHAT_EXTRAS">
	        <option value="0"<?php if($CHAT_EXTRAS==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($CHAT_EXTRAS==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="quote"></a><b><?php echo A_CONF_23; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_405; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_406); ?></font></i>
	</td>
    <td>
		<select name="vQUOTE">
	        <option value="0"<?php if($QUOTE==0){ echo " selected"; } ?>><?php echo L_DISABLED; ?></option>
	        <option value="1"<?php if($QUOTE==1){ echo " selected"; } ?>><?php echo L_ENABLED; ?></option>
        </select>
	</td>
</tr>
<tr>
	<td><b><?php echo A_CONFCONTENT_407; ?></b>
	</td>
	<td>
		<input name="vQUOTE_NAME" type="text" size="25" maxlength="25" value="<?php echo $QUOTE_NAME; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
	<td><b><?php echo A_CONFCONTENT_408; ?></b>
	</td>
	<td>
		<?php
# 		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vQUOTE_FONT_COLOR\" style=\"background-color:".$QUOTE_FONT_COLOR.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vQUOTE_FONT_COLOR\" style=\"background-color:".$QUOTE_FONT_COLOR.";\">\n");
		else echo("<select name=\"vQUOTE_FONT_COLOR\">");
			$CQ = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CQ))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($QUOTE_FONT_COLOR == $ColorCode) echo(" selected");
				if ($ColorCode == $QUOTE_FONT_COLOR && $ColorCode != "") echo(">".$ColorCode.$selected."</option>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CA || $ColorCode == COLOR_CA1 || $ColorCode == COLOR_CA2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".A_ADMIN.")</option>" : ">".$ColorCode."</option>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CM || $ColorCode == COLOR_CM1 || $ColorCode == COLOR_CM2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".A_MODER.")</option>" : ">".$ColorCode."</option>");
				elseif ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
		?>
		</select>
	</td>
</tr>
<tr>
	<td><b><?php echo A_CONFCONTENT_409; ?></b>
	</td>
	<td>
		<input name="vQUOTE_AVATAR" type="text" size="20" maxlength="255" value="<?php echo $QUOTE_AVATAR; ?>">
    <?php echo(($QUOTE_AVATAR != "") ? "&nbsp;<img id=\"quote_avatarToSwap\" src=\"".$QUOTE_AVATAR."\" border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"".A_CONFCONTENT_409."\" Title=\"".A_CONFCONTENT_409."\" />" : ""); ?>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_410; ?></b><br />
		<i><?php echo sprintf(A_CONFHINT, sprintf(A_CONFCONTENT_412, "files/quotes")); ?></i>
	</td>
	<td>
		<?php
		$quotes='files/quotes/';
		$quotefiles = opendir($quotes); #open directory
		echo ("<select name=\"vQUOTE_PATH\">");
			$i = 0;
			while (false !== ($quotefile = readdir($quotefiles)))
			{
# 				if (!eregi("\.html",$quotefile) && $quotefile!=='.' && $quotefile!=='..')
				if (stripos($quotefile,".html") === false && !preg_match("/^[\.]/", $quotefile))
				{
					$quotesfile[]=$quotefile;
			 		$i++;
				}
			}
			closedir($quotefiles);
			if ($quotesfile)
			{
			  	natsort($quotesfile);
			}
			$j = 1;
			foreach ($quotesfile as $quotename)
			{
				echo("<option value=\"".$quotes.$quotename."\"");
				if($QUOTE_PATH == $quotes.$quotename) echo(" selected");
				echo(">".$quotename."</option>");
			$j++;
			}
		unset($quotesfile);
		?>
		</select>
	</td>
</tr>
<tr>
	<td><b><?php echo A_CONFCONTENT_411; ?></b>
	</td>
	<td>
		<input name="vQUOTE_TIME" type="text" size="7" maxlength="2" value="<?php echo $QUOTE_TIME; ?>">&nbsp;(<?php echo $QUOTE_TIME == 1 ? L_MIN : L_MINS; ?>)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
	<td><b><?php echo A_CONFCONTENT_413; ?></b>
	</td>
	<td>
		<?php
# 		if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vQUOTE_COLOR\" style=\"background-color:".$QUOTE_COLOR.";\">\n");
		if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<select name=\"vQUOTE_COLOR\" style=\"background-color:".$QUOTE_COLOR.";\">\n");
		else echo("<select name=\"vQUOTE_COLOR\">");
			$CQP = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CQP))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<option style=\"background-color:".$ColorCode."; color:black\" value=\"".$ColorCode."\"");
				if($QUOTE_COLOR == $ColorCode) echo(" selected");
				if ($ColorCode == $QUOTE_COLOR && $ColorCode != "") echo(">".$ColorCode.$selected."</option>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CA || $ColorCode == COLOR_CA1 || $ColorCode == COLOR_CA2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".A_ADMIN.")</option>" : ">".$ColorCode."</option>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CM || $ColorCode == COLOR_CM1 || $ColorCode == COLOR_CM2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".A_MODER.")</option>" : ">".$ColorCode."</option>");
				elseif ($ColorCode != "") echo(">".$ColorCode."</option>");
				else echo(">".$not_selected."</option>");
			}
		?>
		</select>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="ghost"></a><b><?php echo A_CONF_24; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_414; ?></b><br />
		<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_415); ?></font></i>
	</td>
    <td>
        <select name="vHIDE_ADMINS">
	        <option value="0"<?php if($HIDE_ADMINS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_417; ?></option>
	        <option value="1"<?php if($HIDE_ADMINS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_418; ?></option>
        </select><br /><br />
        <select name="vHIDE_MODERS">
	        <option value="0"<?php if($HIDE_MODERS==0){ echo " selected"; } ?>><?php echo A_CONFCONTENT_419; ?></option>
	        <option value="1"<?php if($HIDE_MODERS==1){ echo " selected"; } ?>><?php echo A_CONFCONTENT_420; ?></option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td colspan=2>
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_416); ?></i>
	</td>
</tr>
<tr>
	<td><b><?php echo A_CONFCONTENT_421; ?></b><br />
		<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_422); ?></font></i>
	</td>
	<td>
		<input name="vSPECIAL_GHOSTS" type="text" size="25" maxlength="255" value="<?php echo $SPECIAL_GHOSTS; ?>">
	</td>
</tr>
<tr>
	<td colspan=2>
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_423); ?></i>
	</td>
</tr>
<!--
<tr bgcolor="#B0C4DE">
	<td><b><?php echo A_CONFCONTENT_421a; ?></b><br />
		<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_422); ?></font></i>
	<td>
		<input name="vPUNNISHED_GHOSTS" type="text" size="25" maxlength="255" value="<?php echo $PUNNISHED_GHOSTS; ?>">
	</td>
</tr>
<tr>
	<td colspan=2>
		<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_423a); ?></i>
	</td>
</tr>
-->
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="bday"></a><b><?php echo A_CONF_25; ?></b></td></tr>
	<tr class="thumbIndex">
		<td valign=center align=center height="20" class=tabtitle><?php echo A_CONFTITLE_1; ?></td>
		<td valign=center align=center width="25%" height="20" class=tabtitle><?php echo A_CONFTITLE_2; ?></td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_424; ?></b>
	</td>
    <td>
        <select name="vREQUIRE_BDAY">
	        <option value="0"<?php if($REQUIRE_BDAY==0){ echo " selected"; } ?>><?php echo A_CONFOPTIONAL; ?></option>
	        <option value="1"<?php if($REQUIRE_BDAY==1){ echo " selected"; } ?>><?php echo A_CONFREQUIRED; ?></option>
        </select>
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_425; ?></b><br />
    	<i><font color=red><?php echo sprintf(A_CONFIMPORTANT, A_CONFCONTENT_426); ?></font></i>
	</td>
    <td>
		<select name="vSEND_BDAY_EMAIL">
	        <option value="0"<?php if($SEND_BDAY_EMAIL==0){ echo " selected"; } ?>><?php echo A_CONFNOTSEND; ?></option>
	        <option value="1"<?php if($SEND_BDAY_EMAIL==1){ echo " selected"; } ?>><?php echo A_CONFSEND; ?></option>
        </select>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_427; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_428); ?><br />
		<?php echo A_CONFCONTENT_429; ?></i>
	</td>
    <td>
			<input name="vSEND_BDAY_TIME" type="text" size="7" maxlength="2" value="<?php echo $SEND_BDAY_TIME; ?>">&nbsp;(<?php echo $SEND_BDAY_TIME == 1 ? L_MIN : L_MINS; ?>)
    </td>
</tr>
<tr>
    <td><b><?php echo A_CONFCONTENT_430; ?></b><br />
    	<i><?php echo sprintf(A_CONFHINT, A_CONFCONTENT_431); ?></i>
	</td>
    <td>
			<input name="vSEND_BDAY_INTVAL" type="text" size="7" maxlength="2" value="<?php echo $SEND_BDAY_INTVAL; ?>">&nbsp;(<?php echo $SEND_BDAY_INTVAL == 1 ? L_DAY : L_DAYS; ?>)
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b><?php echo A_CONFCONTENT_432; ?></b><br />
		<i><?php echo sprintf(A_CONFHINT, sprintf(A_CONFCONTENT_412, "files/birthday")); ?></i>
		</td>
	<td>
		<?php
		$bdays='files/birthday/';
		$bdayfiles = opendir($bdays); #open directory
		echo ("<select name=\"vSEND_BDAY_PATH\">");
			$i = 0;
			while (false !== ($bdayfile = readdir($bdayfiles)))
			{
# 				if (!eregi("\.html",$bdayfile) && $bdayfile!=='.' && $bdayfile!=='..')
				if (stripos($bdayfile,".html") === false && !preg_match("/^[\.]/", $bdayfile))
				{
					$bdaysfile[]=$bdayfile;
			 		$i++;
				}
			}
			closedir($bdayfiles);
			if ($bdaysfile)
			{
			  	natsort($bdaysfile);
			}
			$j = 1;
			foreach ($bdaysfile as $bdayname)
			{
				echo("<option value=\"".$bdays.$bdayname."\"");
				if($SEND_BDAY_PATH == $bdays.$bdayname) echo(" selected");
				echo(">".$bdayname."</option>");
			$j++;
			}
		unset($bdaysfile);
		?>
		</select>
	</td>
</tr>
</table>
<br />
<tr>
	<td><input type="hidden" name="action" id="action" value="submit"></td>
	<td><a name="save_settings"></a><input type="submit" name="submit_type" class="error" value="<?php echo A_CONFSAVE; ?>"></td>
<?php
if (C_LAST_SAVED_ON || C_LAST_SAVED_BY)
{
	?>
	<div><p><table align=center border=0 cellpadding=0 class=menu style=background:white><tr><td class=success align=right><?php echo sprintf(A_CONF_ERR_5, (C_LAST_SAVED_ON ? " <span class=error>".$Last_Saved_On."</span>" : ""), (C_LAST_SAVED_BY ? "<span class=error>".C_LAST_SAVED_BY."</span>" : "")); ?></td></tr></table></div>
	<?php
}
	?>
</form>
</div>
<?php
}
?>
