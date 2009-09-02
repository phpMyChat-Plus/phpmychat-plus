<?php

	if (!isset($sort_order)) $sort_order = isset($_COOKIE["CookieUserSort"]) ? $_COOKIE["CookieUserSort"] : C_USERS_SORT_ORD;

	$sort_order = 1 - $sort_order;
	setcookie("CookieUserSort", $sort_order, time() + 60*60*24*365);		// cookie expires in one year
	$IsCommand = true;
	$First = 1;
	$CleanUsrTbl = 1;
	$RefreshMessages = true;

?>