<?php

//-------------------------------------------------------------
//  user-online 1.1 || http://www.phpwelt.de
//  Copyright (C) 2000 Mike Rübsamen <mtr@phpwelt.de>
//  This Software is distributed under the GNU General Public
//  License.
//--------------------------------------------------------------

//Please change the path of the include file, if necessary
include("config/config.lib.php");

//DO NOT CHANGE ANYTHING BELOW!!!

//Declaration of Parameters
$time = time();
$ip = getenv(REMOTE_ADDR);
$browser = getenv(HTTP_USER_AGENT);

//Timeout to delete Users in Seconds
$closetime = $time-15;

//Database-Connect
$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
@mysql_select_db(C_DB_NAME,$handler);

//Database-Commands
$insert = @mysql_query("INSERT INTO ".C_LRK_TBL." VALUES ('$time','$ip','$browser','$file','$U')",$handler);
$delete = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
$result = @mysql_query("SELECT DISTINCT ip,browser,username FROM ".C_LRK_TBL." ORDER BY ip ASC",$handler);
$online_users = @mysql_numrows($result);
@mysql_close();

?>
<hr /><table border=1 cellspacing=1 cellpadding=1 class=table>
<tr><td><?php echo(L_CUR_5)?></td>
	<td align="center" style="vertical-align:middle">
	<font size="4" color="#6666ff"><b>&nbsp <?php echo($online_users); ?> &nbsp</font></b></td>
</tr></table>
<?php
if ($status == "a" || $status == "t")
{
?>
<table border=1 width=98% cellspacing=0 cellpadding=1 class="table">
<?php
while($data = @mysql_fetch_array($result))
{
	if ($data[username] == "Guest") $data[username] = L_LURKING_5;
	echo("<tr><td>".$data[username]."</td>");
	echo("<td>".$data[ip]."</td>");
	echo("<td>".$data[browser]."</td></tr>");
}
?>
</table>
<?php
}
?>
