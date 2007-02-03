<?php

$ST = 1 - $ST;
setcookie("CookieShowTimestamp", $ST, time() + 60*60*24*365);		// cookie expires in one year
$IsCommand = true;
$First = 1;
$RefreshMessages = true;

// Define a table that contains JavaScript instructions to be ran
$jsTbl = array(
	"<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">",
	"<!--",
	"// Show/hide the server time in the status bar"
);

if ($ST == 1)
{
	$CorrectedDate = mktime(date("H") + C_TMZ_OFFSET,date("i"),date("s"),date("m"),date("d"),date("Y"));
	$jsTbl[] = "gap = window.parent.calc_gap(\"".date("F d, Y H:i:s", $CorrectedDate)."\");";
	$jsTbl[] = "window.parent.clock(gap);";
}
else
{
	$jsTbl[] = "window.parent.stop_clock();";
};

$jsTbl[] = "// -->";
$jsTbl[] = "</SCRIPT>";

?>