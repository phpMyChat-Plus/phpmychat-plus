<?php
/* ------------------------------------------------------------------
	This library allows to transform text codes to graphical smilies.
	It is called by 'plus/input.php, help_popup.php, smilies_popup.php, files_popup.php and tutorials'.
   ------------------------------------------------------------------ */

// The table below define smilies code and associated gif names, width and height.
// You can add your own collection of smilies inside but be aware that codes may
// need to be slashed in some way because they are used as POSIX 1003.2 regular
// expressions (see the Check4Smilies function below). Moreover these codes are
// case sensitives.

if (!function_exists('array_combine'))
{
	function array_combine($arr1,$arr2)
	{
		$out = array();
		foreach ($arr1 as $key1 => $value1)
		{
			$out[$value1] = $arr2[$key1];
		}
	return $out;
	}
}

$sm = fopen ("./${ChatPath}images/smilies/smilies.php", "rb");
while ($sminfo = fscanf($sm, "%s\t|\t%s\n")) {
		list ($code, $smile) = $sminfo;
		$codes[] .= $code;
		$imgs[] .= str_replace(",","",str_replace("\r","",$smile));
   }
fclose ($sm);
	$SmiliesTbltemp[] = array_combine($codes, $imgs);
	$SmiliesTbl = $SmiliesTbltemp[0];

$MaxWidth = 50;
$MaxHeight = 55;

// ---- DO NOT MODIFY BELOW ----

// Slashes ' and " characters
if (!function_exists('SpecialSlash'))
{
	function SpecialSlash(&$Str)
	{
		return str_replace("\"","&quot;",str_replace("'","\\'",$Str));
	}
}
// Replace smilies code by gif URLs in messages
function Check4Smilies(&$string,&$Table)
{

	$tmp_tbl = split("<a href|</a>", " ".$string." ");
	$i = 0;
	$ss = 0;

	for (reset($tmp_tbl); $substring=current($tmp_tbl); next($tmp_tbl))
	{
		// $substring is one of the trailing spaces added above -> do nothing
		if($substring == " ")
		{
		}
		// $substring is not an HTTP link -> do the work for smilies
		elseif (($i % 2) == 0)
		{
			while(list($key, $prop) = each($Table))
			{
				if(strstr($substring, $key)) $ss++;
				$substring = ereg_replace($key, " <IMG SRC=\"images/smilies/$prop\" BORDER=0 ALT=\"".SpecialSlash($key)."\"> ", $substring);
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
	return $ss;
}

// Bob Dickow modification Rev 2 for multiple smileys rows in help popup
// Display smilies in the help popup and in the tutorials (added popups by Ciprian)
// Added the popup for Smilie popup by Ciprian

function DisplaySmilies(&$ToDisplay,&$Table,&$TblSize,$Target)
{
	global $MaxWidth, $MaxHeight;

    $i = 1;
    $j = 0;
	$Str1 = "";
	$Str2 = "";
	$PerLines = floor(600/$MaxWidth);

	while(list($key, $prop) = each($Table))
	{
		if (!file_exists("images/smilies/$prop"))
		{
			$Str1 .= "";
		  	$Str2 .= "";
			$i--;
			$j++;
		}
		else
		{
		if (($Target == "help") || ($Target == "input")) {
			$Str1 .= "\t\t<TD ALIGN=\"CENTER\" NOWRAP=\"NOWRAP\">".stripslashes($key)."</TD>\n";
		  	$Str2 .= "\t\t<TD ALIGN=\"CENTER\" VALIGN=\"TOP\"><A HREF=\"#\" onClick=\"smiley2Input('".SpecialSlash($key)."'); return false\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_5).".'; return true\" title=\"".str_replace("\"","&quot;", stripslashes($key))."\"><IMG SRC=\"images/smilies/$prop\" BORDER=0 ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"></A></TD>\n";
		} elseif ($Target == "popup") {
		  	$Str1 .= "\t\t<TD ALIGN=\"CENTER\" VALIGN=\"TOP\"><A HREF=\"#\" onClick=\"smiley2Input('".SpecialSlash($key)."'); return false\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_5).".'; return true\" title=\"".str_replace("\"","&quot;", stripslashes($key))."\"><IMG SRC=\"images/smilies/$prop\" BORDER=0 ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"></A></TD>\n";
		} else {
			// Automatic smilie files info for uploader handling - by Ciprian
				$Str1 .= "\t\t<TD ALIGN=\"CENTER\" NOWRAP=\"NOWRAP\">".stripslashes($key)."</TD>\n";
				$Str2 .= "\t\t<TD ALIGN=CENTER VALIGN=\"TOP\" WIDTH=$MaxWidth HEIGHT=$MaxHeight><IMG SRC=\"images/smilies/$prop\" BORDER=0 ALT=\"".str_replace("\"","&quot;", stripslashes($key))."\"></TD>\n";
		};
		}
		//   Set SMILEY_COLS in config.lib.php.
			      if ($Target == "input") {  // for compatibility with input.php modifications by RD
			if (is_integer($i/$PerLines) || $i+$j == $TblSize)
			{
//				$ToDisplay[] = $Str1;
				$ToDisplay[] = $Str2;
				$Str1 = "";
				$Str2 = "";
			};
              	} elseif ($Target == "popup") {
      if  (($i % SMILEY_COLS_POP == 0 ) || ($i+$j == $TblSize )) {
			{
				$ToDisplay[] = $Str1;
				$Str1 = "";
			}
			};
                } else {
      if  (($i % SMILEY_COLS == 0 ) ||($i+$j == $TblSize )) {
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