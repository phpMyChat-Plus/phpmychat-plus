<?php
// File: chinese_traditional/localized.tutorial.php - plus version (26.08.2008 - rev.10)
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
<TITLE><?php echo(APP_NAME."－".APP_VERSION.APP_MINOR); ?>繁體中文版本使用手冊</TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>－ <?php echo(APP_NAME."－".APP_VERSION.APP_MINOR); ?> 繁體中文版本使用手冊 －</FONT><br /><I>&copy; 2012<?php echo((date('Y')>"2012") ? "-".date('Y') : ""); ?> － 翻譯者 <a href="mailto:clouds.music@gmail.com?subject=phpMyChat%20Plus%20translation" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>。'; return true;" title="<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>" target=_blank>clouds_music</a> 來自 - 台灣，台北。</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">使用手冊 內容</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">選擇語言</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">登入聊天室</A><br />
<A HREF="#register" CLASS="topLink">註冊</A><br />
<A HREF="#modProfile" CLASS="topLink">修改<?php if (C_SHOW_DEL_PROF) echo("/刪除"); ?> 個人資料</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">開新的聊天室</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">了解連接狀態</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">發言</A><br />
<A HREF="#users_list" CLASS="topLink">聊天室成員列表分類</A><br />
<A HREF="#exit" CLASS="topLink">離開聊天室</A><br />
<A HREF="#users_popup" CLASS="topLink">知道誰在聊天，不用登錄</A><br />
<P>
<A HREF="#customize" CLASS="topLink">聊天室的參數修改</A><br />
<P>
<A HREF="#commands" CLASS="topLink">功能與指令：</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">求助指令</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">頭像</A><br />
<?php
}
?>
<!-- Avatar System End. -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">心情圖示</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">訊息格式表示</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">邀請使用者進入您所在的聊天室</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">更換所在的聊天室</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">修改您在聊室裡面的外形圖示</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">回顧您所提交最後的訊息 或 指令</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">針對一個特定的用戶</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">私人訊息</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">動態</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">忽略其他聊天者</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">取得其他聊天者的資料</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">儲存聊天內容</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">主持人和管理員的特別命令：</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">送出一個公告</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">把使用者踢出聊天室</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">驅逐用戶</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">升級/降級 一個已註冊的使用者/到主持人</A><br />
<P>
<hr />
<hr />

<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>選擇語言：</B></A></FONT>
	<P>
	您可以選擇 <?php echo(APP_NAME); ?> 已經翻譯之中這些語言，點擊開始頁上的標誌之一。在下面的例子中，用戶選擇法語：
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="選擇語言的國旗">
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<!-- Hint: Use a Ctrl+H and find/replace "回頁首" with your expression in this entire document -->
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>登入：</B></A></FONT>
<P>
如果您已經註冊，只需輸入您的用戶名和密碼登錄。然後選擇你想進入，然後按聊天室 ’<?php echo(L_SET_14); ?>’ 按鈕。<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	否則你必須先 <A HREF="#register">註冊</A>。
	<?php
}
else
{
	?>
<P>
	否則你可以 <A HREF="#register">註冊</A> 或者乾脆進入一個房間，但你的暱稱將不予保留（一旦你登錄另一個用戶可能使用相同的暱稱）。
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>要註冊：</B></A></FONT>
<P>
如果你還沒有註冊<?php if (!C_REQUIRE_REGISTER) echo("並且希望註冊"); ?>，請選擇註冊選項。會出現一個小的彈出窗口。
<P>
<UL>
	<LI>首先，創建一個用戶名<?php if (!C_EMAIL_PASWD) echo("和密碼"); ?> 到相應的框中鍵入自己。您選擇的用戶名，將自動顯示在聊天室的名稱。它不能包含空格，逗號或反斜線 (\)。
<?php if (C_NO_SWEAR) echo("它不能包含 \"髒話\"。"); ?>
	<LI>二，請輸入你的名字，姓氏，和您的電子郵件地址。為了註冊聊天，所有這些信息必須提供。性別信息是可選的。
	<LI>如果你有一個網頁，你可以在框中輸入網址。
	<LI>語言領域可能有助於在今後的討論中的其他用戶。他們會知道你理解的語言。
	<LI>最後，如果你想，讓您的電子郵件地址被其他參與者觀看，請檢查“<?php echo(L_REG_33); ?>”旁邊的方塊。如果您不希望您的e - mail地址，可取消勾選該選擇框。
	<LI>然後，按 <?php echo(L_REG_3); ?> 按鈕 您的帳戶將被創建。根據已經由管理員設置，您可能需要等待管理員的批准。無論如何，你會得到進一步的指示通知電子郵件。如果你想在任何時間停止，無需註冊，按 <?php echo(L_REG_25); ?> 按鈕。
</UL>
<P>
<A NAME="modProfile"></A>當然，註冊用戶將能夠修改<?php if (C_SHOW_DEL_PROF) echo("/刪除"); ?> 通過點擊相應的自己的個人資料 <?php echo((!C_SHOW_DEL_PROF ? "連結" : "連結")); ?>。<br />
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>開新的聊天室：</B></A></FONT>
	<P>
	已註冊者可開新的聊天室，而私人的聊天室僅會顯示於受邀請的聊天者，不會公開的顯示出來。<br />
	<P>
	而新的聊天室名稱它不能包含逗號 ’，’ 及反斜線 ’\’。<?php if (C_NO_SWEAR) echo("無法使用\"不雅字語\"。"); ?>
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>了解連接狀態：</B></A></FONT>
	<P>
	一個標誌，代表您的連接狀態顯示在屏幕的右上角。它可能採取三種形式：
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> 當沒有連接 ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> 當連線正常 ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> 當連線失敗。
	</UL>
	<P>
	在第三種情況下，點擊紅色 "按鈕" 將推出一個新的連接嘗試。
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>發送訊息(發言方法)：</B></A></FONT>
<P>
請將您的聊天訊息，鍵入左下方文字欄位中，輸入完畢後按 輸入鍵 或 送出 鍵。開始傳送聊天訊息到所有聊天者的視窗中。<br />
<?php if (C_NO_SWEAR) echo("請注意 \"不雅字語\" 從發言訊息被過濾。"); ?>
<P>
您可以更改您的發言文字的顏色，從 文字欄位 右側，文字顏色 選擇框中，選擇一個新的色彩。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>了解用戶列表（沒有供用戶彈出窗口）：</B></A></FONT>
<P>
<OL>
	兩個基本規則已經被定義為用戶列表：<br />
	<LI>已經註冊的用戶顯示一個小圖標，顯示性別 (點擊它會啟動此用戶 <A HREF="#whois">WHOIS 彈出窗口</A>），而未經註冊的用戶什麼都沒有，顯示空的;<br />
	<LI>而聊天室主人及系統管理員為斜體字。
</OL>
<P><I>例如</I>, 從下面的快照，你可以得出這樣的結論：
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="用戶列表">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas 是管理員或phpMyChat室主持人之一<br /><br />
		<LI>alien (其性別是不明的), Jezek2 和 Caridad 是一般註冊的使用者 可以進入沒有額外“權力”的phpMyChat房間;<br /><br />
		<LI>lolo 是一個未經註冊的用戶。
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>離開聊天室：</B></A></FONT>
<P>
要退出聊天，只需點擊一次在 <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'> 圖示" : '"'.L_EXIT.'" link'; ?>, 在房間的右上角。此外，您也可以到您的文字發言方框中輸入下列命令之一 : <br />
/exit<br />
/bye<br />
/quit<br />
這些命令可完成一個要發送的消息，在你離開前的聊天室。
<I>例如：</I>/quit 下次再見！！！
<P>
將傳送訊息 "下次再見！" 在主畫面中，然後您登出。

<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>知道誰是沒有被記錄在聊天：</B></A></FONT>
<P>
您可以點擊該鏈接顯示在開始頁面連接的用戶數，或者，如果你是正在聊天，點擊右邊這個圖示 => " <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo (L_DETACH); ?>"> " 在屏幕的右上角，將打開一個獨立的窗口，顯示連接的用戶列表, 跟 他們在房間, 現在的情形。<br />
這個窗口的標題中包含的用戶名, 如果他們是小於 3 , 這編號屬於用戶 跟 被打開的房间。
<P>
在 這個彈出式窗口頂部 按一下 "<IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo( L_BEEP); ?>">" 圖示？會 啟用/禁用 嗶嗶的聲音在用戶進室時。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>自定義聊天室視圖：</B></A></FONT>
<P>
有許多不同的方法來定制聊天的外觀。要更改設置，只需到您的文字方塊中鍵入相應的命令，並按下輸入鍵/傳送 鍵。
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>這 <B>Clear 指令</B> 讓您清潔主聊天屏幕，並顯示最後 5 個發送的郵件在屏幕上。<br />鍵入 "/clear" 不帶引號。
		<P>
		<?php
	}
	else
	{
		?>
		<LI>這 <B>Order 指令</B> 讓您有新的消息出現在屏幕的頂部或底部之間切換。<br />鍵入 "/order" 不帶引號。
		<P>
		<?php
	};
	?>
	<LI>這 <B>Notify 指令</B> 允許您打開或關閉看到的告示，當其他用戶進入或退出聊天室的選項。默認情況下此選項 <?php echo(C_NOTIFY ? "開" : "關"); ?> 和 告示 <?php echo(C_NOTIFY ? "將會" : "不會"); ?> 可見。<br /> 鍵入 "/notify" 不帶引號。
	<P>
	<LI>這 <B>Timestamp 指令</B> 允許您打開或關閉看到在狀態欄上的每個消息和服務器時間發布消息之前的選項。默認情況下此選項 <?php echo(C_SHOW_TIMESTAMP ? "開" : "關"); ?>。<br />鍵入 "/timestamp" 不帶引號。
	<P>
	<LI>這 <B>Refresh 指令</B> 允許您調整在屏幕上刷新發布消息的速度。目前默認刷新率為 <?php echo(C_MSG_REFRESH); ?> 秒。要改變率 鍵入 "/refresh n" 不帶引號, 其中 n 是在新的刷新率秒的時間。
	<P>
	<I>例如：</I>/refresh 5
	<P>
	將改變速率為 5秒。*請注意，如果n設置為小於 3，刷新復位 不刷新（有用的，當你想不受打擾地閱讀大量的舊消息）！
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>這 <B>Show 指令</B> 允許您調整屏幕上顯示的消息的數量。要更改的默認數量，鍵入 "/show n" 不帶引號,其中 n 是可視信息的數量。
		<P>
		<I>例如：</I>/show 50
		<P>
		將導致50個最新的消息是在屏幕上可見。如果所有的消息都不能顯示在消息框中，滾動條會出現在消息框的右側。</UL>
		<?php
	}
	else
	{
		?>
		<LI>這 <B> show 和 Last 指令</B> 讓你來清潔屏幕，並顯示最近 <I>n</I> 訊息傳送在你的屏幕上。鍵入 "/show n" 或 "/last n" 不帶引號, 其中 n 是可視信息的數量。
		<P>
		<I>例如：</I>/show 50 或 /last 50
		<P>
			將清除消息幀，並造成50個最新的消息是在屏幕上可見。如果所有的消息都不能顯示在消息框中，滾動條會出現在消息框的右側。</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>功能和指令</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>指令：</B></A></FONT>
<P>
一旦進入一個聊天室，你可以啟動一個彈出幫助通過點擊 <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> 剛才位於訊息方塊前的圖像。您還可以 鍵入這個 <B>"/help" 或 "/?" 指令</B> 在訊息方塊。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>頭像：</B></A></FONT>
<P>Avatars 是圖形頭像圖標表示聊天者。只有註冊用戶可以更改自己的頭像。註冊用戶可以打開他們的個人資料 (看 <A HREF="#changeprofile">/profile</A> 指令)跟點擊在頭像圖片，選擇從圖像選單，或輸入一個URL的圖形圖像可以在互聯網上的任何地方（只有圖像可公開訪問的，沒有密碼保護的網站）。圖片應該是瀏覽器的可視 (.gif, .jpg, etc. ) 32 x 32 最佳顯示像素的圖形文件。
<P>點擊在一個人的頭像，消息框會彈出了那人的個人資料 (看 <A HREF="#whois">/whois</A> 指令)。
點擊在自己的頭像在用戶的名單，將調用這 /profile 指令, 如果你是註冊的用戶。
如果你沒有註冊，點擊自己的頭像（系統默認），會帶來警示，以鼓勵您註冊。
<P ALIGN="right"><A HREF="#top">回頁首</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>表情符號：</B></A></FONT>
	<P>您的訊息內可能有圖形的表情符號。看到下面的代碼，你必須輸入到一個消息，到獲得每一個這些表情符號。
	<P>
	<I>例如</I>, 發送文本 "嗨 Jack :)" 不帶引號 將顯示訊息 <B>嗨 Jack</B> <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> 在主畫面中。
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
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>文字格式：</B></A></FONT>
	<P>
	文字可以是粗體，斜體或下劃線，通過包圍這適用部分於您的文字 無論是 &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; 或 &LT;U&GT; &LT;/U&GT HTML 標記。
	<P>
	<I>例如</I>, &LT;B&GT;文字&LT;/B&GT; 會產生 <B>文字</B>。
	<P>
	要創建一個 電子郵件地址 或 URL 的超鏈接, 鍵入 網址 （不包括任何 HTML 標記）。超鏈接將自動創建。
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
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
<?php if (COLOR_FILTERS) echo("a) COLOR_FILTERS = <b>".(COLOR_FILTERS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".(COLOR_ALLOW_GUESTS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />c) COLOR_NAMES = <b>".(COLOR_NAMES == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<?php if (COLOR_FILTERS) echo("<u>".L_COLOR_HEAD_SETTINGSa."</u> ".L_WHOIS_ADMIN." = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, ".L_WHOIS_MODERS." = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, ".L_WHOIS_OTHERS." = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>."); else echo("<u>".L_COLOR_HEAD_SETTINGSb."</u> <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.") ?><br />
<u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("<font color=".COLOR_CA.">".L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo("<font color=".COLOR_CA.">".L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo("<font color=".COLOR_CM.">".L_WHOIS_MODER); else echo("<font color=".COLOR_CD.">".L_WHOIS_GUEST); echo("</font>");?></b>.<br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>邀請別人加入您目前的聊天室：</B></A></FONT>
<P>
您可以使用 <B>invite 指令</B> 邀請用戶加入聊天室
<P>
<I>例如：</I>/invite Jack
<P>
將發送悄悄話給 Jack 建議他加入您在的聊天室。此消息包含目標房間的名稱，這個名字會出現一個鏈接。
<P>
請注意，你可以把多個用戶名，在邀請指令（例如："/invite Jack,Helen,Alf")。 他們必須由逗號（,）分割，沒有空格。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>更換聊天室：</B></A></FONT>
<P>
屏幕右側的列表提供了一個聊天室和用戶目前在那個房間裡的人的名單。離開房間，你是在和移動到其中一個房間，只需點擊一次的那個房間的名稱。空房間沒有出現在這個名單。您也可以通過鍵入<B>指令 "/join #房間名稱"</B>移動到另一個房間，不帶引號。
<P>
<I>例如：</I>/join #Red Room
<P>
會移動你進入 "Red Room"。
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>如果你是註冊用戶，您" : "<br /><P>您");
	?>
	 也可以創建一個與此相同的新房間 指令。但你必須指定其 鍵入: 0 代表為私人, 1 公開（默認值）。
	<P>
	<I>例如：</I>/join 0 #My Room
	<P>
	將創建一個新的私人空間（假設尚未有該名稱將創建一個公開的），被稱為“My Room”，並把你移到這。
	<P>
	房間的名稱不能包含逗號或反斜線 (\)。<?php if (C_NO_SWEAR) echo("它不能包含 \"髒話\"。"); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>修改您在聊天室的個人資料：</B></FONT>
<P>
這 <B>Profile 指令</B> 會創建一個單獨彈出窗口，您可以在其中編輯您的使用者設定檔，並修改它除了你的暱稱和密碼（您必須使用在起始頁面的鏈接，執行此操作）。<br />鍵入 /profile
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>回顧過去你已經提交的訊息，或指令：</B></FONT>
<P>
這 <B>! 指令</B> 回顧你已經提交的最後一個訊息或指令。<br />鍵入 /!
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>回應一個特定的用戶：</B></FONT>
<P>
點擊一次從另一個用戶名列表（在屏幕右側）將導致他們的 “用戶名>”，出現在你的的文本框。此功能允許您輕鬆地直接給用戶公開訊息，也許反應的東西，他或她已張貼上述。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>私人訊息：</B></A></FONT>
<P>
要發送私人密談訊息到另一個用戶當前在您的聊天室，鍵入 <B>命令：“/用戶名 /msg 消息文本”或“/用戶名 消息文本”</B>不帶引號。
<P>
<I>例如，Jack 是用戶名：</I>/msg Jack 您好，你怎麼樣？
<P>
該密談會出現給Jack和你自己，但其他用戶不能看到密談。
<P>
密談 功能啟用時，它也可以發送密談在不同的房間的用戶，使用<B>命令 “/wisp 用戶名 消息文本”</B>不帶引號。
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
點擊在主畫面中說話的人的暱稱，會自動添加 /to 或 /wisp 命令輸入字段的消息。
<?php
}
else
{
?>
點擊在右側用戶列表的，用戶圖像，會自動打開彈出窗口，等待您 鍵入 您發言內文 並請 按下 ENTER 發送訊息。您會收到的回覆會自動在新窗口打開。
<?php
}
?>
<P>
注：當密談啟用彈出窗口（在聊天設置和自己的個人資料），您就可以進行審查，因為你最後一次聊天記錄或您收到的所有離線的項目管理，而你“離開”所有新離線給你的項目管理，將會打開一個彈出窗口，你可以回答他們一個個從同一個窗口。這種離線的特點是只對註冊用戶可用。
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>。<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>動態</B></A></FONT>
<P>
要描述自己在做什麼，您可以使用<B>指令 "/me 動態"</B> 不帶引號，
<P>
<I>例如：</I>假如 Jack 發送這訊息 "/me 喝咖啡" 訊息框將顯示 "<B>* Jack</B> 喝咖啡"。
<P>
由於這個變化 指令, 還有就是 <B>/mr 指令</B> 可用，這也將在前面的用戶名性別稱號。
<P>
<I>例如：</I>假如 Jack 發送這訊息 "/mr 正在看電視" 大廳會顯示 "<B>* <?php echo(sprintf(L_HELP_MR, "Jack")); ?></B> 正在看電視"。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>忽略其他用戶：</B></A></FONT>
<P>
要忽略由其他用戶發言的所有訊息，鍵入這個 <B>指令 "/ignore 用戶名字"</B> 不帶引號。
<P>
<I>例如：</I>/ignore Jack
<P>
從那個時候起，由用戶 Jack 發言的訊息 將沒有顯示在螢幕上。
<P>
若要有一個消息被忽略的用戶列表。只需鍵入這個 <B>指令 "/ignore"</B> 不帶引號。
<P>
恢復一個被忽略的用戶的消息顯示，鍵入這 <B>指令 "/ignore - 用戶名字"</B> 不帶引號, 其中 "-" 是一個連字符（減號）。<P>
<P>
<I>例如：</I>/ignore - Jack
<P>
現在所有由 Jack 發布的消息在當前的聊天會話將顯示在屏幕上，包括 Jack 之前張貼的那些消息 鍵入這指令。<br />
如果你不指定一個連字符的用戶名後，你的“忽略列表”將被清理。
<P>
請注意，你可以把多個用戶名用在這 ignore 指令 (例如："/ignore Jack,Helen,Alf" 或 "/ignore - Jack,Alf")。他們必須由逗號（，）分割，沒有空格。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>獲取有關用戶的信息：</B></A></FONT>
<P>
要查看有關用戶的公開的資料, 鍵入 <B>指令 "/whois 用戶名"</B> 不帶引號。
<P>
<I>例如：</I>/whois Jack
<P>
其中，“Jack”是用戶名。這個命令將創建一個單獨的彈出窗口，將顯示有關該用戶的公開信息。使用你自己的名字查閱您的個人資料信息如何顯示給其他用戶使用相同的命令。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>儲存訊息：</B></A></FONT>
	<P>
	到導出訊息（通知的除外）到本機 HTML檔案, 鍵入 <B>指令 "/save n"</B> 不帶引號。
	<P>
	<I>例如：</I>/save 5
	<P>
	其中 ’5’ 是保存的訊息數量。 如果 n 沒有指定, 所有可用的消息傳送到當前房間。
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />

<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>管理員命令 和/或版主唯一</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>發怖公告：</B></A></FONT>
<P>
管理員可以進行系統廣泛公告所有的房間，並達到目前所有的用戶與登錄 <B>公告指令</B>。
<P>
<I>例如：/announce 聊天系統將在，今天晚上八時進行維護。</I>
<P>
還有另外一個有用的角色扮演聊天像命令公告;在一個房間裡的管理員或版主也可以在當前房間或與所有的房間發送一條消息給所有用戶<B>房間的命令</B>。
<P>
<I>例如：/room 會議在15日下午開始。</I> 或 <I>/room * 在15日下午會議開始在職員室。</I>
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>踢用戶：</B></FONT>
<P>
主持人可以踢用戶 和 管理員可以踢與一個用戶或一個主持人 <B>kick 指令</B>。 被踢的用戶，必須在當前的房間，管理員才可以踢其他房間的用戶。
<P>
<I>例如</I>, 如果 Jack 是要踹離開的用戶名：<I>/kick Jack</I> 或 <I>/kick Jack 踢的理由</I>。這裡 "踢的理由" 可以是任何文本，例如“因為濫發訊息！"
<P>
如果使用 * 選項 ( <I>/kick * <?php echo(L_HELP_REASON); ?></I> ), 這指令將踢出聊天所有的用戶不論權限（只有遊客和註冊用戶）。服務器連接時出現問題，所有的人應該重新載入他們的聊天，這是非常有用的。在第二種情況下，<I><?php echo(L_HELP_REASON); ?></I> 建議讓用戶知道為什麼他們已經被踢出。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>

<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>驅逐一個用戶：</B></A></FONT>
	<P>
	主持人可以驅逐一個用戶，管理員可以驅逐一個用戶或主持人使用 <B>ban 指令</B>。<br />
	管理員可以驅逐一個用戶 從另一個房間 超過他正在聊天的聊天室。他也可以永遠驅逐一個用戶和禁止使用整個聊天系統 ’<B>*</B>’ 設置必須在用戶裂口之前插入將被驅逐。
	<P>
	<I>例如</I>，如果 Jack 是驅逐的用戶名：<I>/ban Jack</I>, <I>/ban * Jack</I>, <I>/ban Jack 驅逐的理由</I> 或 <I>/ban * Jack 驅逐的理由</I>。這 "驅逐的理由" 可以是任何文字，例如“濫發訊息！"
	<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>升級/降級 一個已註冊的使用者/到主持人：</B></A></FONT>
<P>
聊天室主人及系統管理員，可以將已註冊的使用者，提拔成為聊天室主人，使用 <B>Promote 指令</B>。
<P>
<I>例如</I>，如果 Jack 是要升級的用戶的名字，使用 <I>/promote Jack</I> 將 Jack 提拔成為聊天室主人 (當 Jack 是一位已註冊使用者)。
<P>
只有系統管理員能反向操作降級 (將聊天室主人降為一般使用者) 使用 <B>Demote 指令</B>。
<P>
<I>例如</I>，如果 Jack 是要降級的用戶的名字，使用 <I>/demote Jack</I> 或 <I>/demote * Jack</I> (將降職他從現在或所有房間)。
<br /><P ALIGN="right"><A HREF="#top">回頁首</A></P>
<P>
</BODY>
</HTML>
<?php
?>