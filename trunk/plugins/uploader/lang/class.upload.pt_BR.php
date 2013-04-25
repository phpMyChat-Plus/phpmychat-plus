<?php
// +------------------------------------------------------------------------+
// | class.upload.pt_BR.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Marco Gelli Marchese 2012. All rights reserved.                        |
// | Version       0.28                                                     |
// | Last modified 13/11/2012                                               |
// | Email         mvmcgm@gmail.com			  |
// | Web           http://www.xxxx.xxx                                      |
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
 * Class upload Brazilian Portuguese translation
 *
 * @version   0.28
 * @author    Marco Gelli Marchese (mvmcgm@gmail.com)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Marco Gelli Marchese
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'Erro de transmissão. Favor tentar novamente.';
    $translation['local_file_missing']          = 'O arquivo local não existe.';
    $translation['local_file_not_readable']     = 'Não foi possível ler o arquivo local.';
    $translation['uploaded_too_big_ini']        = 'Erro ao carregar o arquivo (o arquivo carregado excede a diretiva upload_max_filesize em php.ini - %s).';
    $translation['uploaded_too_big_html']       = 'Erro ao carregar o arquivo (o arquivo carregado excede a diretiva MAX_FILE_SIZE especificado no formulário html - %s).';
    $translation['uploaded_partial']            = 'Erro ao carregar o arquivo (o arquivo só foi carregado parcialmente).';
    $translation['uploaded_missing']            = 'Falha ao carregar (nenhum arquivo foi carregado).';
    $translation['uploaded_no_tmp_dir']         = 'Falha ao carregar ( está faltando uma pasta temporária).';
    $translation['uploaded_cant_write']         = 'Falha ao carregar (falhou ao tentar transferir arquivo pro disco).';
    $translation['uploaded_err_extension']      = 'Falha ao carregar (tentativa de carregar uma extensão não permitida).';
    $translation['uploaded_unknown']            = 'Erro ao carregar o arquivo (código de erro desconhecido).';
    $translation['try_again']                   = 'Erro ao carregar o arquivo. Favor tentar novamente.';
    $translation['file_too_big']                = 'Arquivo muito grande (%s).';
    $translation['no_mime']                     = 'tipo MIME não detectado.';
    $translation['incorrect_file']              = 'Tipo de arquivo incorreto.';
    $translation['image_too_wide']              = 'A imagem é muito larga (<= %s).';
    $translation['image_too_narrow']            = 'A imagem é muito estreita (>= %s).';
    $translation['image_too_high']              = 'A imagem é muito alta (<= %s).';
    $translation['image_too_short']             = 'A imagem é muito curta (>= %s).';
    $translation['ratio_too_high']              = 'A proporção da imagem é muito alta (Imagem muito larga) (<= %s).';
    $translation['ratio_too_low']               = 'A proporção da imagem é muito baixa (Imagem muito alta) (>= %s).';
    $translation['too_many_pixels']             = 'A imagem tem muitos pixels (<= %s).';
    $translation['not_enough_pixels']           = 'A imagem tem poucos pixels (>= %s).';
    $translation['file_not_uploaded']           = 'O arquivo não foi baixado. Impossível continuar.';
    $translation['already_exists']              = '%s Ja existe. Favor mudar o nome do arquivo.';
    $translation['temp_file_missing']           = 'O arquivo fonte temporário é incorreto. Impossível continuar.';
    $translation['source_missing']              = 'O arquivo fonte baixado é incorreto. Impossível continuar.';
    $translation['destination_dir']             = 'O diretório de destino não pode ser criado. Impossível continuar.';
    $translation['destination_dir_missing']     = 'O diretório de destino não existe. Impossível continuar.';
    $translation['destination_path_not_dir']    = 'O caminho especificado não é um diretório. Impossível continuar.';
    $translation['destination_dir_write']       = 'Diretório de destino, sem permissão para editar. Impossível continuar.';
    $translation['destination_path_write']      = 'O caminho de destino não tem permissão de escrita. Impossível continuar.';
    $translation['temp_file']                   = 'Não foi possível criar o arquivo temporário. Impossível continuar.';
    $translation['source_not_readable']         = 'O arquivo fonte não é legível. Impossível continuar.';
    $translation['no_create_support']           = 'Criação a partir do arquivo %s impossível...';
    $translation['create_error']                = 'Erro na criação da imagem %s da fonte.';
    $translation['source_invalid']              = 'Impossível ler a imagem fonte. É uma imagem?';
    $translation['gd_missing']                  = 'O suporte GD não parece estar presente.';
    $translation['watermark_no_create_support'] = 'Problemas no suporte %s de criação, watermark não pode ser lida.';
    $translation['watermark_create_error']      = 'Problemas no suporte %s de leitura, impossível criar a watermark';
    $translation['watermark_invalid']           = 'Impossível ler a watermark, formato de imagem desconhecido.';
    $translation['file_create']                 = 'Criação do arquivo de suporte  %s impossível.';
    $translation['no_conversion_type']          = 'Tipo de conversão não foi definida.';
    $translation['copy_failed']                 = 'Erro ao copiar o arquivo no servidor. copy() falhou.';
    $translation['reading_failed']              = 'Erro ao ler o arquivo.';
?>