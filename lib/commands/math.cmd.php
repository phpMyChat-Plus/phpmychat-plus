<?php

if(C_ALLOW_MATH)
{
	$math = $Cmd[2];
	
	if(!stristr($math,"<math") && !strstr($math,"\[") && !strstr($math,"$$"))
	{
		if(stristr(PHP_OS,'win')) $math = "\\[".$math."\\]";
		else $math = "\\\[".$math."\\\]";
	}
	
	if(stristr(PHP_OS,'win')) $math = addslashes($math);
//	AddMessage($math, $T, $R, 'SYS math', $C, $U, '', '', $Charset);
	if(!stristr($math,"<math")) AddMessage($math, $T, $R, 'SYS math', $C, $U, '', '', $Charset);
	else $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$T', '$R', 'SYS math', '', '".time()."', '$U', '$math', '', '')");
	if(C_EN_STATS) $DbLink->query("UPDATE ".C_STS_TBL." SET maths_posted=maths_posted+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
	$IsCommand = true;
	$RefreshMessages = true;
}

?>