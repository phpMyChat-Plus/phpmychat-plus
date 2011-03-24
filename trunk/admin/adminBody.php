<?php

// Ensure a moderator have such a status for the current room
function room_in($what, $in, $Charset)
{
	$rooms = (is_array($in) ? $in : explode(",",$in));
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	};
	return false;
};

// Transform mysql timestamp to UNIX timestamp format
function mysql_to_ts($mysql_time)
{
	if (!preg_match('/^(\\d{4})-(\\d{2})-(\\d{2}) (\\d{2}):(\\d{2}):(\\d{2})$/', $mysql_time, $matches))
	{
		return NULL;
	}
	return mktime($matches[4], $matches[5], $matches[6], $matches[2], $matches[3], $matches[1]);
}

if (!function_exists("utf_conv"))
{
	function utf_conv($iso,$Charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};

$DbLink = new DB;

// Optimize MySQL table when the script run for the first time
if (isset($First))
{
	$DbLink->optimize(C_BAN_TBL);
	$DbLink->optimize(C_CFG_TBL);
	$DbLink->optimize(C_LRK_TBL);
	$DbLink->optimize(C_MSG_TBL);
	$DbLink->optimize(C_REG_TBL);
	$DbLink->optimize(C_STS_TBL);
	$DbLink->optimize(C_USR_TBL);
#};
#if (isset($Repair))
#{
	$DbLink->repair(C_BAN_TBL);
	$DbLink->repair(C_CFG_TBL);
	$DbLink->repair(C_LRK_TBL);
	$DbLink->repair(C_MSG_TBL);
	$DbLink->repair(C_REG_TBL);
	$DbLink->repair(C_STS_TBL);
	$DbLink->repair(C_USR_TBL);
};

if ($sheet < 3 || strstr($sheet,"a"))
{
	// Inverse sort order
	if (!isset($sortBy)) $sortBy = "username";
	if (!isset($sortOrder)) $sortOrder = "ASC";
	$New_sortOrder = ($sortOrder == "ASC") ? "DESC" : "ASC";

	// Define the lower bound to be displayed for registered users table
	if (!isset($startReg)) $startReg = "0";
};

// Remove some var from the url query
$URLQueryBody = "What=Body&L=$L&sheet=$sheet";
$URLQueryBody_Links = "From=$From&".$URLQueryBody."&pmc_username=".urlencode($pmc_username)."&pmc_password=$pmc_password";
if ($sheet < 3 || strstr($sheet,"a"))
{
		// Define the lower bound to be displayed for registered users table
		$URLQueryBody_SortLinks = $URLQueryBody_Links."&startReg=$startReg";
		$URLQueryBody_MoveLinks = $URLQueryBody_Links."&sortBy=$sortBy&sortOrder=$sortOrder";
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(L_REG_35." - ".(C_CHAT_NAME != "" ? C_CHAT_NAME." - ".APP_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<?php
if ($sheet < 3 || strstr($sheet,"a"))
{
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
	<!--
	if (document.layers)
	{
		window.parent.sortOrder = "<?php echo((isset($sortOrder) && $sortOrder != "") ? "&sortOrder=$sortOrder" : ""); ?>";
		window.parent.sortBy = "<?php echo((isset($sortBy) && $sortBy != "") ? "&sortBy=$sortBy" : ""); ?>";
		<?php
		if(!strstr($sheet,"a"))
		{
		?>
			window.parent.startReg = "<?php echo((isset($startReg) && $startReg != "") ? "&startReg=$startReg" : ""); ?>";
		<?php
		}
		?>
	};
	// -->
	</SCRIPT>
<?php
};
?>
</HEAD>

<BODY>
<CENTER>
<?php
require("./admin/admin${sheet}.php");
?>
</CENTER>
</BODY>

</HTML>
<?php
$DbLink->close();
exit();
?>