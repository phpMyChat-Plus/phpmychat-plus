<?php

if ($status == "a" || $status == "t")
{
	AddMessage(stripslashes($Cmd[1]), $T, $R, 'SYS announce', '', ' *', '', '');
	$IsCommand = true;
	$RefreshMessages = true;
}
else
{
	$Error = L_NO_ADMIN;
};

?>