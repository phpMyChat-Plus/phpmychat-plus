<?php

// Get the names and values for vars sent to index.lib.php

if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

if (isset($HTTP_POST_VARS))
{
	while(list($name,$value) = each($HTTP_POST_VARS))
	{
		$$name = $value;
	};
};
require("./localization/".$L."/localized.chat.php");

// Fix a security hole
if (isset($L) && !is_dir('./localization/'.$L)) exit();

require("./lib/release.lib.php");
require("./config/config.lib.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
header("Content-Type: text/html; charset=${Charset}");
$DbAva = new DB;

// it's a URL string, perhaps.

// parse a avatar image from input url
if (isset($url)) {
    $isok = false;
    if (strncasecmp($url,"HTTP://",7) == false) {  // it's a URL string, perhaps.
       // find out if there is a real computer in the URL:
       $isok = true;

    }
    if ($isok) {
      $avatar = $url;
    } else {
      $avamsg = "<br>Error: ".L_ERR_AV."<br>";
    }
}

// for display of all the avatars:
If (empty($From)) $From="avatar.php";

If (!empty($avatar)) {
  $typeit = L_CHG_AV;
 } else {
  $query = "SELECT avatar FROM ".C_REG_TBL." WHERE username='".$User."'";
  $DbAva->query($query);
  list ($avatar) = $DbAva->next_record();
  if ((strncasecmp($avatar,"HTTP://",7) == false) AND (empty($url))) {  // it's a URL string, perhaps.
    $url = $avatar;
  }
  $typeit = "";
}

$DbAva->close();

If (!empty($ORIGAVATAR)) {
    $avatar=$ORIGAVATAR;
    if (strncasecmp($avatar,"HTTP://",7) == false) {  // it's a URL string, perhaps.
      $url = $avatar;
    }
}

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "Arial";
// Text direction
$textDirection = ($Charset == "windows-1256") ? "RTL" : "LTR";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($textDirection); ?>">

<HEAD>
<TITLE>Avatar</TITLE>
<LINK REL="stylesheet" HREF="config/style.css.php?<?php echo("Charset=${Charset}&medium=${FontSize}&FontName=${FontName}"); ?>" TYPE="text/css">
</HEAD>
<body onLoad="if (window.focus) window.focus();" CLASS="frame">
<table rows="3" width="90%" align="center" BORDER="0" CELLPADDING="2" CLASS="table">
<TR>
<TH COLSPAN=2 CLASS="tabtitle">
<center><?php echo(L_TITLE_AV); ?><img border="0"
<?php echo(" width=\"".C_AVA_WIDTH."\" height=\"".C_AVA_HEIGHT."\"");
print(" src=\"$avatar\">");
?>
</TH>
</TR><tr><td>
<H5><center><u><font color="ltblue"><?php echo(L_SEL_NEW_AV); ?></font></u></center></H5>
<?php
$avatarmatch = $avatar;
?>

<form action="<?php echo($From);?>" METHOD="GET" AUTOCOMPLETE="" TARGET="_self">
<font size="-1" color="blue">(example: http://mysite/images/mypic.gif)</font>
<center><font size="-1"><?php echo(L_URL_AV); ?></font><input type="text" name="url" size="30" limit="254" VALUE="<?php echo($url); ?>">&nbsp;<?php echo($avamsg); ?>
<br><font size="-2"><i><?php echo(L_EXPL_AV); ?></i></font></center>
<!-- <input type="hidden" name="avatar" value="<?php echo($avatar); ?>"> -->
<input type="hidden" name="User" value="<?php echo($User); ?>">
<input type="hidden" name="Link" value="1">
<input type="hidden" name="L" value="<?php echo($L); ?>">
<input type="hidden" name="Link" value="<?php echo($Link); ?>">
<input type="hidden" name="pmc_password" value="<?php echo(stripslashes(($HTTP_GET_VARS[pmc_password]))); ?>">
<input type="hidden" name="pmc_username" value="<?php echo($User); ?>">
</form></td></tr><tr><td>
<?php
//
For ($i=0; $i <= C_NUM_AVATARS; $i++) {
  if ($i == 0) {
    $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
  } else {
    $avatar = C_AVA_RELPATH . "avatar".$i.".gif";
  }
  $title=str_replace(C_AVA_RELPATH,"",$avatar);
  $title=str_replace(".gif","",$title);

  ?>
  &nbsp;&nbsp;
  <a href="<?php
  print "$From?avatar=$avatar&ORIGAVATAR=$ORIGAVATAR&User=$User&U=$User&L=$L&FORM_SEND=0&pmc_password=$pmc_password&pmc_username=$User&Link=1\"";
  ?>
  onMouseOver="window.status='<?php echo(L_SEL_NEW_AV); ?>.'; return true;" title="Select <?php echo($title); ?>" target="_self">
  <img src="<?php echo("$avatar");
  echo("\" width=\"".C_AVA_WIDTH."\" height=\"".C_AVA_HEIGHT."\"");
  ?> border=\"<?php
  if ($avatar == $avatarmatch) {
    print "1";
  } else {
    print "0";
  }
 ?>"></a>

<?php
}
?>
</center></td></tr><tr><td>
<?php echo("<br><center><font size=\"-1\">$typeit</font></center>"); ?>
</td>
</tr></table>
<center>
<?php
echo("<a href=\"$From?User=$User&U=$User&L=$L&FORM_SEND=0&LIMIT=$LIMIT&pmc_password=$pmc_password&pmc_username=$User&Link=1\" onMouseOver=\"window.status='Cancel.'; return true;\" ><br>".L_CANCEL."</a>");
?>
</center>
</body>
</html>
