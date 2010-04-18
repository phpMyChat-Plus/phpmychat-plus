<?php

	if (version_compare(PHPVERSION,'5','>='))
	{

		$Cmd[2] = addslashes(str_replace(" ", "%20", $Cmd[2]));

		//require EmbeVi Class
		include_once('plugins/video/embevi.class.php');
		//instantiate EmbeVi class
		$embevi = new EmbeVi();
		$embevi->setAcceptShortUrl();
		$embevi->setAcceptExtendedSupport();
		if($embevi->parseUrl($Cmd[2]))
		{
		}
		else
		{
			$Error = L_NO_VIDEO;
		}
	}

	if (!isset($Error))
	{
		if(C_ALLOW_VIDEO)
		{
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$T', '$R', 'SYS video', '', '".time()."', '$U', '$Cmd[2]', '', '')");
			if(C_EN_STATS) $DbLink->query("UPDATE ".C_STS_TBL." SET vids_posted=vids_posted+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
		}
		else
		{
			AddMessage($Cmd[2], $T, $R, $U, '', '', '', '', $Charset);
			if(C_EN_STATS) $DbLink->query("UPDATE ".C_STS_TBL." SET urls_posted=urls_posted+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
		}
		$IsCommand = true;
		$RefreshMessages = true;
	}

?>