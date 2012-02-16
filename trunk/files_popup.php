<?php
// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for post vars
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};


// Fix some security holes
if (!isset($ChatPath)) $ChatPath = "";
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.admin.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/release.lib.php");

// Login stuff
// Var used in the login.lib.php script required below
$MUST_BE_ADMIN = true;
if ($_SESSION["adminlogged"] != "1") require("./lib/login.lib.php");
if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime') && version_compare(PHP_VERSION, '5.3.0') < 0) set_magic_quotes_runtime(0);
else ini_set("magic_quotes_runtime", 0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

// Get the name of the current script;
if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER["SCRIPT_NAME"];
$From = basename($PHP_SELF)."?L=$L&pmc_username=$pmc_username&pmc_password=$PWD_Hash";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<head>
<title><?php echo(L_FILES_TITLE." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME)); ?></title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)) ?>" TYPE="text/css">
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
left: auto;
z-index: 100;
width: 100%; /* precision for Opera */
margin-left:-5px;
}
#menu dl {
float: left;
width: 7.5em;
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
width: 7.5em;
z-index: 100;
}
#menu dl.sav{
float: left;
width: 5em;
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
width: 750px;
/*height: 610px;*/
margin-left:5px;
z-index: 0;
overflow:auto;
}
-->
</style>
</head>

<body class="frame">
<script type="text/javascript" language="javascript">
<!--
window.onload=show;
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
<center>
<?php
$Error = "";
$Success = "";

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	}
};

function files_count($what)
{
	switch ($what)
	{
		case "avatars":
			$file_dir = 'images/avatars/';
		break;
		case "user_avatars":
			$file_dir = 'images/avatars/uploaded';
		break;
		case "smilies":
			$file_dir = 'images/smilies/';
		break;
		case "sounds":
			$file_dir = 'sounds/';
		break;
	};
	$upfiles = opendir($file_dir); #open directory
	$i = 0;
	while (false !== ($upfile = readdir($upfiles)))
	{
#		if (!eregi('\.html',$upfile) && $upfile!=='.' && $upfile!=='..') $i++;
##		if (stripos($upfile,".html") === false && !preg_match("/^[\.]/", $upfile)) $i++;
		if (!preg_match("/(\.html|\.php)$/i",$upfile) && !preg_match("/^[\.]/", $upfile)) $i++;
	}
	closedir($upfiles);
	return $i;
};
function list_files($what)
{
	switch ($what)
	{
		case "avatars":
			$file_dir = 'images/avatars/';
		break;
		case "user_avatars":
			$file_dir = 'images/avatars/uploaded';
		break;
		case "smilies":
			$file_dir = 'images/smilies/';
		break;
		case "sounds":
			$file_dir = 'sounds/';
		break;
	};
	$upfiles = opendir($file_dir); #open directory
	$i = 0;
	while (false !== ($upfile = readdir($upfiles)))
	{
#		if (!eregi('\.html',$upfile) && !eregi('\.php',$upfile) && $upfile!=='.' && $upfile!=='..')
##		if (stripos($upfile,".html") === false && stripos($upfile,".php") === false && !preg_match("/^[\.]/", $upfile))
		if (!preg_match("/(\.html|\.php)$/i",$upfile) && !preg_match("/^[\.]/", $upfile))
		{
			$upsfile[]=$upfile;
	 		$i++;
	 	}
	}
	closedir($upfiles);
	if ($upsfile)
	{
	  	natsort($upsfile);
	}
	return $upsfile;
};

## Used in preview/edit/upload smilies - table 3
function check_codes($input, $array)
{
global $j;
$j = 0;
$error = "";
	while(list($key, $code_to_check) = each($array))
	{
//		$code_to_check_slashes = $code_to_check;
		$code_to_check = stripslashes($code_to_check);
		$pos = false;
		$poss = false;
		$pos = strpos($input, $code_to_check, 0);
		$poss = strpos($code_to_check, $input, 0);

		if (($pos !== false && $pos == 0) || ($poss !== false && $poss == 0))
		{
			$j++;
			$error .= (isset($error) && $error != "") ? " , \"".($key+1).". ".$code_to_check."\"" : "\"".($key+1).". ".$code_to_check."\"";
		}
	}
	reset($array);
	return $error;
};

## Used in preview/edit/upload smilies - table 1 & 2
function EditSmilies(&$ToDisplay,&$Table,&$TblSize,$Target)
{
    $i = 1;
    $k = 0;
	global $Error;
	while(list($key, $prop) = each($Table))
	{
//		$info = @getimagesize("images/smilies/$prop");
//		$image_src_x    = $info[0];
//		$image_src_y    = $info[1];
		if (($i-1)%3 == 0)
		{
			$Str1 .= "</TR>\n\t<TR>\n";
		}
		$cl_codeinex = "error";
		$cl_iminex = "error";
		$sktbl = array_keys($Table);
		if ($i+$k != $key) $Error1 = check_codes($_POST["codeinex_$i"], $sktbl);
		if ($Error1 != "") $Error .= ($i+$k).". ".(isset($_POST["iminex_$i"]) ? $_POST["iminex_$i"] : stripslashes($prop)).": \"".(isset($_POST["codeinex_$i"]) ? $_POST["codeinex_$i"] : stripslashes($key))."\" not acceptable - the beginning code is the same as in other smilies (".$Error1.")!<br />";
		else $cl_codeinex = "success";
		unset($Error1);
		if (!file_exists("images/smilies/".$prop."") || (isset($_POST["iminex_$i"]) && !file_exists("images/smilies/".$_POST["iminex_$i"]."")))
		{
//		reset($sktbl);
//		reset($Table);
		if (isset($_POST["iminex_$i"]) && file_exists("images/smilies/".$_POST["iminex_$i"]."")) $cl_iminex = "success";
			if ($k%2 == 0)
			{
				$Str2 .= "</TR>\n\t<TR>\n";
			}
			$Str2 .= "\t\t<TD ALIGN=\"CENTER\" VALIGN=\"BOTTOM\" NOWRAP=\"NOWRAP\">
			".($i+$k).".&nbsp;Code:&nbsp;<INPUT class=$cl_codeinex TYPE=text SIZE=12 NAME=\"codeinex_$i\" VALUE=\"".(isset($_POST["codeinex_$i"]) ? $_POST["codeinex_$i"] : stripslashes($key))."\" TITLE=\"Smilie Code\"></TD>
			<TD ALIGN=\"CENTER\" VALIGN=\"TOP\">
			<INPUT class=$cl_iminex TYPE=text SIZE=16 NAME=\"iminex_$i\" VALUE=\"".(isset($_POST["iminex_$i"]) ? $_POST["iminex_$i"] : stripslashes($prop))."\" TITLE=\"".($cl_iminex == "error" ? "Missing Image" : "Existing Image")."\"></TD>\n";
			$i--;
			$k++;
		}
		else
		{
			$Str1 .= "\t\t<TD ALIGN=\"CENTER\" VALIGN=\"BOTTOM\" NOWRAP=\"NOWRAP\">
			".($i+$k).".&nbsp;<INPUT TYPE=text SIZE=12 NAME=$key VALUE=".stripslashes($key)." TITLE=\"Smilie Code\"></TD>
			<TD ALIGN=\"CENTER\" VALIGN=\"TOP\">
			<IMG SRC=images/smilies/$prop BORDER=0 ALT=\"".stripslashes($prop)."\" TITLE=\"".stripslashes($prop)."\"></TD>\n";
		}
		if  ($i+$k == $TblSize) {
			if ($Str1 != "") $ToDisplay[] = "<TABLE BORDER=0 CELLPADDING=3 WIDTH=100% CLASS=\"table\" COLSPAN=6><TR>\n<TH ALIGN=CENTER COLSPAN=6 class=success><HR>Defined Smilies<HR></TH>\n".$Str1."</TR></TABLE>\n";
			if ($Str2 != "") $ToDisplay[] = "<TABLE BORDER=0 CELLPADDING=3 WIDTH=100% CLASS=\"table\">\n\t<TR><TH ALIGN=CENTER COLSPAN=4 class=error><HR>Missing files specified as Smilies<HR></TH>\n".$Str2."\t</TR>\n</TABLE>\n";
		$Str1 = "";
		$Str2 = "";
		};
		if ($cl_iminex == "success" && $cl_codeinex == "success")
		{
			$toadd_inex .= addcslashes($_POST["codeinex_$i"],"()[]*")."\t|\t".$_POST["iminex_$i"].",\n";
			$Success .= ($i+$k).". ".$_POST["iminex_$i"]." successfully set as smilie using the code \"".$_POST["codeinex_$i"]."\".<br />";
		}
	 	$i++;
	};
};

?>
<div id="menu">
	<dl class="nav">
		<dt onmouseover="javascript:show();"><a href="<?php echo($From."&type=over#top"); ?>" title="Overview page">Overview</a></dt>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu1');">Public Avatars</dt>
			<dd id="smenu1" onmouseover="javascript:show('smenu1');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="<?php echo($From."&type=pubav_show"); ?>">Preview</a></li>
					<li><a href="<?php echo($From."&type=pubav_upload"); ?>">Upload</a></li>
					<li><a href="<?php echo($From."&type=pubav_edit"); ?>">Edit & Delete</a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu2');">Users' Avatars</dt>
			<dd id="smenu2" onmouseover="javascript:show('smenu2');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="<?php echo($From."&type=userav_show"); ?>">Preview</a></li>
					<li><a href="<?php echo($From."&type=userav_edit"); ?>">Clean-up</a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu3');">Smilies</dt>
			<dd id="smenu3" onmouseover="javascript:show('smenu3');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="<?php echo($From."&type=smilies_show"); ?>">Preview</a></li>
					<li><a href="<?php echo($From."&type=smilies_upload"); ?>">Upload</a></li>
					<li><a href="<?php echo($From."&type=smilies_edit"); ?>">Edit & Delete</a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show('smenu4');">Sounds</dt>
			<dd id="smenu4" onmouseover="javascript:show('smenu4');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="<?php echo($From."&type=buzz_show"); ?>">Preview</a></li>
					<li><a href="<?php echo($From."&type=buzz_upload"); ?>">Upload</a></li>
					<li><a href="<?php echo($From."&type=buzz_edit"); ?>">Edit & Delete</a></li>
				</ul>
			</dd>
	</dl>
	<dl class="nav">
		<dt onmouseover="javascript:show('smenu5');">Navigation</a></dt>
			<dd id="smenu5" onmouseover="javascript:show('smenu5');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#top" title="Scroll top">Top</a></li>
					<li><a href="#bottom" title="Scroll bottom">Bottom</a></li>
				</ul>
			</dd>
	</dl>
	<dl class="sav">
		<dt onmouseover="javascript:show();"><a class="save" href="#save_settings" title="Jump to apply changes">Apply</a></dt>
	</dl>
</div>
<div id="container"><a name="top"></a>
<P class=\"title\"><table align=center border=0 cellpadding=3 class=menu style=background:white><tr><td class=notify2 align=center valign=TOP>Under construction</td></tr></table></P>
<P CLASS=title><?php echo(APP_NAME." - ".(($type == "over" || !isset($type) || $type == "") ? "Uploads Overview" : (strstr($type,"pubav_") ? "Public Avatars" : (strstr($type,"userav_") ? "User Avatars" : (strstr($type,"smilies_") ? "Smilies" : "Buzzes"))))); ?></P>
<?php
if (strstr($type,"pubav_"))
{
	echo "<P>Add general code here</P>";
	if (strstr($type,"show")) echo "<P align=\"left\" class=\"success\">Public Avatars Show";
	elseif (strstr($type,"upload")) echo "<P align=\"left\" class=\"success\">Public Avatars Upload";
	elseif (strstr($type,"edit")) echo "<P align=\"left\" class=\"success\">Public Avatars Edit";
}
elseif (strstr($type,"userav_"))
{
	echo "<P>Add general code here</P>";
	if (strstr($type,"show")) echo "<P align=\"left\" class=\"success\">User Avatars Show";
	elseif (strstr($type,"upload")) echo "<P align=\"left\" class=\"success\">User Avatars Upload";
	elseif (strstr($type,"edit")) echo "<P align=\"left\" class=\"success\">User Avatars Edit";
}
elseif (strstr($type,"smilies_"))
{
	echo "<P>Add general code here</P>";
	if (strstr($type,"show"))
	{
		$toadd = "";
		$sm_contents = "";
		echo "<P align=\"left\" class=\"success\">Smilies Show";
		include("./${ChatPath}lib/smilies.lib.php");
		$Nb = count($SmiliesTbl);
		$ResultTbl = Array();
		EditSmilies($ResultTbl,$SmiliesTbl,$Nb,"uploader");
		$SmiliesFls = list_files("smilies");
		$sfls = array_values($SmiliesFls);
		$stbl = array_values(array_unique($SmiliesTbl));
		$sktbl = array_keys($SmiliesTbl);
		$stbl1 = array_unique($SmiliesTbl);
		$extra_smilies = array_diff($sfls, $stbl);
		$extra_codes = array_diff($stbl1, $sfls);
				if (isset($FORM_SEND) && $FORM_SEND == 3)
				{
//					echo "Lines = ".$_POST['lines']."<br>";
//					echo "Form sent<br>";
//					for ($i = 1; $i <= $_POST['lines']; $i++) {
					for ($i = 1; $i <= $_POST['lines']; $i++) {
//						echo $i." ";
							if (isset($_POST["extra_key_$i"]) && $_POST["extra_key_$i"] != "" && isset($_POST["extra_image_$i"]) && $_POST["extra_image_$i"] != "")
							{
								$slashes_extra_key = addcslashes($_POST["extra_key_$i"],"()[]*");
								$Error1 = check_codes($_POST["extra_key_$i"], $sktbl);
								if ($j > 0 && $j < 5 && $Error1 != "") $Error .= $i.". ".$_POST["extra_image_$i"].": \"".$_POST["extra_key_$i"]."\" not acceptable - the beginning code is the same as in other smilies (".$Error1.")!<br />";
								elseif ($j >= 5) $Error .= $i.". ".$_POST["extra_image_$i"].": \"".$_POST["extra_key_$i"]."\" not acceptable - the beginning the code  is the same as in other smilies (might be too short)!<br />";
								else
								{
								$toadd .= $slashes_extra_key."\t|\t".$_POST["extra_image_$i"].",\n";
								$Success .= $i.". ".$_POST["extra_image_$i"]." successfully set as smilie using the code \"".$_POST["extra_key_$i"]."\".<br />";
								}
								unset($Error1);
								unset($j);
							}
							else
							{
								$Error .= $i.". ".$_POST["extra_image_$i"]." has no code set !<br />";
							}
					}
					if (isset($Error) || isset($Success))
					echo "<TABLE BORDER=0 CELLPADDING=3 WIDTH=100% CLASS=\"table\">
		<TR>
			<TH CLASS=\"tabtitle\">".L_UPLOAD_ERRORS."</TH>
		</TR>";
					if (isset($Error))
					echo "<TD ALIGN=LEFT class=error COLSPAN=6>".$Error."</TD>\n</TR>\n";
					if (isset($Success))
					{
						echo "<TD ALIGN=LEFT class=success COLSPAN=6>".$Success."</TD>\n</TR>\n";
					if (isset($Error) || isset($Success))
					echo "</TABLE>";
						$file_lines = file("./${ChatPath}images/smilies/smilies.php");
						// Loop through our array, show HTML source as HTML source; and line numbers too.
						foreach ($file_lines as $line_num => $line) {
							if (($line == "\r\n" || $line == "\n") && (isset($toadd) && $toadd != "")) $sm_contents .= $toadd."\n";
							else $sm_contents .= $line;
						}
						$smi = fopen ("images/smilies/smilies.php", "wb");
						fwrite ($smi,$sm_contents,strlen($sm_contents));
						fclose ($smi);
					}
				}

//		print_r(var_dump($extra_smilies));
//		print_r(var_dump($extra_codes));
//		unset($SmiliesTbl);
		?>
		<!-- Smilies codes -->
		<TABLE BORDER=0 CELLPADDING=3 WIDTH=100% CLASS="table">
		<TR>
			<TH CLASS="tabtitle"><?php echo(L_HELP_TIT_1); ?></TH>
		</TR>
		<FORM METHOD="POST" AUTOCOMPLETE="" NAME="ExtraSmiliesForm">
		<INPUT TYPE=hidden NAME="FORM_SEND" value="3">
		<?php
		$i = 0;
		$Nb = count($ResultTbl);
		while($i < $Nb)
		{
			if ($i > 0) echo("\t");
			echo("$ResultTbl[$i]");
			$i++;
		};
		unset($ResultTbl);
		if (is_array($extra_smilies) && $extra_smilies != NULL)
		{
?>
		<TABLE BORDER=0 CELLPADDING=3 WIDTH=100% CLASS="table" COLSPAN=6>
			<TR><TH ALIGN=CENTER COLSPAN=6 class=error><HR>Extra Images Available<HR></TH></TR>
			<TR>
<?php
	    $lines = 1;
			while(list($keys, $extra_smilie) = each($extra_smilies))
			{
				if (($lines-1)%3 == 0)
				{
					echo "</TR>\n\t<TR>\n";
				}
				echo "\t\t<TD ALIGN=\"CENTER\" VALIGN=\"BOTTOM\" NOWRAP=\"NOWRAP\"><INPUT TYPE=hidden NAME=\"extra_image_".$lines."\" VALUE=\"".$extra_smilie."\">
				".$lines.".&nbsp;Set Code:&nbsp;<INPUT TYPE=text SIZE=12 NAME=\"extra_key_".$lines."\" VALUE=\"".((isset($_POST["extra_image_".$lines.""]) && $_POST["extra_image_".$lines.""] == $extra_smilie) ? $_POST["extra_key_".$lines.""] : "")."\" TITLE=\"Enter Code for ".$extra_smilie."\"></TD>
				<TD ALIGN=\"CENTER\" VALIGN=\"TOP\" NOWRAP=\"NOWRAP\">
				<IMG SRC=images/smilies/".$extra_smilie." BORDER=0 ALT=\"Available Image\" TITLE=\"Available Image\"></TD>\n";
				$lines++;
			}
			echo "<TD><INPUT TYPE=hidden NAME=\"lines\" VALUE=\"".($lines-1)."\"></TD>";
?>
			</TR>
			<TR>
				<TD VALIGN=CENTER ALIGN=CENTER COLSPAN=6>
					<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET1_6); ?>">
				</TD>
			</TR>
		</TABLE>
		<?php
		}
		?>
		</FORM>
		</TABLE>
		<?php
	}
	elseif (strstr($type,"upload")) echo "<P align=\"left\" class=\"success\">Smilies Upload";
	elseif (strstr($type,"edit")) echo "<P align=\"left\" class=\"success\">Smilies Edit";
}
elseif (strstr($type,"buzz_"))
{
	echo "<P>Add general code here</P>";
	if (strstr($type,"show")) echo "<P align=\"left\" class=\"success\">Buzzes Show";
	elseif (strstr($type,"upload")) echo "<P align=\"left\" class=\"success\">Buzzes Upload";
	elseif (strstr($type,"edit")) echo "<P align=\"left\" class=\"success\">Buzzes Edit";
}
else
{
	echo "<P>Add general code here</P>";
}
?>
</div>
<br /><br />
</center>
<P>
<a name="bottom"></a>
<div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2008<?php echo((date('Y')>"2008") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
</body>
</html>