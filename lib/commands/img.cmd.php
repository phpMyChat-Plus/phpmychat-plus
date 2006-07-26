<?php

	$M = $Cmd[1];
	$M = addslashes("$M");

$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$T', '$R', 'SYS image', '', '".time()."', '$U', '$M', '')");

$IsCommand = true;
$RefreshMessages = true;
?>