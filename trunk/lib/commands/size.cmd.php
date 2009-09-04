<?php
// Size command by Ciprian

if ($Cmd[2] =="" || ($Cmd[2]> 6 && $Cmd[2] < 16))
{
	if ($Cmd[2] != "")
	{
		$FontSize = $Cmd[2];
		setcookie("CookieFontSize", $FontSize, time() + 60*60*24*365);		// cookie expires in one year
	}
	else
	{
		setcookie("CookieFontSize", "", time());		// cookie expires in one year
	}
	$IsCommand = true;
	$RefreshMessages = true;
	$First = 1;
}
else
{
	$Error = L_ERR_SIZE;
}
?>