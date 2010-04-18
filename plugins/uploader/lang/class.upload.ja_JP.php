<?php
// +------------------------------------------------------------------------+
// | class.upload.ja_JP.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Dendeke 2010. All rights reserved.	|
// | Version       0.28					|
// | Last modified 09/04/2010                                               |
// | Email         konchakka211@yahoo.co.jp                       |
// | Web           						|
// +------------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify   |
// | it under the terms of the GNU General Public License version 2 as      |
// | published by the Free Software Foundation.                             |
// |                                                                        |
// | This program is distributed in the hope that it will be useful,        |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of         |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the          |
// | GNU General Public License for more details.                           |
// |                                                                        |
// | You should have received a copy of the GNU General Public License      |
// | along with this program; if not, write to the                          |
// |   Free Software Foundation, Inc., 59 Temple Place, Suite 330,          |
// |   Boston, MA 02111-1307 USA                                            |
// |                                                                        |
// | Please give credit on sites that use class.upload and submit changes   |
// | of the script so other people can use them as well.                    |
// | This script is free to use, don't abuse.                               |
// +------------------------------------------------------------------------+

/**
 * Class upload Japanese translation
 *
 * @version   0.28
 * @author    Dendeke (konchakka211@yahoo.co.jp)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Dendeke
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'ファイルエラー。もう一度お試しください。';
    $translation['local_file_missing']          = 'ローカルファイルが存在しません。';
    $translation['local_file_not_readable']     = 'ローカルファイルが読めません。';
    $translation['uploaded_too_big_ini']        = 'ファイルアップロードエラー（アップロードしたファイルは%sを超えています－php.iniの「upload_max_filesize」を確認してください)。';
    $translation['uploaded_too_big_html']       = 'ファイルアップロードエラー（アップロードしたファイルは%sを超えています－アップロードフォームで設定した「MAX_FILE_SIZE」を確認してください)。';
    $translation['uploaded_partial']            = 'ファイルアップロードエラー（ファイルの一部のみアップロードされました）。';
    $translation['uploaded_missing']            = 'ファイルアップロードエラー（ファイルはアップロードされませんでした）。';
    $translation['uploaded_no_tmp_dir']         = 'ファイルアップロードエラー（一時フォルダがありません）。';
    $translation['uploaded_cant_write']         = 'ファイルアップロードエラー（ディスクへの書き込みに失敗しました）。';
    $translation['uploaded_err_extension']      = 'ファイルアップロードエラー（その拡張子はアップロードできません）。';
    $translation['uploaded_unknown']            = 'ファイルアップロードエラー（不明なエラーコード）。';
    $translation['try_again']                   = 'ファイルアップロードエラー。もう一度お試しください。';
    $translation['file_too_big']                = 'ファイルが大きすぎます（%s）。';
    $translation['no_mime']                     = 'MIMEタイプが見当たりません。';
    $translation['incorrect_file']              = 'ファイルの種類が違います。';
    $translation['image_too_wide']              = '画像の幅が広すぎます（<= %s）。';
    $translation['image_too_narrow']            = '画像の幅が狭すぎます（>= %s）。';
    $translation['image_too_high']              = '画像の高さが高すぎます（<= %s）。';
    $translation['image_too_short']             = '画像の高さが低すぎます（>= %s）。';
    $translation['ratio_too_high']              = '画像比率が高すぎます（幅が広すぎる）（<= %s）。';
    $translation['ratio_too_low']               = '画像比率が低すぎます（幅が狭すぎる）（>= %s）。';
    $translation['too_many_pixels']             = '画像のピクセル数が多すぎます（<= %s）。';
    $translation['not_enough_pixels']           = '画像のピクセル数が少なすぎます（>= %s）。';
    $translation['file_not_uploaded']           = 'ファイルがアップロードできません。処理を続行できません。';
    $translation['already_exists']              = '%sは既に存在します。ファイル名を変更してください。';
    $translation['temp_file_missing']           = '正しい一時ソースファイルが見当たりません。処理を続行できません。';
    $translation['source_missing']              = 'アップロードされた正しいソースファイルが見当たりません。処理を続行できません。';
    $translation['destination_dir']             = '対象ディレクトリは作成できません。処理を続行できません。';
    $translation['destination_dir_missing']     = '対象ディレクトリは存在しません。処理を続行できません。';
    $translation['destination_path_not_dir']    = '指定したパスはディレクトリではありません。処理を続行できません。';
    $translation['destination_dir_write']       = '対象ディレクトリを書き込み可能にできません。処理を続行できません。';
    $translation['destination_path_write']      = '指定したパスは書き込み禁止です。処理を続行できません。';
    $translation['temp_file']                   = '一時ファイルが作成できません。処理を続行できません。';
    $translation['source_not_readable']         = 'ソースファイルが読み込めません。処理を続行できません。';
    $translation['no_create_support']           = ' %sサポートからの作成ができません。';
    $translation['create_error']                = 'ソースからの%s画像作成時にエラーが発生しました。';
    $translation['source_invalid']              = '画像ソースが読めません。本当に画像ですか？';
    $translation['gd_missing']                  = 'GDサポートが存在しないようです。';
    $translation['watermark_no_create_support'] = ' %sサポートからの作成ができません。透かしが読めません。';
    $translation['watermark_create_error']      = '%sの読み込みがサポートされていません。透かしが作成できません。';
    $translation['watermark_invalid']           = '画像フォーマットが不明です。透かしが読めません。';
    $translation['file_create']                 = '%sの作成がサポートされていません。';
    $translation['no_conversion_type']          = '変換タイプが未定義です。';
    $translation['copy_failed']                 = 'サーバへファイルをコピー中にエラーが発生しました。copy()が失敗しました。';
    $translation['reading_failed']              = 'ファイルの読み込み中にエラーが発生しました。';   

?>