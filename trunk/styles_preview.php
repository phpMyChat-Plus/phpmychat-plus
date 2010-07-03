<?php
// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};
include_once("./skins/style$no.php");
require_once("./${ChatPath}localization/".$L."/localized.chat.php");
?>
<html>
<head>
<title><?php echo($no." - ".$SKIN_NAME); ?></title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<LINK REL="stylesheet" HREF="skins/style<?php echo($no.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)) ?>" TYPE="text/css">
</head>

<body class="frame"><center>
	<P class="title" align=center>
		<?php echo($no." - ".$SKIN_NAME); ?>
	<TABLE align=center BORDER=0 CELLPADDING=3 CLASS=<?php echo(($no != 7 && $no != 11) ? "table" : "frame"); ?>>
		<TH COLSPAN=2 CLASS="tabtitle">Table Sample</TH>
			<tr>
				<td width=50% CLASS="tabtitle" align=center>Messages frame</td>
				<td CLASS="tabtitle" align=center>Other frames</td>
			</tr>
			<tr>
				<td width=50% class="mesframePreview" class="msg">Default message sample</td>
				<td class="framePreview"><a href=#>Link sample</a></td>
			</tr>
			<tr>
				<td class="mesframePreview" class="msg2">Highlighted text sample</td>
				<td class="framePreview"><a href=#>Room name sample</a></td>
			</tr>
			<tr>
				<td class="mesframePreview" class="msg"><a href=# class="sender">User sample</a></td>
				<td class="framePreview"><a href=# class="sender">Sender sample</a></td>
			</tr>
			<tr>
				<td class="mesframePreview" class="notify">Notify sample</td>
				<td class="framePreview"><div class=success>Success sample</div></td>
			</tr>
			<tr>
				<td class="mesframePreview" class="notify2">Announcement sample</td>
				<td class="framePreview"><div class="small">Small text sample</div></td>
			</tr>
</table>
<div align="right" class="small"><span style="font-size: 5pt">&nbsp;</span></div>
			<INPUT TYPE="text" SIZE="30" MAXLENGTH="30" VALUE="Input Box sample"><br />
			<SELECT>
				<OPTION VALUE="" selected>Select box sample</OPTION>
				<OPTION VALUE="">Value 1 sample</OPTION>
				<OPTION VALUE="">Value 2 sample</OPTION>
				</SELECT><br />
			<INPUT TYPE="submit" VALUE="Button sample">
<br /><div align="right" class="small"><?php echo(sprintf(L_SKINS_COPY,$SKIN_DATE,$SKIN_BY)); ?></div>
<P>
</center>
</body>
</html>