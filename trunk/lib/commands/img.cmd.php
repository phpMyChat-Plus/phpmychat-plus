<?php

	$M = eregi_replace(" ", "%20", $Cmd[2]);
	$M = addslashes($M);

//	if (file_exists($M))
//	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$T', '$R', 'SYS image', '', '".time()."', '$U', '$M', '', '')");
		if(C_EN_STATS) $DbLink->query("UPDATE ".C_STS_TBL." SET imgs_posted=imgs_posted+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
		$IsCommand = true;
		$RefreshMessages = true;
//	}
/*	else
	{
		$Error = L_NO_IMAGE;
	}
*/	
?>