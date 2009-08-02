<?php
// Third private room skin ("Staff Only" as default)
// "Pink & magenta" skin for phpMyChat plus - by Ciprian

// Sends the appropriate header information (required to work with mozilla)
header("Content-type: text/css");

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

if (isset($Charset))
{
	if (isset($FontName) && $FontName != "")
	{
		?>
		* {font-family: <?php echo($FontName); ?>, sans-serif;}
		<?php
	}
	else
	{
		?>
		* {font-family: helvetica, arial, geneva, sans-serif;}
		<?php
	};
};

if (!isset($medium) || $medium == "") $medium = 10;
$large = round(1.4 * $medium);
$small = round(0.8 * $medium);

include_once('style11.php');
?>

BODY
{
	background-color: <?php echo(COLOR_CD); ?>;
	color: #FFFFFF;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-arrow-color: #FFFFFF;
	scrollbar-base-color: #FFC0CB;
	scrollbar-track-color: #D766AC;
	scrollbar-darkshadow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-face-color: <?php echo(COLOR_CD); ?>;
	scrollbar-highlight-color: #FFFFFF;
	scrollbar-shadow-color: #D766AC;
}

BODY.frame
{
	background-color: <?php echo(COLOR_CD); ?>;
	color: #FFC0CB;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #FFFFFF;
	scrollbar-arrow-color: #FFFFFF;
	scrollbar-base-color: #636363;
	scrollbar-track-color: #333333;
	scrollbar-darkshadow-color: #000000;
	scrollbar-face-color: #000000;
	scrollbar-highlight-color: #636363;
	scrollbar-shadow-color: #333333;
}

BODY.mainframe
{
	background-color: #FFC0CB;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	scrollbar-3dlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-arrow-color: #FFFFFF;
	scrollbar-base-color: #FFC0CB;
	scrollbar-track-color: #D766AC;
	scrollbar-darkshadow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-face-color: <?php echo(COLOR_CD); ?>;
	scrollbar-highlight-color: #FFFFFF;
	scrollbar-shadow-color: #D766AC;
}

TABLE, TR, TD, TH
{
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	vertical-align: top;
}

IMG
{
	vertical-align: top;
	background-color: transparent;
}

TD.whois, .whois
{
	color: #FFFFFF;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

TH, B
{
	font-weight: 800;
}

A
{
	text-decoration: none;
	color: #FFFFFF;
	font-weight: 600;
	cursor:pointer;
}

A:hover, A:active
{
	color: #800080;
	text-decoration: none;
	cursor:pointer;
}

A.user, A.user:active
{
	text-decoration: none;
	color: #FFB6C1;
	font-weight: 400;
	cursor:pointer;
}

A.admin, A.admin:active
{
	text-decoration: none;
	color: #FF0000;
	font-weight: 600;
	cursor:pointer;
}

A.mod, A.mod:active
{
	text-decoration: none;
	color: #0000FF;
	font-weight: 600;
	cursor:pointer;
}

A.sender, A.sender:active
{
	text-decoration: none;
	color: <?php echo(COLOR_CD); ?>;
	font-weight: 600;
	cursor:pointer;
}

INPUT, SELECT, TEXTAREA
{
	background: #FFC0CB;
	color: <?php echo(COLOR_CD); ?>;
}

.msg
{
	margin-top: 0px;
	margin-bottom: 2px;
	margin-left: <?php #echo($Align == "right" ? "5" : "55"); ?>0px;
	margin-right: <?php #echo($Align == "right" ? "55" : "5"); ?>0px;
	text-indent: 0px;
}

.msg2
{
	background: <?php echo(COLOR_CD); ?>;
	color: #FFFAFA;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: <?php #echo($Align == "right" ? "5" : "55"); ?>0px;
	margin-right: <?php #echo($Align == "right" ? "55" : "5"); ?>0px;
	text-indent: 0px;
}

.help
{
	background: #FFFFE0;
	color: #000080;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: <?php #echo($Align == "right" ? "5" : "55"); ?>0px;
	margin-right: <?php #echo($Align == "right" ? "55" : "5"); ?>0px;
	text-indent: 0px;
}

.title
{
	color: #FFFFFF;
	font-size: <?php echo($large); ?>pt;
	font-weight: 800;
}

.table
{
	background-color: #FFFFFF;
	color: #800080;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.tabtitle
{
	background-color: <?php echo(COLOR_CD); ?>;
	color: #FFFFFF;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 800;
}

.error
{
	font-weight: 800;
	color: #FF0000;
}

.small
{
	color: #FFFFFF;
	font-size: <?php echo($small); ?>pt;
}

.time
{
	unicode-bidi: embed;
	color: <?php echo(COLOR_CD); ?>;
}

.notify
{
	color: #800080;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

.notify2
{
	color: #FF0000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

.quote
{
	<?php echo(isset($QUOTE_COLOR) ? "border: thin ridge ".$QUOTE_COLOR.";" : ""); ?>;
	background: #FFFAFA;
	color: #D2691E;
	text-align: justify;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

.menu
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color:  <?php echo(COLOR_CD); ?>;
	color: #FFFFFF;
	border-bottom: 1pt solid #FFFFFF;
}

.menuTitle
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color:  <?php echo(COLOR_CD); ?>;
	color: #FFFFFF;
}

.thumbIndex
{
	font-size: <?php echo($small); ?>pt;
	font-weight: 600;
	background-color: #9999CC;
	color: #FFFFFF;
	border-top: 1pt solid #FFFFFF;
	border-left: 1pt solid #FFFFFF;
	border-right: 1pt solid #FFFFFF;
}

.thumbIndex A
{
	text-decoration: none;
	color: #FFFFFF;
	font-weight: 600;
}

.thumbIndex A.selected
{
	text-decoration: none;
	color: #FFFFFF;
	font-weight: 600;
}

.thumbIndex A:hover, .thumbIndex A:active
{
	text-decoration: none;
	background:  <?php echo(COLOR_CD); ?>;
	color: #800080;
}

.success
{
	font-weight: 800;
	color: #0000FF;
}

.framePreview
{
	background-color: <?php echo(COLOR_CD); ?>;
	color: #FFFFFF;
}