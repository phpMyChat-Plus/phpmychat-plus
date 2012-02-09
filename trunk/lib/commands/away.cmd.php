<?php

   $DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$U'");

   if ($DbLink->num_rows() != 0)
   {
     list($awaystat) = $DbLink->next_record();
   }
   $DbLink->clean_results();

if ($awaystat < 2) {

   if ($awaystat == 0) {
     $msgstr = 'L_AWAY';
     $awaystat = 1;
     $time = time() - 1;
   } else {
     $msgstr = 'L_BACK';
     $awaystat = 0;
     $time = time() + 1;
   }
   $msg = "sprintf(".$msgstr.", \"".special_char($U,$Latin1)."\")";

   $xtra = $Cmd[2];
if ($xtra !="")
{
	// Text formating tags
	if(C_HTML_TAGS_KEEP == "none")
	{
		if(!C_HTML_TAGS_SHOW)
		{
			// eliminates every HTML like tags
#			$xtra = ereg_replace("<[^>]+>", "", $xtra);
			$xtra = preg_replace("/<[^>]+>/", "", $xtra);
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
			if(!C_HTML_TAGS_SHOW)
			{
				$xtra = preg_replace("/&lt;\/?[ubi]?&gt;/i","",$xtra);
			}
		}
	}

	// URL
#	$xtra = eregi_replace('([[:space:]]|^)(www[.])', '\\1http://\\2', $xtra); // no prefix (www.myurl.ext)
	$xtra = preg_replace('/([[:space:]]|^)(www[.])/i', '\\1http://\\2', $xtra); // no prefix (www.myurl.ext)
#	$xtra = eregi_replace('([[:space:]]|^)(ftp[.])', '\\1ftp://\\2', $xtra); // no prefix (ftp.myurl.ext)
	$xtra = preg_replace('/([[:space:]]|^)(ftp[.])/i', '\\1ftp://\\2', $xtra); // no prefix (ftp.myurl.ext)
	// Word wrap fix by Alexander Eisele <xaex@xaex.de>
/*
	if (!preg_match_all("((http://|https://|ftp://|mailto:)[^ ]+)", $xtra, $pmatch))
	{
		$xtra = wordwrap($xtra, 40, " ", 1);
	}
*/
#	$xtra = eregi_replace('([[:space:]]|^)(www)', '\\1http://\\2', $xtra); // no prefix (www.myurl.ext)
	$xtra = preg_replace('/([[:space:]]|^)(www)/i', '\\1http://\\2', $xtra); // no prefix (www.myurl.ext)
	$prefix = '(http|https|ftp|telnet|news|gopher|file|wais):\/\/';
	$pureUrl = '([[:alnum:]\/\n+-=%&:_.~?]+[#[:alnum:]+-_~]*)';
	if (C_POPUP_LINKS)
	{
		$purl="";
		for ($x=0; $x<count($pmatch[0]); $x++)
		{
			$purl .= "||".$pmatch[0][$x];
		}
#		$xtra = eregi_replace($prefix.$pureUrl, '<a href="links.php?link='.urlencode($purl).'" target="_blank"></a>', $xtra);
		$xtra = preg_replace("/".$prefix.$pureUrl."/i", '<a href="links.php?link='.urlencode($purl).'" target="_blank"></a>', $xtra);
	}
#	else $xtra = eregi_replace($prefix.$pureUrl, '<a href="\\1://\\2" target="_blank">\\1://\\2</a>', $xtra);
	else $xtra = preg_replace("/".$prefix.$pureUrl."/i", '<a href="\\1://\\2" target="_blank">\\1://\\2</a>', $xtra);

	// e-mail addresses
//	$xtra = eregi_replace('([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)', '<a href="mailto:\\1" alt="Send email">\\1</a>', $xtra);
	// Added the new top-level domains (mail, asia, travel, aso)
#	$xtra = eregi_replace('([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](avel|bi|bs|fo|g|ia|l|m|me|mes|o|op|pa|ro|seum|t|to|u|v|z)?)', '<a href="mailto:\\1" alt="Send email">\\1</a>', $xtra);
	$xtra = preg_replace('/([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](avel|bi|bs|fo|g|ia|l|m|me|mes|o|op|pa|ro|seum|t|to|u|v|z)?)/i', '<a href="mailto:\\1" alt="Send email">\\1</a>', $xtra);

	// Smilies
	if (C_USE_SMILIES)
	{
		include("./lib/smilies.lib.php");
		$ss = Check4Smilies($xtra,$SmiliesTbl);
		if(C_EN_STATS && $ss > 0)
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET smilies_posted=smilies_posted+$ss WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
		}
		unset($SmiliesTbl, $ss);
	};

	// transform ISO-8859-1 special characters
	if ($Latin1)
	{
		global $MsgTo;
#		ereg("(.*)(".$MsgTo."(&gt;)?)(.*)",$xtra,$Regs);
		preg_match("/(.*)(".$MsgTo."(&gt;)?)(.*)/",$xtra,$Regs);
		if ($MsgTo != "" && ($Regs[1] == "" && $Regs[4] == "")) $Regs[4] = $xtra;
#		if (!ereg("&[[:alnum:]]{1,10};",$Regs[1]) && !ereg("&[[:alnum:]]{1,10};",$Regs[4]))
		if (!preg_match("/&[[:alnum:]]{1,10};/",$Regs[1]) && !preg_match("/&[[:alnum:]]{1,10};/",$Regs[4]))
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
#				$part = ereg_replace("&amp;(#[[:digit:]]{2,5};)", "&\\1", $part);
				$part = preg_replace("/&amp;(#[[:digit:]]{2,5};)/", "&\\1", $part);
				$Regs[$i] = $part;
			}
			$xtra = $Regs[1].$Regs[2].$Regs[4];
		}
	}

	// Text tags for power users
	if(C_ITALICIZE_POWERS)
	{
		$text_tag = "";
		$text_endtag = "";
		if ($status == "a" || $status == "t" || $status == "m")
		{
			if(stristr(C_TAGS_POWERS, "B"))
			{
				$text_tag .= "<B>";
				$text_endtag .= "</B>";
			}
			if(stristr(C_TAGS_POWERS, "I"))
			{
				$text_tag .= "<I>";
				$text_endtag .= "</I>";
			}
			if(stristr(C_TAGS_POWERS, "U"))
			{
				$text_tag .= "<U>";
				$text_endtag .= "</U>";
			}
		}
		if ($text_tag != "") $xtra = $text_tag.$xtra.$text_endtag;
	}

	$xtra = "<FONT COLOR=\"".$C."\">".$xtra."</FONT>";
	$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '".addslashes($U)."', '$Latin1', '$time', '$Private', '".addslashes($xtra)."', '', '')");
}
	$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS away', '', '".time()."', '', '$msg', '', '')");
	$DbLink->query("UPDATE ".C_USR_TBL." SET awaystat='".$awaystat."' WHERE username='$U'");
	if(C_EN_STATS && $awaystat < 2)
	{
		if($awaystat == 1)
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET last_away=".time().", times_away=times_away+1 WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$R' AND username='$U'");
		}
		else
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+(".time()."-last_away), longest_away=IF(".time()."-last_away < longest_away, longest_away, ".time()."-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$R' AND username='$U' AND last_away!='0'");
		}
	}

   $IsCommand = true;
   $RefreshMessages = true;
   $CleanUsrTbl = 1;
}
?>