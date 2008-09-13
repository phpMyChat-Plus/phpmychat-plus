<?php
// +------------------------------------------------------------------------+
// | class.upload.vi_VN.php                                                 |
// +------------------------------------------------------------------------+
// | Copyright (c) Marshall 200x. All rights reserved.                        |
// | Version       0.25                                                     |
// | Last modified 14/09/2008                                               |
// | Email         hellomarshal_lookatme@netzero.net               |
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
 * Class upload Vietnamese translation
 *
 * @version   0.25
 * @author    Marshall (hellomarshal_lookatme@netzero.net)
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Marshall
 * @package   cmf
 * @subpackage external
 * Do not use ' but use ’ instead (utf-8 edit bug) or comment it out like \'
 */

    $translation = array();
    $translation['file_error']                  = 'File lỗi, xin thử lại lần nữa.';
    $translation['local_file_missing']          = 'File không tồn tại.';
    $translation['local_file_not_readable']     = 'File không đọc được.';
    $translation['uploaded_too_big_ini']        = 'File tải lên lỗi(file tải lên vượt mức %s – dung lượng file upload vượt mức được chỉnh tại php.ini).';
    $translation['uploaded_too_big_html']       = 'File tải lên lỗi(file tãi lên vượt hơn %s - cái MAX_FILE_SIZE bị giới hạn trong phiên bản upload lên).';
    $translation['uploaded_partial']            = 'File tải lên lỗi(hồ sơ được nạp dữ liệu quá tải).';
    $translation['uploaded_missing']            = 'File tải lên lỗi (không file được chỉ rõ).';
    $translation['uploaded_unknown']            = 'File tải lên lỗi (mã lỗi không được biết).';
    $translation['try_again']                   = 'File tải lên lỗi. xin thử lại.';
    $translation['file_too_big']                = 'File cũng lớn như vậy (%s).';
    $translation['no_mime']                     = 'File type không thể xóa.';
    $translation['incorrect_file']              = 'Sai định dạng file.';
    $translation['image_too_wide']              = 'ảnh quá rộng (<= %s).';
    $translation['image_too_narrow']            = 'ảnh quá hẹp (>= %s).';
    $translation['image_too_high']              = 'ảnh quá cao (<= %s).';
    $translation['image_too_short']             = 'ảnh quá ngắn (>= %s).';
    $translation['ratio_too_high']              = 'Cỡ ảnh quá cao ( ảnh quá rộng) (<= %s).';
    $translation['ratio_too_low']               = 'Cỡ ảnh quá thấp ( ảnh quá cao) (>= %s).';
    $translation['too_many_pixels']             = 'ảnh có quá nhiều điểm (<= %s).';
    $translation['not_enough_pixels']           = 'ảnh không có đủ điểm (>= %s).';
    $translation['file_not_uploaded']           = 'File không được tải lên, không thể xác định.';
    $translation['already_exists']              = '%s đã có sẵm. Làm ơn đổi tên file.';
    $translation['temp_file_missing']           = 'Tập tin tạm tời không có đúng. Không thể xác định.';
    $translation['source_missing']              = 'Tập tin dữ liệu không có đúng. Không thể xác định.';
    $translation['destination_dir']             = 'Thư mục đến không thể tạo ra. Khong thể xác định.';
    $translation['destination_dir_missing']     = 'Thư mục không có đúng. Không thể xác định.';
    $translation['destination_path_not_dir']    = 'Đường dẫn đến không đúng thư mục. Không thể xác định.';
    $translation['destination_dir_write']       = 'Thư mục dẫn không thể viết. Không thể xác định.';
    $translation['destination_path_write']      = 'File dẫn không thể viết. Không thể xác định.';
    $translation['temp_file']                   = 'Không thể tạo file tạm thời. Không thể xác định.';
    $translation['source_not_readable']         = 'Tập tin nguồn thì không đọc được. Không thể xác định.';
    $translation['no_create_support']           = 'Không thể tạo ra %s hỗ trợ.';
    $translation['create_error']                = 'Loi được tạo ra %s hinh ảnh từ code.';
    $translation['source_invalid']              = 'Khong thể đọc file ảnh. Không phải file ảnh?';
    $translation['gd_missing']                  = 'GD không có mặt.';
    $translation['watermark_no_create_support'] = 'Không được tạo ra từ%s hỗ trợ, không thể đọc mực nước.';
    $translation['watermark_create_error']      = 'Không %s đọc hỗ trợ, không thể tạo mực nước.';
    $translation['watermark_invalid']           = 'Không thể đọc file ảnh, không thể đọc mực nước.';
    $translation['file_create']                 = 'Không %s tạo hỗ trợ.';
    $translation['no_conversion_type']          = 'Không có kiểu chuyển đổi định nghĩa.';
    $translation['copy_failed']                 = 'Không thể copy file từ server. copy() sai.';
    $translation['reading_failed']              = 'Lỗi đang đọc hồ sơ.';

?>