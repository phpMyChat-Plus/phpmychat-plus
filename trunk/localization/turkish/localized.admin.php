<?php
// File : turkish/localized.admin.php - plus version (25.09.2007 - rev.10)
// Original translation in turkish by Volkan Övün <vovun@hotmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "%s için Yönetim");
define("A_MENU_1", "Kayıtlı kullanıcılar");
define("A_MENU_2", "Yasaklı kullanıcılar");
define("A_MENU_3", "Odaları temizle");
define("A_MENU_4", "E-Postalar gönder");
define("A_MENU_5", "Ayarlar");
define("A_MENU_6", "Sohbet ekstraları");
define("A_MENU_7", "Ara");
define("A_MENU_8", "Bağlantılar");
define("A_MENU_9", "Sohbet kayıtlarını sakla");
define("A_LOGOUT", "Çıkış");

// Frame for registered users
define("A_SHEET1_1", "Kayıtlı kullanıcılar listesi ve izinleri");
define("A_SHEET1_2", "Kullanıcı adı");
define("A_SHEET1_3", "İzinler");
define("A_SHEET1_4", "Yöneticili odalar");
define("A_SHEET1_5", "Yöneticili odalar boşluk olmaksızın virgülle (,) ayrılmıştır.");
define("A_SHEET1_6", "İşaretlenmiş profilleri kaldır");
define("A_SHEET1_7", "Değiştir");
define("A_SHEET1_8", "Sizden başka kayıtlı kullanıcı bulunmamaktadır.");
define("A_SHEET1_9", "İşaretli profilleri yasakla");
define("A_SHEET1_10", "Şimdi, seçiminizi saflaştırmak için yasaklı kullanıcılar sayfasını taşımalısınız.");
define("A_SHEET1_11", "Son Bağlantı");
define("A_SHEET1_12", "Yasaklama sebebi (tercihe bağlı)");
define("A_USER", "Kullanıcı");
define("A_MODER", "Denetleyici");
define("A_TOPMOD", "Şef Denetleyici");
define("A_ADMIN", "Yönetici");
define("A_PAGE_CNT", "%s sayfadan %s . si");

// Frame for banished users
define("A_SHEET2_1", "Yasaklı kullanıcılar listesi ve ilgili odalar");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "İlgili odalar");
define("A_SHEET2_4", ".. e kadar");
define("A_SHEET2_5", "sonsuz");
define("A_SHEET2_6", "Eğer oda sayısı 4 ten azsa, odalar boşluk bırakılmaksızın virgülle (,) ayrılmışlardır; aksi takdirde ’<B>*</B>’ işareti<br>bütün odalardan yasaklanır.");
define("A_SHEET2_7", "İşaretli kullanıcının/kullanıcıların yasağını kaldır.");
define("A_SHEET2_8", "Yasaklı kullanıcı yok.");
define("A_SHEET2_9", "Sebep (tercihe bağlı)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Mevcut odaların listesi");
define("A_SHEET3_2", "\"var olmayan\" bir odayı temizlemek, bu odanın tüm yönetici<br>statülerini de kaldırır.");
define("A_SHEET3_3", "Seçili odaları temizle");
define("A_SHEET3_4", "Temizlenecek oda yok.");

// Frame for sending mails
define("A_SHEET4_0", "Ayarlar sekmesinde yönetici e-posta adresini belirtmediniz.");
define("A_SHEET4_1", "E-postalar gönder");
define("A_SHEET4_2", "Kime:");
define("A_SHEET4_3", "Hepsini seç");
define("A_SHEET4_4", "Konu:");
define("A_SHEET4_5", "İleti:");
define("A_SHEET4_6", "Şimdi gönder!");
define("A_SHEET4_7", "Bütün e-postalar gönderildi.");
define("A_SHEET4_8", "Postaları gönderirken hata oluştu.");
define("A_SHEET4_9", "Adres(ler), konu veya ileti yazmadınız!");
define("A_SHEET4_10", "Boşluk bırakmaksızın virgülle ayrılmış (,)<br />ilave e-postalar ekle");
define("A_SHEET4_11", "İmza");
define("A_SHEET4_12", "Bütün seçilenleri iptal et");

// Frame for configuration
define("A_SHEET5_0", "Kullandığınız phpMyChat-Plus sürümü %s dir");
define("A_SHEET5_1", "Yeni sürüm (%s) çıktı!");

//Chat Extras
define("A_EXTR_DSBL", "Sohbet Ekstraları devre dışı") ;
define("A_REFRESH_MSG", "Mesajları Yenile") ;
define("A_MSG_DEL", "Sil") ;
define("A_POST_TIME", "Gönderildiği tarih") ;
define("A_FROM_TO", "Kimden  Kime") ;
define("A_FROM", "Kimden") ;
define("A_CHTEX_ROOM", "Oda") ;
define("A_CHTEX_MSG", "Mesaj") ;

//Save chat logs
define("A_CHAT_LOGS_1", "%s ’a yapılan bağlantıların IP kayıtları");
define("A_CHAT_LOGS_2", "Sohbetleri kaydetmek devre dışı bırakılmıştır");
define("A_CHAT_LOGS_3", "Sohbet IP kayıtları sayfasını aç");
define("A_CHAT_LOGS_4", "Sohbet IP kayıtlarını sil");
define("A_CHAT_LOGS_5", "IP kayıtları dosyasını sileceksiniz!\\n");
define("A_CHAT_LOGS_6", "Bütün Sohbet Kayıtları Arşivi");
define("A_CHAT_LOGS_7", "Kullanıcıların sohbet arşivi bölümünü göster");
define("A_CHAT_LOGS_8", "%s dizinindeki bütün dosya ve\\ndizinleri sileceksiniz!\\n");
define("A_CHAT_LOGS_9", "Bütün %s kayıtlarını sil");
define("A_CHAT_LOGS_10", "Yılı sil");
define("A_CHAT_LOGS_11", "%s dizinindeki\\nbütün dosyaları sileceksiniz!\\n");
define("A_CHAT_LOGS_12", "(sadece genel olanlar)");
define("A_CHAT_LOGS_13", "Ayı sil");
define("A_CHAT_LOGS_14", "%s dosyasını sileceksiniz!\\n");
define("A_CHAT_LOGS_15", "Bu kaydı sil");
define("A_CHAT_LOGS_16", "%s kaydını oku");
define("A_CHAT_LOGS_17", "Kullanıcıların Sohbet Kayıtları Arşivi");
define("A_CHAT_LOGS_18", "(sadece genel olan)");
define("A_CHAT_LOGS_19", "\\nBu işlem geri alınamaz...\\nEmin misiniz?");
define("A_CHAT_LOGS_20", "Bütün Sohbet Kayıtları Arşivini göster");
define("A_CHAT_LOGS_21", "Sayfa başına dön");
define("A_CHAT_LOGS_22", "Arşivlenmiş kayıt dosyaları");
define("A_CHAT_LOGS_23", "%s tarihinde oluşturuldu.");

//Admin Search Page
define("A_SEARCH_1", "Sohbet Odası Arama Sayfası");
define("A_SEARCH_2", "Bütün kategoriler");
define("A_SEARCH_3", "İsimler");
define("A_SEARCH_4", "IP Adresleri");
define("A_SEARCH_5", "İzinler");
define("A_SEARCH_6", "E-posta");
define("A_SEARCH_7", "Cinsiyet");
define("A_SEARCH_8", "Açıklama");
define("A_SEARCH_9", "Bağlantılar");
define("A_SEARCH_10", "Ara");
define("A_SEARCH_11", "İzinler kategorisi için seçenekler; <b>ad</b>, <b>mod</b> veya <b>u</b> ’dur.");
define("A_SEARCH_12", "Cinsiyet kategorisi için seçenekler: <b>0</b> Belirtilmemiş olanlar, <b>1</b> Baylar, veya <b>2</b> Bayanlar.");
define("A_SEARCH_13", "Kullanıcı adı");
define("A_SEARCH_14", "Adı");
define("A_SEARCH_15", "Soyadı");
define("A_SEARCH_16", "Ülke");
define("A_SEARCH_18", "İzin");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Cinsiyeti");
define("A_SEARCH_21", "Aranacak kelime");
define("A_SEARCH_22", "Buna göre ara");
define("A_SEARCH_23", "Lütfen aranacak bir kelime yazıp tekrar deneyiniz");

// Connected users Page
define("A_LURKING_1", "Bağlı kullanıcılar ve gözlem yapanlar") ;
define("A_LURKING_2", "Gözlemleme devre dışı bırakılmıştır.") ;
?>