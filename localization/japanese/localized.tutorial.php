<?php
// File : japanese/localized.tutorial.php - plus version (26.08.2008 - rev.10)
// Original translation by Dendeke <konchakka211@yahoo.co.jp>
// Corrections by Ciprian Murariu <ciprianmp@yahoo.com>
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
<TITLE><?php echo(APP_NAME."－".APP_VERSION.APP_MINOR); ?>の日本語版チュートリアル</TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>－<?php echo(APP_NAME."－".APP_VERSION.APP_MINOR); ?>の日本語版チュートリアル－</B></FONT></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">目次</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">言語の選択</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">ログイン</A><br />
<A HREF="#register" CLASS="topLink">登録</A><br />
<A HREF="#modProfile" CLASS="topLink">プロファイルの修正<?php if (C_SHOW_DEL_PROF) echo("/deleting"); ?></A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">部屋の作成</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">接続状況の把握</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">発言</A><br />
<A HREF="#users_list" CLASS="topLink">ユーザリストの把握</A><br />
<A HREF="#exit" CLASS="topLink">退室</A><br />
<A HREF="#users_popup" CLASS="topLink">ログインせずにチャット中の人を確認する</A><br />
<P>
<A HREF="#customize" CLASS="topLink">チャットの概観をカスタマイズする</A><br />
<P>
<A HREF="#commands" CLASS="topLink">機能とコマンド：</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">ヘルプコマンド</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">アバター</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">スマイリー</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">書式</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">自分の部屋に誰かを招く</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">部屋を移動する</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">チャット中にプロファイルを変更する</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">直前の発言内容やコマンドを呼び出す</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">特定のユーザに反応する</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">内緒話（PM)</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">アクション</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">他人をマスキングする</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">ユーザの情報を表示する</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">チャット内容の保存</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">モデレータおよび／または管理者用特別コマンド：</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">お知らせを送信する</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">ユーザを追い出す</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">ユーザの接続を禁止する</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">ユーザにモデレータ権限を付与／剥奪する</A><br />
<P>
<hr />
<hr />

<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>言語の選択：</B></A></FONT>
	<P>
	スタートページにある国旗をクリックすると、その言語で<?php echo(APP_NAME); ?>が利用できます。下の図例はフランス語を選んでいるところです：
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flags for language selection">
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<!-- Hint: Use a Ctrl+H and find/replace "Back to the top" with your expression in this entire document -->
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>ログイン：</B></A></FONT>
<P>
既にユーザ登録が済んでいる場合は、ユーザ名とパスワードを入力することで簡単にログインできます。入りたい部屋を選び、「<?php echo(L_SET_14); ?>」ボタンを押します。<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	登録ユーザでない方は、まず最初に<A HREF="#register">登録</A>しましょう。
	<?php
}
else
{
	?>
<P>
	登録ユーザでない方は、まず最初に<A HREF="#register">登録</A>するか、登録したくなければ部屋を選択しましょう。ただし、入力したユーザ名はあなた専用になりません（ログアウト後に他人が同じユーザ名を使う可能性はあります）。
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>登録：</B></A></FONT>
<P>
登録が済んでない方は、<?php if (!C_REQUIRE_REGISTER) echo("よろしければ"); ?>, 是非とも登録してください。小さなポップアップウィンドウが表示されます。
<P>
<UL>
	<LI>最初に自分のユーザ名<?php if (!C_EMAIL_PASWD) echo("とパスワード"); ?>をそれぞれのフィールドに入力します。ここで選択したユーザ名がチャット時に自動的に表示されます。ユーザ名には、スペース、コンマ、バックスラッシュ（\）は利用できません。
<?php if (C_NO_SWEAR) echo("いわゆる「禁止ワード」も使えません。"); ?>
	<LI>次に、名前、苗字、メールアドレスを入力します。ユーザ登録には、これらの情報は必須です。性別の選択は任意です。
	<LI>ホームページを持っている方は、URLの登録ができます。
	<LI>言語フィールドは、将来誰かとチャットする際の手助けになります。どの言語なら理解できるのかがわかります。
	<LI>最後に、自分のメールアドレスを他人に表示しても構わない場合は、「<?php echo(L_REG_33); ?>」をチェックします。公開したくなければ、チェックしないでください。
	<LI><?php echo(L_REG_3); ?>ボタンを押せばアカウントが作成されます。管理者の設定によっては、管理者の承認待ちになります。いずれの場合も、詳細がメールで送られてきます。途中で登録をやめたくなったら、いつでも<?php echo(L_REG_25); ?>ボタンを押してください。
</UL>
<P>
<A NAME="modProfile"></A>もちろん、登録した後でも適切な<?php echo((!C_SHOW_DEL_PROF ? "リンク" : "リンク")); ?>をクリックすれば、自分のプロファイルの修正<?php if (C_SHOW_DEL_PROF) echo("／削除"); ?>が行えます。<br />
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>部屋の作成：</B></A></FONT>
	<P>
	登録ユーザは部屋の作成ができます。専用部屋へのアクセスは、その部屋の名前を知っているユーザにしかできません。また、その部屋にいるユーザ以外に部屋の名前は表示されません。<br />
	<P>
	部屋の名前には、コンマやバックスラッシュ(\）を使えません。<?php if (C_NO_SWEAR) echo("いわゆる「禁止ワード」も使えません。"); ?>
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>接続状況の把握：</B></A></FONT>
	<P>
	接続状況は、右上角の画像で確認できます。画像には次の3種類があります：
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection">特に接続の必要がない場合。
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting">接続中（進行中）の場合。
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed">接続に失敗した場合。
	</UL>
	<P>
	3番目の場合は、赤い「ボタン」画像をクリックすれば新たに接続を試みます。
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>発言：</B></A></FONT>
<P>
チャット部屋で発言するには、下の左側に位置するテキストボックスに発言したい内容を入力し、エンター／リターンキーを押します。全てのユーザからの発言内容がチャットボックスでスクロールします。<br />
<?php if (C_NO_SWEAR) echo("ただし、「禁止ワード」はスキップされます。"); ?>
<P>
発言色を変更したい時は、テキストボックスの右側から新しい色を選びます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>ユーザリストの把握（ポップアップウィンドウではない場合）：</B></A></FONT>
<P>
<OL>
	ユーザリストには2つの基本的なルールがあります：<br />
	<LI>登録ユーザの場合は、ユーザ名の前に性別を表す小さなアイコンが表示されます（このアイコンをクリックすると、その<A HREF="#whois">ユーザに関する情報がポップアップ</A>します）。一方、未登録ユーザにはこのアイコンはなく、ユーザ名の前はブランクになります。<br />
	<LI>管理者またはモデレータのユーザ名は斜体で表示されます。
</OL>
<P><I>たとえば</I>、以下のスナップショット例では次のことがわかります：
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolasは管理者またはphpMyChatのどこかの部屋のモデレータである。<br /><br />
		<LI>alien（性別は不明）と、Jezek2、Caridadの3名は、phpMyChatのどの部屋に対する権限も持たない一般の登録ユーザである。<br /><br />
		<LI>loloは未登録ユーザである。
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>退室：</B></A></FONT>
<P>
チャットをやめるには、右上角にある<?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'>画像" : '"'.L_EXIT.'" link'; ?>を1度だけクリックします。あるいは、テキストボックスに次のいずれかを入力しても退室できます：<br />
/exit<br />
/bye<br />
/quit<br />
これらのコマンドには、退室時に表示させたいメッセージを付けられます。
<I>例：</I> /quit また会いましょう！
<P>
上の例では、「また会いましょう！」と表示してから退室します。

<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>ログインせずにチャット中の人を確認する：</B></A></FONT>
<P>
スタートページに表示されている接続しているユーザの数をクリックするか、チャット中なら右上の画像<IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo (L_DETACH); ?>">をクリックして個別ウィンドウを開くと、ほぼリアルタイムで接続しているユーザと部屋のリストが表示できます。<br />
このウィンドウのタイトルにはユーザ名（接続しているユーザ数が3未満の場合）が表示されるほか、ユーザ数やその他開かれている部屋がわかります。
<P>
このウィンドウのトップにある<IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo( L_BEEP); ?>">アイコンをクリックすると、ユーザの入室時にビープ音を鳴らす設定の有効化／無効化が切り替えられます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>チャットの概観をカスタマイズする：</B></A></FONT>
<P>
チャットの概観をカスタマイズする方法はいくつもあります。設定を変更するのであれば、適切なコマンドをテキストボックスに入力してからエンター／リターンキーを押すだけです。
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI><B>Clearコマンド</B>は、メインのチャット画面を掃除して、最新5件の発言内容を表示します。<br />「/clear」（前後の「」は不要）と打ちます。
		<P>
		<?php
	}
	else
	{
		?>
		<LI><B>Orderコマンド</B>は、新しい発言を画面の上下いずれにするかを設定します。<br />「/order」（前後の「」は不要）と打ちます。
		<P>
		<?php
	};
	?>
	<LI><B>Notifyコマンド</B>は、他のユーザのチャット部屋入退室時にお知らせを表示するかどうかを設定します。デフォルト設定は<?php echo(C_NOTIFY ? "オン" : "オフ"); ?>なので、お知らせは表示<?php echo(C_NOTIFY ? "されます" : "されません"); ?>。<br />「/notify」（前後の「」は不要）と打ちます。
	<P>
	<LI><B>Timestampコマンド</B>は、発言内容の前に発言時間を表示するか否か、また、ステータスバーにサーバ時刻を表示するか否かを設定します。デフォルト設定は<?php echo(C_SHOW_TIMESTAMP ? "オン" : "オフ"); ?>です。<br />「/timestamp」（前後の「」は不要）と打ちます。
	<P>
	<LI><B>Refreshコマンド</B>は、画面上の発言内容を更新する間隔を調整します。 現在のデフォルト設定は<?php echo(C_MSG_REFRESH); ?>秒です。この間隔を変更するには、「/refresh n」（前後の「」は不要）と打ちます。このとき、nには変更後の新しい更新時間を秒数で指定します。
	<P>
	<I>例：</I>/refresh 5
	<P>
	上記の場合、更新時間は5秒になります。※注意：nに3未満の数値を指定すると、全く更新しないように設定されます（過去の発言をじっくり読み戻りたいときなどに便利です）！※
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI><B>Showコマンド</B>は、画面に表示する発言数を調整します。デフォルトの数値を変更するには、「/show n」（前後の「」は不要）と打ちます。このとき、nは表示する件数です。
		<P>
		<I>例：</I>/show 50
		<P>
		上記の場合、画面には最新50件の発言内容が表示されるようになります。全ての発言内容がメッセージボックスに収まりきらないときは、メッセージボックスの右端にスクロールバーが現れます。</UL>
		<?php
	}
	else
	{
		?>
		<LI><B>ShowおよびLastコマンド</B>は、画面を掃除して最新<I>n</I>件を表示します。「/show n」または「/last n」（前後の「」は不要）と打ちます。このとき、nは表示する件数です。
		<P>
		<I>例：</I>/show 50または/last 50
		<P>
		上記の場合、メッセージフレームを掃除して、画面上に最新50件の発言が表示されます。全ての発言内容がメッセージボックスに収まりきらないときは、メッセージボックスの右端にスクロールバーが現れます。</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>機能とコマンド</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>ヘルプコマンド：</B></A></FONT>
<P>
チャット部屋に入ったら、メッセージボックスの直前にある<IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>">画像をクリックしてヘルプをポップアップさせることができます。メッセージボックスに<B>「/help」または「/?」コマンド</B>を入力しても同じです。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>アバター：</B></A></FONT>
<P>アバターとは、チャット利用者を表すグラフィカルなイメージアイコンです。登録ユーザのみアバターの変更ができます。登録ユーザであれば、プロファイルを開いて（<A HREF="#changeprofile">/profile</A>コマンド参照）アバターをクリックすることで画像メニューから選択したり、インターネット上のグラフィカルなイメージまでのURLを入力（ただし、パスワードなどでプロテクトされていない公開画像に限ります）することができます。イメージはブラウザで表示可能（.gif、.jpg等）な32×32ピクセルグラフィックファイルが最適です。
<P>メッセージフレームにあるアバターをクリックすると、その人物のプロファイルがポップアップ表示されます（<A HREF="#whois">/whois</A>コマンド参照）。
あなたが登録ユーザであれば、ユーザリストにある自分のアバターをクリックすれば/profileコマンドを実行できます。
登録ユーザでない場合は、自分（システムデフォルトの）アバターをクリックすると登録を促す警告が表示されます。
  <P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>スマイリー：</B></A></FONT>
	<P>発言内容にはグラフィカルなスマイリーを含めることができます。表示したいスマイリーのコードを以下に示します。
	<P>
	<I>例：</I>「Hi Jack :)」（前後の「」は不要）と打てば、メインフレームには<B>Hi Jack</B> <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)">と表示されます。
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
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>書式：</B></A></FONT>
	<P>
	発言内容の任意の場所を&LT;B&GT;～&LT;/B&GT、&LT;I&GT;～&LT;/I&GT;、&LT;U&GT;～&LT;/U&GTのHTMLタグで囲むと、囲んだ箇所を太字、斜体、下線付きにできます。
	<P>
	<I>例：</I>&LT;B&GT;このテキスト&LT;/B&GT;は<B>このテキスト</B>となります。
	<P>
	メールアドレスやURLなどハイパーリンクを作りたいときは、アドレス（HTMLタグなし）を入力してください。ハイパーリンクは自動的に作成されます。
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>自分の部屋に誰かを招く：</B></A></FONT>
<P>
<B>招待コマンド</B>を使うと、あなたのいる部屋に誰かを招待することができます。
<P>
<I>例：</I>/invite Jack
<P>
上記の場合、JackにPMを送信して、あなたのいる部屋への参加を呼びかけます。PMには招待先の部屋の名前が含まれており、その名前がリンクになっています。
<P>
招待コマンドでは、2人以上のユーザ名を指定することができます（例：「/invite Jack,Helen,Alf」）。このとき、ユーザ名はスペースなしのコンマ（,）で区切ります。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>部屋を移動する：</B></A></FONT>
<P>
画面右のリストには、チャット部屋と誰がどこでチャット中かが表示されています。いまいる部屋から別の部屋へ移動するときは、移動先の部屋の名前を1度だけクリックします。空の部屋はこのリストに表示されません。<B>「/join #部屋名」</b>（前後の「」は不要）というコマンドでも別の部屋へ移動できます。
<P>
<I>例：</I>/join #Red Room
<P>
上記の場合、「Red Room」に移動します。
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>あなたが登録ユーザの場合、" : "<br /><P>");
	?>
	 このコマンドを使って新しい部屋を作成することもできます。ただし、その際は部屋の種別の指定が必要です：0は専用部屋を、1（デフォルト値）は公開部屋です。
	<P>
	<I>例：</I>/join 0 #わたしの部屋
	<P>
	上記の場合、新たに「わたしの部屋」という専用部屋（同名の公開部屋が作成されていないことが前提）を作成し、そこに移動します。
	<P>
	部屋名にはコンマやバックスラッシュ（\）は使えません。<?php if (C_NO_SWEAR) echo("いわゆる「禁止ワード」も使えません。"); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>チャット中にプロファイルを変更する：</B></FONT>
<P>
<B>Profileコマンド</B>は、ユーザ名とパスワード以外のユーザプロファイルの編集や修正ができるウィンドウをポップアップします。（ユーザ名とパスワードは、スタートページにあるリンクからのみ変更できます）。<br />/profileと打ちます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>直前の発言内容やコマンドを呼び出す：</B></FONT>
<P>
<B>!コマンド</B>は、直前の発言内容やコマンドを呼び出します。<br />/!と打ちます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>特定のユーザに反応する：</B></FONT>
<P>
（画面右側の）リストから他のユーザの名前を1度だけクリックすると、テキストボックスに「ユーザ名>」という形が表示されます。この機能を使うと、たとえば誰かの発言に対し、簡単にそのユーザ宛に発言することができます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>内緒話（PM)：</B></A></FONT>
<P>
同じ部屋にいる別のユーザにPMを送るには、<B>「/msg ユーザ名 送る内容」または「/to ユーザ名 送る内容」という形のコマンド</B>を打ちます（前後の「」は不要）。
<P>
<I>たとえば、Jackというユーザ名の人なら：</I>/msg Jack こんにちは、元気ですか？
<P>
送った内容はJackとあなたの双方に表示されますが、その他の人には表示されません。
<P>
PM機能が有効なら、別の部屋にいるユーザとも<B>「/whisp ユーザ名　送る内容」というコマンド</B>を使って内緒話ができます（前後の「」は不要）。
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
メインフレームにある発言者名をクリックすると、自動的に/toまたは/wispコマンド付きの書式が入力フィールドに出現します。
<?php
}
else
{
?>
右側にあるユーザリストからユーザ名をクリックすると自動的にPM用ウィンドウがポップアップしますので、送りたい内容を入力してエンターキーを押してください。返事は自動的に別の新しいウィンドウに表示されます。
<?php
}
?>
<P>
注意：（チャットの設定およびあなた自身のプロファイルの設定で）PMのポップアップが有効になっている場合、前回ログインしてからオフラインまたは「離席」中に受け取った全てのPMを閲覧することができます。これらの新しいオフラインPMはポップアップウィンドウに表示されます。そのウィンドウからひとつずつ返信することができます。
このPMオフライン機能は登録ユーザのみ利用可能です。
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) ポップアップ = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>アクション：</B></A></FONT>
<P>
あなたが今何をしているのかを伝えたい時は、<B>「/me 行動内容」</B>と打ちます（前後の「」は不要）。
<P>
<I>例：</I>Jackが「/me はコーヒーを飲んでいます」と発言すると、メッセージフレームには「<B>* Jack</B>はコーヒーを飲んでいます」と表示されます。
<P>
このコマンドに類似したものとして<B>/mrコマンド</B>があります。/mrコマンドは、ユーザ名の後ろに性別にあった敬称をつけます。
<P>
<I>例：</I>Jackが「/mr はテレビを見ています」と発言すると、メッセージフレームには「<B>* <?php echo(sprintf(L_HELP_MR, "Jack")); ?></B>はテレビを見ています」と表示されます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>他人をマスキングする：</B></A></FONT>
<P>
誰かの発言を全てマスキングするには、<B>「/ignore ユーザ名」</B>コマンドを使います（前後の「」は不要）。
<P>
<I>例：</I>/ignore Jack
<P>
このコマンドを打った時点から、Jackというユーザの発言は全て画面に表示されなくなります。
<P>
マスキング対象にしたユーザのリストは、<B>「/ignore」コマンド</B>を打つことでわかります（前後の「」は不要）。
<P>
マスキング対象にしたユーザからの発言を再表示するには、<B>「/ignore - ユーザ名」コマンド</B>を打ちます（前後の「」は不要）。このとき、「-」はハイフン（半角マイナス記号）です。<P>
<P>
<I>例：</I>/ignore - Jack
<P>
この時点からJackの全ての発言内容が画面に表示されます。同じチャットセッション中の発言内容であれば、このコマンドを打つ前のJackの発言も表示されます。<br />
ハイフンの後ろにユーザ名を指定しなかったときは、「マスキングリスト」を空にします。
<P>
マスキングコマンドでは複数のユーザ名が指定できます（例：「/ignore Jack,Helen,Alf」または「/ignore - Jack,Alf」）。複数のユーザ名を指定する場合は、スペースを入れずにコンマで区切ります。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>ユーザの情報を表示する：</B></A></FONT>
<P>
あるユーザの公開情報を見るには、<B>「/whois ユーザ名」</B>コマンドを打ちます（前後の「」は不要）。
<P>
<I>例：</I>/whois Jack
<P>
このとき、「Jack」はユーザ名です。このコマンドによりウィンドウがポップアップし、そのユーザに関して公開設定されている情報が表示されます。同じコマンドで自分の名前を指定すると、他人に自分のプロファイル情報がどのように見えるのかが確認できます。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>チャット内容の保存：</B></A></FONT>
	<P>
	発言内容（お知らせを除く）をローカルHTMLファイルにエキスポートするには、<B>「/save n」コマンド</B>を打ちます（前後の「」は不要）。
	<P>
	<I>例：</I>/save 5
	<P>
	このとき、「5」は保存する発言数です。nを指定しなかった場合は、現在の部屋で送信された全発言を可能な限り保存対象とします。
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />

<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>モデレータおよび／または管理者用特別コマンド</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>お知らせを送信する：</B></A></FONT>
<P>
管理者は、<B>announceコマンド</B>を使って全部屋の全ユーザにシステムワイドなお知らせを送ることができます。
<P>
<I>例：/announce 今夜8時、メンテナンスのためにチャットを停止します。</I>
<P>
もうひとつ別に、ロールプレイングチャット用コマンドにも似た有益なアナウンス方法があります。管理者またはモデレータは、<B>roomコマンド</B>を使ってその部屋または全ての部屋にお知らせを送ることができます。
<P>
<I>例：/room 会議は15pmスタートです。</I>または<I>/room * 会議は15pmからスタッフルームで開始します。</I>
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>ユーザを追い出す：</B></FONT>
<P>
<B>kickコマンド</B>を使うと、モデレータはユーザを、管理者はユーザまたはモデレータを追い出すことができます。管理者に限り、別の部屋にいるユーザも追い出せます。
<P>
<I>たとえば</I>、Jackというユーザを追い出したい場合：<I>/kick Jack</I>または<I>/kick Jack 追い出す理由</I>。「追い出す理由」は「スパム行為のため！」など、任意のテキストです。
<P>
*オプションを使った場合（<I>/kick * <?php echo(L_HELP_REASON); ?></I>）、権限を持たないユーザ（ゲストおよび登録ユーザのみ）全てをチャットから追い出します。サーバ接続にトラブルが発生した場合など、全員にチャットのリロードが不可欠な時に有益です。2番目の事例では、<I><?php echo(L_HELP_REASON); ?></I>を指定してなぜ追い出されたのかをユーザに知らしめることをお勧めします。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>ユーザの接続を禁止する：</B></A></FONT>
	<P>
	<B>banコマンド</B>を使うと、モデレータはユーザを、管理者はユーザまたはモデレータを接続禁止にすることができます。<br />
	管理者であれば、その部屋はもちろん、別の部屋にいるユーザの接続も禁止できます。さらに管理者であれば、ユーザの接続禁止期限を無限に設定したり、接続禁止対象とするユーザ名の前に「<B>*</B>」を設定することで接続禁止対象をチャット全体にすることができます。
	<P>
	<I>たとえば</I>、接続禁止対象ユーザの名前がJackの場合：<I>/ban Jack</I>、<I>/ban * Jack</I>、<I>/ban Jack 接続禁止理由</I>、<I>/ban * Jack 接続禁止理由</I>。「接続禁止理由」は「スパム行為のため！」など、任意のテキストです。
	<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>ユーザにモデレータ権限を付与／剥奪する：</B></A></FONT>
<P>
<B>promoteコマンド</B>を使うと、モデレータと管理者は別のユーザにモデレータ権限を付与することができます。
<P>
<I>たとえば</I>、モデレータ権限を与えたいユーザの名前がJackの場合：<I>/promote Jack</I>
<P>
管理者に限り、<B>demoteコマンド</B>を使って逆の操作（モデレータ権限を剥奪して一般のユーザに戻す）ができます。
<P>
<I>たとえば</I>Jackからモデレータ権限を剥奪したい場合：<I>/demote Jack</I>または<I>/demote * Jack</I>（前者：現在の部屋からモデレータ権限を剥奪する、後者：全ての部屋からモデレータ権限を剥奪する）。
<br /><P ALIGN="right"><A HREF="#top">トップに戻る</A></P>
<P>
</BODY>
</HTML>
<?php
?>
