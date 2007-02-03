<?php

if($Cmd[2] != "")
{
	$D = $Cmd[2] < 3 ? 0 : $Cmd[2];
}
else
{
	$D = ($D == 0 ? 10 : 0);
}
$IsCommand = true;
$RefreshMessages = true;

?>