<?php

	$sort_order = C_USERS_SORT_ORD;
	if (isset($_COOKIE["CookieUserSort"])) $sort_order = $_COOKIE["CookieUserSort"];
	$sort_order = 1 - $sort_order;
	setcookie("CookieUserSort", $sort_order, time() + 60*60*24*365);		// cookie expires in one year
	$IsCommand = true;
	$First = 1;
	$RefreshMessages = true;
  $CleanUsrTbl = 1;
?>