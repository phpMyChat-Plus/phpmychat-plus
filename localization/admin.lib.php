<?php
// Available languages for admin
$AvailableAdmin = array();
$languageDirectories = dir('./localization/');
while($name = $languageDirectories->read())
{
	if(is_dir('./localization/'.$name)
		&& file_exists('./localization/'.$name.'/regex.txt')
		&& file_exists('./localization/'.$name.'/localized.admin.php')
		&& $name != "hebrew")
	{
		list($key) = file('./localization/'.$name.'/regex.txt');
		$AvailableAdmin[$key] = $name;
	};
};
$languageDirectories->close();
if (!function_exists("krsort")) include("./localization/sort_languages.php");
krsort($AvailableAdmin);

function DetectAdmin($Str,$From)
{
	global $AvailableAdmin;
	global $L;

	$NotFound = true;
	reset($AvailableAdmin);
	while($NotFound && list($key, $name) = each($AvailableAdmin))
	{
#		if (($From == 1 && eregi("^(".trim($key).")$",$Str)) || ($From == 2 && eregi("(\(|\[|;[[:space:]])(".trim($key).")(;|\]|\))",$Str)))
		if (($From == 1 && preg_match("/^(".trim($key).")$/i",$Str)) || ($From == 2 && preg_match("/(\(|\[|;[[:space:]])(".trim($key).")(;|\]|\))/i",$Str)))
		{
			$L = $AvailableAdmin[$key];
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

if (isset($CookieLang)
	&& is_dir('./localization/'.$CookieLang)
	&& file_exists("./localization/$CookieLang/localized.admin.php")
	&& $CookieLang != "hebrew")
{
	$L = $CookieLang;
}
elseif ($HTTP_ACCEPT_LANGUAGE != "")
{	
	$Accepted = explode(",", $HTTP_ACCEPT_LANGUAGE);
	DetectAdmin($Accepted[0],1);
}
elseif ($HTTP_USER_AGENT != "")
{	
	DetectAdmin($HTTP_USER_AGENT,2);
};

//if no language detected set the english one
if (!isset($L)) $L = "english";
	
// Clear the table
unset($AvailableAdmin);
?>