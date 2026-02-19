<?php
/**
 * UCenter lang: Tiếng Việt (vi_VN)
 * Mock: nội dung hiện là bản copy tiếng Trung, sửa value thành tiếng Việt.
 */
$lang = array(
	'please_login' => 'Vui lòng đăng nhập lại',
	'receiver_no_exists' => 'Người nhận không tồn tại, vui lòng nhập lại',
	'pm_save_succeed' => 'Tin nhắn đã được lưu vào hộp nháp',
	'pm_send_succeed' => '$sent tin nhắn đã được gửi thành công',
	'pm_send_announce_succeed' => 'Tin nhắn công cộng đã được gửi thành công',
	'pm_send_ignore' => 'Gửi tin nhắn thất bại',
	'pm_delete_succeed' => 'Xóa tin nhắn thành công',
	'pm_delete_invalid' => 'Không thể xóa tin nhắn',
	'pm_unread' => 'Đã đánh dấu tin nhắn chưa đọc',
	'blackls_updated' => 'Danh sách đen đã được cập nhật',

	'db_export_filename_invalid' => 'Bạn chưa nhập tên file sao lưu hoặc tên file có phần mở rộng không hợp lệ, vui lòng sửa lại.',
	'db_export_file_invalid' => 'Không thể lưu file dữ liệu vào máy chủ, vui lòng kiểm tra quyền thư mục.',
	'db_export_multivol_redirect' => 'Sao lưu nhiều phần: Tập tin dữ liệu #$volume đã được tạo thành công, chương trình sẽ tiếp tục tự động.',
	'db_export_multivol_succeed' => 'Chúc mừng, tất cả các file sao lưu đã được tạo thành công.',
	'db_import_multivol_succeed' => 'Dữ liệu từng phần đã được nhập vào cơ sở dữ liệu thành công.',
	'db_import_file_illegal' => 'File dữ liệu không tồn tại: Có thể máy chủ không cho phép tải file lên hoặc kích thước vượt quá giới hạn.',
	'db_import_multivol_redirect' => 'Dữ liệu từng phần #$volume đã được nhập vào cơ sở dữ liệu thành công, chương trình sẽ tiếp tục nhập các phần khác.',
	'db_back_api_url_invalid' => 'Không thể truy cập giao diện sao lưu của ứng dụng này, hãy sao chép api/dbbak.php từ thư mục gốc UCenter vào thư mục api của ứng dụng này',
	'delete_dumpfile_success' => 'Xóa file sao lưu dữ liệu thành công',
	'delete_dumpfile_redirect' => 'File sao lưu trùng tên tại #$appname đã được xóa thành công, chương trình sẽ tự động xóa các file tương tự ở ứng dụng khác.',
	'dbback_error_code_1' => 'Không thể tạo thư mục',
	'dbback_error_code_2' => 'Ghi file sao lưu thất bại',
	'dbback_error_code_3' => 'Lỗi thực thi SQL',
	'dbback_error_code_4' => 'Thư mục trống hoặc không tồn tại',
	'dbback_error_code_5' => 'Không tìm thấy file sao lưu hợp lệ trong thư mục chỉ định',
	'dbback_error_code_6' => 'Thiếu file sao lưu',
	'dbback_error_code_7' => 'Thư mục sao lưu được chỉ định không tồn tại',
	'dbback_error_code_8' => 'Xóa file sao lưu dữ liệu được chỉ định thất bại',
	'dbback_error_code_9' => 'Chương trình giao diện sao lưu hiện không hỗ trợ sao lưu ứng dụng kiểu này',
	'undefine_error' => 'Lỗi không xác định',

	'app_add_url_invalid' => 'Địa chỉ URL giao diện không hợp lệ',
	'app_add_ip_invalid' => 'Địa chỉ IP không hợp lệ',
	'read_plugin_invalid' => 'Đọc plugin thất bại',

	'syncappcredits_updated' => 'Đồng bộ hóa cài đặt điểm ứng dụng thành công',

	'note_succeed' => 'Gửi thông báo thành công',
	'note_false' => 'Gửi thông báo thất bại',
	'no_permission_for_this_module' => 'Bạn không có quyền quản lý module này',
	'admin_user_exists' => 'Tên người dùng này đã tồn tại, vui lòng sử dụng tên khác.',

	'mail_succeed' => 'Gửi email thành công',
	'mail_false' => 'Gửi email thất bại',
	
	'user_edit_noperm' => 'Bạn không có quyền chỉnh sửa người dùng này',

	'appid_invalid' => 'ID ứng dụng không hợp lệ',
	'app_apifile_not_exists' => 'File #$apifile không tồn tại, vui lòng kiểm tra đường dẫn ứng dụng.',
	'app_apifile_too_low' => 'Phiên bản file giao diện #$apifile quá thấp',
	'app_path_not_exists' => 'Đường dẫn này không tồn tại, vui lòng kiểm tra lại',
	'pm_send_seccode_error' => 'Mã xác nhận nhập sai',
	'pm_send_regdays_error' => 'Không thể gửi tin nhắn trong vòng #$pmsendregdays ngày kể từ khi đăng ký',
	'pm_send_limit1day_error' => 'Xin lỗi, bạn đã vượt quá số lượng tin nhắn gửi tối đa trong 24 giờ, vui lòng thử lại sau.',
	'pm_send_floodctrl_error' => 'Xin lỗi, khoảng cách giữa hai lần gửi tin nhắn của bạn quá ngắn, vui lòng thử lại sau.',
);