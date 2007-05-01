<?php
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
		$FontFace = "font-family: \"${FontName}, sans-serif\";";
		$SpecialFont = "1";
	}
	else
	{
		$FontFace = "font-family: helvetica, arial, geneva, sans-serif;";
	};
};

if (!isset($medium) || $medium == "") $medium = 10;
$large = round(1.4 * $medium);
$small = round(0.8 * $medium);
?>

.ChatBody
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	background-color: #4682b4;
	color: #FFFFFF;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
	margin: 5px;
	text-indent: 0;
}

.ChatTable
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	background-color: #CCCCFF;
	color: #000000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

.ChatTabTitle
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	background-color: #4682b4;
	color: #FFFFFF;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 800;
}

TR.ChatCell, TD.ChatCell, TH.ChatCell
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	color: #000000;
	font-size: <?php echo($medium); ?>pt;
	font-weight: 400;
}

TH.ChatCell
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	font-weight: 800;
}

<?php
if (isset($SpecialFont))
{
	?>
	A.ChatFonts
	{
		<?php if (isset($FontFace)) echo($FontFace); ?>
		text-decoration: underline;
		color: #FF0000;
		font-weight: 600;
		cursor:pointer;
	}

	A.ChatFonts:hover, A.ChatFonts:active
	{
		<?php if (isset($FontFace)) echo($FontFace); ?>
		color: #FF0000;
		text-decoration: none;
		cursor:pointer;
	}
	<?php
};
?>

A.ChatLink
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	text-decoration: underline;
	color: #FFFFFF;
	font-weight: 600;
	cursor:pointer;
}

A.ChatLink:hover, A.ChatLink:active
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	color: #FF9900;
	text-decoration: none;
	cursor:pointer;
}

A.ChatReg
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	text-decoration: underline;
	color: #4682b4;
	font-weight: 800;
	cursor:pointer;
}

A.ChatReg:hover,A.ChatReg:active
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	color: #FF9900;
	text-decoration: none;
	cursor:pointer;
}

INPUT.ChatBox, SELECT.ChatBox, TEXTAREA.ChatBox
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	background: #EEEEFF;
}

.ChatTitle
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	color: #CCCCFF;
	font-size: <?php echo($large); ?>pt;
	font-weight: 800;
}

.ChatError
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	font-size: <?php echo($medium); ?>pt;
	font-weight: 800;
	color: #FF0000;
}

.ChatCopy
{
	font-family: helvetica, arial, geneva, sans-serif;
	unicode-bidi: embed;
	color: #CCCCFF;
	font-size: 8pt;
}

A.ChatCopy, A.ChatCopy:active
{
	font-family: helvetica, arial, geneva, sans-serif;
	color: #FFFFFF;
	cursor:pointer;
}

.ChatP1
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	font-size: <?php echo($medium); ?>pt;
	color: #FFFFFF;
}

.ChatP2
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	font-size: <?php echo($medium); ?>pt;
	color: #000000;
}

.ChatFlags
{
	<?php if (isset($FontFace)) echo($FontFace); ?>
	color: #000000;
	font-size: 10pt;
	font-weight: 400;
}