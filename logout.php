<?php
	ini_set('session.bug_compat_42',0);
	ini_set('session.bug_compat_warn',0);
	ini_set('session.use_trans_sid',1);
	$_SESSION["adminlogged"] = NULL;
	unset($_SESSION["adminlogged"]);
	$_SESSION = array();
	session_start();
	session_destroy();
	session_unset();
?>