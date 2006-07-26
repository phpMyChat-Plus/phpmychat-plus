<?php
// First room and the default for new created ones

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
	elseif ($Charset == "iso-8859-1" || $Charset == "iso-8859-2")
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
the font for text messages, colors, some popup windows' text color, aso)
Optionally you might want to replace color: #000000; in the .time block with:
 	color: <?php echo($CD); ?>;
This will make time, sender and message color have the same default color defined bellow.*/

$CD = "black";			//default messages color

?>

BODY
{
	background-color: #4682b4;
	color: #ffe4e1;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffff00;
	scrollbar-base-color: #191970;
	scrollbar-track-color: #ffdead;
	scrollbar-darkshadow-color: #0000ff;
	scrollbar-face-color: #37658d;
	scrollbar-highlight-color: #ffff00;
	scrollbar-shadow-color: #808080;
}

BODY.frame
{
	background-color: #4682b4;
	color: #ffe4e1;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #00ffff;
	scrollbar-arrow-color: #ffff00;
	scrollbar-base-color: #191970;
	scrollbar-track-color: #ffdead;
	scrollbar-darkshadow-color: #0000ff;
	scrollbar-face-color: #37658d;
	scrollbar-highlight-color: #ffff00;
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
	scrollbar-arrow-color: #ffff00;
	scrollbar-base-color: #191970;
	scrollbar-track-color: #ffdead;
	scrollbar-darkshadow-color: #0000ff;
	scrollbar-face-color: #37658d;
	scrollbar-highlight-color: #ffff00;
	scrollbar-shadow-color: #808080;
}

TABLE, TR, TD, TH
{
	color: #000000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
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
	color: #e6e68f;
	font-weight: 600;
}

A:hover, A:active
{
	color: #FF9900;
	text-decoration: underline overline;
}

A.user, A.user:active
{
	text-decoration: none;
	color: #CCCCFF;
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
	background: #fffff0;
}

.msg
{
	margin-top: 0px;
	margin-bottom: 2px;
	margin-left: <?php echo($Charset == "windows-1256" ? "5" : "55"); ?>px;
	margin-right: <?php echo($Charset == "windows-1256" ? "55" : "5"); ?>px;
	text-indent: -50px;
}

.msg2
{
	background: #FFFAFA;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-left: <?php echo($Charset == "windows-1256" ? "5" : "55"); ?>px;
	margin-right: <?php echo($Charset == "windows-1256" ? "55" : "5"); ?>px;
	text-indent: -50px;
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
	background-color: #666699;
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
	font-size: 8pt;
}

.notify
{
	color: #666699;
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
	background-color: #4682b4;
	color: #ffe4e1;
	border-bottom: 1pt solid #ffe4e1;
};

.menuTitle
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color: #4682b4;
	color: #ffe4e1;
};

.thumbIndex
{
	font-size: <?php echo($small); ?>pt;
	font-weight: 600;
	background-color: #9999CC;
	color: #ffe4e1;
	border-top: 1pt solid #ffe4e1;
	border-left: 1pt solid #ffe4e1;
	border-right: 1pt solid #ffe4e1;
};

.thumbIndex A
{
	text-decoration: none;
	color: #ffe4e1;
	font-weight: 600;
}

.thumbIndex A.selected
{
	text-decoration: none;
	color: #ffe4e1;
	font-weight: 600;
}

.thumbIndex A:hover, .thumbIndex A:active
{
	text-decoration: none;
	background: #4682b4;
	color: #FF9933;
}

.success
{
	font-weight: 800;
	color: #0000FF;
}