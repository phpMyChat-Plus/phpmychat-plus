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
require("./localization/".$L."/localized.topic.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

header("Content-Type: text/html; charset=${Charset}");
$UR = "";
global $toppath;
global $topgpath;
       $toppath = "botfb/" .$R ;         // file is in DIR "botfb" and called "roomname"
       $topgpath = "botfb/Global topic" ;         // file is in DIR "botfb" and called "roomname"
				if (file_exists ($toppath))                            // checks to see if room file exists.
				{
					$fd = fopen ($toppath, "rb");
	        $UR = fread ($fd, filesize ($toppath));
	        fclose ($fd);
  			}
				elseif (file_exists ($topgpath))                            // checks to see if room file exists.
				{
					$fd = fopen ($topgpath, "rb");
	        $UR = fread ($fd, filesize ($topgpath));
	        fclose ($fd);
  			}
$DbLink = new DB;
$Room = stripslashes($R);
if ($UR == "")
{
	if (TOPIC_DIFF == 1)
	{
		switch ($Room)
		{
		default:
			$UR = L_DEFAULT_TOPIC_1;	//topic for the first and all the new created rooms
			break;
		case ROOM2:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM3:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM4:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM5:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM6:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM7:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM8:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		case ROOM9:
			$UR = L_DEFAULT_TOPIC_2;
			break;
		};
	}
	else
	{
		$UR = L_DEFAULT_TOPIC_3;	//same topic for all the rooms
	};
};
	$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$BOT_NAME'");
	list($BR) = $DbLink->next_record();
	$botcontrol ="botfb/$R.txt";
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
		if ($L!="turkish") $UR = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$UR);
		else $UR = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'</a>',$UR);
		$UR = eregi_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$UR);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
$CellAlign = ($Align == "right" ? "RIGHT" : "LEFT");
?>
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
        <TITLE>banner</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<HEAD>
<BODY class="frame">
	<div>
			<div style="float:<?php echo($CellAlign); ?>;">
			<FONT size="2"><I><B><?php echo(sprintf(L_BANNER_WELCOME,$Room)."</B></I> ".L_BANNER_TOPIC); ?>&nbsp;</FONT></div>
			<div style="float:<?php echo($CellAlign); ?>;">
<!--			Switch the comment between the two lines bellow to make the banner scrolable - as for longer topics -->
			<FONT color="yellow"><B><?php echo ($UR);?></B></FONT></div><br />
<!--			<MARQUEE><FONT color="yellow"><B><?php echo ($UR);?></B></FONT></MARQUEE></div> -->
			<?php if ($Ex) {?><div style="float:<?php echo($CellAlign); ?>;"><FONT SIZE=-2 COLOR="40E0D0"><I><?php echo ($Ex);?></I></FONT></div><?php } ?>
		</div>
</BODY>
</HTML>