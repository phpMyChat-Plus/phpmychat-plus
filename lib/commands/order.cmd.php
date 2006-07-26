<?php

if ($Ver != "H")
{
	$O = 1 - $O;
	setcookie("CookieMsgOrder", $O, time() + 60*60*24*365);		// cookie expires in one year
	$IsCommand = true;
	$RefreshMessages = true;
}
else
{
		$Error = L_ERR_USR_22;
}

?>