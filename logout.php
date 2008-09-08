<?php
	$_SESSION["adminlogged"] = NULL;
	unset($_SESSION["adminlogged"]);
	$_SESSION = array();
	session_unset();
	session_destroy();
?>