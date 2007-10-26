<?php
// File : turkish/localized.chat.php - plus version (28.09.2007 - rev.27)
// Original translation in turkish by Volkan Övün <vovun@hotmail.com>
// Finetunning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for Charset
$Charset = "utf-8";

/// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Yardım");

define("L_WEL_1", "%s %s eski mesajların silinme süresi");
define("L_WEL_2", " %s %s aktif olmayan kullanıcıların odadan çıkarılma süresi");

define("L_CUR_1", " ");
define("L_CUR_1a", "Şu anda");
define("L_CUR_1b", "Şu anda");
define("L_CUR_2", "sohbette");
define("L_CUR_3", "Şu anda sohbet odalarında bulunan kullanıcılar");
define("L_CUR_4", "özel odalardaki kullanıcılar");
define("L_CUR_5", "Gözlemleyen kullanıcı sayısı<br />(bu sayfaya bakıyorlar):");

define("L_SET_1", "Lütfen kullanıcı bilgilerinizi yazın...");
define("L_SET_2", "Kullanıcı adınız");
define("L_SET_3", "gösterilecek mesajların sayısı");
define("L_SET_4", "her güncellemenin arasındaki zamanaşımı");
define("L_SET_5", "Bir sohbet odası seçiniz ...");
define("L_SET_6", "Mevcut genel odalar");
define("L_SET_7", "Seçiminizi yapınız ...");
define("L_SET_8", "Kullanıcılar tarafından oluşturulan genel odalar");
define("L_SET_9", "Kendi");
define("L_SET_10", "genel");
define("L_SET_11", "özel");
define("L_SET_12", "odanızı oluşturun");
define("L_SET_13", "Sonra ");
define("L_SET_14", "Sohbet Et");
define("L_SET_15", "Mevcut özel odalar");
define("L_SET_16", "Kullanıcılar tarafından oluşturulan özel odalar");
define("L_SET_17", "avatarınızı (sanal simgenizi) seçin");
define("L_SET_18", "Bu sayfayı favorilerinize ekleyin:  \"CTRL +D\" ye basın.");

define("L_SRC", "ücretsiz olarak var");

define("L_SECS", "saniye");
define("L_MIN", "dakika");
define("L_MINS", "dakika");
define("L_HOUR", "saat");
define("L_HOURS", "saat");

// registration stuff:
define("L_REG_1", "Şifreniz");
define("L_REG_2", "Kullanıcı Yönetimi");
define("L_REG_3", "Kayıt ol");
define("L_REG_4", "Profilinizi düzenleyin");
define("L_REG_5", "Kullanıcı sil");
define("L_REG_6", "Kullanıcı kayıt");
define("L_REG_7", "eğer kayıt olduysanız gereklidir");
define("L_REG_8", "E-postanız");
define("L_REG_9", "Kayıt olma işleminiz başarıyla yapıldı.");
define("L_REG_10", "Geri");
define("L_REG_11", "Düzenleme");
define("L_REG_12", "Kullanıcı bilgilerini değiştirme");
define("L_REG_13", "Kullanıcı silme");
define("L_REG_14", "Giriş");
define("L_REG_15", "Giriş");
define("L_REG_16", "Değiştir");

define("L_REG_17", "Profiliniz başarıyla güncellendi.");
define("L_REG_18", "Bir moderatör tarafından bu odadan atıldınız.");
define("L_REG_18a", "Bir moderatör tarafından bu odadan atıldınız.<br />Sebep: %s");
define("L_REG_19", "Çıkarılmak istiyor musunuz?");
define("L_REG_20", "Evet");
define("L_REG_21", "Başarıyla çıkarıldınız.");
define("L_REG_22", "Hayır");
define("L_REG_25", "Kapat");
define("L_REG_30", "Adı");
define("L_REG_31", "Soyadı");
define("L_REG_32", "WEB");
define("L_REG_33", "E-posta adresini genel bilgilerde göster");
define("L_REG_34", "Kullanıcı profilini düzenlemek");
define("L_REG_35", "Yönetim");
define("L_REG_36", "Şehir/ülke");
define("L_REG_37", "<span class=\"error\">*</span> İşaretli alanların doldurulması zorunludur.");
define("L_REG_39", "Bulunduğunuz oda Yönetici tarafından kaldırılmıştır.");
define("L_REG_45", "Cinsiyet");
define("L_REG_46", "Bay");
define("L_REG_47", "Bayan");
define("L_REG_48", "Belirtilmedi");
define("L_REG_49", "Kayıt olunması gerekiyor!");
define("L_REG_50", "Kayıtlar dondurulmuştur!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Sohbete giriş için ayarlarınız");
define("L_EMAIL_VAL_2", "Sohbet sunucumuza hoşgeldiniz..");
define("L_EMAIL_VAL_Err", "Yapısal hata! Lütfen Yönetici ile irtibata geçiniz: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Şifreniz eposta a-dresinize gönderilmiştir.<br />Giriş sayfasındaki Profilinizi denetleyin başlığı altında şifrenizi değiştirebilirsiniz.");

// admin stuff
define("L_ADM_1", "%s artık bu odanın denetleyicisi değil.");
define("L_ADM_2", "Artık kayıtlı kullanıcı değilsiniz.");

// error messages
define("L_ERR_USR_1", "Bu kullanıcı adı şu anda kullanılıyor. Lütfen başka bir tane seçin.");
define("L_ERR_USR_2", "Bir kullanıcı adı seçmelisiniz.");
define("L_ERR_USR_3", "Bu kullanıcı adı daha önce alınmış.<br />Eğer bu kullanıcıysanız şifrenizi girin<br />değilseniz başka bir kullanıcı adı seçin.");
define("L_ERR_USR_4", "Yanlış şifre girdiniz.");
define("L_ERR_USR_5", "Kullanıcı adınızı yazmalısınız.");
define("L_ERR_USR_6", "Şifrenizi yazmalısınız.");
define("L_ERR_USR_7", "E-posta adresinizi yazmalısınız.");
define("L_ERR_USR_8", "Geçerli bir e-postya adresi yazmalısınız.");
define("L_ERR_USR_9", "Bu kullanıcı adı şu anda kullanılıyor.");
define("L_ERR_USR_10", "Yanlış kullanıcı adı veya yanlış şifre.");
define("L_ERR_USR_11", "Yönetici olmanız gerekmektedir.");
define("L_ERR_USR_12", "Siz Yöneticisiniz, dolayısıyla atılamazsınız.");
define("L_ERR_USR_13", "Kendi özel odanızı oluşturabilmek için<br />kayıtlı kullanıcı olmanız gerekmektedir.");
define("L_ERR_USR_14", "Sohbet yapmadan önce kaydolmalısınız.");
define("L_ERR_USR_15", "Tam adınızı yazmalısınız.");
define("L_ERR_USR_16", "Sadece şu özel karekterler kullanılabilir:\\n".$REG_CHARS_ALLOWED."\\nBoşluklar, virgüller veya ters bölüler (\\) kullanılamaz.\\nYazı dizilimini kontrol ediniz.");
define("L_ERR_USR_16a", "Sadece şu özel karekterler kullanılabilir:<br />".$REG_CHARS_ALLOWED."<br />Boşluklar, virgüller veya ters bölüler (\\) kullanılamaz.\\nYazı dizilimini kontrol ediniz.");
define("L_ERR_USR_17", "Bu oda mevcut değil ve siz oda oluşturmaya yetkili değilsiniz.");
define("L_ERR_USR_18", "Kullanıcı adınızda yasak kelime bulundu.");
define("L_ERR_USR_19", "Aynı anda birden fazla odada bulunamazsınız.");
define("L_ERR_USR_20", "Bu odaya ya da bu sohbete girişiniz yasaklanmış.");
define("L_ERR_USR_20a", "Bu odaya ya da sohbete girişiniz yasaklanmış.<br />Sebep: %s");
define("L_ERR_USR_21", "Son ".C_USR_DEL." dakikadan beri aktif değilsiniz,<br />bu nedenle bilgisayar sizi odadan çıkardı.");
define("L_ERR_USR_22", "Bu komut sizin kullandığınız\\ntarayıcı için uygun değil (IE engine).");
define("L_ERR_USR_23", "Özel bir odaya katılmak için kayıt olmanız gerekmektedir.");
define("L_ERR_USR_24", "Kendi özel odanızı oluşturmak için kayıt olmanız gerekmektedir.");
define("L_ERR_USR_25", "Sadece Yöneticiler ".$COLORNAME." rengi kullanabilir!<br /> ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." or ".COLOR_CMS." renklerini kullanmaya çalışmayın.<br />Bu renkler Yönetici ve Moderatörler içindir!");
define("L_ERR_USR_26", "Sadece Yöneticiler ve moderatörler ".$COLORNAME." rengi kullanabilir!<br />".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." or ".COLOR_CMS." renklerini kullanmaya çalışmayın.<br />Bu renkler Yönetici ve Moderatörler içindir!");
define("L_ERR_USR_27", "Kendi kendinizle özel konuşamazsınız.\\nBunu lütfen kendi zihninizde yapın...\\nŞimdi başka bir kullanıcı adı seçin.");
define("L_ERR_ROM_1", "Oda isimleri virgüller ve ters bölüler içeremez (\\).");
define("L_ERR_ROM_2", "Oluşturmak istediğiniz oda isminde yasak kelime bulundu.");
define("L_ERR_ROM_3", "Bu oda genel amaçlı olarak zaten bulunmaktadır.");
define("L_ERR_ROM_4", "Geçersiz oda ismi.");

// users frame or popup

define("L_EXIT", "Sohbetten çıkış");
define("L_DETACH", "Sohbet eden kullanıcılar listesi");
define("L_EXPCOL_ALL", "Hepsini yay/topla");
define("L_CONN_STATE", "Bağlantı yapısını yenile");
define("L_CHAT", "SOHBET");
define("L_USER", "kullanıcı");
define("L_USERS", "kullanıcı");
define("L_LURKER", "gözlemci");
define("L_LURKERS", "gözlemci");
define("L_NO_USER", "Kullanıcı yok");
define("L_ROOM", "oda");
define("L_ROOMS", "oda");
define("L_EXPCOL", "Odayı yay/topla");
define("L_BEEP", "Kullanıcı girişinde düdük sesi ver/verme");
define("L_PROFILE", "Profili göster");
define("L_NO_PROFILE", "Profil yok");

// input frame
define("L_HLP", "Yardım");
define("L_MODERATOR", "Kullanıcı %s şu andan itibaren bu odanın denetleyicisi.");
define("L_KICKED", "Kullanıcı %s başarıyla dışarı atıldı.");
define("L_KICKED_REASON", "Kullanıcı %s başarıyla dışarı atıldı. (Sebep: %s)");
define("L_BANISHED", "Kullanıcı %s başarıyla yasaklandı.");
define("L_BANISHED_REASON", "Kullanıcı %s başarıyla yasaklandı. (Sebep: %s)");
define("L_ANNOUNCE", "DUYURU");
define("L_INVITE", "Kullanıcı %s  <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> odasında kendisine katılmanızı istiyor.");
define("L_INVITE_REG", " Bu odaya girmek için kayıt olmanız gerekir.");
define("L_INVITE_DONE", "Davetiniz %s isimli kullanıcıya gönderildi.");
define("L_OK", "Gönder");
define("L_BUZZ", "Düdük sesi galerisi");
define("L_BAD_CMD", "Bu geçerli bir komut değil!");
define("L_ADMIN", "Kullanıcı %s şu anda zaten Yönetici konumunda!");
define("L_IS_MODERATOR", "Kullanıcı %s şu anda zaten Denetleyici konumunda!");
define("L_NO_MODERATOR", "Sadece bu odanın denetleyicisi bu komutu kullanabilir.");
define("L_NONEXIST_USER", "Kullanıcı %s bu odada değil.");
define("L_NONREG_USER", "Kullanıcı %s kayıtlı kullanıcı değil.");
define("L_NONREG_USER_IP", "IP si : %s.");
define("L_NO_KICKED", "Kullanıcı %s ya Denetleyici ya da Yönetici konumunda ve dışarı atılamaz.");
define("L_NO_BANISHED", "Kullanıcı %s ya Denetleyici ya da Yönetici konumunda ve yasaklanamaz.");
define("L_SVR_TIME", "Sunucu saati: ");
define("L_NO_SAVE", "Saklanacak mesaj yok!");
define("L_NO_ADMIN", "Sadece yönetici bu komutu kullanabilir.");
define("L_NO_REG_USER", "Bu komutu kullanabilmeniz için kayıt olmanız gerekir.");

// help popup
define("L_HELP_TIT_1", "Yüz ifadeleri");
define("L_HELP_TIT_2", "Mesajlar için yazı tipi düzenlemesi");
define("L_HELP_FMT_1", " &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; &lt;U&gt; &lt;/U&gt; HTML etiketlerini kullanarak yazınızı kalın, italik, ya da altı çizili olarak yazabilirsiniz.<br />Örneğin, &lt;B&gt;bu şekilde yazmak&lt;/B&gt; şu sonucu verir: <B>bu şekilde yazmak</B>.");
define("L_HELP_FMT_2", "Bir elektronik posta ya da web adresi yazmak için adresleri hiç bir ekleme yapmadan olduğu gibi yazınız. Bağlantı otomatik olarak oluşturulacaktır.");
define("L_HELP_TIT_3", "Komutlar");
define("L_HELP_NOTE", "Bütün komutların İngilizce olarak kullanılması gerekir!");
define("L_HELP_USR", "kullanıcı");
define("L_HELP_MSG", "mesaj");
define("L_HELP_MSGS", "mesajı");
define("L_HELP_ROOM", "oda");
define("L_HELP_BUZZ", "~ses adı");
define("L_HELP_REASON", "sebep");
define("L_HELP_CMD_0", "{} işaretleri zorunlu olan, [] ise tercihe bağlı ayarları ifade eder.");
define("L_HELP_CMD_1a", "Gösterilmesini istediğiniz mesaj sayısını yazınız. Geçerli olan ve en az 5 tir.");
define("L_HELP_CMD_1b", "Mesaj çerçevesini tekrar yenileyerek son n mesajı gösterir. En az 5 mesaj.");
define("L_HELP_CMD_2a", "Mesaj listesinin yenilenme süresini (saniye olarak) düzenler.<br />Eğer n belirtilmemiş veya 3 ten azsa, yenileme yapılmamakla 10 yenileme arasında değişir.");
define("L_HELP_CMD_2b", "Mesaj ve kullanıcı listesinin yenilenme süresini (saniye olarak) düzenler.<br />Eğer (n) belirtilmemiş veya 3 ten azsa, 0 yenilmeyle (hiç yenileme yapılmamasıyla) 10 saniyelik yenileme arasında değişir.");
define("L_HELP_CMD_3", "Mesaj talebini değiştirir (her tarayıcıda çalışmaz).");
define("L_HELP_CMD_4", "Eğer yetkiniz varsa, mevcut olmayan başka bir oda oluşturarak oraya giriniz.<br />n Sayısı, özel oda için 0 ve genel oda için 1 olarak ayarlanmalıdır; varsayılan 1 dir.");
define("L_HELP_CMD_5", "Odayı terketmenizi sağlar. Tercihe bağlı olarak bir mesaj yazabilirsiniz; o zaman önce mesajı odada görüntüler, sonra odadan çıkmanızı sağlar.");
define("L_HELP_CMD_6", "Kullanıcı adı belirtilen bir kullanıcıyı gözardı etmenizi sağlar. Gözardı edilen kullanıcının mesajları size görünmez.<br />Gözardı ettiğiniz kullanıcının mesajlarını tekrar görmek isterseniz, komutu kullanıcı adıyla birlikte - işaretini de kullanarak yazmalısınız. Eğer komutla beraber rumuz kullanmadan sadece - işareti yazarsanız, daha önce gözardı ettiğiniz bütün kullanıcıları normalr çevirirsiniz.<br />Kullanıcı adı veya bir işaret kullanmadan sadece komutu yazmak, gözardı edilenlerin listesini içeren bir pencere açar.");
define("L_HELP_CMD_7", "Bir önce yazılan metni (komut veya mesaj) geri çağırır.");
define("L_HELP_CMD_8", "Mesajlardan önünde zamanın gösterilmesini etkinleştirir/devre dışı bırakır.");
define("L_HELP_CMD_9", "Kullanıcıyı sohbetten atar. Bu komut sadece Denetleyici tarafından kullanılabilir.");
define("L_HELP_CMD_10", "Belirlenen kullanıcıya özel mesaj gönderir. (Diğer kullanıcılar bunu göremezler).");
define("L_HELP_CMD_11", "Belirlenen kullanıcının bilgilerini gösterir.");
define("L_HELP_CMD_12", "Kullanıcılar profillerini düzenlerken ayrı pencere açar.");
define("L_HELP_CMD_13", "Mevcut odaya giren/çıkan kullanıcıların bilgilerini takip eder.");
define("L_HELP_CMD_14", "Mevcut odadaki Yönetici veya Denetleyicilerin, diğer kayıtlı kullanıcıları aynı oda için Denetleyici olarak tayin etmesine izin verir.");
define("L_HELP_CMD_15", "Mesaj çerçevesini temizler ve sadece son 5 mesajı gösterir.");
define("L_HELP_CMD_16", "Son (n) sayıdaki mesajı bir HTML dosyasına saklar. Eğer (n) belirtilmemişse, mecut tüm mesajlar saklama işlemine dahil edilir.");
define("L_HELP_CMD_17", "Yöneticinin bütün odalardaki bütün kullanıcılara duyuru yapmasını sağlar.");
define("L_HELP_CMD_18", "Başka bir odada sohbet eden kullanıcıyı, bulunduğunuz odaya davet etmenizi sağlar.");
define("L_HELP_CMD_19", "Bir odanın denetleyicisinin veya Yöneticisinin, odadaki bir kullanıcıyı, belirlenmiş bir süre için \"yasaklamasını\" sağlar.<br />Bu komutla yasaklanan kullanıcı daha sonra geri dönebilir. Bir kullanıcıyı \"kalıcı olarak\" yasaklamak için komutla yasaklanacak olan kullanıcının adı arasına <B>’&nbsp;*&nbsp;’</B> işareti koyulur.");
define("L_HELP_CMD_20", "Kim olduğunuzu belirtmeden ne yaptığınızı odaya bildirir.");
define("L_HELP_CMD_21", "Odaya ve size mesaj göndermeye çalışan kullanıcılara,<br /> bilgisayar başından geçici bir süre ayrıldığınızı bildirir. Sohbete geri dönmek istediğiniz zaman, sadece mesaj yazmanız yeterlidir.");
define("L_HELP_CMD_22", "Mevcut odaya bir ikaz sesi ve opsiyonel olarak bir mesaj gönderir.<br /><u>Kullanılışı:</u><br />- Eski kullanım şekli: \"/buzz\" yazın veya \"/buzz [gösterilmesini istediğiniz mesaj]\" yazın - Bu işlem, Yönetici Panelinde belirlenmiş bir uyarı sesini çalar;<br />- Geliştirilmiş kullanım şekli: \"/buzz [~ses_adı]\" veya \"/buzz [~ses_adı] [gösterilmesini istediğiniz mesaj]\" - bu işlem, plus/sounds dizinindeki adını yazdığınız ses_adı.wav ses dosyasını çalar; lütfen \"~\" işaretinin yazıldığı yere dikkat ediniz. (sadece .wav uzantılı dosyalara izin verilir).<br />Varsayılan, bu bir Yönetici/Denetleyici komutu olarak ayarlanmıştır.");
define("L_HELP_CMD_23", "<i>Fısıltı</i> (özel mesaj gönderimi). Mesaj, gönderilen kullanıcının hangi odada olduğu hiç farketmeksizin hedefine ulaşacaktır. Eğer kullanıcı çevrimiçi değilse, bu konuda bilgilendirileceğiniz bir mesaj alırsınız.");
define("L_HELP_CMD_24", "Kullanım şekli: Konu adı en az 2 kelime içermelidir.<br />Bu komut mevcut odanın konu adını değiştirir. Diğer kullanıcıların konu adlarını değiştirmeye çalışmayın. Konu adı olarak önemli şeyleri kullanın.<br />Geçerli ayarlarda bu bir Denetleyici/Yönetici komutudur.<br />\"/topic top reset\" komutunun kullanılmasıyla o andaki geçerli konu adı silinecek ve yeniden odanın varsayılan konu adına dönüşecektir.<br />Tercihe bağlı olarak, \"/topic * {}\" komutu tam olarak aynı işi yapar fakat bir farkla ki, bu komut bütün odaları etkiler (genel konu adı ve genel konu adı düzenlemesi).");
define("L_HELP_CMD_25", "Rasgele şans numaraları olan bir zar oyunu.<br />Kullanımı: /dice veya /dice [n] yazın;<br />n  <b>1 ve %s arasında </b> herhangi bir değer alabilir. (zarların yuvarlanma sayısını ifade eder). Eğer numara yazılmazsa, varsayılan maksimum yuvarlanma sayısı kullanılır.");
define("L_HELP_CMD_26", "Bu, /dice komutunun daha karmaşık bir şeklidir.<br />Kullanımı: /{n1}d[n2] yazın veya /{n1}d;<br />n1 <b>1 ve %s arasında</b> herhangi bir değer alabilir. (zarların atılış sayısını ifade eder).<br />n2 <b>1 ve %s arasında</b> herhangi bir değer alabilir (zarların her atılıştaki yuvarlanma sayısını ifade eder).");
define("L_HELP_CMD_27", "Sohbet boyunca belirli bir kullanıcının mesajlarını daha rahat takip edebilmek için üzerine renkli bant çekerek işaretler.<br />Kullanımı: /high {user} yazın veya kullanıcı adının sağındaki küçük <img src=./images/highlightOff.gif> şeklindeki kareye tıklayın (odalarda/kullanıcılar listesinde)");
define("L_HELP_CMD_28", "<i>Tek bir resmin</i> mesaj olarak gönderilmesine izin verir.<br />Kullanımı: Gönderilecek fotoğraf internette ve herkesin erişimine açık bir yerde olmalıdır. Giriş izni gerektiren sayfa adreslerini kullanmayınız.<br />Fotoğrafın tam adresi yazılmalıdır! Örnek: <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Desteklenen foto dosyası türleri: .jpg .bmp .gif .png. <br />İPUCU: /img yazın, sonra bir boşluk bırakarak fotoğrafın URL adresini kutuya kopyala-yapıştır yapın; bir web sayfasındaki fotoğrafın URL adresini kopyalamak için üzerine sağ tıklayın, Özelliklerine tıklayın sonra fare ile bütün URL adresini kopyalayın daha sonra da yazdığınız /img komutunun ardına yapıştırın.<br />Bilgisayarınızdaki bir resmi adreslemeyin, bu işlem sohbet penceresinin durmasına neden olur!!!");
define("L_HELP_CMD_29", "İkinci komut, mevcut odadaki Yöneticiye veya Denetleyici(ler)e, daha önce aynı odaya denetleyici olarak atanmış kayıtlı kullanıcının atamasını (denetleyici haklarını)geri almalarına izin verir.<br />* seçeneği kullanıcının bütün odalardaki denetleyici haklarını iptal eder.");
define("L_HELP_CMD_30", "İkinci komut /me komutuyla aynı işlevi görür fakat hitap olarak cinsiyetinizi de belirtir<br />Örneğin * Mr Ciprian TV seyrediyor veya Mrs Dana mutlu.");
define("L_HELP_CMD_31", "Kullanıcıların listedeki sıralamasını giriş saatine göre veya alfabetik olarak değiştirir.");
define("L_HELP_CMD_32", "Bu, zar atma oyununun üçüncü şeklidir.<br />Kullanımı: /d{n1}[tn2] yazın /d{n1} yazın;<br />n1 <b>1 ve 100</b> arasında herhangi bir değer alabilir.(zarların yuvarlanma sayısını ifade eder).<br />n2 <b>1 ve %s arasında</b> herhangi bir değer alabilir. (zarların her atılıştaki yuvarlanma sayısını ifade eder).");
define("L_HELP_CMD_33", "Mesajdaki harflerin büyüklüğünü kullanıcının tercihine göre değiştirir. ( n için izin verilen değerler: <b>7 ve 15 arası</b>); /size komutu harf büyüklüğünü varsayılan değere geri çevirir (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Sohbet Görgü Kuralları");
define("L_HELP_ETIQ_2", "Sitemiz üyelerini arkadaşlık çerçevesi içinde tutmayı ve eğlendirmeyi hedeflemektedir, bu nedenle aşağıdaki kurallara titizlikle uyunuz. Eğer kuralları çiğnerseniz Sohbet Denetleyicilerimizden biri sizi sohbetten dışarı atabilir.<br /><br />Teşekkürler,");
define("L_HELP_ETIQ_3", "Sohbet Görgü Kuralları");
define("L_HELP_ETIQ_4", "Anlamsız harfler ya da rastgele harfler yazarak sohbeti meşgul etmeyiniz.</li>
<li>aLtErnAtiF (büyüklü küçüklü karışık) harfler kullanmayınız.</li>
<li>Büyük harflerle yazmayın. Büyük harfler \"bağırmak\" anlamına gelir.</li>
<li>Sohbet kullanıcılarının dünyanın her yerinden ve bölgesinden olduğunu ve en önemlisi değişik inançlara mensup olduklarını asla unutmayınız. Lütfen bu insanlara, inançlarına ve kültürlerine nazik ve saygılı davranınız.</li>
<li>Diğer kullanıcılara direkt olarak saygısızlık etmeyiniz. Eğer bunu yapan olursa saygısızlık veya küfür içeren kelimeleri dikkate almamaya çalışınız ve Denetleyiciyi uyarınız.</li>
<li>Diğer kullanıcıları gerçek isimleri ile çağırmayınız, bundan hoşlanmayabilirler. Gerçek isimlerin yerine, sohbetteki takma isimlerini kullanınız.</li>");

// messages frame
define("L_NO_MSG", "Şu anda mesaj bulunmamaktadır...");
define("L_TODAY_DWN", "Bu gün gönderilen mesajlar aşağıda listelenmiştir");
define("L_TODAY_UP", "Dün gönderilen mesajlar aşağıda listelenmiştir");

// message colors
$TextColors = array(	"Siyah" => "#000000",
				"Kırmızı" => "#FF0000",
				"Yeşil" => "#009900",
				"Mavi" => "#0000FF",
				"Eflatun" => "#9900FF",
				"Koyu Kırmızı" => "#990000",
				"Koyu Yeşil" => "#006600",
				"Koyu Mavi" => "#000099",
				"Sütlü Kahve" => "#996633",
				"Deniz Mavisi" => "#006699",
				"Turuncu" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Gözardı edilen");
define("L_IGNOR_NON", "Gözardı edilmeyen kullanıcı");

// whois popup
define("L_WHOIS_ADMIN", "Yönetici");
define("L_WHOIS_TOPMOD", "Şef Denetleyici");
define("L_WHOIS_MODER", "Denetleyici");
define("L_WHOIS_USER", "Kullanıcı");
define("L_WHOIS_GUEST", "Misafir");
define("L_WHOIS_REG", "Kayıtlı");


// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s bu odaya girdi" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s bu odaya girdi");
define("L_ENTER_ROM_NOSOUND", "%s bu odaya girdi");
define("L_EXIT_ROM", "%s bu odadan çıktı");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s bir süredir aktif olmadığı için bu odadan otomatik olarak çıkarılmıştır");
define("L_CLOSED_ROM", "%s tarayıcısını kapattı");

// Text for /away command notification string:
define("L_AWAY", "%s bilgisayar başından ayrıldı");
define("L_BACK", "%s geri döndü!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Pratik Menü *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "KONU adını şu şekilde ayarladı: - ");
define("L_TOPIC_RESET", "KONU yu yeniden başlattı.");
define("L_HELP_TOP", "konu olarak en az iki kelime");

// Img cmd mod
define("L_PIC", "Resmi gönderen:");
define("L_PIC_RESIZED", "Ayarlanan yeni boyut:");
define("L_HELP_IMG", "gönderilen resme tam adres:");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s artık bu sohbetteki hiçbir odada Denetleyici değil.");
define("L_IS_NO_MODERATOR", "%s Denetleyici değil.");
define("L_ERR_IS_ADMIN", "%s Yönetici!\\nİzinlerini değiştiremezsiniz.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Mevcut olan ilave komutlar:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Mevcut olan ilave Yenilik/Düzenlemeler :</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Geçerli robotumuz: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Diller");
define("L_PRO_2", "Favori bağlantı 1");
define("L_PRO_3", "Favori bağlantı 2");
define("L_PRO_4", "Açıklama");
define("L_PRO_5", "URL resmi");
define("L_PRO_6", "İsminiz/yazı rengi");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Geçersiz URL ya da mevcut olmayan sunucu.");
define("L_TITLE_AV", "Şu anki Avatarınız (sanal simgeniz): ");
define("L_CHG_AV", "Avatar’ınızı (sanal simgenizi) saklamak için bu<br />formdaki \"".L_REG_16."\"e tıklayınız.");
define("L_SEL_NEW_AV", "Yeni Avatar (sanal simge) seçiniz");
define("L_EX_AV", "(Örnek: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(URL’yi yazdıktan sonra görmek için Enter’a basınız)");
define("L_CANCEL", "Vazgeç");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "İPUCU: Bu odada robotumuz genel olarak açıktır. Konuşmak için <b>hello ".C_BOT_NAME."</b> yazınız. Konuşmayı sonlandırmak için: <b>bye ".C_BOT_NAME."</b>. (özel mesaj: /to <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "İPUCU: Robotumuz %s odasında genel olarak açıktır. İsminin üzerine tıklayıp fısıldayarak sadece özel olarak konuşabilirsiniz. (Komut: /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "İPUCU: Robotumuz genel olarak açık değil. İsminin üzerine tıklayarak sadece özel olarak konuşabilirsiniz. (Komutlar: /to <b>".C_BOT_NAME."</b> Mesaj veya /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Robot bu odada aktif değil!");
define("BOT_START_ERROR", "Robot bu odada zaten aktif!");
define("BOT_DISABLED_ERROR", "Robot Yönetici Panel’inden devre dışı bırakılmış!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "zarı atıyor, sonuçlar:");
define("DICE_WRONG", "Kaç zar atmak istediğinizi seçmelisiniz.\\n(1 ve ".MAX_ROLLS.") arasında bir sayı seçiniz.\\nBütün ".MAX_ROLLS." zarları atmak için sadece /dice yazın.");
define("DICE2_WRONG", "İkinci değer 1 ve ".MAX_ROLLS." arasında olmalıdır.\\nBütün ".MAX_ROLLS." zarları kullanmak için boş bırakınız.\\n(Örneğin /".MAX_DICES."d veya /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "İlk değer 1 ve ".MAX_DICES." arasında olmalıdır.\\n(Örneğin /".MAX_DICES."d veya /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "İkinci değer 1 ve ".MAX_ROLLS." arasında olmalıdır.\\nBütün ".MAX_ROLLS." zarları kullanmak için boş bırakınız.\\n(Örneğin /d50 veya /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Arşivi Aç");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Özel mesajlarda pencere açar");
define("L_PRIV_POST_MSG", "Özel mesaj gönder!");
define("L_PRIV_MSG", "Yeni özel mesaj alındı!");
define("L_PRIV_MSGS", "Yeni özel mesaj alındı!");
define("L_PRIV_MSGSa", "Burada ilk 10 mesaj görülmektedir!<br />Kalanları görmek için alttaki bağlantıya tıklayın.");
define("L_PRIV_MSG1", "Kimden:");
define("L_PRIV_MSG2", "Oda:");
define("L_PRIV_MSG3", "Kime:");
define("L_PRIV_MSG4", "Mesaj:");
define("L_PRIV_MSG5", "Gönderildiği tarih:");
define("L_PRIV_REPLY", "Cevapla");
define("L_PRIV_READ", "Bütün mesajları okunmuş olarak işaretlemek için ’Kapat’ butonuna tıklatın!");
define("L_PRIV_POPUP", "düzenleyerek bu popup yapıyı her zaman aktif/pasif<br />hale getirebilirsiniz. (sadece kayıtlı kullanıcılar)");
define("L_PRIV_POPUP1", "Profilinizi</a>");
define("L_NOT_ONLINE", "Kullanıcı %s şu anda çevrimiçi değil.");
define("L_PRIV_NOT_ONLINE", "Kullanıcı %s şu an çevrimiçi değil,\\nfakat giriş yaptıktan sonra mesajınızı alacak.");
define("L_PRIV_NOT_INROOM", "Kullanıcı %s odada değil.\\nFakat buna rağmen ona mesaj göndermek istiyorsanız,\\nşu komutu kullanın: /wisp %s mesaj.");
define("L_PRIV_AWAY", "Kullanıcı %s bilgisayar başında değil görünüyor,\\nfakat geri döndüğü zaman\\nmesajınızı alacak.");
define("PM_DISABLED_ERROR", "Fısıldamak (özel mesajlaşma)\\nbu sohbette etkin değildir.");
define("L_NEXT_PAGE", "Sonraki sayfaya git");
define("L_NEXT_READ", "Sonraki %s oku"); // message / 10 messages
define("L_ROOM_ALL", "Bütün odalar");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Aktif" : "Aktif değil"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Aktif" : "Aktif değil"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Sunucudaki mevcut ayarlar</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Varsayılan renkler</u>: Yönetici = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Denetleyiciler = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Diğer Kullanıcılar = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Varsayılan renk</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Renk Seçici");
define("L_COL_HELP_SUB1", "Kullanımı:");
define("L_COL_HELP_P1", "Kendi varsayılan renginizi profilinizde düzenleme yaparak seçebilirsiniz. (kullanıcı adı rengiyle aynı renk). Diğer renkleri de kullanmaya devam edebilirsiniz. Rasgele seçilmiş olan varsayılan renginize dönmek için, bir kere önce varsayılan (Null) rengi seçiniz. - (Seçim listesinde ilk sıradaki.)");
define("L_COL_HELP_SUB2", "İpuçları:");
define("L_COL_HELP_P2", "<u>Renk Yelpazesi</u><br />Tarayıcınızın/İşletim Sisteminizin kapasitesine bağlı olarak, bütün renkler görünmeyebilir. W3C HTML 4.0 standartları sadece 16 rengin görünmesine uygundur.");
define("L_COL_HELP_P2a", "Eğer bir kullanıcı sizin seçtiğiniz rengi göremediğini söylüyorsa, muhtemelen eski sürüm bir tarayıcı kullanıyordur.");
define("L_COL_HELP_SUB3", "Bu sohbette belirlenmiş ayarlar:");
define("L_COL_HELP_P3", "<u>Renk kullanımında yetki seviyeleri</u>:<br />1. Yönetici bütün renkleri kullanır. Yönetici için varsayılan renk <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Denetleyiciler <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> ve <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN> hariç bütün renkleri kullanabilir. Denetleyiciler için varsayılan renk <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Diğer kullanıcılar <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> ve <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN> hariç bütün renkleri kullanabilir.");
define("L_COL_HELP_P3a", "Varsayılan renk <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Teknik konu</u>: Bu renkler Yönetim Panelinde Yönetici tarafından tanımlanmıştır.<br />Eğer bir hata oluşursa veya varsayılan renginizden memnun değilseniz odanızdaki diğer kulanıcılarla değil, <b>Yöneticiyle</b> irtibata geçiniz. :-) <br />Renk ayarlamaları sırasında renk adlarının İngilizce yazılması zorunludur. Program, başka dili anlamaz.");
define("L_COL_HELP_USER_STATUS", "Statünüz");
define("L_COL_TUT", "Sohbette renk kullanımı");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "" .COLOR_CA." rengini sadece yönetici kullanabilir!\\n\\n\\nSizin yazı renginiz ".COLOR_CM."!\\n\\Lütfen başka bir renk seçiniz.");
define("COL_ERROR_BOX_USRA", "" .COLOR_CA." rengini sadece yönetici kullanabilir!\\n\\n".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ya da ".COLOR_CM1."\\n\\nBu renkler yetkili kullanıcılara ayrılmıştır!\\n\\nSizin yazı renginiz ".COLOR_CD."!\\n\\nLütfen başka bir renk seçiniz.");
define("COL_ERROR_BOX_USRM", "" .COLOR_CM." rengini sadece yönetici kullanabilir!\\n\\n".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ya da ".COLOR_CM1."\\n\\nBu renkler yetkili kullanıcılara ayrılmıştır!\\n\\nSizin yazı renginiz ".COLOR_CD."!\\n\\nLütfen başka bir renk seçiniz.");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Sohbetimize hoşgeldiniz. Lütfen sohbet ederken internet görgü kurallarına uyunuz: <I>Nazik ve kibar olmaya çalışınız</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Sohbetimize hoşgeldiniz. Lütfen sohbet ederken internet görgü kurallarına uyunuz: <I>Nazik ve kibar olmaya çalışınız</I>.");
define("WELCOME_MSG_NOSOUND", "Sohbetimize hoşgeldiniz. Lütfen sohbet ederken internet görgü kurallarına uyunuz: <I>Nazik ve kibar olmaya çalışınız</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Bu sunucunun ayarları şu anda değiştirildi. Hatayla karşılaşmamak için tarayıcınızı yenileyiniz. (F5 tuşuna basın veya tarayıcınızı kapatıp sohbete tekrar girin).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Yazı boyutu değeri sadece \\nsıfır (reset için) veya 7-15 arası olabilir.");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "Pazartesi");
define("L_TUE", "Salı");
define("L_WED", "Çarşamba");
define("L_THU", "Perşembe");
define("L_FRI", "Cuma");
define("L_SAT", "Cumartesi");
define("L_SUN", "Pazar");

// Password reset form by Ciprian
define("L_PASS_0", "Şifre yenileme formu");
define("L_PASS_1", "Gizli sorunuz");
define("L_PASS_2", "İlk arabanız ne markaydı?"); // Don't change this question! Just translate it!
define("L_PASS_3", "İlk evcil hayvanınızın adı neydi?"); // Don't change this question! Just translate it!
define("L_PASS_4", "En sevdiğiniz içecek nedir?"); // Don't change this question! Just translate it!
define("L_PASS_5", "Doğum gününüz nedir?"); // Don't change this question! Just translate it!
define("L_PASS_6", "Gizli cevabınız");
define("L_PASS_7", "Şifreyi yenile");
define("L_PASS_8", "Şifreniz başarıyla yenilendi.");
define("L_PASS_9", "Sohbete girmek için yeni şifreniz.");
define("L_PASS_11", "Sohbet sunucumuza tekrar hoşgeldiniz!");
define("L_PASS_12", "Sorunuzu seçin ...");
define("L_LINKS_13", "bu sesi çalmak için"); // Click to blablabla : it can also be translated as "to play this sound", if buzz has no translation.
define("L_LINKS_14", "bu komutu kullanmak için");
define("L_LINKS_15", "açmak için"); // to open/see Posted Links window
define("L_LINKS_16", "Duygu İfadeleri Galerisi");
define("L_ERR_PASS_1", "Yanlış kullanıcı adı. Kendinizinkini kullanın.");
define("L_ERR_PASS_2", "Yanlış e-posta. Tekrar deneyin!");
define("L_ERR_PASS_3", "Yanlış gizli soru.<br />Aşağıdaki gösterilene cevap verin!");
define("L_ERR_PASS_4", "Yanlış gizli cevap. Tekrar deneyin!");
define("L_ERR_PASS_5", "Özel gizlilik verinizi ayarlamadınız.");
define("L_ERR_PASS_6", "Özel gizlilik verinizi henüz ayarlamadınız.<br />Bu formu kullanamazsınız. Yöneticiyle irtibata geçin!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s Bu sohbete Yönetici oldu.");
define("L_ADM_4", "%s artık bu sohbetin öneticisi değil.");

// Open Schedule by Ciprian
define("L_DAILY", "Günlük");
define("L_ALWAYS", "daima");
define("L_OPEN", "Açık");
define("L_CLOSED", "Kapalı");
define("L_OPEN_PUB", "HALKA AÇIK");
define("L_CLOSED_PUB", "HALKA KAPALI");

//open full size picture
define("L_FULLSIZE_PIC", "Resmi büyültmek için tıklayın");

// Links popup page by Alex
define("L_LINKS_1", "Yazılan linkleri");
define("L_LINKS_2", "Yazılan linkleri buradan açabilirsiniz");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "%s %s buraya tıkla");
define("L_CLICK", "%s buraya tıkla");
define("L_LINKS_3", "Bağlantıyı açmak için");
define("L_LINKS_4", "Yazarın sitesini açmak için");
define("L_LINKS_5", "Bu duygu ifadesini eklemek için");
define("L_LINKS_6", "irtibata geçmek için");
define("L_LINKS_7", "phpMyChat Ana Sayfasını ziyaret etmek için");
define("L_LINKS_8", "phpMyChat Grubuna katılmak için");
define("L_LINKS_9", "Düşüncelerinizi göndermek için");
define("L_LINKS_10", "phpMyChat Plus indirmek için");
define("L_LINKS_11", "Kimin sohbet ettiğini görmek için");
define("L_LINKS_12", "Sohbet Giriş Sayfasını açmak için");
define("L_SWITCH", "değiştir");
define("L_SELECTED", "seçildi");
define("L_EMAIL_1", "E-posta göndermek için");
define("L_FULLSIZE_PIC", "Resmi büyültmek için");
define("L_AUTHOR", "Yazarla"); //Phrase will look like this: L_AUTHOR." ".L_LINKS_6." "L_CLICKS. == The author - to contact - click here
define("L_DEVELOPER", "Sohbetin geliştiricisiyle"); //same here
define("L_OWNER", "Sohbetin sahibiyle"); //same here
define("L_TRANSLATOR", "Çevirmenle"); //same here

// Banner topics - the topics are not multi-language!
define("L_BANNER_WELCOME", "%s odasına hoşgeldiniz!");
define("L_BANNER_TOPIC", "Konu:");

// Counter on login
define("L_VISITOR_REPORT", "%s tarihinden beri ziyaretçi sayısı");

// Status bar messages
define("L_JOIN_ROOM", "Bu odaya gir");
define("L_USE_NAME", "Bu kullanıcı adını kullan");
define("L_USE_NAME1", "Bu kullanıcı adını referans göster");
define("L_WHSP", "Whisper");
define("L_SEND_WHSP", "Send a whisper");
define("L_SEND_PM_1", "Send PM");
define("L_SEND_PM_2", "Send a private message");

//Lurking frame popup
define("L_LURKING_2", "Gözlemciler sayfası");
define("L_LURKING_3", "gözlemliyor");
define("L_LURKING_4", "bağlandığı tarih");
define("L_LURKING_5", "Bilinmeyen");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Ekstra Seçenekler");
define("L_SOUNDFIX_IE_1", "IE için ses onarımı");
define("L_SOUNDFIX_IE_2", "IE için ses onarım dosyasını indir");
define("L_LURKING_1", "Gözlemciler sayfasını aç");

// Months for Open Schedule by Ciprian
define("L_JAN", "Ocak");
define("L_FEB", "Şubat");
define("L_MAR", "Mart");
define("L_APR", "Nisan");
define("L_MAY", "Mayıs");
define("L_JUN", "Haziran");
define("L_JUL", "Temmuz");
define("L_AUG", "Ağustos");
define("L_SEP", "Eylül");
define("L_OCT", "Ekim");
define("L_NOV", "Kasım");
define("L_DEC", "Aralık");

// Localized date format
setlocale(LC_TIME, "tr_TR.UTF-8", "Turkish.UTF-8");
define("L_SHORT_DATE", "%d-%m-%Y"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%A, %e %B %Y"); //Change this to your local desired format (keep the long form)
define("L_SHORT_DATETIME", "%d-%m-%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%A, %e %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".$CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","Şu anda ".LOGIN_LINK." kullanıcı</A> sohbet odasında.</td></tr>");
define("USERS_LOGIN","Şu anda ".LOGIN_LINK." 1 kullanıcı</A> sohbet odasında.</td></tr>");
define("NO_USER","Şu anda ".LOGIN_LINK." sohbet eden</A> kimse yok.</td></tr>");

// Language names
define("L_LANG_AR", "Arjantin İspanyolcası");
define("L_LANG_NL", "Flemenkçe");
define("L_LANG_EN", "İngilizce");
define("L_LANG_ENUK", "İngiliz İngilizcesi");
define("L_LANG_ENUS", "Amerikan İngilizcesi");
define("L_LANG_FR", "Fransızca");
define("L_LANG_DE", "Almanca");
define("L_LANG_IT", "İtalyanca");
define("L_LANG_RO", "Romence");
define("L_LANG_ES", "İspanyolca");
define("L_LANG_SV", "İsveççe");
define("L_LANG_TR", "Türkçe");
define("L_LANG_VI", "Vietnamca");
?>