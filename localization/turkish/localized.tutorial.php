<?php
// File : turkish/localized.tutorial.php - plus version (10.07.2007 - rev.6)
// Original translation by Volkan Övün <vovun@hotmail.com>

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
<TITLE><?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> İçin Türkçe Yardım </TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=${Charset}">
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> İçin Türkçe Yardım -</FONT>
	<br /><I>&copy; 2007<?php echo((date(Y)>"2007") ? "-".date(Y) : ""); ?> - Türkçeye çeviren <a href="mailto:vovun@ttnet.net.tr?subject=Türkçe%20phpMyChat%20Plus%20çevirisi" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_TRANSLATOR,L_LINKS_6)); ?>.'; return true;" title="<?php echo (sprintf(L_CLICKS,L_TRANSLATOR,L_LINKS_6)); ?>" target=_blank>Volkan Övün</a> - Ankara, Türkiye.</I></B></TD></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Yardım İçeriği</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Dil seçimi</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Sohbete giriş</A><br />
<A HREF="#register" CLASS="topLink">Kayıt olmak</A><br />
<A HREF="#modProfile" CLASS="topLink">Kullanıcı bilgilerinizi değiştirmek</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Oda oluşturmak</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Bağlantı yapısını anlamak</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Mesaj göndermek</A><br />
<A HREF="#users_list" CLASS="topLink">Kullanıcı listesini anlamak</A><br />
<A HREF="#exit" CLASS="topLink">Sohbet odasından çıkmak</A><br />
<A HREF="#users_popup" CLASS="topLink">Giriş yapmaksızın kimlerin sohbet
ettiğini öğrenmek</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Sohbet görüntü ayarları</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Özellikler ve komutlar:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Yardım Komutu</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatarlar (Sanal
Simgeler)</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Grafik yüz
ifadeleri</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Yazı biçimlemek</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Bir kullanıcıyı bulunduğunuz sohbet odasına davet etmek</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Bir sohbet odasından diğerine geçmek</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Sohbet içindeki profilinizi değiştirmek</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Girilen son mesajı veya komutu tekrar çağırmak</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Belirli bir kullanıcıya cevap vermek</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Özel mesajlar</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Eylemler</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Diğer kullanıcıları gözardı etmek</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Diğer kullanıcılar hakkındaki genel bilgileri öğrenmek</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Mesajları saklamak</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Yöneticiler ve/veya Denetleyicilere mahsus komutlar:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Bir duyuru göndermek</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Bir kullanıcıyı odadan
atmak</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Bir kullanıcıyı
yasaklamak</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Bir kullanıcıyı bir
    odaya Denetleyici olarak tayin etmek / Denetleyici ünvanını iptal etmek:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><b>Dil seçimi:</b></A></FONT>
	<P>
	Başlangıç sayfasındaki bayraklardan birine tıklayarak dil seçebilirsiniz.
    Aşağıdaki örnekte Fransızca seçilmektedir:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flags for language selection">
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><b>Sohbete giriş:</b></A></FONT>
<P>
Eğer daha önce kayıt olduysanız, kullanıcı adınızı ve şifrenizi yazdıktan sonra
girmek istediğiniz sohbet odasını seçiniz ve ’<?php echo(L_SET_14); ?>’ butonuna
tıklayınız.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Eğer daha önce kayıt olmadıysanız, önce <A HREF="#register">kayıt olmanız</A>
    gerekir.
	<?php
}
else
{
	?>
<P>
	Eğer kayıt olmak istemiyorsanız sadece kullanıcı adı yazarak sohbete
    girersiniz; fakat kullanıcı adınız kalıcı olarak kaydedilmez.&nbsp; (Başka
    bir kullanıcı siz çıktıktan sonra aynı kullanıcı adını alabilir).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><b>Kayıt olmak:</b></A></FONT>
<P>
Eğer daha önce kayıt olmadıysanız lütfen Kayıt ol seçeneğine tıklayınız. Küçük
bir pencere açılacaktır.
<P>
<UL>
	<LI>Önce, kendinize bir kullanıcı adı bularak ilgili kutuya kullanıcı
    adınızı yazın. Bu
    kullanıcı adı sohbet odasında otomatik olarak görüntülenecektir. Kullanıcı
    adınız boşluk, nokta, virgül ve ters bölü işareti (\) içermemelidir.
<?php if (C_NO_SWEAR) echo(" It can not contain \"swear words\"."); ?>
	<LI>İkinci olarak, adınızı soyadınızı ve elektronik posta adresinizi
    yazınız. Sohbete kayıt olmak için bütün bu bilgilerin belirtilmesi
    gerekir. Cinsiyet bilgisi tercihe bağlıdır.
	<LI>Eğer bir web siteniz varsa, sitenizin URL adresini kutucuğa yazabilirsiniz.
	<LI>Dil kutusuna bildiğiniz dilleri yazabilirsiniz; ileride diğer kullanıcılara hangi dilleri anladığınıza dair
    fikir verecektir.
	<LI>Son olarak, eğer e-posta adresinizin diğer kullanıcılar tarafından
    görülebilmesini arzu ediyorsanız lütfen "E-posta adresini genel bilgilerde
    göster" onay kutucuğunu işaretleyiniz. Eğer e-posta adresinizin diğer
    kullanıcılar tarafından görülmesini istemiyorsanız onay kutucuğunu boş
    bırakınız..
	<LI>Daha sonra Kayıt ol butonuna tıklayın, kaydınız yapılacaktır. Bu
    işlemlerin herhangi bir aşamasında kayıt olmaktan vazgeçerseniz Kapat
    butonuna tıklayınız.
</UL>
<P>
<A NAME="modProfile"></A>Tabii ki, kayıtlı kullanıcılar kendi profillerinde
istedikleri zaman ilgili linke tıklayarak değişiklik yapabilirler.<br />
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><b>Oda oluşturmak:</b></A></FONT>
	<P>
	Kayıtlı kullanıcılar oda oluşturabilirler. Özel odalara sadece bu odaların
    isimlerini bilen kullanıcılar girebilir ve özel odaların isimleri içinde
    bulunan kullanıcılardan başka hiç kimse tarafından görülemez.<br />
	<P>
	Oda isimleri virgül ya da ters bölü (\) işareti içermemelidir.<?php if (C_NO_SWEAR) echo(" It cannot contain \"swear words\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><b>Bağlantı yapısını anlamak:</b></A></FONT>
	<P>
	Ekranın sağ-üst köşesindeki bir işaret sohbet odasının bağlantı yapısını
    ifade eder. üç şekildedir:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection">
        bağlantı gerekmediği anlarda ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting">
        bağlantının faal olduğu anlarda ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed">
        bağlantının kesildiği anlarda.
	</UL>
	<P>
	Üçüncü durumdayken kırmızı "butona" tıklamak, tekrar bağlanmaya çalışır.
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><b>Mesaj göndermek:</b></A></FONT>
<P>
Sohbet odasına bir mesaj göndermek için, mesajınızı sol-alt köşedeki metin
kutusuna yazın sonra da göndermek için Enter tuşuna basın (Ya da Gönder butonuna
tıklayın). Bütün kullanıcılardan gelen mesajlar sohbet penceresinde ardarda
sıralanır.<br />
<?php if (C_NO_SWEAR) echo("Note that \"swear words\" are skipped from messages."); ?>
<P>
Metin kutusunun sağındaki seçim listesinden bir renk seçerek mesajlarınızın
rengini değiştirebilirsiniz.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><b>Kullanıcı listesini anlamak (açılan
penceredeki kullanıcılar değil):</b></A></FONT>
<P>
<OL>
	Kullanıcılar listesi için iki temel yapı tanımlanmıştır:<br />
	<LI>Kayıtlı bir kullanıcının rumuzunun solundaki küçük bir ikon, o
    kullanıcının cinsiyeti gösterir (buna tıklamak, o kullanıcı için <A HREF="#whois">whois (kimdir penceresi)</A> ni açar); fakat kayıtlı olmayan kullanıcıların rumuzlarının solunda ikon olmayıp bir boşluk yer alır;<br />
	<LI>Yönetici ve Denetleyicilerin rumuzları sağa yatık (italik) yazılır.
</OL>
<P><I>Örneğin</I>, aşağıdaki liste görüntüsünden şunları anlarsınız:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas phpMyChat odasının Yöneticisi veya Denetleyicilerinden
        biridir;<br /><br />
		<LI>alien (kayıt sırasında cinsiyetini belirtmemiş), Jezek2 ve Caridad
        phpMyChat odası için ekstra "yetkileri" olmayan kayıtlı
        kullanıcılardır;<br /><br />
		<LI>lolo sıradan bir kayıtlı olmayan kullanıcıdır.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><b>Sohbet odasından çıkmak:</b></A></FONT>
<P>
Sohbetten çıkmak için sadece &quot;Çık&quot; resmine tıklayınız. Alternatif olarak,
aşağıdaki komutlardan herhangi birini metin kutusuna yazabilirsiniz:<br />
/exit<br />
/bye<br />
/quit<br />
Bu komutlar siz sohbet odasını terk ederken arkanızda bırakmak istediğiniz bir
mesajla tamamlanabilirler. <i>Örneğin :</i> /quit Sonra görüşürüz!
<P>
komutu, sohbet penceresine "Sonra görüşürüz!" yazar ve hemen ardından sizi
odadan çıkarır.

<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><b>Giriş yapmaksızın kimlerin sohbet ettiğini
öğrenmek:</b></A></FONT>
<P>
Başlangıç sayfasının yukarısında, kullanıcıların sayısını gösteren bağlantıya
tıklayabilir, veya, eğer sohbet ediyorsanız, pencerenin sağ-üst köşesindeki <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> işaretine tıklamak suretiyle açılan başka bir pencerede, giriş yapmış bütün
kullanıcıları ve sohbet ettikleri odaları gerçek zamanlı olarak görebilirsiniz.<br />
Eğer giriş yapmış kullanıcılar üç kişiden azsa, açılan pencerenin başlığı
kullanıcı adlarını içerir, üçten fazla kullanıcı içerideyse kullanıcı sayısı ve
açılan oda sayısı açılan pencerenin başlığındadır.
<P>
Bu yeni açılan pencerenin yukarısındaki <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>"> ikonuna
tıklamak, içeri kullanıcı girdiği zaman çalan sinyal sesini açar veya kapatır.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><b>Sohbet görüntü ayarları:</b></A></FONT>
<P>
Sohbetin görüntüsünü ayarlarlamak için pek çok değişik yöntem vardır. Ayarları
değiştirmek için bununla ilgili komutu yazmanız ve Enter/Return düğmesine
basmanız (veya Gönder butonuna tıklamanız) yeterlidir.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI><b>Clear komutu,</b> gönderilen son 5 mesajı bırakarak daha öncekileri siler
        ve sohbet penceresini temizler.<br />Tırnak işaretleri olmaksızın "/clear"
        yazınız.
		<P>
		<?php
	}
	else
	{
		?>
		<LI><b>Order komutu</b>, yeni gelen mesajların isteğinize göre, sohbet
        penceresinin üstünde ya da altında&nbsp; görüntülenmesini sağlar.<br />
        Tırnak işaretleri olmaksızın "/order" yazınız.
		<P>
		<?php
	};
	?>
	<LI><b>Notify komutu</b>, diğer kullanıcıların&nbsp; sohbet odasına giriş
    çıkışlarının bilgisinin görüntülenmesini / görüntülenmemesini (açık/kapalı)
    sağlar. Varsayılan olarak bu seçenek &quot;açık&quot;tır ve giriş çıkış bilgisi
    görüntülenir.<br />Tırnak işaretleri olmaksızın "/notify" yazınız.
	<P>
	<LI> <B>Timestamp komutu, </B>gönderilen mesajların önünde gönderiliş
    zamanının ve durum çubuğunda sunucu zamanının
    görüntülenmesini/görüntülenmemesini (açık/kapalı) sağlar. Varsayılan olarak
    bu seçenek &quot;açık&quot;tır <?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?>.<br />
    Tırnak işaretleri olmaksızın "/timestamp" yazınız.
	<P>
	<LI><b>Refresh komutu</b>, gönderilen mesajların ekranda yenilenme değerini
    ayarlar. Varsayılan değer saniyedir. Değeri değiştirmek için, tırnak
    işaretleri olmaksızın "/refresh (n)" yazın. (n) yerine, yeni ekran yenilenme
    değerini saniye cinsinden yazın.
	<P>
	<i>Örneğin:</i> /refresh 5
	<P>
	değeri 5 saniye olarak değiştirir. *Dikkat, eğer n değeri 3 ten aşağı olursa
    yenilenme devre dışı kalır. (çok sayıda eski mesajı rahatsız olmadan okumak
    istediğinizde, yenilenmenin devre dışı bırakılması kullanışlıdır)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
      <LI><b>Show komutu,</b> ekranınızda görülen mesajların sayısını ayarlamanızı sağlar.
      Varsayılan sayıyı değiştirmek için, tırnak işaretleri olmaksızın "/show (n)"
      yazın. (n) görünecek mesaj sayısıdır.
		<P>
		<i>Örneğin:</i> /show 50
		<P>
		ekranınızda 50 mesajın görünmesini sağlar. Eğer bütün mesajlar aynı anda
        (ekran boyunun küçük olması nedeniyle) ekranınızda görünmezse, mesaj
        çerçevesinin sağında bir sürükleme çubuğu belirir.</UL>
		<?php
	}
	else
	{
		?>
		<LI> <B>Show ve Last komutları</B> sohbet çerçevesini temizleyip, son
        gönderilen (n) sayıdaki mesajın çerçevede kalmasını sağlar. Tırnak
        işaretleri olmaksızın "/show (n)" veya "/last (n)" yazın. (n), Görünecek
        olan mesaj sayısını ifade eder.
		<P>
		<i>Örneğin:</i> /show 50 veya /last 50
		<P>
		wsohbet çerçevesini temizleyecek ve 50 en son gelen mesajın çerçeve
        içinde görünmesini sağlar. Eğer bütün mesajlar çerçeve içinde
        görülemiyecek kadar uzunsa, bu kez çerçevenin sağında bir sürükleme
        çubuğu belirir.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<b>
<FONT SIZE="+2"><A NAME="commands"><U>Özellikler ve Komutlar</U></A></FONT></b>
<P>

<FONT SIZE="+1"><A NAME="help"><b>Yardım Komutu:</b></A></FONT>
<P>
Sohbet odasına girdiğinizde, mesaj kutusunun solundaki&nbsp; <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> resmine tıklayarak, ya da mesaj kutusuna /help veya /? komutlarını yazarak yardım penceresine ulaşabilirsiniz.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><b>Avatarlar (Sanal Simgeler) :</b></A></FONT>
<P>Avatarlar (Sanal Simgeler) sohbet edenleri simgeleyen grafik resimlerdir.
Sadece kayıtlı kullanıcılar sanal simgelerini değiştirebilirler. Kayıtlı
kullanıcılar profillerini açıp&nbsp; ( /profile komutuna bakınız), resimler
menüsünden sanal simge resmine tıklayarak&nbsp; ya da, internette herhangi bir
yerdeki bir resmin URL adresini yazarak sanal simgelerini değiştirebilirler (sadece
şifreyle korunmayan, genel adreslemeye açık resimler kullanılabilir). Resimler
tarayıcıların kullanabileceği türden (.gif, .jpg, vesaire. ) 32 x 32 pixel
grafik dosyalar olmalıdır.
<P>Mesaj çerçevesinde bir kullanıcının sanal simgesine tıklamak o kullanıcının
profil penceresini açar (<A HREF="#whois">/whois komutuna</A>&nbsp; bakınız).
Eğer kayıtlı kullanıcıysanız, kendi sanal simgenize tıklamak, kendi profil
pencerenizin açılmasına neden olur. Kayıtlı kullanıcı değilseniz kaydolmanız
gerektiğine ilişkin bir uyarı yazısı alırsınız.
  <P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><b>Duygu ifadeleri:</b></A></FONT>
	<P>Mesajlarınıza grafik duygu ifadeleri ekleyebilirsiniz. Aşağıdaki tabloda
    kullanabileceğiniz duygu ifadelerinin kodlarına bakınız.
	<P>
	<i>Örneğin</i>, tırnak işaretleri olmaksızın&nbsp; "Merhaba Mehmet :)&quot; yazıp
    göndermek, sohbet çerçevesinde Merhaba Mehmet <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)">
    şeklinde görünür.
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
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><b>Yazı Biçimlemek:</b></A></FONT>
	<P>
	Yazılar,&nbsp; &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; or &LT;U&GT; &LT;/U&GT HTML
    etiketleri kullanılarak kalın, sağa yatık (italik) veya altı çizili olarak
    yazılabilirler. &lt;B&gt;&lt;/B&gt; etiketleri arasına yazılan yazılar kalın, &lt;I&gt;&lt;/I&gt;
    etiketleri arasına yazılan yazılar sağa yatık (italik) ve &lt;U&gt;&lt;/U&gt; etiketleri
    arasına yazılan yazılar altı çizili görünürler.<P>
	<i>Örneğin</i>, &LT;U&GT;bu yazı&lt;/U&gt; şöyle görünür: <U>bu yazı</U>
	<P>
	To Bir e-posta adresine ya da bir URL adresine bağ yaratmak için sadece
    adresi yazmanız yeterlidir (HTML etiketi gerekmez). Bağ otomatik olarak
    belirecektir.
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo(L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo(L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo(L_WHOIS_MODER); elseif ($CookieStatus == "u") echo(L_WHOIS_GUEST); else echo(L_WHOIS_REG);?></b><br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><b>Bir kullanıcıyı bulunduğunuz sohbet odasına
davet etmek:</b></A></FONT>
<P>
YBir kullanıcıyı, size katılması için içinde sohbet ettiğiniz odaya davet
edebilirsiniz. Bunun için invite komutunu kullanmalısınız.
<P>
<i>Örneğin:</i> /invite Mehmet
<P>
wMehmete sizin bulunduğunuz odaya gelip size katılması söyleyen kişiye özel bir
mesaj gönderir. Bu mesajda, üzerine tıklanabilecek bir bağ olarak sizin
bulunduğunuz odanın adı da yer alır.
<P>
Tek bir invite komutuyla birkaç kişiyi davet edebilirsimiz (örnek &quot;/invite
Mehmet,Ayşe,Murat"). İsimler aralarında boşluk bırakılmaksızın virgülle (,)
ayrılmalıdır.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><b>Bir sohbet odasından diğerine geçmek:</b></A></FONT>
<P>
Ekranın sağında sohbet odalarının ve içlerindeki kullanıcıların adları bulunan
bir liste vardır. İçinde bulunduğunuz odayı terkedip listedeki odalardan birine
girmek için, girmek istediğiniz odanın ismine tıklamanız yeterlidir. Boş odalar
listede görünmez. Boş bir odaya girmek için, tırnak işareti olmaksızın&nbsp;
&quot;/join #odanınadı&quot; yazın.
<P>
<i>Örneğn:</i> /join #KırmızıOda
<P>
komutu sizi KırmızıOda isimli odaya taşır.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>If you’re a registered user, you" : "<br /><P>You");
	?>
	 Aynı komutla, mevcut olmayan oda da oluşturulabilir. Fakat bu kez odanın
niteliğini belirtmeniz gerekir. 0 özel odayı, 1 ise genel odayı ifade eder. (1
varsayılan değerdir).
	<P>
	<i>Örneğin:</i> /join 0 #BenimOdam
	<P>
	komutu BenimOdam adında yeni bir özel oda oluşturur ve sizi o odaya taşır.
    (Aynı adlı bir odanın daha önceden oluşturulmamış olması gerekir).
	<P>
	Oda isimleri virgül (,) ve ters bölü işareti (\) içeremezler.<?php if (C_NO_SWEAR) echo(" It cannot contain \"swear words\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B><a name="changeprofile">Sohbet içindeki profilinizi değiştirmek</a>:</B></FONT>
<P>
<B>Profile komutu</B>, kullanıcı adınız ve şifreniz hariç kullanıcı profilinizi
değiştirebileceğiniz bir pencere açar. (Şifrenizi değiştirmek için başlangıç
sayfasındaki Profiliniz bağlantısını kullanmanız gerekir).<br />&nbsp;/profile
yazın<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B><a name="recall">Girilen son mesajı veya komutu
geri çağırmak:</a></B></FONT>
<P>
<B>! Komutu,</B> yazdığınız son mesaj ya da komutun mesaj kutusuna otomatik
olarak tekrar yazılmasını sağlar.<br />Type /!
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B><a name="respond">Belirli bir kullanıcıya cevap vermek:</a></B></FONT>
<P>
Sohbet penceresinin sağında bulunan listedeki bir kullanıcının rumuzunun üzerine
tıklandığında,&nbsp; o kullanıcının &quot;kullanıcıadı&gt;&quot; mesaj kutusunda belirir. Bu
özellik size, bir kullanıcıya daha önce sorduğu bir soru için genel (herkesin
görebileceği) cevap vermenize olanak verir.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Özel mesajlar:</B></A></FONT>
<P>
Sizin bulunduğunuz odadaki bir kullanıcıya özel mesaj göndermek için tırnak
işareti olmaksızın<B> &quot;/msg kullanıcıadı mesajınız&quot; veya &quot;/to kullanıcıadı
mesajınız&quot;</B> <b>komutunu</b> yazınız.
<P>
<i>Örneğin, Mehmet kullanıcı adı olsun:</i> /msg Mehmet Merhaba, nasılsın?
<P>
Bu mesaj sadece Mehmet ve size görünür, diğer kukullanıcılar göremezler.
<P>
Sohbet çerçevesindeki bir kullanıcı adına tıklamak, bu komutun mesaj kutusuna otonatik
olarak yazılmasını sağlar.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Eylemler:</B></A></FONT>
<P>
TYaptığınız şeyi tanımlamak için <B>&quot;/me eylem&quot; komutunu</B>, tırnaklar
olmaksızın yazınız.
<P>
<i>Örneğin:</i> Eğer Mehmet "/me kahve içiyor" diye bir mesaj yazarsa, bu mesaj
ekranda "<B>* Mehmet</B> kahve içiyor" şeklinde görünür.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Diğer kullanıcıları gözardı etmek:</B></A></FONT>
<P>
Bir kullanıcının gönderdiği bütün mesajları dikkate almamak ve onları görmemek
istiyorsanız, <B>&quot;/ignore kullanıcıadı&quot; komutunu</B> tırnak işaretleri
olmaksızın yazınız.
<P>
<i>Örneğin:</i> /ignore Mehmet
<P>
Bu komutu yazdığınız andan itibaren Mehmetin gönderdiği hiçbir mesaj sizin
ekranınızda görünmeyecektir.
<P>
Gözardı ettiğiniz kullanıcıların bir listesini görmek isterseniz tırnak
işaretleri olmaksızın<b> &quot;/ignore&quot; komutunu</b>&nbsp; yazın.
<P>
Gözardı ettiğiniz kullanıcının mesajlarını tekrar görmek istediğinizde tırnak
işareti olmaksızın <B>&quot;/ignore - kullanıcıadı&quot; komutunu</B> yazın. "-" gözardı
işlemini iptal eden ifadedir. <P>
<P>
<i>Örneğin:</i> /ignore - Mehmet
<P>
Şimdi, siz bu komutu yazmadan öncekiler de dahil olmak üzere, Mehmetin
gönderdiği bütün mesajlar ekranınızda tekrar görüntülenmeye başlayacaktır.
 Eğer &quot;-&quot; işaretinden sonra bir kullanıcı adı yazmazsanız, &quot;gözardı edilenler
listeniz&quot; temizlenecektir; yani gözardı ettiğiniz bütün kullanıcılar tekrar
normale döner ve mesajları ekranınızda görünür.
<P>
Tek bir komutla birden fazla kullanıcıyı gözardı edebilir, (örnek &quot;/ignore
Mehmet,Ayşe,Mustafa&quot;) ya da gözardı edilen birden fazla kullanıcıyı normale
çevirebilirsiniz (örnek &quot;/ignore - Mehmet,Ayşe,Mustafa). Kullanıcı adları,
arasında boşluk bırakmaksızın virgülle (,) ayrılmalıdır.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Diğer kullanıcılar hakkındaki genel bilgileri
öğrenmek:</B></A></FONT>
<P>
Bir kullanıcının genel bilgilerini öğrenmek için, tırnak işaretleri olmaksızın<B>
&quot;/whois kullanıcıadı&quot; komutunu</B> yazın.
<P>
<i>Örneğin:</i> /whois Mehmet
<P>
’Mehmet’in kullanıcı adı olduğu bir odada bu komut, bu kullanıcıya air genel
bilgileri gösteren bir pencereyi açar. Kendi kullanıcı adınızı yazarak sizin
genel bilgilerinizin bu komutu kullanan diğer kullanıcılar tarafından nasıl
göründüğüne bakınız.
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Mesajları saklamak:</B></A></FONT>
	<P>
	Mesajları yerel bir HTML dosyasında saklamak için tırnak işaretleri
    olmaksızın <B>&quot;/save (n)&quot; komutunu</B> yazınız. (n) saklanması istenen mesaj
    sayısını temsil eder<P>
	<I>Örneğin:</I> /save 5
	<P>
	’5’ saklanması istenen mesaj sayısıdır. Eğer (n) yani mesaj sayısı
    belirtilmemişse, o odadaki bütün mesajlar dosyada saklanır.
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Yöneticiler veya Denetleyicilere
mahsus komutlar</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Bir duyuru göndermek:</B></A></FONT>
<P>
Yönetici,&nbsp; <B>&quot;/announce&quot;&nbsp; komutuyla </B>tüm sistemi kaplayan, bütün
odalardaki bütün kullanıcıların görebileceği mesaj gönderebilir.
<P>
<i>Örneğin: /announce Sohbet sistemi bakım yapılacağı için bu akşam saat 20:00
de geçici olarak kapatılacaktır.</i>
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
Başka bir kullanışlı duyuru komutu da <b>&quot;/room&quot;</b> komutudur. Bu komutla
Yönetici veya Denetleyiciler, içinde bulundukları odaya veya bütün odalara
duyuru gönderebilirler.
<P>
<i>Örneğin: /room Toplantı öğleden sonra saat 15:00te.</i> Veya:&nbsp; <I>/room *
Toplantı öğleden sonra 15:00te Personel odasında.</I>&nbsp; (*) işareti,
duyurunun bütün odalara iletilmesini sağlar.<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
<hr />

<P>
<A NAME="kick">
<FONT SIZE="+1"><B>Bir kullanıcıyı odadan atmak:</B></FONT>
<P>
Moderatorler kullanıcıyı, Yönetici ise kullanıcıyı veya Moderatörü <b>&quot;/kick&quot;
komutunu</b> kullanarak odadan dışarı atabilirler. Yönetici odadan atılamaz.
Atılacak olan kullanıcı, o anki mevcut odada olmalıdır. Başka odadaki kullanıcı
veya Moderatör atılamaz.<P>
<i>Örneğin</i>, Mehmetin odadan atılacak kullanıcının rumuzu olduğunu
varsayalım: <I>/kick Mehmet</I> veya: <I>/kick Mehmet (atma sebebi)</I>.  "Atma
sebebi" herhangi bir yazı olabilir mesela "küfrettiği için!"
<br /><P ALIGN="right"><FONT SIZE="+2" COLOR="GREEN"><A HREF="#top">Sayfa başına
dön</A></font></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Bir kullanıcıyı yasaklamak:</B></A></FONT>
	<P>
	Denetleyiciler bir kullanıcıyı, Yöneticiler hen kullanıcıyı hem de
    Denetleyiciyi <b>&quot;/ban&quot; komutunu</b> kullanarak yasaklayabilir.<br />
	Yönetici, başka bir odada sohbet eden kullanıcıyı yasaklayabilir. Hatta,
    rumuzunun önüne ’<B>*</B>’ işareti koyarak o kullanıcıyı kalıcı olarak
    yasaklayabilir.
	<P>
	<i>Örneğin</i>, Mehmet in yasaklanacak kullanıcının rumuzu olduğunu
    varsayalım: <I>/ban Mehmet</I>,&nbsp; <I>/ban * Mehmet</I>,&nbsp; <I>/ban
    Mehmet (yasaklama sebebi)</I> veya&nbsp; <I>/ban * Mehmet (yasaklama sebebi)</I>.  "Yasaklama
    sebebi" herhangi bir yazı olabilir mesela "küfrettiği için!"
	<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Bir kullanıcıyı Denetleyici olarak tayin
etmek / Denetleyiciliğini iptal etmek:</B></A></FONT>
<P>
Denetleyiciler ve Yönetici başka bir kullanıcıyı <b>&quot;/promote&quot; komutu</b> ile
Denetleyici tayin edebilirler.
<P>
<i>Örneğin</i>, Mehmet in Denetleyici olarak tayin edilecek kullanıcının rumuzu
olduğunu varsayalım: <I>/promote Jack</I>
<P>
Sadece Yönetici ters işlemi gerçekleştirebilir (Yani bir Denetleyiciyi, ünvanını
iptal ederek normal kullanıcı yapabilir). Bunun için &quot;<B>/demote&quot; komutu </B>
kullanılır.
<P>
<i>Örneğin</i>, Mehmet in Denetleyiciliği iptal edilecek kullanıcının rumuzu
olduğunu varsayalım: <I>/demote Mehmet</I> veya&nbsp; <I>/demote * Mehmet</I> (*
işareti kullanılarak yapılan komut, Mehmetin sadece bulunduğu odadaki değil,
bütün odalardaki Denetleyiciliğini iptal eder).
<br /><P ALIGN="right"><A HREF="#top">Sayfa başına dön</A></P>
<P>
</BODY>
</HTML>
<?php
?>