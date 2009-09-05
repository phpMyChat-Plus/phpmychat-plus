<?php
// File : indonesian/localized.admin.php - plus version (01.08.2009 - rev.15)
// Translation by Hendriyo Kustrianjaya<hendriyo@gmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administrasi untuk %s");
define("A_MENU_1", "Para pengguna yang terdaftar");	//plural
define("A_MENU_11", "Para pengguna yang terdaftar");		//singular
define("A_MENU_2", "Para pengguna yang dilarang masuk");	//plural
define("A_MENU_21", "Para pengguna yang dilarang masuk");		//singular
define("A_MENU_3", "Bersihkan kamar");
define("A_MENU_4", "Mengirim surat");
define("A_MENU_5", "Susunan");
define("A_MENU_6", "Ekstra ngobrol");
define("A_MENU_7", "Pencarian");
define("A_MENU_8", "Koneksi");
define("A_MENU_9", "Arsip");
define("A_MENU_1a", "Biodata");
define("A_MENU_2a", "Statistik");
define("A_LOGOUT", "Keluar");
define("A_MOD_DEV", "Sedang dalam pengembangan Mod");

// Frame for registered users
define("A_SHEET1_1", "Daftar para pengguna resmi dan juga ijinnya");
define("A_SHEET1_2", "Nama pengguna");
define("A_SHEET1_3", "Perijinan");
define("A_SHEET1_4", "Kamar bermoderator");
define("A_SHEET1_5", "Kamar bermoderator dipisahkan dengan tanda koma (,) tanpa spasi.");
define("A_SHEET1_6", "Menghapus biodata yang sudah dicek");
define("A_SHEET1_7", "Mengganti");
define("A_SHEET1_8", "Tidak ada para pengguna yang terdaftar, kecuali Anda sendiri.");
define("A_SHEET1_9", "Biodata pengguna yg dilarang sudah dicek");
define("A_SHEET1_10", "Sekarang Anda harus pindah ke ’".A_MENU_2."’ Halaman untuk membetulkan pilihan Anda.");
define("A_SHEET1_11", "Koneksi terakhir");
define("A_SHEET1_12", "Alasan pelarangan (pilihan)");
define("A_SHEET1_13", "Kamar-kamar yang diberi ijin");
define("A_SHEET1_14", "Semua tanpa pembatasan");
define("A_SHEET1_15", "Semua dibatasi");
define("A_SHEET1_16", "Pembatasan kamar secara spesifik juga dapat diaktifkan di ’".A_MENU_5."’ Halaman.");
define("A_USER", "Pengguna");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Moderator tingkat atas");
define("A_ADMIN", "Administrasi");
define("A_PAGE_CNT", "Halaman %s dari %s");

// Frame for banished users
define("A_SHEET2_1", "Daftar para pengguna yang dilarang dan Kamar-kamar dengan perhatian khusus");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Kamar-kamar dengan perhatian khusus");
define("A_SHEET2_4", "Hingga");
define("A_SHEET2_5", "Tidak ada akhir");
define("A_SHEET2_6", "Kamar-kamar dipisahkan menggunakan koma (,) jika kurang dari 4, selain itu maka ’<B>*</B>’ tanda pelarangan dari semua kamar-kamar.");
define("A_SHEET2_7", "Hapus tanda pelarangan pada pengguna yang diberi tanda cek");
define("A_SHEET2_8", "Tidak ada para pengguna yang dilarang");
define("A_SHEET2_9", "Alasannya");

// Frame for cleaning rooms
define("A_SHEET3_1", "Daftar dari kamar-kamar yang aktif");
define("A_SHEET3_2", "Bersihkan \"bukan standar\" kamar juga akan menghapus<br />semua moderatornya status untuk kamar ini.");
define("A_SHEET3_3", "Bersihkan kamar yang dipilih");
define("A_SHEET3_4", "Tidak ada kamar yang bisa dibersihkan.");
define("A_SHEET3_5", "Anda belum menentukan pilihan. Mohon pilih salah satu kamar dari daftar berikut ini.");

// Frame for sending mails
define("A_SHEET4_0", "Anda belum menyertakan alamat email admin di ’".A_MENU_5."’ lembaran.");
define("A_SHEET4_1", "Kirim email-email");
define("A_SHEET4_2", "Kepada:");
define("A_SHEET4_3", "Pilih semua");
define("A_SHEET4_4", "Judul:");
define("A_SHEET4_5", "Pesan:");
define("A_SHEET4_6", "Kirim sekarang!");
define("A_SHEET4_7", "Semua email-email sudah dikirim.");
define("A_SHEET4_8", "Ada masalah internal saat pengiriman email-email.");
define("A_SHEET4_9", "Alamat, judul atau isi pesan, belum diisi!");
define("A_SHEET4_10", "Penambahan alamat email, dipisah menggunakan tanda koma (,)");
define("A_SHEET4_11", "Tanda tangan");
define("A_SHEET4_12", "Tidak memilih semua");

// Frame for configuration
define("A_SHEET5_0", "Saat ini Anda menggunakan versi %s");
define("A_SHEET5_1", "Ada versi terbaru yang telah dirilis (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Ekstra ngobrol dinon-aktifkan") ;
define("A_REFRESH_MSG", "Memproses ulang isi pesan") ;
define("A_MSG_DEL", "Menghapus") ;
define("A_POST_TIME", "Dipostingkan pada jam") ;
define("A_FROM_TO", "Dari › hingga") ;
define("A_FROM", "Dari") ;
define("A_CHTEX_ROOM", "Kamar") ;
define("A_CHTEX_MSG", "Pesan") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Catatan IP yang terhubung ke %s");
define("A_CHAT_LOGS_2", "Pengarsipan obrolan sedang dinon-aktifkan");
define("A_CHAT_LOGS_3", "Buka halaman untuk pencatatan IP");
define("A_CHAT_LOGS_4", "Hapus arsip pencatatan IP");
define("A_CHAT_LOGS_5", "Ini akan mencatat dan menghapus arsip IP pengobrol!\\n");
define("A_CHAT_LOGS_6", "Pengarsipan semua pengobrolan");
define("A_CHAT_LOGS_7", "Tampilkan pada umum untuk bagian pengarsipan");
define("A_CHAT_LOGS_8", "Langkah ini akan menghapus semua pengarsipan\\nyang tersimpan di %s tempat pengarsipan!\\n"); // year
define("A_CHAT_LOGS_9", "Hapus semua %s pencatatan"); // year
define("A_CHAT_LOGS_10", "Hapus tahunnya");
define("A_CHAT_LOGS_11", "Langkah ini akan menghapus semua arsip\\nyg disimpan di %s dalam tempat pengarsipan!\\n"); // month/year
define("A_CHAT_LOGS_12", "(Hanya yang bagian umum saja)");
define("A_CHAT_LOGS_13", "Hapus bulannya");
define("A_CHAT_LOGS_14", "Langkah ini akan menghapus %s arsip!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Hapus pencatatan ini");
define("A_CHAT_LOGS_16", "Baca %s catatan"); // day month year
define("A_CHAT_LOGS_17", "Pengarsipan obrolan umum");
define("A_CHAT_LOGS_18", "(Hanya yang untuk umum saja)");
define("A_CHAT_LOGS_19", "\\nAnda tidak bisa kembali ke langkah sebelumnya...\\nAnda yakin?");
define("A_CHAT_LOGS_20", "Tampilkan pengarsipan semua obrolan");
define("A_CHAT_LOGS_21", "Menuju ke atas");
define("A_CHAT_LOGS_22", "Catatan pengarsipan");
define("A_CHAT_LOGS_23", "Dibuat tanggal %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Pampatkan smua %s catatan kedalam bentuk zip"); // date
define("A_CHAT_LOGS_25", "Langkah ini akan membuat semua catata kedalam bentuk zip\\ndisimpan di %s arsip!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nAnda yakin?");
define("A_CHAT_LOGS_27", "Perngarsipan Zip");
define("A_CHAT_LOGS_28", "Download %s");
define("A_CHAT_LOGS_29", "Hapus file zip ini");
define("A_CHAT_LOGS_30", "Pengarsipan IP");
define("A_CHAT_LOGS_31", "Ukuran keseluruhannya %s %s");
define("A_CHAT_LOGS_32", "File");
define("A_CHAT_LOGS_33", "Arsip");
define("A_CHAT_LOGS_34", "%s telah dihapus dengan sempurna: %s"); // sample: File (Folder) dihapus dengan sempurna: bak/blabla.php
define("A_CHAT_LOGS_35", "%s telah dibuat dengan sempurna: %s");
define("A_CHAT_LOGS_36", "%s tidak tampak: %s");
define("A_CHAT_LOGS_37", "%s tidak dapat dihapus: %s");
define("A_CHAT_LOGS_38", "%s tidak dapat dibuat: %s");
define("A_CHAT_LOGS_39", "%s tidak dapat melakukan pengisian: %s");
define("A_CHAT_LOGS_40", "Masalah saat melakukan penyimpanan file: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Pencarian di kamar obrolan");
define("A_SEARCH_2", "Semua kategori");
define("A_SEARCH_3", "Nama");
define("A_SEARCH_4", "Alamat IP");
define("A_SEARCH_5", "Perijinan");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Jenis Kelamin");
define("A_SEARCH_8", "Keterangan");
define("A_SEARCH_9", "Hubungan");
define("A_SEARCH_10", "Pencarian");
define("A_SEARCH_11", "Untuk kategori perijinan, pilihannya adalah <b>ad</b>, <b>mod</b> atau <b>u</b>.");
define("A_SEARCH_12", "Untuk kategori jenis kelamin, pilihannya adalah: <b>0</b> untuk yang tidak spesifik, <b>1</b> untuk laki-laki, <b>2</b> untuk perempuan atau <b>3</b>untuk pasangan.");
define("A_SEARCH_13", "Nama pengguna");
define("A_SEARCH_14", "Nama depan");
define("A_SEARCH_15", "Nama belakang");
define("A_SEARCH_16", "Negara");
define("A_SEARCH_18", "Perijinan");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Jenis kelamin");
define("A_SEARCH_21", "Pencarian masa waktu");
define("A_SEARCH_22", "Pencarian dari");
define("A_SEARCH_23", "Mohong sertakan pencarian masa waktu dan coba lagi");
define("A_SEARCH_24", "Tidak ada datang yang cocok dengan criteria Anda. Mohon diperbaikin penulisannya.");
define("A_SEARCH_25", "Atur pengguna ini");

// Connected users Page
define("A_LURKING_1", "Pengguna yang terhubung dan yang bersembunyi") ;
define("A_LURKING_2", "Penon-aktifan untuk bersembunyi") ;

// Statistics Page
define("A_STATS_1", "Halaman untuk statistik obrolan");
define("A_STATS_2", "Pengoleksian data dimulai pada tanggal %s"); //date
define("A_STATS_3", "Statistik keseluruhan (Setiap waktu)");
define("A_STATS_4", "Statistik secara detail (Terakhir %s aktifitas harian)"); // no of days
define("A_STATS_5", "Statistik tidak aktif");
define("A_STATS_6", "Atas %s"); // Top 10 or Top 5
?>