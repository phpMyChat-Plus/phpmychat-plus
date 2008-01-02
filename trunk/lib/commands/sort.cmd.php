<?php

	if (isset($_COOKIE["CookieUserSort"])) $sort_order = $_COOKIE["CookieUserSort"];
	$sort_order = 1 - $sort_order;
	setcookie("CookieUserSort", $sort_order, time() + 60*60*24*365);		// cookie expires in one year
	$IsCommand = true;
    $RefreshMessages = true;
	$First = 1;
    $CleanUsrTbl = 1;

?>