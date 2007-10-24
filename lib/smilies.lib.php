<?
/* ------------------------------------------------------------------
	This library allows to transform text codes to graphical smilies.
	It is called by 'plus/input.php'.
   ------------------------------------------------------------------ */

// The table below define smilies code and associated gif names, width and height.
// You can add your own collection of smilies inside but be aware that codes may
// need to be slashed in some way because they are used as POSIX 1003.2 regular
// expressions (see the Check4Smilies function below). Moreover these codes are
// case sensitives.

$SmiliesTbl = Array(
	":\)"	=> array("smile1.gif", "15", "15"),
	":-\)"	=> array("smile1.gif", "15", "15"),
	":D"	=> array("smile2.gif", "15", "15"),
	":o"	=> array("smile3.gif", "15", "15"),
	":O"	=> array("smile3.gif", "15", "15"),
	":\("	=> array("smile4.gif", "15", "15"),
	":-\("	=> array("smile4.gif", "15", "15"),
	";\)"	=> array("smile5.gif", "15", "15"),
	":p"	=> array("smile6.gif", "15", "15"),
	":P"	=> array("smile6.gif", "15", "15"),
	"8\)"	=> array("smile7.gif", "15", "15"),
	"8-\)"	=> array("smile7.gif", "15", "15"),
	":\["	=> array("smile8.gif", "15", "15"),
	":-\["	=> array("smile8.gif", "15", "15"),
	":kill:"	=> array("smile9.gif", "50", "15"),
	":wave"	=> array("smile10.gif", "25", "15"),
	":baby"	=> array("smile11.gif", "40", "15"),
	":nono"	=> array("smile12.gif", "22", "19"),
	":shuks"	=> array("smile13.gif", "21", "15"),
	":blush" => array("smile14.gif", "15", "15"),
	":sad"	=> array("smile15.gif", "39", "18"),
	":drool" => array("smile16.gif", "25", "25"),
	":nuts" => array("smile17.gif", "23", "15"),
	":hardhat" => array("smile18.gif", "17", "18"),
	":thum"	=> array("smile19.gif", "25", "18"),
	":foot"	=> array("smile20.gif", "18", "17"),
	":hug"	=> array("smile21.gif", "38", "15"),
	":sneak" => array("smile22.gif", "47", "20"),
	":handshake" => array("smile23.gif", "36", "15"),
	":kiss"	=> array("smile24.gif", "32", "15"),
	":\*"	=> array("smile24.gif", "32", "15"),
	":-\*"	=> array("smile24.gif", "32", "15"),
	":heart" => array("smile25.gif", "19", "19"),
	":bang"	=> array("smile26.gif", "25", "20"),
	":type"	=> array("smile27.gif", "40", "15"),
	":read" => array("smile28.gif", "48", "26"),
	":zzzz"	=> array("smile29.gif", "33", "25"),
	":eat"	=> array("smile30.gif", "35", "35"),
	":angl"	=> array("smile31.gif", "42", "23"),
	":love" => array("smile32.gif", "18", "18"),
	":flirt" => array("smile33.gif", "16", "16"),
	":rant"	=> array("smile34.gif", "28", "24"),
	":rofl"	=> array("smile35.gif", "30", "18"),
	":idea"	=> array("smile36.gif", "43", "55"),
	":silly" => array("smile37.gif", "35", "35"),
	":wow"	=> array("smile38.gif", "33", "35"),
	":clps" => array("smile39.gif", "20", "30"),
	":disco" => array("smile40.gif", "36", "23"),
	":clap"	=> array("smile41.gif", "19", "16"),
	":yea"	=> array("smile42.gif", "27", "16"),
	":splat"	=> array("smile43.gif", "15", "15"),
	":uch"	=> array("smile44.gif", "33", "26"),
	":cryn"	=> array("smile45.gif", "21", "16"),
	":whoa"	=> array("smile46.gif", "15", "15"),
	":nana"	=> array("smile47.gif", "15", "15"),
	":yea"	=> array("smile48.gif", "15", "15"),
	":drnk"	=> array("smile49.gif", "24", "18"),
	":devil" => array("smile50.gif", "21", "19"),
	":cat"	=> array("smile51.gif", "19", "15"),
	":buds"	=> array("smile52.gif", "37", "41"),
	":dead"	=> array("smile53.gif", "15", "15"),
	":hey" => array("smile54.gif", "25", "22"),
	":wink"	=> array("smile55.gif", "15", "17"),
	":hahaha"	=> array("smile56.gif", "15", "19"),
	":hy"	=> array("smile57.gif", "19", "20"),
	":mad"	=> array("smile58.gif", "15", "17"),
	":shock" => array("smile59.gif", "19", "25"),
	":slap"	=> array("smile60.gif", "39", "22"),
	":bop"	=> array("smile61.gif", "45", "35"),
	":music"	=> array("smile62.gif", "32", "25"),
	":argue"	=> array("smile63.gif", "50", "25"),
	":mischief" => array("smile64.gif", "61", "32"),
	":groin"	=> array("smile65.gif", "60", "30"),
	";punch"	=> array("smile66.gif", "48", "18"),
	":drunk"	=> array("smile67.gif", "57", "28"),
	":back"	=> array("smile68.gif", "37", "15"),
);

$MaxWidth = "50";		// Set the maximum width among similes
$MaxHeight = "55";		// Set the maximum height among similes


// ---- DO NOT MODIFY BELOW ----

// Slashes ' and " characters
function SpecialSlash(&$Str)
{
	return str_replace("\"","&quot;",str_replace("'","\\'",$Str));
}

// Replace smilies code by gif URLs in messages
function Check4Smilies(&$string,&$Table)
{
	$tmp_tbl = split("<a href|</a>", " ".$string." ");
	$i = "0";

	for (reset($tmp_tbl); $substring=current($tmp_tbl); next($tmp_tbl))
	{
		// $substring is one of the trailing spaces added above -> do nothing
		if($substring == " ")
		{
		}
		// $substring is not an HTTP link -> do the work for smilies
		elseif (($i % 2) == "0")
		{
			while(list($key, $prop) = each($Table))
			{
				$substring = ereg_replace($key, " <IMG SRC=images/smilies/$prop[0] ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"> ", $substring);
			};
			$tmp_tbl[$i] = $substring;
		}
		// $substring is an HTTP link -> just restore HTML tags for links
		else
		{
			$tmp_tbl[$i] = "<a href".$substring."</a>";
		}
		$i++;
	};
	$string = trim(join("",$tmp_tbl));
	unset($tmp_tbl);
}

// Bob Dickow modification Rev 2 for multiple smileys rows in help popup
// Display smilies in the help popup and in the tutorials (added popups by Ciprian)
// Added the popup for Smilie popup by Ciprian

function DisplaySmilies(&$ToDisplay,&$Table,&$TblSize,$Target)
{
	global $MaxWidth, $MaxHeight;

        $i = 1;
	$Str1 = "";
	$Str2 = "";
	$PerLines = floor(600/$MaxWidth);

	while(list($key, $prop) = each($Table))
	{
		if (($Target == "help") || ($Target == "input")) {
		  	$Str1 .= "\t\t<TD ALIGN=\"CENTER\" WIDTH=$MaxWidth HEIGHT=$MaxHeight><A HREF=\"#\" onClick=\"smiley2Input('".SpecialSlash($key)."'); return false\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_5).".'; return true\" title=\"".str_replace("\"","&quot;", stripslashes($key))."\"><IMG SRC=images/smilies/$prop[0] BORDER=0 ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"></A></TD>\n";
	      $Str2 .= "\t\t<TD ALIGN=\"CENTER\" WIDTH=50 HEIGHT=15 NOWRAP=\"NOWRAP\">".stripslashes($key)."</TD>\n";
		} elseif ($Target == "popup") {
		  	$Str1 .= "\t\t<TD ALIGN=\"CENTER\"><A HREF=\"#\" onClick=\"smiley2Input('".SpecialSlash($key)."'); return false\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_5).".'; return true\" title=\"".str_replace("\"","&quot;", stripslashes($key))."\"><IMG SRC=images/smilies/$prop[0] BORDER=0 ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"></A></TD>\n";
		} else {
				$Str1 .= "\t\t<TD ALIGN=CENTER WIDTH=$MaxWidth HEIGHT=$MaxHeight><IMG SRC=images/smilies/$prop[0] BORDER=0 ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"></TD>\n";
				$Str2 .= "\t\t<TD ALIGN=\"CENTER\" NOWRAP=\"NOWRAP\">".stripslashes($key)."</TD>\n";
		};
		//   Set SMILEY_COLS in config.lib.php.
                if ($Target == "input") {  // for compatibility with input.php modifications by RD
			if (is_integer($i/$PerLines) || $i == $TblSize)
			{
				$ToDisplay[] = $Str1;
				$ToDisplay[] = $Str2;
				$Str1 = "";
				$Str2 = "";
			};
              	} elseif ($Target == "popup") {
      if  (($i % SMILEY_COLS_POP == 0 ) || ($i == $TblSize )) {
			{
				$ToDisplay[] = $Str1;
				$Str1 = "";
			}
			};
                } else {
      if  (($i % SMILEY_COLS == 0 ) ||($i == $TblSize )) {
			 	$ToDisplay[] = $Str1;
				$ToDisplay[] = $Str2;
				$Str1 = "";
				$Str2 = "";
                	};
                };
 		$i++;
	};
};

?>