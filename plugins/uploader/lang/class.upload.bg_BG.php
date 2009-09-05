<?php
// +------------------------------------------------------------------------+
// | class.upload.bg_BG.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Петър Петров 2009. All rights reserved.                        |
// | Version       0.28                                                     |
// | Last modified 05/09/2009                                               |
// | Email         peter.m.petrov@gmail.com                                              |
// | Web                                                 |
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
 * Class upload Bulgarian translation
 *
 * @version   0.28
 * @author    Петър Петров (peter.m.petrov@gmail.com)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Peter Petrov
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'Файлова грешка. Опитайте отново.';
    $translation['local_file_missing']          = 'Локалният файл не съществува.';
    $translation['local_file_not_readable']     = 'Локалният файл не се чете.';
    $translation['uploaded_too_big_ini']        = 'Грешка при качване на файла (качваният файл надвишава %s - upload_max_filesize размера определен в php.ini).';
    $translation['uploaded_too_big_html']       = 'Грешка при качване на файла (качваният файл надвишава %s - MAX_FILE_SIZE ограничението, посочено във формата за качване).';
    $translation['uploaded_partial']            = 'Грешка при качване на файла (файлът е качен частично).';
    $translation['uploaded_missing']            = 'Грешка при качване на файла (файлът не е качен).';
    $translation['uploaded_no_tmp_dir']         = 'Грешка при качване на файла (липсва временна папка).';
    $translation['uploaded_cant_write']         = 'Грешка при качване на файла (неуспешен запис върху диска).';
    $translation['uploaded_err_extension']      = 'Грешка при качване на файла (качването е преустановено от разширение).';    
    $translation['uploaded_unknown']            = 'Грешка при качване на файла (непозната грешка).';
    $translation['try_again']                   = 'Грешка при качване на файла. Опитайте отново.';
    $translation['file_too_big']                = 'Файлът е твърде голям (%s).';
    $translation['no_mime']                     = 'MIME типът не може да бъде открит.';
    $translation['incorrect_file']              = 'Неправилен тип файл.';
    $translation['image_too_wide']              = 'Твърде широко изображение (<= %s).';
    $translation['image_too_narrow']            = 'Твърде тясно изображение (>= %s).';
    $translation['image_too_high']              = 'Твърде високо изображение (<= %s).';
    $translation['image_too_short']             = 'Твърде късо изображение (>= %s).';
    $translation['ratio_too_high']              = 'твърде голямо съотношение (изображението е прекалено широко) (<= %s).';
    $translation['ratio_too_low']               = 'твърде малко съотношение (изображението е прекалено тясно) (>= %s).';
    $translation['too_many_pixels']             = 'изображението има твърде много пиксели (<= %s).';
    $translation['not_enough_pixels']           = 'изображението няма достатъчно пиксели (>= %s).';
    $translation['file_not_uploaded']           = 'Файлът не е качен. Процесът не може да продължи.';
    $translation['already_exists']              = '%s вече съществува. Изберете друго име.';
    $translation['temp_file_missing']           = 'Няма коректен временен файл - източник. Процесът не може да продължи.';
    $translation['source_missing']              = 'Няма коректно качен файл - източник. Процесът не може да продължи.';
    $translation['destination_dir']             = 'Директорията на местоназначението не може да бъде създадена. Процесът не може да продължи.';
    $translation['destination_dir_missing']     = 'Директорията на местоназначението не съществува. Процесът не може да продължи.';
    $translation['destination_path_not_dir']    = 'Местоназначението не е директория. Процесът не може да продължи.';
    $translation['destination_dir_write']       = 'Директорията на дестинацията не може да стане за запис. Процесът не може да продължи.';
    $translation['destination_path_write']      = 'Невъзможно писане върху местоназначението. Процесът не може да продължи.';
    $translation['temp_file']                   = 'Не може да се създаде временен файл. Процесът не може да продължи.';
    $translation['source_not_readable']         = 'Файлът - източник не се чете. Процесът не може да продължи.';
    $translation['no_create_support']           = 'Няма създай от %s поддръжка.';
    $translation['create_error']                = 'Грешка при създаването на %s изображение от източника.';
    $translation['source_invalid']              = 'Невъзможно четене от изображението - източник. Май не е изображение?';
    $translation['gd_missing']                  = 'Май няма налична GD поддръжка.';
    $translation['watermark_no_create_support'] = 'Няма създай от %s поддръжка, не се чете водния знак.';
    $translation['watermark_create_error']      = 'Няма %s чети поддръжка, не може да създаде водния знак.';
    $translation['watermark_invalid']           = 'Непознат формат на изображението, не се чете водния знак.';
    $translation['file_create']                 = 'Няма %s създай поддръжка.';
    $translation['no_conversion_type']          = 'Недефиниран конверсационен тип.';
    $translation['copy_failed']                 = 'Грешка при копиране на файла върху сървъра. copy() се провали.';
    $translation['reading_failed']              = 'Грешка при четене на файла.';   

?>