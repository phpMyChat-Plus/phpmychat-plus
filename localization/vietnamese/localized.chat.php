<?php
// File : vietnamese/localized.chat.php - plus version (20.10.2007 - rev.29)
// Translation by Marshall <hellomarshal_lookatme@netzero.net>
// Updates and corrections by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Hướng dẫn");

define("L_WEL_1", "Những lời nói được xóa sau: %s %s");
define("L_WEL_2", "và những thành viên không họat động sau: %s %s");

define("L_CUR_1", "Hiện tại đang có");
define("L_CUR_1a", "");
define("L_CUR_1b", "");
define("L_CUR_2", "đang trong phòng chát");
define("L_CUR_3", "Những người sử dụng đang trong phòng");
define("L_CUR_4", "Thành viên trong những phòng riêng tư");
define("L_CUR_5", "Những thành viên ẩn <br />(theo dõi phòng này):");

define("L_SET_1", "Đăng nhập ...");
define("L_SET_2", "Tên đăng nhập");
define("L_SET_3", "Số lời nói hiện thời");
define("L_SET_4", "thời gian mỗi sự cập nhật");
define("L_SET_5", "Xin chọn phòng chat ...");
define("L_SET_6", "Những phòng mặc định");
define("L_SET_7", "Bạn lựa chọn ...");
define("L_SET_8", "Những phòng tạo bởi người sử dụng");
define("L_SET_9", "Tạo nên của mình");
define("L_SET_10", "Cộng đồng");
define("L_SET_11", "Riêng tư");
define("L_SET_12", "Phòng");
define("L_SET_13", "Rồi , chỉ");
define("L_SET_14", "Tán gẫu");
define("L_SET_15", "Phòng riêng mặc định");
define("L_SET_16", "Những phòng riêng tư tạo bởi người sử dụng");
define("L_SET_17", "Chọn ảnh đại diện");
define("L_SET_18", "Bookmark this page: Chọn \"CTRL +D\".");

define("L_SRC", "Tùy biến có sẵn trên");

define("L_SECS", "giây");
define("L_MIN", "phút");
define("L_MINS", "phút");
define("L_HOUR", "giờ");
define("L_HOURS", "giờ");

// registration stuff:
define("L_REG_1", "Pass đăng nhập");
define("L_REG_2", "Quản lý tài khỏan ");
define("L_REG_3", "Đăng ký");
define("L_REG_4", "Sửa đổi hồ sơ");
define("L_REG_5", "Xóa thành viên");
define("L_REG_6", "Đăng ký thành viên");
define("L_REG_7", "Chỉ khi bạn được đăng ký");
define("L_REG_8", "E-mail");
define("L_REG_9", "Bạn hòan tất việc đăng ký.Bây giờ bạn có thể checkmail để xem lại user hay pass word hay vào phòng chát ngay bây giờ");
define("L_REG_10", "Back");
define("L_REG_11", "Sọan thảo");
define("L_REG_12", "Sửa đổi thông tin người sử dụng");
define("L_REG_13", "Xóa người sử dụng");
define("L_REG_14", "Đăng nhập");
define("L_REG_15", "Go");
define("L_REG_16", "Thay đổi");
define("L_REG_17", "Thông tin bạn sửa đổi đã cập nhật.");
define("L_REG_18", "Bạn đã bị đá ra bởi MOD phòng này");
define("L_REG_18a", "Xác nhận thành công việc đá MOD ra khỏi phòng.<br />Lý do: %s");
define("L_REG_19", "Bạn có thật sự muốn lọai bỏ không ?");
define("L_REG_20", "Có");
define("L_REG_21", "Bạn đã thành công lọai bỏ - xóa");
define("L_REG_22", "Không");
define("L_REG_25", "Đóng lại");
define("L_REG_30", "Tên");
define("L_REG_31", "Họ");
define("L_REG_32", "WEB");
define("L_REG_33", "Hiện e-mail ");
define("L_REG_34", "Dạng người dùng sọan thảo");
define("L_REG_35", "Người quản trị");
define("L_REG_36", "Đất nước");
define("L_REG_37", "Những lĩnh vực <span class=\"error\">*</span> Đã được bổ sung");
define("L_REG_39", "Phòng này đã bị lọai bỏ bởi người quản trị.");
define("L_REG_45", "Giới tính");
define("L_REG_46", "Nam");
define("L_REG_47", "Nữ");
define("L_REG_48", "Không chỉ rõ");
define("L_REG_49", "Sự Đăng ký được yêu cầu!");
define("L_REG_50", "Sự Đăng ký bị đình chỉ!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Những sự thiết đặt để vào tán gẫu");
define("L_EMAIL_VAL_2", "Chảo mừng đến người phục vụ");
define("L_EMAIL_VAL_Err", "Có lỗi , XIn tiếp xúc người quản trị: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Mật khẩu bạn đã được gửi đến hộp thư của bạn.<br />Bạn có thể thay đổi mật khẩu của bạn trong trang cá nhân");

// admin stuff
define("L_ADM_1", "%s KHông là người điều tiết trong phòng này");
define("L_ADM_2", "Bạn không còn là một người sử dụng được đăng ký");

// error messages
define("L_ERR_USR_1", "Tên đăng nhập này đã được sử dụng. Xin chọn tên khác.");
define("L_ERR_USR_2", "Bạn phải chọn một tên đăng nhập");
define("L_ERR_USR_3", "Tên đăng nhập này đã đựơc đăng ký<br />Xin đánh mật khẩu hay chọn một tên đăng nhập khác");
define("L_ERR_USR_4", "Mật khẩu xác nhận không chính xác");
define("L_ERR_USR_5", "Xin nhập tên đăng nhập");
define("L_ERR_USR_6", "Bạn phải đánh máy mật khẩu của bạn");
define("L_ERR_USR_7", "Bạn phải đánh máy thư điện tử của bạn");
define("L_ERR_USR_8", "Bạn phải ghi e-mail vào ");
define("L_ERR_USR_9", "Tên đăng nhập đang sử dụng");
define("L_ERR_USR_10", "Sai tên đăng nhập hay mật khẩu");
define("L_ERR_USR_11", "Bạn phải là người quản trị.");
define("L_ERR_USR_12", "Bạn là nguời quản trị vì thế bạn không thể xáo chính mình");
define("L_ERR_USR_13", "Để tạo ra được phòng của mình thì bạn phải đăng ký.");
define("L_ERR_USR_14", "Bạn được đăng ký trước đây để tán gẫu");
define("L_ERR_USR_15", "Bạn phải đánh tên.");
define("L_ERR_USR_16", "Chỉ những đặc tính thêm vào cho phép:\\n".$REG_CHARS_ALLOWED."\\nSpaces, commas or backslashes (\\) not allowed.\\nCheck the sintax.");
define("L_ERR_USR_16a", "Chỉ những đặc tính thêm này cho phép:<br />".$REG_CHARS_ALLOWED."<br />Những không gian , dấu phẩy hay dấu sổ ngược (\\) không được cho phép. Kiểm tra.");
define("L_ERR_USR_17", "Phòng này không tồn tại , bạn không được phép tạo ra một");
define("L_ERR_USR_18", "Trục xuất không tìm thấy tên thành viên");
define("L_ERR_USR_19", "Bạn không thể vào nhiều phòng trong cùng một thời gian");
define("L_ERR_USR_20", "Bạn đã bị trục xuất khỏi phòng chat");
define("L_ERR_USR_20a", "Bạn đã bị trục xuất từ phòng này hay từ cuộc tán gẫu.<br />Lý do: %s");
define("L_ERR_USR_21", "Bạn không tích cực sau ".C_USR_DEL." Phút <br />Bởi vậy bạn đã được khởi động từ phòng");
define("L_ERR_USR_22", "Lệnh này không sẵn sàng cho bộ duyệt bạn đang sử dụng (IE engine).");
define("L_ERR_USR_23", "để vào phòng này bạn cầy đăng nhập sau khi đăng ký(");
define("L_ERR_USR_24", "Để tạo được phòng riêng thì bạn phải đăng ký");
define("L_ERR_USR_25", "Chỉ người quản trị có thể sử dụng ".$COLORNAME." Màu sắc!<br />Không thử tới sự sử dụng ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Thành viên bắc đầu!");
define("L_ERR_USR_26", "Admin là người duy nhất có thể sử dụng ".$COLORNAME." màu sắc!<br />Không thử cho việc sử dụng ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Sự dự trữ cho người sử dụng!");
define("L_ERR_USR_27", "Bạn không thể tạo cuộc trò chuyện riêng tư đới với chính bạn//..tốt nhất...\\Bây giờ chọn một tên đăng nhập khác.");
define("L_ERR_ROM_1", "Phòng không chứa đựng dấu phẩy hay dấu sổ ngược (\\).");
define("L_ERR_ROM_2", "Sự trục xuất được hiện rõ tại phòng bạn muốn tới.");
define("L_ERR_ROM_3", "Phòng này được tồn tại như 1 cộng đồng");
define("L_ERR_ROM_4", "Tên phòng sai.");

// users frame or popup
define("L_EXIT", "Thoát");
define("L_DETACH", "Tách danh sách những người sử dụng");
define("L_EXPCOL_ALL", "Mở rộng/đóng tất cả");
define("L_CONN_STATE", "Làm mới trạng thái kết nối tới");
define("L_CHAT", "Chát");
define("L_USER", "người ");
define("L_USERS", "người");
define("L_LURKER", "khách ẩn");
define("L_LURKERS", "thành viên ẩn");
define("L_NO_USER", "hông thành viên");
define("L_ROOM", "phòng");
define("L_ROOMS", "những phòng");
define("L_EXPCOL", "Mở rộng/đóng tất cả phòng");
define("L_BEEP", "Beep/không beep tới người sử dụng");
define("L_PROFILE", "Thông tin hiển thị");
define("L_NO_PROFILE", "Không có thông tin hiển thị");

// input frame
define("L_HLP", "Trợ giúp");
define("L_MODERATOR", "%s Người điều tiết trong phòng này");
define("L_KICKED", "%s việc đá thành công");
define("L_KICKED_REASON", "%s một cách thành công (Lý do: %s)");
define("L_BANISHED", "%s có một cách thành công được trục xuất");
define("L_BANISHED_REASON", "%s Một cách thành công được trục xuất (Lý do: %s)");
define("L_ANNOUNCE", "THÔNG BÁO");
define("L_INVITE", "%s những yêu cầu mà bạn ông/cô phải hòan thành <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> phòng.");
define("L_INVITE_REG", "Bạn phải đăng ký để vào phòng này.");
define("L_INVITE_DONE", "Các bạn đã gửi thơ mời tới %s.");
define("L_OK", "Gửi");
define("L_BUZZ", "Những âm thanh hỗ trợ");
define("L_BAD_CMD", "Đây không phải là một lệnh hợp lệ!");
define("L_ADMIN", "%s đã là người quản trị!");
define("L_IS_MODERATOR", "%s đã là MOD!");
define("L_NO_MODERATOR", "Chỉ có người điều tiết phòng này mới có thể sử dụng lệnh này");
define("L_NONEXIST_USER", "%s không trong phòng hiện thời.");
define("L_NONREG_USER", "%s không đăng ký");
define("L_NONREG_USER_IP", "IP của anh ấy: %s.");
define("L_NO_KICKED", "%s là một MOD hay quản trị thì không được đá ra khỏi.");
define("L_NO_BANISHED", "%s là một MOD hay người quản trị thì không thể trục xuất");
define("L_SVR_TIME", "Thời gian server: ");
define("L_NO_SAVE", "Không tin nhắn đựơc cất giữ!");
define("L_NO_ADMIN", "Chỉ người quản trị mới có thể sử dụng lệnh này");
define("L_NO_REG_USER", "Bạn phải đăng ký chat để có thể sử dụng lệnh này");

// help popup
define("L_HELP_TIT_1", "Cười");
define("L_HELP_TIT_2", "Văn bản chuẩn những thông báo");
define("L_HELP_FMT_1", "Những thông báo gạch nghiên hay gạch ngang &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; tags.<br />Ví dụ, &lt;B&gt;văn bản này&lt;/B&gt; Sẽ sản xúât <B>văn bản này</B>.");
define("L_HELP_FMT_2", "Để tạo một link liên kết (for e-mail or URL) Trong thông báo của các bạn, đơn giản đánh máy tương ứng không trùng hợp cái này. Link liên kết sẽ được tạo ra tự động");
define("L_HELP_TIT_3", "Những lệnh");
define("L_HELP_NOTE", "Tất cả những lệnh sử dụng phải được sử dụng bằng tiếng anh!");
define("L_HELP_USR", "Thành viên");
define("L_HELP_MSG", "Tin nhắn");
define("L_HELP_MSGS", "Tin nhắn");
define("L_HELP_ROOM", "phòng");
define("L_HELP_BUZZ", "~tênâmthanh");
define("L_HELP_REASON", "lý do");
define("L_HELP_CMD_0", "{} Đại diện cho mộtyêu cầu sự thiết lập [] cho một để chọn");
define("L_HELP_CMD_1a", "Số lượng thông báo đã hiện ra tổng hợp. Mặc định tối thiểu là 5.");
define("L_HELP_CMD_1b", "lập lại những thông báo gần đây nhất , thấp nhất là 5");
define("L_HELP_CMD_2a", "Sửa đổi những thông báo làm chậm lại sự hiển thị (giây).<br />Nếu N không được chỉ rõ hơn so với 3 thì hãy làm mới cho đến khi thấy 10.");
define("L_HELP_CMD_2b", "sửa đổi những thông báo và người sử dụng làm mới để xem (trong giây ).<br />Nếu n được chỉ rõ hơn 3 hay giữa sự làm mới 3-10 lần.");
define("L_HELP_CMD_3", "Lật ngược những thông báo ngược (không phải tất cả trình duyệt).");
define("L_HELP_CMD_4", "Vào phòng, tạo ra nếu nó không tồn tại và nếu bạn được cho phép tới <br />n cân bằng riêng tư, Mặc định là 1 nếu không lỗi.");
define("L_HELP_CMD_5", "để lại lời chat sau một thông báo");
define("L_HELP_CMD_6", "Hãy tránh những thông báo từ người sử dụng nếu nó không được chỉ rõ<br />Làm lặn đi người sử dụng - cả hai được chỉ rõ, Cho tất cả người sử dụng khi - Trừ khi không phải.<br />Không hiển thị rõ , lờ đi trên mặt cắt.");
define("L_HELP_CMD_7", "Xem lại những lời nói trước đây được đánh máy (Lệnh thông báo).");
define("L_HELP_CMD_8", "Hiện/ẩn thời gian sau truyền tin");
define("L_HELP_CMD_9", "Đá ra người sử dụng chuyện tán gẫu. Lệnh này có thể sử dụng bởi MOD room hay Admin<br />Để chọn, [".L_HELP_REASON."] Trình bày lý do cái đá (Bất kỳ văn bản mong muốn nào).");
define("L_HELP_CMD_10", "Gửi một thông báo riêng tư Tới người sử dụng được chỉ rõ (những người sử dụng khác sẽ không nhìn thấy nó).");
define("L_HELP_CMD_11", "Cho thấy những thông tin người sử dụng được chỉ rõ.");
define("L_HELP_CMD_12", "Popup windows được sọan thảo bởi thành viên");
define("L_HELP_CMD_13", "Những thông báo người sử dụng tại phòng hiện thời ");
define("L_HELP_CMD_14", "Cho phép người quản trị hay người điều tiết (s)thúc đẩy người sử dụng đăng ký với sự điều tiết của MOD.");
define("L_HELP_CMD_15", "Làm sạch những thông báo và cho thấy 5 thông báo trước ");
define("L_HELP_CMD_16", "Cất giữ sau cùng những thông báo (những thông báo lọai trừ) Tới một hồ sơ HTML nếu nó không được chỉ rõ tất cả những thông báo sẵn có sẽ được gửi đến");
define("L_HELP_CMD_17", "Cho phép người quản trị gửi một thông báo cho tất cả thành viên thuộc tất cả phòng của hệ thống.");
define("L_HELP_CMD_18", "Mời một thành viên đang chat sang phòng mình hay phòng khác");
define("L_HELP_CMD_19", "Cho phép người điều tiết(s) một phòng hay quản trị tới \"banish\" một người sử dụng từ phòng trong một thời gian ngắn được định nghĩa bởi người quản trị.<br />Có thể trục xuất một ngừoi sử dụng đang tán gẫu mặt dù anh ta không biết gì hết * sự thiết lập để trục xúât \"mãi mãi\" một người sử dụng tán gẫu tòan bộ.<br />Để chọn, [".L_HELP_REASON."] trình bày lý do sự trục xuất (bất kỳ văn bản mong muốn ).");
define("L_HELP_CMD_20", "Mô tả bạn là gì ?.");
define("L_HELP_CMD_21", "những phòng và người sử dụng mà thử để gửi bạn truyền tin<br /> bạn ra khỏi đến từ máy tính. Nếu bạn muốn trở về để tán gẫu, chỉ bắt đầu đánh máy.");
define("L_HELP_CMD_22", "Gửi một âm thanh còi (chuông) và những màn hình để chọn một thông báo trong phòng.<br />- Cách dùng:<br />- old usage: \"/buzz\" or \"/buzz message to be shown\" - những âm thanh mặc định sẽ được phát ra trong bảng Admin;<br />- Cách dùng mở rộng: \"/buzz ~tênâmthanh\" or \"/buzz ~tênâmthanh message to be shown\" - Chơi tênâmthanh.wav hồ sơ thư mục âm thanh trong plus ; xin ghi nhớ dấu hiệu \"~\" để được sử dụng từ thứ 2, mà tên hồ sơ âm thanh , không có mở rộng ngòai .wav (chỉ .wav là những mở rộng được cho phép ).<br />Theo mặc định, đây là lệnh của mod/admin.");
define("L_HELP_CMD_23", "Gửi tới <i>âm thầm</i> (thông báo riêng tư). thông báo sẽ được gửi đến nơi đến, không có phòng nào vấn đề người sử dụng trong. Nếu người sử dụng không trực tuyến hay sữ dụng ra khỏi , bạn sẽ thông báo về nó.");
define("L_HELP_CMD_24", "Cách dùng: đề tài phải ghi ít nhất 2 từ.<br />Lệnh này thay đổi đề tài phòng hiện thời.Sử dụng những đề tài quan trọng<br />Theo mặc định thì mod/admin được quyền ra lệnh.<br />Sử dụng \"/topic top reset\" lệnh.đề tài hiện thời sẽ là sự khởi động lại và đã bị xóa để vắng mặt một trong số phòng.<br />Để chọn, \"/topic * {}\" chính xác trong tất cả các phòng (đề tài và sự khởi động lại tòan cầu).");
define("L_HELP_CMD_25", "Mộ trò chơi ngẫu nhiên như gane xúc sắc , hên xui.<br />Hướng dẫn: /dice or /dice [n];<br />n cần nói số lượng <b>giữa 1 and %s</b> (nó đại diện cho những xúc sắc lăn). Nếu không có số được vào, những cuộn cực đại mặc định sẽ là được dùng.");
define("L_HELP_CMD_26", "Đây là một phiên bản phức tạp hơn (của) lệnh xúc xắc/.<br />Usage: /{n1}d[n2] or /{n1}d;<br />n1 có thể cầm lấy bất kỳ giá trị nào <b>giữa 1 and %s</b> (nó đại diện cho những con số tượng trưng).<br />n2 có thể cầm lấy bất kỳ giá trị nào <b>giữa 1 và %s</b> (nó đại diện cho số lượng xúc xắc lăn trên sự tung).");
define("L_HELP_CMD_27", "Làm đặc trực ánh sáng bằng một thông báo.<br />hướng dẫn: /high {user} hoặc nó nhỏ gọn <img src=./images/highlightOff.gif> thẳng góc trên quyền thành viên (trong danh sách phòng thành viên)");
define("L_HELP_CMD_28", "It allows posting of <i>one single image</i> as message.<br />Usage: Bức tranh phải là trên Internet và tự do Có thể tiếp cận bởi bất cứ ai. Không sử dụng nhiều trang để đăng nhập <br />Mối liên kết ảnh đầy đủ được đánh máy! E.g.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />cho phép mở rộng chỉ: .jpg .bmp .gif .png. Link sẽ dẫn đến!<br />HINTS: type /img không có khỏang trống URl trong box; mở bức ảnh từ link cho website, click chuột phảt lên ảnh, chọn properties, bạn sẽ thấy address/URL (đôi khi bạn cần cuộn xuống để xem hết) và copy/dán sau khi /img<br />không sử dụng hình ảnh trong máy tính của bạn: Ý định phá họai cuộc tán gẫu!!!");
define("L_HELP_CMD_29", "Lệnh thứ 2 dành cho mod và admin (s) người sử dụng trước đó đẫy mạnh đến người điều tiết như vậy.<br />mục * tùy chọn sẽ giáng chức người sử dụng từ tất cả những phòng.");
define("L_HELP_CMD_30", "Ra lệnh thứ 2 của người có cấp bậc lớn hơn sẽ giống người thứ 2<br />E.g. * Mr Ciprian thì xem TV hoặc Mrs Dana thì vui ");
define("L_HELP_CMD_31", "Thay đổi những người sử dụng mệnh lệnh Được phân loại trong những danh sách: bởi thời gian hay thứ tự abc");
define("L_HELP_CMD_32", "Đây là phiên bản thứ 3 hên xui.<br />Usage: /d{n1}[tn2] or /d{n1};<br />n1 có thể chọn bất kỳ giá trị <b>từ 1 đến 100</b> (nó đại diện cho số lượng cuộn trên xúc xắc).<br />n2 có thể cầm lấy bất kỳ giá trị nào <b>giữa số 1 và %s</b> (đại diện những con xúc xắc trên trục tung).");
define("L_HELP_CMD_33", "Thay đổi số font khi chat với các thành viên khác (cho phép những giá trị cho n: <b>từ 7 đến 15</b>); the /size đây là lệnh cơ bản để chat(<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Phép xã giao chuyện tán gẫu");
define("L_HELP_ETIQ_2", "Chỗ của Chúng ta muốn giữ những IT cộng đồng thân thiện và ngộ nghĩnh, vì thế xin dính chặt vào những hướng dẫn sau đây. Nếu bạn không quan sát những quy tắc này, một trong số những người điều tiết chuyện gẫu của chúng ta có thể khởi động bạn từ chuyện gẫu.<br /><br />Thank you,");
define("L_HELP_ETIQ_3", "Những hướng dẫn trong khi chat");
define("L_HELP_ETIQ_4", "Không \"spam\" tán gẫu bởi sự đánh máy vô nghĩa.</li>
<li>Không sử dụng aLtErnAtiNg ngôn ngữ.</li>
<li>Pháo đài mod cực nhỏ, trong khi nó được coi là kêu ca.</li>
<li>Giữ tâm trí với những người bạn đến từ khắp nơi trên thế giới , và , có lẽ, bạn sẽ gặp người bạn với những lòng tin khác nhau. Vui lòng lịch sự và tử tế đối với những người này.</li>
<li>Do không phải sự xúc phạm trực tiếp về phía những thành viên khác. Thật ra, sự thử để lái khai quang của việc sử dụng sự xúc phạm và/ hoặc nguyền rủa những từ cả thảy.</li>
<li>Không gọi là những thành viên khác bởi những tên thực sự của họ mà chúng có thể không tăng sự gần gũi.. Sử dụng những biệt danh của họ thay vào đó.</li>");

// messages frame
define("L_NO_MSG", "Không có tin nhắn nào hiện thời ...");
define("L_TODAY_DWN", "Những thông báo mà đã được gửi hôm nay bắt đầu");
define("L_TODAY_UP", "Những thông báo mà đã được gửi hôm qua bắt đầu");

// message colors

$TextColors = array( "Đen" => "#000000",
				"Đỏ" => "#FF0000",
				"Xanh lá cây" => "#009900",
				"Xanh da trời" => "#0000FF",
				"Màu đỏ tía" => "#9900FF",
				"Màu đỏ tối" => "#990000",
				"Xanh lục tối" => "#006600",
				"Xanh da trời tối" => "#000099",
				"Nâu sẫm" => "#996633",
				"Màu xanh nước" => "#006699",
				"Màu cà rốt" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Được lờ đi");
define("L_IGNOR_NON", "Không lờ đi người sử dụng");

// whois popup
define("L_WHOIS_ADMIN", "Người quản trị");
define("L_WHOIS_MODER", "Người điều hành");
define("L_WHOIS_TOPMOD", "Top Người điều hành");
define("L_WHOIS_USER", "Người sử dụng");
define("L_WHOIS_GUEST", "Khách");
define("L_WHOIS_REG", "Đăng ký");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s vào phòng này" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s vào phòng này");
define("L_ENTER_ROM_NOSOUND", "%s vào phòng này");
define("L_EXIT_ROM", "%s thóat ra khỏi phòng");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s tự động khởi động phòng cho dù không họat động");
define("L_CLOSED_ROM", "%s đóng trình duyệt");

// Text for /away command notification string:
define("L_AWAY", "%s được đánh dấu ra khỏi");
define("L_BACK", "%s ra khỏi!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Thực đơn Nhanh *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "đặt đề tài tới:");
define("L_TOPIC_RESET", "đặt lại đề tài ");
define("L_HELP_TOP", "ít nhất hai từ như đề tài");

// Img cmd mod
define("L_PIC", "Bức ảnh bố trí bởi");
define("L_PIC_RESIZED", "Thay đổi kích thước tới");
define("L_HELP_IMG", "ảnh đầy đủ được gửi");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s không có mod trong phòng chat.");
define("L_IS_NO_MODERATOR", "%s không là MOD.");
define("L_ERR_IS_ADMIN", "%s là người quản trị!\\bạn không thể thay đổi sự cho phép");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Những lệnh thêm sẵn có:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Những đặc tính thêm/Mod sẵn có:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Bot có sẵn của chúng ta: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Những ngôn ngữ được nói");
define("L_PRO_2", "Mối liên kết ưu thích 1");
define("L_PRO_3", "Mối liên kết ưu thích 2");
define("L_PRO_4", "Sự mô tả");
define("L_PRO_5", "URL ảnh");
define("L_PRO_6", "Tên bạn/chữ màu");

// Avatar mod
define("L_AVATAR", "Ảnh đại diện (Avatar)");
define("L_ERR_AV", "Link dẫn sai hay host không có thật.");
define("L_TITLE_AV", "ảnh đại diện hiện thời : ");
define("L_CHG_AV", "Click \"".L_REG_16."\" để thay đổi thông tin <br />để cất giữ ảnh đại diện của bạn.");
define("L_SEL_NEW_AV", "chọn ảnh đại diện mới");
define("L_EX_AV", "(ví dụ: http://mysite/images/mypic.gif):");
define("L_URL_AV", "Link dẫn: ");
define("L_EXPL_AV", "(vào url rồi enter)");
define("L_CANCEL", "Hủy bỏ");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Những mẹo nhỏ: bot thì họat động tích cực trong phòng. Để bắt đầu mói chuyện với bot, kiểu <b>xin chảo ".C_BOT_NAME.'</b>. tớicuộc nói chuyện kết thúc, kiểu: <b>tạm biệt '.C_BOT_NAME.'</b>. (riêng tư: /to <b>'.C_BOT_NAME.'</b> lời nói)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "Những mẹo nhỏ: bot của chúng ta làm việc tích cực trong %s phòng. bạn có thể chat riêng tên bằng cách click vào tên và chat với bạn (lệnh: /wisp <b>".C_BOT_NAME."</b> lời nhắn)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "Những mẹo nhỏ: Bot chúng ta thì không công khai tích cực. Bạn có thể chỉ nói riêng tư bởi việc kích vào tên nó (Lệnh: /to <b>".C_BOT_NAME."</b> thông báo hoặc /wisp <b>".C_BOT_NAME."</b> lời nói)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot không được chạy trong phòng này!");
define("BOT_START_ERROR", "Bot đang chạy!");
define("BOT_DISABLED_ERROR", "Bot đã được vô hiệu hóa từ admin!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "cuộn xúc xắc , những kết quả:");
define("DICE_WRONG", "Phải lựa chọn nhiều ô vuông khi quay xuống\\n(chọn 1 và ".MAX_ROLLS.").\\nĐúng kiểu /dice xoay vòng tất cả ".MAX_ROLLS." những viên xúc xắc.");
define("DICE2_WRONG", "Thứ 2 nằm giữa 1".MAX_ROLLS.".\\nđể trống rỗng sử dụng ".MAX_ROLLS." những viên xúc xắc\\n(ví dụ /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Giá trị đầu tiên giữa số 1 và ".MAX_DICES.".\\n(ví dụ /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Giá trị thứ 2 nằm giữa số 1 và ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." những viên xúc xắc\\n(ví dụ /d50 or /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Mở tài liệu");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Mở popup lời nhắn");
define("L_PRIV_POST_MSG", "gửi một lời nhắn!");
define("L_PRIV_MSG", "Lời nhắn riêng tư Mới nhận được!");
define("L_PRIV_MSGS", "những thông báo riêng tư mới nhận được!");
define("L_PRIV_MSGSa", "Ở đây đầu tiên là 10 thông báo!<br />Sử dụng mối liên kết đáy để nhìn thấy mọi cái khác.");
define("L_PRIV_MSG1", "Từ:");
define("L_PRIV_MSG2", "Phòng:");
define("L_PRIV_MSG3", "Tới:");
define("L_PRIV_MSG4", "Tin nhắn:");
define("L_PRIV_MSG5", "Gửi:");
define("L_PRIV_REPLY", "Hồi âm");
define("L_PRIV_READ", "Chọn \"đóng lại\" nếu bạn không muốn tán gẫu nữa!");
define("L_PRIV_POPUP", "Bạn có thể vô hiệu hóa hoặc sử dụng popup<br />được sọan thảo bởi bạn");
define("L_PRIV_POPUP1", "Thông tin</a> (những người duy nhất được đăngký)");
define("L_NOT_ONLINE", "%s đang không online.");
define("L_PRIV_NOT_ONLINE", "%s không trực tuyến như bây giờ,\\nNhưng ý định vẫn thông báo khi các bạn đăng nhập.");
define("L_PRIV_NOT_INROOM", "%s không trong phòng này .\\nnếu bạn muốn làm hài lòng người sử dụng,\\Hãy sử dụng lệnh: /wisp %s tin nhắn.");
define("L_PRIV_AWAY", "%s đựơc đánh dấu ra khỏi,\\nnhưng ý định vẫn còn nhận được.");
define("PM_DISABLED_ERROR", "Việc truyền tin riêng tư được vô hiệu hóa.");
define("L_NEXT_PAGE", "Đi đến trang kế tiếp");
define("L_NEXT_READ", "Đọc tiếp theo %s"); // message / 10 messages
define("L_ROOM_ALL", "Tất cả các phòng");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Cho phép" : "Không cho phép"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Cho phép" : "Không cho phép"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Những sự thiết đặt Hiện thời trên người phục vụ này</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Màu mặc định</u>: Quản trị = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, MOD = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Những người sử dụng khác = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Màu mặc định</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Màu có sẵn");
define("L_COL_HELP_SUB1", "Sử dụng:");
define("L_COL_HELP_P1", "Bạn có thể lựa chọn sọan thảo mặc định của mình cho sự lựa chọn của bãn (cũng như tên đăng nhập bạn có màu). Bạn có khả năng để lựa chọn màu khác , nếu muốn quay lại hãy chọn mặc định - đó là một đầu tiên danh sách được lựa chọn.");
define("L_COL_HELP_SUB2", "Những gợi ý:");
define("L_COL_HELP_P2", "<u>Phạm vi màu</u><br />Phụ thuộc vào bộ duyệt các bạn /OS những khả năng,có thể xảy ra rằng một số màu không được trả lại. Chỉ 16 tên màu được hỗ trợ bởi W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "Nếu một người nói rằng họ không thấy màu sắc trên tên các bạn thì có lẽ người ấy sử dụng bộ trình duyệt cũ hơn.");
define("L_COL_HELP_SUB3", "Những sự thiết đặt cho cuộc chat:");
define("L_COL_HELP_P3", "<u>Những năng lượng dùng màu</u>:<br />1. Người quản trị có thể sử dụng bất kỳ màu nào.<br />Màu mặc định cho người quản trị là <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Những MOD có thể sử dụng bất kỳ màu nào nhưng <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> và <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Màu mặc định cho mod là <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Những người sử dụng khác có thể sử dụng bất kỳ màu nào <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> and <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Màu mặc định là <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Kỹ thuật</u>: Những màu mặc định được định nghỉa trong bảng quản trị của admin<br />Nếu bất cứ cái gì trục trặc hay Nếu có cái gì đó bạn không thích khoảng những màu mặc định bạn cần phải tiếp xúc với <b>người quản trị (ADMIN)</b> đầu tiên là những người sử dụng trong phòng bạn. :-)");
define("L_COL_HELP_USER_STATUS", "Tình trạng của bạn");
define("L_COL_TUT", "Sử dụng màu trong khi tán gẫu");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Chỉ có người quản trị mới được sử dụng ".COLOR_CA." màu!\\n\\nMàu văn bản mà bạn đặt tới ".COLOR_CM."!\\n\\nXin chọn một màu khác.");
define("COL_ERROR_BOX_USRA", "Chỉ có người quản trị mới được sử dụng ".COLOR_CA." màu!\\n\\nKhông thử tới sử dụng ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." hay ".COLOR_CM1.".\\n\\nGìn giữ những sức mạnh người sử dụng!\\n\\nMàu văn bản mà bạn đặt tới ".COLOR_CD."!\\n\\nXin chọn một màu khác.");
define("COL_ERROR_BOX_USRM", "Bạn phải là mod để sử dụng".COLOR_CM." màu!\\n\\nKhông sử dụng thử ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nGìn giữ những sức mạnh người sử dụng!\\n\\nMàu văn bản mà bạn đặt tới ".COLOR_CD."!\\n\\nXin chọn một màu khác.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Giá trị kích thước có thể chỉ là\\nsự khởi động lại_ hay giữa 7 và 15");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Chảo mừng tới phòng chat. Làm ơn giữ lịch sự trong phép xã giao: <I>Để có thể thành thạo trong cuộc sống</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Chảo mừng bạn đến chat. Xin giữ phép xã giao: <I>thử để cảm thấy sự thú vị</I>.");
define("WELCOME_MSG_NOSOUND", "Chảo mừng bạn đến chat. Hãy lịch sự trong khi tán gẫu: <I>Bạn sẽ xả giao tốt hơn trong cuộc sống</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Nếu server có thay đổi xin làm mới hay khởi động lại trình duyệt của bạn (nhấn phím F5 hay nhấn Thoát để ra khỏi).");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "Thứ hai");
define("L_TUE", "Thứ ba");
define("L_WED", "Thứ bốn");
define("L_THU", "Thứ năm");
define("L_FRI", "Thứ sáu");
define("L_SAT", "Thứ bảy");
define("L_SUN", "Chủ nhật");

// Password reset form by Ciprian - to use unicodes!
define("L_PASS_0", "Điền mật khẩu bạn vào");
define("L_PASS_1", "Câu hỏi bí mật của bạn:");
define("L_PASS_2", "Chiếc ô tô đầu tiên của các bạn?"); // Don't change this question! Just translate it!
define("L_PASS_3", "Tên than mật đầu tiên của các bạn?"); // Don't change this question! Just translate it!
define("L_PASS_4", "Tên thức uống ưa thích?"); // Don't change this question! Just translate it!
define("L_PASS_5", "Ngày sinh nhật của bạn?"); // Don't change this question! Just translate it!
define("L_PASS_6", "Câu trả lời bí mật");
define("L_PASS_7", "Đặt lại mật khẩu");
define("L_PASS_8", "Mật khẩu đã thành công khi cài lại.");
define("L_PASS_9", "Mật khẩu mới để tán gẫu.");
define("L_PASS_11", "Chảo mừng sự quay trở lại của chũ server!");
define("L_PASS_12", "Chọn câu hỏi ...");
define("L_ERR_PASS_1", "Sai tên đăng nhập. Của bạn.");
define("L_ERR_PASS_2", "Sai E-mail. Thử lại lần nữa!");
define("L_ERR_PASS_3", "Câu hỏi bí mật sai.<br />Trả lời cho sự nhìn thấy!");
define("L_ERR_PASS_4", "Sai câu trả lời bí mật. Thử Lại lần nữa!");
define("L_ERR_PASS_5", "Bạn không được tập hợp , riêng tư , bí mật dữ liệu.");
define("L_ERR_PASS_6", "Bạn không được tập hợp , riêng tư , bí mật dữ liệu như thế.<br />Bạn không được sử dụng màu này. Tiếp xúc với admin.");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "% là người quản trị khi chat.");
define("L_ADM_4", "% không là người quản trị khi chat");

// Links popup page by Alex
define("L_LINKS_1", "Gửi liên kết");
define("L_LINKS_2", "Bạn có thể gửi những mối liên kết");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Click vào đây %s %s");
define("L_CLICK", "Click vào đây %s");
define("L_LINKS_3", "mở liên kết");
define("L_LINKS_4", "để mở tác giả");
define("L_LINKS_5", "chèn vào mặt cười");
define("L_LINKS_6", "tới sự tiếp xúc");
define("L_LINKS_7", "để thăm phpMyChat trang chủ");
define("L_LINKS_8", "để nối nhóm phpMyChat");
define("L_LINKS_9", "để gửi sự phản hồi của các bạn");
define("L_LINKS_10", "để tải xuống phpMyChat Plus");
define("L_LINKS_11", "để kiểm tra người đang tán gẫu");
define("L_LINKS_12", "để mở Trang Đăng nhập Chuyện gẫu");
define("L_LINKS_13", "gửi tiếng buzz"); // Click to blablabla : it can also be translated as "to play this sound", if buzz has no translation.
define("L_LINKS_14", "để sử dụng lệnh này");
define("L_LINKS_15", "để mở"); // to open/see Posted Links window
define("L_LINKS_16", "Phòng triển lãm tranh"); // to open/see Posted Links window
define("L_SWITCH", "Sự Chuyển đổi Tới");
define("L_SELECTED", "chọn");
define("L_EMAIL_1", "để mở gửi E-mail");
define("L_FULLSIZE_PIC", "để mở toàn bộ bức tranh");
define("L_AUTHOR", "tác giả");
define("L_DEVELOPER", "người phát triển chuyện gẫu này");
define("L_OWNER", "chủ nhân của phòng chat");
define("L_TRANSLATOR", "người dịch");

// Banner topics - the topics themselves are not multi-language!
define("L_BANNER_WELCOME", "Chao mừng tới %s!"); // room name
define("L_BANNER_TOPIC", "Đề tài:");

// Counter on login
define("L_VISITOR_REPORT", "... những người đến thăm từ đó %s"); // install date

// Status bar messages
define("L_JOIN_ROOM", "Nối phòng này");
define("L_USE_NAME", "Sử dụng tên đăng nhập này");
define("L_USE_NAME1", "Địa chỉ tới tên đăng nhập");
define("L_WHSP", "Thì thầm");
define("L_SEND_WHSP", "Gửi một tin đồn");
define("L_SEND_PM_1", "Gửi PM");
define("L_SEND_PM_2", "Gửi một thông báo riêng tư");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Những tùy chọn Thêm");
define("L_LURKING_1", "Mở trang bí mật");
define("L_SOUNDFIX_IE_1", "Điều cản trở âm thanh Cho Tức là");
define("L_SOUNDFIX_IE_2", "Tải xuống âm thanh đã fix");

//Lurking frame popup
define("L_LURKING_2", "Trang Bí mật");
define("L_LURKING_3", "bí mật");
define("L_LURKING_4", "tiếp tục gặp nhau");
define("L_LURKING_5", "ẩn số");

// Months for Open Schedule by Ciprian
define("L_JAN", "Tháng 1");
define("L_FEB", "Thang 2");
define("L_MAR", "Thang 3");
define("L_APR", "Thang 4");
define("L_MAY", "Thang 5");
define("L_JUN", "Thang 6");
define("L_JUL", "Thang 7");
define("L_AUG", "Thang 8");
define("L_SEP", "Thang 9");
define("L_OCT", "Thang 10");
define("L_NOV", "Thang 11");
define("L_DEC", "Thang 12");

// Localized date format - read the parameters here: http://www.php.net/manual/en/function.strftime.php
setlocale(LC_TIME, "vi_VN.UTF-8", "Vietnamese.UTF-8");
define("L_SHORT_DATE", "%d %b %Y"); //Change this to your local desired date only format (keep the short form)
define("L_LONG_DATE", "%A, %d %B %Y"); //Change this to your local desired date only format (keep the long form)
define("L_SHORT_DATETIME", "%H:%M:%S %d %b %Y"); //Change this to your local desired date&time format (keep the short form)
define("L_LONG_DATETIME", "%H:%M:%S %A, %d %B %Y"); //Change this to your local desired date&time format (keep the long form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".$CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","thành viên ".LOGIN_LINK." tán gẫu</A> vào thời gian này.</td></tr>");
define("USERS_LOGIN","1 thành viên ".LOGIN_LINK." tán gẫu</A> vào thời gian này</td></tr>");
define("NO_USER","Không ai ".LOGIN_LINK." tán gẫu</A> vào thời gian này</td></tr>");

//Language names
define("L_LANG_AR", "Tây ban nha");
define("L_LANG_NL", "Hà lan");
define("L_LANG_EN", "Tiếng Anh");
define("L_LANG_ENUK", "Tiếng Anh UK");
define("L_LANG_ENUS", "Tiếng Anh US");
define("L_LANG_FR", "Tiếng Pháp");
define("L_LANG_DE", "Tiếng Đức");
define("L_LANG_IT", "Tiếng ý");
define("L_LANG_RO", "Roma");
define("L_LANG_ES", "Tây ban nha");
define("L_LANG_SV", "Thụy Điển");
define("L_LANG_TR", "Thổ nhĩ kỳ");
define("L_LANG_VI", "Việt nam");
?>