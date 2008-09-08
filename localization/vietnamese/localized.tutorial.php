<?php
// File : vietnamese/localized.tutorial.php - plus version (26.08.2008 - rev.10)
// Translation by Marshall <hellomarshal_lookatme@netzero.net>
// Updates and corrections by Ciprian Murariu <ciprianmp@yahoo.com>

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
<TITLE>Hướng dẫn sử dụng cho người <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Hướng dẫn sử dụng cho người <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -
</FONT><br /><I>&copy; 2007<?php echo((date('Y')>"2007") ? "-".date('Y') : ""); ?> - Dịch bởi Marshall - Mỹ Tho, VIỆT NAM.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Những nội dung hướng dẫn này</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Chọn một ngôn ngữ</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Đăng ký để tán gẫu</A><br />
<A HREF="#register" CLASS="topLink">Đăng ký</A><br />
<A HREF="#modProfile" CLASS="topLink">Điều chỉnh<?php if (C_SHOW_DEL_PROF) echo(" / xóa thông"); ?> tin</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Tạo một phòng</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Hiểu trạng thái kết nối</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Gửi một thông báo</A><br />
<A HREF="#users_list" CLASS="topLink">Hiểu những danh sách người sử dụng</A><br />
<A HREF="#exit" CLASS="topLink">Rời bỏ phòng tán gẫu</A><br />
<A HREF="#users_popup" CLASS="topLink">Biết việc tán gẫu không đăng nhập là ai</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Tùy biến cảnh quan chuyện gẫu</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Những đặc tính và những lệnh:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Lệnh giúp đỡ</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Ảnh đại diện</A><br />
<?php
}
?>
<!-- Avatar System End. -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Những hình tâm trạng</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Định dạng văn bản</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Mời một người bạn vào phòng tán gẫu hiện thời</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Thay đổi phòng chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeprofile" CLASS="topLink">Để thay đổi thông tin khi chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#recall" CLASS="topLink">Gọi lại những lệnh thông báo hay nhửng gì bạn phụ thuộc</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#respond" CLASS="topLink">Trả tới một người sử dụng một cách đặc biệt</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Những thông báo riêng tư</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Những họat động</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Lờ đi những người sử dụng khác</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Có thông tin về người sử dụng khác</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Lưu trữ những thông báo</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Những lệnh đặc biệt cho MOD và cho người quản trị:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Gửi một thông báo</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Đá một người sử dụng</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Trục xuất một người sử dụng</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Đẩy mạnh/Giáng chức một người sử dụng/bởi MOD</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B><br>Chọn một ngôn ngữ:</B></A></FONT>
	<P>
	Bạn có thể chọn một ngôn ngử trong <?php echo(APP_NAME); ?> đã được dịch bằng việc click vào những lá cờ để bắt đầu. Ví dụ , Người sử dụng lựa chọn Tiếng Pháp:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flags for language selection">
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Đăng nhập:</B></A></FONT>
<P>

Nếu như bạn đã đăng ký, thì việc đăng nhập trở nên dễ dàng hơn khi nhập user và pass. Hãy chọn phòng chat bạn thích và nhấn vèo nút '<?php echo(L_SET_14); ?>' để vào phòng.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Bạn cần đăng ký <A HREF="#register">register</A> trước.
	<?php
}
else
{
	?>
<P>

	Bạn có thể đăng ký để lấy user và pass vào phòng hay dùng nó để đăng nhập khi đã có rồi (một người sử dụng có thể sử dụng nick của bạn nếu bạn không thóat ra , vì thế nên cẩn thận).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Để đăng ký:</B></A></FONT>
<P>
Nếu bạn chưa đăng ký<?php if (!C_REQUIRE_REGISTER) echo(" và thích tới"); ?>, hãy chọn tùy chọn đăng ký . Một cửa sổ nhỏ sẽ xuất hiện.
<P>
<UL>
	<LI>Đầu tiên, Tự mình tạo một tên đăng nhập và mật khẩu bằng việc việc viết nó vào những ô thích hợp<?php if (!C_EMAIL_PASWD) echo(" và mật khẩu"); ?> Tên đăng nhập là tên sẽ được hiển thị trong phòng tán gẫu thay cho bạn , bạn có thể dùng tên thật của mình nếu thích. Nó không thể chứa đựng những khỏang trống, những dấu phẩy hay những dấu xồ nguợc (\).".
<?php if (C_NO_SWEAR) echo(" Nó không thể chứa đựng \"chưởi thề\"."); ?>
	<LI>Thứ hai, Bạn viết họ , tên, và địa chỉ e-mail . Để đăng ký tán gẫu, Tất cả những thông tin này phải được cung cấp.
	<LI>Thông tin giới tính thì được chọn .Nếu bạn có một trang web , trang blog , hãy điền địa chỉ ( URL ) vào.
	<LI>Trong những thời gian tới những ngôn ngữ của quốc gia khác sẽ được cập nhật để dễ dàng tán gẫu. Chúng bíêt ngôn ngữ nào bạn hiểu.
	<LI>Cuối cùng, Phải chăng bạn muốn nhìn thấy những e-mail mình được hiển thị , Xin cho một dấu vào hộp "Hiển thị thông tin e-mail". Nếu bạn không muốn e-mail mình được hiển thị ,xin đừng chọn.
	<LI>Tuy nhiên , nhấn <?php echo(L_REG_3); ?> nút vào tài khoản được tạo. Việc phụ thuộc vào cái gì được thiết lập bởi Người quản trị, bạn có lẽ đã phải đợi sự thừa nhận của người quản trị. Cách thức, bạn sẽ bắt đầu Một Thông báo email với những chỉ dẫn về sau. Nếu bạn muốn kết thúc mọi thứ cho sự đăng ký thì nhấn <?php echo(L_REG_25); ?> nút.
</UL>
<P>
<A NAME="modProfile"></A>Tất nhiên, Bạn có khả năng thay đổi thông tin <?php if (C_SHOW_DEL_PROF) echo("/xoá"); ?> /Xóa bỏ những thông tin đã đề cập bằng 1 cái click. <?php echo((!C_SHOW_DEL_PROF ? "liên kết" : "nhiều liên kết")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Để tạo ra một phòng:</B></A></FONT>
	<P>
	Những người sử dụng được đăng ký có thể tạo ra những phòng. Những người sử dụng có thể vào nếu họ biết về thông tin của bạn hay bạn cho họ.<br />
	<P>
	Tên của phòng không thể chứa đựng những dấu phẩy hay dấu xổ ngược (\). Không thể chứa đựng "Từ chưởi thề".).<?php if (C_NO_SWEAR) echo(" Nó không thể chứa đựng \"chưởi thề\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Hiểu trạng thái kết nối:</B></A></FONT>
	<P>
	Một dấu hiệu trình bày trạng thái kết nối của các bạn được thể hiện trên màn ảnh. Có thể có 3 dạng :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> khi không kết nối đúng yêu cầu ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> khi có một kết nối đang họat động ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> khi không kết nối được.
	</UL>
	<P>
	Trong trường hợp một phần 3, Click vào nút màu đỏ sẽ giới thiệu một kết nối mới.
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Gửi một thông báo:</B></A></FONT>
<P>
Gửi một lời nói tới phòng chat, đánh lời nói bạn vào khe dưới , gần chử help và nhất nút gửi để gửi đi hay đơn giản chỉ là cái Enter. Những thông báo sẽ được hiển thị tại cái hộp lớn hơn.<br />
<?php if (C_NO_SWEAR) echo("\"Chưởi thề\" được bỏ qua từ những thông báo."); ?>
<P>
Ban có thể thay đổi màu sắc của lời nói hay chọn một màu mới từ danh sách những màu có sẵn .
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Hiểu danh sách những người sử dụng (không phải cửa sổ đăng ký người sử dụng):</B></A></FONT>
<P>
<OL>
	Hai quy tắc cơ bản là định nghĩa cho người sử dụng:<br />
	<LI>một biểu tượng nhỏ được trình bày trước khi người sử dụng đăng ký (Việc click vào đó sẽ được giới thịêu trạng <A HREF="#whois">whois popup</A> thái người sử dụng này), trong khi những người sử dụng không đăng ký chỉ là khoảng trống được trình bày trước nick của họ ;<br />
	<LI>nick của một người quản trị hay MOD thì được in nghiêng.
</OL>
<P><I>Ví dụ</I>, Từ ảnh chụp bạn có thể nhận thấy điều đó:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas là admin orhay là một MOD của phpMyChat ;<br /><br />
		<LI>Ngòai ra (Giới tính thì không được biết), Jezek2 và Caridad những người sử dụng và đăng ký "khởi động" cho phòng phpMyChat ;<br /><br />
		<LI>lolo làm một người sử dụng đăng ký đơn giản .
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Rời bỏ phòng tán gẫu:</B></A></FONT>
<P>
Để ra khỏi phòng tán gẫu, Đơn giản là click một lần trên <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'> bức ảnh" : '"'.L_EXIT.'" liên kết'; ?>. Bạn có thể nhập các lệnh sau đây , tương tự như lời chat:<br />
/exit<br />
/bye<br />
/quit<br />
Những lệnh này được có thể hoàn thành với một thông báo sẽ được gửi trước khi bạn rời phòng chat.
<I>Ví dụ :</I> /quit Hẹn gặp lại!
<P>
sẽ gửi một thông báo "Hẹn gặp lại!" bạn đã thóat.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Những người ẩn nick :</B></A></FONT>
<P>
Bạn có thể click vào link liên kết tạo trang đăng nhập, hoặc, nếu bạn đang tán gẫu, click vào hình ảnh <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> tại điểm trên cùng của màn hình để một cửa sồ hiện một danh sách những người kết nối hiện thời, và những phòng họ ở bây giờ.<br />
Tiêu đề của cửa số này chứa tên đăng nhập, nếu chúng là ít hơn 3, những số lượng và phòng khác được mở.
<P>
Click vào<IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>"> việc click vào biểu tượng trên cùng làm tắt đi âm thanh beep cho người sử dụng.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Tùy biến cảnh quan chuyện gẫu::</B></A></FONT>
<P>
Có nhiều giao diện khác nhau cho một cảnh quan chuyện gẫu. Để thay đổi những thiết đặt, đơn giản đánh máy thích hợp một dòng lệnh và chọn phím Enter/Return .
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>Từ <B>Clear lệnh</B> này bạn sẽ làm sạch 5 lời tán gẫu của bạn trước đó.<br />Đánh "/clear" không thêm một thứ nào khác .
		<P>
		<?php
	}
	else
	{
		?>
		<LI>Từ <B>Order lệnh</B> cho phép giữ lại những thông báo đã xuất hiện.<br />Đánh "/order" không thêm một thứ khác .
		<P>
		<?php
	};
	?>
	<LI>Từ <B>Notify lệnh</B> thông báo cho phép bạn tới hay ro khỏi tùy chọn bạn nhìn thấy những sự chú ý khi những người sử dụng khác vào hay ra khỏi phòng chuyện gẫu. Sự vắng mặt tùy chọn này <?php echo(C_NOTIFY ? "mở" : "đóng"); ?> và những sự chú ý <?php echo(C_NOTIFY ? "ý định" : "ý định không phải"); ?> được nhìn thấy.<br />Đánh "/notify" không thêm một thứ nào khác .
	<P>
	<LI>Từ <B>Timestamp lệnh</B> cho bạn tới những lựa chọn trên hoặc tùy chọn bạn nhìn thấy Thời gian thông báo là thông báo đầy đủ trước đây từng cái và thời gian những người phục vụ trạng thái . Theo mặc định tùy chọn này trên . <?php echo(C_SHOW_TIMESTAMP ? "mở" : "đóng"); ?>.<br />Đánh "/timestamp" không thêm một thứ nào khác .
	<P>
	<LI>Từ <B>Refresh lệnh</B> này giúp bạn điều chỉnh sự làm mới trên màn ảnh phòng chat. Theo mặc định là 10 giây. Bạn có thể thay đổi nó bằng cách đánh lệnh "/refresh n" với việc không có thêm một thứ nào khác ngòai lệnh và số .
	<P>
	<I>Ví dụ:</I> /refresh 5
	<P>
	Thay đổi nhip điệu 5 giây. *Đề phòng, Nếu sự làm mới ít hơn 3, bạn có thể làm mới lại trình duyệt thay vì làm mới phòng chat (đọc nhiều thông báo cũ làm một công việc không bị quấy rầy)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>Từ <B>Show lệnh</B> đây là giúp bạn hiện ra những lời nói trước hay tất cả các lời nói theo yêu cầu của bạn là số lượng. Đánh "/show n" hoặc "/last n" không có thêm một thứ nào khác ngòai số.
		<P>
		<I>Ví dụ:</I> /show 50
		<P>
		thông báo sẽ làm sạch kết cấu và hiện ra đầy đủ 50 lời chat, thông báo cho bạn. Nếu tất cả những thông báo không thể là được trình bày bên trong hộp thoại, hãy kéo thanh dọc để đọc để đọc những thông báo đó.</UL>
		<?php
	}
	else
	{
		?>
		<P>
		<I>Ví dụ:</I> /show 50 hoặc /last 50
		<P>
		thông báo sẽ làm sạch kết cấu và hiện ra đầy đủ 50 lời chat, thông báo cho bạn. Nếu tất cả những thông báo không thể là được trình bày bên trong hộp thoại, hãy kéo thanh dọc để đọc để đọc những thông báo đó.</UL>
		<?php
	};
	?>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Những đặc tính và những lệnh</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Lệnh giúp đỡ:</B></A></FONT>
<P>
Một lần bên trong phòng tán gẫu, bạn có thể sử dụng công cụ popup ảnh mà ngồi trước hộp thọai <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> bạn có thể đánh lệnh <B>"/help" hoặc "/?" lệnh</B> trong hộp thọai để cần trợ giúp.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Ảnh đại diện</B></A></FONT>
<P>Nh đại diện là những hình ảnh nào đó đại diện cho bạn. Chỉ những người đăng ký mới sử dụng ảnh đại diện của họ. Người sử dụng đăng ký có thể mở hồ sơ của họ (hiện <A HREF="#changeprofile">/profile</A> lệnh) và click vào ảnh đại điện để chọn một trong những thực đơn của ảnh, Hoặc một đường dẫn hình ảnh.Ảnh thì có bất cứ đâu trên internet (những ảnh công khai được tiếp nhận, không mật khẩu được bảo vệ). Những định dạng thông dụng (.gif, .jpg, etc. ) 32 x 32 pixel cho những hồ sơ màn hình hiển thị tốt nhất.
<P>Click vào ảnh đại diện trên một popup (hiện /whois lệnh). Bạn có thể đánh theo lệnh ảnh đại diện người sử dụng có thể kéo theo profile, (hiện <A HREF="#whois">/whois</A> lệnh).
Click vào ảnh đại diện của người sử dụng danh sách /profile lệnh, nếu bạn được đăng k‎y.
Nếu bạn không đăng ký, thì không thể vào phòng chat và có những thông tin thay đổi , tuy nhiên bạn không thể phòng chat mà không có ảnh đại diện.
<P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Những hình tâm trạng:</B></A></FONT>
	<P>Bạn có thể chèn những hình ảnh vào những lời thọai của các bạn. Đó sẽ là sự hiện thị những trạng thái của bạn , vui , buồn , hưng phấn.
	<P>
	<I>Ví dụ</I>, gửi tin "Chảo Jack :)" không có lời nào khác sẽ trình bày thông báo Chảo Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> nói chung kết cấu.
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
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Định dạng văn bản:</B></A></FONT>
	<P>
	Văn bản có thể là, những định dạng có thể là : in hoa &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; hoặc &lt;U&gt; &lt;/U&gt; HTML.


	<P>
	<I>Ví Dụ</I>, &lt;B&gt;lời nói&lt;/B&gt; sẽ sản xuất ra văn bản này <B>lời nói</B>.
	<P>
	Để tạo ra một liên kết, đánh máy địa chỉ (không có bất kỳ HTML ). Liên kết sẽ được tạo ra tự động.
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Mời người nào đó vào phòng tán gẫu hiện thời:</B></A></FONT>
<P>
Bạn có thể sử dụng <B>invite lệnh</B> để mời một người nào đó kết nối với bạn.
<P>
<I>Ví dụ:</I> /invite Jack
<P>
bạn có thể gửi một lời thông báo để từ chối lời đề nghị của người khác. Thông báo này được xuất hiện tại đích và hình thành như một mối liên kết.
<P>
Lưu ý bạn có thể mang hơn một thành viên bào lời mời (eg "/invite Jack,Helen,Alf"). Chúng phải được các nhau bởi dấu phẩy (,).
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Thay đổi những phòng:</B></A></FONT>
<P>
Rời bỏ phòng này bạn để đi qua những phòng khác đơn giản click một lần lên tên những phòng kia. Làm trống rỗng những phòng không xuất hiện. Bạn có thể duy chuyển đếnn những phòng trống bằng <B>lệnh "/join #tên phòng"</B> không thêm một thứ nào khác.
<P>
<I>Ví dụ:</I> /join #Red Room
<P>
sẽ duy chuyển vào trong "Red Room".
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Nếu bạn là một người sử dụng được đăng ký, bạn" : "<br /><P>Bạn");
	?>
	có thễ tạo ra một phòng với lệnh này tương ứng. Trừ phi bạn phải chỉ rõ kiểu đó: 0 thay cho riêng tư, 1 quần chúng (giá trị mặc định).
	<P>
	<I>Ví dụ:</I> /join 0 #My Room
	<P>
	sẽ tạo ra phòng riêng tư mới (giả thiết một quần chúng một đã được tạo ra rồi với tên kia) hãy nói phòng bạn chyển tới bên kia.
	<P>
	Tên phòng không thế chứa đựng dấu phẩy hay dấu xổ ngược (\). <?php if (C_NO_SWEAR) echo(" Nó không thể chứa đựng \"chưởi thề\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Để thay đổi thông tin khi chat:</B></FONT>
<P>
Từ <B>Profile lệnh</B> thông tin được tao ra một mặt riêng biệt. mà bạn có thể sọan thảo những thông tin của bạn cho nó không hiễn thị (bạn phải sử dụng mối liên kết để tạo ra trang lúc này).<br />Đánh /profile.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Gọi lại những lệnh thông báo hay nhửng gì bạn phụ thuộc:</B></FONT>
<P>
Từ <B>! lệnh</B> khi thông báo cuối cùng hay những gì bạn phụ thuộc. Đánh /!
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Trả tới một người sử dụng một cách đặc biệt:</B></FONT>
<P>
Việc click một lần trên danh sách người sử dụng (tới quyền màn ảnh) ý định gây ra của họ "Tên đăng nhập&gt;" Để xuất hiện trong văn bản các bạn. Đặc tính này cho phép bạn dễ dàng định hướng một thông báo công cộng tới một người sử dụng, có lẽ trong sự đáp lại tới cái gì đó ông ta hay cô ấy có được sẽ hồi âm lại.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Những thông báo riêng tư:</B></A></FONT>
<P>
Gửi một thông báo riêng tư hiện thời cho phòng tán gẫu các bạn, đánh lệnh "/msg tênthànhviên messagetext" hoặc "/to tênthànhviên messagetext"</B> không khỏang cách.
<P>
<I>Ví dụ, nếu Jack có tên đăng nhậo là Jack thì:</I> /msg Jack Chào bạn, Bạn như thế nào?
<P>
Thông báo sẽ xuất hiện tới người ấy và tới bạn, trừ khi không có người khác nhìn thấy thông báo.
<P>
Khi đặc tính PM được cho phép, thêm có thể xảy ra gửi những tin đồn cho một người sử dụng trong một phòng khác nhau, sử dụng <B>lenh "/wisp tên đăng nhập và tin nhắn"</B> không có lời trích dẫn.
<P>
<?php
if (C_PRIV_POPUP)
{
?>
Kích vào nút một người gửi thông báo nói chung , khung sẽ tự động thêm phù hợp với/ Tới Hay / Lệnh mới tới lĩnh vực được nhập vào những thông báo.
<?php
}
else
{
?>
Việc kích vào nút một người sử dụng trong danh sách những người sử dụng trên ý định đúng tự động mở một cửa sổ mở ra riêng tư đợi bạn để đánh máy văn bản và cú đánh thông báo các bạn Vào để gửi thông báo. Những sự trả lời bạn sẽ nhận được sẽ tự động mở trong Windows mới.
<?php
}
?>
<P>
Ghi chú: Khi PM popup được cho phép (trong cả những sự thiết đặt chuyện gẫu lẫn thông tin của mình), ban có thể nhìn thấy tất cả nhửng pm offline bạn nhận được 1 lần khi bạn thoát ra vàu sau đó; tất cả những tin nhắn offline được hiện ra trong cửa sổ popup; bạn có thể trả lời tới họ một bởi một từ cửa sổ giống như vậy.
Những pm offline chỉ được dùng cho những thành viên được đăng ký.
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Họat động:</B></A></FONT>
<P>
Để mô tả bạn là gì việc làm bạn có thể sử dụng <B>lệnh "/me action"</B> không một lời nhắn đi kèm.
<P>
<I>Ví dụ:</I> nếu Jack gửi tin nhắn "/me đang uống một cà phê" khung thông báo sẽ hiễn thị "* ". "<B>* Jack</B> Jack đang uống một cà phê".
<P>
Như một sự biến đổi tới lệnh này, có <B>/mr command</B> tính có sẵn , cũng đặt tiêu đề giống phía trước ten đăng nhập.
<P>
<I>Cho ví dụ:</I> Nếu jack gửi một tin nhắn "/mr đang xem TV" khung thông báo sẽ hiện ra "<B>* <?php echo(L_HELP_MR); ?> Jack</B> đang xem TV".
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Lờ đi những người sử dụng khác::</B></A></FONT>
<P>
Lờ đi nhữn lời nói người khác hoặc không xem nó, đánh <B>lệnh "/ignore username"</B> không dấu cách.
<P>
<I>Ví dụ:</I> /ignore Jack
<P>
Từ thời gian đó trở về phia trước , không có những thông báo người sử dụng từ Jack.
<P>
Để có những danh sách người sử dụng mà bạn không bị nằm trong số đó, <B>lệnh "/ignore"</B> không dấu cách.
<P>
Lấy màn hình thông báo của một người khác được lờ đi <B>đánh lệnh "/ignore - tên đăng nhập người khác"</B> không có lời nói nào khác ở đây "-" là một dấu nối. <P>
<P>
<I>Ví dụ:</I> /ignore - Jack
<P>
Bây giờ tất cả các thông báo được gửi đi, bao gồm những thông báo đó sẽ được thông báo bằng lệnh này.
Nếu bạn không chĩ rõ một tên đănh nhập sau dấu nối, sẽ không có gì họat động.

<P>
Bây giờ bạn có thể bỏ qua tên đăng nhập hay một lệnh (eg "/ignore Jack,Helen,Alf" hoặc "/ignore - Jack,Alf"). Được chia ra từng phần bằng dấu phẩy không gian.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Có thông tin về những người sử dụng:</B></A></FONT>
<P>
Để nhìn thấy những thông tin công cộng về một người sử dụng, đánh <B>lệnh "/whois username"</B> không thêm một thứ nào khác.
<P>
<I>Ví dụ:</I> /whois Jack
<P>
thì 'Jack' là tên người sử dụng. Lệnh này sẽ tạo ra một cửa sổ mở ra riêng biệt mà sẽ trình bày thông tin công khai sẵn có về người sử dụng kia. Việc làm việc này để lấy thông tin người khác thì thông tin của bạn cũng bị vậy.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Lưu tin nhắn:</B></A></FONT>
	<P>
	Để gửi những tin nhắn (thông báo những thứ lọai trừ) tới một địa phương HTML <B>đánh lệnh "/save n"</B> không thêm một thứ gì khác.
	<P>
	<I>Ví dụ:</I> /save 5
	<P>
	số 5 là số tin nhắn được lưu lại. Nếu số lượng không được chỉ rõ , nó sẽ chuyển vào tài khỏan.
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Những lệnh chỉ dành cho người quản trị hay MOD.</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Gửi một thông báo:</B></A></FONT>
<P>
Người quản trị có thể làm cho một thông cáo rộng hệ thống tới tất cả những phòng và tầm với là tất cả những người sử dụng hiện thời.
<P>
<I>Ví dụ: /announce Hệ thống chuyện gẫu đang hạ xuống sự bảo trì tối nay tại 8 pm.</I>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
Có những thông báo khác như lệnh; người quản trị hay MOD trong một phòng có thể cũng gửi một thông cáo tới tất cả các người sử dụng trong phòng hiện thời hay tất cả những phòng với lệnh phòng.<B>room lệnh</B>.
<P>
<I>Ví dụ: /room Cuộc gặp bắt đầu tại 15 pm.</I> hoặc <I>/room * Những bắt đầu cuộc gặp tại 15 pm trong phòng Nhân viên.</I>
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Đá một thành viên:</B></FONT>
<P>
Những người điều tiết có thể đá một người sử dụng và người quản trị có thể đá một người sử dụng hay một người điều tiết với lệnh cú đá. Trừ người quản trị, người sử dụng thì được đá trong phòng hiện thời.
<P>
<I>Ví dụ</I>, nếu Jack là một người sử dụng đá ra khỏi: <I>/kick Jack</I> hoặc <I>/kick lý do đá</I>. Suy luận có thể là do ông ấy spam.
<P>
Nếu * tùy chọn được sử dụng (<I>/kick * <?php echo(L_HELP_REASON); ?></I>), lệnh sẽ đá ở ngoài từ chuyện gẫu tất cả những người sử dụng không có những sức mạnh (những khách và những người sử dụng được đăng ký duy nhất). Đây thì hữu ích khi kết nối người phục vụ đang có những vấn đề và tất cả người dân cần phải tái chất hàng chuyện gẫu của họ. Trong trường hợp thứ hai này, a <I><?php echo(L_HELP_REASON); ?></I> được khuyến cáo để để cho những người sử dụng biết tại sao họ là bình thường kick.
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Trục xuất một người sử dụng:</B></A></FONT>
	<P>
	Những người điều tiết có thể trục xuất một người sử dụng và người quản trị có thể trục xuất một người sử dụng hay một người điều tiết với lệnh lệnh cấm <B>ban lệnh</B>.<br />
	Người quản trị có thể trục xuất một người sử dụng từ phòng khác so với cái Ông ta đang tán gẫu Vào trong. Ông ta có thể cũng trục xuất một người sử dụng mãi mãi Và Đến từ chuyện gẫu hết thảy với '*' Sự thiết đặc thì phải chèn vào trước.
	<P>
	<I>Ví dụ</I>, nếu Jack là một người mang cái tên trục xuất: <I>/ban Jack</I>, <I>/ban * Jack</I> hoặc <I>/ban * Jack lý do gã cấm</I>. Lý do có thể là gã spam.
	<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Đẩy mạnh , giáng chức một người sử dụng điều tiết:</B></A></FONT>
<P>
Những người điều tiết và người quản trị có thể đẩy mạnh một người sử dụng khác tới người điều tiết với lệnh phát động.
<P>
<I>Ví dụ</I>, nếu jack là tên một người đẩy mạnh. Hãy xài lệnh: <I>/promote Jack</I>
<P>
Chỉ người quản trị có thể truy nhập đặc tính đối diện (giảm bớt một người điều tiết tới người sử dụng đơn giản) sử dụng giáng chức lệnh.
<P>
<I>Ví dụ</I>, nếu gã làm tên một người giáng chức: <I>/demote Jack</I> hoặc <I>/demote * Jack</I> (sẽ giáng chức ông ta từ dòng hay mọi thứ những phòng).
<br /><P ALIGN="right"><A HREF="#top">Quay lại từ đầu</A></P>
<P>
</BODY>
</HTML>
<?php
?>