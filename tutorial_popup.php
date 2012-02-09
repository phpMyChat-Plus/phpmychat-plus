<?php
require("./config/config.lib.php");
require("./lib/release.lib.php");

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	}
};

if (isset($_GET["L"])) $L = $_GET["L"];
if (!isset($L))
{
	$L = "";
}
// Fix a security hole
else if (!is_dir("./localization/".$L))
{
	exit();
}
if ($L == "" || !file_exists("./localization/${L}/localized.tutorial.php"))
{
if ($L != "" && file_exists("./localization/${L}/localized.chat.php")) include ("./localization/${L}/localized.chat.php");
elseif (file_exists("./localization/english/localized.chat.php")) include ("./localization/english/localized.chat.php");
elseif (file_exists("./localization/".C_LANGUAGE."/localized.chat.php")) include ("./localization/".C_LANGUAGE."/localized.chat.php");
	$NoTranslation = "<CENTER><P CLASS='RedText'>We are sorry but this tutorial has not been translated into the ".mb_convert_case(str_replace("_"," ",$L),MB_CASE_TITLE,$Charset)." language yet.<br />If you would like to contribute with your own translation, please contact <a href=mailto:ciprianmp@yahoo.com?subject=phpMyChat%20Plus%20translation onMouseOver=\"window.status='".sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR).".'; return true;\" title=\"".sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)."\" target=_blank>Ciprian Murariu</a>.</P></CENTER>";
	unset($L);
	include("./localization/tutorial.lib.php");
};
require("./localization/${L}/localized.tutorial.php");
?>