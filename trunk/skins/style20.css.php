<?php
// First room skin and the default for new created ones
// "SteelBlue (Default)" skin for phpMyChat plus - by Ealdwulf

// Sends the appropriate header information (required to work with mozilla)
header("Content-type: text/css");

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	// Prevent any possible XSS attacks via $_GET.
	foreach ($_GET as $check_url) {
		if (!is_array($check_url)) {
			$check_url = str_replace("\"", "", $check_url);
			if ((preg_match("/<[^>]*script*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*object*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*iframe*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*applet*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*meta*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*style*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*form*\"?[^>]*>/i", $check_url)) || (preg_match("/\([^>]*\"?[^)]*\)/i", $check_url)) ||
				(preg_match("/\"/i", $check_url))) {
			die ();
			}
		}
	}
	unset($check_url);
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
	}
}

if (!isset($medium) || $medium == "") $medium = 10;
$large = round(1.4 * $medium);
$largest = $large+2;
$larger = $large+1;
$small = round(0.8 * $medium);
$smaller = $small-1;
$smallest = $small-2;

include_once('style20.php');
?>

BODY
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo($COLOR_BODY); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffff00;
	scrollbar-base-color: <?php echo($COLOR_TB); ?>;
	scrollbar-track-color: <?php echo($COLOR_TB); ?>;
	scrollbar-darkshadow-color: #0000ff;
	scrollbar-face-color: maroon;
	scrollbar-highlight-color: brown;
	scrollbar-shadow-color: #808080;
}

BODY.frame
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo($COLOR_BODY); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffff00;
	scrollbar-base-color: <?php echo($COLOR_TB); ?>;
	scrollbar-track-color: <?php echo($COLOR_TB); ?>;
	scrollbar-darkshadow-color: #0000ff;
	scrollbar-face-color: maroon;
	scrollbar-highlight-color: brown;
	scrollbar-shadow-color: #808080;
}

BODY.mainframe
{
	background-color: <?php echo($COLOR_TB); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffff00;
	scrollbar-base-color: <?php echo($COLOR_TB); ?>;
	scrollbar-track-color: <?php echo($COLOR_TB); ?>;
	scrollbar-darkshadow-color: #0000ff;
	scrollbar-face-color: maroon;
	scrollbar-highlight-color: brown;
	scrollbar-shadow-color: #808080;
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
	color: <?php echo($COLOR_TB); ?>;
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
	color: <?php echo($COLOR_LINK); ?>;
	font-weight: 600;
	cursor:pointer;
}

A:hover, A:active
{
	color: <?php echo($COLOR_TB); ?>;
	text-decoration: none;
	cursor:pointer;
}

A.user, A.user:active
{
	text-decoration: none;
	color: <?php echo($COLOR_TB); ?>;
	font-weight: 600;
	cursor:pointer;
}

A.admin, A.admin:active
{
	text-decoration: none;
	color: <?php echo($COLOR_TB); ?>;
	font-weight: 600;
	cursor:pointer;
}

A.mod, A.mod:active
{
	text-decoration: none;
	color: <?php echo($COLOR_TB); ?>;
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
	background: <?php echo($COLOR_TB); ?>;
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
	background: #FFFAFA;
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
	color: <?php echo($COLOR_TB); ?>;
	font-size: <?php echo($large); ?>pt;
	font-weight: 800;
}

.table
{
	background-color: <?php echo($COLOR_TB); ?>;
	color: <?php echo(COLOR_CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.tabtitle
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: #FFFFFF;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 800;
}

.error
{
	color: #FF0000;
	font-weight: 800;
}

.small
{
	color: #FFFFFF;
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
	color: <?php echo($COLOR_TOPIC); ?>;
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
	color: <?php echo($QUOTE_COLOR); ?>;
	text-align: justify;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.menu
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo($COLOR_BODY); ?>;
	border-bottom: 1pt solid <?php echo($COLOR_TOPIC); ?>;
}

.menuTitle
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo($COLOR_BODY); ?>;
}

.thumbIndex
{
	font-size: <?php echo($small); ?>pt;
	font-weight: 600;
	background-color: <?php echo($COLOR_TB); ?>;
	color: <?php echo($COLOR_BODY); ?>;
	border-top: 1pt solid <?php echo($COLOR_TOPIC); ?>;
	border-left: 1pt solid <?php echo($COLOR_TOPIC); ?>;
	border-right: 1pt solid <?php echo($COLOR_TOPIC); ?>;
}

.thumbIndex A
{
	text-decoration: none;
	color: <?php echo($COLOR_BK); ?>;
	font-weight: 600;
}

.thumbIndex A.selected
{
	text-decoration: none;
	color: <?php echo($COLOR_BODY); ?>;
	font-weight: 600;
}

.thumbIndex A:hover, .thumbIndex A:active
{
	text-decoration: none;
	background: <?php echo($COLOR_BK); ?>;
	color: maroon;
}

.success
{
	color: #0000FF;
	font-weight: 800;
}

.mesframePreview
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
}

.framePreview
{
	background-color: <?php echo($COLOR_BK); ?>;
	color: <?php echo(COLOR_CD); ?>;
}