<?php
//$URL = "admin.php";
session_destroy($_SESSION['adminlogged']);
session_start();
if($_GET['mode'] == "logout")
{
$_SESSION = array();
session_destroy();
//header("Location: $URL");
}
?>