<?php
// File : vietnamese/localized.admin.php - plus version (25.09.2007 - rev.10)
// Translation by Marshall <hellomarshal_lookatme@netzero.net>
// Updates and corrections by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Quản trị bởi %s");
define("A_MENU_1", "Đăng ký acc để tán gẫu");
define("A_MENU_2", "Trục xuất thành viên");
define("A_MENU_3", "Những phòng sạch");
define("A_MENU_4", "Gửi thư");
define("A_MENU_5", "Cấu hình");
define("A_MENU_6", "Lời chat lưu lại");
define("A_MENU_7", "Tìm kiếm");
define("A_MENU_8", "Kết nối");
define("A_MENU_9", "Tài liệu");
define("A_LOGOUT", "Thoát ra");

// Frame for registered users
define("A_SHEET1_1", "Danh sách những người sử dụng và những sự cho phép của họ được đăng ký");
define("A_SHEET1_2", "Tên đăng nhập");
define("A_SHEET1_3", "Những sự cho phép");
define("A_SHEET1_4", "Phòng rớt hạng");
define("A_SHEET1_5", "Những phòng rớt hạn bị chia ra bởi dấu phẩy (,) không có những khỏang trắng.");
define("A_SHEET1_6", "Xóa những lựa chọn");
define("A_SHEET1_7", "Thay đổi");
define("A_SHEET1_8", "Không có những người sử dụng được đăng ký.");
define("A_SHEET1_9", "Trục xuất những lựa chọn kiểm tra");
define("A_SHEET1_10", "Bây giờ ban hãy di chuyển những người trục xuất trong bộ lọc của bạn.");
define("A_SHEET1_11", "Sự cuối cùng kết nối");
define("A_SHEET1_12", "Lý do trục xuất (để chọn)");
define("A_USER", "Người sử dụng");
define("A_MODER", "Người điều hành");
define("A_TOPMOD", "Top Người điều hành");
define("A_ADMIN", "Người quản trị");
define("A_PAGE_CNT", "Trang %s của %s");

// Frame for banished users
define("A_SHEET2_1", "Danh sách những người bị trục xuất và những phòng liên quan");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Liên quan những phòng");
define("A_SHEET2_4", "Cho đến");
define("A_SHEET2_5", "không kết thúc");
define("A_SHEET2_6", "Những phòng bị tác ra bởi dấu phẩy không có những không gian (,) nếu có ít hơn 4, khác ’<B>*</B>’ dấu hiệu trục xuất từ tất cả các phòng.");
define("A_SHEET2_7", "Lọai bỏ sự trục xuất những người sử dụng được kiểm tra(s)");
define("A_SHEET2_8", "Không có những người sử dụng bị trục xuất.");
define("A_SHEET2_9", "Lý do (để chọn)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Danh sách những phòng hiện hữu");
define("A_SHEET3_2", "Làm sạch \"non-default\" phòng cũng sẽ del tất cả người điều tiết<br />Tình trạng phòng này.");
define("A_SHEET3_3", "Những phòng được lựa chọn sạch");
define("A_SHEET3_4", "Không có những phòng để làm sạch");

// Frame for sending mails
define("A_SHEET4_0", "Bạn không đặt e-mail admin trong bảng.");
define("A_SHEET4_1", "Thư điện thử");
define("A_SHEET4_2", "Tới:");
define("A_SHEET4_3", "Lựa chọn mọi thứ");
define("A_SHEET4_4", "Tiêu đề:");
define("A_SHEET4_5", "Thông báo:");
define("A_SHEET4_6", "Bắt đầu gửi!");
define("A_SHEET4_7", "Tất cả thư đã được gửi");
define("A_SHEET4_8", "có lỗi cho việc gửi thư.");
define("A_SHEET4_9", "Địa chỉs, tiêu đề hay lời nhắn thì không có!");
define("A_SHEET4_10", "Thêm những email , phân chia giữa dấu phẩy (,)");
define("A_SHEET4_11", "Chữ ký");
define("A_SHEET4_12", "Không chọn lọc Mọi thứ");

// Frame for configuration
define("A_SHEET5_0", "Bạn đang cài đặt phpMyChat-Plus phiên bản %s");
define("A_SHEET5_1", "Có một phiên bản mới tự do cho (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Tán gẫu bị ngắt") ;
define("A_REFRESH_MSG", "Làm mới tin") ;
define("A_MSG_DEL", "Xoa") ;
define("A_POST_TIME", "Gửi lên") ;
define("A_FROM_TO", "Tu  Toi") ;
define("A_FROM", "Tu") ;
define("A_CHTEX_ROOM", "Phong") ;
define("A_CHTEX_MSG", "Tin Nhắn") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Ghi lại những IP kết nối %s"); // phpMyChat (app name)
define("A_CHAT_LOGS_2", "Tài liệu lưu trữ Chuyện gẫu đã được vô hiệu hóa");
define("A_CHAT_LOGS_3", "Mở ghi lại những IP kết nối");
define("A_CHAT_LOGS_4", "Xoa chat IP chuyện gẫu");
define("A_CHAT_LOGS_5", "Xóa những file IP hồ sơ!\\n");
define("A_CHAT_LOGS_6", "Ghi lại đầy đủ phần chat");
define("A_CHAT_LOGS_7", "Cho thấy mục tài liệu chat cho người sữ dụng");
define("A_CHAT_LOGS_8", "Cái này sẽ xóa tất cả những hồ sơ và những ngăn\\nstor Trong %s Ngăn!\\n"); // year
define("A_CHAT_LOGS_9", "Xóa mọi thứ %s Những khúc gỗ"); // year
define("A_CHAT_LOGS_10", "Xóa năm");
define("A_CHAT_LOGS_11", "Cái này sẽ xóa tất cả những hồ sơ\\nstor Trong %s Ngăn!\\n"); // month/year
define("A_CHAT_LOGS_12", "(chỉ là một hiễn thị)");
define("A_CHAT_LOGS_13", "Xóa tháng");
define("A_CHAT_LOGS_14", "ý định này xóa %s file!\\n"); // day
define("A_CHAT_LOGS_15", "Xoa ghi nhận");
define("A_CHAT_LOGS_16", "Đọc ghi nhận %s"); // day month year
define("A_CHAT_LOGS_17", "Hiện tài liệu lưu trữ ghi lại");
define("A_CHAT_LOGS_18", "(chỉ là một hiễn thị)");
define("A_CHAT_LOGS_19", "\\nĐây không có thể đảo ngược...\\nBạn thìchắc chắn?");
define("A_CHAT_LOGS_20", "Cho thấy mục tán gẫu lưu trữ đầy đủ");
define("A_CHAT_LOGS_21", "Đi đến đỉnh");
define("A_CHAT_LOGS_22", "Lưu trữ Hồ sơ");
define("A_CHAT_LOGS_23", "Tiếp tục sinh ra %s");

//Admin Search Page
define("A_SEARCH_1", "Trang Tìm kiếm Chatroom");
define("A_SEARCH_2", "Tất cả các phạm trù");
define("A_SEARCH_3", "Những tên");
define("A_SEARCH_4", "IP Gửi");
define("A_SEARCH_5", "Những sự cho phép");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Giới tính");
define("A_SEARCH_8", "Sự Mô tả");
define("A_SEARCH_9", "Liên kết");
define("A_SEARCH_10", "Tìm kiếm");
define("A_SEARCH_11", "Phạm trù những cho phép, những tùy chọn <b>ad</b>, <b>mod</b> or <b>u</b>.");
define("A_SEARCH_12", "Cho phạm trù giới tính, những tùy chọn <b>0</b> cho Không chỉ rõ, <b>1</b> Cho con trai, or <b>2</b> Cho con gái.");
define("A_SEARCH_13", "Tên đăng nhập");
define("A_SEARCH_14", "Họ");
define("A_SEARCH_15", "Ten");
define("A_SEARCH_16", "Nuoc");
define("A_SEARCH_18", "Sự Cho phép");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Giới tính");
define("A_SEARCH_21", "Thuật ngữ Tìm kiếm ");
define("A_SEARCH_22", "Sự Tìm kiếm gần ");
define("A_SEARCH_23", "Mời Cung cấp một Thuật ngữ Tìm kiếm và sự Thử lần nữa!");

// Connected users Page
define("A_LURKING_1", "Được nối cho những người sử dụng và Bí mật") ;
define("A_LURKING_2", "Bí mật bị ngắt.") ;
?>