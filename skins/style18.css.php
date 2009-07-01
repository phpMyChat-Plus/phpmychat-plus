<?php
// "Dark Embrace" skin for phpMyChat plus - by Jerome

// Sends the appropriate header information (required to work with mozilla)
header("Content-type: text/css");

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	}
}

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
	}
}

if (!isset($medium) || $medium == "") $medium = 10;
$large = round(1.4 * $medium);
$largest = $large+2;
$larger = $large+1;
$small = round(0.8 * $medium);
$smaller = $small-1;
$smallest = $small-2;

include_once('style18.php');
?>

BODY
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 200;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-arrow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-base-color: <?php echo($COLOR_BODY); ?>;
	scrollbar-track-color: <?php echo($COLOR_SCROLL_TRACK); ?>;
	scrollbar-darkshadow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-face-color: <?php echo($COLOR_BODY); ?>;
	scrollbar-highlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-shadow-color: <?php echo(COLOR_CD); ?>;
}

BODY.frame
{
	background-color: <?php echo($COLOR_BK); ?>;
	background-image: url("images/de.gif");
	background-attachment: fixed;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 300;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-arrow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-base-color: <?php echo($COLOR_BODY); ?>;
	scrollbar-track-color: <?php echo($COLOR_SCROLL_TRACK); ?>;
	scrollbar-darkshadow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-face-color: <?php echo($COLOR_BODY); ?>;
	scrollbar-highlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-shadow-color: <?php echo(COLOR_CD); ?>;
}

BODY.mainframe
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 300;
	border: solid;
	border-color: #999999;
	border-width: 1pt;
	margin: 5px;
	scrollbar-3dlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-arrow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-base-color: <?php echo($COLOR_BODY); ?>;
	scrollbar-track-color: <?php echo($COLOR_SCROLL_TRACK); ?>;
	scrollbar-darkshadow-color: <?php echo(COLOR_CD); ?>;
	scrollbar-face-color: <?php echo($COLOR_BODY); ?>;
	scrollbar-highlight-color: <?php echo(COLOR_CD); ?>;
	scrollbar-shadow-color: <?php echo(COLOR_CD); ?>;
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
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

TH, B
{
	font-weight: 600;
	color: <?php echo(COLOR_CD); ?>;
}

A
{
	text-decoration: none;
	color: <?php echo(COLOR_CD); ?>;
	font-weight: 400;
	cursor:pointer;
}

A:hover, A:active
{
	color: #C0C0C0;
	text-decoration: none;
	cursor:pointer;
 }

A.user, A.user:active
{
	text-decoration: none;
	color: #C0C0C0;
	font-weight: 400;
	cursor:pointer;
	}

A.admin, A.admin:active
{
	text-decoration: none;
	color: #FF0000;
	font-weight: 400;
	cursor:pointer;
}

A.mod, A.mod:active
{
	text-decoration: none;
	color: #FF0000;
	font-weight: 400;
	cursor:pointer;
 }

A.sender, A.sender:active
{
	text-decoration: none;
	color: <?php echo(COLOR_CD); ?>;
	font-weight: 400;
	cursor:pointer;
 }

INPUT, SELECT, TEXTAREA
{
	background: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-weight: 400;
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
	background: #777777;
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
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($large); ?>pt;
	font-weight: 600;
}

.table
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 300;
}

.tabtitle
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

.error
{
	font-weight: 400;
	color: #FF0000;
}

.small
{
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($small); ?>pt;
}

.topic
{
	color: <?php echo($COLOR_TOPIC); ?>;
	font-weight: 800;
}

.tips
{
	font-size: <?php echo($smaller); ?>pt;
}

.time
{
	unicode-bidi: embed;
	color: <?php echo(COLOR_CD); ?>;
}

.notify
{
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.notify2
{
	color: #FF9900;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.quote
{
	<?php echo(isset($QUOTE_COLOR) ? "border: thin ridge ".$QUOTE_COLOR.";" : ""); ?>;
	background: <?php echo($COLOR_BK); ?>;
	color: #f5f5f5;
	text-align: left;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.menu
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	border-bottom: 1pt solid <?php echo(COLOR_CD); ?>;
}

.menuTitle
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 350;
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
}

.thumbIndex
{
	font-size: <?php echo($small); ?>pt;
	font-weight: 300;
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
	border-top: 1pt solid <?php echo(COLOR_CD); ?>;
	border-left: 1pt solid <?php echo(COLOR_CD); ?>;
	border-right: 1pt solid <?php echo(COLOR_CD); ?>;
}

.thumbIndex A
{
	text-decoration: none;
	color: <?php echo(COLOR_CD); ?>;
	font-weight: 350;
}

.thumbIndex A.selected
{
	text-decoration: none;
	color: <?php echo(COLOR_CD); ?>;
	font-weight: 350;
}

.thumbIndex A:hover, .thumbIndex A:active
{
	text-decoration: none;
	background: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
}

.success
{
	color: #98FB98;
	font-weight: 400;
}

.framePreview
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
}