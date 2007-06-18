<?php
// Available languages for tutorial
$AvailableTutorials = array();
$languageDirectories = dir('./localization/');
while($name = $languageDirectories->read())
{
	if(is_dir('./localization/'.$name)
		&& file_exists('./localization/'.$name.'/regex.txt')
		&& file_exists('./localization/'.$name.'/localized.tutorial.php'))
	{
		list($key) = file('./localization/'.$name.'/regex.txt');
		$AvailableTutorials[$key] = $name;
	};
};
$languageDirectories->close();
if (!function_exists("krsort")) include("./localization/sort_languages.php");
krsort($AvailableTutorials);

function DetectTutorial($Str,$From)
{
	global $AvailableTutorials;
	global $L;

	$NotFound = true;
	reset($AvailableTutorials);
	while($NotFound && list($key, $name) = each($AvailableTutorials))
	{
		if (($From == 1 && eregi("^(".trim($key).")$",$Str)) || ($From == 2 && eregi("(\(|\[|;[[:space:]])(".trim($key).")(;|\]|\))",$Str)))
		{
			$L = $AvailableTutorials[$key];
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
	&& file_exists("./localization/${CookieLang}/localized.tutorial.php"))
{
	$L = $CookieLang;
}
elseif ($HTTP_ACCEPT_LANGUAGE != "")
{	
	$Accepted = explode(",", $HTTP_ACCEPT_LANGUAGE);
	DetectTutorial($Accepted[0],1);
}
elseif ($HTTP_USER_AGENT != "")
{	
	DetectTutorial($HTTP_USER_AGENT,2);
};

//if no language detected set the english one
if (!isset($L))
{
	$L = "english";
};
	
// Clear the table
unset($AvailableTutorials);
?>