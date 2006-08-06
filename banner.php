<?php

// Get the names and values for vars sent by index.lib.php
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir('./localization/'.$L)) exit();

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

header("Content-Type: text/html; charset=${Charset}");
$DbLink = new DB;
$DbLink->query("SELECT m_time, message FROM ".C_MSG_TBL." WHERE room = '$R' AND username='SYS topic' ORDER BY m_time DESC LIMIT 1");
list($Ti, $UR) = $DbLink->next_record();
if ($UR=="")
{
$Room = stripslashes($R);
if (strcmp(stripslashes($R), ROOM8) == 1)
{
	if (strcasecmp(stripslashes($R), ROOM8) == 0)
	{
		if ($R != ucfirst(ROOM8)) $Room = ucfirst($R);
		elseif (ucfirst(stripslashes($R)) == ROOM8) $Room = ROOM8;
		else $Room = strtolower($R);
	}
}
if (strcasecmp(ucfirst(stripslashes($R)), ROOM8) == 0) $Room = ROOM8;
if (strcmp(stripslashes($R), ROOM9) == 1)
{
	if (strcasecmp(stripslashes($R), ROOM9) == 0)
	{
		if ($R != ucfirst(ROOM9)) $Room = ucfirst($R);
		else $Room = strtolower($R);
	}
}
if (strcasecmp(ucfirst(stripslashes($R)), ROOM9) == 0) $Room = ROOM9;
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
	$botcontrol ="botfb/$Room.txt";
	if ((file_exists($botcontrol) || $BR ==  $Room) && C_BOT_PUBLIC)
  {
		$Expl.= BOT_TIPS;
		$Ex.='<BR><FONT SIZE=-2 COLOR="40E0D0"><I><b>'.C_BOT_NAME.'</b> - '.$Expl.'</I></FONT>';
	}
	elseif($BR != "" && C_BOT_PUBLIC)
	{
		$Expl.= BOT_PRIV_TIPS;
		$Ex.='<BR><FONT SIZE=-2 COLOR="40E0D0"><I><b>'.C_BOT_NAME.'</b> - '.$Expl.'</I></FONT>';
	}
	elseif(file_exists($botcontrol) && !C_BOT_PUBLIC)
	{
		$Expl.= BOT_PRIVONLY_TIPS;
		$Ex.='<BR><FONT SIZE=-2 COLOR="40E0D0"><I><b>'.C_BOT_NAME.'</b> - '.$Expl.'</I></FONT>';
	}
	else
	{
		$Ex.='';
	}
	if (C_USE_SMILIES)
	{
		include("./lib/smilies.lib.php");
		Check4Smilies($UR,$SmiliesTbl);
		unset($SmiliesTbl);
	};
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">
<HEAD>
        <TITLE>Banner</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<HEAD>
<BODY class="frame">
        <FONT size="2"><I><B>Welcome to <?php echo (stripslashes($R)) ?>!</B> Topic: <font color=yellow><B><?php echo ($UR);?></B></font></I><?php echo ($Ex);?></FONT>
</BODY>
</HTML>
