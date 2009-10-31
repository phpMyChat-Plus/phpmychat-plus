<?php
// File : serbian_latin/localized.chat.php - plus version (01.08.2009 - rev.43)
// Original translation by Vedran Vučić <vedran.vucic@gnulinuxcentar.org>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorijal");

define("L_WEL_1", "Poruke će biti izbrisane nakon %s %s");	// X hours/hour
define("L_WEL_2", "i neaktivni korisnici nakon %s %s");	// Y minutes/minute

define("L_CUR_1", "Ovde");
define("L_CUR_1a", "ima trenutno");
define("L_CUR_1b", "je trenutno");
define("L_CUR_2", "u četu");
define("L_CUR_3", "Korisnici koji su trenutno u čet sobama");
define("L_CUR_4", "korisnika u privatnim sobama");
define("L_CUR_5", "Korisnici koji trenutno lurking<br />(posmatraju ovu stranu):");	// means break (next row)

define("L_SET_1", "Molim postavite ...");
define("L_SET_2", "Korisničko ime");
define("L_SET_3", "broj poruka za prikazivanje");
define("L_SET_4", "vreme između svakog ažuriranja");
define("L_SET_5", "Odaberi čet sobu ...");
define("L_SET_6", "Pretpostavljene javne sobe");
define("L_SET_7", "Napravite vaš izbor ...");
define("L_SET_8", "javne sobe koje su kreirali korisnici");
define("L_SET_9", "Napravite vašu vlastitu");
define("L_SET_10", "javnu");
define("L_SET_11", "privatnu");
define("L_SET_12", "sobu");
define("L_SET_13", "Onda");
define("L_SET_14", "četujte");
define("L_SET_15", "Pretpostavljene privatne sobe");
define("L_SET_16", "Privatne sobe koje su kreirali korisnici");
define("L_SET_17", "Odaberite vašu sličicu");
define("L_SET_18", "Bukmarkuj ovu stranu: pritisni \"Ctrl+D\".");

define("L_SRC", "je slobodno dostupan na");

define("L_SECS", "sekundi");
define("L_MIN", "minut");
define("L_MINS", "minuta");
define("L_HOUR", "sat");
define("L_HOURS", "sati");

// registration stuff:
define("L_REG_1", "Lozinka");
define("L_REG_2", "Upravljanje nalogom");
define("L_REG_3", "Registruj se");
define("L_REG_4", "Uredite vaš profil");
define("L_REG_5", "Izbriši korisnika");
define("L_REG_6", "Registracija korisnika");
define("L_REG_7", "samo ako ste registrovani");
define("L_REG_8", "E-mail");
define("L_REG_9", "Uspešno ste se registrovali.");
define("L_REG_10", "Nazad");
define("L_REG_11", "Uređujem");
define("L_REG_12", "Modifikujem korisničku informaciju");
define("L_REG_13", "Brišem korisnika");
define("L_REG_14", "Prijavi se");
define("L_REG_15", "Prijava");
define("L_REG_16", "Promeni");
define("L_REG_17", "Vaš profil je uspešno ažuriran.");
define("L_REG_18", "Izbačeni ste iz sobe od strane moderatora ove sobe.");
define("L_REG_18a", "Izbačeni ste iz sobe od strane moderatora ove sobe.<br />Razlog: %s");	// %s is the actual reason (e.g. “for spamming”)
define("L_REG_19", "Da li zaista želite da budete uklonjeni?");
define("L_REG_20", "Da");
define("L_REG_21", "Uspešno ste uklonjeni.");
define("L_REG_22", "Ne");
define("L_REG_25", "Zatvori");
define("L_REG_30", "Ime");
define("L_REG_31", "Prezime");
define("L_REG_32", "WEB");
define("L_REG_33", "pokaži e-mail u javnim informacijama");
define("L_REG_34", "Uređujem korisnički profil");
define("L_REG_35", "Administracija");
define("L_REG_36", "Lokacija/Država");
define("L_REG_37", "Polja sa <span class=\"error\">*</span> moraju biti uspunjena.");
define("L_REG_39", "Administrator je uklonio sobu u kojoj ste bili.");
define("L_REG_43", "Neprikazano");
define("L_REG_44", "Par"); // refers to gender as a pair "man and woman" (couple, pair, family)
define("L_REG_45", "Rod");
define("L_REG_46", "Muško");
define("L_REG_47", "Žensko");
define("L_REG_48", "Neodređen");
define("L_REG_49", "Potrebna registracija!");
define("L_REG_50", "Registracija suspendovana!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Vaša podešavanja za ulazak u čet");
define("L_EMAIL_VAL_2", "Sobro došli na naš čet server.");
define("L_EMAIL_VAL_Err", "Interna greška, molim vas kontaktirajte administratora: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Vaša lozinka je poslata na vašu e-mail addresu.<br />Možete da promenite vašu lozinku na strani za prijavljivanje u uredi profil.");
define("L_EMAIL_VAL_PENDING_Done", "Vaši registrovani podaci su podneseni na pregled.");
define("L_EMAIL_VAL_PENDING_Done1", "Dobit ćete vašu lozinku nakon što administrator odobri vaš nalog.");
define("L_EMAIL_VAL_3", "Vaša registracija čeka %s");
define("L_EMAIL_VAL_31", "Čestitamo! Vaši podaci registracije su pregledani i odobreni!");
define("L_EMAIL_VAL_32", "ovo su podaci registracije za %s na %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Registrovali ste ovaj nalog za  %s na %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Upravo ste promenili važne informacije za nalog za %s na %s (odnosi se na nalog: %s)."); //chat name at chaturl (korisničko ime)
define("L_EMAIL_VAL_5", "Vaši - %s - detalji naloga za %s"); //username - chatname
define("L_EMAIL_VAL_51", "Vaš - %s - ažurirani podaci naloga za %s"); //username - chatname
define("L_EMAIL_VAL_6", "Registrovano na %s");
define("L_EMAIL_VAL_61", "Ažurirano na %s");
define("L_EMAIL_VAL_7", "Ispod su vaše %s ažurirane informacije naloga:"); //username
define("L_EMAIL_VAL_8", "Sačuvajte ovu poruku za buduće refrence.\n Molimo vas da ih čuvate na sigurnom i nemojte nikome da dajete ove podatke.\n Hvala što nam se se pridružili! Uživajte!");
define("L_EMAIL_VAL_81", "Možete da promenite vašu lozinku na strani za prijavljivanje u uredi profil.");

// admin stuff
define("L_ADM_1", "%s nije više moderator za ovu sobu.");	// username/nickname
define("L_ADM_2", "Niste više registrovani korisnik.");

// error messages
define("L_ERR_USR_1", "Ovo korisničko ime je zauzeto. Odaberite drugo korisničko ime.");
define("L_ERR_USR_2", "Morate odabrati korisničko ime.");
define("L_ERR_USR_3", "Vaše korisničko ime je registrovano.<br />Upišite vašu lozinku ili odaberite drugo korisničko ime.");
define("L_ERR_USR_4", "Upisali ste neispravnu lozinku.");
define("L_ERR_USR_5", "Morate upisati vaše korisničko ime.");
define("L_ERR_USR_6", "Morate upisati vašu lozinku.");
define("L_ERR_USR_7", "Morate upisati vaš e-mail.");
define("L_ERR_USR_8", "Morate upisatiispravnu e-mail adresu.");
define("L_ERR_USR_9", "Ovo korisničko ime je zauzeto.");
define("L_ERR_USR_10", "Pogrešno korisničko ime ili lozinka.");
define("L_ERR_USR_11", "Morate biti administrator.");
define("L_ERR_USR_12", "Vi ste administrator, i nemožete biti uklonjeni.");
define("L_ERR_USR_13", "Morate biti registrovani.");
define("L_ERR_USR_14", "Morate biti registrovani pre četovanja.");
define("L_ERR_USR_15", "Morate upisati vaše puno ime.");
define("L_ERR_USR_16", "Samo ovi ekstra-karakteri su dozvoljeni:\\n".$REG_CHARS_ALLOWED."\\nrazmaci, zapete ili kose crte (\\) nisu dozvoljeni.\\nProverite sintaksu.");
define("L_ERR_USR_16a", "Samo ovi ekstra-karakteri su dozvoljeni:<br />".$REG_CHARS_ALLOWED."<br />razmaci, zapete ili kose crte (\\) nisu dozvoljeni. Proverite sintaksu.");
define("L_ERR_USR_17", "Ova soba ne postoji i nije vam dozvoljeno da kreirate drugu sobu.");
define("L_ERR_USR_18", "Pronađena je zabranjena reč u vašem korisničkom imenu.");
define("L_ERR_USR_19", "Nemožete u jednom trenutku biti u više od jedne sobe.");
define("L_ERR_USR_20", "Zabranjeni ste u ovoj sobi ili u četu.");
define("L_ERR_USR_20a", "Zabranjeni ste u ovoj sobi ili u četu.<br />Razlog: %s");
define("L_ERR_USR_21", "Niste bili aktivni poslednjih ".C_USR_DEL." minuta,<br />zbog toga ste isključeni iz sobe.");
define("L_ERR_USR_22", "Ova komanda nije dostupna za\\nbrauzer koji koristite (IE).");
define("L_ERR_USR_23", "Da bi se priključili privatnoj sobi morate da budete registrovani.");
define("L_ERR_USR_24", "Da bi kreirali vašu vlastitu privatnu sobu morate pre toga da budete registrovani.");
define("L_ERR_USR_25", "Samo administrator može da koristi ".$COLORNAME." boju!<br />Nemojte da pokušate da koristite ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ili ".COLOR_CM1.".<br />One su rezervisane za moćne korisnike!");
define("L_ERR_USR_26", "Samo administratori i moderatori mogu da koriste ".$COLORNAME." boje!<br />Nemojte da pokušate da koristite ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ili ".COLOR_CM1.".<br />One su rezervisane za moćne morisnike.!");
define("L_ERR_USR_27", "Nemožete privatno da govorite sami sa sobom.\\nČinite to u svom umu, molim...\\nSada, odaberite drugo ime.");
define("L_ERR_USR_28", "Vaš pristup %s je ograničen!<br />Molimo vas da odaberete drugu sobu."); // room name
define("L_ERR_ROM_1", "Ime sobe nemože da sadrži zapete i kose crte. (\\).");
define("L_ERR_ROM_2", "Pronađena zabranjena reš u imenu sobe koju želite da kreirate.");
define("L_ERR_ROM_3", "Ova soba već postoji kao javna soba.");
define("L_ERR_ROM_4", "Niespravno ime sobe.");

// users frame or popup
define("L_EXIT", "Izađi iz Četa");
define("L_DETACH", "Odvoji listu korisnika");
define("L_EXPCOL_ALL", "Raširi/Sakupi Sve");
define("L_CONN_STATE", "Osveži stanje povezanosti");
define("L_CHAT", "Čet");
define("L_USER", "korisnik");
define("L_USERS", "korisnici");
define("L_LURKER", "posmatrač");
define("L_LURKERS", "posmatrači");
define("L_NO_USER", "Nema korisnika");
define("L_ROOM", "soba");
define("L_ROOMS", "sobe");
define("L_EXPCOL", "Raširi/Sakupi sobu");
define("L_BEEP", "Bip/ne bip na ulaz korisnika");
define("L_PROFILE", "Prikaži profil");
define("L_NO_PROFILE", "Nema profila");

// input frame
define("L_HLP", "Pomoć");
define("L_MODERATOR", "%s je sada moderator ove sobe."); 	// username/nickname
define("L_KICKED", "%s je uspešno izbačen."); 	// username/nickname
define("L_KICKED_REASON", "%s je uspešno izbačen. (Razlog: %s)"); 	// username/nickname and reason
define("L_KICKED_ALL", "Svi korisnici su uspešno izbačeni.");
define("L_KICKED_ALL_REASON", "Svi korisnici su uspešno izbačeni. (Razlog: %s)");
define("L_BANISHED", "%s je uspešno zabranjen."); 	// username/nickname
define("L_BANISHED_REASON", "%s jen uspešno zabranjen. (Razlog: %s)"); 	// username/nickname and reason
define("L_ANNOUNCE", "OBAVEŠTENJE");
define("L_INVITE", "%s zahteva da mu/joj se pridružite u <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> sobi."); 	// username/nickname and room name as invitation link
define("L_INVITE_REG", "Morate da budete registrovani da bi ušli u ovu sobu.");
define("L_INVITE_DONE", "Vaš poziv je poslat %s."); 	// username/nickname
define("L_OK", "Pošalji");
define("L_BUZZ", "Galerija zujalica");
define("L_BAD_CMD", "Ovo je neispravna komanda!");
define("L_ADMIN", "%s je već administrator!"); 	// username/nickname
define("L_IS_MODERATOR", "%s je već moderator!"); 	// username/nickname
define("L_NO_MODERATOR", "Samo moderator ove sobe može da koristi ovu komandu.");
define("L_NONEXIST_USER", "%s nije u ovoj sobi."); 	// username/nickname
define("L_NONREG_USER", "%s nije registrovan."); 	// username/nickname
define("L_NONREG_USER_IP", "Njegov IP je: %s."); 	// IP address
define("L_NO_KICKED", "%s je moderator ili administrator i nemože biti izbačen."); 	// username/nickname
define("L_NO_BANISHED", "%s je moderator ili administrator i nemože biti zabranjen."); 	// username/nickname
define("L_SVR_TIME", "Serversko vreme: ");
define("L_NO_SAVE", "Nema poruke da se sačuva!");
define("L_NO_ADMIN", "Samo administrator može da koristi ovu komandu.");
define("L_NO_REG_USER", "Morate da budete registrovani u ovom četu da bi koristili ovu komandu.");

// help popup
define("L_HELP_TIT_1", "Smeško");
define("L_HELP_TIT_2", "Tekst format za poruke");
define("L_HELP_FMT_1", "Možete da pišete podebljan, kurziv ili podvučen tekst u porukama označavajuči promenljive sekcije teksta sa &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; ili &lt;U&gt; &lt;/U&gt; tagovima.<br />Na primer, &lt;B&gt;ovaj tekst&lt;/B&gt; će da proizvede <B>ovaj tekst</B>.");
define("L_HELP_FMT_2", "AKo želite da kreirate hiperlink (za e-mail ili URL) u vašoj poruci, jednostavno upišite odgovarajuću adresu bez ikakvog taga. Hiperlink će automatski biti kreiran.");
define("L_HELP_TIT_3", "Komande");
define("L_HELP_NOTE", "Sve komand emoraju biti korišćene na engleskom jeziku!");
define("L_HELP_MSG", "poruka");
define("L_HELP_MSGS", "poruke");
define("L_HELP_ROOM", "soba");
define("L_HELP_BUZZ", "~imezvuka");
define("L_HELP_BUZZ1", "Buzz..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "razlog");
define("L_HELP_MR", "Gdin."); // Gospodin (Mr. - can be short or entire word)
define("L_HELP_MS", "Gdja."); //Gospođa (Mrs. - neutral of Miss, Mrs.)
define("L_HELP_CMD_0", "{} predstavlja zahtevano podešavanje, [] opciono podešavanje.");
define("L_HELP_CMD_1a", "Postavi broj poruka za prikaz. Minimum i pretpostavljeni je 5.");
define("L_HELP_CMD_1b", "Ponovo učitaj okvir za poruke i prikaži n poslednjih poruka, minimum i pretpostavljeni je 5.");
define("L_HELP_CMD_2a", "Modifikuj period osvežavanja liste poruka (u sekundama).<br />Ako n nije specificiran ili je manji od 3, on se menja izmežu neosvežavanja i osvežavanja svakih 10s.");
define("L_HELP_CMD_2b", "Modifikuj period osvežavanja za poruke liste korisnika (u sekundama).<br />Ako n nije specificiran ili je manji od 3, on se menja izmežu neosvežavanja i osvežavanja svakih 10s.");
define("L_HELP_CMD_3", "Obrni redosled poruka (ne u svim brauzerima).");
define("L_HELP_CMD_4", "DOđite u drugu sobu, kreirajući je ako već ne postoji i ako vame je dozvoljeno.<br />n jednako 0 za privatnu i 1 za javnu, ako nije specifikovano pretpostavlja se da je 1.");
define("L_HELP_CMD_5", "Napustite čet nakon prikazivanja opcione poruke.");
define("L_HELP_CMD_6", "Izbegnite prikazivanje poruka korisnika ako mu nije određen nadimak.<br />Isključite ignorisanje za korisnika kad su ime i nadimak određeni, za sve korisnike kad nije odrežen nadimak.<br />Bez opcije, ova komanda iskače prozor koji prikazuje sve ignorisane nadimke.");
define("L_HELP_CMD_7", "Pozovi prethodno upisan tekst (komandu ili poruku).");
define("L_HELP_CMD_8", "Pokaži/Sakrij vreme pre poruka.");
define("L_HELP_CMD_9", "Izbaci korisnika iz četa. Ovu komandu može da koristi samo moderator sobe ili administrator.<br />Opciono, [".L_HELP_REASON."] prikazuje razlog izbacivanja (bilo koji željeni tekst).).<br />Ako se * opcija upotrebi, komanda će da izbaci iz ćaskanja sve korisnike bez moći (samo gosti i registrovani korisnici). Ovo je veoma korisno kada konekcija servera ima probleme i kad svi korisnici trebaju da ponovo učitaju svoje ćaskanje. U drugom slučaju, [".L_HELP_REASON."] se preporučuje da se korisnicma objasni zašto su bili izbačeni.");
define("L_HELP_CMD_10", "Pošaljite privatnu poruku određenom korisniku (drugi korisnici je neće videti).");
define("L_HELP_CMD_11", "Pokazuje informaciju o određenom korisniku.");
define("L_HELP_CMD_12", "Iskačući prozor za uređivanje korisnikovog profila.");
define("L_HELP_CMD_13", "Uključuje obaveštenja za korisnikov ulaz/izlaz za ovu sobu.");
define("L_HELP_CMD_14", "Dozvoljava administratoru ili moderator(ima) ove sobe da promovišu drugog registrovanog korisnika da bude moderator iste sobe.");
define("L_HELP_CMD_15", "Čisti okvir za poruke i prikazuje samo poslednjih 5 poruka.");
define("L_HELP_CMD_16", "Čuva poslednjih n poruka (obaveštenja isključena) kao HTML datoteku. Ako n nije određen, sve poruke će biti uzete u obzir.");
define("L_HELP_CMD_17", "Dozvoljava administratoru da pošalje obaveštenje svim korisnicma u svim čet sobama.");
define("L_HELP_CMD_18", "Poziva korisnika koji četuje u drugoj sobi da vam s epriključi u sobi u kojoj ste sada.");
define("L_HELP_CMD_19", "Dozvoljava moderator(ima) sobe ili administratoru da \"zabrani\" korisnika iz sobe na vreme koje odredi administrator.<br />Administrator može da zabrani korisnika koji četujeu drugoj sobi osim one u kojoj se nalazi i da upotrebi * podešavanje da zabrani \"zauvek\" korisnika iz četa kao celine.<br />Opciono, [".L_HELP_REASON."] prikazuje razlog zabrane (bilo koji željeni tekst).");
define("L_HELP_CMD_20", "Opisuje šta radite bez referisanja samog sebe.");
define("L_HELP_CMD_21", "Obaveštava sobu i korisnike koji žele da vam pošalju poruke<br />da niste prisutni. Ako želite da se vratite i nastavite čet dovoljno je da samo započnete pisanje.");
define("L_HELP_CMD_22", "Šalje zvuk zujanja i opciono prikazuje poruku u trenutnoj sobi.<br />- Korišćenje:<br />- staro korišćenje: \"/buzz\" ili \"/buzz poruka koja će da se prikaže\" - ovo svira pretpostavljeni zvuk za zujalicu definisanu u Admin panelu;<br />- prošireno korišćenje: \"/buzz ~imezvuka\" ili \"/buzz ~imezvuka poruka koja će da se prikaže\" - ovo svira imezvuka.wav datoteku iz plus/sounds foldera; obratite pažnju na znak \"~\" koji se koristi na početku druge reči, koja je ime zvučne datoteke, bez proširenja.wav (samo .wav proširenje je dozvoljeno).<br />Pretpostavljeno je da je ovo moderator/admin komanda.");
define("L_HELP_CMD_23", "Šalje <i>šapat</i> (privatna poruka). Poruka će doći do odredišta bez obzira u kojoj sobi j ekorisnik. Ako korisnik nije onlajn ili je postavio da je odsutan vi ćete biti obavešteni o tome.");
define("L_HELP_CMD_24", "Korišćenje:tema treba da sadrži najmanje 2 reči.<br />Ova komanda menja temu ove sobe. Nastojte da njom ne pregazite teme drugih korisnika. Koristite važne teme.<br />Ovo je moderator/admin komanda.<br />Koristeći \"/topic top reset\" komandu trenutna tema će biti izbrisana i postavljena na pretpostavljenu vrednost za sobu.<br />Opciono, \"/topic * {}\" i \"/topic * top reset\" čine potpuno isto ali za sve sobe (globalna tema i globalno resetovanje teme).");
define("L_HELP_CMD_25", "Igra kockom za slučajne/hazardne brojeve.<br />Upotreba: /dice ili /dice [n];<br />n može uzeti bilo koju vrednost <b>između 1 i %s</b> (ona predstavlja broj kotrljajuće kocke). Ako nije unesen neki broj, pretpostavljeni maksimalan broj kotrljanja će biti upotrebljen.");
define("L_HELP_CMD_26", "Ovo je kompleksnija verzija /dice komande.<br />Upotreba: /{n1}d[n2] ili /{n1}d;<br />n1 može uzeti bilo koju vrednost <b>između 1 i %s</b> (predstavlja broj bacanja).<br />n2 može uzeti bilo koju vrednost <b>između 1 i %s</b> (predstavlja broj kotrljajućih kocki po bacanju).");
define("L_HELP_CMD_27", "Naglašava poruke posebnog korisnika za lakše čitanje u raznim konverzacijama.<br />Upotreba: /high {user} ili pritisnite mali <img src=./images/highlightOff.gif> četverougaonik desno od korisničkog imena (u listi soba/korisnika)");
define("L_HELP_CMD_28", "Dozvoljava postovanje <i>jedne slike</i> kao poruke.<br />Upotreba: Slika treba da bude na Internetu i slobodno dostupna svima. Nemojte da koristite strane koje traže prijavljivane.<br />Puna adresa za sliku mora biti upisana! npr.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Dozvoljena proširenja: .jpg .bmp .gif .png. Veza je osetljiva na mala i velika slova! <br />NAPOMENE: upišite /img a onda razmak i zalepite URL u kutiju; da bi dobili URL slike sa web strane, kliknite desnim dugmetom miša, otidjite na Svojstva-properties, a onda odaberite celu adresu/URL (ponekad je potrebno da se malo povuče na dole) i kopirajte/zalepite nakon /img<br />Ne koristite slike iz vašeg kompjutera: polomit će čet prozor!!!");
define("L_HELP_CMD_29", "Druga komanda će dozvoliti administratoru ili moderator(ima) ove sobe da degradira drugog registrovanog korisnika koji je prethodno bio promovisan u moderatora za istu sobu.<br />Ova * opcija će degradirati korisnika iz svih soba.");
define("L_HELP_CMD_30", "Druga komanda čini isto kao /me ali će pokazati i pripadajući rod<br />Npr. * ".L_HELP_MR." Ciprian gleda TV ili * ".L_HELP_MS." Dana je srećna.");
define("L_HELP_CMD_31", "Menja redosled korisnika u listama:po vremenu ulaska ili po abecedi.");
define("L_HELP_CMD_32", "Ovo je treća (igranje uloga) verzija bacanja kocke.<br />Upotreba: /d{n1}[tn2] ili /d{n1};<br />n1 može uzeti bilo koju vrednost <b>između 1 i 100</b> (on predstavlja broj kotrljanja po kocki ).<br />n2 može uzeti bilo koju vrednost <b>između 1 i %s</b> (on predstavlja broj kotrljanja kocki po bacanju).");
define("L_HELP_CMD_33", "Promeni veličinu slova u porukama u četu prema izboru korisnika (dozvoljene vrednosti za n: <b>između 7 i 15</b>); /size komanda resetuje veličinu slova na pretpostavljenu vrednost (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "ovo će pomoći korisniku da odredi orijentaciju tekstualne poruke (ltr = s leva u desno, rtl = s desna u levo).");
define("L_HELP_CMD_VAR", "Sinonimi (varijante): %s"); // a list of English and/or translated alternatives for each command, provided in help.
define("L_HELP_ETIQ_1", "Čet Etiketa");
define("L_HELP_ETIQ_2", "Naš sajt bi hteo da održava zajednicu prijateljskom i zabavnom, pa vas molimo da se pridržavate sledećih upustava. Ako se ne budete pridržavali ovih pravila, jedan od čet moderatora može da vas izbaci iz četa.<br /><br />Hvala vam,");
define("L_HELP_ETIQ_3", "Naša uputstva za Čet Etiketu");
define("L_HELP_ETIQ_4", "<li>Nemojte da \"spam\" čet pišući besmislice ili slučajna slova.</li>
<li>Ne koristite aLtErnAtiVna slova.</li>
<li>Držite SVA CAPS na minimumu, jer se to smatra vikanjem.</li>
<li>Imajte na umu da su čet korisnici iz celog sveta i da ćete sresti ljude različitih uverenja. Molimo budite ljubazni i uljudni sa tim ljudima.</li>
<li>Nemojte da se profano ponašate prema drugim članovima. U stvari, pokušajte da održite čistim od profanisanja i/ili kletvi.</li>
<li>Nemojte zvati druge ljude po realnim imenima koje oni nebi voleli. Koristite njihove nadimke umesto toga.</li>");

// messages frame
define("L_NO_MSG", "Trenutno nema poruka ...");
define("L_TODAY_DWN", "Poruke koje su poslate danas počinju dole");
define("L_TODAY_UP", "Poruke koje su poslate juče počinju dole");

// message colors
$TextColors = array("Crna" => "#000000",
				"Crvena" => "#FF0000",
				"Zelena" => "#009900",
				"Plava" => "#0000FF",
				"Ljubičasta" => "#9900FF",
				"Tamno crvena" => "#990000",
				"Tamno zelena" => "#006600",
				"Tamno plava" => "#000099",
				"Braon" => "#996633",
				"Akva plava" => "#006699",
				"Šargarepa" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignorisan");
define("L_IGNOR_NON", "Nije ignorisan korisnik");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_OWNER", "Vlasnik");
define("L_WHOIS_TOPMOD", "Najviši Moderator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_MODERS", "Moderatori");
define("L_WHOIS_OTHERS", "Drugi korisnici");
define("L_WHOIS_USER", "Korisnik");
define("L_WHOIS_GUEST", "Gost");
define("L_WHOIS_REG", "Registrovan");
define("L_WHOIS_BOT", "Bot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s ulazi u ovu sobu.");
define("L_EXIT_ROM", "%s izlazi iz ove sobe.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s je automatski izbačen iz sobe zbog neaktivnosti.");
define("L_CLOSED_ROM", "%s je zatvorio brauzer.");

// Text for /away command notification string:
define("L_AWAY", "%s je označen kao odsutan...");
define("L_BACK", "%s se vratio!");

// Quick Menu mod
define("L_QUICK", "Brzi Meni");

// Topic Banner mod
define("L_TOPIC", "je postavio TEMU kao:");
define("L_TOPIC_RESET", "je resetovao TEMU");
define("L_HELP_TOP", "najmanje dve reči za temu");
define("L_BANNER_WELCOME", "Dobrodošli u %s!");
define("L_BANNER_TOPIC", "Tema:");
define("L_DEFAULT_TOPIC_1", "Ovo je pretpostavljena tema. Uredite localization/_owner/owner.php da je pormenite!");

// Img cmd mod
define("L_PIC", "Slika koju je postavio-la");
define("L_PIC_RESIZED", "Promenjena veličina na");
define("L_HELP_IMG", "puna putanja do slike koju ćete postaviti");
define("L_NO_IMAGE", "Ovo nije važeća URL adresa javne udaljene slike.\\nPokušajte ponovo!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s nije više moderator u bilo kojoj sobi u ovom četu.");
define("L_IS_NO_MODERATOR", "%s nije moderator.");
define("L_ERR_IS_ADMIN", "%s je administrator!\\nNe možete promeniti admin dozvole.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Dodatne komande:");
define("INFO_MODS", "Dodatna Svojstva/Moduli:");
define("INFO_BOT", "Naš bot je:");

// Profile mod
define("L_PRO_1", "Jezici koje govorimo");
define("L_PRO_2", "Omiljeni link 1");
define("L_PRO_3", "Omiljeni link 2");
define("L_PRO_4", "Opis");
define("L_PRO_5", "URL slike");
define("L_PRO_6", "Ime/Tekst boja");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Neispravan URL ili nepostojeći domaćin.");
define("L_TITLE_AV", "Vaš trenutni avatar: ");
define("L_CHG_AV", "Kliknite \"".L_REG_16."\" u Profil obrascu<br />da postavite vaš Avatar.");
define("L_SEL_NEW_AV", "Odaberite novi Avatar");
define("L_EX_AV", "primer");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Upišite URL, a onda pritisnite ENTER da vidite)");
define("L_CANCEL", "Poništite");
define("L_AVA_REG", "Morate biti registrovani\\nda promenite vašu avatar sličicu");
define("L_SEL_NEW_AV_CONFIRM", "Ovaj obrazac nije poslat.\\nAko sada odete na avatar deo izgubit ćete\\nsve izmene koje ste učinili do sada!\\n\\nDali ste sigurni?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Napomene: Naš bot je javno aktivan u ovoj sobi. Da bi počeli da govorite sa botom, upišite <b>zdravo ".C_BOT_NAME."</b>. Da bi završili konverzaciju upišite: <b>doviđenja ".C_BOT_NAME."</b>. (private: /to <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "Napomene: Naš bot je javno aktivan u %s sobi. Možete privatno razgovarati tako što kliknete na njegovo ime i da šapućete. (komanda: /wisp <b>".C_BOT_NAME."</b> Poruka)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "Napomene: Naš bot nije javno aktivan. Možete privatno razgovarati tako što kliknete na njegovo ime. (komanda: /to <b>".C_BOT_NAME."</b> Poruka ili /wisp <b>".C_BOT_NAME."</b> Poruka)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot nije aktivan u ovoj sobi!");
define("BOT_START_ERROR", "Bot je već aktivan u ovoj sobi!");
define("BOT_DISABLED_ERROR", "Bot je onemogućen u Admin Panelu!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "valja kocku, rezultati su:");
define("DICE_WRONG", "Morate da odaberete koliko kocki želite da bacite\\n(ODaberite broj između 1 i ".MAX_ROLLS.").\\nSamo upišite/kocke za bacanje sve ".MAX_ROLLS." kocke.");
define("DICE2_WRONG", "Druga vrednost treba da bude između 1 i ".MAX_ROLLS.".\\nOstavite prazno da uzmete sve. ".MAX_ROLLS." kocke\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Prva vrednost treba da bude između 1 i ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d ili /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Druga vrednost treba da bude između 1 i ".MAX_ROLLS.".\\nOstavite prazno da uzmete sve. ".MAX_ROLLS." kockee\\n(e.g. /d50 ili /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "otvori iskačuće prozore na privatne poruke");
define("L_REG_POPUP_NOTE", "Onemogućite blokiranje iskačućih prozora!");
define("L_PRIV_POST_MSG", "Pošalji privatnu poruku!");
define("L_PRIV_MSG", "Stigla je nova privatna poruka!");
define("L_PRIV_MSGS", "%s nova privatna poruka primljena!");
define("L_PRIV_MSGSa", "Ovde je prvih 10 poruka!<br />Uzmite donju vezu da vidite ostatak.");
define("L_PRIV_MSG1", "Od:");
define("L_PRIV_MSG2", "Soba:");
define("L_PRIV_MSG3", "Za:");
define("L_PRIV_MSG4", "Poruka:");
define("L_PRIV_MSG5", "Postovano:");
define("L_PRIV_REPLY", "Odgvor");
define("L_PRIV_READ", "Pritisnite ’".L_REG_25."’ dugme da označite sve postove kao pročitane!");
define("L_PRIV_POPUP", "Možete da onemogućite/ponovo omogućite bilo kada svojstvo iskačućih prozora<br />uređivanjem vašeg");
define("L_PRIV_POPUP1", "Profil</a> (samo registrovani korisnici)");
define("L_NOT_ONLINE", "%s je upravo sada na vezi.");
define("L_PRIV_NOT_ONLINE", "%s nije na vezi sada,\\nali će primiti vašu poruku nakon prijavljivanja.");
define("L_PRIV_NOT_INROOM", "%s nije u ovoj sobi.\\nAko još uvek ćelite da pošaljete privatnu poruku ovom korisniku,\\nkoristite komandu: /wisp %s poruka.");
define("L_PRIV_AWAY", "%s je označen kao odsutan,\\nali će primiti vašu poruku\\nkad se vrati.");
define("PM_DISABLED_ERROR", "Šaputanje (slanje privatnih poruka)\\n je onemogućeno u ovom četu.");
define("L_NEXT_PAGE", "Idite na sledeću stranu");
define("L_NEXT_READ", "Čitajte sledećih %s"); // message / 10 poruka
define("L_ROOM_ALL", "Sve sobe");
define("L_PRIV_NO_MSGS", "Nema primljenih privatnih poruka");
define("L_PRIV_READ_MSG", "1 primljena privatna poruka"); //singular
define("L_PRIV_READ_MSGS", "%s primljenih privatnih poruka"); //plural
define("L_PRIV_MSGS_NEW", "Novo"); //singular form
define("L_PRIV_MSGS_READ", "Čitaj"); //singular form
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Osveži stranu");
define("L_PRIV_MARK_ALL", "Sve označi kao Pročitano");
define("L_PRIV_MARK_SEL", "Označi odabrane kao Pročitano");
define("L_PRIV_REMOVE", "Ukloni označene PM"); // or selected
define("L_PRIV_PM", "(privatno)");
define("L_PRIV_WISP", "(šaputanje)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Omogućeno");
define("L_ENABLED_INIT", "Om");
define("L_DISABLED", "Onemogućeno");
define("L_DISABLED_INIT", "On");
define("L_COLOR_HEAD_SETTINGS", "Trenutna Podešavanja na ovom serveru:");
define("L_COLOR_HEAD_SETTINGSa", "Pretpostavljene boje:");
define("L_COLOR_HEAD_SETTINGSb", "Pretpostavljena boja:");
define("L_COL_HELP_TITLE", "Uzimač boja");
define("L_COL_HELP_SUB1", "Upotreba:");
define("L_COL_HELP_P1", "Možete da odaberete vašu pretpostavljenu boju uređivanjem vašeg profila (ista boja kao boja vašeg korisničkog imena). Još uvek ćete moći da koristite bilo koju drugu boju. Da bi vratili vašu pretpostavljenu boju od slučajno postavljene trebate da odaberete vašu pretpostavljenu boju (Null) - ona je prva na listi.");
define("L_COL_HELP_SUB2", "Napomene:");
define("L_COL_HELP_P2", "<u>Opseg boja</u><br />Ovisno o vašem brauzeru/OS svojstvima, moguće je da neke boje neće biti jasno prikazane. W3C HTML 4.0 standard podržava samo 16 imena boja:");
define("L_COL_HELP_P2a", "Ako korisnik kaže da nemože da vidi vašu boju to verovatno znači da njegov bruazer nemože da prikaže tu boju.");
define("L_COL_HELP_SUB3", "Definisana podešavanja na ovom četu:");
define("L_COL_HELP_P3", "<u>Nivoi korišćenja boja</u>:<br />1. Administrator može da koristi bilo koju boju.<br />Pretpostavljena boja za administratora je <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatori mogu da koriste bilo koju boju osim <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> i <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Pretpostavljena boja za moderatora je <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Drugi korisnici mogu da koriste bilo koju boju osim <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> i <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Pretpostavljena boja je <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Techničke stvari</u>: Ove boje je definisao administrator u admin panelu.<br />Ako je nešto pogrešno ili ako vam s enešto ne dopada u vezi pretpostavljenih boja kontaktirajte najpre <b>administrator</b> , ne korisnike u sobi. :-)");
define("L_COL_HELP_USER_STATUS", "Vaš status");
define("L_COL_TUT", "Korišćenje obojenog teksta u četu");
define("L_NULL", "Null");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "boju sobe");
define("L_PRO_COLOR", "boju profila");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Samo administrator može da koristi ".COLOR_CA." boju!\\n\\nBoja vašeg teksta se postavlja na ".COLOR_CM."!\\n\\nMolimo vas da odaberete drugu boju.");
define("COL_ERROR_BOX_USRA", "Samo administrator može da koristi ".COLOR_CA." boju!\\n\\nNemojte da koristite ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ili ".COLOR_CM1.".\\n\\nOve boje su rezervisane za moćne korisnike!\\n\\nBoja vašeg teksta se postavlja na ".COLOR_CD."!\\n\\nMolimo vas da odaberete drugu boju.");
define("COL_ERROR_BOX_USRM", "Treba da ste moderator da bi koristili ".COLOR_CM." boju!\\n\\nNemojte da koristite ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ili ".COLOR_CM1.".\\n\\nOve boje su rezervisane za moćne korisnike!\\n\\nBoja vašeg teksta se postavlja na".COLOR_CD."!\\n\\nMolimo vas da odaberete drugu boju.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Dobro došli na naš čet. Molimo vas da poštujete bon-ton dok četujete: <I>pokušajte da budete prijatni i ljubazni</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Upravo su promenjena podešavanja ovog servera. Da bi se izbegle smetnje ponovo učitajte ovu stranu (pritisnite F5 na tastaturi ili Izlaz i ponovo uđite u čet).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Veličina slova može biti samo \\nnull (za reset) ili između 7 i 15");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "Ponedeljak");
define("L_TUE", "Utorak");
define("L_WED", "Sreda");
define("L_THU", "Četvrtak");
define("L_FRI", "Petak");
define("L_SAT", "Subota");
define("L_SUN", "Nedelja");

// Password reset form by Ciprian
define("L_PASS_0", "Obrazac podešavanja lozinke");
define("L_PASS_1", "Tajno pitanje");
define("L_PASS_2", "Koje je marke vaš prvi auto?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "Koje je ime vašeg prvog kućnog ljubimca?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "Vaše omiljeno piće?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "Koji je dan vašeg rođenja?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Tajni odgovor");
define("L_PASS_7", "Resetuj lozinku");
define("L_PASS_8", "Vaša lozinka je uspešno resetovana.");
define("L_PASS_9", "Vaša nova lozinka da bi ušli u čet");
define("L_PASS_11", "Dobro došli na naš čet server!");
define("L_PASS_12", "Odaberite vaše pitanje ...");
define("L_ERR_PASS_1", "Pogrešno korisničko ime. Odaberite vaše.");
define("L_ERR_PASS_2", "Pogrešan email. Pokušajte ponovo!");
define("L_ERR_PASS_3", "Pogrešno pitanje.<br />Odgovorite pitanje koje je pokazano dole!");
define("L_ERR_PASS_4", "Pogrešan tajni odgvor. Pokušajte ponovo!");
define("L_ERR_PASS_5", "Niste podesili vaše privatne/tajne podatke.");
define("L_ERR_PASS_6", "Još niste podesili vaše privatne/tajne podatke.<br />Nemožete da koristite ovaj obrazac. Kontaktirajte administratora!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s je postao-la administrator za ovaj čet.");
define("L_ADM_4", "%s nije više administrator za ovaj čet.");

// Open Schedule by Ciprian
define("L_DAILY", "Dnevno");
define("L_ALWAYS", "uvek");
define("L_OPEN", "Otvoreno");
define("L_CLOSED", "Zatvoreno");
define("L_OPEN_PUB", "OTVORENO ZA JAVNOST");
define("L_CLOSED_PUB", "ZATVORENO ZA JAVNOST");

// Links popup page by Alex
define("L_LINKS_1", "Postovane veze");
define("L_LINKS_2", "Ovde možete da posetite postovane veze");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Kliknite ovde %s %s");
define("L_CLICK", "Kliknite ovde %s");
define("L_LINKS_3", "da bi otvorili vezu");
define("L_LINKS_4", "da bi otvorili autorov sajt");
define("L_LINKS_5", "da umetnete smeška");
define("L_LINKS_6", "da kontaktirate");
define("L_LINKS_7", "da posetite phpMyChat sajt");
define("L_LINKS_8", "da se pridužite phpMyChat Grupi");
define("L_LINKS_9", "da pošaljete vašu povratnu informaciju");
define("L_LINKS_10", "da prevučete phpMyChat-Plus");
define("L_LINKS_11", "da proverite ko četuje");
define("L_LINKS_12", "da otvorite Chat Login Stranu");
define("L_LINKS_13", "da svirate ovaj zvuk"); // can also be translated as "to play this sound"
define("L_LINKS_14", "da koristite ovu komandu");
define("L_LINKS_15", "da otvorite");
define("L_LINKS_16", "Smeško Galerija");
define("L_LINKS_17", "da poredate uzlazno");
define("L_LINKS_18", "da poredate silazno");
define("L_LINKS_19", "da se postavi/modifikuje vaš Gravatar");
define("L_SWITCH", "Prebacite na"); // E.g. "Prebacite na Talijanski" (Country Flags mouseover / Language switching)
define("L_SELECTED", "odabran"); // E.g. "Francuski - odabran" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", "odabrana"); // feminine word, if it's the case
define("L_NOT_SELECTED", "nije odabran");
define("L_NOT_SELECTED_F", "nije odabrana"); // feminine word, if it's the case
define("L_EMAIL_1", "da pošaljete email");
define("L_FULLSIZE_PIC", "da otvorite sliku u punoj veličini");
define("L_PRIVACY", "pročitate našu Politiku Privatnosti"); //Click here to…
define("L_AUTHOR", "autor"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "programer ovog četa"); //same here
define("L_OWNER", "vlasnik ovog četa"); //same here
define("L_TRANSLATOR", "prevodilac"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... posetilaca %s od");

// Status bar messages
define("L_JOIN_ROOM", "Uđite u ovu sobu");
define("L_USE_NAME", "Koristite ovo korisničko ime");
define("L_USE_NAME1", "Adresa za ovo korisničko ime");
define("L_WHSP", "Šapat");
define("L_SEND_WHSP", "Pošalji šapat");
define("L_SEND_PM_1", "Pošalji PM");
define("L_SEND_PM_2", "Pošalji privatnu poruku");
define("L_HIGHLIGHT", "Obeleži/Ne-obeleži");
define("L_HIGHLIGHT_SB", "Obeleži/Ne-obeleži postove ovog korisnika");

//Lurking frame popup
define("L_LURKING_2", "Posmatračka strana");
define("L_LURKING_3", "posmatra");
define("L_LURKING_4", "priključio se na");
define("L_LURKING_5", "Nepoznata");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Dodatne Opcije");
define("L_ARCHIVE", "Otvorite Arhivu");
define("L_SOUNDFIX_IE_1", "Popravak zvuka za IE");
define("L_SOUNDFIX_IE_2", "Prevucite popravak zvuka za IE");
define("L_LURKING_1", "Otvorite posmatračku stranu");
define("L_REG_BRB", "ubrzo se vraćam (potrebno je da se pre registrujete)");
define("L_DEL_BYE", "ne čekajte me");
define("L_EXTRA_PRIV1", "Pročitane PM"); // keep it short
define("L_EXTRA_PRIV2", "Nove PM"); // keep it short

// Months for Open Schedule by Ciprian
define("L_JAN", "Januar");
define("L_FEB", "Februar");
define("L_MAR", "Mart");
define("L_APR", "April");
define("L_MAY", "Maj");
define("L_JUN", "Jun");
define("L_JUL", "Jul");
define("L_AUG", "Avgust");
define("L_SEP", "Septembar");
define("L_OCT", "Oktobar");
define("L_NOV", "Novembar");
define("L_DEC", "Decembar");

// Localized date format
// Set the SR specific date/time format
if (eregi("win", PHP_OS)) {
setlocale(LC_ALL, "serbian.UTF-8", "serbian");
} else {
setlocale(LC_ALL, "sr_CS.UTF-8", "sr.UTF-8", "serbian.UTF-8", "srl.UTF-8", "srp_srp.UTF-8"); // For SR formats
}
define("L_LANG", "sr_CS");
define("ISO_DEFAULT", "iso-8859-2");
define("WIN_DEFAULT", "windows-1250");
define("L_SHORT_DATE", "%d.%m.%Y"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%A, %d. %B %Y"); //Change this to your local desired format (keep the long form)
define("L_SHORT_DATETIME", "%d.%m.%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%A, %d. %B %Y %H:%M:%S"); //Change this to your local desired format (keep the long form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","korisnici ".LOGIN_LINK."četuju</A> sada.");
define("USERS_LOGIN","1 korisnik ".LOGIN_LINK."četuje</A> sada.");
define("NO_USER","Niko ne ".LOGIN_LINK."četuje</A> sada.");
define("L_PRIV_REPLY_LOGIN", "Prijavite se u ćaskanje akoželite da ".LOGIN_LINK."pošaljete odgovor</A> na bilo koju od gore izlistanih Novih PM poruka");

// Language names
define("L_LANG_AR", "Argentinski Španski");
define("L_LANG_BG", "Bugarski - Latinica");
define("L_LANG_BR", "Brazilski Portugalski");
define("L_LANG_CZ", "Češki");
define("L_LANG_DA", "Danski");
define("L_LANG_DE", "Nemački");
define("L_LANG_EN", "Engleski"); // for admin panel only
define("L_LANG_ENUK", "Engleski UK"); // for UK formats and flags
define("L_LANG_ENUS", "Engleski US"); // for US formats and flags
define("L_LANG_ES", "Španski");
define("L_LANG_FR", "Francuski");
define("L_LANG_GR", "Grčki");
define("L_LANG_HE", "Hebrejski");
define("L_LANG_HI", "Hindu");
define("L_LANG_HU", "Mađarski");
define("L_LANG_ID", "Indonezijski");
define("L_LANG_IT", "Talijanski");
define("L_LANG_KA", "Gruzijski");
define("L_LANG_NL", "Holandski");
define("L_LANG_RO", "Rumunski");
define("L_LANG_SK", "Slovački");
define("L_LANG_SRL", "Srpski - Latinica");
define("L_LANG_SRC", "Srpski - Ćirilica");
define("L_LANG_SV", "Švedski");
define("L_LANG_TR", "Turski");
define("L_LANG_UR", "Pakistanski Urdu");
define("L_LANG_VI", "Vijetnamski");

// Skins preview page
define("L_SKINS_TITLE", "Pregled skinova");
define("L_SKINS_TITLE1", "Skinovi %s do %s za pregled"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Dostupni skinovi");
define("L_SKINS_NONAV", "Nema definisanih stilova u \"skin\" fascikli");
define("L_SKINS_COPY", "&copy; %s Skin kreirao-la %s"); //© 2008 Skin by AuthorName

// Swap image titles / by Ciprian
define("L_GEN_ICON", "Slika roda");

// Ghost mode by Ciprian
define("L_GHOST", "Duh");
define("L_SUPER_GHOST", "Super Duh");
define("L_NO_GHOST", "Vidljivo");

// Sorting options by Ciprian
define("L_ASC", "Uzlazno");
define("L_DESC", "Silazno");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Ukupno poseta");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "koristite Gravatar");

// Uploader mod by Ciprian - 11.08.2008
define("L_UPLOAD", "Nadodaj %s"); // Upload Image, Upload Sound or Upload File
define("L_UPLOAD_IMG", "Datoteka slike"); // used to upload Avatars and /img command
define("L_UPLOAD_SND", "Zvučna datoteka"); // used to upload Buzz sounds
define("L_UPLOAD_FLS", "Datoteke"); // used to upload multiple files at once
define("L_UPLOAD_SUCCESS", "%s uspešno nadodato kao %s."); // original filename, destination filename
define("L_FILES_TITLE", "Upravljanje dodatim datotekama");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Ograničen pristup");
define("L_RESTRICTED_ROM", "%s je uspešno sprečen da uđe u sobu.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Prijavite se sa OpenID");
define("L_OPID_REG", "Uvezite vaš OpenID profile");

// Support buttons
define("L_SUPP_WARN", "Izabrali ste da doprinesete slobodnom razvoju\\n".APP_NAME." donacijom programeru.\\nHvala za vašu podršku!\\n\\nBeleška: primalac nije vlasnik ovog četa.\\nMolimo vas da unesete iznos na sledećoj strani.\\n\\nNastavite?");
define("L_SUPP_ALT", "Podržiet razvoj pomoću PayPal ".APP_NAME." - Besplatno je, Slobodno i Bezbedno!");
?>