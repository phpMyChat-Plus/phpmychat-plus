<?php
if (!isset($ChatPath)) $ChatPath = "";
if (stristr($_SERVER["SCRIPT_NAME"], "install.php")) $ChatPath = "../";

// Available languages
$AvailableLanguages = array();
$languageDirectories = dir('./'.${ChatPath}.'localization/');
while($name = $languageDirectories->read())
{
	if (stristr($_SERVER["SCRIPT_NAME"], "install"))
	{
		if(is_dir('./'.$ChatPath.'localization/'.$name)
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/regex.txt')
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/localized.chat.php')
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/localized.install.php')
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/images/flag.gif'))
		{
			list($key) = file('./'.$ChatPath.'localization/'.$name.'/regex.txt');
			$AvailableLanguages[$key] = $name;
		};
	}
	else
	{
		if(is_dir('./'.$ChatPath.'localization/'.$name)
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/regex.txt')
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/localized.chat.php')
			&& file_exists('./'.$ChatPath.'localization/'.$name.'/images/flag.gif'))
		{
			list($key) = file('./'.$ChatPath.'localization/'.$name.'/regex.txt');
			$AvailableLanguages[$key] = $name;
		};
	}
};
$languageDirectories->close();
if (!function_exists("krsort")) include("./${ChatPath}localization/sort_languages.php");
krsort($AvailableLanguages);
asort($AvailableLanguages);
reset($AvailableLanguages);

function Detect($Str,$From)
{
	global $AvailableLanguages;
	global $L;

	$NotFound = true;
	reset($AvailableLanguages);
	while($NotFound && list($key, $name) = each($AvailableLanguages))
	{
#		if (($From == 1 && eregi("^(".trim($key).")$",$Str)) || ($From == 2 && eregi("(\(|\[|;[[:space:]])(".trim($key).")(;|\]|\))",$Str)))
		if (($From == 1 && preg_match("/^(".trim($key).")$/i",$Str)) || ($From == 2 && preg_match("/(\(|\[|;[[:space:]])(".trim($key).")(;|\]|\))/i",$Str)))
		{
			$L = $AvailableLanguages[$key];
			$NotFound = false;
		};
	};
};

// finds the appropriate language file
if (isset($_COOKIE["CookieLang"]))
	$CookieLang = $_COOKIE["CookieLang"];
if (!isset($HTTP_ACCEPT_LANGUAGE))
	$HTTP_ACCEPT_LANGUAGE = getenv("HTTP_ACCEPT_LANGUAGE");
if (!isset($HTTP_USER_AGENT))
	$HTTP_USER_AGENT = getenv("HTTP_USER_AGENT");

if ((isset($L) && $L != "" && is_dir('./'.$ChatPath.'localization/'.$L)) || !C_MULTI_LANG) {}
elseif (isset($CookieLang)
		&& is_dir('./'.$ChatPath.'localization/'.$CookieLang)
		&& file_exists('./'.$ChatPath.'localization/'.$CookieLang.'/localized.chat.php')) $L = $CookieLang;

elseif ($HTTP_ACCEPT_LANGUAGE != "")
{
	$Accepted = explode(",", $HTTP_ACCEPT_LANGUAGE);
	Detect($Accepted[0],1);
}
elseif ($HTTP_USER_AGENT != "")
{
	Detect($HTTP_USER_AGENT,2);
};

//if no language detected set default one
if (!isset($L)) $L = C_LANGUAGE;

//put language in a cookie
setcookie("CookieLang", $L, time() + 60*60*24*365);		// cookie expires in one year
?>