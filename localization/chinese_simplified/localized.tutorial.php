<?php
// File : chinese_simplified/localized.tutorial.php - plus version (26.08.2008 - rev.10)
// Original translation by clouds_music <clouds.music@gmail.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE><?php echo(APP_NAME."-".APP_VERSION.APP_MINOR); ?>簡体中文版本使用手册</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
<STYLE>
A.topLink
{
	text-decoration: underline;
	color: #0000C0;
}

A.topLink:hover, A.topLink:active
{
	color: #FF9900;
	text-decoration: none;
	font-weight: 800;
}

.redText
{
	font-weight: 800;
	color: #FF0000;
}
</STYLE>
</HEAD>

<BODY BGCOLOR="#CCCCFF">

<P></P>
<TABLE BORDER="5" CELLPADDING="5" ALIGN="center">
<TR>
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>－ <?php echo(APP_NAME."-".APP_VERSION.APP_MINOR); ?> 簡体中文版本使用手册 －</FONT><br /><I>&copy; 2012<?php echo((date('Y')>"2012") ? "-".date('Y') : ""); ?> － 翻译者 <a href="mailto:clouds.music@gmail.com?subject=phpMyChat%20Plus%20translation" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>。'; return true;" title="<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>" target=_blank>clouds_music</a> 来自 - 台湾,台北。</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">使用手册 内容</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">选择语言</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">登入聊天室</A><br />
<A HREF="#register" CLASS="topLink">注册</A><br />
<A HREF="#modProfile" CLASS="topLink">修改<?php if (C_SHOW_DEL_PROF) echo("/删除"); ?> 个人资料</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">开新的聊天室</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">了解连接状态</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">发言</A><br />
<A HREF="#users_list" CLASS="topLink">聊天室成员列表分类</A><br />
<A HREF="#exit" CLASS="topLink">离开聊天室</A><br />
<A HREF="#users_popup" CLASS="topLink">知道谁在聊天，不用登录</A><br />
<P>
<A HREF="#customize" CLASS="topLink">聊天室的参数修改</A><br />
<P>
<A HREF="#commands" CLASS="topLink">功能与指令：</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">求助指令</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">头像</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">心情图示</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">讯息格式表示</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">邀请使用者进入您所在的聊天室</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">更换所在的聊天室</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">修改您在聊室里面的外形图示</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">回顾您所提交最后的讯息 或 指令</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">针对一个特定的用户</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">私人讯息</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">动态</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">忽略其他聊天者</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">取得其他聊天者的资料</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">储存聊天内容</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">主持人和管理员的特别命令：</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">送出一个公告</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">把使用者踢出聊天室</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">驱逐用户</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">升级/降级 一个已注册的使用者/到主持人：</A><br />
<P>
<hr />
<hr />

<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>选择语言：</B></A></FONT>
	<P>
	您可以选择 <?php echo(APP_NAME); ?> 已经翻译之中这些语言，点击开始页上的标志之一。在下面的例子中，用户选择法语：
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="选择语言的国旗">
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<!-- Hint: Use a Ctrl+H and find/replace "回页首" with your expression in this entire document -->
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>登入：</B></A></FONT>
<P>
如果您已经注册，只需输入您的用户名和密码登录。然后选择你想进入，然后按聊天室 ’<?php echo(L_SET_14); ?>’ 按钮。<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	否则你必须先 <A HREF="#register">注册</A> 。
	<?php
}
else
{
	?>
<P>
	否则你可以 <A HREF="#register">注册</A> 或者干脆进入一个房间，但你的昵称将不予保留（一旦你登录另一个用户可能使用相同的昵称）。
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>要注册：</B></A></FONT>
<P>
如果你还没有注册<?php if (!C_REQUIRE_REGISTER) echo(" and would like to"); ?>， 请选择注册选项。会出现一个小的弹出窗口。
<P>
<UL>
	<LI>首先，创建一个用户名 <?php if (!C_EMAIL_PASWD) echo(" 和密码"); ?> 到相应的框中键入自己。您选择的用户名，将自动显示在聊天室的名称。它不能包含空格，逗号或反斜线 (\)。
<?php if (C_NO_SWEAR) echo(" It can not contain \"swear words\"。"); ?>
	<LI>二，请输入你的名字，姓氏，和您的电子邮件地址。为了注册聊天，所有这些信息必须提供。性别信息是可选的。
	<LI>如果你有一个网页，你可以在框中输入网址。
	<LI>语言领域可能有助于在今后的讨论中的其他用户。他们会知道你理解的语言。
	<LI>最后，如果你想，让您的电子邮件地址被其他参与者观看，请检查“在公共信息显示电子邮件”旁边的方块。如果您不希望您的e - mail地址，可取消勾选该选择框。
	<LI>然后，按 <?php echo(L_REG_3); ?> 按钮 您的帐户将被创建。根据已经由管理员设置，您可能需要等待管理员的批准。无论如何，你会得到进一步的指示通知电子邮件。如果你想在任何时间停止，无需注册， 按 <?php echo(L_REG_25); ?> 按钮。
</UL>
<P>
<A NAME="modProfile"></A>当然，注册用户将能够修改<?php if (C_SHOW_DEL_PROF) echo("/删除"); ?> 通过点击相应的自己的个人资料 <?php echo((!C_SHOW_DEL_PROF ? "连结" : "连结")); ?>。<br />
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>开新的聊天室：</B></A></FONT>
	<P>
	已注册者可开新的聊天室，而私人的聊天室仅会显示于受邀请的聊天者，不会公开的显示出来。<br />
	<P>
	而新的聊天室名称它不能包含逗号 ' ， ' 及反斜线 ' \ ' 。<?php if (C_NO_SWEAR) echo(" 无法使用\"不雅字语\"。"); ?>
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>了解连接状态：</B></A></FONT>
	<P>
	一个标志，代表您的连接状态显示在屏幕的右上角。它可能采取三种形式：
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> 当没有连接 ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> 当连线正常 ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> 当连线失败。
	</UL>
	<P>
	在第三种情况下，点击红色 "按钮" 将推出一个新的连接尝试。
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>发送讯息(发言方法)：</B></A></FONT>
<P>
请将您的聊天讯息，键入左下方文字栏位中，输入完毕后按 Enter 或 送出 键。开始传送聊天讯息到所有聊天者的视窗中。<br />
<?php if (C_NO_SWEAR) echo("请注意 \"不雅字语\" 从发言讯息被过滤。"); ?>
<P>
您可以更改您的发言文字的颜色，从 文字栏位 右侧，文字颜色 选择框中，选择一个新的色彩。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>了解用户列表（没有供用户弹出窗口）：</B></A></FONT>
<P>
<OL>
	两个基本规则已经被定义为用户列表：<br />
	<LI>已经注册的用户显示一个小图标，显示性别 (点击它会启动此用户 <A HREF="#whois">WHOIS 弹出窗口</A>），而未经注册的用户什么都没有，显示空的;<br />
	<LI>而聊天室主人及系统管理员为斜体字。
</OL>
<P><I>例如</I>， 从下面的快照，你可以得出这样的结论：
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="用户列表">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas 是管理员或phpMyChat室主持人之一<br /><br />
		<LI>alien (其性别是不明的)， Jezek2 和 Caridad 是一般注册的使用者 可以进入没有额外“权力”的phpMyChat房间;<br /><br />
		<LI>lolo 是一个未经注册的用户。
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>离开聊天室：</B></A></FONT>
<P>
要退出聊天，只需点击一次在 <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'> 图示" : '"'.L_EXIT.'" link'; ?>， 在房间的右上角。此外，您也可以到您的文字发言方框中输入下列命令之一 : <br />
/exit<br />
/bye<br />
/quit<br />
这些命令可完成一个要发送的消息，在你离开前的聊天室。
<I>例如 ：</I> /quit 下次再见!!
<P>
将传送讯息 "下次再见!" 在主画面中，然后您登出。

<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>知道谁是没有被记录在聊天：</B></A></FONT>
<P>
您可以点击该链接显示在开始页面连接的用户数，或者，如果你是正在聊天，点击右边这个图示 => " <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo (L_DETACH); ?>"> " 在屏幕的右上角，将打开一个独立的窗口，显示连接的用户列表， 跟 他们在房间， 现在的情形。<br />
这个窗口的标题中包含的用户名， 如果他们是小于 3 ， 这编号属于用户 跟 被打开的房间。
<P>
在 这个弹出式窗口顶部 按一下 " <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo( L_BEEP); ?>"> " 图示  会 启用/禁用 哔哔的声音在用户进室时。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>自定义聊天室视图：</B></A></FONT>
<P>
有许多不同的方法来定制聊天的外观。要更改设置，只需到您的文字方块中键入相应的命令，并按下Enter / 传送 键。
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>这 <B>Clear 指令</B> 让您清洁主聊天屏幕，并显示最后 5 个发送的邮件在屏幕上。<br />键入 "/clear" 不带引号。
		<P>
		<?php
	}
	else
	{
		?>
		<LI>这 <B>Order 指令</B> 让您有新的消息出现在屏幕的顶部或底部之间切换。<br />键入 "/order" 不带引号。
		<P>
		<?php
	};
	?>
	<LI>这 <B>Notify 指令</B> 允许您打开或关闭看到的告示，当其他用户进入或退出聊天室的选项。默认情况下此选项 <?php echo(C_NOTIFY ? "on" : "off"); ?> 和 告示 <?php echo(C_NOTIFY ? "will" : "won’t"); ?> 可见。<br /> 键入 "/notify" 不带引号。
	<P>
	<LI>这 <B>Timestamp 指令</B> 允许您打开或关闭看到在状态栏上的每个消息和服务器时间发布消息之前的选项。默认情况下此选项 <?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?>。<br />键入 "/timestamp" 不带引号。
	<P>
	<LI>这 <B>Refresh 指令</B> 允许您调整在屏幕上刷新发布消息的速度。目前默认刷新率为 <?php echo(C_MSG_REFRESH); ?> 秒。要改变率 键入 "/refresh n" 不带引号， 其中 n 是在新的刷新率秒的时间。
	<P>
	<I>例如：</I> /refresh 5
	<P>
	将改变速率为 5秒。 *请注意，如果n设置为小于 3，刷新复位 不刷新（有用的，当你想不受打扰地阅读大量的旧消息）！
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>这 <B>Show 指令</B> 允许您调整屏幕上显示的消息的数量。要更改的默认数量， 键入 "/show n" 不带引号，其中 n 是可视信息的数量。
		<P>
		<I>例如：</I> /show 50
		<P>
		将导致50个最新的消息是在屏幕上可见。如果所有的消息都不能显示在消息框中，滚动条会出现在消息框的右侧。</UL>
		<?php
	}
	else
	{
		?>
		<LI>这 <B> show 和 Last 指令</B> 让你来清洁屏幕，并显示最近 <I>n</I> 讯息传送在你的屏幕上。 键入 "/show n" or "/last n" 不带引号， 其中 n 是可视信息的数量。
		<P>
		<I>例如：</I> /show 50 or /last 50
		<P>
			将清除消息帧，并造成50个最新的消息是在屏幕上可见。如果所有的消息都不能显示在消息框中，滚动条会出现在消息框的右侧。</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>功能和指令</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>指令：</B></A></FONT>
<P>
一旦进入一个聊天室，你可以启动一个弹出帮助通过点击 <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> 刚才位于讯息方块前的图像。您还可以 键入这个 <B>"/help" or "/?" 指令</B> 在讯息方块。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>头像：</B></A></FONT>
<P>Avatars 是图形头像图标表示聊天者。只有注册用户可以更改自己的头像。注册用户可以打开他们的个人资料 (看 <A HREF="#changeprofile">/profile</A> 指令)跟点击在头像图片，选择从图像选单，或输入一个URL的图形图像可以在互联网上的任何地方（只有图像可公开访问的，没有密码保护的网站）。图片应该是浏览器的可视 (.gif, .jpg, etc. ) 32 x 32 最佳显示像素的图形文件。
<P>点击在一个人的头像，消息框会弹出了那人的个人资料 (看 <A HREF="#whois">/whois</A> 指令)。
点击在自己的头像在用户的名单，将调用这 /profile 指令， 如果你是注册的用户。
如果你没有注册，点击自己的头像（系统默认），会带来警示，以鼓励您注册。
  <P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<?php
}
?>
<!-- Avatar System End. -->
<hr />

<?php
if (C_USE_SMILIES)
{
	include("./lib/smilies.lib.php");
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"tutorial");
	unset($SmiliesTbl);
	?>
	<FONT SIZE="+1"><A NAME="smilies"><B>表情符号：</B></A></FONT>
	<P>您的讯息内可能有图形的表情符号。 看到下面的代码，你必须输入到一个消息，到获得每一个这些表情符号。
	<P>
	<I>例如</I>， 发送文本 "Hi Jack :)" 不带引号 将显示讯息 <B>Hi Jack</B> <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> 在主画面中。
	<P ALIGN="center">
	<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=5>
	<?php
	$i = "0";
	$Nb = count($ResultTbl);
	while($i < $Nb)
	{
		if ($i > 0) echo("\t");
		echo("<TR VALIGN=\"BOTTOM\">\n");
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n\t<TR>\n");
		$i++;
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n");
		$i++;
	};
	unset($ResultTbl);
	?>
	</TABLE>
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>文字格式：</B></A></FONT>
	<P>
	文字可以是粗体，斜体或下划线，通过包围这适用部分于您的文字 无论是 &LT;B&GT; &LT;/B&GT， &LT;I&GT; &LT;/I&GT; or &LT;U&GT; &LT;/U&GT HTML 标记。
	<P>
	<I>例如</I>， &LT;B&GT;文字&LT;/B&GT; 会产生 <B>文字</B>。
	<P>
	要创建一个 电子邮件地址 或 URL 的超链接， 键入 网址 （不包括任何 HTML 标记）。超链接将自动创建。
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
	<P>
	<hr />
	<?php
};
?>

<!-- Color Input Box mod by Ciprian start -->
<P>
<FONT SIZE="+1"><A NAME="colors"><B><U><?php echo(L_COL_TUT); ?></U></B></A></FONT>
<P>
<b><?php echo(L_COL_HELP_SUB1); ?></b><br /><?php echo(L_COL_HELP_P1); ?><br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB2); ?></b><br /><?php echo(L_COL_HELP_P2); ?><br /><br /><center><?php echo(COLOR_LIST); ?></center><br /><?php echo(L_COL_HELP_P2a); ?><br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB3); ?></b><br />
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php if (COLOR_FILTERS) echo("a) COLOR_FILTERS = <b>".(COLOR_FILTERS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".(COLOR_ALLOW_GUESTS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />c) COLOR_NAMES = <b>".(COLOR_NAMES == 1 ? L_ENABLED : L_DISABLED)."</b>。<br />"); ?>
<?php if (COLOR_FILTERS) echo("<u>".L_COLOR_HEAD_SETTINGSa."</u> ".L_WHOIS_ADMIN." = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>， ".L_WHOIS_MODERS." = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>， ".L_WHOIS_OTHERS." = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>。"); else echo("<u>".L_COLOR_HEAD_SETTINGSb."</u> <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>。") ?><br />
<u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("<font color=".COLOR_CA.">".L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo("<font color=".COLOR_CA.">".L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo("<font color=".COLOR_CM.">".L_WHOIS_MODER); else echo("<font color=".COLOR_CD.">".L_WHOIS_GUEST); echo("</font>");?></b>。<br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>邀请别人加入您目前的聊天室：</B></A></FONT>
<P>
您可以使用 <B>invite 指令</B> 邀请用户加入聊天室
<P>
<I>例如：</I> /invite Jack
<P>
将发送悄悄话给 Jack 建议他加入您在的聊天室。此消息包含目标房间的名称，这个名字会出现一个链接。
<P>
请注意，你可以把多个用户名，在邀请指令（例如："/invite Jack,Helen,Alf")。 他们必须由逗号（,）分割，没有空格。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>更换聊天室：</B></A></FONT>
<P>
屏幕右侧的列表提供了一个聊天室和用户目前在那个房间里的人的名单。离开房间，你是在和移动到其中一个房间，只需点击一次的那个房间的名称。空房间没有出现在这个名单。您也可以通过键入<B>指令 "/join #房间名称"</B>移动到另一个房间，不带引号。
<P>
<I>例如：</I> /join #Red Room
<P>
会移动你进入 "Red Room"。
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>If you’re a registered user, you" : "<br /><P>You");
	?>
	 也可以创建一个与此相同的新房间 指令。 但你必须指定其 键入: 0 代表为私人， 1 公开（默认值）。
	<P>
	<I>例如：</I> /join 0 #My Room
	<P>
	将创建一个新的私人空间（假设尚未有该名称将创建一个公开的），被称为“My Room”，并把你移到这。
	<P>
	房间的名称不能包含逗号或反斜线 (\)。<?php if (C_NO_SWEAR) echo(" 它不能包含 \"脏话\"。"); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>修改您在聊天室的个人资料：</B></FONT>
<P>
这 <B>Profile 指令</B> 会创建一个单独弹出窗口，您可以在其中编辑您的使用者设定档，并修改它除了你的昵称和密码（您必须使用在起始页面的链接，执行此操作）。<br />键入 /profile
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>回顾过去你已经提交的讯息，或指令：</B></FONT>
<P>
这 <B>! 指令</B> 回顾你已经提交的最后一个讯息或指令。<br />键入 /!
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>回应一个特定的用户：</B></FONT>
<P>
点击一次从另一个用户名列表（在屏幕右侧）将导致他们的 “用户名>” ，出现在你的的文本框。此功能允许您轻松地直接给用户公开讯息，也许反应的东西，他或她已张贴上述。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>私人讯息：</B></A></FONT>
<P>
要发送私人密谈讯息到另一个用户当前在您的聊天室，键入 <B>命令：“/用户名 /msg 消息文本”或“/用户名 消息文本”</B>不带引号。
<P>
<I>例如，Jack 是用户名：</I> /msg Jack 您好，你怎么样？
<P>
该密谈会出现给Jack和你自己，但其他用户不能看到密谈。
<P>
密谈 功能启用时，它也可以发送密谈在不同的房间的用户，使用<B>命令 “/wisp 用户名 消息文本”</B>不带引号。
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
点击在主画面中说话的人的昵称，会自动添加 /to 或 /wisp 命令输入字段的消息。
<?php
}
else
{
?>
点击在右侧用户列表的，用户图像，会自动打开弹出窗口，等待您 键入 您发言内文 并请 按下 ENTER 发送讯息。您会收到的回覆会自动在新窗口打开。
<?php
}
?>
<P>
注：当密谈启用弹出窗口（在聊天设置和自己的个人资料），您就可以进行审查，因为你最后一次聊天记录或您收到的所有离线的项目管理，而你“离开”所有新离线给你的项目管理，将会打开一个弹出窗口，你可以回答他们一个个从同一个窗口。这种离线的特点是只对注册用户可用。
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>。<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>动态</B></A></FONT>
<P>
要描述自己在做什么，您可以使用<B>指令 "/me 动态"</B> 不带引号，
<P>
<I>例如：</I>假如 Jack 发送这讯息 "/me 喝咖啡" 讯息框将显示 "<B>* Jack</B> 喝咖啡"。
<P>
由于这个变化 指令， 还有就是 <B>/mr 指令</B> 可用， 这也将在前面的用户名性别称号。
<P>
<I>例如：</I>假如 Jack 发送这讯息 "/mr 正在看电视" the message frame will show "<B>* Jack <?php echo(L_HELP_MR); ?></B> 正在看电视"。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>忽略其他用户：</B></A></FONT>
<P>
要忽略由其他用户发言的所有讯息， 键入这个 <B>指令 "/ignore username"</B> 不带引号。
<P>
<I>例如：</I> /ignore Jack
<P>
从那个时候起，由用户 Jack 发言的讯息 将没有显示在荧幕上。
<P>
若要有一个消息被忽略的用户列表。 只需键入这个 <B>指令 "/ignore"</B> 不带引号。
<P>
恢复一个被忽略的用户的消息显示，键入这 <B>指令 "/ignore - username"</B> 不带引号， 其中 "-" 是一个连字符（减号）。<P>
<P>
<I>例如：</I> /ignore - Jack
<P>
现在所有由 Jack 发布的消息在当前的聊天会话将显示在屏幕上，包括 Jack 之前张贴的那些消息 键入这指令。<br />
如果你不指定一个连字符的用户名后，你的“忽略列表”将被清理。
<P>
请注意，你可以把多个用户名用在这 ignore 指令 (e.g. "/ignore Jack,Helen,Alf" or "/ignore - Jack,Alf")。 他们必须由逗号（，）分割，没有空格。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>获取有关用户的信息：</B></A></FONT>
<P>
要查看有关用户的公开的资料， 键入 <B>指令 "/whois 用户名"</B> 不带引号。
<P>
<I>例如：</I> /whois Jack
<P>
其中，“Jack”是用户名。这个命令将创建一个单独的弹出窗口，将显示有关该用户的公开信息。使用你自己的名字查阅您的个人资料信息如何显示给其他用户使用相同的命令。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>储存讯息：</B></A></FONT>
	<P>
	到导出讯息（通知的除外）到本机 HTML档案， 键入 <B>指令 "/save n"</B> 不带引号。
	<P>
	<I>例如：</I> /save 5
	<P>
	其中 ’5’ 是保存的讯息数量。 如果 n 没有指定， 所有可用的消息传送到当前房间。
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />

<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>管理员命令 和/或版主唯一</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>发怖公告：</B></A></FONT>
<P>
管理员可以进行系统广泛公告所有的房间，并达到目前所有的用户与登录 <B>公告指令</B>。
<P>
<I>例如： /announce 聊天系统将在，今天晚上八时进行维护。</I>
<P>
还有另外一个有用的角色扮演聊天像命令公告;在一个房间里的管理员或版主也可以在当前房间或与所有的房间发送一条消息给所有用户<B>房间的命令</B>。
<P>
<I>例如： /room 会议在15日下午开始。</I> 或 <I>/room * 在15日下午会议开始在职员室。</I>
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>踢用户：</B></FONT>
<P>
主持人可以踢用户 和 管理员可以踢与一个用户或一个主持人 <B>kick 指令</B>。 被踢的用户，必须在当前的房间，管理员才可以踢其他房间的用户。
<P>
<I>例如</I>， 如果 Jack 是要踹离开的用户名： <I>/kick Jack</I> 或 <I>/kick Jack 踢的理由</I>。 这里 "踢的理由" 可以是任何文本，例如“因为滥发讯息!"
<P>
如果使用 * 选项 ( <I>/kick * <?php echo(L_HELP_REASON); ?></I> )， 这指令将踢出聊天所有的用户不论权限（只有游客和注册用户）。服务器连接时出现问题，所有的人应该重新载入他们的聊天，这是非常有用的。在第二种情况下， <I><?php echo(L_HELP_REASON); ?></I> 建议让用户知道为什么他们已经被踢出。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>

<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>驱逐一个用户：</B></A></FONT>
	<P>
	主持人可以驱逐一个用户，管理员可以驱逐一个用户或主持人使用 <B>ban 指令</B>。<br />
	管理员可以驱逐一个用户 从另一个房间 超过他正在聊天的聊天室。 他也可以永远驱逐一个用户和禁止使用整个聊天系统 ’<B>*</B>’ 设置必须在用户裂口之前插入将被驱逐。

	<P>
	<I>例如</I>， 如果 Jack 是驱逐的用户名： <I>/ban Jack</I>， <I>/ban * Jack</I>， <I>/ban Jack 驱逐的理由</I> 或 <I>/ban * Jack 驱逐的理由</I>。 这 "驱逐的理由" 可以是任何文字，例如“滥发讯息!"
	<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>升级/降级 一个已注册的使用者/到主持人：</B></A></FONT>
<P>
聊天室主人及系统管理员，可以将已注册的使用者，提拔成为聊天室主人，使用 <B>Promote 指令</B>。
<P>
<I>例如 ： </I>， 如果 Jack 是要升级的用户的名字，使用 <I>/promote Jack</I>  将 Jack 提拔成为聊天室主人。( 当 Jack 是一位已注册使用者 }， 
<P>
只有系统管理员能反向操作降级 (将聊天室主人降为一般使用者) 使用 <B>demote 指令</B>。
<P>
<I>例如 ： </I>， 如果 Jack 是要降级的用户的名字，使用 <I>/demote Jack</I> 或 <I>/demote * Jack</I> (将降职他从现在或所有房间)。
<br /><P ALIGN="right"><A HREF="#top">回页首</A></P>
<P>
</BODY>
</HTML>
<?php
?>