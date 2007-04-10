<?php
// Chat Extras panel by DigiozMultimedia
// This sheet is diplayed when the admin wants to check/view/delete messages from the chat

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

if (!C_CHAT_EXTRAS)
{
?>
<P CLASS=title><A NAME="full"><?php echo(APP_NAME); ?> Chat Extras has been disabled</P>
</center>
<?php
}
else
{
// Credit for this goes to Pete Soheil <webmaster@digioz.com>
$pstr = "admin.php?From=admin.php&What=Body&L=english"."&pmc_username=".$pmc_username."&pmc_password=".$pmc_password."&sheet=6";
$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
mysql_select_db(C_DB_NAME);

$mdel = $_GET['mdel'];
$mord = $_GET['mord'];

if($mord == "")
{
     $sqlT = " ORDER BY `m_time` DESC;";
}
else if($mord == "F")
{
     $sqlT = " ORDER BY `username` ASC;";
}
else if($mord == "R")
{
     $sqlT = " ORDER BY `room` ASC;";
}
else if($mord == "M")
{
     $sqlT = " ORDER BY `message` ASC;";
}
else
{
     $sqlT = " ORDER BY `m_time` DESC;";
}

if($mdel != "")
{
    $sql = "DELETE FROM `c_messages` WHERE m_time='$mdel'";
    mysql_query($sql);
    //echo $mdel;
}

// View List of Current Chat (HIDDEN and VISIBLE) ------------------------------------------------------

$sql = "SELECT * FROM `c_messages`".$sqlT;
$query = mysql_query($sql) or die("Cannot query the database.<br />" . mysql_error());

echo "<center><a href=\"$pstr&mdel=\"><b><font color=white>Refresh Messages</font></b></a></center><br />";
echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" width=\"780\" CLASS=table>";
echo "<tr CLASS=\"thumbIndex\">
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=T\"><b>Del</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=T\"><b>Time Posted:</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=F\"><b>From: To</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=R\"><b>Room</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER height=20 CLASS=tabtitle align=center><a href=\"$pstr&mord=M\"><b>Message</b></a></td>
</tr>";

while($result = mysql_fetch_array($query))
{

$room = stripslashes($result["room"]);
$username = stripslashes($result["username"]);
$address = stripslashes($result["address"]);
if ($address != "") $address = " to <b>".$address."";
$message = stripslashes($result["message"]);
$m_time = stripslashes($result["m_time"]);
$time_posted = date("d-m-y H:i:s", $m_time);
echo "<tr bgcolor=\"#FFFFFF\">
<td align=center><a href=\"$pstr&mord=$mord&mdel=".$m_time."\"><font size=-2 color=red><b>X</b></font></a></td>
<td width=110 align=center>$time_posted</td>
<td width=150><b>$username</b>$address</b>:</td>
<td width=100>$room</td>
<td>$message</td></tr>";
}

echo "</table><br />";
}
?>