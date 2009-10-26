<?php
// +------------------------------------------------------------------------+
// | class.upload.tr_TR.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Volkan Övün. All rights reserved.                        |
// | Version       0.28                                                     |
// | Last modified 26/10/2009                                               |
// | Email         vovun@hotmail.com                                              |
// |                                                                        |
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
 * Class upload turkish translation
 *
 * @version   0.28
 * @author    Volkan Övün (vovun@hotmail.com)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Volkan Övün
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'Dosya hatasý. Lütfen tekrar deneyin.';
    $translation['local_file_missing']          = 'Yerel dosya mevcut deđil.';
    $translation['local_file_not_readable']     = 'Yerel dosya okunamýyor.';
    $translation['uploaded_too_big_ini']        = 'Dosya yükleme hatasý (yüklenen dosya, server üzerindeki php.ini ayarlarýnda belirtilen %s boyutunu aţýyor).';
    $translation['uploaded_too_big_html']       = 'Dosya yükleme hatasý (yüklenen dosya, yükleme formunda belirtilen %s boyutunu aţýyor).';
    $translation['uploaded_partial']            = 'Dosya yükleme hatasý (dosyanýn sadece bir bölümü yüklenebildi).';
    $translation['uploaded_missing']            = 'Dosya yükleme hatasý (yüklenecek dosya belirtilmedi).';
    $translation['uploaded_no_tmp_dir']         = 'Dosya yükleme hatasý (geçici klasör bulunamıyor).';
	$translation['uploaded_cant_write']         = 'Dosya yükleme hatasý (dosyanın diske yazılımı başarısız oldu).';
	$translation['uploaded_err_extension']      = 'Dosya yükleme hatasý (dosya yüklenmesi uzantı tarafından durduruldu.).';    
	$translation['uploaded_unknown']            = 'Dosya yükleme hatasý (tanýmlanamayan hata kodu).';
    $translation['try_again']                   = 'Dosya yükleme hatasý. Lütfen tekrar deneyin.';
    $translation['file_too_big']                = 'Dosya çok büyük (%s).';
    $translation['no_mime']                     = 'MIME tipi belirlenemedi.';
    $translation['incorrect_file']              = 'Yanlýţ dosya tipi.';
    $translation['image_too_wide']              = 'Resim çok geniţ (<= %s).';
    $translation['image_too_narrow']            = 'Resim çok dar (>= %s).';
    $translation['image_too_high']              = 'Resim yüksekliđi çok fazla (<= %s).';
    $translation['image_too_short']             = 'Resim yüksekliđi çok az (>= %s).';
    $translation['ratio_too_high']              = 'Resim oranlamasý çok yüksek (resim çok geniţ) (<= %s).';
    $translation['ratio_too_low']               = 'Resim oranlamasý çok düţük (resim yüksekliđi çok fazla) (>= %s).';
    $translation['too_many_pixels']             = 'Resim piksel sayýsý çok fazla (<= %s).';
    $translation['not_enough_pixels']           = 'Resim piksel sayýsý yetersiz. (>= %s).';
    $translation['file_not_uploaded']           = 'Dosya yüklenmedi. Ýţleme devam edilemeyecek.';
    $translation['already_exists']              = '%s zaten var. Lütfen dosya adýný deđiţtirin.';
    $translation['temp_file_missing']           = 'Geçersiz kaynak dosya. Ýţleme devam edilemeyecek.';
    $translation['source_missing']              = 'Geçersiz hedef dosya. Ýţleme devam edilemeyecek.';
    $translation['destination_dir']             = 'Hedef klasör oluţturulamýyor. Ýţleme devam edilemeyecek.';
    $translation['destination_dir_missing']     = 'Hedef klasör mevcut deđil. Ýţleme devam edilemeyecek.';
    $translation['destination_path_not_dir']    = 'Hedef yol, geçerli bir klasör deđil. Ýţleme devam edilemeyecek.';
    $translation['destination_dir_write']       = 'Hedef klasör yazýlabilir hale getirilemiyor. Ýţleme devam edilemeyecek.';
    $translation['destination_path_write']      = 'Hedef yol yazým korumalý. Ýţleme devam edilemeyecek.';
    $translation['temp_file']                   = 'Geçici dosya oluţturulamýyor. Ýţleme devam edilemeyecek.';
    $translation['source_not_readable']         = 'Kaynak dosya okunamýyor. Ýţleme devam edilemeyecek.';
    $translation['no_create_support']           = '%s den oluţturma desteklenmiyor.';
    $translation['create_error']                = 'Kaynaktaki %s resminin oluţturulmasýnda hata.';
    $translation['source_invalid']              = 'Kaynak resim okunamýyor. Bu bir resim deđil mi?';
    $translation['gd_missing']                  = 'GD güncel deđil.';
    $translation['watermark_no_create_support'] = '%s den oluţturma desteklenmiyor, tanýmlayýcý okunamýyor.';
    $translation['watermark_create_error']      = '%s okuma desteklenmiyor, tanýmlayýcý oluţturulamýyor.';
    $translation['watermark_invalid']           = 'Tanýmlanamayan resim formatý, tanýmlayýcý okunamýyor.';
    $translation['file_create']                 = '%s oluţturma desteklenmiyor.';
    $translation['no_conversion_type']          = 'Dönüţüm tipi tanýmlanmadý.';
    $translation['copy_failed']                 = 'Sunucuya kopyalama sýrasýnda hata oluţtu. copy() komutu gerçekleţtirilemedi.';
    $translation['reading_failed']              = 'Dosya okuma hatasý.';

?>