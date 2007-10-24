<?php
// Chat Extras panel by DigiozMultimedia
// This sheet is diplayed when the admin wants to check/view/delete messages from the chat

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

if (!C_CHAT_EXTRAS)
{
?>
<P CLASS=title><A NAME="full"><?php echo(APP_NAME." ".A_EXTR_DSBL) ; ?></P>
<?php
}
else
{
// Credit for this goes to Pete Soheil <webmaster@digioz.com>
$pstr = "admin.php?From=admin.php&What=Body&L=".$L."&pmc_username=".$pmc_username."&pmc_password=".$pmc_password."&sheet=6";
$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
mysql_select_db(C_DB_NAME);

$mdel = $_GET['mdel'];
$mord = $_GET['mord'];

if($mord == "")
{
     $sqlT = " ORDER BY m_time DESC;";
}
else if($mord == "F")
{
     $sqlT = " ORDER BY username ASC;";
}
else if($mord == "R")
{
     $sqlT = " ORDER BY room ASC;";
}
else if($mord == "M")
{
     $sqlT = " ORDER BY message ASC;";
}
else
{
     $sqlT = " ORDER BY m_time DESC;";
}

if($mdel != "")
{
    $sql = "DELETE FROM c_messages WHERE m_time='$mdel'";
    mysql_query($sql);
    //echo $mdel;
}

// View List of Current Chat (HIDDEN and VISIBLE) ------------------------------------------------------

$sql = "SELECT * FROM c_messages".$sqlT;
$query = mysql_query($sql) or die("Cannot query the database.<br />" . mysql_error());

echo "<a href=\"$pstr&mdel=\"><b><font color=white>".A_REFRESH_MSG."</font></b></a></center><br />";
echo "<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"780\" CLASS=table>";
echo "<tr CLASS=\"thumbIndex\">
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=T\"><b>".A_MSG_DEL."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=T\"><b>".A_POST_TIME."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=F\"><b>".A_FROM_TO."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=R\"><b>".A_CHTEX_ROOM."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=M\"><b>".A_CHTEX_MSG."</b></a></td>
</tr>";

while($result = mysql_fetch_array($query))
{

$room = stripslashes($result["room"]);
$username = stripslashes($result["username"]);
$address = stripslashes($result["address"]);
if ($address != "") $address = " to <b>".$address."";
$message = stripslashes($result["message"]);
if ($L!="turkish") $message = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$message);
else $message = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'</a>',$message);
$message = eregi_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$message);
$m_time = stripslashes($result["m_time"]);
$time_posted = date("d-m-y H:i:s", $m_time);
echo "<tr bgcolor=\"#FFFFFF\">
<td align=center><a href=\"$pstr&mord=$mord&mdel=".$m_time."\"><font size=-2 color=red><b>x</b></font></a></td>
<td width=110 align=center>$time_posted</td>
<td width=150><b>$username</b>$address</b>:</td>
<td width=100>$room</td>
<td>$message</td></tr>";
}

echo "</table><br />";
}
?>