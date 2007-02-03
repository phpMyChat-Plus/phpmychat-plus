<?php

// Check if a nick is already in the ignored list
function is_user_ignored($who, $userlist)
{
	$users = explode(",", $userlist);
	for (reset($users); $user_name=current($users); next($users))
	{
		if (strcasecmp($who, urldecode($user_name)) == 0) return true;
	}
	return false;
}

// Check for invalid characters in the name of the user to be ignored
if ($Cmd[3] != "" && ereg("[\ ]", stripslashes($Cmd[3])))
{
	$Error = L_ERR_USR_16;
}
elseif ($Cmd[1] == "")
{
	// Launch the ignored popup
	if ($Cmd[3] == "")
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
		$Ignore = explode (",", stripslashes($Cmd[3]));
		for ($i = 0; $i < count($Ignore); $i++)
		{
			$Ignore[$i] = trim($Ignore[$i]);
			if ($Ignore[$i] == "") continue;
			if ($Ignore[$i] != "" && $Ignore[$i] != stripslashes($U) && !is_user_ignored($Ignore[$i], $Ign))
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
	if ($Cmd[3] == "")
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
			$Ignore = explode (",", stripslashes($Cmd[3]));
			for ($i = 0; $i < count($Ignore); $i++)
			{
				$Ignore[$i] = trim($Ignore[$i]);
				if ($Ignore[$i] == "") continue;
				if ($Ignore[$i] != "" && is_user_ignored($Ignore[$i], $Ign))
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

	// Define a table that contains JavaScript instructions to be ran
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