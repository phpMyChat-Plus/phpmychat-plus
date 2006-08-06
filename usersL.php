<?php
// Get the names and values for vars sent to this script
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $statusu = $HTTP_COOKIE_VARS["CookieStatus"];
if (isset($HTTP_COOKIE_VARS["CookieUserSort"])) $sort_order = $HTTP_COOKIE_VARS["CookieUserSort"];

// Fix a security hole
if (isset($L) && !is_dir('./localization/'.$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=".$Charset);

// Text direction
$textDirection = ($Charset == "windows-1256") ? "RTL" : "LTR";

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($textDirection); ?>">

<HEAD>
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
	// Open popup for registration stuff
	function reg_popup_room()
	{
		window.focus();
		url = "<?php echo($ChatPath); ?>register.php?L=<?php echo($L); ?>&Link=1";
		param = "width=360,height=640,resizable=yes,scrollbars=yes";
		window.open(url,"register_popup",param);
	}
// -->
</SCRIPT>
<TITLE><?php echo(APP_NAME); ?></TITLE>
<?php
echo('<meta HTTP-EQUIV="Refresh" CONTENT="30; URL=usersL.php?' . ((isset($QUERY_STRING)) ? $QUERY_STRING : getenv('QUERY_STRING')) . '">');
?>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>

<BODY CLASS="frame">
<P>
<?php
// Special formats depending on users status
function special_char($str,$lang,$type)
{
	$tag_open = (($type == 'a' || $type == 'm') ? "<I>":"");
	$tag_close = ($tag_open != "" ? "</I>":"");
	return $tag_open.($lang ? htmlentities($str) : htmlspecialchars($str)).$tag_close;
}

// Special colors for usernames depending on users choise and status
function userColor($type,$colorname)
{
	if (COLOR_FILTERS)
	{
		if (COLOR_NAMES)
		{
			$color = ($colorname != '' ? $colorname:($type == 'a' ? "FF0000":($type == 'm' ? "0000FF":"")));
			return $color;
		}
		else
		{
			$color = ($type == 'a' ? "FF0000":($type == 'm' ? "0000FF":""));
			return $color;
		};
	}
	elseif (COLOR_NAMES)
	{
			$color = ($colorname != '' ? $colorname:"");
			return $color;
	}
	else
	{
			$color = "";
			return $color;
	};
};

// Special classes for usernames depending on users status (other users)
function userClass($type)
{
	if (COLOR_FILTERS)
	{
		if (COLOR_NAMES)
		{
			 $class = "";
		}
		else
		{
			$class = ($type == 'a' ? "Class=\"admin\"":($type == 'm' ? "Class=\"mod\"":"Class=\"user\""));
		}
	}
	else
	{
		$class = "Class=\"user\"";
	}
	return $class;
}

// Used inside javascript links
function special_char2($str,$lang)
{
	return ($lang ? htmlentities(addslashes($str)) : htmlspecialchars(addslashes($str)));
}

$ImgNum = "0";

$DbLink = new DB;

//** Display users list for the current room **
if ($sort_order == "1")
{
if (C_DB_TYPE == 'mysql')
{
// Modified next line by R Dickow for /away command:
  $currentRoomQuery = 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
						. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
						. 'WHERE usr.room = \'' . $R . '\' '
						. 'ORDER BY username';
}
else if (C_DB_TYPE == 'pgsql')
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\' AND usr.username = reg.username '
						. 'UNION '
						. 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time,  NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr '
						. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . $R . '\' '
						. 'ORDER BY username';
}
else
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\' '
						. 'ORDER BY username';
}
}
else
{
if (C_DB_TYPE == 'mysql')
{
// Modified next line by R Dickow for /away command:
  $currentRoomQuery = 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
						. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
						. 'WHERE usr.room = \'' . $R . '\' '
						. 'ORDER BY r_time';
}
else if (C_DB_TYPE == 'pgsql')
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\' AND usr.username = reg.username '
						. 'UNION '
						. 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time,  NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr '
						. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . $R . '\' '
						. 'ORDER BY r_time';
}
else
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\' '
						. 'ORDER BY r_time';
}
}

$DbLink->query($currentRoomQuery);
echo("<B>".htmlspecialchars(stripslashes($R))."</B><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$DbLink->num_rows().")</SPAN><br>\n");
while(list($User, $Latin1, $status, $awaystat, $room_time, $gender, $allowpopup, $colorname, $avatar) = $DbLink->next_record())
{
	if (C_USE_AVATARS)
   {
          if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
          $ava_none = $avatar;
          $ava_width = C_AVA_WIDTH;
          $ava_height = C_AVA_HEIGHT;
   }
	else
	{
	// Put an icon when there is a profile for the user
	if($gender == 0)
		$gender = 'undefined';
	elseif($gender == 1)
		$gender = 'boy';
	elseif($gender == 2)
		$gender = 'girl';
	else
		$gender = 'none';
// Avatar System Start: Inserted:
    $avatar = "images/gender_".$gender.".gif";
		$ava_none = "images/gender_none.gif";
		$ava_width = 14;
		$ava_height = 14;
   }
// Avatar System End.
  // add for /away command modification by R Dickow.
  if ($awaystat == 1) {
  		$Usera = $User;
    	$User = "(".$User.")";
  }
  // end add for /away command
	$title1 = ($User == stripslashes($U) ? L_REG_4 : L_PROFILE);
	if ($status != "u" && $status != "k" && $status != "d" && $status != "b" && $awaystat == 0)
	{
		$Cmd2Send = ($User == stripslashes($U) ? "'profile',''" : "'whois','".special_char2(stripslashes($User),$Latin1)."'");
		echo('<a href="#" onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" onMouseOver="window.status=\''.$title1.'\'; return true;" title="'.$title1.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.$title1.'"></a>&nbsp;');
	}
	elseif ($status != "u" && $status != "k" && $status != "d" && $status != "b" && $awaystat == 1)
	{
		$Cmd2Send = ($User == stripslashes("(".$U.")") ? "'profile',''" : "'whois','".special_char2(stripslashes($Usera),$Latin1)."'");
		echo('<a href="#" onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" onMouseOver="window.status=\''.$title1.'\'; return true;" title="'.$title1.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.$title1.'"></a>&nbsp;');
	}
	else
	{
// Avatar System Start.
    if (C_USE_AVATARS && ($User == stripslashes($U)))
    {
			echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '" onClick="alert(\'You must be registered to change your avatar icon.\'); return false;">&nbsp;');
    }
    else
    {
			echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '">&nbsp;');
    }
// Avatar System End.
	};
	if($User != stripslashes($U))
	{
// R Dickow /away mod alteration:
  if ($awaystat == 0) {
//--------------------------Begin HighLight command by R.Worley
		$Cmd2Send = ($User == stripslashes($U) ? "'high',''" : "'high','".special_char2($User,$Latin1)."'");
			if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopup || $status = "u"))
			{
				if (COLOR_NAMES)
				{
					echo("<A HREF=\"javascript:window.parent.send_popup('/to ".special_char2($User,$Latin1)."');\" ".userClass($status)." title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></A>&nbsp;");
				}
				else
				{
					echo("<A HREF=\"javascript:window.parent.send_popup('/to ".special_char2($User,$Latin1)."');\" ".userClass($status)." title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\">".special_char($User,$Latin1,$status)."</A>&nbsp;");
				}
			}
			else
			{
				if (COLOR_NAMES)
				{
					echo("<A HREF=\"javascript:window.parent.userClick('".special_char2($User,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></A>&nbsp;");
				}
				else
				{
					echo("<A HREF=\"javascript:window.parent.userClick('".special_char2($User,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($User,$Latin1,$status)."</A>&nbsp;");
				}
			}
//------------------------------Begin HighLight command by R.Worley
global $contents ;
$botpath = "botfb/" .$U ;
if (file_exists ($botpath))
	{
		$fd = fopen ($botpath, "rb");
                  $contents = fread ($fd, filesize ($botpath));
                fclose ($fd);
  }
if($contents == $User)
	{
		$highlight = "images/highlightOn.gif";
	}
	else
	{
		$highlight = "images/highlightOff.gif";
	}
//-------------------------------End HighLight Mod
		echo('<a href="#" onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="Highlight/Un-Highlight" onMouseOver="window.status=\'Highlight/Un-Highlight messages sent by this user.\'; return true"><img src="'.$highlight.'" border="0"></a><br>');
  } else {
		$Cmd2Send = ($User == stripslashes($U) ? "'high',''" : "'high','".special_char2($Usera,$Latin1)."'");
		echo("<span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span>&nbsp;");
//------------------------------Begin HighLight command by R.Worley
global $contents ;
$botpath = "botfb/" .$U ;
if (file_exists ($botpath))
	{
		$fd = fopen ($botpath, "rb");
                  $contents = fread ($fd, filesize ($botpath));
                fclose ($fd);
  }
if($contents == $Usera)
	{
		$highlight = "images/highlightOn.gif";
	}
	else
	{
		$highlight = "images/highlightOff.gif";
	}
//-------------------------------End HighLight Mod
		echo('<a href="#" onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="Highlight/Un-Highlight" onMouseOver="window.status=\'Highlight/Un-Highlight messages sent by this user.\'; return true"><img src="'.$highlight.'" border="0"></a><br>');
//---------------------------End HighLight Mod
  }
// end /away mod alteration.
	}
	else
	{
		$Cmd2Send = ($User != stripslashes($U) ? "'high',''" : "'high','".special_char2($User,$Latin1)."'");
		echo("<span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span>&nbsp;");
//------------------------------Begin HighLight command by R.Worley
global $contents ;
$botpath = "botfb/" .$U ;
if (file_exists ($botpath))
	{
		$fd = fopen ($botpath, "rb");
                  $contents = fread ($fd, filesize ($botpath));
                fclose ($fd);
  }
if($contents == $User)
	{
		$highlight = "images/highlightOn.gif";
	}
	else
	{
		$highlight = "images/highlightOff.gif";
	}
		echo('<a href="#" onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="Highlight/Un-Highlight" onMouseOver="window.status=\'Highlight/Un-Highlight messages sent by this user.\'; return true"><img src="'.$highlight.'" border="0"></a><br>');
//-------------------------------End HighLight Mod
	}
}
$DbLink->clean_results();
?>
</P>
<P>
<?php

//** Display users list for other rooms **
$AddPwd2Link = (isset($PWD_Hash) && $PWD_Hash != "") ? "&PWD_Hash=$PWD_Hash" : "";
$DbLink->query("SELECT DISTINCT room FROM ".C_MSG_TBL." WHERE room != '$R' AND type = 1 ORDER BY room");
if($DbLink->num_rows() > 0)
{
	$OthersUsers = new DB;
	while(list($Other) = $DbLink->next_record())
	{
	if ($sort_order == "1")
	{
		if (C_DB_TYPE == 'mysql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
								. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\' '
								. 'ORDER BY username';
		}
		else if (C_DB_TYPE == 'pgsql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\' AND usr.username = reg.username '
								. 'UNION '
								. 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr '
								. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . addslashes($Other) . '\' '
								. 'ORDER BY username';
		}
		else
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\' '
								. 'ORDER BY username';
		}
	}
	else
	{
		if (C_DB_TYPE == 'mysql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
								. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\' '
								. 'ORDER BY username';
		}
		else if (C_DB_TYPE == 'pgsql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\' AND usr.username = reg.username '
								. 'UNION '
								. 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr '
								. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . addslashes($Other) . '\' '
								. 'ORDER BY username';
		}
		else
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\' '
								. 'ORDER BY username';
		}
	}

		$OthersUsers->query($otherRoomsQuery);
		if($OthersUsers->num_rows() > 0)
		{
			$notEmptyRooms[$Other] = 1;
			echo("<A HREF=\"$From?Ver=L&L=$L&U=".urlencode(stripslashes($U))."$AddPwd2Link&R1=".urlencode($Other)."&T=1&D=$D&N=$N&E=".urlencode(stripslashes($R))."&EN=$T\" TARGET=\"_parent\" onMouseOver=\"window.status='Join this room'; return true;\" title=\"Join this room\">".htmlspecialchars($Other)."</A><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$OthersUsers->num_rows().")</SPAN><br>\n");
			while(list($OtherUser, $Latin1, $status, $room_time, $gender, $allowpopup, $colorname, $avatar) = $OthersUsers->next_record())
			{
					if (C_USE_AVATARS)
				   {
				          if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
				          $ava_none = $avatar;
				          $ava_width = C_AVA_WIDTH;
				          $ava_height = C_AVA_HEIGHT;
				   }
					else
					{
					// Put an icon when there is a profile for the user
					if($gender == 0)
						$gender = 'undefined';
					elseif($gender == 1)
						$gender = 'boy';
					elseif($gender == 2)
						$gender = 'girl';
					else
						$gender = 'none';
				// Avatar System Start: Inserted:
				    $avatar = "images/gender_".$gender.".gif";
						$ava_none = "images/gender_none.gif";
						$ava_width = 14;
						$ava_height = 14;
				   }
				// Avatar System End.
				if ($status != "u" && $status != "k" && $status != "d" && $status != "b")
				{
					echo('<a href="#" onClick="window.parent.runCmd(\'whois\',\''.special_char2($OtherUser,$Latin1).'\'); return false;" onMouseOver="window.status=\''.L_PROFILE.'\'; return true;" title="'.L_PROFILE.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.L_PROFILE.'"></a>&nbsp;');
				}
				else
				{
					echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '">&nbsp;');
				};
			if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopup || $status = "u"))
			{
				if (COLOR_NAMES)
				{
					echo("<A HREF=\"javascript:window.parent.send_popup('/wisp ".special_char2($OtherUser,$Latin1)."');\" ".userClass($status)." title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></A><br>\n");
				}
				else
				{
					echo("<A HREF=\"javascript:window.parent.send_popup('/wisp ".special_char2($OtherUser,$Latin1)."');\" ".userClass($status)." title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\">".special_char($OtherUser,$Latin1,$status)."</A><br>\n");
				}
			}
			else
			{
				if (COLOR_NAMES)
				{
					echo("<A HREF=\"javascript:window.parent.userClick('".special_char2($OtherUser,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></A><br>\n");
				}
				else
				{
					echo("<A HREF=\"javascript:window.parent.userClick('".special_char2($OtherUser,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($OtherUser,$Latin1,$status)."</A><br>\n");
				}
			}
			}
			echo("</P><P>");
		}
		$OthersUsers->clean_results();
	}
}
$DbLink->clean_results();
$DbLink->close();


// Display all rest default rooms
for($k = 0; $k < count($DefaultChatRooms); $k++)
{
	$tmpRoom = stripslashes($DefaultChatRooms[$k]);

	// Display this room name when it hadn't been displayed yet
	if (strcasecmp($tmpRoom, stripslashes($R)) != 0 && (!isset($notEmptyRooms) || !isset($notEmptyRooms[$tmpRoom])))
	{
		echo("<A HREF=\"$From?Ver=L&L=$L&U=".urlencode(stripslashes($U))."$AddPwd2Link&R0=".urlencode($tmpRoom)."&T=1&D=$D&N=$N&E=".urlencode(stripslashes($R))."&EN=$T\" TARGET=\"_parent\" onMouseOver=\"window.status='Join this room'; return true;\" title=\"Join this room\">".htmlspecialchars($tmpRoom)."</A><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(0)</SPAN><br>\n");
    };
};
?>
</P>
<?php
if (((C_CHAT_LOGS && C_SHOW_LOGS_USR) || $statusu == "a") || ((C_CHAT_LURKING && C_SHOW_LURK_USR) || $statusu == "a"))
{
?>
	<CENTER><TD><B>Extra Options</B></TD></CENTER>
<?php
if ($statusu == "u")
{
$Cmd2Send = ("'quit','".special_char2(stripslashes($U),$Latin1)." - brb (need to register first :p)'");
?>
<TD valign="bottom">
<A HREF="<?php echo($ChatPath); ?>register.php" onClick="reg_popup_room(); window.parent.runCmd(<?php echo($Cmd2Send); ?>); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_3); ?>.'; return true;" title="<?php echo(L_REG_3); ?>"><?php echo(L_REG_3); ?></A>
</TD><br>
<?php
}
if ((C_CHAT_LOGS && C_SHOW_LOGS_USR) || (!C_SHOW_LOGS_USR && $statusu == "a") || (C_CHAT_LURKING && C_SHOW_LURK_USR) || (!C_SHOW_LOGS_USR && $statusu == "a") || (!C_REQUIRE_REGISTER && $statusu == "u"))
{
?>
	<CENTER><TD><B>Extra Options</B></TD></CENTER>
<?php
if ($statusu == "u"  && !C_REQUIRE_REGISTER)
{
$Cmd2Send = ("'quit','".special_char2(stripslashes($U),$Latin1)." - brb (need to register first :p)'");
?>
<TD valign="bottom">
<A HREF="<?php echo($ChatPath); ?>register.php" onClick="reg_popup_room(); window.parent.runCmd(<?php echo($Cmd2Send); ?>); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_3); ?>.'; return true;" title="<?php echo(L_REG_3); ?>"><?php echo(L_REG_3); ?></A>
</TD><br>
<?php
}
if (C_CHAT_LOGS && (C_SHOW_LOGS_USR || $statusu == "a"))
{
?>
<TD valign="bottom">
<A HREF="<?php echo($ChatPath); ?>logs.php?L=<?php echo($L); ?>" TARGET="_blank" onMouseOver="window.status='<?php echo(L_ARCHIVE); ?>.'; return true;" title="<?php echo(L_ARCHIVE); ?>"><?php echo(L_ARCHIVE); ?></A>
</TD><br>
<?php
}
	if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $statusu == "a"))
	{
		$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
		@mysql_select_db(C_DB_NAME,$handler);
		$timeout = "15";
		$closetime = $time-($timeout);
		$result = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
		$result = @mysql_query("SELECT DISTINCT ip,browser FROM ".C_LRK_TBL."",$handler);
		$online_users = @mysql_numrows($result);
		@mysql_close();
		$lurklink = " <A HREF=\"lurking.php?D=".$D."&L=".$L."\" CLASS=\"ChatLink\" TARGET=\"_blank\" onMouseOver=\"window.status='Open the lurking page.'; return true;\" title=\"Lurking page\">";
		echo("<TD valign=bottom>".$lurklink.$online_users." ".($online_users != 1 ? L_LURKERS : L_LURKER)."</A></TD>");
		$CleanUsrTbl = 1;
	}
}
?>
</BODY>

</HTML>
<?php

?>