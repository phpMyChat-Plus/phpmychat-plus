<?php
// File : japanese/localized.admin.php - plus version (01.08.2009 - rev.15)
// Original translation by Dendeke <konchakka211@yahoo.co.jp>
// Corrections by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;
$FontName = "Arial Unicode MS";

// Top frame
define("A_MENU_0", "%sの管理");
define("A_MENU_1", "登録ユーザ");	//plural
define("A_MENU_11", "登録ユーザ");		//singular
define("A_MENU_2", "接続禁止ユーザ");	//plural
define("A_MENU_21", "接続禁止ユーザ");		//singular
define("A_MENU_3", "部屋の掃除");
define("A_MENU_4", "メール送信");
define("A_MENU_5", "設定");
define("A_MENU_6", "チャット付加機能");
define("A_MENU_7", "検索");
define("A_MENU_8", "接続");
define("A_MENU_9", "ログアーカイブ");
define("A_MENU_1a", "プロファイル");
define("A_MENU_2a", "統計");
define("A_LOGOUT", "ログアウト");
define("A_MOD_DEV", "このMODは開発中です");

// Frame for registered users
define("A_SHEET1_1", "登録ユーザとその権限のリスト");
define("A_SHEET1_2", "ユーザ名");
define("A_SHEET1_3", "権限");
define("A_SHEET1_4", "モデレート対象の部屋");
define("A_SHEET1_5", "モデレート対象の部屋はスペースなしのコンマ（,）で列挙します。");
define("A_SHEET1_6", "選択したプロファイルの削除");
define("A_SHEET1_7", "変更");
define("A_SHEET1_8", "あなた以外に登録ユーザはいません。");
define("A_SHEET1_9", "選択したプロファイルを取り除く");
define("A_SHEET1_10", "「".A_MENU_2."」シートへ移動して、選択内容を再吟味してください。");
define("A_SHEET1_11", "最終接続");
define("A_SHEET1_12", "接続禁止理由（オプション）");
define("A_SHEET1_13", "許可された部屋");
define("A_SHEET1_14", "全て非制限");
define("A_SHEET1_15", "全て制限");
define("A_SHEET1_16", "指定した部屋の制限は、「".A_MENU_5."」シートでもアクティブにしなければなりません。");
define("A_USER", "ユーザ");
define("A_MODER", "モデレータ");
define("A_TOPMOD", "トップモデレータ");
define("A_ADMIN", "管理者");
define("A_PAGE_CNT", "%s／%sページ");

// Frame for banished users
define("A_SHEET2_1", "接続禁止ユーザと関係した部屋のリスト");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "関係した部屋");
define("A_SHEET2_4", "期間");
define("A_SHEET2_5", "無期");
define("A_SHEET2_6", "3部屋以下の場合は、それぞれをスペースなしのコンマ（,）で区切ります。4部屋以上の場合は、「<B>*</B>」記号で全部屋から接続禁止処分とします。");
define("A_SHEET2_7", "選択したユーザの処分を取り除く");
define("A_SHEET2_8", "接続禁止ユーザはいません。");
define("A_SHEET2_9", "理由（オプション）");

// Frame for cleaning rooms
define("A_SHEET3_1", "存在する部屋のリスト");
define("A_SHEET3_2", "「デフォルト以外」の部屋を掃除すると、<br />その部屋の全てのモデレータ権限も削除することになります。");
define("A_SHEET3_3", "選択した部屋の掃除");
define("A_SHEET3_4", "掃除できる部屋がありません。");
define("A_SHEET3_5", "何も選択をしていません。以下のリストから最低ひとつの部屋を選んでください。");

// Frame for sending mails
define("A_SHEET4_0", "「".A_MENU_5."」シートで管理者メールアドレスが設定されていません。");
define("A_SHEET4_1", "メール送信");
define("A_SHEET4_2", "宛先：");
define("A_SHEET4_3", "全選択");
define("A_SHEET4_4", "件名：");
define("A_SHEET4_5", "送信内容：");
define("A_SHEET4_6", "今すぐ送信！");
define("A_SHEET4_7", "全てのメールを送信しました。");
define("A_SHEET4_8", "メール送信中に内部エラーが発生しました。");
define("A_SHEET4_9", "宛先、件名、送信内容のいずれかがありません！");
define("A_SHEET4_10", "複数のメールアドレスは、スペースなしのコンマ（,）で列挙します");
define("A_SHEET4_11", "署名");
define("A_SHEET4_12", "全て未選択");

// Frame for configuration
define("A_SHEET5_0", "現在インストールされているバージョンは%s");
define("A_SHEET5_1", "新しいバージョン（%s）がリリースされました！");

//Chat Extras
define("A_EXTR_DSBL", "チャット付加機能の無効化") ;
define("A_REFRESH_MSG", "発言内容の更新") ;
define("A_MSG_DEL", "消") ;
define("A_POST_TIME", "記録日") ;
define("A_FROM_TO", "発言者 › 相手") ;
define("A_FROM", "発言者") ;
define("A_CHTEX_ROOM", "部屋") ;
define("A_CHTEX_MSG", "発言内容") ;

//Save chat logs
define("A_CHAT_LOGS_1", "%sに接続したIPのログ");
define("A_CHAT_LOGS_2", "チャットアーカイブを無効化しました");
define("A_CHAT_LOGS_3", "チャットIPログページを開く");
define("A_CHAT_LOGS_4", "チャットIPログファイルのリセット");
define("A_CHAT_LOGS_5", "チャットIPログファイルをアーカイブ化してリセットします！\\n");
define("A_CHAT_LOGS_6", "全チャットログ・アーカイブ");
define("A_CHAT_LOGS_7", "公開部屋のチャットアーカイブセクションの表示");
define("A_CHAT_LOGS_8", "%sフォルダに保存されている\\n全てのファイルとフォルダを削除します！\\n"); // year
define("A_CHAT_LOGS_9", "全ての%sログを削除する"); // year
define("A_CHAT_LOGS_10", "年の削除");
define("A_CHAT_LOGS_11", "%sフォルダに保存されている\\n全てのファイルを削除します！\\n"); // month/year
define("A_CHAT_LOGS_12", "（公開部屋のみ）");
define("A_CHAT_LOGS_13", "月の削除");
define("A_CHAT_LOGS_14", "%sファイルを削除します！\\n"); // day.php file
define("A_CHAT_LOGS_15", "このログの削除");
define("A_CHAT_LOGS_16", "%sログを読む"); // day month year
define("A_CHAT_LOGS_17", "公開部屋のチャットログアーカイブ");
define("A_CHAT_LOGS_18", "（公開部屋のみ）");
define("A_CHAT_LOGS_19", "\\n元に戻せません...\\n本当にいいですか？");
define("A_CHAT_LOGS_20", "全チャットアーカイブセクションの表示"); 
define("A_CHAT_LOGS_21", "トップへ行く");
define("A_CHAT_LOGS_22", "アーカイブ・ログファイル");
define("A_CHAT_LOGS_23", "作成日：%s"); // Generated on "date"
define("A_CHAT_LOGS_24", "%sの全ログをzipアーカイブにする"); // date
define("A_CHAT_LOGS_25", "%sフォルダに保存されている\\n全てのログをzipにする！\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nよろしいですか？");
define("A_CHAT_LOGS_27", "zipアーカイブ");
define("A_CHAT_LOGS_28", "%sのダウンロード");
define("A_CHAT_LOGS_29", "このzipを削除");
define("A_CHAT_LOGS_30", "IPアーカイブ"); 
define("A_CHAT_LOGS_31", "合計サイズ%s%s");
define("A_CHAT_LOGS_32", "ファイル");
define("A_CHAT_LOGS_33", "フォルダ");
define("A_CHAT_LOGS_34", "次の%sを削除しました：%s"); // sample: File (Folder) successfully deleted: bak/blabla.ph
define("A_CHAT_LOGS_35", "次の%sを作成しました：%s");
define("A_CHAT_LOGS_36", "次の%sは存在しません：%s");
define("A_CHAT_LOGS_37", "次の%sは削除できませんでした：%s");
define("A_CHAT_LOGS_38", "次の%sは作成できませんでした：%s");
define("A_CHAT_LOGS_39", "次の%sは書込み禁止です：%s");
define("A_CHAT_LOGS_40", "次のファイルの保存中にエラーが発生しました：%s"); // filename

//Admin Search Page
define("A_SEARCH_1", "チャット部屋検索ページ");
define("A_SEARCH_2", "全カテゴリ");
define("A_SEARCH_3", "名前");
define("A_SEARCH_4", "IPアドレス");
define("A_SEARCH_5", "権限");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "性別");
define("A_SEARCH_8", "説明");
define("A_SEARCH_9", "リンク");
define("A_SEARCH_10", "検索");
define("A_SEARCH_11", "権限カテゴリのオプションは<b>ad（管理者）</b>、<b>mod（モデレータ）</b>、<b>u（ユーザ）</b>です。");
define("A_SEARCH_12", "性別カテゴリのオプション：<b>0</b>（秘密）、<b>1</b>（男性）、<b>2</b>（女性）、<b>3</b>（カップル）。");
define("A_SEARCH_13", "ユーザ名");
define("A_SEARCH_14", "名");
define("A_SEARCH_15", "姓");
define("A_SEARCH_16", "国");
define("A_SEARCH_18", "権限");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "性別");
define("A_SEARCH_21", "検索語");
define("A_SEARCH_22", "検索対象");
define("A_SEARCH_23", "検索語を指定してもう一度お試しください！");
define("A_SEARCH_24", "あなたの基準にマッチするデータはありません。検索内容をもう一度吟味してください。");
define("A_SEARCH_25", "このユーザをモデレートする");

// Connected users Page
define("A_LURKING_1", "接続ユーザとROM") ;
define("A_LURKING_2", "ROMの無効化") ;

// Statistics Page
define("A_STATS_1", "チャット統計ページ");
define("A_STATS_2", "データ収集は%sから開始しました"); //date
define("A_STATS_3", "全体統計（全日）");
define("A_STATS_4", "詳細統計（最新%s日間）"); //no of days
define("A_STATS_5", "統計の無効化");
define("A_STATS_6", "トップ%s"); //Top 10 or Top 5
?>