<?php

// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

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

$UR = L_DEFAULT_TOPIC;
global $R, $toppath, $topgpath;
       $toppath = "botfb/".$R;         // file is in DIR "botfb" and called "roomname"
       $topgpath = "botfb/Global topic" ;         // file is in DIR "botfb" and called "roomname"
				if (file_exists($toppath))                            // checks to see if room file exists.
				{
					$fd = fopen ($toppath, "rb");
	        $UR = fread ($fd, filesize ($toppath));
	        fclose ($fd);
  			}
				elseif (file_exists($topgpath))                            // checks to see if room file exists.
				{
					$fd = fopen ($topgpath, "rb");
	        $UR = fread ($fd, filesize ($topgpath));
	        fclose ($fd);
  			}
$DbLink = new DB;
$Room = stripslashes($R);
if ($UR == "")
{
	$UR = L_DEFAULT_TOPIC_1;
};
	$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$BOT_NAME'");
	list($BR) = $DbLink->next_record();
	$DbLink->close();
	$botcontrol ="botfb/".$R.".txt";
	if ((file_exists($botcontrol) || $BR ==  $R) && C_BOT_PUBLIC)
  {
		$Expl.= BOT_TIPS;
		$Ex.='<b>'.C_BOT_NAME.'</b> - '.$Expl.'';
	}
	elseif($BR != "" && C_BOT_PUBLIC)
	{
		$Expl.= sprintf(BOT_PRIV_TIPS, $BR);
		$Ex.='<b>'.C_BOT_NAME.'</b> - '.$Expl.'';
	}
	elseif(file_exists($botcontrol) && !C_BOT_PUBLIC)
	{
		$Expl.= BOT_PRIVONLY_TIPS;
		$Ex.='<b>'.C_BOT_NAME.'</b> - '.$Expl.'';
	}
	else
	{
		$Ex.='';
	}
		$UR = stripslashes($UR);
#		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$UR))
		if (C_POPUP_LINKS || stripos($UR,'target="_blank"></a>') !== false)
		{
			$UR = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$UR);
		}
		else $UR = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$UR);

		$UR = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$UR);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
$CellAlign = ($Align == "right" ? "RIGHT" : "LEFT");
?>
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
        <TITLE>topic</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<style type="text/css">
<!--
img
{ vertical-align: top; }
-->
</style>
</HEAD>
<BODY class="frame">
	<div>
			<div style="float:<?php echo($CellAlign); ?>;">
			<FONT size="2"><B><?php echo(sprintf(L_BANNER_WELCOME,$Room)."</B> ".L_BANNER_TOPIC); ?></FONT>
<!--			Switch the comment between the two lines below to make the banner scrolable - as for longer topics -->
			<span class="topic"><?php echo ($UR);?></span>
<!--			<MARQUEE><FONT color="yellow"><B><?php //echo ($UR);?></B></FONT></MARQUEE> -->
			<?php
			if ($Ex)
			{
			?>
				<br /><span class="tips"><?php echo ($Ex);?></span>
			<?php
			}
			?>
		</div>
	</div>
</BODY>
</HTML>