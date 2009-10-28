<?php
// +------------------------------------------------------------------------+
// | class.upload.ro_RO.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Cristian Datculescu 2007 & Ciprian Murariu 2008. All rights reserved.           |
// | Version       0.28                                                     |
// | Email         cristian.datculescu@gmail.com                            |
// | Last modified 25/09/2009                                               |
// | Email         ciprianmp@yahoo.com                            |
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
 * Class upload romanian translation
 *
 * @version   0.28
 * @author Cristian Datculescu (cristian.datculescu@gmail.com) - v.0.25
 * @updater Ciprian Murariu (siprianmp@yahoo.com) - added utf-8 & diacritics support
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Cristian Datculescu & Ciprian Murariu
 * @package cmf
 * @subpackage external
 */

    $translation = array();
    $translation['file_error']                  = 'Eroare de fişier. Reîncercaţi!';
    $translation['local_file_missing']          = 'Fişierul local nu există.';
    $translation['local_file_not_readable']     = 'Fişierul local nu poate fi citit.';
    $translation['uploaded_too_big_ini']        = 'Eroare upload fişier (mărimea fişierului încărcat depăşeşte %s - valoarea directivei upload_max_filesize din php.ini).';
    $translation['uploaded_too_big_html']       = 'Eroare upload fişier (mărimea fişierului încărcat depăşeşte %s - valoarea limitei MAX_FILE_SIZE stabilită pentru upload).';
    $translation['uploaded_partial']            = 'Eroare upload fişier (fişierul încărcat a fost uploadat doar parţial).';
    $translation['uploaded_missing']            = 'Eroare upload fişier (niciun fişier nu a fost specificat).';
    $translation['uploaded_no_tmp_dir']         = 'Eroare upload fişier (directorul temporar nu există).';
    $translation['uploaded_cant_write']         = 'Eroare upload fişier (scrierea fişierului pe disc a eşuat).';
    $translation['uploaded_err_extension']      = 'Eroare upload fişier (extensia nu este permisa pentru upload).';
    $translation['uploaded_unknown']            = 'Eroare upload fişier (cod eroare necunoscut).';
    $translation['try_again']                   = 'Eroare upload fişier. Reîncercaţi.';
    $translation['file_too_big']                = 'Mărimea fişierului este prea mare (%s).';
    $translation['no_mime']                     = 'Tipul MIME nu poate fi detectat.';
    $translation['incorrect_file']              = 'Tipul fişierului este incorect.';
    $translation['image_too_wide']              = 'Imagine prea lată (<= %s).';
    $translation['image_too_narrow']            = 'Imagine prea îngustă (>= %s).';
    $translation['image_too_high']              = 'Imagine prea înaltă (<= %s).';
    $translation['image_too_short']             = 'Imagine prea scurtă (>= %s).';
    $translation['ratio_too_high']              = 'Raţia imaginii prea ridicată (imagine prea lată) (<= %s).';
    $translation['ratio_too_low']               = 'Raţia imaginii prea joasă (imagine prea înaltă) (>= %s).';
    $translation['too_many_pixels']             = 'Imaginea are prea mulţi pixeli (<= %s).';
    $translation['not_enough_pixels']           = 'Imaginea nu are destui pixeli (>= %s).';
    $translation['file_not_uploaded']           = 'Fişier neuploadat. Nu se poate executa un proces.';
    $translation['already_exists']              = '%s există deja. Schimbaţi numele fişierului.';
    $translation['temp_file_missing']           = 'Fişierul sursă temporar incorect. Operaţiune eşuată.';
    $translation['source_missing']              = 'Fişierul sursă uploadat incorect. Operaţiune eşuată.';
    $translation['destination_dir']             = 'Directorul destinaţie nu poate fi creat. Operaţiune eşuată.';
    $translation['destination_dir_missing']     = 'Directorul destinaţie nu există. Operaţiune eşuată.';
    $translation['destination_path_not_dir']    = 'Calea pentru destinaţie nu este un director. Operaţiune eşuată.';
    $translation['destination_dir_write']       = 'Nu se poate scrie în directorul destinaţie. Operaţiune eşuată.';
    $translation['destination_path_write']      = 'Calea pentru destinaţie nu permite scrierea. Operaţiune eşuată.';
    $translation['temp_file']                   = 'Nu poate fi creat fişierul temporar. Operaţiune eşuată.';
    $translation['source_not_readable']         = 'Fişierul sursă nu este poate fi citit. Operaţiune eşuată.';
    $translation['no_create_support']           = 'Serverul nu suportă crearea din %s.';
    $translation['create_error']                = 'Eroare la crearea imaginii %s din sursă.';
    $translation['source_invalid']              = 'Nu se poate citi sursa imaginii. Nu este o imagine?';
    $translation['gd_missing']                  = 'GD nu este prezent sau nu este activat.';
    $translation['watermark_no_create_support'] = 'Serverul nu suportă crearea %s, nu se poate citi filigran-ul.';
    $translation['watermark_create_error']      = 'Serverul nu suportă citirea din %s, nu se poate crea filigran-ul.';
    $translation['watermark_invalid']           = 'Format de imagine necunoscut, nu se poate crea filigran-ul.';
    $translation['file_create']                 = 'Serverul nu suportă crearea %s.';
    $translation['no_conversion_type']          = 'Nu este definit niciun tip de conversie.';
    $translation['copy_failed']                 = 'Eroare la copierea fişierului pe server. copy() nereuşit.';
    $translation['reading_failed']              = 'Eroare la citirea fişierului.';

?>