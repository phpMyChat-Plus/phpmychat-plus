<?php

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

require("./config/config.lib.php");

$xxx=htmlentities($_GET['xxx']);

$purl=urldecode($xxx);

$M="";
$L="";
$U="";
$PWD_Hash="";
$R="";
$PASSWORD="";
$Ver="";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<head>
<title>Posted Links</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="stylesheet" HREF="<?php echo($skin); ?>.css.php" TYPE="text/css">
</head>

<body class="frame">
<SPAN CLASS="mainframe" style="font-family:Arial, Helvetica, Geneva, Verdana, sans-serif;">
<p align="center" class="title">Here you can access the Posted Links</p>
<table align="center" width="100%" height="50%">
  <tr>
<td>


<?php

$urlarray = explode("||",$purl);

for($x=0;$x<count($urlarray);$x++)

{
echo "<p align=\"center\"><a href=\"".$urlarray[$x]."\" title=\"Click to open link\" onMouseOver=\"window.status='Click to open link.'; return true\">".wordwrap($urlarray[$x], 40, " ", 1)."</a></p>";
}

?>

</td>
</tr>
</table>
<div align="right">&copy; 2006-<?php echo(date(Y)); ?> - by <a href=http://www.xaex.de onMouseOver="window.status='Click to open author&#39;s site.'; return true;" title="Open author&#39;s site" target=_blank>xaex.de</a></div>
</SPAN>
</body>
</html>
