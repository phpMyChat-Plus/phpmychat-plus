<?php
// File : indonesian/localized.chat.php - plus version (01.08.2009 - rev.43)
// Translation by Hendriyo <hendriyo@gmail.com>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Pengajaran");

define("L_WEL_1", "Pesan-pesan akan dihapus setelah%s %s");	// X hours/hour
define("L_WEL_2", "dan pengguna tidak aktif setelah %s %s");	// Y minutes/minute

define("L_CUR_1", "Saat ini");
define("L_CUR_1a", "ada");
define("L_CUR_1b", "ada");
define("L_CUR_2", "sedang mengobrol");
define("L_CUR_3", "Pengguna berada di kamar obrol");
define("L_CUR_4", "Pengguna yang berada di kamar pribadi");
define("L_CUR_5", "Para pengguna yang sedang bersembunyi<br />(Memantau halaman ini):");	// means break (next row)

define("L_SET_1", "Mohon masukan");
define("L_SET_2", "Nama pengguna");
define("L_SET_3", "Jumlah pesan yang ditampilkan");
define("L_SET_4", "Waktu beristirahat diantara setiap pembaruan");
define("L_SET_5", "Pilih kamar obrol …");
define("L_SET_6", "Kamar umum");
define("L_SET_7", "Tentukan pilihan Anda …");
define("L_SET_8", "Kamar umum yang dibuat oleh para pengguna");
define("L_SET_9", "Membuat milik Anda sendiri");
define("L_SET_10", "umum");
define("L_SET_11", "pribadi");
define("L_SET_12", "Kamar");
define("L_SET_13", "Lalu, mulai untuk");
define("L_SET_14", "obrol");
define("L_SET_15", "Kamar pribadi standar");
define("L_SET_16", "Kamar pribadi yang dibuat oleh para pengguna");
define("L_SET_17", "Pilih avatar Anda");
define("L_SET_18", "Bookmark halaman ini: tekan \"Ctrl+D\".");

define("L_SRC", "tersedia dengan gratis di");

define("L_SECS", "detik");
define("L_MIN", "menit");
define("L_MINS", "menit");
define("L_HOUR", "jam");
define("L_HOURS", "jam");

// registration stuff:
define("L_REG_1", "Kata sandi");
define("L_REG_2", "Pengaturan account");
define("L_REG_3", "Mendaftar");
define("L_REG_4", "Mengubah biodata Anda");
define("L_REG_5", "Menghapus pengguna");
define("L_REG_6", "Daftar pengguna");
define("L_REG_7", "hanya untuk para pengguna yang terdaftar");
define("L_REG_8", "E-mail");
define("L_REG_9", "Anda sudah sukses terdaftar");
define("L_REG_10", "Kembali");
define("L_REG_11", "Mengubah");
define("L_REG_12", "Memodifikasi biodata pengguna");
define("L_REG_13", "Menghapus pengguna");
define("L_REG_14", "Daftar masuk");
define("L_REG_15", "Masuk");
define("L_REG_16", "Mengganti");
define("L_REG_17", "Biodata Anda sudah diganti dengan sempurna");
define("L_REG_18", "Anda disingkirkan oleh moderator di kamar ini.");
define("L_REG_18a", "Anda disingkirkan oleh moderator di kamar ini.<br />Alasannya: %s");	// %s is the actual reason (e.g. "for spamming")
define("L_REG_19", "Yakinkah Anda mau dihapus?");
define("L_REG_20", "Ya");
define("L_REG_21", "Anda sudah dihapus secara sempurna");
define("L_REG_22", "Tidak");
define("L_REG_25", "Tutup");
define("L_REG_30", "Nama depan");
define("L_REG_31", "Nama akhir");
define("L_REG_32", "Website");
define("L_REG_33", "Perlihatkan alamat email pada umum");
define("L_REG_34", "Mengubah biodata pengguna");
define("L_REG_35", "Administrasi");
define("L_REG_36", "Lokasi/Negara");
define("L_REG_37", "Yang ada tanda <span class=\"error\">*</span> harus diisi dengan benar");
define("L_REG_39", "Kamar yang Anda masukin tadi, sudah dihapus pihak administrasi");
define("L_REG_43", "Rahasia"); // Confidential, Secret, Not telling
define("L_REG_44", "Pasangan"); // refers to gender as a pair "man and woman" (couple, pair, family)
define("L_REG_45", "Jenis kelamin");
define("L_REG_46", "Laki-laki");
define("L_REG_47", "Perempuan");
define("L_REG_48", "Tidak spesifik");
define("L_REG_49", "Pendaftaran diharuskan!");
define("L_REG_50", "Pendaftaran ditunda!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Settingan Anda untuk mengobrol");
define("L_EMAIL_VAL_2", "Selamat datang di server obrol kami!");
define("L_EMAIL_VAL_Err", "Kesalahan pada sistem, mohon hubungi pihak administrasi: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Kata sandi sudah dikirim ke alamat email Anda.<br />Anda dapat mengganti kata sandi saat berada di halaman untuk masuk \"".L_REG_4."\".");
define("L_EMAIL_VAL_PENDING_Done", "Data yang Anda daftar sudah dikirim untuk ditinjau");
define("L_EMAIL_VAL_PENDING_Done1", "Anda akan mendapatkan kata sandi milik Anda, setelah ada persetujuan dari pihak Administrasi");
define("L_EMAIL_VAL_3", "Pendaftaran Anda sedang dalam penangguhan untuk %s");
define("L_EMAIL_VAL_31", "Selamat! Pendaftaran Anda sudah ditinjau dan disetujui oleh pihak Administrasi!");
define("L_EMAIL_VAL_32", "Ini adalah data pendaftaran untuk %s di %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Anda sudah mendaftarkan Account untuk %s di %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Anda telah mengganti biodata penting Anda untuk %s di %s (account yang terpengaruh: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Anda - %s - spesifik account untuk %s"); //username - chatname
define("L_EMAIL_VAL_51", "Anda - %s – Pembaharuan spesifik account untuk %s"); //username - chatname
define("L_EMAIL_VAL_6", "Terdaftar di %s");
define("L_EMAIL_VAL_61", "Diperbaharui di %s");
define("L_EMAIL_VAL_7", "Dibawah Anda ini adalah %s pengubahan informasi account:"); //username
define("L_EMAIL_VAL_8", "Simpan email ini untuk referensi dimasa yang akan datang.\nTolong simpan baik-baik, jangan sembarang berbagi data ini.\nTerima-kasih untuk bergabung! Nikmatilah!");
define("L_EMAIL_VAL_81", "Anda dapat mengganti kata sandi dihalaman untuk mendaftar masuk \"".L_REG_4."\".");

// admin stuff
define("L_ADM_1", "%s tidak ada moderator dikamar ini");	// username/nickname
define("L_ADM_2", "Saat ini Anda bukan sebagai pengguna yang terdaftar");

// error messages
define("L_ERR_USR_1", "Nama pengguna ini sudah terpakai. Mohon diganti dengan yang lain.");
define("L_ERR_USR_2", "Anda harus memilih nama pengguna Anda.");
define("L_ERR_USR_3", "Nama pengguna ini sudah terdaftar.<br />Mohon ketikkan kata sandi Anda atau mengganti dengan nama pengguna lainnya.");
define("L_ERR_USR_4", "Anda memasukan kata sandi yang salah.");
define("L_ERR_USR_5", "Anda harus memasukan nama pengguna Anda.");
define("L_ERR_USR_6", "Anda harus memasukan kata sandi Anda.");
define("L_ERR_USR_7", "Anda harus memasukan email Anda.");
define("L_ERR_USR_8", "Anda harus memasukan email Anda dengan benar.");
define("L_ERR_USR_9", "Nama pengguna ini sudah terpakai");
define("L_ERR_USR_10", "Nama pengguna dan kata sandi Anda salah.");
define("L_ERR_USR_11", "Anda harus sebagai Administrasi.");
define("L_ERR_USR_12", "Anda sebagai administrasi, jadi Anda tidak dapat menghapusnya.");
define("L_ERR_USR_13", "Untuk membuat kamar Anda sendiri, Anda harus terdaftar.");
define("L_ERR_USR_14", "Anda harus terdaftar sebelum mengobrol.");
define("L_ERR_USR_15", "Anda harus memasukan nama lengkap Anda.");
define("L_ERR_USR_16", "Hanya karakter ekstra ini yang dibolehkan:\\n".$REG_CHARS_ALLOWED."\\nSpasi, koma, tanda miring terbalik (\\) tidak dibolehkan.\\nCek kalimatnya.");
define("L_ERR_USR_16a", "Hanya karakter ekstra ini yang dibolehkan:<br />".$REG_CHARS_ALLOWED."<br />Spasi, koma, atau tanda-miring terbalik (\\) tidak diperkankan. Cek kalimatnya.");
define("L_ERR_USR_17", "Kamar ini tidak ada, dan Anda tidak diperkenankan untuk membuatnya.");
define("L_ERR_USR_18", "Kata yang dilarang terdapat dinama pengguna Anda.");
define("L_ERR_USR_19", "Anda tidak dapat berada didua kamar dalam waktu yang sama.");
define("L_ERR_USR_20", "Anda sudah dilarang masuk dikamar ini atau dari tempat obrol lainnya.");
define("L_ERR_USR_20a", "Anda sudah dikucilkan dari kamar ini atau dari obrolan.<br />Alasannya: %s");
define("L_ERR_USR_21", "Anda sudah TIDAK aktif selama ".C_USR_DEL." menit,<br />Jadi Anda dianggap telah keluar dari kamar.");
define("L_ERR_USR_22", "Perintah ini tersedia untuk\\nbrowser yang Anda gunakan (mesin IE).");
define("L_ERR_USR_23", "Untuk bergabung dikamar pribadi, Anda harus terdaftar dahulu.");
define("L_ERR_USR_24", "Untuk membuat kamar pribadi sendiri, Anda harus terdaftar dahulu.");
define("L_ERR_USR_25", "Hanya pihak Administrasi yang bisa ".$COLORNAME." warna!<br />Jangan mencoba untuk memakai ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." or ".COLOR_CM2.".<br />Hanya power users yang berhak!");
define("L_ERR_USR_26", "Hanya admin dan moderator yang bisa pakai ".$COLORNAME." color!<br /> Jangan mencoba untuk memakai ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." atau ".COLOR_CM2.".<br /> Hanya power users yang berhak!");
define("L_ERR_USR_27", "Anda tidak dapat berbicara terhadap Anda sendiri.\\nMohon lakukan hal itu pada pikiran Anda sendiri…\\nSekarang, pilih nama pengguna lainnya.");
define("L_ERR_USR_28", "Akses Anda untuk %s sudah sangat terbatas!<br />Mohon ganti kamar."); // room name
define("L_ERR_ROM_1", "Nama Kamar tidak boleh ada tanda koma atau tanda-miring terbalik (\\).");
define("L_ERR_ROM_2", "Kata-kata terlarang terdapat dinama kamar yang Anda akan buat.");
define("L_ERR_ROM_3", "Kamar ini sudah ada sebagai kamar umum.");
define("L_ERR_ROM_4", "Nama kamarnya salah.");

// users frame or popup
define("L_EXIT", "Keluar dari obrolan");
define("L_DETACH", "Melepas daftar pengguna");
define("L_EXPCOL_ALL", "Melepas/menggabungkan semuanya");
define("L_CONN_STATE", "Memproses ulang koneksinya");
define("L_CHAT", "Obrol");
define("L_USER", "pengguna");
define("L_USERS", "para pengguna");
define("L_LURKER", "pengintip");
define("L_LURKERS", "para pengintip");
define("L_NO_USER", "Tidak ada pengguna");
define("L_ROOM", "kamar");
define("L_ROOMS", "kamar-kamar");
define("L_EXPCOL", "Melepas/menggabungkan kamar");
define("L_BEEP", "Bunyi/tidak saat pengguna masuk");
define("L_PROFILE", "Tampilkan biodata");
define("L_NO_PROFILE", "Tidak ada biodata");

// input frame
define("L_HLP", "Tolong");
define("L_MODERATOR", "%s adalah moderator pada kamar saat ini."); 	// username/nickname
define("L_KICKED", "%s sudah sukses dikeluarkan."); 	// username/nickname
define("L_KICKED_REASON", "%s sudah sukses dikeluarkan. (Alasannya: %s)"); 	// username/nickname and reason
define("L_KICKED_ALL", "Semua pengguna sudah dikeluarkan dengan sempurna.");
define("L_KICKED_ALL_REASON", "Semua pengguna sudah dikeluarkan dengan sempurna. (Alasannya: %s)");
define("L_BANISHED", "%s sudah diberi hukuman dilarang masuk."); 	// username/nickname
define("L_BANISHED_REASON", "%s sudah diberi hukuman dilarang masuk. (Alasannya: %s)"); 	// username/nickname and reason
define("L_ANNOUNCE", "MENGUMUMKAN");
define("L_INVITE", "%s permohonan Anda untuk memasukan dia ke <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> kamar."); 	// username/nickname and room name as invitation link
define("L_INVITE_REG", "Anda sudah terdaftar untuk masuk dikamar ini.");
define("L_INVITE_DONE", "Undangan Anda sudah dikirim ke %s."); 	// username/nickname
define("L_OK", "Kirim");
define("L_BUZZ", "Kumpulan Buzzes");
define("L_BAD_CMD", "Ini bukan perintah yang benar!");
define("L_ADMIN", "%s sudah menjadi pihak administrasi!"); 	// username/nickname
define("L_IS_MODERATOR", "%s sudah menjadi pihak moderator!"); 	// username/nickname
define("L_NO_MODERATOR", "Hanya moderator dikamar ini yang bisa menggunakan perintah ini.");
define("L_NONEXIST_USER", "%s tidak berada dikamar ini."); 	// username/nickname
define("L_NONREG_USER", "%s belum terdaftar."); 	// username/nickname
define("L_NONREG_USER_IP", "IPnya dia adalah: %s."); 	// IP address
define("L_NO_KICKED", "%s adalah moderator atau administrasi dan tidak dapat dikeluarkan."); 	// username/nickname
define("L_NO_BANISHED", "%s adalah moderator atau administrasi dan tidak dapat dilarang masuk."); 	// username/nickname
define("L_SVR_TIME", "Waktu Server: ");
define("L_NO_SAVE", "Tidak ada pesan yang disimpan!");
define("L_NO_ADMIN", "Hanya administrasi yang dapat menggunakan perintah ini.");
define("L_NO_REG_USER", "Anda harus terdaftar diobrolan untuk menggunakan perintah ini.");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Format teks untuk pesan-pesan");
define("L_HELP_FMT_1", "Anda dapat membuat pesan anda menjadi berkarakter tebal, miring atau bergaris bawah, dengan cara mengaplikasikan sebuah kata anda dengan &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; atau &lt;U&gt; &lt;/U&gt; tags.<br />Untuk contoh, &lt;B&gt;tulisan ini&lt;/B&gt; akan menghasilkan <B>tulisan ini</B>.");
define("L_HELP_FMT_2", "Untuk membuat hyperlink (untuk email atau URL) didalam pesan Anda, hanya dengan mengetik alamat korespondensi tanpa menggunakan tag lainnya. Hyperlink akan dibuat secara otomatis.");
define("L_HELP_TIT_3", "Perintahnya");
define("L_HELP_NOTE", "Semua perintah harus dalam bahasa English!");
define("L_HELP_MSG", "pesan");
define("L_HELP_MSGS", "pesan-pesan");
define("L_HELP_ROOM", "kamar");
define("L_HELP_BUZZ", "~namasuara"); //one word
define("L_HELP_BUZZ1", "Dengung..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "Alasannya");
define("L_HELP_MR", "Sdr");
define("L_HELP_MS", "Sdri");
define("L_HELP_CMD_0", "{} perlu pengaturan untuk penampilan, [] salah satu pilihan.");
define("L_HELP_CMD_1a", "Tentukan jumlah pesan yang akan ditampilkan. Angka minimal dan standarnya adalah 5.");
define("L_HELP_CMD_1b", "Tampilkan ulang pesannya, dan tampilkan juga pesan terbaru. Dengan angka minimal dan standar adalah 5.");
define("L_HELP_CMD_2a", "Memodifikasi daftar pesan-pesan dengan jeda waktu penampilan data terbaru (dalam detik).<br />Jika n tidak ditulis atau kurang dari 3, lakukan penampilan data terbaru jika diantara tidak dan 10 detik jeda.");
define("L_HELP_CMD_2b", "Memodifikasi daftar pesan-pesan dan daftar pengguna dengan jeda waktu penampilan data terbaru (dalam detik).<br /> Jika n tidak ditulis atau kurang dari 3, lakukan penampilan data terbaru jika diantara tidak dan 10 detik jeda.");
define("L_HELP_CMD_3", "Membalikkan pesan-pesan (tidak disemua browser).");
define("L_HELP_CMD_4", "Bergabung ruang lainnya, membuat itu jika tidak ada dan jika Anda diijinkan.<br />n sama dengan 0 untuk pribadi dan 1 untuk umum, standarnya hingga 1 jika terinci.");
define("L_HELP_CMD_5", "Tinggalkan obrolan setelah menampilkan pilihan pesan.");
define("L_HELP_CMD_6", "Hindari penampilan pesan jika nama pengguna ditampilkan.<br />Atur untuk menampilkan untuk pengguna ketika nicknya \"-\" dan keduanya spesifik, untuk semua pengguna ketika \"-\" bukan nicknya.<br />Tanpa pilihan, perintah popup window akan menampilkan semua nicks yang dihiraukan.");
define("L_HELP_CMD_7", "Memunculkan ketikan terakhir (perintah atau pesan).");
define("L_HELP_CMD_8", "Munculkan/sembunyikan waktu sebelum tampilan pesan-pesan.");
define("L_HELP_CMD_9", "Mengeluarkan orang dalam obrolan. Perintah ini hanya bisa digunakan oleh moderator atau admin kamar itu.<br />Pilihan bebas, [".L_HELP_REASON."] tampilkan alasan dari tindakan pengeluaran (apapun alasannya). <br />Jika * dipilih, maka perintah akan mengeluarkan seseorang yang belum ada statusnya (hanya tamu dan pengguna yang terdaftar). Ini sangat penting ketika koneksi dengan server dalam masalah dan semua orang harus mengulang obrolannya. Dalam kasus kedua, [".L_HELP_REASON."] diharapkan kepada para pengguna untuk dapat mengetahui kenapa mereka dikeluarkan.");
define("L_HELP_CMD_10", "Kirim pesan pribadi kepada seorang pengguna (pengguna lainnya tidak dapat melihatnya).");
define("L_HELP_CMD_11", "Tampilkan informasi tentang seorang pengguna.");
define("L_HELP_CMD_12", "Keluarkan window popup untuk merubah isi profil pengguna.");
define("L_HELP_CMD_13", "Tanda saat pengguna masuk/keluar dikamar yang digunakan sekarang.");
define("L_HELP_CMD_14", "Mempersilahkan administrasi atau moderator dari kamar yang digunakan sekarang untuk mempromosikan seorang pengguna menjadi moderator dikamar yang sama.");
define("L_HELP_CMD_15", "Menghapus bingkai pesan-pesan dan tampilkan hanya 5 pesan terakhir.");
define("L_HELP_CMD_16", "Simpan pesan-pesan terakhir (pengecualian untuk pengumuman) ke file HTML. Jika n tidak jelas, semua pesan akan diambil ke dalam accountnya.");
define("L_HELP_CMD_17", "Mengijinkan administrasi untuk mengirim pengumuman kepada semua pengguna disemua kamar obrolan.");
define("L_HELP_CMD_18", "Undang semua pengguna yang ada dikamar lain untuk bergabung dikamar yang Anda tempati.");
define("L_HELP_CMD_19", "Membolehkan moderator atau administrasi untuk \"mengeluarkan\" pengguna dari kamar, dengan waktu yang ditentukan oleh administrasi. <br />Nanti dapat melarang pengguna yang sedang ngobrol dikamar lainnya dan dimana dia akan ngobrol dan menggunakan * pengaturan untuk pelarangan \"selamanya\" pengguna dari semua tempat ngobrol.<br />Piliahannya, [".L_HELP_REASON."] tampilkan alasan pelarangan (alasan apapun).");
define("L_HELP_CMD_20", "Terangkan apa yang Anda kerjakan.");
define("L_HELP_CMD_21", "Umumkan kepada semua pengguna yang akan mengirim pesan ke Anda<br />bahwa Anda sedang tidak didepan komputer. Jika Anda ingin kembali untuk ngobrol, langsung ketik saja.");
define("L_HELP_CMD_22", "Kirim suara dengung dan tampilkan pilihannya di kamar ini.<br />- Pemakaian:<br />- pemakaian lalu: \"/buzz\" atau \"/buzz pesan yang ditampilkan\" - ini akan memainkan suara dengung standar yang ada di panel Admin;<br />- perpanjang pemakaian: \"/buzz ~namasuara\" or \"/buzz ~namasuara pesan yang ditampilkan\" - ini memainkan namasuara.wav file dari plus/sounds arsip; mohon beri tanda \"~\" dipergunakan diawal kata file suara, tanpa menggunakan akhiran .wav (hanya .wav yang boleh).<br />Ini adalah standarnya perintah moderator/admin.");
define("L_HELP_CMD_23", "kirim <i>bisikan</i> (pesan pribadi). Pesan ini akan sampai ditujuan, walaupun beda kamar. Jika pengguna tidak online atau dia sedang keluar, Anda akan diberitahu.");
define("L_HELP_CMD_24", "Penggunaan: topik harus menggunakan lebih dari 2 kata.<br />Perintah ini untuk penggantian topik di kamar bersangkutan. Coba untuk tidak menulis ulang topik pengguna lainnya’ topik. Gunakan topik yang penting.<br /> Ini adalah standarnya perintah moderator/admin.<br />Menggunakan \"/topic top reset\" perintah untuk menghapus topik atau mengeset ulang kestandar.<br />Pilihannya, \"/topic * {}\" dan \"/topic * top reset\" lakuakan dengan persis sama tapi disemua ruangan (topik umum dan menghapus topik umum).");
define("L_HELP_CMD_25", "Permainan dadu untuk mendapatkan angka secara acak.<br />Pakai: /dadu atau /dadu [n];<br />n dapat mendapatkan semua nilai <b>diantara 1 dan %s</b> (Itu menampilkan angka dari dadu tersebut). Jika tidak memasukan angka, angka tertinggi dari dadu akan digunakan.");
define("L_HELP_CMD_26", "Hal ini adalah versi yang lebih rumit dari perintah /dice.<br />Pakai: /{n1}d[n2] atau /{n1}d;<br />n1 dapat mengambil semua nilai <b>diantara 1 dan %s</b> (Itu menunjukan nomor dari dadu tiap kali lemparan).<br />n2 dapat mengambil semua nilai <b>diantara 1 dan %s</b> (itu menunjukan nomor dari bagian sisi per dadu).");
define("L_HELP_CMD_27", "Itu menjelaskan mengenai pesan dari suatu pengguna untuk mempermudah membaca disekitar percakapan.<br />Pakai: /tinggi {pengguna} atau tekan kotak <img src=./images/highlightOff.gif> kecil disamping kanan nama pengguna (di kamar/daftar pengguna)");
define("L_HELP_CMD_28", "Ini mempersilahkan memposting dari <i>satu file gambar</i> sebagai suatu pesan.<br />Pakai: Gambar harus berasal dari internet dan bisa diakses oleh semua orang. Jangan menggunakan yang pakai suatu login.<br />alamat lengkap dari gambar harus diketikan! contoh<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />extension yang diperbolehkan: .jpg .bmp .gif .png. Link ini case sensitive!<br />TRIK: ketik /img kemudian spasi dan kopikan URL kedalam box; untuk mendapatkan URL gambar dari webpage, ketika Anda klik kanan digambar tersebut, lalu ke properties, lalu blok seluruh alamat URL tersebut (kadangkala perlu discroll kebawah sedikit) dan salin/kopikan setelah tanda /img<br />Jangan menggunakan gambar yang ada dikomputer Anda: ini akan menghentikan window obrolan!!!");
define("L_HELP_CMD_29", "Perintah kedua akan mengijinkan administrasi atau moderator dari kamar ini untuk melepas anggotanya dari status administrasi atau moderator yang sebelumnya dipromosi dikamar yang sama.<br />Pilihan * ini akan melepas promosi dari semua kamar obrolan.");
define("L_HELP_CMD_30", "Perintah kedua sama dengan /me tapi itu akan menampilkan secara berurutan sesuai dengan jenis kelamin diprofilnya<br />E.g. * ".L_HELP_MR." Ciprian sedang menonton TV or * ".L_HELP_MS." Dana gembira.");
define("L_HELP_CMD_31", "Ubah pengurutan daftar pengguna: dari waktu saat masuk atau secara alfabet.");
define("L_HELP_CMD_32", "Ini adalah kali ketiga permainan dadu.<br />Pakai: /d{n1}[tn2] atau /d{n1};<br />n1 dapat mengambil semua angka <b>diantara 1 and 100</b> (itu menunjukan nomor dari bagian sisi per dadu).<br />n2 dapat mengambil semua nilai <b>diantara 1 dan %s</b> (itu menunjukan nomor dari jumlah putaran tiap kali lemparan).");
define("L_HELP_CMD_33", "Ubah ukuran font dari isi pesan-pesan ditempat obrolan yang dipilih oleh penggunanya (diperbolehkan jika nilai n: <b>diantara 7 dan 15</b>); Ini /size adalah perintah reset ukuran font kembali ke ukuran asalnya, ke nilai (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Ini akan mengijinkan pengguna untuk mengubah arah penulisan pesan (ltr = kiri-ke-kanan, rtl = kanan-ke-kiri).");
define("L_HELP_CMD_VAR", "Persamaan (beragam): %s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "Etika mengobrol");
define("L_HELP_ETIQ_2", "Tempat kami ingin membuat komunitas yang bersahabat dan menyenangkan, jadi tolong ikuti anjuran yang tertera dibawah ini. Jika tidak, maka seseorang moderator akan menghentikan aktifitas Anda dari tempat obrolan.<br /><br />Terima-kasih,");
define("L_HELP_ETIQ_3", "Arahan Etika Mengobrol Kami");
define("L_HELP_ETIQ_4", "Jangan \"spam\" tempat obrolan dengan mengetikan sembarang kata/karakter.</li>
<li>Jangan menggunakan tulisan seperti ini aLtErnAtiNg.</li>
<li>Minimalisir penggunaan huruf besar, karena itu mencerminkan teriakan.</li>
<li>Tolong pahami bahwa pengguna obrolan ini datang dari berbagai negara, jagalah kesopanan antar sesama pengguna.</li>
<li>Jangan menggunakan kata-kata berlebihan, yang penting itu adalah kata yang mudah dipahami.</li>
<li>Jangan memanggil anggota lain dengan nama aslinya, kadang kala anggota tersebut tidak berkenan dengan panggilan nama asli tersebut.</li>");

// messages frame
define("L_NO_MSG", "Saat ini tidak ada pesan ...");
define("L_TODAY_DWN", "Pesan-pesan sudah dikirim hari ini ada dibawah");
define("L_TODAY_UP", "Pesan-pesan yang telah dikirim kemarin ada dibawah");

// message colors
$TextColors = array("Hitam" => "#000000",
				"Merah" => "#FF0000",
				"Hijau" => "#009900",
				"Biru" => "#0000FF",
				"Ungu" => "#9900FF",
				"Merah gelap" => "#990000",
				"Hijau gelap" => "#006600",
				"Biru gelap" => "#000099",
				"Merah tua" => "#996633",
				"Biru muda" => "#006699",
				"Oranye" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Hiraukan");
define("L_IGNOR_NON", "Pengguna tidak dihiraukan");

// whois popup
define("L_WHOIS_ADMIN", "Administrasi");
define("L_WHOIS_OWNER", "Pemilik");
define("L_WHOIS_TOPMOD", "Moderator tingkat atas");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_MODERS", "Moderators");
define("L_WHOIS_OTHERS", "Pengguna lainnya");
define("L_WHOIS_USER", "Pengguna");
define("L_WHOIS_GUEST", "Tamu");
define("L_WHOIS_REG", "Terdaftar");
define("L_WHOIS_BOT", "Bot"); //Robot

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s masuk ke kamar ini.");
define("L_EXIT_ROM", "%s keluar dari kamar ini.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s akan dikeluarkan dari kamar secara otomatis, karena tidak ada aktifitas.");
define("L_CLOSED_ROM", "%s harus menutup browsernya.");

// Text for /away command notification string:
define("L_AWAY", "%s memberi tanda away...");
define("L_BACK", "%s kembali!!");

// Quick Menu mod
define("L_QUICK", "Menu singkat");

// Topic Banner mod
define("L_TOPIC", "harus menentukan topik:");
define("L_TOPIC_RESET", "harus menghapus ulang TOPIK");
define("L_HELP_TOP", "kalau bisa lebih dari dua kata sebagai topik");
define("L_BANNER_WELCOME", "Selamat datang di %s!");
define("L_BANNER_TOPIC", "Topik:");
define("L_DEFAULT_TOPIC_1", "Ini ada topik standarnya. Ubah localization/_owner/owner.php untuk mengubahnya!");

// Img cmd mod
define("L_PIC", "Gambar diposting oleh");
define("L_PIC_RESIZED", "Diubah ukurannya menjadi");
define("L_HELP_IMG", "alamat lengkap untuk gambar yang diposting");
define("L_NO_IMAGE", "Ini bukan URL yang tepat dari public remote image.\nCoba lagi!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s tidak dapat menjadi moderator lagi disemua kamar obrol.");
define("L_IS_NO_MODERATOR", "%s bukan sebagai moderator.");
define("L_ERR_IS_ADMIN", "%s adalah administrasi!\\nAnda tidak dapat mengubah ijin ini.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Perintah tambahan tersedia:");
define("INFO_MODS", "Fitur/Mod tambahan juga tersedia:");
define("INFO_BOT", "Robot kami yang tersedia yaitu:");

// Profile mod
define("L_PRO_1", "Bahasa sehari-hari");
define("L_PRO_2", "Link favorit 1");
define("L_PRO_3", "Link favorit 2");
define("L_PRO_4", "Keterangan");
define("L_PRO_5", "URL Gambar");
define("L_PRO_6", "Nama/warna teks");
define("L_PRO_7", "E-mail");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "URL salah atau tidak ada dihost.");
define("L_TITLE_AV", "Avatar Anda saat ini: ");
define("L_CHG_AV", "klik \"".L_REG_16."\" di formulir biodata<br />untuk menyimpan Avatar Anda.");
define("L_SEL_NEW_AV", "Pilih Avatar baru");
define("L_EX_AV", "contoh");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Masukan URL, lalu tekan ENTER untuk melihat)");
define("L_CANCEL", "Batalkan");
define("L_AVA_REG", "Anda harus terdaftar\\nuntuk mengganti ikon avatar Anda");
define("L_SEL_NEW_AV_CONFIRM", "Bentuk ini belum dikirim.\\nSekarang menuju ke avatar akan membuat kalian tersesat\\nperubahan yang sudah Anda lakukan!\\n\\nApakah Anda yakin?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Robot kita telah aktif secara umum dikamar ini. Untuk mulai bicara dengan robot, ketik <b>hello ".C_BOT_NAME."</b>. Untuk mengakhiri percakapan, ketik: <b>bye ".C_BOT_NAME."</b>. (private: /to <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Robot kita telah aktif secara umum dikamar %s . Anda bisa bicara secara khusus dengan mengklik ditulisan namanya dan memberi siulan.. (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Robot kita belum aktif secara umum. Anda hanya bisa bicara secara khusus dengan cara mengklik namanya. (commands: /to <b>".C_BOT_NAME."</b> Pesan atau /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Robot tidak aktif dikamar ini!");
define("BOT_START_ERROR", "Robot siap untuk dijalankan dikamar ini!");
define("BOT_DISABLED_ERROR", "Robot telah dinonaktifkan dari Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "Lempar dadu, dan hasilnya adalah:");
define("DICE_WRONG", "Anda harus memilih berapa banyak dadu yang akan Anda lemparkan\\n(Pilih nilai diantara 1 dan ".MAX_ROLLS.").\\nJust type /dice to roll all ".MAX_ROLLS." dice.");
define("DICE2_WRONG", "Nilai kedua, harus diantara 1 dan ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Nilai pertama harus diantara angka 1 dan ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Nilai pertama (d) harus diantara nilai 1 dan 100.\\nKedua (t) nilainya harus diantara 1 dan nilai MAX ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Buka pop-up didalam pesan pribadi");
define("L_REG_POPUP_NOTE", "Pop-up blocker Anda harus dinonaktifkan!");
define("L_PRIV_POST_MSG", "Kirim pesan pribadi!");
define("L_PRIV_MSG", "Telah diterima pesan pribadi terbaru!");
define("L_PRIV_MSGS", "%s pesan pribadi terbaru telah diterima!");
define("L_PRIV_MSGSa", "Ini adalah tampilah 10 pesan-pesan pertama!<br />Gunakan link dibawah untuk melihat sisa linknya.");
define("L_PRIV_MSG1", "Dari:");
define("L_PRIV_MSG2", "Kamar:");
define("L_PRIV_MSG3", "Kepada:");
define("L_PRIV_MSG4", "Pesan:");
define("L_PRIV_MSG5", "Dikirimkan:");
define("L_PRIV_REPLY", "Memrespon balik");
define("L_PRIV_READ", "Tekan tombol ’".L_REG_25."’ Untuk memberi tanda, bahwa semua pesan sudah dibaca!");
define("L_PRIV_POPUP", "Anda dapat menonaktif/mengaktifkan fasilitas popup ini kapan saja<br />dengan merubah");
define("L_PRIV_POPUP1", "Biodata Anda</a> (Hanya pengguna yang terdaftar)");
define("L_NOT_ONLINE", "%s saat ini sedang tidak aktif.");
define("L_PRIV_NOT_ONLINE", "%s sedang tidak aktif saat ini,\\nbut akan tetap menerima pesan Anda setelah login masuk.");
define("L_PRIV_NOT_INROOM", "%s tidak ada dikamar ini.\\nJika Anda tetap ingin mengirim pesan kepada orang ini,\\ngunakan perintah: /wisp %s isi pesan.");
define("L_PRIV_AWAY", "%s bertanda sedang keluar,\\nbut akan tetap menerima \\nKetika kembali lagi.");
define("PM_DISABLED_ERROR", "Bersiul/bersuara (saat menggunakan enganprivate messaging)\\nhas been disabled in this chat.");
define("L_NEXT_PAGE", "Pindah kehalaman berikutnya");
define("L_NEXT_READ", "Baca pesan selanjutnya %s"); // message / 10 messages
define("L_ROOM_ALL", "Semua kamar");
define("L_PRIV_NO_MSGS", "Tidak ada pesan pribadi");
define("L_PRIV_READ_MSG", "1 pesan pribadi diterima"); //singular
define("L_PRIV_READ_MSGS", "%s pesan pribadi diterima"); //plural
define("L_PRIV_MSGS_NEW", "Baru"); //singular form
define("L_PRIV_MSGS_READ", "Baca"); //singular form
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Halaman ditampilkan ulang");
define("L_PRIV_MARK_ALL", "Tandai semua pesan sudah dibaca");
define("L_PRIV_MARK_SEL", "Yang dipilih diberi tanda sudah dibaca");
define("L_PRIV_REMOVE", "Hapus semua yang pesan yang dipilih"); // or selected
define("L_PRIV_PM", "(pribadi)");
define("L_PRIV_WISP", "(bisikan)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Diaktifkan");
define("L_DISABLED", "Diunm3");
define("L_COLOR_HEAD_SETTINGS", "Saat ini setting ada dipada server.");
define("L_COLOR_HEAD_SETTINGSa", "Warna standar:");
define("L_COLOR_HEAD_SETTINGSb", "Standar settingan warna:");
define("L_COL_HELP_TITLE", "Memilih warna.");
define("L_COL_HELP_SUB1", "Digunakan:");
define("L_COL_HELP_P1", "Anda dapat memilih standar warnanya dengan mengedit profile Anda (Warnanya sama dengan warna ditulisan baju pelanggan Anda). Anda tetap bias menggunakan warna lainnya. Untuk kembali ke warna asal, dari warna yang dipilih. Anda harus memilih warna asal terlebih dahulu (Null) – Ini adalah pilihan pertama yang ada didaftar pilihan warna.");
define("L_COL_HELP_SUB2", "Trik:");
define("L_COL_HELP_P2", "<u>Warna daerah</u><br />Tergantung dari kemampuan browser/system operasi Anda. Sangat mungkin terjadi jika beberapa bagian warna tidak ditampilkan. Hanya 16 warna yang didukung oleh standar W3C HTML 4.0:");
define("L_COL_HELP_P2a", "Jika beberapa pengguna berkomentar bahwa dia tidak dapat melihat warna yang dipilih, itu berarti dia sedang menggunakan browser versi yang lebih lama.");
define("L_COL_HELP_SUB3", "Pengaturan didefinisikan ditempat obrol ini:");
define("L_COL_HELP_P3", "<u>Pewarnaan sesuai dengan tingkatan</u>:<br />1. Administrasi dapat memilih semua warnar.<br />Warna asal dari administrasi adalah <SPAN style=\"warna:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderator dapat memilih semua warna, akan tetapi <SPAN style=\"warna:".COLOR_CA."\">".COLOR_CA."</SPAN> dan <SPAN style=\"warna:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />warna asal moderator adalah <SPAN style=\"warna:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Pengguna lainnya dapat menggunakan semua warna, tapi <SPAN style=\"warna:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"warna:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"warna:".COLOR_CM."\">".COLOR_CM."</SPAN> dan <SPAN style=\"warna:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Warna asalnya adalah <u><SPAN style=\"warna:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Bagian Teknik</u>: Warna-warna ini sudah ditentukan oleh pihak administrasi di admin panel.<br />Jika sesuatu terjadi kesalahan atau jika sesuatu yang Anda tidak sukai tentang warnanya, Anda diharapkan untuk mengontak <b>administrasi</b> terlebih dahulu, tidal dengan pengguna lainnya yang ada dikamar Anda :D");
define("L_COL_HELP_USER_STATUS", "status Anda");
define("L_COL_TUT", "Menggunakan teks berwarna didalam tempat obrol");
define("L_NULL", "Batal");
define("L_NULL_F", "Batal"); // feminine word, if it's the case
define("L_ROOM_COLOR", "warna kamar");
define("L_PRO_COLOR", "warna biodata");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Hanya administrasi yang dapat menggunakan ".COLOR_CA." warna!\\n\\nWarna teks Anda dikembalikan ke ".COLOR_CM."!\\n\\nMohon pilih warna lainnya.");
define("COL_ERROR_BOX_USRA", "Hanya administrasi yang dapat menggunakan ".COLOR_CA." warna!\\n\\nJangan mencoba warna ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." atau ".COLOR_CM1.".\\n\\nWarna ini sudah milik pengguna tinggat tinggi!\\n\\nWarna teks Anda telah diganti ke warna ".COLOR_CD."!\\n\\n Mohon pilih warna lainnya.");
define("COL_ERROR_BOX_USRM", "Anda harus sebagai moderator untuk menggunakan warna ".COLOR_CM."!\\n\\nJangan coba untuk menggunakannya ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." atau ".COLOR_CM1.".\\n\\nWarna ini hanya diperuntukan kepada pengguna dengan tingkat atas!\\n\\nWarna teks Anda telah dikembalikan ke warna ".COLOR_CD."!\\n\\n Mohon pilih warna lainnya.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Selamat datang di tempat obrol kami. Mohon untuk menjaga tata-krama ketika ngobrol: <I>coba untuk tetap sopan dan santun</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG . L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Pengaturan diserver ini barusan diubah. Untuk menghidari kegagalan system, mohon buka ulang browser Anda (Tekan F5 atau exit dan masuk lagi ke tempat ngobrol).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Ukuran dari tulisannya yang diperbolehkan adalah\\nnull (untuk menghapus) atau diantara 7 dan 15");

// Week days for Status World time and Open Schedule by Ciprian
define("L_MON", "Senin");
define("L_TUE", "Selasa");
define("L_WED", "Rabu");
define("L_THU", "Kamis");
define("L_FRI", "Jumat");
define("L_SAT", "Sabtu");
define("L_SUN", "Minggu");

// Password reset form by Ciprian
define("L_PASS_0", "Formulir untuk menghapus kata sandi");
define("L_PASS_1", "Pertanyaan rahasia");
define("L_PASS_2", "Mobil pertama Anda apa?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "Hewan piaraan Anda namanya siapa?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "Apa minuman kesukaan Anda?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "Tanggal berapa ulang tahun Anda?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Jawaban rahasia");
define("L_PASS_7", "Menghapus ulang kata sandi");
define("L_PASS_8", "Kata sandi Anda telah sukses dihapus ulang.");
define("L_PASS_9", "Kata sandi terbaru Anda untuk masuk ke tempat ngobrol");
define("L_PASS_11", "Selamat datang kembali diserver obrol kami!");
define("L_PASS_12", "Pilih pertanyaan Anda ...");
define("L_ERR_PASS_1", "Nama pengguna salah. Pilih yang punya Anda.");
define("L_ERR_PASS_2", "Emailnya salah, coba lagi!");
define("L_ERR_PASS_3", "Pertanyaan rahasia yang salah.<br />Jawab satu yang ditampilkan dibawah!");
define("L_ERR_PASS_4", "Jawaban untuk pertanyaan rahasia salah. Coba lagi!");
define("L_ERR_PASS_5", "Anda belum membuat berkas rahasia Anda sendiri.");
define("L_ERR_PASS_6", "Anda belum membuat berkas rahasia Anda sendiri.<br />Anda tidak dapat menggunakan formulir ini. Hubungi bagian Admin!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s telah menjadi administrasi ditempat obrol ini.");
define("L_ADM_4", "%s sudah tidak menjadi administrasi lagi.");

// Open Schedule by Ciprian
define("L_DAILY", "harian");
define("L_ALWAYS", "selalu");
define("L_OPEN", "Buka");
define("L_CLOSED", "Tutup");
define("L_OPEN_PUB", "DIBUKA UNTUK UMUM");
define("L_CLOSED_PUB", "DITUTUP UNTUK UMUM");

// Links popup page by Alex
define("L_LINKS_1", "Link yang ditampilkan");
define("L_LINKS_2", "Disini Anda dapat mengakses link yang ditampilkan");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Klik disini %s %s");
define("L_CLICK", "Klik disini %s");
define("L_LINKS_3", "untuk membuka linknya");
define("L_LINKS_4", "untuk membuka tempat dari pemilik/authornya");
define("L_LINKS_5", "untuk memasukan tanda senyum ini");
define("L_LINKS_6", "menuju ke kontak");
define("L_LINKS_7", "menuju ke phpMyChat Homepage");
define("L_LINKS_8", "menuju ke phpMyChat Group");
define("L_LINKS_9", "untuk mengirim saran Anda");
define("L_LINKS_10", "untuk mengunduh phpMyChat-Plus");
define("L_LINKS_11", "untuk melihat siapa yang mengobrol");
define("L_LINKS_12", "untuk membuka Chat Login Page");
define("L_LINKS_13", "untuk memutar suara ini"); // can also be translated as "to play this sound"
define("L_LINKS_14", "untuk menggunakan perintah ini");
define("L_LINKS_15", "untuk membuka");
define("L_LINKS_16", "Kumpulan gambar Senyuman");
define("L_LINKS_17", "urut dari atas ke bawah");
define("L_LINKS_18", "urut dari bawah ke atas");
define("L_LINKS_19", "untuk memodifikasi Gravatar"); // do not translate the word "Gravatar"!
define("L_SWITCH", "Pindah ke"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "dipilih"); // E.g. "French (selected)" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", "dipilih"); // feminine word, if it's the case
define("L_NOT_SELECTED", "tidak dipilih");
define("L_NOT_SELECTED_F", "tidak dipilih"); // feminine word, if it's the case
define("L_EMAIL_1", "untuk mengirimkan email");
define("L_FULLSIZE_PIC", "untuk membuka gambar dengan ukuran penuh");
define("L_PRIVACY", "untuk membaca Kebijakan Pribadi kita"); //Click here to…
define("L_AUTHOR", "pemilik"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "pengembang perangkat lunak ini"); //same here
define("L_OWNER", "pemilik tempat obrol ini"); //same here
define("L_TRANSLATOR", "penerjemah"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... pengguna sejak %s");

// Status bar messages
define("L_JOIN_ROOM", "Bergabung dikamar ini");
define("L_USE_NAME", "Gunakan nama pengguna ini");
define("L_USE_NAME1", "Alamat untuk pengguna ini");
define("L_WHSP", "Bersiul");
define("L_SEND_WHSP", "Kirim siulan");
define("L_SEND_PM_1", "Kirim PM");
define("L_SEND_PM_2", "Kirim sebuah private message");
define("L_HIGHLIGHT", "Tanda-tebal/Tidak-tebal");
define("L_HIGHLIGHT_SB", "Tanda-tebal/Tidak-tebal foto pengguna ini");

//Lurking frame popup
define("L_LURKING_2", "Halaman pengintip");
define("L_LURKING_3", "sedang mengintip");
define("L_LURKING_4", "bergabung di");
define("L_LURKING_5", "Tidak jelas");

// Extra options by Ciprian // keep all these lines as short as possible. they have to fit into the Users frame width!
define("L_EXTRA_OPT", "Pilihan tambahan");
define("L_ARCHIVE", "Membuka arsip");
define("L_SOUNDFIX_IE_1", "Perbaikan suara untuk IE");
define("L_SOUNDFIX_IE_2", "Unduh perbaikan suara untuk IE");
define("L_LURKING_1", "Buka halaman pengintip");
define("L_REG_BRB", "brb (perlu mendaftar dahulu)");
define("L_DEL_BYE", "Jangan menunggu saya");
define("L_EXTRA_PRIV1", "Baca PMs"); // means: "Read your PMs" - link to open the pm manager if there are any old/read pms.
define("L_EXTRA_PRIV2", "PM baru"); // link to open the pm manager if there are new pms

// Months for Open Schedule by Ciprian
define("L_JAN", "Januari");
define("L_FEB", "Februari");
define("L_MAR", "Maret");
define("L_APR", "April");
define("L_MAY", "Mei");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "Agustus");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "Nopember");
define("L_DEC", "Desember");

// Localized date format
# Nothing to translate here – skip this paragraph, Ciprian will adjust it for you! This is just a sample.
if (eregi("win", PHP_OS)) {
setlocale(LC_ALL, "IND_IND.UTF-8", "IND_IND", "indonesian.UTF-8", "indonesian"); // For Windows servers
} else {
setlocale(LC_ALL, "id_ID.UTF-8", "id_ID", "ind.UTF-8", "ind_ind.UTF-8"); // For Unix/FreeBSD servers
}
define("L_LANG", "id_ID");
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%d/%m/%Y");
define("L_LONG_DATE", "%A, %d %B %Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%d/%m/%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%A, %d %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN", "penggunanya sedang ".LOGIN_LINK."mengobrol</A> saat ini.");
define("USERS_LOGIN", "1 pengguna sedang ".LOGIN_LINK."mengobrol</A> saat ini.");
define("NO_USER", "Tidak ada yang sedang ".LOGIN_LINK."mengobrol</A> saat ini.");
define("L_PRIV_REPLY_LOGIN", "Masuk ke tempat ngobrol jika Anda ingin ".LOGIN_LINK."membalas pesan</A> ke semua pesan-pesan terbaru yang terdaftar diatas");

// Language names
define("L_LANG_AR", "Argentina spanyol");
define("L_LANG_BG", "Bulgaria");
define("L_LANG_BR", "Brazil Portugis");
define("L_LANG_CZ", "Ceko");
define("L_LANG_DA", "Denmark");
define("L_LANG_DE", "Jerman");
define("L_LANG_EN", "Inggris"); // for admin panel only
define("L_LANG_ENUK", "Inggris UK"); // for UK formats and flags
define("L_LANG_ENUS", "Inggris US"); // for US formats and flags
define("L_LANG_ES", "Spanyol");
define("L_LANG_FR", "Prancis");
define("L_LANG_GR", "Yunani");
define("L_LANG_HE", "Hebrew");
define("L_LANG_HI", "Hindi");
define("L_LANG_HU", "Hongaria");
define("L_LANG_ID", "Indonesia");
define("L_LANG_IT", "Itali");
define("L_LANG_KA", "Georgia");
define("L_LANG_NL", "Belanda");
define("L_LANG_RO", "Rumania");
define("L_LANG_SK", "Slovakia");
define("L_LANG_SRC", "Serbia - Cyrillic");
define("L_LANG_SRL", "Serbia - Latin");
define("L_LANG_SV", "Swedia");
define("L_LANG_TR", "Turki");
define("L_LANG_UR", "Urdu");
define("L_LANG_VI", "Vietnam");

// Skins preview page
define("L_SKINS_TITLE", "Melihat penampilan");
define("L_SKINS_TITLE1", "Penampilan %s untuk %s dicoba"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Penampilan yang tersedia");
define("L_SKINS_NONAV", "Tidak ada gaya yang ada di \"skins\" arsip");
define("L_SKINS_COPY", "&copy; %s Penampilan oleh %s"); //year - author

// Swap image titles by Ciprian
define("L_GEN_ICON", "Ikon jenis kelamin");

// Ghost mode by Ciprian
define("L_GHOST", "Hantu");
define("L_SUPER_GHOST", "Super Hantu");
define("L_NO_GHOST", "Nampak");

// Sorting options by Ciprian
define("L_ASC", "Mengurut dari atas");
define("L_DESC", "Mengurut dari bawah");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Jumlah pengunjung");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "menggunakan Gravatar"); // do not translate the word "Gravatar"!

// Uploader mod by Ciprian
define("L_UPLOAD", "Mengupload %s");
define("L_UPLOAD_IMG", "file gambar");
define("L_UPLOAD_SND", "file suara");
define("L_UPLOAD_FLS", "File-file");
define("L_UPLOAD_SUCCESS", "%s sudah sukses diupload %s.");
define("L_FILES_TITLE", "Pengaturan pengupload");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Pembatasan");
define("L_RESTRICTED_ROM", "%s sudah sukses dibatasi dari kamar ini.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Masuk dengan OpenID");
define("L_OPID_REG", "Impor ID biodata OpenID anda");

// Support buttons
define("L_SUPP_WARN", "Anda terpilih untuk menjadi pengembang sukarela dari\\n".APP_NAME." dengan menyumbangkan sejumlah donasi bagi pengembang.\\nTerima kasih atas dukungan Anda!\\n\\nCatatan: penerima bukan sebagai pemilik tempat obrol ini.\\nMohon masukan jumlah donasi di halaman berikutnya.\\n\\nLanjutkan?");
define("L_SUPP_ALT", "Pakai PayPal untuk pengembangan ".APP_NAME." - Ini Cepat, Gratis, dan Aman!");
?>