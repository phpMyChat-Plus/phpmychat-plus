<?php
// +------------------------------------------------------------------------+
// | class.upload.sr_CS.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Vedran Vucic 2008. All rights reserved.                        |
// | Version       0.25                                                     |
// | Last modified 19/09/2008                                               |
// | Email         vedran.vucic@gnulinuxcentar.org               |
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
 * Class upload Serbian - Latin translation
 *
 * @version   0.25
 * @author    Vedran Vucic (vedran.vucic@gnulinuxcentar.org)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Vedran Vucic FDL
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'Greška u datoteci. Pokušajte ponovo.';
    $translation['local_file_missing']          = 'Lokalna datoteka ne postoji.';
    $translation['local_file_not_readable']     = 'Lokalna datoteka ne može da se čita.';
    $translation['uploaded_too_big_ini']        = 'Greška kod nadodavanja datoteke (nadodavania datoteka prelazi %s - upload_max_filesize server direktivu postavljenu u php.ini).';
    $translation['uploaded_too_big_html']       = 'Greška kod nadodavanja datoteke (nadodana datoteka prelazi %s - MAX_FILE_SIZE granicu definisanu u formularu za nadodavanje).';
    $translation['uploaded_partial']            = 'Greška kod nadodavanja datoteke (datoteka je samo delimično dodata).';
    $translation['uploaded_missing']            = 'Greška kod nadodavanja datoteke (datoteka nije dodata).';
    $translation['uploaded_unknown']            = 'Greška kod nadodavanja datoteke (nepoznata šifra za datoteku).';
    $translation['try_again']                   = 'Greška kod nadodavanja datoteke. Molimo pokušajte ponovo.';
    $translation['file_too_big']                = 'Datoteka je prevelika (%s).';
    $translation['no_mime']                     = 'MIME tip nije mogao da se detektuje.';
    $translation['incorrect_file']              = 'Neispravan tip datoteke.';
    $translation['image_too_wide']              = 'Slika je preširoka (<= %s).';
    $translation['image_too_narrow']            = 'Slika je preuska (>= %s).';
    $translation['image_too_high']              = 'Slika je previsoka (<= %s).';
    $translation['image_too_short']             = 'Slika je prekratka (>= %s).';
    $translation['ratio_too_high']              = 'Proporcije slike prevelike (slika je preširoka) (<= %s).';
    $translation['ratio_too_low']               = 'Proporcije slike su premale (slika je preuska) (>= %s).';
    $translation['too_many_pixels']             = 'Slika ima previše piksela (<= %s).';
    $translation['not_enough_pixels']           = 'Slika nema dovoljno piksela (>= %s).';
    $translation['file_not_uploaded']           = 'Datoteka nije dodata. Ne može da se izvrši proces.';
    $translation['already_exists']              = '%s već postoji. Molimo vas da promenite naziv datoteke.';
    $translation['temp_file_missing']           = 'Neispravna privremena izvorna datoteka. Ne može da se izvrši proces.';
    $translation['source_missing']              = 'Neispravna dodata izvorna datoteka. Ne može da se izvrši proces.';
    $translation['destination_dir']             = 'Odredišna fascikla ne može da se kreira. Ne može da se izvrši proces.';
    $translation['destination_dir_missing']     = 'Odredišna fascikla ne može da se kreira. Ne može da se izvrši proces.';
    $translation['destination_path_not_dir']    = 'Odredišna putanja nije fascikla. Ne može da se izvrši proces.';
    $translation['destination_dir_write']       = 'Odredišna fascikla ne može da se učini upisivom. Ne može da se izvrši proces.';
    $translation['destination_path_write']      = 'odredišna putanja nije upisiva. Ne može da se izvrši proces.';
    $translation['temp_file']                   = 'Ne može da se kreira privremena datoteka. Ne može da se izvrši proces.';
    $translation['source_not_readable']         = 'Izvorna datoteka nije čitljiva. Ne može da se izvrši proces.';
    $translation['no_create_support']           = 'Ne može da se kreira iz %s podrške.';
    $translation['create_error']                = 'Greška u kreiranju %s slike iz izvora.';
    $translation['source_invalid']              = 'Nije čitljiva izvorna slika. Nije slika?';
    $translation['gd_missing']                  = 'GD podrška izgleda da nije prisutna.';
    $translation['watermark_no_create_support'] = 'Ne može da se kreira %s podrška, ne može da se pročita vodeni žig.';
    $translation['watermark_create_error']      = 'Nema %s podrške čitanja, ne može da se kreira vodeni žig.';
    $translation['watermark_invalid']           = 'Nepoznat format slike, ne mogu da čitam vodeni žig.';
    $translation['file_create']                 = 'Bez %s kreirane podrške.';
    $translation['no_conversion_type']          = 'Nije određen tip konverzije.';
    $translation['copy_failed']                 = 'Greška u kopiranju datoteke na serveru. copy() neuspešno.';
    $translation['reading_failed']              = 'Greška u čitanju datoteke.';

?>