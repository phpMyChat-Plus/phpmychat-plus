<?php

if ($status == "a" || $status == "t")
{
	AddMessage(stripslashes($Cmd[1]), $T, $R, 'SYS announce', '', ' *', '', '', $Charset);
	$IsCommand = true;
	$RefreshMessages = true;
}
else
{
	$Error = L_NO_ADMIN;
};

?>