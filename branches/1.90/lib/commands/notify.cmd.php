<?php

$NT = 1 - $NT;
setcookie("CookieNotify", $NT, time() + 60*60*24*365);		// cookie expires in one year
$IsCommand = true;
$First = 1;
$RefreshMessages = true;

?>