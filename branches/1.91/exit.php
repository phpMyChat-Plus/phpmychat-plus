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
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");

header("Content-Type: text/html; charset=${Charset}");

$Ver1 = ($Ver == "H" ? $Ver : "L");

//---------------------------Begin HighLight command by R.Worley
$highpath = "botfb/" .$U;         // file is in DIR "botfb" and called "usersname"
if (file_exists($highpath)) unlink($highpath); // checks to see if user file exists.
                                     // if it does delete it.
//----------------------------End HighLight Mod

// Added for Bot conversations only in sessions
$botpath = "botfb/" .$U. ".txt";
if (file_exists($botpath)) unlink($botpath); // checks to see if user file exists.

if (COLOR_FILTERS)
{
	if (strcasecmp($C, $COLOR_CA) == 0 || strcasecmp($C, $COLOR_CA1) == 0 || strcasecmp($C, $COLOR_CA2) == 0 || strcasecmp($C, $COLOR_CM) == 0 || strcasecmp($C, $COLOR_CM1) == 0 || strcasecmp($C, $COLOR_CM2) == 0)
	setcookie("CookieColor", "", time());        // delete power color cookie
}

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE>Exit frame</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
// Open the users popup
function users_popup()
{
	window.focus();
	users_popupWin = window.open("users_popup<?php echo($Ver1); ?>.php?<?php echo("From=$From&L=$L"); ?>","users_popup_<?php echo(md5(uniqid(""))); ?>","width=230,height=300,resizable=yes,scrollbars=yes");
	users_popupWin.focus();
}

// Close some popups when the user exits the chat
function close_popups()
{
	with (window.parent)
	{
		if (is_help_popup && !is_help_popup.closed) is_help_popup.close();
		// Smilie Popup mod by Cipprian
		if (is_smilie_popup && !is_smilie_popup.closed) is_smilie_popup.close();
		// Buzzes Popup mod by Cipprian
		if (is_buzz_popup && !is_buzz_popup.closed) is_buzz_popup.close();
		// Private Message Popup mod by Cipprian
		if (is_priv_popup && !is_priv_popup.closed) is_priv_popup.close();
		if (is_send_popup && !is_send_popup.closed) is_send_popup.close();
		if (is_ignored_popup && !is_ignored_popup.closed)
		{
			is_ignored_popup.window.document.forms['IgnForm'].elements['Exit'].value = '1';
			is_ignored_popup.close()
		};
		if (frames['loader'] && !frames['loader'].closed && leaveChat)
		{
			leaveChat = true;
			frames['loader'].close();
		};
	};
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
// -->
</SCRIPT>
</HEAD>

<?php
if (EXIT_LINK_TYPE)
{
?>
<BODY CLASS="frame" onLoad="MM_preloadImages('images/exitdoorRoll.gif')" onUnload="close_popups();">
<CENTER>
<a href="<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&E=".urlencode(stripslashes($R))."&EN=$T"); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/exitdoorRoll.gif',1); window.status='<?php echo(L_EXIT); ?>.'; return true;" title="<?php echo(L_EXIT); ?>" target="_parent"><img name="Image4" border="0" alt="<?php echo(L_EXIT); ?>" src="images/exitdoor.gif"></a>
<?php
}
else
{
?>
<BODY CLASS="frame" onUnload="close_popups();">
<CENTER>
<A HREF="<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&E=".urlencode(stripslashes($R))."&EN=$T"); ?>"  title="Exit Chat" onMouseOver="window.status='<?php echo(L_EXIT); ?>.'; return true;" title="<?php echo(L_EXIT); ?>" TARGET="_parent"><?php echo(L_EXIT); ?></A>
<?php
}
?>
<br />
<?php
if ($FontSize < 10) echo("<br />");
if ($Ver == "H")
{
	?>
	<!-- Display the big + clickable icon used to expand/collapse all rooms // -->
	<A HREF="#" onClick="window.parent.expandAll(); return false" onMouseOver="window.status='<?php echo(L_EXPCOL_ALL); ?>.'; return true;" title="<?php echo(L_EXPCOL_ALL); ?>">
	<IMG NAME="imEx_big" SRC="images/closed_big.gif" WIDTH=13 HEIGHT=13 ALIGN="MIDDLE" BORDER=0 ALT="<?php echo(L_EXPCOL_ALL); ?>"></A>
	&nbsp;
	<?php
}
?>
<A HREF="users_popup<?php echo($Ver1); ?>.php?<?php echo("From=$From&L=$L"); ?>" onClick="users_popup(); return false" onMouseOver="window.status='<?php echo(L_DETACH); ?>.'; return true;" title="<?php echo(L_DETACH); ?>" TARGET="_blank"><IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 ALIGN="MIDDLE" BORDER=0 ALT="<?php echo(L_DETACH); ?>"></A>
<?php
if ($Ver == "H")
{
	?>
	<!-- Display the connection state icon // -->
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<A HREF="#"  onMouseOver="window.status='<?php echo(L_CONN_STATE); ?>.'; return true;" onClick="window.parent.reConnect(); if (window.parent.frames['input'] && window.parent.frames['input'].window.document.forms['MsgForm'].elements['M']) window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].focus(); return false" title="<?php echo(L_CONN_STATE); ?>">
	<IMG NAME="ConState" SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 ALIGN="MIDDLE" BORDER=0 ALT="<?php echo(L_CONN_STATE); ?>"></A>
	<?php
}
?>
</CENTER>
<hr />
</BODY>
</HTML>
<?php
?>