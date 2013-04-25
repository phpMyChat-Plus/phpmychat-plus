<?php
// File : japanese/localized.chat.php - plus version (20.03.2010 - rev.44)
// Original translation by Dendeke <konchakka211@yahoo.co.jp>
// Corrections by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;
$FontName = "Arial Unicode MS";

// welcome page
define("L_TUTORIAL", "チュートリアル");

define("L_WEL_1", "チャット内での発言は、%s%sで自動削除されます");
define("L_WEL_2", "無言ユーザは、%s%sで強制退去になります");

define("L_CUR_1", "現在");
define("L_CUR_1a", "は");
define("L_CUR_1b", "は");
define("L_CUR_2", "がチャット中です");
define("L_CUR_3", "現在チャット中のユーザ");
define("L_CUR_4", "専用部屋を利用中のユーザ");
define("L_CUR_5", "現在のROMユーザ<br />(このページを閲覧中):");

define("L_SET_1", "設定してください...");
define("L_SET_2", "ユーザ名");
define("L_SET_3", "表示する発言数");
define("L_SET_4", "更新する間隔");
define("L_SET_5", "部屋の選択...");
define("L_SET_6", "デフォルトの公開部屋");
define("L_SET_7", "選択してください...");
define("L_SET_8", "ユーザが作成した公開部屋");
define("L_SET_9", "自分で");
define("L_SET_10", "公開部屋");
define("L_SET_11", "専用部屋");
define("L_SET_12", "を作る");
define("L_SET_13", "以上の設定で");
define("L_SET_14", "チャットする");
define("L_SET_15", "デフォルトの専用部屋");
define("L_SET_16", "ユーザが作成した専用部屋");
define("L_SET_17", "アバターの選択");
define("L_SET_18", "このページをブックマークする:「Ctrl+D」。");
define("L_SET_19", "以上の情報を記録する");

define("L_SRC", "は次の場所から自由に手に入れることができます：");

define("L_SEC", "秒");
define("L_SECS", "秒");
define("L_MIN", "分");
define("L_MINS", "分");
define("L_HOUR", "時間");
define("L_HOURS", "時間");
define("L_DAY", "日");
define("L_DAYS", "日");

// registration stuff:
define("L_REG_1", "パスワード");
define("L_REG_2", "アカウント管理");
define("L_REG_3", "登録");
define("L_REG_4", "プロファイル編集");
define("L_REG_5", "ユーザ消去");
define("L_REG_6", "ユーザ登録");
define("L_REG_7", "登録ユーザのみ");
define("L_REG_8", "E-mail");
define("L_REG_9", "登録が完了しました。");
define("L_REG_10", "戻る");
define("L_REG_11", "編集");
define("L_REG_12", "ユーザ情報の修正");
define("L_REG_13", "ユーザの消去");
define("L_REG_14", "ログイン");
define("L_REG_15", "ログイン");
define("L_REG_16", "変更");
define("L_REG_17", "プロファイルを更新しました。");
define("L_REG_18", "モデレータにより強制退室させられました。");
define("L_REG_18a", "モデレータにより強制退室させられました。<br />理由：%s");
define("L_REG_19", "本当に削除してもよろしいですか？");
define("L_REG_20", "はい");
define("L_REG_21", "削除しました。");
define("L_REG_22", "いいえ");
define("L_REG_25", "閉じる");
define("L_REG_30", "名");
define("L_REG_31", "姓");
define("L_REG_32", "ホームページ");
define("L_REG_33", "E-mailを公開する");
define("L_REG_34", "ユーザプロファイルの編集");
define("L_REG_35", "管理");
define("L_REG_36", "居住地／国");
define("L_REG_37", "<span class=\"error\">*</span>は必須項目です。");
define("L_REG_39", "管理者が部屋を削除しました。");
define("L_REG_43", "秘密");
define("L_REG_44", "カップル");
define("L_REG_45", "性別");
define("L_REG_46", "男");
define("L_REG_47", "女");
define("L_REG_48", "未指定");
define("L_REG_49", "ユーザ登録が必要です！");
define("L_REG_50", "ただいまユーザ登録は中断しています！");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "チャットを利用するための設定");
define("L_EMAIL_VAL_2", "ようこそいっらっしゃいました。");
define("L_EMAIL_VAL_Err", "内部エラーです。管理者に連絡してください：<a href=\"mailto:%s\">%s</a>。");
define("L_EMAIL_VAL_Done", "パスワードを送信しました。<br />パスワードの変更は 「".L_REG_4."」 内のログインページで行えます。");
define("L_EMAIL_VAL_PENDING_Done", "あなたの登録情報は一旦保留しています。");
define("L_EMAIL_VAL_PENDING_Done1", "承認後、管理者がパスワードを送信いたします。");
define("L_EMAIL_VAL_3", "%sとしてのあなたの登録は一旦保留しています"); //chat name
define("L_EMAIL_VAL_31", "おめでとうございます！あなたの登録が無事完了いたしました！");
define("L_EMAIL_VAL_32", "次の場所で利用できるあなたの登録データをお知らせします。\n利用する場所：%s（ %s ）："); //chat name at chaturl
define("L_EMAIL_VAL_4", "次の場所で利用できるアカウントの登録が完了しました。\n利用する場所：%s（ %s ）"); //chat name at chaturl
define("L_EMAIL_VAL_41", "次の場所で利用する重要なアカウント情報を変更しました\n利用する場所：%s（ %s ）\n影響するアカウント：%s"); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "ご登録いただいた%sアカウントの詳細（%s用）"); //username - chatname
define("L_EMAIL_VAL_51", "更新した%sアカウントの詳細（%s用）"); //username - chatname
define("L_EMAIL_VAL_6", "登録日：%s");
define("L_EMAIL_VAL_61", "更新日：%s");
define("L_EMAIL_VAL_7", "更新した%sアカウントの情報は次のとおり："); //username
define("L_EMAIL_VAL_8", "このメールは参考のため保管しておいてください。\n安全な場所に置き、第三者に見られないようにしてください。\nご登録ありがとうございました！お楽しみください！");
define("L_EMAIL_VAL_81", "パスワードの変更は「".L_REG_4."」内のログインページで行えます。");

// admin stuff
define("L_ADM_1", "%sはもはやモデレータではありません。");
define("L_ADM_2", "あなたはもはや登録ユーザではありません。");

// error messages
define("L_ERR_USR_1", "そのユーザ名は既に使用されています。別のを選んでください。");
define("L_ERR_USR_2", "ユーザ名を選択する必要があります。");
define("L_ERR_USR_3", "そのユーザ名は登録済みです。<br />パスワードを入力するか、別のユーザ名を選択してください。");
define("L_ERR_USR_4", "パスワードが違います。");
define("L_ERR_USR_5", "あなたのユーザ名を入力してください。");
define("L_ERR_USR_6", "あなたのパスワードを入力してください。");
define("L_ERR_USR_7", "あなたのメールアドレスを入力してください。");
define("L_ERR_USR_8", "正しいメールアドレスを入力してください。");
define("L_ERR_USR_9", "そのユーザ名は既に使用されています。");
define("L_ERR_USR_10", "ユーザ名またはパスワードが違います。");
define("L_ERR_USR_11", "管理者でなければなりません。");
define("L_ERR_USR_12", "あなたは管理者のため、削除できません。");
define("L_ERR_USR_13", "自分の部屋を作成するには、ユーザ登録が必須です。");
define("L_ERR_USR_14", "ユーザ登録しないとチャットできません。");
define("L_ERR_USR_15", "フルネームを入力してください。");
define("L_ERR_USR_16", "使用可能な特殊文字は次のとおり：\\n".$REG_CHARS_ALLOWED."\\nスペース、コンマ、バックスラッシュ（\\）は使用できません。\\nシンタックスを確認してください。");
define("L_ERR_USR_16a", "使用可能な特殊文字は次のとおり：<br />".$REG_CHARS_ALLOWED."<br />スペース、コンマ、バックスラッシュ（\\）は使用できません。シンタックスを確認してください。");
define("L_ERR_USR_17", "その部屋は存在しません。あなたには作成権限がありません。");
define("L_ERR_USR_18", "ユーザ名に禁止ワードがあります。");
define("L_ERR_USR_19", "同時に２つ以上の部屋は利用できません。");
define("L_ERR_USR_20", "部屋またはチャットから追い出されました。");
define("L_ERR_USR_20a", "部屋またはチャットから追い出されました。<br />理由：%s");
define("L_ERR_USR_21", "無言時間が".C_USR_DEL."".((C_USR_DEL == "1") ? "".L_MIN."" : "".L_MINS."")."続いたため、<br />部屋から強制退去させられました。");
define("L_ERR_USR_22", "そのコマンドは、ご利用のブラウザ\\nでは利用できません（IEエンジン）。");
define("L_ERR_USR_23", "専用部屋の利用にはユーザ登録が必要です。");
define("L_ERR_USR_24", "専用部屋の作成にはユーザ登録が必要です。");
define("L_ERR_USR_25", "".$COLORNAME."という色は、管理者専用です！<br />".COLOR_CA."、".COLOR_CA1."、".COLOR_CA2."、".COLOR_CM."、".COLOR_CM1."、".COLOR_CM2."は使用できません。<br />これらはパワーユーザ専用です！");
define("L_ERR_USR_26", "".$COLORNAME."という色は、管理者およびモデレータ専用です！<br />".COLOR_CA."、".COLOR_CA1."、".COLOR_CA2."、".COLOR_CM."、".COLOR_CM1."、".COLOR_CM2."は使用できません。<br />これらはパワーユーザ専用です！");
define("L_ERR_USR_27", "自分自身にPMは送れません。\\n独り言は心の中でどうぞ...\\n他のユーザ名を選択してください。");
define("L_ERR_USR_28", "%sへのアクセスは制限されています！<br />別の部屋を選択してください。");
define("L_ERR_ROM_1", "部屋の名前には、コンマやバックスラッシュ（\\）を使うことができません。");
define("L_ERR_ROM_2", "作成しようとした部屋の名前に禁止ワードが含まれています。");
define("L_ERR_ROM_3", "その部屋は公開部屋として既に存在します。");
define("L_ERR_ROM_4", "不正な部屋名です。");

// users frame or popup
define("L_EXIT", "退室");
define("L_DETACH", "ユーザリストの分離");
define("L_EXPCOL_ALL", "全開／閉");
define("L_CONN_STATE", "接続状態の更新");
define("L_CHAT", "チャット");
define("L_USER", "ユーザ");
define("L_USERS", "ユーザ");
define("L_LURKER", "ROMユーザ");
define("L_LURKERS", "ROMユーザ");
define("L_NO_USER", "誰もいません");
define("L_ROOM", "部屋");
define("L_ROOMS", "部屋");
define("L_EXPCOL", "部屋の開／閉");
define("L_BEEP", "ユーザ入室時にビープ音を鳴らす／鳴らさない");
define("L_PROFILE", "プロファイルの表示");
define("L_NO_PROFILE", "プロファイルなし");

// input frame
define("L_HLP", "ヘルプ");
define("L_MODERATOR", "%sがモデレータになりました");
define("L_KICKED", "%sを強制退去しました。");
define("L_KICKED_REASON", "%sを強制退去しました。（理由：%s）");
define("L_KICKED_ALL", "全ユーザを強制退去しました。");
define("L_KICKED_ALL_REASON", "全ユーザを強制退去しました。（理由：%s）");
define("L_BANISHED", "%sを接続禁止処分にしました。");
define("L_BANISHED_REASON", "%sを接続禁止処分にしました。（理由：%s）");
define("L_ANNOUNCE", "お知らせ");
define("L_INVITE", "%sから<a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a>への招待状が届きました。");
define("L_INVITE_REG", "先にユーザ登録が必要です。");
define("L_INVITE_DONE", "%sに招待状を送りました。");
define("L_OK", "送信");
define("L_BUZZ", "サウンドギャラリー");
define("L_BAD_CMD", "不正なコマンドです！");
define("L_ADMIN", "%sは既に管理者になっています！");
define("L_IS_MODERATOR", "%sは既にモデレータになっています！");
define("L_NO_MODERATOR", "モデレータのみ使用可能なコマンドです。");
define("L_NONEXIST_USER", "%sは現在ここにいません。");
define("L_NONREG_USER", "%sは登録されていません。");
define("L_NONREG_USER_IP", "その人のIPは：%s。");
define("L_NO_KICKED", "%sはモデレータまたは管理者のため強制退去できません。");
define("L_NO_BANISHED", "%sはモデレータまたは管理者のため接続禁止処分にできません。");
define("L_SVR_TIME", "サーバ時刻：");
define("L_NO_SAVE", "保存する発言内容がありません！");
define("L_NO_ADMIN", "管理者のみ使用可能なコマンドです。");
define("L_NO_REG_USER", "登録ユーザのみ使用可能なコマンドです。");

// help popup
define("L_HELP_TIT_1", "スマイリー");
define("L_HELP_TIT_2", "発言用書式");
define("L_HELP_FMT_1", "&lt;B&gt;～&lt;/B&gt;、&lt;I&gt;～&lt;/I&gt;、&lt;U&gt;～&lt;/U&gt;タグで挟んだ場所を太字、斜体、下線引きにして発言することができます。<br />たとえば、&lt;B&gt;このテキスト&lt;/B&gt;とすると、<B>このテキスト</B>と表示されます。");
define("L_HELP_FMT_2", "発言内容にハイパーリンク（E-mailやURL）を含めたいときは、タグを付けずに当該アドレスを入力してください。ハイパーリンクは自動的に作成されます。");
define("L_HELP_TIT_3", "コマンド");
define("L_HELP_NOTE", "コマンドは全て英語です！");
define("L_HELP_MSG", "発言内容");
define("L_HELP_MSGS", "発言内容");
define("L_HELP_ROOM", "部屋");
define("L_HELP_BUZZ", "~サウンド名");
define("L_HELP_BUZZ1", "サウンド...");
define("L_HELP_REASON", "理由");
define("L_HELP_MR", "%s氏");
define("L_HELP_MS", "%s女史");
define("L_HELP_CMD_0", "{}は、そのコマンドに必須な設定を表し、[]はオプションを意味します。");
define("L_HELP_CMD_1a", "表示する発言数を設定します。最低値はデフォルトの5です。");
define("L_HELP_CMD_1b", "発言フレームを更新して設定した最新「n」数の発言を表示します。最低値はデフォルトの5です。");
define("L_HELP_CMD_2a", "発言リストの更新間隔を変更します（単位は秒）。<br />「n」3以上の数値を指定しなかった場合は、更新なしと10秒更新の切り替えになります。");
define("L_HELP_CMD_2b", "メッセージおよびユーザリストの更新間隔を変更します（単位は秒）。<br />「n」に3以上の数値を指定しなかった場合は、更新なしと10秒更新の切り替えになります。");
define("L_HELP_CMD_3", "発言数の表示順を逆にします（一部のブラウザのみ）。");
define("L_HELP_CMD_4", "別の部屋に参加します。その部屋が存在せず、かつ、権限があれば、最初に部屋を作成してから参加します。<br />nには0（専用部屋）または1（公開部屋）のいずれかを指定します。指定しなかった場合は、デフォルトの1が適用されます。");
define("L_HELP_CMD_5", "指定した内容を表示させてからチャットを退室します。");
define("L_HELP_CMD_6", "指定したユーザからの発言を表示しなくします。<br />ユーザ名と「-」を指定すれば、そのユーザに対する設定を解除します。ユーザ名を指定せずに「-」だけを指定したときは、全ユーザが対象となります。<br />オプションをひとつも指定しなかったときは、マスキング対象ユーザを全てポップアップウィンドウに表示します。");
define("L_HELP_CMD_7", "直前に入力したテキスト（コマンドや発言内容）を呼び出します。");
define("L_HELP_CMD_8", "発言内容の直前に時刻を表示する／しない。");
define("L_HELP_CMD_9", "チャットから相手を追い出します。このコマンドは、管理者またはその部屋のモデレータのみ利用できます。<br />オプションとして、[".L_HELP_REASON."]（指定した内容）で追い出された理由を表示できます。<br />*をオプションとして使用すると、パワーユーザ以外の全てのユーザ（ゲストおよび登録ユーザ）をチャットから追い出します。サーバに接続トラブルが発生した場合など、全員が一度リロードしなければならない状況などに有効です。この場合、[".L_HELP_REASON."]を指定して、なぜ追い出されたのかをユーザに知らせることをお勧めします。");
define("L_HELP_CMD_10", "指定したユーザにPMを送る（その他のユーザには内容が見えません）。");
define("L_HELP_CMD_11", "指定したユーザの情報が見られます。");
define("L_HELP_CMD_12", "ユーザプロファイルを編集するためのウィンドウをポップアップします。");
define("L_HELP_CMD_13", "この部屋へのユーザの入／退室を知らせるかどうか指定します。");
define("L_HELP_CMD_14", "管理者またはこの部屋のモデレータが、別の登録ユーザをこの部屋のモデレータにします。");
define("L_HELP_CMD_15", "チャットウィンドウを掃除して、最新の発言5つだけを表示します。");
define("L_HELP_CMD_16", "最新n件の発言内容（お知らせ表示を除く）をHTMLファイルに保存します。nで件数を指定しなかった場合は、可能な限りの発言内容が対象となります。");
define("L_HELP_CMD_17", "管理者が全部屋の全ユーザに対してお知らせを送ります。");
define("L_HELP_CMD_18", "別の部屋でチャット中のユーザをこの部屋に招待します。");
define("L_HELP_CMD_19", "この部屋のモデレータまたは管理者が、管理者の設定した期限に応じてユーザを「接続禁止処分」にします。<br />管理者であれば、別の部屋のユーザを接続禁止にすることもでき、*を指定すると全部屋への接続を「永久に」禁止します。<br />オプションとして、[".L_HELP_REASON."]（指定した内容）で接続禁止になった理由を表示できます。");
define("L_HELP_CMD_20", "自分の名前を書かなくても、あなたの名前を表示した文章にします。");
define("L_HELP_CMD_21", "この部屋およびあなたに対して発言しようとした人に対し、<br />あなたが現在離席中であることを表示します。戻ってきたら、普通にチャットを続けてかまいません。");
define("L_HELP_CMD_22", "この部屋にビープ音を鳴らし、オプションによっては指定した文字を表示します。<br />使用法：<br />－従来の方法：「/buzz」または「/buzz 表示したい文字列」－管理パネルで定義されているデフォルトサウンドを鳴らします。<br />－拡張した方法：「/buzz ".L_HELP_BUZZ."」または「/buzz ".L_HELP_BUZZ."  表示したい文字列」－soundフォルダからサウンド名.wavファイルを見つけて鳴らします。このとき、サウンド名の前に「~」を付け忘れないようにし、また、拡張子の.wavは不要です（.wavファイルのみ有効）。<br />デフォルトでは、モデレータ／管理者のみ有効なコマンドです。");
define("L_HELP_CMD_23", "<i>内緒話</i>（PM）を送ります。送る相手はどの部屋にいてもかまいません。相手がオンラインではなかったり離席中の場合は、その旨が表示されます。");
define("L_HELP_CMD_24", "このコマンドはこの部屋のトピックを変更します。他人が設定したトピックを上書きしないように注意してください。重要事項をトピックにしましょう。<br />デフォルトでは、モデレータ／管理者専用コマンドです。<br />「/topic reset」コマンドは、現在のトピックを削除して、その部屋のデフォルト設定に戻します。<br />オプションとして、「/topic * {}」および「/topic * reset」があります。これは対象とする部屋が線部屋になります（全部屋のトピックを同一またはリセットします）。");
define("L_HELP_CMD_25", "ランダムな数値で遊ぶサイコロゲームです。<br />使用法：/diceまたは/dice [n]<br />nには<b>1から%sまで</b>の数値を入れます（これが使用するサイコロの数になります）。数値を指定しなかったときは、デフォルトで設定されている最大数が使われます。");
define("L_HELP_CMD_26", "/diceコマンドの拡張版です。<br />使用法：/{n1}d[n2]または/{n1}d<br />n1には<b>1から%sまで</b>の数値を入れます（これが使用するサイコロの数になります）。<br />n2には<b>1から%sまで</b>の数値を入れます（これはサイコロの側面の数になります）。");
define("L_HELP_CMD_27", "指定したユーザの発言内容をハイライトして読みやすくします。<br />使用法：/high {ユーザ名}またはユーザ名（部屋／ユーザリスト）の横にある小さな<img src=./images/highlightOff.gif>四角い画像をクリックする");
define("L_HELP_CMD_28", "発言内容として<i>1枚の画像</i>が貼り付けられます。<br />使用法：貼り付ける画像はインターネット上になければならず、また、誰にでも公開しているものでなければなりません。ログインが必要な場所のものは使えません。<br />貼り付ける画像ファイルまでのフルパスを入力します！例：<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />利用可能な拡張子：.jpg .bmp .gif .png。URLは大小文字を区別します！<br />ヒント：/imgコマンドに続いて半角スペースを打ってからURLを入力します。ある場所のウェブページの画像を貼り付けるには、画像を右クリックしてプロパティを表示し、フルパス／URL（場合によっては少しスクロールダウンする必要があります）をハイライトさせて/imgコマンドに続いてコピー／ペーストします。<br />コンピュータにある画像は貼り付けられません：間違って貼り付けようとするとチャットウィンドウが壊れますので注意してください！！！");
define("L_HELP_CMD_29", "2番目のコマンドは、管理者またはこの部屋のモデレータが以前にその部屋のモデレータに起用した他の登録ユーザからモデレータ権限を剥奪します。<br />*オプションを使うと全ての部屋からそのユーザのモデレータ権限を剥奪します。");
define("L_HELP_CMD_30", "2番目のコマンドは/meコマンドと同じですが、プロファイルで指定した性別に応じた呼称が付きます。<br />例：* ".sprintf(L_HELP_MR, "Ciprian")."はテレビを見ています、または、* ".sprintf(L_HELP_MS, "Dana")."は幸せです。");
define("L_HELP_CMD_31", "リストに表示するユーザの順序を変更します：入室時刻別またはアルファベット順。");
define("L_HELP_CMD_32", "サイコロゲームの第3（ロールプレイング）バージョンです。<br />使用法：/d{n1}[tn2]または/d{n1}<br />n1には<b>1から100まで</b>の数値を入れます（サイコロの側面の数になります）<br />n2には<b>1から%sまで</b>の数値を入れます（使用するサイコロの数になります）。");
define("L_HELP_CMD_33", "指定したフォントサイズに変更します（nに指定可能な数値：<b>7から15まで</b>)。/sizeコマンドはデフォルトのサイズ（<b>".$FontSize."</b>）にリセットします。");
define("L_HELP_CMD_34", "発言内容の向きを指定します（ltr＝左から右、rtl＝右から左）。");
define("L_HELP_CMD_35", "<i>動画</i>や<i>音声ファイル</i>を小さなフラッシュプレイヤーに貼り付けられるようにします。<br />使用法：貼り付けるファイルのURLをペーストするだけです！例：<b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />コンピュータにフラッシュプレイヤーがインストールされている必要があります。URLは大小文字を区別します！<br />ヒント：/videoコマンドに続き、半角スペースを打ってからURLを入力します。");
define("L_HELP_CMD_35a", "2番目のコマンドは、ビデオファイルに対してyoutube.comの場合にのみ有効です。<br />例：<b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "小さなフラッシュプレイヤーに<i>youtubeビデオ</i>を貼り付けることができます。<br />使用法：貼り付けるファイルのURLをペーストするだけです！例：<b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />コンピュータにフラッシュプレイヤーがインストールされている必要があります。URLは大小文字を区別します！<br />ヒント：/tubeコマンドに続き、半角スペースを打ってからURLを入力します。");
define("L_HELP_CMD_37", "It allows posting of <i>MathJax Equations/Formulas</i> in chat.<br />Usage: Just paste the TeX or MathML (original) codes! E.g. <b>/math&nbsp;\sqrt{3x-1}+(1+x)^2</b><br />For more code samples and instructions go to: <a href=\"http://www.mathjax.org/demos/\" target=\"_blank\">http://www.mathjax.org/demos</a>. Get the code by right-clicking on the formulas.<br />HINTS: type /math followed by a space and paste the code into the box.");
define("L_HELP_CMD_VAR", "同義（類義）：%s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "チャットエチケット");
define("L_HELP_ETIQ_2", "参加する誰もが楽しめるように、次のガイドラインに従ってください。ルールに従えない場合、モデレータによってチャットから退室させられる場合があります。<br /><br />敬具");
define("L_HELP_ETIQ_3", "チャットエチケットガイドライン");
define("L_HELP_ETIQ_4", "<li>意味のない文字列などによる「スパム」行為は行わない。</li>
<li>このチャットには世界各地から大勢の人が参加します。場合によっては、あなたの信仰とは異なる信仰の人もいるかもしれません。そうした人達にも優しく親切かつ礼儀正しくしてください。</li>
<li>他人を冒涜する言葉を使ってはいけません。実際、他人を冒涜したり悪口や禁止ワードは一切使わないようにしましょう。</li>
<li>他人を本名で呼んではいけません。ユーザ名（ニックネーム）を使いましょう。</li>");

// messages frame
define("L_NO_MSG", "発言ログはありません...");
define("L_TODAY_DWN", "本日の発言はここから");
define("L_TODAY_UP", "昨日の発言はここから");

// message colors
$TextColors = array("ブラック" => "#000000",
				"レッド" => "#FF0000",
				"グリーン" => "#009900",
				"ブルー" => "#0000FF",
				"パープル" => "#9900FF",
				"ダークレッド" => "#990000",
				"ダークグリーン" => "#006600",
				"ダークブルー" => "#000099",
				"マロン" => "#996633",
				"アクアブルー" => "#006699",
				"キャロット" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "マスキング");
define("L_IGNOR_NON", "マスキング対象ユーザはいません");

// whois popup
define("L_WHOIS_ADMIN", "管理者");
define("L_WHOIS_OWNER", "所有者");
define("L_WHOIS_TOPMOD", "トップモデレータ");
define("L_WHOIS_MODER", "モデレータ");
define("L_WHOIS_MODERS", "モデレータ");
define("L_WHOIS_OTHERS", "その他ユーザ");
define("L_WHOIS_USER", "ユーザ");
define("L_WHOIS_GUEST", "ゲスト");
define("L_WHOIS_REG", "登録ユーザ");
define("L_WHOIS_BOT", "ロボット"); //robot

// Notification messages of user entrance/exit
define("ENTER_ROM", "%sが入室しました。");
define("L_EXIT_ROM", "%sが退室しました。");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%sは無言ユーザだったため、自動的に退室させられました。");
define("L_CLOSED_ROM", "%sがブラウザを閉じました。");

// Text for /away command notification string:
define("L_AWAY", "%sは離席中です...");
define("L_BACK", "%sが戻りました！");

// Quick Menu mod
define("L_QUICK", "クイックメニュー");

// Topic Banner mod
define("L_TOPIC", "がトピックを次のとおりに設定しました:");
define("L_TOPIC_RESET", "がトピックをリセットしました");
define("L_HELP_TOP", "トピックにする最低2単語");
define("L_BANNER_WELCOME", "%sにようこそ！");
define("L_BANNER_TOPIC", "トピック：");
define("L_DEFAULT_TOPIC_1", "これはデフォルトのトピックです。「localization/_owner/owner.php」の編集で変更できます！");

// Img cmd mod
define("L_PIC", "画像の投稿者：");
define("L_PIC_RESIZED", "次の値にリサイズ：");
define("L_HELP_IMG", "投稿する画像までのフルパス");
define("L_NO_IMAGE", "公開可能な画像のURLではありません。\\nもう一度お試しください！");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%sはもはやどの部屋のモデレータでもありません。");
define("L_IS_NO_MODERATOR", "%sはモデレータではありません。");
define("L_ERR_IS_ADMIN", "%sは管理者です！\\n管理者の権限は変更できません。");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "利用可能な特殊コマンド：");
define("INFO_MODS", "利用可能な特殊機能／MOD：");
define("INFO_BOT", "利用可能なロボット：");

// Profile mod
define("L_PRO_1", "使用言語");
define("L_PRO_1a", "言語");
define("L_PRO_2", "好きなリンクその1");
define("L_PRO_3", "好きなリンクその2");
define("L_PRO_4", "説明");
define("L_PRO_5", "画像URL");
define("L_PRO_6", "名前／テキスト色");

// Avatar mod
define("L_AVATAR", "アバター");
define("L_ERR_AV", "不正なURLまたは存在しないホストです。");
define("L_TITLE_AV", "現在のアバター：");
define("L_CHG_AV", "プロファイルフォームにある\"".L_REG_16."\"をクリックすると、<br />アバターの保存ができます。");
define("L_SEL_NEW_AV", "新しいアバターの選択");
define("L_EX_AV", "例");
define("L_URL_AV", "URL：");
define("L_EXPL_AV", "（URLを入力してEnterキーを押すと閲覧できます）");
define("L_CANCEL", "取消");
define("L_AVA_REG", "アバターアイコンの変更には\\nユーザ登録が必要です");
define("L_SEL_NEW_AV_CONFIRM", "このフォームは送信されていません。\\nこのままアバターを見に行けば\\これまでの変更内容が全て失われます！\\n\\n本当にいいですか？");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "ヒント：この部屋ではロボットが利用できます。会話の開始：<b>hello ".C_BOT_NAME."</b>。会話の終了：<b>bye ".C_BOT_NAME."</b>。（PMの送信：/to <b>".C_BOT_NAME."</b> 送信内容)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "ヒント：ロボットは%sのみ利用可能です。会話は全てPMです。ロボット名をクリックしてください。（コマンドの場合：/wisp <b>".C_BOT_NAME."</b> 送信内容）"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "ヒント：ロボットは公に活動していません。会話は全てPMです。ロボット名をクリックしてください。（コマンドの場合：/to <b>".C_BOT_NAME."</b> 送信内容 または /wisp <b>".C_BOT_NAME."</b> 送信内容）"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "ロボットはこの部屋で起動していません！");
define("BOT_START_ERROR", "ロボットはこの部屋で既に起動中です！");
define("BOT_DISABLED_ERROR", "ロボットは管理パネルで無効になっています！");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "はサイコロを振った。結果は：");
define("DICE_WRONG", "振りたいサイコロの数を選んでください\\n（数値は1から".MAX_ROLLS."までの中から選択します）。\\n全".MAX_ROLLS."個のサイコロを振るには、/diceとだけタイプします。");
define("DICE2_WRONG", "2番目の数値は1から".MAX_ROLLS."の間でなければなりません。\\n数値を指定しなければ、全".MAX_ROLLS."個のサイコロを振ります\\n(例：/".MAX_DICES."d または /".MAX_DICES."d".MAX_ROLLS."）。");
define("DICE2_WRONG1", "最初の数値は1から".MAX_DICES."の間でなければなりません。\\n（例：/".MAX_DICES."d または /".MAX_DICES."d".MAX_ROLLS."）。");
define("DICE3_WRONG", "最初の（d）の値は1から100の間でなければなりません。\\n2番目の（t）の値は1から".MAX_ROLLS."の間でなければなりません。\\n数値を空にすると、全".MAX_ROLLS."個のサイコロを使います\\n（例：/d50 または /d100t".MAX_ROLLS."）。");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "PMをポップアップする");
define("L_REG_POPUP_NOTE", "ポップアップブロッカーを無効にしてください！");
define("L_PRIV_POST_MSG", "PMを送る！");
define("L_PRIV_MSG", "新しいPMが届きました！");
define("L_PRIV_MSGS", "%s件の新しいPMが届きました！");
define("L_PRIV_MSGSa", "最初の10件を表示します！<br />残りはリンクボタンをクリックしてください。");
define("L_PRIV_MSG1", "発言者：");
define("L_PRIV_MSG2", "部屋：");
define("L_PRIV_MSG3", "相手：");
define("L_PRIV_MSG4", "発言内容：");
define("L_PRIV_MSG5", "記録日：");
define("L_PRIV_REPLY", "返信");
define("L_PRIV_READ", "全てを既読にするには、「".L_REG_25."」ボタンを押してください！");
define("L_PRIV_POPUP", "ポップアップ機能は、いつでも無効／有効にできます。<br />次のファイルを編集してください："); //profile
define("L_PRIV_POPUP1", "プロファイル</a>（登録ユーザのみ）");
define("L_NOT_ONLINE", "%sは現在オンラインしていません。");
define("L_PRIV_NOT_ONLINE", "%sは現在オンラインしていませんが、\\nあなたのメッセージはログイン時に受け取ります。");
define("L_PRIV_NOT_INROOM", "%sはこの部屋にいません。\\nそれでもPMを送りたい場合は、\\n次のコマンドを使ってください」/wisp %s 送りたい内容");
define("L_PRIV_AWAY", "%sは離席中ですが、\\n戻り次第あなたのメッセージを受け取ります。");
define("PM_DISABLED_ERROR", "内緒（PM送信）機能\\nはこのチャットでは無効になっています。");
define("L_NEXT_PAGE", "次ページへ");
define("L_NEXT_READ", "次の%s件を読む"); // message / 10 messages
define("L_ROOM_ALL", "全室");
define("L_PRIV_NO_MSGS", "PMはありません");
define("L_PRIV_READ_MSG", "１件のPMがあります"); //singular
define("L_PRIV_READ_MSGS", "%s件のPMがあります"); //plural
define("L_PRIV_MSGS_NEW", "新規");
define("L_PRIV_MSGS_READ", "既読");
define("L_PRIV_MSG6", "状態：");
define("L_PRIV_RELOAD", "ページ更新");
define("L_PRIV_MARK_ALL", "全て既読にする");
define("L_PRIV_MARK_SEL", "選択したものを既読にする");
define("L_PRIV_REMOVE", "選択したものを削除する");
define("L_PRIV_PM", "(内緒)");
define("L_PRIV_WISP", "(内緒話)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "有効");
define("L_DISABLED", "無効");
define("L_COLOR_HEAD_SETTINGS", "このサーバの現在の設定：");
define("L_COLOR_HEAD_SETTINGSa", "デフォルトカラー：");
define("L_COLOR_HEAD_SETTINGSb", "デフォルトカラー：");
define("L_COL_HELP_TITLE", "カラーピッカー");
define("L_COL_HELP_SUB1", "使用法：");
define("L_COL_HELP_P1", "プロファイルの編集でデフォルト色が選択できます（ユーザ名と同色）。別の色に変更することは可能です。変更後に設定したデフォルト色へ戻すには、デフォルト色（なし）を一回選択します－デフォルト色は選択リストの一番最初にあります");
define("L_COL_HELP_SUB2", "ヒント：");
define("L_COL_HELP_P2", "<u>色の範囲</u><br />ご使用のブラウザやOSの能力により、一部の色がレンダリングされないことがあります。W3C HTML 4.0規格でサポートされているのは16色です：");
define("L_COL_HELP_P2a", "もしも相手からあなたの色が見えないと言われたら、相手が古いブラウザを使っている可能性があります。");
define("L_COL_HELP_SUB3", "このチャットで定義されている設定：");
define("L_COL_HELP_P3", "<u>権限に基づく色の使用</u>：<br />１）管理者はどの色も自由に使えます。<br />管理者のデフォルト色は<SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>です。<br />２）モデレータは<SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>と<SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>を除いた色なら自由に使うことができます。<br />モデレータのデフォルト色は<SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>です。<br />３）その他のユーザは<SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>、<SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>、<SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>、<SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>以外の色を使うことができます。");
define("L_COL_HELP_P3a", "デフォルト色は<u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>です。<br /><br /><u>技術的ヒント</u>：これらの色は管理者が管理パネルで定義したものです。<br />デフォルト色が変になっていたり気に入らないことがあった場合は、まず最初に<b>管理者</b>に問い合わせてください。同室にいる他のユーザに文句を言っても意味がありません：－)");
define("L_COL_HELP_USER_STATUS", "あなたの状態");
define("L_COL_TUT", "チャットで色付きテキストを使う");
define("L_NULL", "なし");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "部屋の色");
define("L_PRO_COLOR", "プロファイルの色");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "".COLOR_CA."という色は管理者専用です！\\n\\nテキスト色を".COLOR_CM."にリセットしました！\\n\\n他の色を選択してください。");
define("COL_ERROR_BOX_USRA", "".COLOR_CA."という色は管理者専用です！\\n\\n".COLOR_CA."、".COLOR_CA1."、".COLOR_CM."、".COLOR_CM1."は使用しないでください。\\n\\nこれらの色はパワーユーザ専用です！\\n\\nテキスト色を".COLOR_CD."にリセットしました！\\n\\n他の色を選択してください。");
define("COL_ERROR_BOX_USRM", "".COLOR_CM."という色はモデレータ専用です！\\n\\n".COLOR_CA."、".COLOR_CA1."、".COLOR_CM."、".COLOR_CM1."は使用しないでください。\\n\\nこれらの色はパワーユーザ専用です！\\n\\nテキスト色を".COLOR_CD."にリセットしました！\\n\\n他の色を選択してください。");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "チャットへようこそ。マナーを守って礼儀正しく：<I>全ての人が楽しく心地よいひと時を過ごせますように</I>。");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "サーバの設定が変更されました。新しい設定を反映させるため、ブラウザをリロード（F5キーを押すか、チャットに入りなおす）してください。");

//Size command error by Ciprian
define("L_ERR_SIZE", "フォントサイズの設定は、\\n空白（リセット用）または7から15までの間のみ有効です。");

// Password reset form by Ciprian
define("L_PASS_0", "パスワードリセットフォーム");
define("L_PASS_1", "秘密の質問");
define("L_PASS_2", "最初に買った車は？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "最初に飼ったペットの名前は？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "好きな飲み物は？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "誕生日は？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "秘密の答え");
define("L_PASS_7", "パスワードのリセット");
define("L_PASS_8", "パスワードをリセットしました。");
define("L_PASS_9", "新しいパスワード");
define("L_PASS_10", "新しいパスワード: %s");
define("L_PASS_11", "おかえりなさい！");
define("L_PASS_12", "質問を選んでください...");
define("L_ERR_PASS_1", "ユーザ名が違います。もう一度お試しください。");
define("L_ERR_PASS_2", "E-mailが違います。もう一度お試しください。");
define("L_ERR_PASS_3", "秘密の質問が違います。<br />下に表示された質問に答えてください！");
define("L_ERR_PASS_4", "秘密の答えが違います。もう一度お試しください！");
define("L_ERR_PASS_5", "個人／秘密のデータを設定していません。");
define("L_ERR_PASS_6", "個人／秘密のデータを設定していません。<br />このフォームは利用できません。管理者に連絡してください！");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%sが管理者になりました。");
define("L_ADM_4", "%sはもはや管理者ではありません。");

// Open Schedule by Ciprian
define("L_DAILY", "毎日");
define("L_ALWAYS", "必ず");
define("L_OPEN", "オープン");
define("L_CLOSED", "クローズ");
define("L_OPEN_PUB", "公開する");
define("L_CLOSED_PUB", "非公開にする");

// Links popup page by Alex
define("L_LINKS_1", "貼り付けられたリンク");
define("L_LINKS_2", "貼り付けられたリンクへアクセスできます");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "ここをクリックして%s%s");
define("L_CLICK", "ここをクリックして%s");
define("L_LINKS_3", "リンクを開く");
define("L_LINKS_4", "作者のサイトを開く");
define("L_LINKS_5", "このスマイリーを挿入する");
define("L_LINKS_6", "次の人に連絡する");
define("L_LINKS_7", "phpMyChatのホームページを訪問する");
define("L_LINKS_8", "phpMyChatのグループに参加する");
define("L_LINKS_9", "フィードバックを送信する");
define("L_LINKS_10", "phpMyChat-Plusをダウンロードする");
define("L_LINKS_11", "チャット中の人を確認する");
define("L_LINKS_12", "チャットのログインページを開く");
define("L_LINKS_13", "このサウンドを送信する"); // can also be translated as "to play this sound"
define("L_LINKS_14", "このコマンドを使う");
define("L_LINKS_15", "開く");
define("L_LINKS_16", "スマイリーギャラリー");
define("L_LINKS_17", "昇順にする");
define("L_LINKS_18", "降順にする");
define("L_LINKS_19", "Gravatarを設定／修正する");
define("L_LINKS_20", "掲示式"); //Click here to open Posted Equations
define("L_SWITCH", "次の言語に切り替える:%s"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "現設定"); // E.g. "French - selected" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "未選択");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "メールする");
define("L_FULLSIZE_PIC", "実寸大の画像を開く");
define("L_PRIVACY", "プライベートポリシーを読む");
define("L_AUTHOR", "作者"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "このチャットの開発者"); //same here
define("L_OWNER", "このチャットの所有者"); //same here
define("L_TRANSLATOR", "翻訳者"); //same here

// Counter on login
define("L_VISITOR_REPORT", "...開設日（%s）からの訪問者数");

// Status bar messages
define("L_JOIN_ROOM", "この部屋に参加する");
define("L_USE_NAME", "このユーザ名を使用する");
define("L_USE_NAME1", "このユーザ名に話しかける");
define("L_WHSP", "内緒話");
define("L_SEND_WHSP", "内緒話");
define("L_SEND_PM_1", "PMを送る");
define("L_SEND_PM_2", "PMを送る");
define("L_HIGHLIGHT", "ハイライトする／しない");
define("L_HIGHLIGHT_SB", "このユーザの発言をハイライトする／しない");

//Lurking frame popup
define("L_LURKING_2", "ROMページ");
define("L_LURKING_3", "がROMしています");
define("L_LURKING_4", "参加した日：");
define("L_LURKING_5", "不明");

// Extra options by Ciprian
define("L_EXTRA_OPT", "その他オプション");
define("L_ARCHIVE", "アーカイブを開く");
define("L_SOUNDFIX_IE_1", "IE用サウンドフィックス");
define("L_SOUNDFIX_IE_2", "IE用サウンドフィックスのダウンロード");
define("L_LURKING_1", "ROMページを開く");
define("L_REG_BRB", "すぐ戻ります（最初に登録が必要です）");
define("L_DEL_BYE", "待たなくていいです...");
define("L_EXTRA_PRIV1", "PMを読む");
define("L_EXTRA_PRIV2", "新しいPM");

// Months Long Names
define("L_JAN", "1月");
define("L_FEB", "2月");
define("L_MAR", "3月");
define("L_APR", "4月");
define("L_MAY", "5月");
define("L_JUN", "6月");
define("L_JUL", "7月");
define("L_AUG", "8月");
define("L_SEP", "9月");
define("L_OCT", "10月");
define("L_NOV", "11月");
define("L_DEC", "12月");
// Months Short Names
define("L_S_JAN", "1月");
define("L_S_FEB", "2月");
define("L_S_MAR", "3月");
define("L_S_APR", "4月");
define("L_S_MAY", "5月");
define("L_S_JUN", "6月");
define("L_S_JUL", "7月");
define("L_S_AUG", "8月");
define("L_S_SEP", "9月");
define("L_S_OCT", "10月");
define("L_S_NOV", "11月");
define("L_S_DEC", "12月");
// Week days Long Names
define("L_MON", "月");
define("L_TUE", "火");
define("L_WED", "水");
define("L_THU", "木");
define("L_FRI", "金");
define("L_SAT", "土");
define("L_SUN", "日");
// Week days Short Names
define("L_S_MON", "月");
define("L_S_TUE", "火");
define("L_S_WED", "水");
define("L_S_THU", "木");
define("L_S_FRI", "金");
define("L_S_SAT", "土");
define("L_S_SUN", "日");

// Localized date format - read the parameters here: http://www.php.net/manual/en/function.strftime.php
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "jpn.utf8", "jpn.UTF-8", "japanese.UTF-8", "japanese", "ja_JP.UTF-8");
} else {
setlocale(LC_ALL, "ja_JP.utf8", "ja_JP.UTF-8", "ja_JP", "ja", "japanese", "jpn");
}
define("L_LANG", "ja_JP");
// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "0");
define("L_CAL_FORMAT", "%Y年%B%d日"); // Calendar format
define("ISO_DEFAULT", "iso-20220-jp");
define("WIN_DEFAULT", "utf-8");
if (stristr(PHP_OS,'win'))
{
define("L_SHORT_DATE", "%Y年 %#m月 %#d日 "); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%Y年 %#m月 %#d日 &nbsp;%H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%Y年 %#m月 %#d日 "); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%Y年 %#m月 %#d日 &nbsp;%H:%M:%S"); //Change this to your local desired format (keep the long form)
}
else
{
define("L_SHORT_DATE", "%Y年%-m月%-d日"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%Y年%-m月%-d日 %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%Y年%-m月%- (%A)"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%Y年%-m月%-d日 (%A) %H:%M:%S"); //Change this to your local desired format (keep the long form)
}

if(!defined("L_DAY")) define("L_DAY", "日");
if(!defined("L_MONTH")) define("L_MONTH", "月");
if(!defined("L_YEAR")) define("L_YEAR", "年");

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","人のユーザが".LOGIN_LINK."チャット中</A>です。");
define("USERS_LOGIN","1人のユーザが".LOGIN_LINK."チャット中</A>です。");
define("NO_USER","0人のユーザが".LOGIN_LINK."チャット中</A> です。");
define("L_PRIV_REPLY_LOGIN", "上に表示された未読PMに".LOGIN_LINK."返信</A>したいときは、チャットにログインしてください");

// Language names
define("L_LANG_AR", "アルゼンチンのスペイン語");
define("L_LANG_BG", "ブルガリア語－キリル文字");
define("L_LANG_BR", "ブラジルポルトガル語");
define("L_LANG_CZ", "チェック後");
define("L_LANG_DA", "デンマーク語");
define("L_LANG_DE", "ドイツ語");
define("L_LANG_EN", "英語"); // for admin panel only
define("L_LANG_ENUK", "イギリス英語"); // for UK formats and flags
define("L_LANG_ENUS", "アメリカ英語"); // for US formats and flags
define("L_LANG_ES", "スペイン語");
define("L_LANG_FA", "ペルシャ語（現代ペルシャ語）");
define("L_LANG_FR", "フランス語");
define("L_LANG_GR", "ギリシャ語");
define("L_LANG_HE", "ヘブライ語");
define("L_LANG_HI", "ヒンディー語");
define("L_LANG_HU", "ハンガリー語");
define("L_LANG_ID", "インドネシア語");
define("L_LANG_IT", "イタリア語");
define("L_LANG_JA", "日本語");
define("L_LANG_KA", "グルジア語");
define("L_LANG_NE", "ネパール語");
define("L_LANG_NL", "オランダ語");
define("L_LANG_RO", "ルーマニア語");
define("L_LANG_SK", "スロバキア語");
define("L_LANG_SRC", "セルビア語－キリル文字");
define("L_LANG_SRL", "セルビア語－ラテン文字");
define("L_LANG_SV", "スウェーデン語");
define("L_LANG_TR", "トルコ語");
define("L_LANG_UR", "ウルドゥー語");
define("L_LANG_VI", "ベトナム語");

// Skins preview page
define("L_SKINS_TITLE", "スキンのプレビュー");
define("L_SKINS_TITLE1", "スキン%sから%sまでのプレビュー"); // Skins 1 to 4 preview
define("L_SKINS_AV", "利用可能なスキン");
define("L_SKINS_NONAV", "「skins」フォルダでスタイルが定義されていません");
define("L_SKINS_COPY", "&copy;%s スキン作：%s");

// Swap image titles by Ciprian
define("L_GEN_ICON", "性別アイコン");

// Ghost mode by Ciprian
define("L_GHOST", "ゴースト");
define("L_SUPER_GHOST", "スーパーゴースト");
define("L_NO_GHOST", "可視");

// Sorting options by Ciprian
define("L_ASC", "昇順");
define("L_DESC", "降順");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "利用回数");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "Gravatarを使う");

// Uploader mod by Ciprian
define("L_UPLOAD", "%sのアップロード");
define("L_UPLOAD_IMG", "画像ファイル");
define("L_UPLOAD_SND", "音声ファイル");
define("L_UPLOAD_FLS", "ファイル");
define("L_UPLOAD_SUCCESS", "%sを%sとしてアップロードしました。");
define("L_FILES_TITLE", "アップロード管理");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "限定");
define("L_RESTRICTED_ROM", "%sをこの部屋から制限しました。");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "OpenIDでサインイン");
define("L_OPID_REG", "OpenIDのプロファイルをインポート");

// Support buttons
define("L_SUPP_WARN", "開発者に寄付することで、".APP_NAME."\\nの開発に貢献する選択をしました。\\nご支援に感謝します！\\n\\n注意：寄付する相手はこのチャットの所有者ではありません。\\n寄付金額を次のページで入力してください。\\n\\n続けますか？");
define("L_SUPP_ALT", "PayPalを使って".APP_NAME."の開発を支援する－迅速、自由、かつ安全！");

// Video & Audio & Youtube cmds (Embevi & YouTube player class)
define("L_AUDIO", "音声ファイルの投稿者：");
define("L_VIDEO", "ビデオの投稿者：");
define("L_HELP_VIDEO", "投稿するビデオまたは音声ファイルまでのフルパス");
define("L_NO_VIDEO", "URLを埋め込めません。\\n公開可能な動画や音声ファイルの正しいURLではありません。\\nもう一度お試しください！");
define("L_ORIG_VIDEO", "オリジナルのサイトを開く"); //Click here to open...

// Birthday mod - by Ciprian
define("L_PRO_7", "誕生日");
define("L_PRO_8", "誕生日を公開する");
define("L_PRO_9", "年齢を公開する");
define("L_PRO_10", "年齢");
define("L_PRO_11", "%1\$d年%2\$dヶ月と%3\$d日");
define("L_DOB_TIT_1", "誕生日リスト"); // The list of birthdays in descending order
$L_DOB_SUBJ = "%sさん、お誕生日おめでとう！"; // Firstname (if set) or Username

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "式");
define("L_MATH", "投稿者%s: %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>