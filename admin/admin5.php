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
margin: 0;
padding: 0;
font: 80% verdana, arial, sans-serif;
}
dl, dt, dd, ul, li {
margin: 0;
padding: 0;
list-style-type: none;
z-index: 100;
}
#menu {
position: absolute; /* Menu position that can be changed at will */
top: 0;
left: 0;
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
background: #aaa;
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
border: 0 none;
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
	if (version_compare(PHPVERSION,'5','>=') && ini_get("allow_url_fopen") && function_exists('file_get_contents')) $cache_supported = 1;
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
	settype($app_version = APP_VERSION, "double");
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
					if (!eregi('\.html',$skinfile) && !eregi('\.css',$skinfile) && !is_dir($skinfile) && $skinfile!=='.' && $skinfile!=='..')
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
			settype($app_last_version = APP_LAST_VERSION, "double");
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
			settype($app_last_version = APP_LAST_VERSION, "double");
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
		settype($app_last_version = APP_VERSION, "double");
		$upd_possible = 0;
	}
}
?>
<div id="menu">
	<dl>
		<dt onmouseover="javascript:show('smenu1');">General settings</dt>
			<dd id="smenu1" onmouseover="javascript:show('smenu1');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#server">Chat Server data</a></li>
					<li><a href="#languages">Languages</a></li>
					<li><a href="#owner">Owner data</a></li>
					<li><a href="#registration">Registration</a></li>
					<li><a href="#functionality">Functionality</a></li>
					<li><a href="#timings">Timings</a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu2');">Interface</dt>
			<dd id="smenu2" onmouseover="javascript:show('smenu2');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#layout">Login layout</a></li>
					<li><a href="#skins">Rooms & Skins</a></li>
					<li><a href="#colors">Colors</a></li>
					<li><a href="#sounds">Sound settings</a></li>
					<li><a href="#profanity">Profanity</a></li>
					<li><a href="files_popup.php?<?php echo("L=$L&pmc_username=$pmc_username&pmc_password=$pmc_password"); ?>" onClick="files_popup(); return false" target="_blank">Uploads Management</A></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu3');">Features & Mods</dt>
			<dd id="smenu3" onmouseover="javascript:show('smenu3');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#pm">Private messaging</a></li>
					<li><a href="#bot">Bot settings</a></li>
					<li><a href="#commands">Commands</a></li>
					<li><a href="#mmedia">Multimedia</a></li>
					<li><a href="#quick">Quick Menus</a></li>
					<li><a href="#avatars">Avatars & Gravatars</a></li>
					<li><a href="#logging">Logging Mod</a></li>
					<li><a href="#lurking">Lurking Mod</a></li>
					<li><a href="#quote">Random Quote</a></li>
					<li><a href="#ghost">Ghost Control</a></li>
					<li><a href="#bday">Birthday Mod</a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu4');">Help & Support</dt>
			<dd id="smenu4" onmouseover="javascript:show('smenu4');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="http://sourceforge.net/projects/phpmychat/files/phpMyChat_Plus/" target=_blank Title="Open <?php echo(APP_NAME); ?> Download page" onMouseOver="window.status='Open <?php echo(APP_NAME); ?> Download page.'; return true">Download page</a></li>
					<li><a href="http://www.ciprianmp.com/atm/index.php?directory=programming/phpMyChat/Ciprian_releases/Plus_version" target=_blank Title="Open <?php echo(APP_NAME); ?> Mirror Download page" onMouseOver="window.status='Open <?php echo(APP_NAME); ?> Mirror Download page.'; return true">Mirror page</a></li>
					<li><a href="http://sourceforge.net/projects/phpmychat/" target=_blank Title="Open <?php echo(APP_NAME); ?> Project page" onMouseOver="window.status='Open <?php echo(APP_NAME); ?> Project page.'; return true">Project page</a></li>
					<li><a href="http://svn.sourceforge.net/viewvc/phpmychat/trunk/" target=_blank Title="Open <?php echo(APP_NAME); ?> SVN Project page" onMouseOver="window.status='Open <?php echo(APP_NAME); ?> SVN Project page.'; return true">Project SVN page</a></li>
					<li><a href="http://tech.groups.yahoo.com/group/phpmychat/" target=_blank Title="Open <?php echo(APP_NAME); ?> Yahoo Support Group page" onMouseOver="window.status='Open <?php echo(APP_NAME); ?> Yahoo Support Group page.'; return true">Support Group page</a></li>
					<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Fixes readme.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo(APP_VERSION); ?>" target=_blank Title="Open <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> Release notes" onMouseOver="window.status='Open <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> Release notes.'; return true">Read <?php echo(APP_VERSION.APP_MINOR); ?> notes</a></li>
 <?php
 if(UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && ((APP_LAST_MINOR == "" && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR))) || (ereg("f",APP_LAST_MINOR) && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR) || APP_MINOR == "")) || (ereg("RC",APP_LAST_MINOR) && ereg("ß",APP_MINOR)) || (ereg("ß",APP_LAST_MINOR) && ereg("ß",APP_MINOR) && str_replace("-ß","",APP_LAST_MINOR) > str_replace("-ß","",APP_MINOR)) || (ereg("f",APP_LAST_MINOR) && ereg("f",APP_MINOR) && str_replace("-f","",APP_LAST_MINOR) > str_replace("-f","",APP_MINOR)) || (ereg("RC",APP_LAST_MINOR) && ereg("RC",APP_MINOR) && str_replace("-RC","",APP_LAST_MINOR) > str_replace("-RC","",APP_MINOR))))))
 {
 	if (ereg("f",APP_LAST_MINOR) || ereg("ß",APP_LAST_MINOR) || ereg("RC",APP_LAST_MINOR)) $minor_dir = "/Fixes/";
 	else $minor_dir = "/";
 	?>
 						<li><a href="http://www.ciprianmp.com/atm/index.php?directory=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo(APP_LAST_VERSION.$minor_dir); ?>" target=_blank Title="Download the <?php echo(APP_NAME." - ".APP_LAST_VERSION.APP_LAST_MINOR); ?> Update" onMouseOver="window.status='Download <?php echo(APP_NAME." - ".APP_LAST_VERSION.APP_LAST_MINOR); ?> Update.'; return true">Download <?php echo(APP_LAST_VERSION.APP_LAST_MINOR); ?></a></li>
 <?php
 }
 	?>
					<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Plus FAQ.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version" target=_blank Title="Open <?php echo(APP_NAME); ?> Online FAQ" onMouseOver="window.status='Open <?php echo(APP_NAME); ?> Online FAQ'; return true">FAQ Online</a></li>
					<li><a href="http://www.ciprianmp.com/latest/" target=_blank Title="Go to <?php echo(APP_NAME); ?> Try me server" onMouseOver="window.status='Go to <?php echo(APP_NAME); ?> Try me server.'; return true">Try me server</a></li>
					<li><a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Submit your feedback</a></li>
					<li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=ciprianmp%40hotmail%2ecom&item_name=Support%20for%20phpMyChat%20Plus%20development&no_shipping=1&cn=Optional%20Thoughts&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8" onClick="return confirm('<?php echo(L_SUPP_WARN); ?>');" onMouseOver="window.status='Wish to keep <?php echo(APP_NAME); ?> FREE?'; return true;" title="Wish to keep <?php echo(APP_NAME); ?> FREE?" target="_blank">Wish to donate?</a></li>
					<li><a onClick="javascript:alert('<?php echo (sprintf(trim(A_SHEET5_0),":\\n".APP_NAME." - ".APP_VERSION.APP_MINOR)); ?>\n\nReleased on:\n<?php echo(RELEASE_DATE); ?>.\n\n&copy; 2001-<?php echo(date('Y')); ?>\nPlus Developer: <?php echo(PLUS_DEVELOPER); ?>\n\nBig thanks to all the contributors\nto the phpHeaven Team work\nand the Yahoo phpMyChat group.\n\nThank you for using our work!')" Title="What is this?" onMouseOver="window.status='What is this?'; return true">About Plus</a></li>
				</ul>
			</dd>
	</dl>
	<dl class="nav">
		<dt onmouseover="javascript:show();"><a href="#home" title="Scroll home">Home</a></dt>
	</dl>
	<dl class="nav">
		<dt onmouseover="javascript:show();"><a class="save" href="#save_settings" title="Jump to save button">Save</a></dt>
	</dl>
</div>
<div id="container">
<?php
	if (UPD_CHECK)
	{
		?>
<div><p><table align=center align=center border=0 cellpadding=0 class=menu style=background:white><tr><td class=success align=center><?php echo("<br />- ".sprintf(A_SHEET5_0, APP_NAME." - ".APP_VERSION.APP_MINOR)." -<br />"); ?>
<?php
		if (($app_last_version > $app_version) || (($app_last_version == $app_version) && ((APP_LAST_MINOR == "" && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR))) || (ereg("f",APP_LAST_MINOR) && (ereg("RC",APP_MINOR) || ereg("ß",APP_MINOR) || APP_MINOR == "")) || (ereg("RC",APP_LAST_MINOR) && ereg("ß",APP_MINOR)) || (ereg("ß",APP_LAST_MINOR) && ereg("ß",APP_MINOR) && str_replace("-ß","",APP_LAST_MINOR) > str_replace("-ß","",APP_MINOR)) || (ereg("f",APP_LAST_MINOR) && ereg("f",APP_MINOR) && str_replace("-f","",APP_LAST_MINOR) > str_replace("-f","",APP_MINOR)) || (ereg("RC",APP_LAST_MINOR) && ereg("RC",APP_MINOR) && str_replace("-RC","",APP_LAST_MINOR) > str_replace("-RC","",APP_MINOR)))))
		{
		?>
			<script type="text/javascript" language="javascript">
			<!--
		alert("<?php echo("- ".sprintf(A_SHEET5_0, APP_VERSION.APP_MINOR)." -") ?>\n<?php echo(sprintf(A_SHEET5_1, APP_LAST_VERSION.$alm)); ?>")
			// -->
			</script>
<?php
			echo("</td></tr><tr><td class=error align=center><h3>".sprintf(A_SHEET5_1,APP_LAST_VERSION.APP_LAST_MINOR)."<br />Download the ".APP_LAST_VERSION.APP_LAST_MINOR." update from <a href=\"http://www.ciprianmp.com/atm/index.php?directory=programming/phpMyChat/Ciprian_releases/Plus_version/".APP_LAST_VERSION.$minor_dir."\" target=_blank Title=\"Download the ".APP_LAST_VERSION.APP_LAST_MINOR." Update\" onMouseOver=\"window.status='Download the ".APP_LAST_VERSION.APP_LAST_MINOR." Update.'; return true\">here</a></h3>");
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
<input type="image" style="background-color: transparent;" src="<?php echo($donate); ?>" border="0" name="submit" alt="<?php echo($ppalt."\n".L_SUPP_ALT); ?>" title="<?php echo($ppalt."\n".L_SUPP_ALT); ?>" onMouseOver="window.status='<?php echo($ppalt); ?>'; return true;">
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
						"WMP_STREAM = '$vWMP_STREAM'".
				" WHERE ID='0'";

		$DbLink->query($query);

if(C_BOT_NAME != $vBOT_NAME || C_BOT_FONT_COLOR != $vBOT_FONT_COLOR || C_BOT_AVATAR != $vBOT_AVATAR)
{
	$query_botname1 = "UPDATE bot_bot SET ".
						"value = '$vBOT_NAME'".
				" WHERE name='name'";
	$query_botname2 = "UPDATE bot_bots SET ".
						"botname = '$vBOT_NAME'".
				" WHERE botname!='$vBOT_NAME'";
	$query_botname3 = "UPDATE ".C_REG_TBL." SET ".
						"username = '$vBOT_NAME', ".
						"colorname = '$vBOT_FONT_COLOR', ".
						"avatar = '$vBOT_AVATAR'".
				" WHERE email='bot@bot.com'";
	$query_botname4 = "UPDATE ".C_USR_TBL." SET ".
						"username = '$vBOT_NAME'".
				" WHERE email='bot@bot.com'";
	if (trim($vBOT_NAME) == "" && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = "You must type a username for your Bot";
	}
	else if (ereg("[\, \']", stripslashes($vBOT_NAME)) && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />Spaces, commas or backslashes (\\) not allowed.<br />Check the syntax of the Bot name (".$vBOT_NAME.")";
	}
	else if((C_NO_SWEAR && checkwords($vBOT_NAME, true, $Charset)) && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = "Banished word found in the Bot username (".$vBOT_NAME.")";
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$vBOT_NAME'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0 && C_BOT_NAME != $vBOT_NAME)
		{
			$Error = "The name of your Bot (".$vBOT_NAME.") is already registered.<br />Choose another one";
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
						"username = '$vQUOTE_NAME', ".
						"colorname = '$vQUOTE_FONT_COLOR', ".
						"avatar = '$vQUOTE_AVATAR'".
				" WHERE email='quote@quote.com'";
	if (trim($vQUOTE_NAME) == "" && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = "You must type a username for your Random Quote";
	}
	else if (ereg("[\, \']", stripslashes($vQUOTE_NAME)) && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />Spaces, commas or backslashes (\\) not allowed.<br />Check the syntax of the Random Quote name (".$vQUOTE_NAME.")";
	}
	else if((C_NO_SWEAR && checkwords($vQUOTE_NAME, true, $Charset)) && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = "Banished word found in the Random Quote username (".$vQUOTE_NAME.")";
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$vQUOTE_NAME'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0 && C_QUOTE_NAME != $vQUOTE_NAME)
		{
			$Error = "The name of your Random Quote (".$vQUOTE_NAME.") is already registered.<br />Choose another one";
		}
		else
		{
			$DbLink->query($query_quote1);
		}
	}
}

if (isset($Error))
{
	echo "<div><p><table align=center border=0 cellpadding=3 class=menu style=background:white><tr><td class=error align=center><br /><h3>".$Error."!</h3></td></tr></table></p></div>";
}
else
{
	echo "<div><p><table align=center border=0 cellpadding=3 class=menu style=background:white><tr><td class=success align=center><br /><h3>Configuration Settings Changed Successfully!</h3></td></tr></table></p>";
	if(C_LOG_DIR != $vLOG_DIR)
	{
		echo "<table align=center border=0 cellpadding=3 class=menu style=background:white><tr><td class=notify2 align=center valign=TOP>Important!</td><td class=success align=center>Don't forget to change remotely the name of <span style=background-color:white>".C_LOG_DIR."</span> directory to <span style=background-color:white>".$vLOG_DIR."</span><br />(and set its attributes to <b>777</b>)!</td></tr></table></p>";
	}
	echo "</div>";
}

	if(($USE_AVATARS !== $vUSE_AVATARS) || ($DISP_GENDER !== $vDISP_GENDER) || ($COLOR_NAMES !== $vCOLOR_NAMES) || ($PRIV_POPUP !== $vPRIV_POPUP) || ($USE_SKIN !== $vUSE_SKIN) || ($EN_WMPLAYER !== $vEN_WMPLAYER))
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES (1, 'Admin Panel', 'SYS announce', '', ".time().", ' *', 'L_RELOAD_CHAT', '', '')");
	}
}
else
{
?>
<a name="home"></a>
<br />
<p class=title><?php echo(APP_NAME); ?> Configuration Page</p>
<?php
if (C_LAST_SAVED_ON)
{
	settype($last_saved_on = mysql_to_ts(C_LAST_SAVED_ON), "integer");
	if (C_TMZ_OFFSET) settype($tmz_offset = C_TMZ_OFFSET, "integer");
	$Last_Saved_On = $last_saved_on + $tmz_offset*60*60;
	$Last_Saved_On = stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,$Charset,strftime(L_LONG_DATETIME,$Last_Saved_On)) : strftime(L_LONG_DATETIME,$Last_Saved_On);
}
if (C_LAST_SAVED_ON || C_LAST_SAVED_BY)
{
	?>
		<div><p><table align=center border=0 cellpadding=0 class=menu style=background:white><tr><td class=success align=right>The current settings were last saved <?php if (C_LAST_SAVED_ON) echo("on <span class=error>".$Last_Saved_On."</span> "); ?><?php if (C_LAST_SAVED_BY) echo("by <span class=error>".C_LAST_SAVED_BY."</span> "); ?>!</td></tr></table></div>
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
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="server"></a><b>Chat Server data</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable automatic checking for online updates on the servers.</b><br />
    	<i>Hint: The script can automatically check up for new releases on: ciprianmp.com/latest/ or svn.sourceforge.net!</i>
	</td>
    <td>
        <select name="vUPD_CHECK">
	        <option value="0"<?php if($UPD_CHECK==0 || !$upd_possible){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($UPD_CHECK==1 && $upd_possible){ echo " selected"; } ?>>Enabled</option>
        </select>
	</td>
</tr>
<tr>
    <td><b>Enable Statistics in chat.</b><br />
    	<i>Hint: If your server bandwidth is really limited or you notice overloading of your server, you shall disable this mod!</i>
	</td>
    <td>
        <select name="vEN_STATS">
	        <option value="0"<?php if($EN_STATS==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_STATS==1){ echo " selected"; } ?>>Enabled</option>
        </select>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Clean-up time for old messages.</b>
	</td>
    <td>
		<input name="vMSG_DEL" type="text" size="7" maxlength="3" value="<?php echo $MSG_DEL; ?>"> (hours)
	</td>
</tr>
<tr>
    <td><b>Autoboot time for inactive users in rooms.</b><br />
    	<i>Hint: This autoboot feature forces users to be active in rooms. If they want to be lurking, they should just use the lurking page. Admins, moderators and away users won't be booted</i>
	</td>
    <td>
        <select name="vCHAT_BOOT">
	        <option value="0"<?php if($CHAT_BOOT==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($CHAT_BOOT==1){ echo " selected"; } ?>>Enabled</option>
        </select><br />
    	<input name="vUSR_DEL" type="text" size="7" maxlength="2" value="<?php echo $USR_DEL; ?>"> (minutes)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Delete registered users accounts not active in this interval (0 for never).</b>
    </td>
    <td>
		<input name="vREG_DEL" type="text" size="7" maxlength="4" value="<?php echo $REG_DEL; ?>"> (days)
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="languages"></a><b>Languages</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default Language for Chatroom.</b>
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
				elseif ($name == "persian" && L_ORIG_LANG_FA != "L_ORIG_LANG_FA") $FLAG_NAME = L_ORIG_LANG_FA;
				elseif ($name == "romanian" && L_ORIG_LANG_RO != "L_ORIG_LANG_RO") $FLAG_NAME = L_ORIG_LANG_RO;
				elseif ($name == "russian" && L_ORIG_LANG_RU != "L_ORIG_LANG_RU") $FLAG_NAME = L_ORIG_LANG_RU;
				elseif ($name == "serbian_latin" && L_ORIG_LANG_SRL != "L_ORIG_LANG_SRL") $FLAG_NAME = L_ORIG_LANG_SRL;
				elseif ($name == "serbian_cyrillic" && L_ORIG_LANG_SRC != "L_ORIG_LANG_SRC") $FLAG_NAME = L_ORIG_LANG_SRC;
				elseif ($name == "slovak" && L_ORIG_LANG_SK != "L_ORIG_LANG_SK") $FLAG_NAME = L_ORIG_LANG_SK;
				elseif ($name == "spanish" && L_ORIG_LANG_ES != "L_ORIG_LANG_ES") $FLAG_NAME = L_ORIG_LANG_ES;
				elseif ($name == "swedish" && L_ORIG_LANG_SV != "L_ORIG_LANG_SV") $FLAG_NAME = L_ORIG_LANG_SV;
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
	    </select>&nbsp;<img style="vertical-align:middle" id="flagToSwap" src="<?php echo("./".$ChatPath."localization/".$namesel."/images/".($FLAGS_3D ? $flagsel_3d : $flagsel)); ?>" <?php echo("border=0 ALT=\"Language Flag selector\" Title=\"Language Flag selector\""); ?> />
    </td>
</tr>
<tr>
    <td><b>English format (for flags and date&time formats).</b>
	</td>
    <td><select name="vENGLISH_FORMAT" id="ENflag" onChange="swapImage('ENflag','ENToSwap'); swapImage('3Dflag','3DToSwap'); swapImage('flags','flagToSwap')">
	        <option value="UK"<?php if($ENGLISH_FORMAT=="UK"){ echo " selected"; $ENsel = ($FLAGS_3D) ? "flag.gif" : "flag0.gif"; } ?>><?php echo(L_ORIG_LANG_ENUK); ?></option>
	        <option value="US"<?php if($ENGLISH_FORMAT=="US"){ echo " selected"; $ENsel = ($FLAGS_3D) ? "flag_us.gif" : "flag_us0.gif"; } ?>><?php echo(L_ORIG_LANG_ENUS); ?></option>
        </select>&nbsp;<img style="vertical-align:middle" id="ENToSwap" src="<?php echo(($FLAGS_3D) ? "./".$ChatPath."localization/english/images/".$ENsel."" : "./".$ChatPath."localization/english/images/".$ENsel.""); ?>" <?php echo("border=0 ALT=\"English locale formats\" Title=\"English locale formats\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Allow users to choose a language from the available translations.</b>
	</td>
    <td>
        <select name="vMULTI_LANG">
	        <option value="0"<?php if($MULTI_LANG==0){ echo " selected"; } ?>>Default only</option>
	        <option value="1"<?php if($MULTI_LANG==1){ echo " selected"; } ?>>All available</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Flags images type.</b>
	</td>
    <td><select name="vFLAGS_3D" id="3Dflag" onChange="swapImage('3Dflag','3DToSwap'); swapImage('ENflag','ENToSwap'); swapImage('flags','flagToSwap')">
	        <option value="0"<?php if($FLAGS_3D==0){ echo " selected"; } ?>>2D (std)</option>
	        <option value="1"<?php if($FLAGS_3D==1){ echo " selected"; } ?>>3D (new)</option>
        </select>&nbsp;<img style="vertical-align:middle" id="3DToSwap" src="<?php echo(($FLAGS_3D) ? "./".$ChatPath."localization/english/images/flag.gif" : "./".$ChatPath."localization/english/images/flag0.gif"); ?>" <?php echo("border=0 ALT=\"Flags format\" Title=\"Flags format\""); ?> />
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="owner"></a><b>Owner data</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><a name="ownername"></a><b>Enter admin real name (or chat name) to be sent on email headers.</b>
	</td>
    <td>
		<input name="vADMIN_NAME" type="text" size="25" maxlength="35" value="<?php echo $ADMIN_NAME; ?>">
	</td>
</tr>
<tr>
    <td><a name="admin_email"></a><b>Enter admin email to be sent on email headers.</b><br />
    	<i>Hint: also to receive notifications on new user registration</i>
    </td>
    <td>
		<input name="vADMIN_EMAIL" type="text" size="25" maxlength="35" value="<?php echo $ADMIN_EMAIL; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter your chat URL to be sent on email headers.</b>
	</td>
    <td>
		<input name="vCHAT_URL" type="text" size="25" maxlength="100" value="<?php echo $CHAT_URL; ?>">
	</td>
</tr>
<tr>
    <td><b>Enter your Default Closing Greeting for your emails.</b><br />
    		<i>Hint: This is used only by admins in the Send emails sheet</i>
   	</td>
    <td>
		<textarea name="vMAIL_GREETING" rows=3 cols=28 wrap=on><?php echo $MAIL_GREETING; ?></textarea>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Public Name of your chat server as you wish to be known on the web.</b>
	</td>
    <td>
		<input name="vCHAT_NAME" type="text" size="25" maxlength="255" value="<?php echo $CHAT_NAME; ?>">
	</td>
</tr>
<tr>
    <td><b>Path to the LOGO image.</b><br />
    		<i>Hint: Logo image to display (absolute or relative paths allowed) - e.g. http://path_to_the_image.jpg or ./../path_to_the_image.jpg</i><br />
    		(path_to_the_image.jpg can be any image accessible on/from the web - .jpg, .gif, .bmp, .png)
    </td>
    <td>
		<select name="vSHOW_LOGO">
	        <option value="0"<?php if($SHOW_LOGO==0){ echo " selected"; } ?>>Hide Logo</option>
	        <option value="1"<?php if($SHOW_LOGO==1){ echo " selected"; } ?>>Show Logo</option>
        </select><br />
		<input name="vLOGO_IMG" type="text" size="25" maxlength="255" value="<?php echo $LOGO_IMG; ?>"><br />
		<img src="<?php echo($LOGO_IMG); ?>" border=0 width=180 <?php echo("ALT=\"".$LOGO_ALT."\" Title=\"".$LOGO_ALT."\""); ?> />
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>URL to be opened by LOGO (opens in new window).</b></td>
    <td>
		<input name="vLOGO_OPEN" type="text" size="25" maxlength="255" value="<?php echo $LOGO_OPEN; ?>">
	</td>
</tr>
<tr>
    <td><b>Text to be displayed by LOGO on MouseOver (the ALT/TITLE property).</b>
	</td>
    <td>
		<input name="vLOGO_ALT" type="text" size="25" maxlength="255" value="<?php echo $LOGO_ALT; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="registration"></a><b>Registration</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Allow Registration for your chat.</b><br />
    	<font color=red>Disable this only if you want to add the registered users manually, or read the <a href=#reg_hint class="ChatLink">Hint</a> below to make it automatically but to wait for your approval.</font>
	</td>
    <td>
        <select name="vALLOW_REGISTER">
	        <option value="0"<?php if($ALLOW_REGISTER==0){ echo " selected"; } ?>>Registration disabled</option>
	        <option value="1"<?php if($ALLOW_REGISTER==1){ echo " selected"; } ?>>Registration enabled</option>
        </select><br />
		<font color=red> * - Registration enabled</font>
    </td>
</tr>
<tr>
    <td><b>Require Registration to join chat.</b>
	</td>
    <td>
        <select name="vREQUIRE_REGISTER">
	        <option value="0"<?php if($REQUIRE_REGISTER==0){ echo " selected"; } ?>>Optional</option>
	        <option value="1"<?php if($REQUIRE_REGISTER==1){ echo " selected"; } ?>>Required</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>First and Last names required on registration and profiles.</b>
	</td>
    <td>
        <select name="vREQUIRE_NAMES">
	        <option value="0"<?php if($REQUIRE_NAMES==0){ echo " selected"; } ?>>Optional</option>
	        <option value="1"<?php if($REQUIRE_NAMES==1){ echo " selected"; } ?>>Required</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Automatically generate Password (and email it to new registered users).</b>
	</td>
    <td>
        <select name="vEMAIL_PASWD">
	        <option value="0"<?php if($EMAIL_PASWD==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EMAIL_PASWD==1){ echo " selected"; } ?>>Enabled</option>
        </select>
		<font color=red> * - Enabled</font>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Length of the Password to be generated and sent by email.</b>
	</td>
    <td>
		<input name="vPASS_LENGTH" type="text" size="7" maxlength="2" value="<?php echo $PASS_LENGTH; ?>">
    </td>
</tr>
<tr>
    <td><b>Send account details to the new registered user.</b>
	</td>
    <td>
        <select name="vEMAIL_USER">
	        <option value="0"<?php if($EMAIL_USER==0){ echo " selected"; } ?>>Don't send</option>
	        <option value="1"<?php if($EMAIL_USER==1){ echo " selected"; } ?>>Send details</option>
        </select>
		<font color=red> * - Don't send</font>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Send account details (notifications) to admin on new user registration.</b>
	</td>
    <td>
        <select name="vADMIN_NOTIFY">
	        <option value="0"<?php if($ADMIN_NOTIFY==0){ echo " selected"; } ?>>Don't notify</option>
	        <option value="1"<?php if($ADMIN_NOTIFY==1){ echo " selected"; } ?>>Notify admin</option>
        </select>
		<font color=red> * - Notify admin</font>
    </td>
</tr>
<tr>
    <td colspan="2"><a name="reg_hint"></a>
	<font color=red>* <b>Hint</b></font> <b>for the best settings if you want to control who registers and gets into your chat:</b><br />
			<i>- Allow Registration for your chat: <font color=green>Registration enabled</font><br />
			- Require Registration to join chat: if <font color=green>Required</font> is set, only the registered users will be able to login to chat<br />
			- Generate and email Password to new registered users: <font color=green>Enabled</font><br />
			- Send account details to the new registered user: <font color=green>Don't send</font><br />
			- Send account details (notifications) to admin on new user registration: <font color=green>Notify admin</font><br />
			As a result, the user will choose his desired data, a random password will be generated, but the user will not receive the email with the password, so he still cannot login; he will only get a notifying email about the pending registration.<br />
			In the same time, the admin will receive <u>2 emails</u>:
			<li>1st - is a copy of the registration data, for admin's future reference (like when the user forgets the password). This is email is always sent in English;</li>
			<li>2nd - is the email which contains the generated password and rest of the data for the new created account (this email is already prepared to be sent/forwarded to the user, if the account is approved). This email it will be written in the language the user chosen on registration.</li><br />
			The admin verifies who is the person, what data did the user provide. If he decides to approve that user account, admin will just have to forward the second email to that user's email (the email is already formatted for approval). Another way is to go to "<?php echo(A_MENU_4); ?>" and send an email with the login data to that user's email. Optionally, the admin can even login with that name/password in the "Edit profile" form and adjust/change the data/password<br />
			<font color=red>Important: Don't forget to put your right admin email <a href=#admin_email class="ChatLink">here</a>, in order to have all these to work). Also keep into account that these settings will turn your chat server into a non-public one (restrictive, private). If you fail to verify and approve the account in time, your neglected user might just give up on coming back.</font></i>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="functionality"></a><b>Functionality</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable banishment feature and define the delay for it.</b><br />
		<i>Hint: 0 = disabled, any integer = day(s) for banishment</i>
	</td>
    <td>
    	<input name="vBANISH" type="text" size="7" maxlength="3" value="<?php echo $BANISH; ?>"> (days)
    </td>
</tr>
<tr>
    <td><b>Banishment type.</b><br />
    	<i>Hint: ban by IP and username simultaneously or only by IP.
		<li>- First option will only ban the username from a shared IP, useful when the banned user comes from a shared IP or for parental control purposes (e.g. when a shared computer/access point is used by a child);
		<li>- The second option will ban all the usernames trying to login from the same IP (more effective).</i>
    </td>
    <td>
        <select name="vBAN_IP">
	        <option value="0"<?php if($BAN_IP==0){ echo " selected"; } ?>>By IP and Username</option>
	        <option value="1"<?php if($BAN_IP==1){ echo " selected"; } ?>>Only by IP</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Use graphical smilies in messages.</b>
	</td>
    <td>
        <select name="vUSE_SMILIES">
	        <option value="0"<?php if($USE_SMILIES==0){ echo " selected"; } ?>>No smilies</option>
	        <option value="1"<?php if($USE_SMILIES==1){ echo " selected"; } ?>>Show smilies</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Keep HTML tags in messages.</b><br />
    <i>Hint: <b>simple</b>: keep bold, italic and underline tags; <b>none</b>: keep none</i>
	</td>
    <td>
        <select name="vHTML_TAGS_KEEP">
	        <option value="0"<?php if($HTML_TAGS_KEEP=='simple'){ echo " selected"; } ?>>Simple</option>
	        <option value="1"<?php if($HTML_TAGS_KEEP=='none'){ echo " selected"; } ?>>None</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show discarded HTML tags.</b>
	</td>
    <td>
        <select name="vHTML_TAGS_SHOW">
	        <option value="0"<?php if($HTML_TAGS_SHOW==0){ echo " selected"; } ?>>Remove discarded tags</option>
	        <option value="1"<?php if($HTML_TAGS_SHOW==1){ echo " selected"; } ?>>Show discarded tags</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable posted links protection by opening links in a popup window.</b><br />
			<i>Hint: if enabled, an extra window will be opened with a list of all the links posted in a message by an user. This option can assure extra protection to your chat rooms.</i>
	</td>
    <td>
        <select name="vPOPUP_LINKS">
	        <option value="0"<?php if($POPUP_LINKS==0){ echo " selected"; } ?>>Open links directly from chat</option>
	        <option value="1"<?php if($POPUP_LINKS==1){ echo " selected"; } ?>>Open links in a popup first</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default messages scroll order.</b><br />
    	<font color=red>(only for "non-H" browsers - other than IE or Firefox)</font><br />
    	<i>Hint: those users can also use /order command to change this behavior.</i>
    </td>
    <td>
        <select name="vMSG_ORDER">
	        <option value="0"<?php if($MSG_ORDER==0){ echo " selected"; } ?>>Last on Top</option>
	        <option value="1"<?php if($MSG_ORDER==1){ echo " selected"; } ?>>Last on Bottom</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Default number of messages to display on first entrance.</b><br />
    	<font color=red>Important: never set this to <b>"0"</b>; You can set it to minimum <b>"1"</b> but then you have to enable at least one of the <b>next two settings</b>.<br />
    	If you want to keep both set to "Notify" and "Show", the value here <b>must be at least "2"</b>.</font><br />
    	<i>Hint: users can also use /show "n" or /last "n" commands to view a different amount.</i>
    </td>
    <td>
		<input name="vMSG_NB" type="text" size="7" maxlength="2" value="<?php echo $MSG_NB; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show notifications on every user entrance/exit in Chat rooms.</b>
	</td>
    <td>
        <select name="vNOTIFY">
	        <option value="0"<?php if($NOTIFY==0){ echo " selected"; } ?>>No notification</option>
	        <option value="1"<?php if($NOTIFY==1){ echo " selected"; } ?>>Notify room</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Display a Welcome Message when user enters chatroom.</b>
	</td>
    <td>
        <select name="vWELCOME">
	        <option value="0"<?php if($WELCOME==0){ echo " selected"; } ?>>No welcome message</option>
	        <option value="1"<?php if($WELCOME==1){ echo " selected"; } ?>>Show welcome message</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Number of smilies on a row in tutorial/help.</b>
	</td>
    <td>
		<input name="vSMILEY_COLS" type="text" size="7" maxlength="2" value="<?php echo $SMILEY_COLS; ?>">
	</td>
</tr>
<tr>
    <td><b>Number of smilies on a row in smilie_popup.</b>
	</td>
    <td>
		<input name="vSMILEY_COLS_POP" type="text" size="7" maxlength="2" value="<?php echo $SMILEY_COLS_POP; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the Chat Etiquette on top of the Help popup (Chat rules).</b>
	</td>
    <td>
        <select name="vSHOW_ETIQ_IN_HELP">
	        <option value="0"<?php if($SHOW_ETIQ_IN_HELP==0){ echo " selected"; } ?>>Hide Etiquette</option>
	        <option value="1"<?php if($SHOW_ETIQ_IN_HELP==1){ echo " selected"; } ?>>Show Etiquette</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Exit link type.</b><br />
    	<i>Hint: Link stands for the original Exit link, Door rolling stands for the image of such a door.</i>
    </td>
    <td>
        <select name="vEXIT_LINK_TYPE" id="door" onChange="swapImage('door','doorToSwap')">
	        <option value="0"<?php if($EXIT_LINK_TYPE==0){ echo " selected"; } ?>>Exit link</option>
	        <option value="1"<?php if($EXIT_LINK_TYPE==1){ echo " selected"; } ?>>Door rolling</option>
        </select>&nbsp;<img id="doorToSwap" src="<?php echo(($EXIT_LINK_TYPE==1) ? "./".$ChatPath."localization/".$L."/images/exitdoor.gif" : "./".$ChatPath."images/gender_none.gif"); ?>" border=0 <?php echo("ALT=\"Exit link type\" Title=\"Exit link type\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the characters you wish your users to be allowed to use on registration/login.</b><br />
    	<i>Hint: This is the default set of chars: </i><b>a-zA-Z0-9_.-@#$%^&*()=<>?~{}|`:</b><i> tested for login, which will not break the layout/functionality of your chat.<br />
    	<font color=red>Important: Do not allow these characters, as they will break your chat page after login: exclamation mark, slash, backslash, comma, space, single and double quotes and square (box) brackets (<b>! / \ , ' " [ ]</b>)</font><br /></i>
    	Although they will not break anything, it seems that / and ; cannot be banned from being used in login names. $ sign hasn't been deeply tested, but it should be also avoided as it usually stands for php variables.
    </td>
    <td>
		<input name="vREG_CHARS_ALLOWED" type="text" size="25" maxlength="50" value="<?php echo $REG_CHARS_ALLOWED; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="timings"></a><b>Timings</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Timezone offset and World time in Status bar.</b><br />
    	- the difference between the server time and the desired location for the Chat (hours - integer)<br />
    	<i>Example: If my server is hosted in USA - CST (-6) but the chat is for a Romanian community located in Bucharest - EET (+2), I might wish to show my Romanian users the correct time in the chat. For this, I have to set this value to 8. Negative values are also allowed.<br />
    	<font color=red>Important: Edit "lib/worldtime.lib.php" to add your own cities (meridians) - only for World time mode!</font></i>
    </td>
    <td>
		<input name="vTMZ_OFFSET" type="text" size="7" maxlength="5" value="<?php echo $TMZ_OFFSET; ?>"><br />
        <select name="vWORLDTIME">
	        <option value="0"<?php if($WORLDTIME==0){ echo " selected"; } ?>>Server time only (standard)</option>
	        <option value="1"<?php if($WORLDTIME==1){ echo " selected"; } ?>>World time in Chat only (new)</option>
	        <option value="2"<?php if($WORLDTIME==2){ echo " selected"; } ?>>World time on Index & Chat</option>
        </select>
	</td>
</tr>
<tr>
    <td><b>Show Timestamp in front of the message.</b><br />
    	(also shows the Server Time in the Status bar)
    </td>
    <td>
        <select name="vSHOW_TIMESTAMP">
	        <option value="0"<?php if($SHOW_TIMESTAMP==0){ echo " selected"; } ?>>No timestamps in chat</option>
	        <option value="1"<?php if($SHOW_TIMESTAMP==1){ echo " selected"; } ?>>Show timestamps in chat</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default timeout between each update.</b>
	</td>
    <td>
		<input name="vMSG_REFRESH" type="text" size="7" maxlength="2" value="<?php echo $MSG_REFRESH; ?>"> (seconds)
	</td>
</tr>
<tr>
    <td><b>Returning visitors counter.</b><br />
    	(It will count how many times a registered user returned to chat, displaying the counter on his profile page - whois popup)
    </td>
    <td>
        <select name="vLOGIN_COUNTER">
	        <option value="0"<?php if($LOGIN_COUNTER==0){ echo " selected"; } ?>>No counter on Profiles</option>
	        <option value="1"<?php if($LOGIN_COUNTER==1){ echo " selected"; } ?>>Count on Every login</option>
	        <option value="60"<?php if($LOGIN_COUNTER==60){ echo " selected"; } ?>>One count per Hour</option>
	        <option value="1440"<?php if($LOGIN_COUNTER==1440){ echo " selected"; } ?>>One count per Day</option>
	        <option value="10080"<?php if($LOGIN_COUNTER==10080){ echo " selected"; } ?>>One count per Week</option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="layout"></a><b>Login layout</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Fill in the background of the login page.</b>
	</td>
    <td>
        <select name="vFILLED_LOGIN">
	        <option value="0"<?php if($FILLED_LOGIN==0){ echo " selected"; } ?>>Background unfilled</option>
	        <option value="1"<?php if($FILLED_LOGIN==1){ echo " selected"; } ?>>Background filled</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Display a BACKGROUND image on index page.</b><br />
		<i>Hint: to fill the rooms background with an image, you need to edit the desired style and add in BODY.frame and .framePreview the property "<b>background-image: url('path_to_the_image');</b>" (absolute or relative paths allowed) - e.g. http://path_to_the_image.jpg or ./../path_to_the_image.jpg - sample in style12.css.php. Optionally, BODY.mainframe can be used to display an image background to the messages frame (but this image has to be washed out, to make the posted text viewable).</i><br />
    	(path_to_the_image.jpg can be any image accessible on/from the web - .jpg, .gif, .bmp, .png)
	</td>
    <td>
        <select name="vBACKGR_IMG">
	        <option value="0"<?php if($BACKGR_IMG==0){ echo " selected"; } ?>>No background image</option>
	        <option value="1"<?php if($BACKGR_IMG==1){ echo " selected"; } ?>>Show on Login page</option>
        </select><br />
		Image path:<br />
		<input name="vBACKGR_IMG_PATH" type="text" size="25" maxlength="255" value="<?php echo $BACKGR_IMG_PATH; ?>">
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show Delete link on index.</b><br />
    	(to allow users delete their own profile)
	</td>
    <td>
        <select name="vSHOW_DEL_PROF">
	        <option value="0"<?php if($SHOW_DEL_PROF==0){ echo " selected"; } ?>>Hide Delete link</option>
	        <option value="1"<?php if($SHOW_DEL_PROF==1){ echo " selected"; } ?>>Show Delete link</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Show Administration link on index.</b><br />
    	(a link to open this Administration Panel)
    </td>
    <td>
        <select name="vSHOW_ADMIN">
	        <option value="0"<?php if($SHOW_ADMIN==0){ echo " selected"; } ?>>Hide Admin link</option>
	        <option value="1"<?php if($SHOW_ADMIN==1){ echo " selected"; } ?>>Show Admin link</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the Tutorial link on index page.</b>
	</td>
    <td>
        <select name="vSHOW_TUT">
	        <option value="0"<?php if($SHOW_TUT==0){ echo " selected"; } ?>>Hide tutorial</option>
	        <option value="1"<?php if($SHOW_TUT==1){ echo " selected"; } ?>>Show tutorial</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable Info on index page.</b><br />
    	(contains some info about the chat extra-features)
    </td>
    <td>
        <select name="vSHOW_INFO">
	        <option value="0"<?php if($SHOW_INFO==0){ echo " selected"; } ?>>Hide Info</option>
	        <option value="1"<?php if($SHOW_INFO==1){ echo " selected"; } ?>>Show Info</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display Extra commands available.</b>
	</td>
    <td>
        <select name="vSET_CMDS">
	        <option value="0"<?php if($SET_CMDS==0){ echo " selected"; } ?>>Hide Extra commands</option>
	        <option value="1"<?php if($SET_CMDS==1){ echo " selected"; } ?>>Show Extra commands</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>List your extra commands.</b><br />
    	<i>Hint: keep the first break and use it anytime to split the lines if they are too long</i>
    </td>
    <td>
		<input name="vCMDS" type="text" size="25" maxlength="255" value="<?php echo $CMDS; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display Other Extra features/mods available.</b>
	</td>
    <td>
        <select name="vSET_MODS">
	        <option value="0"<?php if($SET_MODS==0){ echo " selected"; } ?>>Hide Extra features</option>
	        <option value="1"<?php if($SET_MODS==1){ echo " selected"; } ?>>Show Extra features</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>List your extra features/mods.</b><br />
    	<i>Hint: keep the first break and use it anytime to split the lines if too long</i>
    </td>
    <td>
		<input name="vMODS" type="text" size="25" maxlength="255" value="<?php echo $MODS; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the name of your bot (if available).</b>
	</td>
    <td>
        <select name="vSET_BOT">
	        <option value="0"<?php if($SET_BOT==0){ echo " selected"; } ?>>Hide bot name</option>
	        <option value="1"<?php if($SET_BOT==1){ echo " selected"; } ?>>Show bot name</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Show counter (visitor hits) on index page.</b>
	</td>
    <td>
        <select name="vSHOW_COUNTER">
	        <option value="0"<?php if($SHOW_COUNTER==0){ echo " selected"; } ?>>Disable counter</option>
	        <option value="1"<?php if($SHOW_COUNTER==1){ echo " selected"; } ?>>Show counter</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show owner/webmaster of the chat info on index page (below the copyright link).</b><br />
    	<i>Hint: It is the same name/text you entered in the registration section - <a href=#ownername class="ChatLink">Admin name</a></i>
    </td>
    <td>
        <select name="vSHOW_OWNER">
	        <option value="0"<?php if($SHOW_OWNER==0){ echo " selected"; } ?>>Hide Owner</option>
	        <option value="1"<?php if($SHOW_OWNER==1){ echo " selected"; } ?>>Show Owner</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Edit the installation date of your chat.</b>
    </td>
    <td class=success>
		<?php
		  $myCalendar = new tc_calendar("date1", true, false);
		  $myCalendar->zindex = 150; //default 1
		  $myCalendar->setPicture("./plugins/calendar/images/iconCalendar.gif");
		  $myCalendar->setPath("./plugins/calendar/");
		  if($INSTALL_DATE && $INSTALL_DATE != "")
		  {
		    $installdate = strtotime($INSTALL_DATE);
			$myCalendar->setDate(date('d',$installdate), date('m',$installdate), date('Y',$installdate));
		  }
		  $myCalendar->setYearSelect(2000, date('Y'));
		  $myCalendar->dateAllow('2000-01-01', date('Y-m-d'));
		  $myCalendar->setDateFormat(str_replace("%","",str_replace("B","F",str_replace("d","j",L_CAL_FORMAT))));
		  $myCalendar->setAlignment('left', 'bottom'); //optional
		  $myCalendar->writeScript();
		?>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="skins"></a><b>Rooms & Skins</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Skin mod in rooms.</b><br />
    	<font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and re-login. An announcement to all the rooms will be automatically sent if you enable/disable this.</font><br />
		<i>Hint: If disabled, Skin1 becomes the default (set in the First Public Room above). If enabled, each room can be set to have it's own skin.</i>
	</td>
    <td>
        <select name="vUSE_SKIN">
	        <option value="0"<?php if($USE_SKIN==0){ echo " selected"; } ?>>Default Skin Only</option>
	        <option value="1"<?php if($USE_SKIN==1){ echo " selected"; } ?>>Skin Mod Enabled</option>
        </select><br />
	<A HREF="styles_popup.php?<?php echo("L=$L&startStyle=1"); ?>" onClick="styles_popup(); return false" class="ChatLink" TARGET="_blank">Skins Preview Page</A>
	</td>
</tr>
<tr>
    <td><b>Types of Rooms Available for users.</b><br />
        <li>0 : only the first room within the public default ones;</li>
        <li>1 : all default rooms, but not create a room;</li>
        <li>2 : all the rooms and create new ones</li>
    </td>
    <td>
        <select name="vVERSION">
	        <option value="0"<?php if($VERSION==0){ echo " selected"; } ?>>0 - Only the first room</option>
	        <option value="1"<?php if($VERSION==1){ echo " selected"; } ?>>1 - All default rooms</option>
	        <option value="2"<?php if($VERSION==2){ echo " selected"; } ?>>2 - Create new rooms</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><a name="roomnames"></a><b>1. First Public room name (also <u>default</u> if 0 is selected above or there is no user selection from list).</b><br />
    	<font color=red><i>Note: although disabling is possible, this first room should be enabled and unrestricted at all times. (this is also the default room for people not selecting one from login page.)</i></font><br />
		<i>Hint (for all the public rooms): If restricted, although the room is public, only admins, topmoderators and users set in the Registered Users sheet will be able to join this room. Also the lurking page and public archives will not contain any of the posts submitted to restricted rooms.</i>
	</td>
    <td>
		<input name="vROOM1" type="text" size="25" maxlength="25" value="<?php echo $ROOM1; ?>"><br />
        <select name="vEN_ROOM1">
	        <option value="0"<?php if($EN_ROOM1==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM1==1){ echo " selected"; } ?>>Enabled</option>
        </select>&nbsp;
        <select name="vRES_ROOM1">
	        <option value="0"<?php if($RES_ROOM1==0){ echo " selected"; } ?>>Unrestricted</option>
	        <option value="1"<?php if($RES_ROOM1==1){ echo " selected"; } ?>>Restricted</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN1\">\n");
		skin_selection(1,$ROOM_SKIN1);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>2. Second Public room name.</b>
	</td>
    <td>
		<input name="vROOM2" type="text" size="25" maxlength="25" value="<?php echo $ROOM2; ?>"><br />
        <select name="vEN_ROOM2">
	        <option value="0"<?php if($EN_ROOM2==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM2==1){ echo " selected"; } ?>>Enabled</option>
        </select>&nbsp;
        <select name="vRES_ROOM2">
	        <option value="0"<?php if($RES_ROOM2==0){ echo " selected"; } ?>>Unrestricted</option>
	        <option value="1"<?php if($RES_ROOM2==1){ echo " selected"; } ?>>Restricted</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN2\">\n");
		skin_selection(2,$ROOM_SKIN2);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Third Public room name.</b>
	</td>
    <td>
		<input name="vROOM3" type="text" size="25" maxlength="25" value="<?php echo $ROOM3; ?>"><br />
        <select name="vEN_ROOM3">
	        <option value="0"<?php if($EN_ROOM3==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM3==1){ echo " selected"; } ?>>Enabled</option>
        </select>&nbsp;
        <select name="vRES_ROOM3">
	        <option value="0"<?php if($RES_ROOM3==0){ echo " selected"; } ?>>Unrestricted</option>
	        <option value="1"<?php if($RES_ROOM3==1){ echo " selected"; } ?>>Restricted</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN3\">\n");
		skin_selection(3,$ROOM_SKIN3);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>4. Forth Public room name.</b>
	</td>
    <td>
		<input name="vROOM4" type="text" size="25" maxlength="25" value="<?php echo $ROOM4; ?>"><br />
        <select name="vEN_ROOM4">
	        <option value="0"<?php if($EN_ROOM4==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM4==1){ echo " selected"; } ?>>Enabled</option>
        </select>&nbsp;
        <select name="vRES_ROOM4">
	        <option value="0"<?php if($RES_ROOM4==0){ echo " selected"; } ?>>Unrestricted</option>
	        <option value="1"<?php if($RES_ROOM4==1){ echo " selected"; } ?>>Restricted</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN4\">\n");
		skin_selection(4,$ROOM_SKIN4);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>5. Fifth Public room name.</b>
	</td>
    <td>
		<input name="vROOM5" type="text" size="25" maxlength="25" value="<?php echo $ROOM5; ?>"><br />
        <select name="vEN_ROOM5">
	        <option value="0"<?php if($EN_ROOM5==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM5==1){ echo " selected"; } ?>>Enabled</option>
        </select>&nbsp;
        <select name="vRES_ROOM5">
	        <option value="0"<?php if($RES_ROOM5==0){ echo " selected"; } ?>>Unrestricted</option>
	        <option value="1"<?php if($RES_ROOM5==1){ echo " selected"; } ?>>Restricted</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN5\">\n");
		skin_selection(5,$ROOM_SKIN5);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>6. First Private room name.</b><br />
    	<i>Note: This is displayed on login, only to admins</i>
    </td>
    <td>
		<input name="vROOM6" type="text" size="25" maxlength="25" value="<?php echo $ROOM6; ?>"><br />
        <select name="vEN_ROOM6">
	        <option value="0"<?php if($EN_ROOM6==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM6==1){ echo " selected"; } ?>>Enabled</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN6\">\n");
		skin_selection(6,$ROOM_SKIN6);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>7. Second Private room name (also default if none selected).</b><br />
    	<i>Note: This is displayed on login, only to admins</i>
    </td>
    <td>
		<input name="vROOM7" type="text" size="25" maxlength="25" value="<?php echo $ROOM7; ?>"><br />
        <select name="vEN_ROOM7">
	        <option value="0"<?php if($EN_ROOM7==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM7==1){ echo " selected"; } ?>>Enabled</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN7\">\n");
		skin_selection(7,$ROOM_SKIN7);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>8. Third Private room name.</b><br />
    	<i>Note: This is displayed on login to all power users (fits for "staff only" rooms)</i>
    </td>
    <td>
		<input name="vROOM8" type="text" size="25" maxlength="25" value="<?php echo $ROOM8; ?>"><br />
        <select name="vEN_ROOM8">
	        <option value="0"<?php if($EN_ROOM8==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM8==1){ echo " selected"; } ?>>Enabled</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN8\">\n");
		skin_selection(8,$ROOM_SKIN8);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>9. Fourth Private room name.</b><br />
    	<i>Note: This is displayed by default on login to all users (fits for "support" like rooms)</i>
    </td>
    <td>
		<input name="vROOM9" type="text" size="25" maxlength="25" value="<?php echo $ROOM9; ?>"><br />
        <select name="vEN_ROOM9">
	        <option value="0"<?php if($EN_ROOM9==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_ROOM9==1){ echo " selected"; } ?>>Enabled</option>
        </select><br />
	<?php
		echo ("<select name=\"vROOM_SKIN9\">\n");
		skin_selection(9,$ROOM_SKIN9);
		echo ("</select>\n");
	?>
    </td>
</tr>
<tr>
    <td><b>1. Show Default Private rooms on index page.</b><br />
    	<i>Hint: Not all the private rooms will be shown as options for all the users (see next two settings)<br />
    	This option will just let the <b>admins</b> see all default private rooms, but is <u><b>required</b></u> for the next two settings to work.</i>
    </td>
    <td>
        <select name="vSHOW_PRIV">
	        <option value="0"<?php if($SHOW_PRIV==0){ echo " selected"; } ?>>Hide</option>
	        <option value="1"<?php if($SHOW_PRIV==1){ echo " selected"; } ?>>Show</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>2. Show Default Private rooms on index page to MODERATORS.</b><br />
    	<i>Hint: Moderators will only see rooms 8 and 9 (Staff and Support types). <font color=red>Setting no.1 is required!</font></i>
    </td>
    <td>
        <select name="vSHOW_PRIV_MOD">
	        <option value="0"<?php if($SHOW_PRIV_MOD==0){ echo " selected"; } ?>>Hide</option>
	        <option value="1"<?php if($SHOW_PRIV_MOD==1){ echo " selected"; } ?>>Show</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>3. Show Default Private rooms on index page to NORMAL USERS.</b><br />
    	<i>Hint: Non-power users (including guests) will only see room 9 (Support). <font color=red>Setting no.1 is required!</font></i>
    </td>
    <td>
        <select name="vSHOW_PRIV_USR">
	        <option value="0"<?php if($SHOW_PRIV_USR==0){ echo " selected"; } ?>>Hide</option>
	        <option value="1"<?php if($SHOW_PRIV_USR==1){ echo " selected"; } ?>>Show</option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="colors"></a><b>Colors</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable different Colored Names in users lists and/or posts.</b><br />
    	<i><font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and re-login in order to apply the changes. An announcement to all the rooms will be automatically sent if you enable/disable this.</font><br />
    	Hints: If enabled, users can set their personal color to use for their usernames in users lists only.<br />
    	If disabled, admins will be shown in <a class="admin">red</a> and moderators in <a class="mod">blue</a> (their default power colors in skins/styleN.css.php), only if "Italicize power usernames" is enabled below.</i>
    </td>
    <td>
        <select name="vCOLOR_NAMES">
	        <option value="0"<?php if($COLOR_NAMES==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($COLOR_NAMES==1){ echo " selected"; } ?>>Enabled</option>
        </select>
    </td>
</tr>
<tr>
	<td><b>Italicize Power usernames in users lists:</b><br />
    	This option allows you to choose between showing or not who is admin and moderator in your chat (this doesn't change any powers, it only makes admin/moder names different or not - italics - from regular users).<br />
		<i>Hint: This also applies to color names, showing or not admins in <a class="admin">red</a> and moderators in <a class="mod">blue</a> (their default power colors in skins/styleN.css.php) or, if Colored Names are enabled above, <?php echo("<font color=".$COLOR_CA.">".$COLOR_CA."</font>"); ?> and <?php echo("<font color=".$COLOR_CM.">".$COLOR_CM."</font>"); ?> (their default power colors chosen below).</i>
	</td>
    <td>
        <select name="vITALICIZE_POWERS">
	        <option value="0"<?php if($ITALICIZE_POWERS==0){ echo " selected"; } ?>>Don't show italics/colors</option>
	        <option value="1"<?php if($ITALICIZE_POWERS==1){ echo " selected"; } ?>>Show italics/colors</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Color filters in posts.</b><br />
    	<i>Hint: If enabled, all the users can use any color, if not, they can use all except the power colors set below.</i>
    </td>
    <td>
        <select name="vCOLOR_FILTERS">
	        <option value="0"<?php if($COLOR_FILTERS==0){ echo " selected"; } ?>>Filters Disabled</option>
	        <option value="1"<?php if($COLOR_FILTERS==1){ echo " selected"; } ?>>Filters Enabled</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Set the Power Colors to be used only by admins (first as default).</b><br />
    	<i>Hint: This applies to the posted messages' colors mainly, but if Colored Names are enabled above, it will also apply to the names colors.</i>
	</td>
    <td>
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CA\" style=\"background-color:".$COLOR_CA.";\">\n");
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
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CA1\" style=\"background-color:".$COLOR_CA1.";\">\n");
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
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CA2\" style=\"background-color:".$COLOR_CA2.";\">\n");
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
<tr bgcolor="#B0C4DE">
    <td><b>Set the Power Colors to be used only by moderators (first as default).</b><br />
    	<i>Hint. This applies to the posted messages' colors mainly, but if Colored Names are enabled above, it will also apply to names colors.<br />Admins will also be able to use these colors, but no other users.</i>
    </td>
    <td>
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CM\" style=\"background-color:".$COLOR_CM.";\">\n");
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
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CM1\" style=\"background-color:".$COLOR_CM1.";\">\n");
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
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vCOLOR_CM2\" style=\"background-color:".$COLOR_CM2.";\">\n");
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
<tr>
    <td><b>Allow guests to use colors.</b><br />
    	<i>Hint: If disabled, unregistered users will only use the default color for that room in their posts. This will encourage them to register (hopefully).</i>
    </td>
    <td>
        <select name="vCOLOR_ALLOW_GUESTS">
	        <option value="0"<?php if($COLOR_ALLOW_GUESTS==0){ echo " selected"; } ?>>Disallow colors for Guests</option>
	        <option value="1"<?php if($COLOR_ALLOW_GUESTS==1){ echo " selected"; } ?>>Allow colors for Guests</option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="sounds"></a><b>Sound settings</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Play a sound on entrance.</b>
	</td>
    <td>
        <select name="vALLOW_ENTRANCE_SOUND">
	        <option value="0"<?php if($ALLOW_ENTRANCE_SOUND==0){ echo " selected"; } ?>>0 - Disabled</option>
	        <option value="1"<?php if($ALLOW_ENTRANCE_SOUND==1){ echo " selected"; } ?>>1 - Notify the entire room</option>
	        <option value="2"<?php if($ALLOW_ENTRANCE_SOUND==2){ echo " selected"; } ?>>2 - Welcome only the user</option>
	        <option value="3"<?php if($ALLOW_ENTRANCE_SOUND==3){ echo " selected"; } ?>>3 - Notify & Welcome (1&2)</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Path to the sound to be played on entrance (only .wav extensions).</b><br />
    	<i>Example: sounds/beep.wav' (you can also use long/remote URLs)</i>
    </td>
    <td>On Entrance:<br />
		<input name="vENTRANCE_SOUND" type="text" size="20" maxlength="255" value="<?php echo $ENTRANCE_SOUND; ?>"><br />
    	On Welcome:<br />
		<input name="vWELCOME_SOUND" type="text" size="20" maxlength="255" value="<?php echo $WELCOME_SOUND; ?>">
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Play a buzz sound on /buzz command.</b><br />
    	(or just display a [Buzz] message, without any sound)
    </td>
    <td>
        <select name="vALLOW_BUZZ_SOUND">
	        <option value="0"<?php if($ALLOW_BUZZ_SOUND==0){ echo " selected"; } ?>>No buzz sounds</option>
	        <option value="1"<?php if($ALLOW_BUZZ_SOUND==1){ echo " selected"; } ?>>Play buzz sounds</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Path to the buzz sound to be played (only .wav extensions).</b><br />
    	<i>Example: sounds/chimedwn.wav (you can also use long/remote URLs)</i>
    </td>
    <td>
		<input name="vBUZZ_SOUND" type="text" size="25" maxlength="255" value="<?php echo $BUZZ_SOUND; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="profanity"></a><b>Profanity</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Profanity filter.</b><br />
    	(replacement of posted swear words with the chars below)
    </td>
    <td>
        <select name="vNO_SWEAR">
	        <option value="0"<?php if($NO_SWEAR==0){ echo " selected"; } ?>>Allow swearing</option>
	        <option value="1"<?php if($NO_SWEAR==1){ echo " selected"; } ?>>Disallow swearing</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Expression to replace the swear words with.</b>
	</td>
    <td>
		<input name="vSWEAR_EXPR" type="text" size="7" maxlength="5" value="<?php echo $SWEAR_EXPR; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. Room name to allow swear words (avoid the filter).</b><br />
    	<i>Note: You must enter the exact name of the room. <a href=#roomnames class="ChatLink">Click here</a> to check your room names.</i>
    </td>
    <td>
		<input name="vSWEAR1" type="text" size="25" maxlength="25" value="<?php echo $SWEAR1; ?>">
	</td>
</tr>
<tr>
    <td><b>2. Room name to allow swear words (avoid the filter).</b>
	</td>
    <td>
		<input name="vSWEAR2" type="text" size="25" maxlength="25" value="<?php echo $SWEAR2; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Room name to allow swear words (avoid the filter).</b>
	</td>
    <td>
		<input name="vSWEAR3" type="text" size="25" maxlength="25" value="<?php echo $SWEAR3; ?>">
	</td>
</tr>
<tr>
    <td><b>4. Room name to allow swear words (avoid the filter).</b>
	</td>
    <td>
		<input name="vSWEAR4" type="text" size="25" maxlength="25" value="<?php echo $SWEAR4; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="pm"></a><b>Private messaging</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable whispers (private messages) system.</b><br />
    	<i>Hint: if disabled, only the public messages will be allowed to be posted in chat</i>
    </td>
    <td>
        <select name="vENABLE_PM">
	        <option value="0"<?php if($ENABLE_PM==0){ echo " selected"; } ?>>PM disabled</option>
	        <option value="1"<?php if($ENABLE_PM==1){ echo " selected"; } ?>>PM enabled</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable popup whispers (private messages) system.</b><br />
    	<i>Hint: if enabled, guests will not receive PMs in popups - they must register)<br />
    	This can also be configured per each registered user in their profile<br />
    	<font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and re-login. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i><br />
		Off-line PMs will always show in a popup anyway (otherwise, recipients won't be notified about new PMs).
    </td>
    <td>
        <select name="vPRIV_POPUP">
	        <option value="0"<?php if($PRIV_POPUP==0){ echo " selected"; } ?>>PM pop-ups disabled</option>
	        <option value="1"<?php if($PRIV_POPUP==1){ echo " selected"; } ?>>PM pop-ups enabled</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Allow users to delete their own (received) PMs from the database.</b><br />
    	<i>Hint: if enabled, users will be able to select and delete the private messages they received.</i>
    </td>
    <td>
        <select name="vALLOW_PM_DEL">
	        <option value="0"<?php if($ALLOW_PM_DEL==0){ echo " selected"; } ?>>Disallow PM deletion</option>
	        <option value="1"<?php if($ALLOW_PM_DEL==1){ echo " selected"; } ?>>Allow PM deletion</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Clean-up time for unread off-line private messages.</b><br />
    	<i><font color=red>Important: If the recipient does not login to chat in this interval, these old private messages are automatically removed from the database (they will not be exported to the log archive neither, so the old unread PMs get lost).</font></i>
	</td>
    <td>
		<input name="vPM_KEEP_DAYS" type="text" size="7" maxlength="3" value="<?php echo $PM_KEEP_DAYS; ?>"> (days)
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="bot"></a><b>Bot Settings</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable BOT in chat.</b><br />
    	<i><font color=red>Important: Before changing any of the bot settings below, please stop the bot if it is running in the chat (you will not be able to kick it out afterwards, because it is set as admin)</font></i>
    </td>
    <td>
        <select name="vBOT_CONTROL">
	        <option value="0"<?php if($BOT_CONTROL==0){ echo " selected"; } ?>>Disable Bot</option>
	        <option value="1"<?php if($BOT_CONTROL==1){ echo " selected"; } ?>>Enable Bot</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable Public conversations with BOT in chat.</b><br />
    	<i>Hint: if you disable this, the bot will only listen and talk to users using private messages in chat</i>
    </td>
    <td>
        <select name="vBOT_PUBLIC">
	        <option value="0"<?php if($BOT_PUBLIC==0){ echo " selected"; } ?>>Private Bot Only</option>
	        <option value="1"<?php if($BOT_PUBLIC==1){ echo " selected"; } ?>>Public Bot</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the desired name for your BOT.</b><br />
    	<i><font color=red>Important: Do not change the name before you make sure bot is fully loaded (check if it can post in chat).</i>
		<?php if (!$bot_id) echo ("<br />Note: Your bot has not been correctly loaded! Read the install/manual installation/Manual Instructions.txt"); ?></font>
    </td>
    <td>
			<input name="vBOT_NAME" type="text" size="25" maxlength="25" value="<?php echo $BOT_NAME; ?>">
	</td>
</tr>
<tr>
    <td><b>BOT status & maintainance.</b><br />
    	<?php if ($bot_id <> 1) echo ("<i><font color=red>Important: If your bot is not responding properly (posts empty messages) and/or the Bot ID <> 1, you might need to reload your bot. This operation will empty the bot tables in the database and reload the entire script.</i></font>"); ?>
    </td>
    <td>
			<?php
			if (!$bot_loaded)
			{
				echo("<font color=red>Your Bot is not loaded to the DB.</font>".((file_exists("bot/aiml/startup.xml") && file_exists("bot/botloader.php")) ? "<br />Click <a href=\"./bot/botloader.php\" target=\"_blank\">here</a> to load it now!": ""));
			}
			elseif ($bot_id)
			{
				echo(($bot_id == 1) ? "<font color=green>Bot ID:</font><input name=\"BotId\" type=\"text\" size=\"7\" maxlength=\"2\" value=\"$bot_id\" DISABLED READONLY>" : "<font color=red>Bot ID:</font><input name=\"BotId\" type=\"text\" size=\"7\" maxlength=\"2\" value=\"$bot_id\" DISABLED READONLY><br />Click <a href=\"./bot/botloader.php\" target=\"_blank\" class=\"error\">here</a> to reload bot");
			}
			?>
		</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the color of the BOT response messages.</b>
	</td>
    <td>
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vBOT_FONT_COLOR\" style=\"background-color:".$BOT_FONT_COLOR.";\">\n");
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
    <td><b>Enter the avatar of the BOT.</b><br />
    	<i>Hint: It will be shown only if the avatar system is enabled</i>
    </td>
    <td>
		<input name="vBOT_AVATAR" type="text" size="20" maxlength="255" value="<?php echo $BOT_AVATAR; ?>">
		<?php echo(($BOT_AVATAR != "") ? "&nbsp;<img id=\"bot_avatarToSwap\" src=\"".$BOT_AVATAR."\" border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"Bot Avatar\" Title=\"Bot Avatar\" />" : ""); ?>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the message to be posted by BOT on start.</b><br />
    	<i>Hint: Avoid special characters or the settings will not be saved</i>
    </td>
    <td>
		<input name="vBOT_HELLO" type="text" size="25" maxlength="100" value="<?php echo $BOT_HELLO; ?>">
	</td>
</tr>
<tr>
    <td><b>Enter the message to be posted by BOT on stop.</b><br />
    	<i>Hint: Avoid special characters or the settings will not be saved</i>
    </td>
    <td>
		<input name="vBOT_BYE" type="text" size="25" maxlength="100" value="<?php echo $BOT_BYE; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="commands"></a><b>Commands</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Max number of messages that user may export on /save command.</b><br />
    	<i>Values: 0=disable, any integer=number of messages, *=no limit</i>
    </td>
    <td>
		<input name="vSAVE" type="text" size="7" maxlength="2" value="<?php echo $SAVE; ?>">
	</td>
</tr>
<tr>
    <td><b>Enable Different Topics for each room (/topic or /topic * commands).</b><br />
    	(or just display a default one, called Global topic)<br />
		<i>Hint: default topics ought to be edited in the according localized.chat.php / per each desired language, or, to add a default global topic (which overrides the localized topics), add it to localized/_owner/owner.php)</i>
    </td>
    <td>
        <select name="vTOPIC_DIFF">
	        <option value="0"<?php if($TOPIC_DIFF==0){ echo " selected"; } ?>>Global topic</option>
	        <option value="1"<?php if($TOPIC_DIFF==1){ echo " selected"; } ?>>Multiple topics</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the expression for the /room command.</b><br />
    	<i>Examples: <font color=red>Attention Room:</font> or <font color=red>Narrator Says:</font> or <font color=red>Read this:</font> or <font color=red>Author says:</font></i>
    </td>
    <td>
		<input name="vROOM_SAYS" type="text" size="25" maxlength="255" value="<?php echo $ROOM_SAYS; ?>">
	</td>
</tr>
<tr>
    <td><b>Allow moderators to use /demote command.</b><br />
		<i>Hint: if set to second option, moderators will be able to demote other moderators - <font color=red>be very careful!</font></i>
	</td>
    <td>
        <select name="vDEMOTE_MOD">
	        <option value="0"<?php if($DEMOTE_MOD==0){ echo " selected"; } ?>>Only admins</option>
	        <option value="1"<?php if($DEMOTE_MOD==1){ echo " selected"; } ?>>Moderators & admins</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the max number of dice per throw.</b><br />
    	<i><font color=red>Use a value smaller than 99.</font><br />
		Hint: Needed ONLY for Dice v.2. Please note that increasing this value too much, will lead to a load of how many dice images you choose, which can return delays displaying the messages (drastically for non-IE browsers)</i>
    </td>
    <td>
		<input name="vMAX_DICES" type="text" size="7" maxlength="2" value="<?php echo $MAX_DICES; ?>">
	</td>
</tr>
<tr>
    <td><b>Enter the max number of dice per throw (sides per die for Dice v.2)</b>
	</td>
    <td>
		<input name="vMAX_ROLLS" type="text" size="7" maxlength="3" value="<?php echo $MAX_ROLLS; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default sort order in the users lists (/sort command).</b><br />
    	<i>Hint: users can also use the /sort command to change their sorting order</i>
    </td>
    <td>
        <select name="vUSERS_SORT_ORD">
	        <option value="0"<?php if($USERS_SORT_ORD==0){ echo " selected"; } ?>>By time of entrance</option>
	        <option value="1"<?php if($USERS_SORT_ORD==1){ echo " selected"; } ?>>Alphabetically</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Set the maximum size for resizing posted pictures using /img command</b>
	</td>
    <td>
		<input name="vMAX_PIC_SIZE" type="text" size="7" maxlength="3" value="<?php echo $MAX_PIC_SIZE; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="mmedia"></a><b>Multimedia</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable posting videos (e.g. YouTube) by using the /video command</b><br />
		<i>Hints: If disabled, only the links to the original video source will be posted in chat; if enabled, any user can post a video that can be watched directly in chat by all users; setting to admins only will only show videos posted by admins and topmoders, rest of the users posting only links to the original video source.</i>
	</td>
    <td>
        <select name="vALLOW_VIDEO">
	        <option value="0"<?php if($ALLOW_VIDEO==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($ALLOW_VIDEO==1){ echo " selected"; } ?>>Enabled</option>
	        <option value="2"<?php if($ALLOW_VIDEO==2){ echo " selected"; } ?>>From admins only</option>
        </select>
	</td>
</tr>
<tr>
    <td><b>Set the width and height of the Video Player</b>
	</td>
    <td>
		W: <input name="vVIDEO_WIDTH" type="text" size="4" maxlength="3" value="<?php echo $VIDEO_WIDTH; ?>">&nbsp;
		H: <input name="vVIDEO_HEIGHT" type="text" size="4" maxlength="3" value="<?php echo $VIDEO_HEIGHT; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable the MediaPlayer add-on in chat</b><br />
    	<i><font color=red>Choose the correct format as the frame will take the according size (audio < video).<br />
    	Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and re-login. An announcement to all the rooms will be automatically sent if you enable/disable this.</font><br />
    	<i>Hints: If enabled, a valid streaming URL must be also set in the next field. You can set either a static audio/video source or a radioplayer streaming server. E.g. http://playlist.yahoo.com/makeplaylist.dll?id=1369080&segment=149773 (NASA TV live station)</i>
	</td>
    <td>
        <select name="vEN_WMPLAYER">
	        <option value="0"<?php if($EN_WMPLAYER==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<?php if($EN_WMPLAYER==1){ echo " selected"; } ?>>Audio/Radio</option>
	        <option value="2"<?php if($EN_WMPLAYER==2){ echo " selected"; } ?>>Video/TV</option>
        </select>
	</td>
</tr>
<tr>
    <td><b>The path to the streaming URL.</b>
	</td>
    <td>
		<input name="vWMP_STREAM" type="text" size="25" maxlength="255" value="<?php echo $WMP_STREAM; ?>">
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="quick"></a><b>Quick Menus</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Define the Quick Menu for admins.</b><br />
    	<i>Hint: keep these chars: <b>|</b> at the end of each line except the last one<br />
    	Empty this box to disable admin's Quick Menu.</i>
    </td>
    <td><textarea name="vQUICKA" rows=5 cols=28 wrap=on><?php echo $QUICKA; ?></textarea>
	</td>
</tr>
<tr>
    <td><b>Define the Quick Menu for moderators.</b><br />
    	<i>Hint: keep these chars: <b>|</b> at the end of each line except the last one<br />
    	Empty this box to disable moder's Quick Menu.</i>
    </td>
    <td><textarea name="vQUICKM" rows=5 cols=28 wrap=on><?php echo $QUICKM; ?></textarea>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Define the Quick Menu for other users.</b><br />
    	<i>Hint: keep these chars: <b>|</b> at the end of each line except the last one<br />
    	Empty this box to disable user's Quick Menu.</i>
    </td>
    <td><textarea name="vQUICKU" rows=5 cols=28 wrap=on><?php echo $QUICKU; ?></textarea>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="avatars"></a><b>Avatars & Gravatars</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable AVATAR System.</b><br />
    	<i><font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and re-login. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i>
    </td>
    <td>
        <select name="vUSE_AVATARS" id="use_avatars" onChange="swapImage('use_avatars','use_avatarsToSwap')">
	        <option value="0"<?php if($USE_AVATARS==0){ echo " selected"; } ?>>No avatars</option>
	        <option value="1"<?php if($USE_AVATARS==1){ echo " selected"; } ?>>Use avatars</option>
        </select>&nbsp;<img id="use_avatarsToSwap" src="<?php echo(($USE_AVATARS==1) ? "./".$ChatPath.$AVA_RELPATH.$DEF_AVATAR : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"Default Avatar\" Title=\"Default Avatar\""); ?> />
    </td>
</tr>
<tr>
    <td><b>Show Change Avatar (Profile) button in input bar.</b>
	</td>
    <td>
        <select name="vAVA_PROFBUTTON" id="prof_button" onChange="swapImage('prof_button','prof_buttonToSwap')">
	        <option value="0"<?php if($AVA_PROFBUTTON==0){ echo " selected"; } ?>>Hide Avatar Button</option>
	        <option value="1"<?php if($AVA_PROFBUTTON==1){ echo " selected"; } ?>>Show Avatar Button</option>
        </select>&nbsp;<img id="prof_buttonToSwap" src="<?php echo(($AVA_PROFBUTTON==1) ? "./".$ChatPath."images/avatarbutton.gif" : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"Avatar button\" Title=\"Avatar button\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>The path to your avatar dir.</b>
	</td>
    <td>
		<input name="vAVA_RELPATH" type="text" size="25" maxlength="55" value="<?php echo $AVA_RELPATH == "" ? "images/avatars/" : $AVA_RELPATH; ?>">
	</td>
</tr>
<tr>
    <td><b>Enter the number of avatars to be shown from your defined folder.</b><br />
	<i>Hint: only the first <?php echo($NUM_AVATARS); ?> avatars will be shown to the users</i>
	</td>
    <td>
		<?php
		$avatars=$AVA_RELPATH;
		$avatarfiles = opendir($avatars); #open directory
			$i = 0;
			while (false !== ($avatarfile = readdir($avatarfiles)))
			{
				if (!eregi("\.html",$avatarfile) && !eregi("uploaded",$avatarfile) && !eregi("quote_avatar",$avatarfile) && !eregi("bot_avatar",$avatarfile) && $avatarfile!=='.' && $avatarfile!=='..')
				{
					$avatarsfile[]=$avatarfile;
			 		$i++;
				}
			}
			closedir($avatarfiles);
			$max_num_avatars = $i-2;
?>
		<input name="vNUM_AVATARS" type="text" size="7" maxlength="3" value="<?php echo (($NUM_AVATARS > $max_num_avatars) ? $max_num_avatars : $NUM_AVATARS); ?>">
		&nbsp;(max <?php echo($max_num_avatars); ?>)
		<input name="max_num_avatars" type="hidden" value="<?php echo $max_num_avatars; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Users default avatar.</b>
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
		</select><?php echo("&nbsp;<img id=\"def_avatarToSwap\" src=\"./".$ChatPath.$AVA_RELPATH.$DEF_AVATAR."\" border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"Default Avatar\" Title=\"Default Avatar\""); ?> />
	</td>
</tr>
<tr>
    <td><b>Enter the width and height for the avatars to be shown.</b><br />
    	<i>Hint: Usually, for a nice layout, width and height values should be equal.</i>
	</td>
    <td>
		Width:&nbsp;&nbsp;<input name="vAVA_WIDTH" type="text" size="7" maxlength="3" value="<?php echo $AVA_WIDTH; ?>"> (px)<br />
		Height:&nbsp;<input name="vAVA_HEIGHT" type="text" size="7" maxlength="3" value="<?php echo $AVA_HEIGHT; ?>"> (px)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Allow users to upload Avatars from their machines.</b><br />
	<i><font color=red>Important: make sure the "images/avatars" and "images/avatars/uploaded" folders exist and they have public write permissions (CHMOD 0777)!</font></i>
	</td>
    <td>
        <select name="vALLOW_UPLOADS">
	        <option value="0"<?php if($ALLOW_UPLOADS==0){ echo " selected"; } ?>>Disallow uploads</option>
	        <option value="1"<?php if($ALLOW_UPLOADS==1){ echo " selected"; } ?>>Allow uploads</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Show gender icons beside avatars.</b>
	</td>
    <td>
        <select name="vDISP_GENDER" id="genders" onChange="swapImage('genders','gendersToSwap')">
	        <option value="0"<?php if($DISP_GENDER==0){ echo " selected"; } ?>>Hide Gender icons</option>
	        <option value="1"<?php if($DISP_GENDER==1){ echo " selected"; } ?>>Show Gender icons</option>
        </select>&nbsp;<img style="vertical-align:middle" id="gendersToSwap" src="<?php echo(($DISP_GENDER==1) ? "./".$ChatPath."images/gender_couple.gif" : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 ALT=\"Genders\" Title=\"Genders\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><a name="force"></a><b>Enable use of GRAVATARS.</b><br />
    	<i><font color=red>Important: <a href=#avatars>Avatar System</a> must also be enabled above!</font><br />
		Hint: If enabled, all guests will have a default gravatar as avatar.</i>
    </td>
    <td>
        <select name="vALLOW_GRAVATARS" id="gravatars" onChange="swapImage('gravatars','gravatarsToSwap')">
	        <option value="0"<?php if($ALLOW_GRAVATARS==0){ echo " selected"; } ?>>Disable Gravatars</option>
	        <option value="1"<?php if($ALLOW_GRAVATARS==1){ echo " selected"; } ?>>Let users decide</option>
	        <option value="2"<?php if($ALLOW_GRAVATARS==2){ echo " selected"; } ?>>Force Only Gravatars</option>
        </select>&nbsp;<img id="gravatarsToSwap" src="<?php echo(($ALLOW_GRAVATARS) ? "http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=".$AVA_WIDTH."&r=g&d=".$GRAVATARS_DYNAMIC_DEF : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 ALT=\"Gravatar\" Title=\"Gravatar\""); ?> />
    </td>
</tr>
<tr bgcolor="#B0C4DE">
	<td colspan="2">
    	<i><font color=blue>Definition:</font><br />
    	A gravatar, or <b>G</b>lobally <b>R</b>ecognized <b>A</b>vatar, is quite simply an avatar image that follows you from weblog to weblog appearing beside your name when you comment on gravatar enabled sites. Avatars help identify your posts on web forums, so why not on weblogs.<br />Signing up for a gravatar.com account is FREE, and all that's required is an email address. Once you've signed up you can upload your avatar image and soon after you'll start seeing it on gravatar enabled weblogs (including this chat)!<br />
		<font color=blue>(read more about Gravatars on <a href="http://www.gravatar.com" target="_blank">http://www.gravatar.com</a> site)</font></i>
	</td>
</tr>
<tr>
    <td><b>GRAVATARS Cache Settings.</b><br />
	<i>Server Info:<br /><font color=red>Important: if cache is enabled, make sure the "cache" folder exists in the chat root and it has public write permissions (CHMOD 0777)!<br />
	<?php echo((!$cache_supported || $server_blocked) ? "<b>Cache not supported on this server!</b><br />" : ""); ?>
		</font><font color=blue>Hosting Server IP: <b><?php echo($_SERVER['SERVER_ADDR']); ?></b> <?php echo(!$server_blocked ? "" : "<b><font color=red>cannot get access to gravatar.com!</font></b>"); ?></font><br />
		<font color=blue>Php server version: <b><?php echo(!version_compare(PHPVERSION,'5','>=') ? "<font color=red>".PHPVERSION."</font>" : PHPVERSION); ?></b></font><br />
		<font color=blue>allow_url_fopen: <b><?php echo(!(ini_get("allow_url_fopen")) ? "<font color=red>".L_DISABLED."</font>" : L_ENABLED); ?></b></font><br />
		<font color=blue>allow_url_include: <b><?php echo(!(ini_get("allow_url_include")) ? "<font color=red>".L_DISABLED."</font>" : L_ENABLED); ?></b></font><br />
		<font color=blue>file_get_contents: <b><?php echo(!(function_exists("file_get_contents")) ? "<font color=red>".L_DISABLED."</font>" : L_ENABLED); ?></b></font><br />
		<font color=blue>MySQL server version: <b><?php echo(mysql_get_server_info()); ?></b></font></i>
	</td>
    <td>
		<input type="radio" value="0" name="vGRAVATARS_CACHE" <?php if($GRAVATARS_CACHE==0 || !$cache_supported || $server_blocked) { echo " checked"; }; ?>>&nbsp;Cache Disabled<br />
		<input type="radio" value="1" name="vGRAVATARS_CACHE" <?php if($GRAVATARS_CACHE==1 && $cache_supported){ echo " checked"; }; if(!$cache_supported || $server_blocked){ echo " disabled"; }; ?>>&nbsp;Cache Enabled<br />
		Cache Age:<br /><input name="vGRAVATARS_CACHE_EXPIRE" type="text" size="7" maxlength="3" value="<?php echo $GRAVATARS_CACHE_EXPIRE; ?>"<?php if(!$cache_supported || $server_blocked){ echo " readonly"; }; ?>> (days)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>GRAVATARS Allowed Ratings.</b>
	</td>
    <td>
        <select name="vGRAVATARS_RATING">
	        <option value="G"<?php if($GRAVATARS_RATING=="G"){ echo " selected"; } ?>>G</option>
	        <option value="PG"<?php if($GRAVATARS_RATING=="PG"){ echo " selected"; } ?>>PG</option>
	        <option value="R"<?php if($GRAVATARS_RATING=="R"){ echo " selected"; } ?>>R</option>
	        <option value="X"<?php if($GRAVATARS_RATING=="X"){ echo " selected"; } ?>>X</option>
	        <option value="ANY"<?php if($GRAVATARS_RATING=="ANY"){ echo " selected"; } ?>>ANY</option>
        </select>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td colspan=2>
		<i>G rated gravatar is suitable for display on all websites with any audience type. <font color=blue>(recommended & default)</font><br />
		PG rated gravatars may contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence.<br />
		R rated gravatars may contain such things as harsh profanity, intense violence, nudity, or hard drug use.<br />
		X rated gravatars may contain hardcore sexual imagery or extremely disturbing violence.</i>
	</td>
</tr>
<tr>
    <td><b>Dynamic Default GRAVATARS.</b><br />
	<i>Hints: This will randomly return a dynamic image for each user who don't have a gravatar.com account for their email (chat guests and/or users without a registered gravatar.com account).<br />
	<font color=red>You can force to display Random default Gravatars only if <a href="#force">Force Only Gravatars</a> is also enabled above!</font></i>
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
        &nbsp;<img id="gravatars_defToSwap" src="<?php echo((isset($grav_def_src) && $grav_def_src!= "") ? $grav_def_src : "./".$ChatPath."images/gender_none.gif"); ?>" <?php echo("border=0 ALT=\"Dynamic Gravatar\" Title=\"Dynamic Gravatar\""); ?> /><br />
        <select name="vGRAVATARS_DYNAMIC_DEF_FORCE">
	        <option value="0"<?php if($GRAVATARS_DYNAMIC_DEF_FORCE==0){ echo " selected"; } ?>>Show Users' Defaults</option>
	        <option value="1"<?php if($GRAVATARS_DYNAMIC_DEF_FORCE==1){ echo " selected"; } ?>>Force Random Defaults</option>
        </select>
	</td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="logging"></a><b>Logging Mod</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable chat logging.</b><br />
    	<i>Hint: it will generate html files of the cleaned/deleted conversations. The full version can be accessed via the admin advanced menu, the short version (only the public messages) from the Extra Options menu in chat rooms.</i>
    </td>
    <td>
        <select name="vCHAT_LOGS">
	        <option value="0"<?php if($CHAT_LOGS==0){ echo " selected"; } ?>>Disable Logs/Archive</option>
	        <option value="1"<?php if($CHAT_LOGS==1){ echo " selected"; } ?>>Enable Logs/Archive</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Set the name of your admin (full) logs folder.</b><br />
    	<i><font color=red>Important: Rename the original "logsadmin" folder to a hard to guess name for your full logs folder.</font><br />
    	Hint: This is different from the public/users accessible one (called "logs"), which does not include any private/confidential data from your chat conversations/actions.</i>
    </td>
    <td>
		<input name="vLOG_DIR" type="text" size="25" maxlength="25" value="<?php echo $LOG_DIR; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display logs to non-admin users in chat.</b><br />
    	<i>Hint: Only if Chat logging is enabled.</i>
    </td>
    <td>
        <select name="vSHOW_LOGS_USR">
	        <option value="0"<?php if($SHOW_LOGS_USR==0){ echo " selected"; } ?>>Hide</option>
	        <option value="1"<?php if($SHOW_LOGS_USR==1){ echo " selected"; } ?>>Show</option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="lurking"></a><b>Lurking Mod</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable chat lurking.</b><br />
    	<i>Hint: it will allow non-login people to monitor public conversations and events in the chat.</i>
    </td>
    <td>
        <select name="vCHAT_LURKING">
	        <option value="0"<?php if($CHAT_LURKING==0){ echo " selected"; } ?>>Disable Lurking page</option>
	        <option value="1"<?php if($CHAT_LURKING==1){ echo " selected"; } ?>>Enable Lurking page</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Display lurking page to non-admin users in chat and login page.</b><br />
    	<i>Hint: Only if Chat lurking is enabled.</i>
    </td>
    <td>
        <select name="vSHOW_LURK_USR">
	        <option value="0"<?php if($SHOW_LURK_USR==0){ echo " selected"; } ?>>Hide</option>
	        <option value="1"<?php if($SHOW_LURK_USR==1){ echo " selected"; } ?>>Show</option>
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable the Chat extras in admin panel.</b>
	</td>
    <td>
        <select name="vCHAT_EXTRAS">
	        <option value="0"<?php if($CHAT_EXTRAS==0){ echo " selected"; } ?>>Disable Chat extras</option>
	        <option value="1"<?php if($CHAT_EXTRAS==1){ echo " selected"; } ?>>Enable Chat extras</option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="quote"></a><b>Random Quote</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Random Quote mod.</b><br />
    	<i><font color=red>Important: to change these settings, you have to enable quote mode first!</font></i>
	</td>
    <td>
		<select name="vQUOTE">
	        <option value="0"<?php if($QUOTE==0){ echo " selected"; } ?>>Disable Quotes</option>
	        <option value="1"<?php if($QUOTE==1){ echo " selected"; } ?>>Enable Quotes</option>
        </select>
	</td>
</tr>
<tr>
	<td><b>Quote Name:</b>
	</td>
	<td>
		<input name="vQUOTE_NAME" type="text" size="25" maxlength="25" value="<?php echo $QUOTE_NAME; ?>">
	</td>
</tr>
<tr bgcolor="#B0C4DE">
	<td><b>Quote Name color:</b>
	</td>
	<td>
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vQUOTE_FONT_COLOR\" style=\"background-color:".$QUOTE_FONT_COLOR.";\">\n");
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
	<td><b>Quote Avatar:</b>
	</td>
	<td>
		<input name="vQUOTE_AVATAR" type="text" size="20" maxlength="255" value="<?php echo $QUOTE_AVATAR; ?>">
    <?php echo(($QUOTE_AVATAR != "") ? "&nbsp;<img id=\"quote_avatarToSwap\" src=\"".$QUOTE_AVATAR."\" border=0 width=".$AVA_WIDTH." height=".$AVA_HEIGHT." ALT=\"Quote Avatar\" Title=\"Quote Avatar\" />" : ""); ?>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Quote File:</b>
	</td>
	<td>
		<?php
		$quotes='files/quotes/';
		$quotefiles = opendir($quotes); #open directory
		echo ("<select name=\"vQUOTE_PATH\">");
			$i = 0;
			while (false !== ($quotefile = readdir($quotefiles)))
			{
				if (!eregi("\.html",$quotefile) && $quotefile!=='.' && $quotefile!=='..')
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
	<td><b>Quote Posting frequency:</b>
	</td>
	<td>
		<input name="vQUOTE_TIME" type="text" size="7" maxlength="2" value="<?php echo $QUOTE_TIME; ?>"> (mins)
	</td>
</tr>
<tr bgcolor="#B0C4DE">
	<td><b>Quote Background color:</b>
	</td>
	<td>
		<?php if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<select name=\"vQUOTE_COLOR\" style=\"background-color:".$QUOTE_COLOR.";\">\n");
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
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="ghost"></a><b>Ghost Control</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Control who will be visible in chat rooms.</b><br />
    	<i><font color=red>Important: if you enable Ghost Control, users set as ghosts (invisible) will also be hidden from all the public pages and counters, except their posts and commands in rooms (messages frame)!</font><br />
    	Hint: You can still monitor ghosts' connections and activity in the Connections tab. Please note that ghosts will still be able to act as usual in chat (can post public or private messages and can use all the commands, according to their powers).</i>
	</td>
    <td>
        <select name="vHIDE_ADMINS">
	        <option value="0"<?php if($HIDE_ADMINS==0){ echo " selected"; } ?>>Show online administrators</option>
	        <option value="1"<?php if($HIDE_ADMINS==1){ echo " selected"; } ?>>Hide online admins (ghosts)</option>
        </select><br /><br />
        <select name="vHIDE_MODERS">
	        <option value="0"<?php if($HIDE_MODERS==0){ echo " selected"; } ?>>Show online moderators</option>
	        <option value="1"<?php if($HIDE_MODERS==1){ echo " selected"; } ?>>Hide online moders (ghosts)</option>
        </select>
    </td>
</tr>
<tr>
	<td><b>Special Ghosts (monitors):</b><br />
    	<i><font color=red>Important: Add usernames, separated by commas, without spaces (,)!</font><br />
    	Hint: These users will not be seen by others in chat (only in the Connection tab) and, if they are also admins, they will be able to monitor all the events in chat rooms (including private messages!). We recommend activate these powers <font color=red>only for Parental Control</font> purposes!</i>
	</td>
	<td>
		<input name="vSPECIAL_GHOSTS" type="text" size="25" maxlength="255" value="<?php echo $SPECIAL_GHOSTS; ?>">
	</td>
</tr>
<!--
<tr bgcolor="#B0C4DE">
	<td><b>Punished Ghosts (Phantoms):</b><br />
    	<i><font color=red>Important: Add usernames, separated by commas, without spaces (,)!</font><br />
    	<i>Hint: These users will not be seen by others in chat (only in the Connection tab) and they will not be able to post or send any events in chat rooms. We recommend activate these powers <font color=red>only for Users that fail to be banished</font>!</i>
	</td>
	<td>
		<input name="vPUNNISHED_GHOSTS" type="text" size="25" maxlength="255" value="<?php //echo $PUNNISHED_GHOSTS; ?>">
	</td>
</tr>
-->
</table>
<table align="center" width="780" class=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="bday"></a><b>Birthday Mod</b></td></tr>
	<tr class=\"thumbIndex\">
		<td valign=center align=center height="20" class=tabtitle>Configuration Options</td>
		<td valign=center align=center width="25%" height="20" class=tabtitle>Current Settings</td>
	</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Birthdays required on registration and profiles.</b>
	</td>
    <td>
        <select name="vREQUIRE_BDAY">
	        <option value="0"<?php if($REQUIRE_BDAY==0){ echo " selected"; } ?>>Optional</option>
	        <option value="1"<?php if($REQUIRE_BDAY==1){ echo " selected"; } ?>>Required</option>
        </select>
    </td>
</tr>
<tr>
    <td><b>Send automatic Greetings by email to users on their Birthdays.</b><br />
    	<i><font color=red>Important: if enabled, the script will work only if the chat page will be visited/loaded in the sending interval (default = 7 days). After that interval, the email draft will be dropped off!</font></i>
	</td>
    <td>
		<select name="vSEND_BDAY_EMAIL">
	        <option value="0"<?php if($SEND_BDAY_EMAIL==0){ echo " selected"; } ?>>Don't send</option>
	        <option value="1"<?php if($SEND_BDAY_EMAIL==1){ echo " selected"; } ?>>Send Greetings</option>
        </select>
	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the time from midnight you want Greetings to be triggered for sending.</b><br />
    	<i>Hint: Positive or negative values allowed (0 = midnight).<br />
		Please note that this setting is taking in consideration the server time, not the user's time, therefore it's possible that the email will be send within a (+-)timezone deviation</i>
	</td>
    <td>
			<input name="vSEND_BDAY_TIME" type="text" size="7" maxlength="2" value="<?php echo $SEND_BDAY_TIME; ?>"> (mins)
    </td>
</tr>
<tr>
    <td><b>How many days the Greetings will be up for sending.</b><br />
    	<i>Hint: If there is no one in the chat nor visiting the chat page within this interval, the Greeting will not be send anymore, as the effect on Celebrated user would not be the same.</i>
	</td>
    <td>
			<input name="vSEND_BDAY_INTVAL" type="text" size="7" maxlength="2" value="<?php echo $SEND_BDAY_INTVAL; ?>"> (days)
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the time from midnight you want Greetings to be triggered for sending.</b><br />
    	<i>Hint: Positive or negative values allowed (0 = midnight).<br />
		Please note that this setting is taking in consideration the server time, not the user's time, therefore it's possible that the email will be send within a (+-)timezone deviation</i>
	</td>
	<td>
		<?php
		$bdays='files/birthday/';
		$bdayfiles = opendir($bdays); #open directory
		echo ("<select name=\"vSEND_BDAY_PATH\">");
			$i = 0;
			while (false !== ($bdayfile = readdir($bdayfiles)))
			{
				if (!eregi("\.html",$bdayfile) && $bdayfile!=='.' && $bdayfile!=='..')
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
	<td><a name="save_settings"></a><input type="submit" name="submit_type" class="error" value="Save Changed Settings"></td>
<?php
if (C_LAST_SAVED_ON || C_LAST_SAVED_BY)
{
	?>
		<div><p><table align=center border=0 cellpadding=0 class=menu style=background:white><tr><td class=success align=right>These settings were last saved <?php if (C_LAST_SAVED_ON) echo("on <span class=error>".$Last_Saved_On."</span> "); ?><?php if (C_LAST_SAVED_BY) echo("by <span class=error>".C_LAST_SAVED_BY."</span> "); ?>!</td></tr></table></div>
	<?php
}
	?>
</form>
</div>
<?php
}
?>