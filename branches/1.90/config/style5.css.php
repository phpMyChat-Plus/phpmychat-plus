<?php
// Fifth room

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

	$CD = "green";			//default messages color

?>

BODY
{
	background-color: #006000;
	color: #d3d3d3;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #c0c0c0;
	scrollbar-arrow-color: #ffffff;
	scrollbar-base-color: #006400;
	scrollbar-track-color: #008000;
	scrollbar-darkshadow-color: #556b2f;
	scrollbar-face-color: #556b2f;
	scrollbar-highlight-color: #c0c0c0;
	scrollbar-shadow-color: #90ee90;
}

BODY.frame
{
	background-color: #006000;
	color: #d3d3d3;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
	scrollbar-3dlight-color: #c0c0c0;
	scrollbar-arrow-color: #ffffff;
	scrollbar-base-color: #006400;
	scrollbar-track-color: #008000;
	scrollbar-darkshadow-color: #556b2f;
	scrollbar-face-color: #556b2f;
	scrollbar-highlight-color: #c0c0c0;
	scrollbar-shadow-color: #90ee90;
}


BODY.mainframe
{
	background-color: #dcdcdc;
	color: <?php echo($CD); ?>;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	scrollbar-3dlight-color: #c0c0c0;
	scrollbar-arrow-color: #ffffff;
	scrollbar-base-color: #006400;
	scrollbar-track-color: #008000;
	scrollbar-darkshadow-color: #556b2f;
	scrollbar-face-color: #556b2f;
	scrollbar-highlight-color: #c0c0c0;
	scrollbar-shadow-color: #90ee90;
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
	color: #fffff0;
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

INPUT, SELECT, TEXTAREA
{
	background: #c0c0c0;
}

A.sender, A.sender:active
{
	text-decoration: none;
	color: <?php echo($CD); ?>;
	font-weight: 600;
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
	background-color: #006000;
	color: #d3d3d3;
	border-bottom: 1pt solid #d3d3d3;
};

.menuTitle
{
	font-size: <?php echo($medium); ?>pt;
	font-weight: 600;
	background-color: #006000;
	color: #d3d3d3;
};

.thumbIndex
{
	font-size: <?php echo($small); ?>pt;
	font-weight: 600;
	background-color: #9999CC;
	color: #d3d3d3;
	border-top: 1pt solid #d3d3d3;
	border-left: 1pt solid #d3d3d3;
	border-right: 1pt solid #d3d3d3;
};

.thumbIndex A
{
	text-decoration: none;
	color: #d3d3d3;
	font-weight: 600;
}

.thumbIndex A.selected
{
	text-decoration: none;
	color: #d3d3d3;
	font-weight: 600;
}

.thumbIndex A:hover, .thumbIndex A:active
{
	text-decoration: none;
	background: #006000;
	color: #FF9933;
}

.success
{
	font-weight: 800;
	color: #0000FF;
}