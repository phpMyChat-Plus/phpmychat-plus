<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

if (isset($_COOKIE["CookieUserSort"])) $sort_order = $_COOKIE["CookieUserSort"];

// Fix a security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();

require("./${ChatPath}/lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}/lib/clean.lib.php");


	if ($Private)
	{
		if ($sort_order == "1")	$ordquery = "username";
		else $ordquery = "r_time";
		// Ghost Control mod by Ciprian
		$Hide = (C_HIDE_ADMINS && C_HIDE_MODERS) ? "WHERE ((status != 'a' AND status != 't') OR email = 'bot@bot.com') AND status != 'm'" : (C_HIDE_ADMINS ? "WHERE ((status != 'a' AND status != 't') OR email = 'bot@bot.com')" : (C_HIDE_MODERS ? "WHERE status !='m'" : ""));
		$query = "SELECT DISTINCT username, latin1, room, r_time FROM ".C_USR_TBL." ORDER BY ".$ordquery."";
	}
	else
	{
		if ($sort_order == "1")	$ordquery = "username";
		else $ordquery = "r_time";
		// Ghost Control mod by Ciprian
		$Hide = (C_HIDE_ADMINS && C_HIDE_MODERS) ? "AND ((u.status != 'a' AND u.status != 't') OR u.email = 'bot@bot.com') AND u.status != 'm'" : (C_HIDE_ADMINS ? "AND ((u.status != 'a' AND u.status != 't') OR u.email = 'bot@bot.com')" : (C_HIDE_MODERS ? "AND u.status !='m'" : ""));
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1 ".$Hide." ORDER BY ".$ordquery."";
	}
	$DbLink = new DB;
	$DbLink->query($query);
	$NbUsers = $DbLink->num_rows();

function display_connected($Private,$Full,$NU,$String1,$String2,$DbLink)
{
	$List = "";

	if ($NU > 0)
	{
		if ($Full)
		{
			echo($String1."<br />");
			while(list($User,$Latin1,$Room,$RTime) = $DbLink->next_record())
			{
				if ($Latin1) $User = htmlentities($User);
				$RTime = date("d-M, H:i:s", $RTime + C_TMZ_OFFSET*60*60);
				$List .= ($List == "" ? "<tr><td nowrap=\"nowrap\">".$User."</td><td nowrap=\"nowrap\">".$Room."</td><td nowrap=\"nowrap\"> ".L_LURKING_4." ".$RTime."</td></tr>" : "<tr><td nowrap=\"nowrap\">".$User."</td><td nowrap=\"nowrap\">".$Room."</td><td align=center nowrap=\"nowrap\"> ".L_LURKING_4." ".$RTime."");
			}
			echo($List);
		}
		else
		{
			echo($String1);
		}
	}
	else
	{
		echo($String2);
	}

	$DbLink->clean_results();
	$DbLink->close();
}
?>