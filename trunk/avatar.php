<?php

// Get the names and values for vars sent to index.lib.php

if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
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
      $avamsg = "<br />Error: ".L_ERR_AV."<br />";
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo($User." - ".L_AVATAR) ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>
<body onLoad="if (window.focus) window.focus();" CLASS="frame">
<table rows="3" width="90%" align="center" BORDER="0" CELLPADDING="2" CLASS="table">
<TR>
<TH COLSPAN=2 CLASS="tabtitle">
<center><?php echo(L_TITLE_AV); ?><img border="0" <?php echo(" width=\"".C_AVA_WIDTH."\" height=\"".C_AVA_HEIGHT."\"");
print(" src=\"$avatar\">");
?>
</TH>
</TR><tr align=center><td>
<H5><u><font color="ltblue"><?php echo(L_SEL_NEW_AV); ?></font></u></H5>
<?php
$avatarmatch = $avatar;
?>

<form action="<?php echo($From);?>" METHOD="GET" AUTOCOMPLETE="" TARGET="_self">
<font size="2" color="blue">(example: http://mysite/images/mypic.gif)</font>
<center><font size="2"><?php echo(L_URL_AV); ?></font><input type="text" name="url" size="30" limit="254" VALUE="<?php echo($url); ?>">&nbsp;<?php echo($avamsg); ?>
<br /><font size="1"><i><?php echo(L_EXPL_AV); ?></i></font></center>
<!-- <input type="hidden" name="avatar" value="<?php echo($avatar); ?>"> -->
<input type="hidden" name="User" value="<?php echo($User); ?>">
<input type="hidden" name="Link" value="1">
<input type="hidden" name="L" value="<?php echo($L); ?>">
<input type="hidden" name="Link" value="<?php echo($Link); ?>">
<input type="hidden" name="pmc_password" value="<?php echo(stripslashes(($_GET[pmc_password]))); ?>">
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
  $title1=str_replace(C_AVA_RELPATH,"",$avatar);
  $title1=str_replace(".gif","",$title1);

  ?>
  &nbsp;&nbsp;
  <a href="<?php
  print "$From?avatar=$avatar&ORIGAVATAR=$ORIGAVATAR&User=$User&U=$User&L=$L&FORM_SEND=0&pmc_password=$pmc_password&pmc_username=$User&Link=1\"";
  ?>
  onMouseOver="window.status='<?php echo(L_SEL_NEW_AV); ?>.'; return true;" title="Select <?php echo($title1); ?>" target="_self">
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
<?php echo("<br /><center><font size=\"-1\">$typeit</font></center>"); ?>
</td>
</tr></table>
<center>
<?php
echo("<a href=\"$From?User=$User&U=$User&L=$L&FORM_SEND=0&LIMIT=$LIMIT&pmc_password=$pmc_password&pmc_username=$User&Link=1\" onMouseOver=\"window.status='".L_REG_10."'; return true;\" ><br />".L_REG_10."</a>");
?>
</center>
</body>
</html>