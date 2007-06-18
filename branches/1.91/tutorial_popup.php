<?php
require("./config/config.lib.php");
require("./lib/release.lib.php");

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
	$NoTranslation = "<CENTER><P CLASS='RedText'>Sorry but this tutorial has not been translated into the ".ucwords($L)." language yet.<br />Do you want to contribute with your own translation? Contact <a href=mailto:ciprianmp@yahoo.com?subject=phpMyChat%20Plus%20translation onMouseOver=\"window.status='Click to email author.'; return true;\" title=\"Click to email author\" target=_blank>Ciprian M.</a></P></CENTER>";
	unset($L);
	include("./localization/tutorial.lib.php");
};
require("./localization/${L}/localized.tutorial.php");
?>