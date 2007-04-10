<?php
// First private room skin ("Private Room 1" as default)
// "DarkRed & maroon" skin for phpMyChat plus - by Ealdwulf

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
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

/*	Color Input Box mod by Ciprian
Here you can customize the default color for messages window general look
the font for text messages, colors, some popup windows' text color, aso.
This will make time, sender and message color have the same default color defined bellow.*/

	$CD = "maroon";			//default messages color (this color should be chosen in the Admin panel tab, filter color of this rooms' skin)

?>

BODY
{
	background-color: #8b0000;
	color: #cccccc;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffffff;
	scrollbar-base-color: #808080;
	scrollbar-track-color: #fa8072;
	scrollbar-darkshadow-color: #ffa500;
	scrollbar-face-color: #8b0000;
	scrollbar-highlight-color: #fffff0;
	scrollbar-shadow-color: #808080;
}

BODY.frame
{
	background-color: #8b0000;
	color: #cccccc;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffffff;
	scrollbar-base-color: #808080;
	scrollbar-track-color: #fa8072;
	scrollbar-darkshadow-color: #ffa500;
	scrollbar-face-color: #8b0000;
	scrollbar-highlight-color: #fffff0;
	scrollbar-shadow-color: #808080;
}

BODY.mainframe
{
	background-color: #dcdcdc;
	color: <?php echo($CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffffff;
	scrollbar-base-color: #808080;
	scrollbar-track-color: #fa8072;
	scrollbar-darkshadow-color: #ffa500;
	scrollbar-face-color: #8b0000;
	scrollbar-highlight-color: #fffff0;
	scrollbar-shadow-color: #808080;
}

TABLE, TR, TD, TH
{
	color: #000000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	vertical-align: top;
}

IMG
{
	vertical-align: top;
}

TD.whois, .whois
{
	color: #CCCCFF;
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
	color: #ffffe0;
	font-weight: 600;
}

A:hover, A:active
{
	color: #FF9900;
	text-decoration: underline;
}

A.user, A.user:active
{
	text-decoration: none;
	color: #ffffe0;
	font-weight: 600;
}

A.admin, A.admin:active
{
	text-decoration: none;
	color: #FF0000;
	font-weight: 600;
}

A.mod, A.mod:active
{
	text-decoration: none;
	color: #0000FF;
	font-weight: 600;
}

A.sender, A.sender:active
{
	text-decoration: none;
	color: <?php echo($CD); ?>;
	font-weight: 600;
}

INPUT, SELECT, TEXTAREA
{
	background: #cccccc;
}

.msg
{
	margin-top: 0px;
	margin-bottom: 2px;
	margin-left: <?php #echo($Charset == "windows-1256" ? "5" : "55"); ?>0px;
	margin-right: <?php #echo($Charset == "windows-1256" ? "55" : "5"); ?>0px;
	text-indent: 0px;
}

.msg2
{
	background: #FFFAFA;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: <?php #echo($Charset == "windows-1256" ? "5" : "55"); ?>0px;
	margin-right: <?php #echo($Charset == "windows-1256" ? "55" : "5"); ?>0px;
	text-indent: 0px;
}

.title
{
	color: #CCCCFF;
	font-size: <?php echo($large); ?>pt;
	font-weight: 800;
}

.table
{
	background-color: #CCCCFF;
	color: #000000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.tabtitle
{
	background-color: #4682b4;
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
	color: <?php echo($CD); ?>;
	font-size: <?php echo($FontSize); ?>;
}

.notify
{
	color: #4682b4;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

.notify2
{
	color: #FF0000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
}

.menu
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color: #8b0000;
	color: #cccccc;
	border-bottom: 1pt solid #cccccc;
};

.menuTitle
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color: #8b0000;
	color: #cccccc;
};

.thumbIndex
{
	font-size: <?php echo($small); ?>pt;
	font-weight: 600;
	background-color: #9999CC;
	color: #cccccc;
	border-top: 1pt solid #cccccc;
	border-left: 1pt solid #cccccc;
	border-right: 1pt solid #cccccc;
};

.thumbIndex A
{
	text-decoration: none;
	color: #cccccc;
	font-weight: 600;
}

.thumbIndex A.selected
{
	text-decoration: none;
	color: #cccccc;
	font-weight: 600;
}

.thumbIndex A:hover, .thumbIndex A:active
{
	text-decoration: none;
	background: #8b0000;
	color: #FF9933;
}

.success
{
	font-weight: 800;
	color: #0000FF;
}