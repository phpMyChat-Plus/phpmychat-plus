<?php
// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	}
};

// Check if a nick is already in the ignored list
function is_user_ignored($who, $userlist, $Charset)
{
	$users = explode(",", $userlist);
	for (reset($users); $user_name=current($users); next($users))
	{
		if (strcasecmp(mb_convert_case($who,MB_CASE_LOWER,$Charset), mb_convert_case(urldecode($user_name),MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}

// Check for invalid characters in the name of the user to be ignored
#if ($Cmd[4] != "" && ereg("[\ \']", stripslashes($Cmd[4])))
if ($Cmd[4] != "" && preg_match("/[ |,|'|\\\\]/", $Cmd[4]))
{
	$Error = L_ERR_USR_16;
}
elseif ($Cmd[2] == "")
{
	// Launch the ignored popup
	if ($Cmd[4] == "")
	{
		$IsCommand = true;
		$IsPopup = true;
		$Tmp = (isset($Ign) && $Ign != "") ? "&Ign=".urlencode(stripslashes($Ign)) : "";

		// Define a table that contains JavaScript instructions to be ran
		$jsTbl = array(
			"<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">",
			"<!--",
			"if (window.parent.is_ignored_popup && !window.parent.is_ignored_popup.closed)",
			"{",
			"\twindow.parent.is_ignored_popup.focus();",
			"}",
			"else",
			"{",
			"\twindow.parent.is_ignored_popup = window.open(\"ignore_popup.php?L=$L$Tmp\",\"ignore_popup\",\"width=180,height=300,scrollbars=yes,resizable=yes\");",
			"}",
			"// -->",
			"</SCRIPT>"
		);
	}
	// Add user(s) to ignored list
	else
	{
		if (!isset($Ign)) $Ign="";
		$Ignore = explode (",", stripslashes($Cmd[4]));
		for ($i = 0; $i < count($Ignore); $i++)
		{
			$Ignore[$i] = trim($Ignore[$i]);
			if ($Ignore[$i] == "") continue;
			if ($Ignore[$i] != "" && $Ignore[$i] != stripslashes($U) && !is_user_ignored($Ignore[$i], $Ign, $Charset))
			{
				$tmp = urlencode($Ignore[$i]);
				$IsCommand = true;
				$Ign .= $Ign != "" ? ",".$tmp : $tmp;
				$RefreshMessages = true;
			}
		}
	}
}
else
{
	// Unset ignored list
	if ($Cmd[4] == "")
	{
		$IsCommand = true;
		if (isset($Ign) && $Ign != "")
		{
			$RefreshMessages = true;
			unset($Ign);
		}
	}
	// Remove user(s) from ignored list
	else
	{
		$IsCommand = true;
		if (isset($Ign) && $Ign != "")
		{
			$Ignore = explode (",", stripslashes($Cmd[4]));
			for ($i = 0; $i < count($Ignore); $i++)
			{
				$Ignore[$i] = trim($Ignore[$i]);
				if ($Ignore[$i] == "") continue;
				if ($Ignore[$i] != "" && is_user_ignored($Ignore[$i], $Ign, $Charset))
				{
					$users = explode(",", $Ign);
					$Ign = "";
					for (reset($users); $user_name=current($users); next($users))
					{
						if ($Ignore[$i] != urldecode($user_name)) $Ign .= ($Ign != "")? ",".$user_name : $user_name;
					}
					if ($Ign == "") unset($Ign);
					$RefreshMessages = true;
				}
			}
		}
	}
}

if ($IsCommand) $First = 1;		// Will completly reload the loader script
if (!$IsPopup && $IsCommand)
{
	$Tmp = (isset($Ign) && $Ign != "") ? "&Ign=".urlencode(stripslashes($Ign)) : "";

	// Define a table that contains JavaScript instructions to be run
	$jsTbl = array(
		"<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">",
		"<!--",
		"// Refresh the ignored popup",
		"with (parent)",
		"{",
		"\tif (is_ignored_popup != null && !is_ignored_popup.closed)",
		"\t{",
		"\t\tis_ignored_popup.document.forms['IgnForm'].elements['Refresh'].value = 1;",
		"\t\tis_ignored_popup.location = \"ignore_popup.php?L=$L$Tmp\";",
		"\t};",
		"};",
		"// -->",
		"</SCRIPT>"
	);
};

?>