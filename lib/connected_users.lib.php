<?php
// Get the names and values for vars sent to this script
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

if (isset($HTTP_COOKIE_VARS["CookieUserSort"])) $sort_order = $HTTP_COOKIE_VARS["CookieUserSort"];

// Fix a security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();

require("./${ChatPath}/lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}/lib/clean.lib.php");

	if ($Private)
	{
		$query = "SELECT DISTINCT username, latin1, room, r_time FROM ".C_USR_TBL;
	}
	else
	{
		if ($sort_order == "1")	$ordquery = "username";
		else $ordquery = "r_time";
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1 ORDER BY ".$ordquery."";
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
			echo($String1."<br>");
			while(list($User,$Latin1,$Room,$RTime) = $DbLink->next_record())
			{
				if ($Latin1) $User = htmlentities($User);
				$RTime = date("d-M, H:i:s", $RTime + C_TMZ_OFFSET*60*60);
				$List .= ($List == "" ? "<tr><td nowrap>".$User."</td><td nowrap>".$Room."</td><td nowrap>joined on ".$RTime."</td></tr>" : "<tr><td nowrap>".$User."</td><td nowrap>".$Room."</td><td align=center nowrap>joined on ".$RTime."");
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

//		display_connected($ShowPrivate,$DisplayUsers,$NbUsers,($NbUsers != 1 ? $NbUsers." ".NB_USERS_IN : USERS_LOGIN),NO_USER,$DbLink);

?>