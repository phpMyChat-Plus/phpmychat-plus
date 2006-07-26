<?php

   $DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$U'");

   if ($DbLink->num_rows() != 0)
   {
     list($awaystat) = $DbLink->next_record();
   }
   $DbLink->clean_results();

if ($awaystat != 2) {

   if ($awaystat == '0') {
     $msgstr = L_AWAY;
     $awaystat = '1';
   } else {
     $msgstr = L_BACK;
     $awaystat = '0';
   }
   $msg = sprintf($msgstr, special_char($U,$Latin1));

   $xtra = $Cmd[2];
	// Text formating tags
	if(C_HTML_TAGS_KEEP == "none")
	{
		if(C_HTML_TAGS_SHOW == 0)
		{
			// eliminates every HTML like tags
			$xtra = ereg_replace("<[^>]+>", "", $xtra);
		}
		else
		{
			// or keep it without effect
			$xtra = str_replace("<", "&lt;", $xtra);
			$xtra = str_replace(">", "&gt;", $xtra);
		}
	}
	else
	{
		// then C_HTML_TAGS_KEEP == "simple", we keep U, B and I tags
		$xtra = str_replace("<", "&lt;", $xtra);
		$xtra = str_replace(">", "&gt;", $xtra);

		if(function_exists("preg_match"))
		{
			while(preg_match("/&lt;([ubi]?)&gt;(.*?)&lt;(\/\\1)&gt;/i",$xtra))
			{
				$xtra = preg_replace("/&lt;([ubi]?)&gt;(.*?)&lt;(\/\\1)&gt;/i","<\\1>\\2<\\3>",$xtra);
			}
			if(C_HTML_TAGS_SHOW == 0)
			{
				$xtra = preg_replace("/&lt;\/?[ubi]?&gt;/i","",$xtra);
			}
		}
	}

	// URL
	$xtra = eregi_replace('([[:space:]]|^)(www)', '\\1http://\\2', $xtra); // no prefix (www.myurl.ext)
	$prefix = '(http|https|ftp|telnet|news|gopher|file|wais)://';
  $pureUrl = '([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+-_~]*)';
	$xtra = eregi_replace($prefix . $pureUrl, '<a href="\\1://\\2" target="_blank">\\1://\\2</a>', $xtra);

	// e-mail addresses
	$xtra = eregi_replace('([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)', '<a href="mailto:\\1" target="_blank">\\1</a>', $xtra);

	// Smilies
	if (C_USE_SMILIES == "1")
	{
		include("./lib/smilies.lib.php");
		Check4Smilies($xtra,$SmiliesTbl);
		unset($SmiliesTbl);
	};

	// transform ISO-8859-1 special characters
	if ($Latin1)
	{
		global $MsgTo;
		ereg("(.*)(".$MsgTo."(&gt;)?)(.*)",$xtra,$Regs);
		if ($MsgTo != "" && ($Regs[1] == "" && $Regs[4] == "")) $Regs[4] = $xtra;
		if (!ereg("&[[:alnum:]]{1,10};",$Regs[1]) && !ereg("&[[:alnum:]]{1,10};",$Regs[4]))
		{
			for ($i = 1; $i <= 4; $i++)
			{
				if (($i != 1 && $i != 4) || $Regs[$i] == "") continue;
				$part = $Regs[$i];
				$part = htmlentities($part);
				$part = str_replace("&lt;", "<", $part);
				$part = str_replace("&gt;", ">", $part);
				$part = str_replace("&amp;lt;", "&lt;", $part);
				$part = str_replace("&amp;gt;", "&gt;", $part);
				$part = str_replace("&quot;","\"", $part);
				$part = ereg_replace("&amp;(#[[:digit:]]{2,5};)", "&\\1", $part);
				$Regs[$i] = $part;
			}
			$xtra = $Regs[1].$Regs[2].$Regs[4];
		}
	}

	$xtra = "<FONT COLOR=\"".$C."\">".$xtra."</FONT>";

   $M = " <B>$msg</B> ".stripslashes($xtra);
   $M = $M . C_UPDTUSRS;
   $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '".addslashes($U)."', '$Latin1', ".time().", '$Private', '".addslashes($M)."', '')");
   $DbLink->query("UPDATE ".C_USR_TBL." SET awaystat='".$awaystat."' WHERE username='$U'");

   $IsCommand = true;
   $RefreshMessages = true;
   $First = 1;
}
?>
