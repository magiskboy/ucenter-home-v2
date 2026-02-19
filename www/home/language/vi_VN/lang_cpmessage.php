<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	UCHome lang: Tiếng Việt (vi_VN). Mock: nội dung là bản copy tiếng Trung, sửa value thành tiếng Việt.
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['cplang'] = array(
	//common
	'do_success' => 'Thao tác đã hoàn tất',

	//admincp.php
	'enter_the_password_is_incorrect' => 'Mật khẩu nhập không đúng, xin vui lòng thử lại',
	'excessive_number_of_attempts_to_sign' => 'Bạn đã thử đăng nhập nền quản lý quá 3 lần trong 30 phút, vì an toàn dữ liệu, xin hãy thử lại sau',

	//admincp.php

	//admin/admincp_ad.php
	'no_authority_management_operation' => 'Xin lỗi, bạn không có quyền thực hiện thao tác này',
	'please_check_whether_the_option_complete_required' => 'Vui lòng kiểm tra xem các trường bắt buộc đã được điền đầy đủ chưa',
	'please_choose_to_remove_advertisements' => 'Vui lòng chọn ít nhất một quảng cáo cần xóa',
	'no_authority_management_operation_edittpl' => 'Vì lý do bảo mật, chức năng chỉnh sửa mẫu trực tuyến mặc định bị tắt và chỉ có người sáng lập mới thực hiện được. Nếu bạn muốn sử dụng chức năng này, vui lòng chỉnh lại cấu hình liên quan trong config.php.',
	'no_authority_management_operation_backup' => 'Vì lý do an toàn, thao tác sao lưu và phục hồi cơ sở dữ liệu chỉ dành cho người sáng lập. Nếu bạn muốn sử dụng chức năng này, vui lòng chỉnh lại cấu hình liên quan trong config.php.',

	//admin/admincp_album.php
	'at_least_one_option_to_delete_albums' => 'Vui lòng chọn đúng ít nhất một album để xóa',

	//admin/admincp_backup.php
	'data_import_failed_the_file_does_not_exist' => 'Nhập dữ liệu thất bại, tệp tin không tồn tại',
	'start_transferring_data' => 'Bắt đầu nhập dữ liệu',
	'wrong_data_file_format_into_failure' => 'Nhập dữ liệu thất bại, định dạng tệp tin không đúng',
	'documents_were_incorrect_length' => 'Độ dài tên tệp không hợp lệ',
	'backup_table_wrong' => 'Xảy ra lỗi với bảng sao lưu',
	'failure_writes_the_document_check_file_permissions' => 'Ghi tệp tin thất bại, vui lòng kiểm tra quyền hạn tệp tin',
	'successful_data_compression_and_backup_server_to' => 'Dữ liệu sao lưu thành công và đã nén trên máy chủ',
	'backup_file_compression_failure' => 'Xin lỗi, nén tệp dữ liệu sao lưu thất bại, vui lòng kiểm tra quyền thư mục',
	'shell_backup_failure' => 'Sao lưu bằng SHELL thất bại',
	'data_file_does_not_exist' => 'Xin lỗi, tệp dữ liệu không tồn tại, vui lòng kiểm tra',
	'the_volumes_of_data_into_databases_success' => 'Nhập dữ liệu phân đoạn thành công vào cơ sở dữ liệu UCenter Home',
	'data_file_does_not_exist' => 'Xin lỗi, tệp dữ liệu không tồn tại, vui lòng kiểm tra',
	'data_file_format_is_wrong_not_into' => 'Tệp dữ liệu không đúng định dạng, không thể nhập.',
	'directory_does_not_exist_or_can_not_be_accessed' => 'Thư mục không tồn tại hoặc không thể truy cập, vui lòng kiểm tra thư mục \\1.',
	'vol_backup_database' => 'Sao lưu phân đoạn: Tệp dữ liệu #\\1 tạo thành công, chương trình sẽ tiếp tục tự động.',
	'complete_database_backup' => 'Chúc mừng, tất cả \\1 tệp backup đã tạo thành công, hoàn tất sao lưu.',
	'decompress_data_files_success' => 'Tệp dữ liệu #\\1 giải nén thành công, chương trình sẽ tiếp tục tự động.',
	'data_files_into_success' => 'Tệp dữ liệu #\\1 nhập thành công, chương trình sẽ tiếp tục tự động.',

	//admin/admincp_block.php
	'correctly_completed_module_name' => 'Vui lòng nhập đúng tên module dữ liệu',
	'a_call_to_delete_the_specified_modules_success' => 'Xóa module gọi dữ liệu chỉ định thành công',
	'designated_data_transfer_module_does_not_exist' => 'Module gọi dữ liệu chỉ định không tồn tại',
	'sql_statements_can_not_be_completed_for_normal' => 'Câu truy vấn SQL không thể hoàn thành đúng, vui lòng kiểm tra lại.<br>Phản hồi của máy chủ:<br>ERROR: \\1<br>ERRNO. \\2',
	'enter_the_next_step' => 'Tiếp tục sang bước tiếp theo',
	'choose_to_delete_the_data_transfer_module' => 'Vui lòng chọn ít nhất một module gọi dữ liệu để xóa',

	//admin/admincp_blog.php
	'the_correct_choice_to_delete_the_log' => 'Vui lòng chọn đúng ít nhất một nhật ký để xóa',
	'the_correct_choice_to_add_topic' => 'Có lỗi khi đề xuất lên chủ đề nóng, vui lòng kiểm tra thao tác',
	'add_topic_success' => 'Đã đề xuất lên chủ đề nóng, tạo ra \\1 hoạt động liên quan',

	//admin/admincp_cache.php

	//admin/admincp_censor.php

	//admin/admincp_comment.php
	'the_correct_choice_to_delete_comments' => 'Vui lòng chọn đúng ít nhất một bình luận để xóa',
	'choice_batch_action' => 'Vui lòng chọn loại thao tác bạn muốn thực hiện',

	//admin/admincp_config.php
	'ip_is_not_allowed_to_visit_the_area' => 'Địa chỉ IP hiện tại (\\1) không nằm trong phạm vi cho phép truy cập, vui lòng kiểm tra lại thiết lập',
	'the_prohibition_of_the_visit_within_the_framework_of_ip' => 'Địa chỉ IP hiện tại (\\1) nằm trong phạm vi cấm truy cập, vui lòng kiểm tra lại thiết lập',

	'config_uc_dir_error' => 'Đường dẫn vật lý UCenter không chính xác, vui lòng kiểm tra lại',

	//admin/admincp_credit.php
	'rules_do_not_exist_points' => 'Quy tắc điểm này không tồn tại',

	//admin/admincp_cron.php
	'designated_script_file_incorrect' => 'Tệp kịch bản chỉ định không đúng',
	'implementation_cycle_incorrect_script' => 'Chu kỳ thực thi kịch bản không hợp lệ',

	//admin/admincp_item.php
	'choose_to_delete_events' => 'Vui lòng chọn đúng ít nhất một sự kiện để xóa',

	//admin/admincp_mtag.php
	'choose_to_delete_the_columns_tag' => 'Vui lòng chọn đúng ít nhất một nhóm để xóa',
	'designated_to_merge_the_columns_do_not_exist' => 'Nhóm mới để gộp chưa được tạo, vui lòng tạo nhóm trước rồi gộp',
	'the_successful_merger_of_the_designated_columns' => 'Gộp nhóm chỉ định thành công',
	'columns_option_to_merge_the_tag' => 'Vui lòng chọn đúng ít nhất một nhóm để gộp',
	'lock_open_designated_columns_tag_success' => 'Khóa/Mở khóa nhóm chỉ định thành công',
	'recommend_designated_columns_tag_success' => 'Đề xuất/Hủy đề xuất nhóm chỉ định thành công',
	'choose_to_operate_columns_tag' => 'Vui lòng chọn đúng ít nhất một nhóm để thao tác',

	'failed_to_change_the_length_of_columns' => 'Thay đổi độ dài chủ đề thất bại, có thể dữ liệu hiện tại đã vượt giới hạn',

	//admin/admincp_pic.php
	'choose_to_delete_pictures' => 'Vui lòng chọn đúng ít nhất một hình ảnh để xóa',

	//admin/admincp_post.php
	'choose_to_delete_the_topic' => 'Vui lòng chọn đúng ít nhất một chủ đề để xóa',

	//admin/admincp_profield.php
	'there_is_no_designated_users_columns' => 'Cột nhóm người dùng chỉ định không tồn tại',
	'choose_to_delete_the_columns' => 'Vui lòng chọn đúng cột cần xóa',
	'have_one_mtag' => 'Xóa thất bại, xin vui lòng giữ lại ít nhất một cột nhóm',
	
	//admin/admincp_poll.php
	'the_correct_choice_to_delete_the_poll' => 'Vui lòng chọn đúng ít nhất một khảo sát để xóa',

	//admin/admincp_report.php
	'the_right_to_report_the_specified_id' => 'Vui lòng chỉ định đúng ID báo cáo',

	//admin/admincp_share.php
	'please_delete_the_correct_choice_to_share' => 'Vui lòng chọn đúng mục chia sẻ cần xóa',

	//admin/admincp_space.php
	'designated_users_do_not_exist' => 'Người dùng mà bạn chỉ định không tồn tại',
	'choose_to_delete_the_space' => 'Vui lòng chọn đúng không gian cần xóa',
	'not_have_permission_to_operate_founder' => 'Bạn không có quyền thao tác với người sáng lập',
	'uc_error' => 'Kết nối với Trung tâm người dùng thất bại, vui lòng thử lại sau',

	//admin/admincp_stat.php
	'choose_to_reconsider_statistical_data_types' => 'Vui lòng chọn đúng kiểu dữ liệu cần thống kê lại',
	'data_processing_please_wait_patiently' => '<a href="\\1">Đang xử lý dữ liệu (\\2), xin hãy chờ...</a> (<a href="\\3">Dừng lại</a>)',

	//admin/admincp_tag.php
	'choose_to_delete_the_tag' => 'Vui lòng chọn đúng ít nhất một tag để xóa',
	'to_merge_the_tag_name_of_the_length_discrepancies' => 'Tên tag để gộp không hợp lệ (phải từ 1~30 ký tự)',
	'the_tag_choose_to_merge' => 'Vui lòng chọn đúng ít nhất một tag để gộp',
	'choose_to_operate_tag' => 'Vui lòng chọn đúng ít nhất một tag để thao tác',

	//admin/admincp_template.php
	'designated_template_files_can_not_be_restored' => 'Tệp mẫu chỉ định không thể phục hồi',
	'template_files_editing_failure_check_directory_competence' => 'Không thể chỉnh sửa tệp mẫu, vui lòng kiểm tra quyền thư mục ./template',

	//admin/admincp_thread.php
	'choosing_to_operate_the_topic' => 'Vui lòng chọn đúng chủ đề để thao tác',

	//admin/admincp_usergroup.php
	'user_group_does_not_exist' => 'Nhóm người dùng chỉ định không tồn tại',
	'user_group_were_not_empty' => 'Tên nhóm người dùng chỉ định không được để trống',
	'integral_limit_duplication_with_other_user_group' => 'Giới hạn điểm của nhóm này trùng với nhóm khác',
	'system_user_group_could_not_be_deleted' => 'Nhóm người dùng hệ thống không thể xóa',
	'integral_limit_error' => 'Giới hạn điểm phải nhỏ hơn hoặc bằng 999999999, không nhỏ hơn -999999998',

	//admin/admincp_userapp.php
	'my_register_sucess' => 'Đã kích hoạt thành công dịch vụ Ứng dụng người dùng',
	'my_register_error' => 'Kích hoạt dịch vụ Ứng dụng người dùng thất bại, lý do:<br>\\2 (ERRCODE:\\1)<br><br><a href="http://www.discuz.net/index.php?gid=141" target="_blank">Nếu cần giúp đỡ, hãy hỏi tại diễn đàn kỹ thuật của chúng tôi</a>。',
	'sitefeed_error' => 'Vui lòng thêm đúng tiêu đề và nội dung động trước khi gửi',

	//admin/admincp_event.php
	'choose_to_delete_the_columns_event'=>'Vui lòng chọn hoạt động cần xóa',
	'choose_to_grade_the_columns_event'=>'Vui lòng chọn trạng thái hoạt động để thiết lập, trạng thái mới không được trùng trạng thái cũ',
	'have_no_eventclass'=>'Xóa thất bại, vui lòng giữ lại ít nhất một loại hoạt động',
	'poster_only_jpg_allowed'=>'Máy chủ của bạn không hỗ trợ tạo hình thu nhỏ, bạn chỉ có thể tải lên ảnh jpg tại đây'

);

?>