<?php
// +------------------------------------------------------------------------+
// | class.upload.ru_RU.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Viktor 2010. All rights reserved.                        |
// | Version       0.28                                                     |
// | Last modified 19/12/2010                                               |
// | Email         vikt81@mail.ru                                              |
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
 * Class upload Russian translation
 *
 * @version   0.28
 * @author    Viktor (vikt81@mail.ru)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Free to change
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'Ошибка. Попробуйте снова.';
    $translation['local_file_missing']          = 'Локальный файл не найден.';
    $translation['local_file_not_readable']     = 'Локальный файл не читается.';
    $translation['uploaded_too_big_ini']        = 'Ошибка загрузки файла (загружаемый файл превышает %s - upload_max_filesize назначено в php.ini).';
    $translation['uploaded_too_big_html']       = 'Ошибка загрузки файла (загружаемый файл превышает %s - MAX_FILE_SIZE предел указанного файл в форме загрузки).';
    $translation['uploaded_partial']            = 'Ошибка загрузки файла (загружаемый файл был загружено только частично).';
    $translation['uploaded_missing']            = 'Ошибка загрузки файла (файл не был загружен).';
    $translation['uploaded_no_tmp_dir']         = 'Ошибка загрузки файла (не найдена временная папка).';
    $translation['uploaded_cant_write']         = 'Ошибка загрузки файла (не удалось записать файл на диск).';
    $translation['uploaded_err_extension']      = 'Ошибка загрузки файла (расширение не допускается для загрузки).';
    $translation['uploaded_unknown']            = 'Ошибка загрузки файла (неизвестный код ошибки).';
    $translation['try_again']                   = 'Ошибка загрузки файла. Попробуйте снова.';
    $translation['file_too_big']                = 'Файл слишком большой (%s).';
    $translation['no_mime']                     = 'MIME тип не найден.';
    $translation['incorrect_file']              = 'Неправильный тип файла.';
    $translation['image_too_wide']              = 'Изображение слишком широкое (<= %s).';
    $translation['image_too_narrow']            = 'Изображение слишком узкое (>= %s).';
    $translation['image_too_high']              = 'Изображение слишком высокое (<= %s).';
    $translation['image_too_short']             = 'Изображение слишком низкое (>= %s).';
    $translation['ratio_too_high']              = 'Соотношение изображения слишком велико (изображение слишком широкое) (<= %s).';
    $translation['ratio_too_low']               = 'Соотношение изображения слишком мало (изображение слишком узкое) (>= %s).';
    $translation['too_many_pixels']             = 'Изображение имеет слишком много пикселей (<= %s).';
    $translation['not_enough_pixels']           = 'Изображение имеет недостаточное количество пикселей (>= %s).';
    $translation['file_not_uploaded']           = 'Файл незагружен. Можно не продолжать процесс.';
    $translation['already_exists']              = '%s уже существует. Измените имя файла.';
    $translation['temp_file_missing']           = 'Неправильный временный файл. Можно не продолжать процесс.';
    $translation['source_missing']              = 'Неправильный загружаемый файл. Можно не продолжать процесс.';
    $translation['destination_dir']             = 'Директория назначения не может быть создана. Можно не продолжать процесс.';
    $translation['destination_dir_missing']     = 'Директория назначения не существует. Можно не продолжать процесс.';
    $translation['destination_path_not_dir']    = 'Путь назначения не является директорией. Можно не продолжать процесс.';
    $translation['destination_dir_write']       = 'Директория назначения не записываемая. Можно не продолжать процесс.';
    $translation['destination_path_write']      = 'Путь назначения не записываемый. Можно не продолжать процесс.';
    $translation['temp_file']                   = 'Невозможно создать временный файл. Можно не продолжать процесс.';
    $translation['source_not_readable']         = 'Исходный файл не читается. Можно не продолжать процесс.';
    $translation['no_create_support']           = 'Не создана из %s поддержка.';
    $translation['create_error']                = 'Ошибка при создании %s изображения из источника.';
    $translation['source_invalid']              = 'Не могу прочитать изображение. Это точно изображение?';
    $translation['gd_missing']                  = 'Похоже, что поддержка GD отсутствует.';
    $translation['watermark_no_create_support'] = 'Не создано из %s нет поддержки чтения водных знаков.';
    $translation['watermark_create_error']      = 'Нет %s поддержки чтения, не могу создать водный знак.';
    $translation['watermark_invalid']           = 'Неизвестный формат изображения, не могу прочитать водный знак.';
    $translation['file_create']                 = 'Нет %s созданной поддержки.';
    $translation['no_conversion_type']          = 'Нет преобразования определенного типа.';
    $translation['copy_failed']                 = 'Ошибка копирования файла на сервере. copy() не удалось.';
    $translation['reading_failed']              = 'Ошибка чтения файла.';   

?>