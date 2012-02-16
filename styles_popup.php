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

/*
// Login stuff
// Var used in the login.lib.php script required below
$MUST_BE_ADMIN = true;
if ($_SESSION["adminlogged"] != "1") require("./lib/login.lib.php");
if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.
*/

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
//$From = basename($PHP_SELF)."?L=$L&pmc_username=$pmc_username&pmc_password=$PWD_Hash";
$From = basename($PHP_SELF)."?L=$L";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<head>
<title><?php echo(L_SKINS_TITLE." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME)); ?></title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)) ?>" TYPE="text/css">
</head>

<body class="frame">
<?php
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

function styles_count()
{
	$skins = 'skins/';
	$skinfiles = opendir($skins); #open directory
	$i = 0;
	while (false !== ($skinfile = readdir($skinfiles)))
	{
#		if (!eregi('\.html',$skinfile) && !eregi('\.css',$skinfile) && !is_dir($skinfile) && $skinfile!=='.' && $skinfile!=='..')
		if (stripos($skinfile,".html") === false && stripos($skinfile,".css") === false && !is_dir($skinfile) && !preg_match("/^[\.]/", $skinfile))
		{
			$i++;
		}
	}
	closedir($skinfiles);
	return $i;
};

function styles_files()
{
	$skins = 'skins/';
	$skinfiles = opendir($skins); #open directory
	$i = 0;
	while (false !== ($skinfile = readdir($skinfiles)))
	{
#		if (!eregi('\.html',$skinfile) && !eregi('\.css',$skinfile) && !is_dir($skinfile) && $skinfile!=='.' && $skinfile!=='..')
##		if (stripos($skinfile,".html") === false && stripos($skinfile,".css") === false && !is_dir($skinfile) && !preg_match("/^[\.]/", $skinfile))
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
	return $skinsfile;
};

function skin_preview($startStyle)
{
	global $L;
	$skinsfile = styles_files();
	$j = 1;
	$what = "";
	foreach ($skinsfile as $skinname)
	{
		$skinno = "";
		$skinno = str_replace("style","",$skinname);
		$skinno = str_replace(".php","",$skinno);
		if (($skinno >= $startStyle) && ($skinno < ($startStyle+4)))
		{
			if ($startStyle % 2 != 0)
			{
				if($j & 1) $what .= '<tr>';
			}
			elseif($j % 2 == 0) $what .= '<tr>';
			$what .= "<td><iframe name=\"Skin".$skinno."\" id=\"Skin".$skinno."\" width=\"360\" height=\"300\" scroll=\"yes\" frameborder=\"yes\" src=\"styles_preview.php?L=".$L."&no=".$skinno."\"></iframe></td>";
			if ($startStyle % 2 != 0)
			{
				if($j % 2 == 0) $what .= '</tr>';
			}
			elseif($j & 1) $what .= '<tr>';
		}
		$j++;
	}
	unset($skinsfile);
	return $what;
};

// Horizontal alignement for cells topic and gifs names

if ($Align == "right")	// Arabic
{
	$CellAlign		= "RIGHT";
	$InvCellAlign	= "LEFT";
	$BeginGif		= "end.gif";
	$DownGif		= "up.gif";
	$EndGif		= "begin.gif";
	$UpGif		= "down.gif";
}
else
{
	$CellAlign		= "LEFT";
	$InvCellAlign	= "RIGHT";
	$BeginGif		= "begin.gif";
	$DownGif		= "down.gif";
	$EndGif		= "end.gif";
	$UpGif		= "up.gif";
};
$styles_count = styles_count();
if (!is_numeric($styles_count) || !$styles_count > 0)
{
	$styles_count = "No";
}
else
{
	if (!$startStyle || !(is_numeric($startStyle)) || $startStyle <= 0) $startStyle = 1;
	$startStyleBegin = $startStyle;
	$startStyleNext = $startStyle + 3;
	$startStyleText = sprintf(L_SKINS_TITLE1,$startStyleBegin,$startStyleNext);
};
?>

<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
// Function to dinamically switch pages
function jump_Page()
{
valJump=(document.PageSelect.PageJump.options[document.PageSelect.PageJump.selectedIndex].text-1) * 4 + 1;
document.location = '<?php echo($From."&startStyle="); ?>'+valJump;
}
// -->
</SCRIPT>
<center>
<P CLASS=title><?php echo(APP_NAME." - ".$startStyleText); ?>
<?php
if (!$startStyle || !(is_numeric($startStyle)) || $startStyle <= 0) $startStyle = 1;
if (is_numeric($styles_count) && $styles_count > 0)
{
?>
	<TABLE CLASS=title BORDER=0 CELLPADDING=5 CELLSPACING=10>
	<?php echo (skin_preview($startStyle)); ?>
	</TABLE>
		<!-- Navigation cells at the footer -->
		<FORM name="PageSelect">
		<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=0 CLASS="tabtitle" WIDTH=100%>
		<TR>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=70 HEIGHT=20 CLASS=tabtitle>
			<?php
		$lastPage_startStyle = (floor(($styles_count - 1) / 4) * 4) + 1;
		$PagesCount = ceil($styles_count / 4);
		$PageNum = ceil(($startStyle + 1) / 4);
			if ($startStyle > 1)
			{
				$downStyle = $startStyle - 4;
				if ($downStyle <= 0) $downStyle = 1;
				?>
				&nbsp;<A HREF="<?php echo($From."&startStyle=1"); ?>"><IMG SRC="images/admin/<?php echo($BeginGif); ?>" HEIGHT=20 WIDTH=21 BORDER=0></A>
				&nbsp;&nbsp;&nbsp;<A HREF="<?php echo($From."&startStyle=$downStyle"); ?>"><IMG SRC="images/admin/<?php echo($DownGif); ?>" HEIGHT=20 WIDTH=20 BORDER=0></A>
				<?php
			}
			else
			{
				echo("&nbsp");
			};
			?>
			</TD>
			<TD ALIGN=CENTER VALIGN=CENTER HEIGHT=20 CLASS=tabtitle>
				<SPAN CLASS="small">
				<?php
					echo(sprintf(A_PAGE_CNT,$PageNum,$PagesCount)."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;$styles_count ".mb_convert_case(L_SKINS_AV,MB_CASE_LOWER,$Charset));
				?>
				</SPAN>
			</TD>
			<?php
			if ($PagesCount > 1)
			{
?>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=30 HEIGHT=20 CLASS=tabtitle>
					<select name="PageJump" onChange="jump_Page()">
					<?php
					$i=1;
					while ($i <= $PagesCount)
					{
						echo "<option value=\"$i\"";
						if ($i==$PageNum) echo " selected";
						echo ">$i</option>";
			        $i++;
					}
					?>
			    </select>
			</TD>
<?php
			}
			?>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=70 HEIGHT=20 CLASS=tabtitle>
<?php
			if ($startStyle < $lastPage_startStyle)
			{
				$upStyle = $startStyle + 4;
				?>
				&nbsp;<A HREF="<?php echo($From."&startStyle=$upStyle"); ?>"><IMG SRC="images/admin/<?php echo($UpGif); ?>" HEIGHT=20 WIDTH=20 BORDER=0></A>
				&nbsp;&nbsp;&nbsp;<A HREF="<?php echo($From."&startStyle=$lastPage_startStyle"); ?>"><IMG SRC="images/admin/<?php echo($EndGif); ?>" HEIGHT=20 WIDTH=21 BORDER=0></A>
				<?php
			}
			else
			{
				echo("&nbsp");
			};
			?>
			</TD>
		</TR>
		</TABLE>
		</FORM>
<?php
}
else
{
?>
<TABLE ALIGN=CENTER BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<TD ALIGN=CENTER CLASS=error><?php echo(L_SKINS_NONAV); ?></TD>
</TR>
</TABLE>
<?php
};
?>
<div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2008<?php echo((date('Y')>"2008") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
</center>
</body>
</html>