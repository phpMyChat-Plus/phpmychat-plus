<?php

if ($status == "a" || $status == "t")
{
	AddMessage(stripslashes($Cmd[2]), $T, $R, 'SYS announce', '', ' *', '', '', $Charset);
	$M1 = $Cmd[0];
	$IsCommand = true;
	$RefreshMessages = true;
}
else
{
	$Error = L_NO_ADMIN;
};

?>