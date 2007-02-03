<?php

// Define a table that contains JavaScript instructions to be ran
$jsTbl = array(
	"<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">",
	"<!--",
	"if (window.parent.is_help_popup && !window.parent.is_help_popup.closed)",
	"{",
	"\twindow.parent.is_help_popup.focus();",
	"}",
	"else",
	"{",
	"\twindow.parent.is_help_popup = window.open(\"help_popup.php?L=$L&Ver=$Ver\",\"help_popup\",\"width=600,height=350,scrollbars=yes,resizable=yes\");",
	"};",
	"// -->",
	"</SCRIPT>"
);

$IsCommand = true;
$IsPopup = true;

?>