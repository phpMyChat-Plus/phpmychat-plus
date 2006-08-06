<?php

	if (isset($HTTP_COOKIE_VARS["CookieUserSort"])) $sort_order = $HTTP_COOKIE_VARS["CookieUserSort"];
	$sort_order = 1 - $sort_order;
	setcookie("CookieUserSort", $sort_order, time() + 60*60*24*365);		// cookie expires in one year
	$IsCommand = true;
  $First = 1;

?>