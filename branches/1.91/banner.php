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
			$UR='This is a default topic for first and new created rooms. Edit banner.php to change it!';	//topic for the first and all the new created rooms
			break;
		case ROOM2:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM3:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM4:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM5:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM6:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM7:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM8:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		case ROOM9:
			$UR="This is a default topic for - ".$Room." - room. Edit banner.php to change it!";
			break;
		};
	}
	else
	{
		$UR.='This is a default topic. Edit banner.php to change it!';	//same topic for all the rooms
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
			<FONT size="2"><I><B>Welcome to <?php echo ($Room) ?>!</B> Topic:&nbsp;</I></FONT></div>
			<div style="float:<?php echo($CellAlign); ?>;">
			<MARQUEE style=""><FONT color="yellow"><B><?php echo ($UR);?></B></FONT></MARQUEE></div>
			<?php if ($Ex) {?><div style="float:<?php echo($CellAlign); ?>;"><FONT SIZE=-2 COLOR="40E0D0"><I><?php echo ($Ex);?></I></FONT></div><?php } ?>
		</div>
</BODY>
</HTML>