<?php
// Sort keys by reverse order in an array - This library is used for release of PHP
// older than 3.0.15

function KeyComp(&$a, $b)
{   
	return -(strcmp($a,$b));
};

function krsort(&$LangArray)
{
	uksort($LangArray, "KeyComp");
};
?>