<?php
// First room skin and the default for new created ones
// "SteelBlue & black" skin for phpMyChat plus - by Bluntdog

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

/*	Color Input Box mod by Ciprian
Here you can customize the default color for messages window general look
the font for text messages, colors, some popup windows' text color, aso)
The variable color: <?php echo($CD); ?>  will make time, sender and message color have the same default color defined below.*/

	$CD = "black";			//default messages color (this color should be chosen in the Admin panel tab, filter color of this rooms' skin)

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
	color: <?php echo($CD); ?>;
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
	color: #e6e68f;
	font-weight: 600;
	cursor:pointer;
}

A:hover, A:active
{
	color: #FF9900;
	text-decoration: none;
	cursor:pointer;
 }

A.user, A.user:active
{
	text-decoration: none;
	color: #CCCCFF;
	font-weight: 600;
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
	color: <?php echo($CD); ?>;
	font-weight: 600;
	cursor:pointer;
 }

INPUT, SELECT, TEXTAREA
{
	background: #ffe4e1;
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

.quote
{
	<?php echo(isset($QUOTE_COLOR) && $QUOTE_COLOR != "" ? "border: thin ridge ".$QUOTE_COLOR.";" : ""); ?>;
	background: #FFFAFA;
	<?php echo(isset($QUOTE_COLOR) && $QUOTE_COLOR != "" ? "color: ".$QUOTE_COLOR.";" : ""); ?>;
	text-align: justify;
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

body {
position: absolute;
margin: 0;
padding: 0;
font: 80% verdana, arial, sans-serif;
}
dl, dt, dd, ul, li {
margin: 0;
padding: 0;
list-style-type: none;
z-index: 100;
}
#menu {
position: absolute; /* Menu position that can be changed at will */
top: 0;
left: auto;
z-index: 100;
width: 100%; /* precision for Opera */
margin-left:5px;
}
#menu dl {
float: left;
width: 12em;
z-index: 100;
}
#menu dt {
cursor: pointer;
text-align: center;
font-weight: bold;
background: #ccc;
border: 1px solid gray;
margin: 0px;
}
#menu dd {
display: none;
border: 1px solid gray;
}
#menu li {
text-align: center;
background: #fff;
}
#menu li a, #menu dt a {
color: #000;
text-decoration: none;
display: block;
height: 100%;
border: 0 none;
}
#menu li a:hover, #menu li a:focus, #menu dt a:hover, #menu dt a:focus {
background: #eee;
}
#site {
position: absolute;
z-index: 100;
top : 70px;
left : 10px;
color: #000;
background-color: #ddd;
padding: 5px;
border: 1px solid gray; 
}
#container {
position: relative;
top: 20px;
left: auto;
width: 800px;
height: 480px;
margin-left:10px;
z-index: 0;
overflow:auto;
}