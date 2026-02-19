<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	UCHome lang: Tiếng Việt (vi_VN). Mock: nội dung là bản copy tiếng Trung, sửa value thành tiếng Việt.
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['msglang'] = array(

	'box_title' => 'Tin nhắn',

	//common
	'do_success' => 'Thao tác đã hoàn tất',
	'no_privilege' => 'Bạn hiện không có quyền thực hiện thao tác này',
	'no_privilege_realname' => 'Bạn cần điền họ tên thật trước khi thực hiện thao tác này, <a href="cp.php?ac=profile">bấm vào đây để cài đặt họ tên thật</a>',
	'no_privilege_videophoto' => 'Bạn cần xác thực video thành công mới được thực hiện thao tác này, <a href="cp.php?ac=videophoto">bấm vào đây để xác thực video</a>',
	'no_open_videophoto' => 'Chức năng xác thực video hiện đã bị tắt trên website',
	'is_blacklist' => 'Do thiết lập quyền riêng tư của đối phương, bạn hiện không có quyền thực hiện thao tác này',
	'no_privilege_newusertime' => 'Bạn hiện đang trong thời gian thử việc, cần đợi \\1 giờ nữa để thực hiện thao tác này',
	'no_privilege_avatar' => 'Bạn cần đặt ảnh đại diện để thực hiện thao tác này, <a href="cp.php?ac=avatar">bấm vào đây để cài đặt</a>',
	'no_privilege_friendnum' => 'Bạn cần thêm \\1 người bạn mới thực hiện được thao tác này, <a href="cp.php?ac=friend&op=find">bấm vào đây để thêm bạn</a>',
	'no_privilege_email' => 'Bạn cần xác minh và kích hoạt email để thực hiện thao tác này, <a href="cp.php?ac=profile&op=contact">bấm vào đây để kích hoạt email</a>',
	'uniqueemail_check' => 'Địa chỉ email đã được sử dụng, vui lòng thử email khác',
	'uniqueemail_recheck' => 'Địa chỉ email bạn muốn xác nhận đã được kích hoạt, vui lòng vào hồ sơ cá nhân để cài đặt lại email',
	'you_do_not_have_permission_to_visit' => 'Bạn đã bị cấm truy cập.',

	//mt.php
	'designated_election_it_does_not_exist' => 'Nhóm được chỉ định không tồn tại, bạn có thể thử tạo mới',
	'mtag_tagname_error' => 'Tên nhóm cài đặt không đúng theo yêu cầu',
	'mtag_join_error' => 'Tham gia nhóm chỉ định thất bại, vui lòng thử tìm kiếm và tham gia nhóm liên quan khác',
	'mtag_join_field_error' => 'Loại nhóm \\1 chỉ cho phép tối đa tham gia \\2 nhóm, bạn đã đến giới hạn',
	'mtag_creat_error' => 'Nhóm bạn muốn xem hiện chưa được tạo',

	//index.php
	'enter_the_space' => 'Vào trang không gian cá nhân',

	//network.php
	'points_deducted_yes_or_no' => 'Thao tác này sẽ trừ của bạn \\1 điểm, \\2 kinh nghiệm, xác nhận tiếp tục?<br><br><a href="\\3" class="submit">Tiếp tục thao tác</a> &nbsp; <a href="javascript:history.go(-1);" class="button">Hủy</a>',
	'points_search_error' => "Điểm hoặc kinh nghiệm hiện tại của bạn không đủ, không thể hoàn thành tìm kiếm này",

	//source/cp_album.php
	'photos_do_not_support_the_default_settings' => 'Album mặc định không hỗ trợ cài đặt này',
	'album_name_errors' => 'Bạn chưa đặt tên album đúng cách',

	//source/space_app.php
	'correct_choice_for_application_show' => 'Vui lòng chọn đúng ứng dụng để xem',

	//source/do_login.php
	'users_were_not_empty_please_re_login' => 'Xin lỗi, tên người dùng không được để trống, vui lòng đăng nhập lại',
	'login_failure_please_re_login' => 'Xin lỗi, đăng nhập thất bại, vui lòng đăng nhập lại',

	//source/cp_blog.php
	'no_authority_expiration_date' => 'Quyền hạn hiện tại của bạn đã bị quản trị viên tạm hạn, thời gian phục hồi: \\1',
	'no_authority_expiration' => 'Quyền hạn hiện tại của bạn đã bị quản trị viên hạn chế, mong bạn thông cảm',
	'no_authority_to_add_log' => 'Bạn không có quyền đăng bài viết',
	'no_authority_operation_of_the_log' => 'Bạn không có quyền thao tác với bài viết này',
	'that_should_at_least_write_things' => 'Bạn nên viết ít nhất một chút nội dung',
	'failed_to_delete_operation' => 'Xóa thất bại, vui lòng kiểm tra lại thao tác',

	'click_error' => 'Không thực hiện thao tác đánh giá hợp lệ',
	'click_item_error' => 'Đối tượng cần đánh giá không tồn tại',
	'click_no_self' => 'Bạn không thể tự đánh giá cho chính mình',
	'click_have' => 'Bạn đã đánh giá rồi',
	'click_success' => 'Đánh giá thành công',

	//source/cp_class.php
	'did_not_specify_the_type_of_operation' => 'Không xác định đúng danh mục cần thao tác',
	'enter_the_correct_class_name' => 'Vui lòng nhập tên danh mục hợp lệ',

	'note_wall_reply_success' => 'Đã trả lời lên tường lời nhắn của \\1',

	//source/cp_comment.php

	'operating_too_fast' => "Đăng bài quá nhanh, vui lòng đợi \\1 giây nữa",
	'content_is_too_short' => 'Nội dung nhập vào không được ít hơn 2 ký tự',
	'comments_do_not_exist' => 'Bình luận được chỉ định không tồn tại',
	'do_not_accept_comments' => 'Bài viết này không chấp nhận bình luận',
	'sharing_does_not_exist' => 'Chia sẻ được bình luận không tồn tại',
	'non_normal_operation' => 'Thao tác bất thường',
	'the_vote_only_allows_friends_to_comment' => 'Bình chọn này chỉ cho bạn bè bình luận',

	//source/cp_common.php
	'security_exit' => 'Bạn đã thoát an toàn khỏi \\1',

	//source/cp_doing.php
	'should_write_that' => 'Bạn nên viết ít nhất một chút nội dung',
	'docomment_error' => 'Vui lòng xác định đúng bản ghi cần bình luận',

	//source/cp_invite.php
	'mail_can_not_be_empty' => 'Danh sách email không được để trống',
	'send_result_1' => 'Email đã gửi đi, bạn của bạn có thể sẽ nhận được sau một vài phút',
	'send_result_2' => '<strong>Các email gửi thất bại:</strong><br/>\\1',
	'send_result_3' => 'Không tìm thấy bản ghi mời tương ứng, gửi lại email thất bại.',
	'there_is_no_record_of_invitation_specified' => 'Bản ghi lời mời bạn chỉ định không tồn tại',

	//source/cp_import.php
	'blog_import_no_result' => '"Không lấy được dữ liệu gốc, vui lòng kiểm tra lại URL trang web và tài khoản đã nhập chính xác, máy chủ trả về:<br /><textarea name=\"tmp[]\" style=\"width:98%;\" rows=\"4\">\\1</textarea>"',
	'blog_import_no_data' => 'Lấy dữ liệu thất bại, tham khảo kết quả trả về của máy chủ:<br />\\1',
	'support_function_has_not_yet_opened fsockopen' => 'Website chưa mở chức năng fsockopen, không dùng được tính năng này',
	'integral_inadequate' => "Điểm hiện tại của bạn \\1 không đủ để thực hiện thao tác này. Thao tác này yêu cầu điểm: \\2",
	'experience_inadequate' => "Kinh nghiệm hiện tại của bạn\\1 không đủ để thực hiện thao tác này. Thao tác này cần kinh nghiệm: \\2",
	'url_is_not_correct' => 'URL trang web nhập vào không đúng',
	'choose_at_least_one_log' => 'Vui lòng chọn ít nhất một bài viết để nhập',

	//source/cp_friend.php
	'friends_add' => 'Bạn và \\1 đã trở thành bạn bè',
	'you_have_friends' => 'Hai bạn đã là bạn bè',
	'enough_of_the_number_of_friends' => 'Số lượng bạn hiện tại của bạn đã đạt tới giới hạn, vui lòng xóa bớt bạn bè',
	'enough_of_the_number_of_friends_with_magic' => 'Số lượng bạn vượt giới hạn, <a id="a_magic_friendnum2" href="magic.php?mid=friendnum" onclick="ajaxmenu(event, this.id, 1)">dùng thẻ tăng số bạn bè</a>',
	'request_has_been_sent' => 'Yêu cầu kết bạn đã gửi, vui lòng đợi xác thực từ đối phương',
	'waiting_for_the_other_test' => 'Đang đợi xác thực từ đối phương',
	'please_correct_choice_groups_friend' => 'Vui lòng chọn đúng nhóm bạn',
	'specified_user_is_not_your_friend' => 'Người dùng chỉ định chưa phải là bạn bè của bạn',

	//source/cp_mtag.php
	'mtag_managemember_no_privilege' => 'Bạn không thể thay đổi quyền nhóm cho thành viên được chọn, vui lòng chọn lại',
	'mtag_max_inputnum' => 'Không thể tham gia, số nhóm của bạn tại danh mục "\\1" đã đạt tối đa \\2',
	'you_are_already_a_member' => 'Bạn đã là thành viên nhóm này',
	'join_success' => 'Tham gia thành công, bạn đã là thành viên của nhóm',
	'the_discussion_topic_does_not_exist' => 'Xin lỗi, chủ đề đang thảo luận không tồn tại',
	'content_is_not_less_than_four_characters' => 'Xin lỗi, nội dung không được ít hơn 2 ký tự',
	'you_are_not_a_member_of' => 'Bạn không phải là thành viên của nhóm này',
	'unable_to_manage_self' => 'Bạn không thể thao tác với chính mình',
	'mtag_joinperm_1' => 'Bạn đã chọn vào nhóm này, hãy đợi chủ nhóm kiểm duyệt đơn đăng ký',
	'mtag_joinperm_2' => 'Nhóm này cần lời mời của chủ nhóm để được tham gia',
	'invite_mtag_ok' => 'Đã vào nhóm thành công, bạn có thể: <a href="space.php?do=mtag&tagid=\\1" target="_blank">truy cập nhóm ngay</a>',
	'invite_mtag_cancel' => 'Đã bỏ qua lời mời tham gia nhóm',
	'failure_to_withdraw_from_group' => 'Thoát nhóm kín thất bại, vui lòng chỉ định một chủ nhiệm chính',
	'fill_out_the_grounds_for_the_application' => 'Vui lòng nhập lý do ứng tuyển làm chủ nhóm',

	//source/cp_pm.php
	'this_message_could_not_be_deleted' => 'Tin nhắn chỉ định không thể bị xóa',
	'unable_to_send_air_news' => 'Không thể gửi tin nhắn trống',
	'message_can_not_send' => 'Xin lỗi, gửi tin nhắn thất bại',
	'message_can_not_send1' => 'Gửi thất bại, bạn đã vượt quá số tin nhắn tối đa cho phép trong 24h',
	'message_can_not_send2' => 'Gửi tin nhắn quá nhanh, vui lòng thử lại sau',
	'message_can_not_send3' => 'Bạn không thể gửi tin nhắn hàng loạt cho người không phải bạn bè',
	'message_can_not_send4' => 'Hiện tại bạn chưa được gửi tin nhắn',
	'not_to_their_own_greeted' => 'Không thể chào chính mình',
	'has_been_hailed_overlooked' => 'Lời chào đã bị bỏ qua',

	//source/cp_profile.php
	'realname_too_short' => 'Tên thật không được dưới 4 ký tự',
	'update_on_successful_individuals' => 'Đã cập nhật hồ sơ cá nhân thành công',

	//source/cp_poll.php
	'no_authority_to_add_poll' => 'Bạn không có quyền thêm bình chọn',
	'no_authority_operation_of_the_poll' => 'Bạn không có quyền thao tác với bình chọn này',
	'add_at_least_two_further_options' => 'Vui lòng thêm ít nhất hai lựa chọn khác nhau',
	'the_total_reward_should_not_overrun' => 'Tổng thưởng của bạn không được vượt quá \\1',
	'wrong_total_reward' => 'Tổng thưởng không được nhỏ hơn thưởng trung bình',
	'voting_does_not_exist' => 'Thông tin bình chọn không tồn tại',
	'already_voted' => 'Bạn đã bình chọn rồi',
	'option_exceeds_the_maximum_number_of' => 'Không thể thêm nữa, số lựa chọn tối đa là 20',
	'the_total_reward_should_not_be_empty' => 'Tổng thưởng không được để trống',
	'average_reward_should_not_be_empty' => 'Mỗi người trúng thưởng trung bình không được để trống',
	'average_reward_can_not_exceed' => 'Mỗi người trúng thưởng tối đa không vượt quá \\1 điểm',
	'added_option_should_not_be_empty' => 'Lựa chọn vừa thêm không được để trống',
	'time_expired_error' => 'Thời gian hết hạn không được nhỏ hơn thời gian hiện tại',
	'please_select_items_to_vote' => 'Vui lòng chọn ít nhất một mục để bình chọn',
	'fill_in_at_least_an_additional_value' => 'Hãy thêm ít nhất một giá trị bổ sung',

	//source/cp_share.php
	'blog_does_not_exist' => 'Bài viết được chỉ định không tồn tại',
	'logs_can_not_share' => 'Bài viết được chỉ định không được phép chia sẻ do thiết lập riêng tư',
	'album_does_not_exist' => 'Album được chỉ định không tồn tại',
	'album_can_not_share' => 'Album được chỉ định không được phép chia sẻ do thiết lập riêng tư',
	'image_does_not_exist' => 'Ảnh được chỉ định không tồn tại',
	'image_can_not_share' => 'Ảnh được chỉ định không được phép chia sẻ do thiết lập riêng tư',
	'topics_does_not_exist' => 'Chủ đề được chỉ định không tồn tại',
	'mtag_fieldid_does_not_exist' => 'Phân loại nhóm được chỉ định không tồn tại',
	'tag_does_not_exist' => 'Nhãn được chỉ định không tồn tại',
	'url_incorrect_format' => 'Định dạng URL chia sẻ không đúng',
	'description_share_input' => 'Vui lòng nhập mô tả chia sẻ',
	'poll_does_not_exist' => 'Bình chọn chỉ định không tồn tại',
	'share_not_self' => 'Bạn không thể chia sẻ bài (hoặc ảnh) của chính mình',
	'share_space_not_self' => 'Bạn không thể chia sẻ trang chủ của mình',

	//source/cp_space.php
	'domain_length_error' => 'Tên miền phụ phải có độ dài ít nhất \\1 ký tự',
	'credits_exchange_invalid' => 'Chương trình đổi điểm bị lỗi, không thể thực hiện đổi, vui lòng quay lại chỉnh sửa.',
	'credits_transaction_amount_invalid' => 'Số điểm chuyển hoặc đổi nhập vào không hợp lệ, vui lòng quay lại chỉnh sửa.',
	'credits_password_invalid' => 'Bạn chưa nhập hoặc nhập sai mật khẩu, không thể thực hiện thao tác điểm, vui lòng quay lại.',
	'credits_balance_insufficient' => 'Xin lỗi, số dư điểm chưa đủ, đổi thất bại, vui lòng quay lại.',
	'extcredits_dataerror' => 'Đổi thất bại, vui lòng liên hệ quản trị viên.',
	'domain_be_retained' => 'Tên miền bạn đặt bị hệ thống giữ lại, vui lòng chọn tên khác',
	'not_enabled_this_feature' => 'Tính năng này chưa được mở',
	'space_size_inappropriate' => 'Vui lòng chỉ định đúng dung lượng muốn đổi dùng cho tải lên',
	'space_does_not_exist' => 'Xin lỗi, không gian của người dùng được chỉ định không tồn tại.',
	'integral_convertible_unopened' => 'Tính năng đổi điểm hiện chưa được mở',
	'two_domain_have_been_occupied' => 'Tên miền phụ đã có người sử dụng',
	'only_two_names_from_english_composition_and_figures' => 'Tên miền phụ phải bắt đầu bằng chữ cái, chỉ gồm chữ cái và số',
	'two_domain_length_not_more_than_30_characters' => 'Tên miền phụ không được dài quá 30 ký tự',
	'old_password_invalid' => 'Bạn chưa nhập đúng mật khẩu cũ hoặc nhập sai, vui lòng nhập lại.',
	'no_change' => 'Không có thay đổi nào',
	'protection_of_users' => 'Tài khoản được bảo vệ, không có quyền sửa đổi',

	//source/cp_sendmail.php
	'email_input' => 'Bạn chưa cài đặt email, vui lòng điền chính xác địa chỉ email tại <a href="cp.php?ac=profile&op=contact">Thông tin liên hệ</a>',
	'email_check_sucess' => 'Email (\\1) của bạn đã được xác thực thành công',
	'email_check_error' => 'Liên kết xác thực email bạn nhập không đúng. Trong trang cá nhân có thể yêu cầu gửi lại liên kết xác thực mới.',
	'email_check_send' => 'Liên kết xác thực đã gửi đến email mới điền, bạn sẽ nhận được email kích hoạt trong vài phút, vui lòng kiểm tra hộp thư.',
	'email_error' => 'Định dạng email không đúng, vui lòng nhập lại',

	//source/cp_theme.php
	'theme_does_not_exist' => 'Giao diện chỉ định không tồn tại',
	'css_contains_elements_of_insecurity' => 'Nội dung bạn gửi chứa thành phần không an toàn',

	//source/cp_upload.php
	'upload_images_completed' => 'Tải ảnh lên thành công',

	//source/cp_thread.php
	'to_login' => 'Bạn cần đăng nhập để tiếp tục thao tác',
	'title_not_too_little' => 'Tiêu đề không được dưới 2 ký tự',
	'posting_does_not_exist' => 'Chủ đề được chỉ định không tồn tại',
	'settings_of_your_mtag' => 'Cần có nhóm mới đăng được chủ đề. Bạn nên thiết lập nhóm trước.<br>Thông qua nhóm, bạn sẽ gặp các bạn có chung sở thích, có thể cùng trao đổi.<br><br><a href="cp.php?ac=mtag" class="submit">Thiết lập nhóm của tôi</a>',
	'first_select_a_mtag' => 'Bạn nên chọn ít nhất một nhóm mới được đăng chủ đề.<br><br><a href="cp.php?ac=mtag" class="submit">Thiết lập nhóm của tôi</a>',
	'no_mtag_allow_thread' => 'Số thành viên nhóm bạn tham gia chưa đủ để đăng chủ đề.<br><br><a href="cp.php?ac=mtag" class="submit">Thiết lập nhóm của tôi</a>',
	'mtag_close' => 'Nhóm được chọn đã khóa, không thể thực hiện thao tác này',

	//source/space_album.php
	'to_view_the_photo_does_not_exist' => 'Có lỗi, album bạn muốn xem không tồn tại',

	//source/space_blog.php
	'view_to_info_did_not_exist' => 'Có lỗi, thông tin bạn muốn xem không tồn tại hoặc đã bị xóa',

	//source/space_pic.php
	'view_images_do_not_exist' => 'Ảnh bạn muốn xem không tồn tại',

	//source/mt_thread.php
	'topic_does_not_exist' => 'Chủ đề chỉ định không tồn tại',

	//source/do_inputpwd.php
	'news_does_not_exist' => 'Thông tin chỉ định không tồn tại',
	'proved_to_be_successful' => 'Xác thực thành công, chuyển vào trang xem',
	'password_is_not_passed' => 'Mật khẩu đăng nhập website nhập vào không đúng, vui lòng kiểm tra lại',



	//source/do_login.php
	'login_success' => 'Đăng nhập thành công, chuyển hướng vào trang trước đăng nhập \\1',
	'not_open_registration' => 'Rất tiếc, hiện tại website chưa mở đăng ký',
	'not_open_registration_invite' => 'Rất tiếc, website hiện chỉ cho đăng ký qua liên kết mời từ bạn bè',

	//source/do_lostpasswd.php
	'getpasswd_account_notmatch' => 'Thông tin tài khoản của bạn chưa có địa chỉ email đầy đủ, không thể lấy lại mật khẩu, nếu có thắc mắc xin liên hệ với quản trị viên.',
	'getpasswd_email_notmatch' => 'Email nhập vào không trùng với tên đăng nhập, vui lòng kiểm tra lại.',
	'getpasswd_send_succeed' => 'Cách lấy lại mật khẩu đã được gửi về email của bạn,<br />vui lòng đổi mật khẩu trong vòng 3 ngày.',
	'user_does_not_exist' => 'Tài khoản người dùng không tồn tại',
	'getpasswd_illegal' => 'ID bạn dùng không tồn tại hoặc đã hết hạn, không thể lấy lại mật khẩu.',
	'profile_passwd_illegal' => 'Mật khẩu để trống hoặc chứa ký tự không hợp lệ, vui lòng nhập lại.',
	'getpasswd_succeed' => 'Mật khẩu đã được đặt lại, vui lòng dùng mật khẩu mới để đăng nhập.',
	'getpasswd_account_invalid' => 'Xin lỗi, người sáng lập, tài khoản được bảo vệ hoặc người có quyền cài đặt website không được phép lấy lại mật khẩu, vui lòng quay lại.',
	'reset_passwd_account_invalid' => 'Xin lỗi, người sáng lập, tài khoản được bảo vệ hoặc người có quyền cài đặt website không được phép đặt lại mật khẩu, vui lòng quay lại.',

	//source/do_register.php
	'registered' => 'Đăng ký thành công, vào không gian cá nhân',
	'system_error' => 'Lỗi hệ thống, không tìm thấy tập tin UCenter Client',
	'password_inconsistency' => 'Mật khẩu nhập hai lần không giống nhau',
	'profile_passwd_illegal' => 'Mật khẩu để trống hoặc chứa ký tự không hợp lệ, vui lòng nhập lại.',
	'user_name_is_not_legitimate' => 'Tên đăng nhập không hợp lệ',
	'include_not_registered_words' => 'Tên người dùng chứa từ không cho phép đăng ký',
	'user_name_already_exists' => 'Tên tài khoản đã tồn tại',
	'email_format_is_wrong' => 'Định dạng Email không đúng',
	'email_not_registered' => 'Email không được phép đăng ký',
	'email_has_been_registered' => 'Email này đã đăng ký',
	'regip_has_been_registered' => 'Cùng một IP chỉ cho phép đăng ký tài khoản mỗi \\1 giờ một lần',
	'register_error' => 'Đăng ký thất bại',

	//tag.php
	'tag_does_not_exist' => 'Nhãn chỉ định không tồn tại',

	//cp_poke.php
	'poke_success' => 'Đã gửi, \\1 sẽ nhận được thông báo khi truy cập tiếp theo',
	'mtag_minnum_erro' => 'Số thành viên nhóm này còn dưới \\1, chưa đủ để thực hiện thao tác',

	//source/function_common.php
	'information_contains_the_shielding_text' => 'Xin lỗi, nội dung bạn gửi chứa từ khóa bị cấm',
	'site_temporarily_closed' => 'Website tạm thời đóng cửa',
	'ip_is_not_allowed_to_visit' => 'Không thể truy cập, địa chỉ IP của bạn nằm ngoài phạm vi cho phép.',
	'no_data_pages' => 'Trang chỉ định đã hết dữ liệu',
	'length_is_not_within_the_scope_of' => 'Số trang không đúng phạm vi cho phép',

	//source/function_block.php
	'page_number_is_beyond' => 'Số trang vượt quá phạm vi',
	//source/function_cp.php
	'incorrect_code' => 'Mã xác nhận nhập vào không đúng, vui lòng kiểm tra lại',

	//source/function_space.php
	'the_space_has_been_closed' => 'Không gian bạn muốn truy cập đã bị xóa, thắc mắc xin liên hệ quản trị viên',

	//source/network_album.php
	'search_short_interval' => 'Khoảng cách giữa hai lần tìm kiếm quá ngắn, vui lòng chờ thêm \\1 giây (<a href="\\2">Tìm kiếm lại</a>)',
	'set_the_correct_search_content' => 'Xin lỗi, vui lòng nhập đúng nội dung tìm kiếm',

	//source/space_share.php
	'share_does_not_exist' => 'Chia sẻ bạn muốn xem không tồn tại',

	//source/space_tag.php
	'tag_locked' => 'Thẻ đã bị khóa',

	'invite_error' => 'Không lấy được mã mời bạn bè, vui lòng kiểm tra đủ điểm để thực hiện thao tác',
	'invite_code_error' => 'Xin lỗi, liên kết mời bạn truy cập không đúng, vui lòng kiểm tra lại.',
	'invite_code_fuid' => 'Xin lỗi, liên kết mời này đã được người khác dùng rồi.',

	//source/do_invite.php
	'should_not_invite_your_own' => 'Xin lỗi, bạn không thể dùng liên kết mời của mình để mời chính mình.',
	'close_invite' => 'Xin lỗi, hệ thống đã tắt chức năng mời bạn bè',

	'field_required' => 'Trường bắt buộc “\\1” trong hồ sơ không được bỏ trống, vui lòng kiểm tra',
	'friend_self_error' => 'Xin lỗi, không thể thêm chính mình vào danh sách bạn bè',
	'change_friend_groupname_error' => 'Nhóm bạn bè chỉ định không thể thao tác',

	'mtag_not_allow_to_do' => 'Bạn không phải thành viên nhóm chứa chủ đề này, không có quyền thao tác',

	//cp_task
	'task_unavailable' => 'Nhiệm vụ thưởng bạn muốn tham gia không tồn tại hoặc chưa bắt đầu',
	'task_maxnum' => 'Nhiệm vụ thưởng bạn tham gia đã đạt tới số người tối đa, nhiệm vụ tự động vô hiệu',
	'update_your_mood' => 'Vui lòng cập nhật trạng thái tâm trạng của bạn trước',

	'showcredit_error' => 'Số điểm điền vào phải lớn hơn 0 và nhỏ hơn số điểm hiện có, vui lòng kiểm tra',
	'showcredit_fuid_error' => 'Người dùng chỉ định chưa phải bạn bè của bạn, vui lòng kiểm tra',
	'showcredit_do_success' => 'Bạn đã tăng thành công điểm xếp hạng, hãy kiểm tra thứ hạng mới của mình',
	'showcredit_friend_do_success' => 'Bạn đã tặng thành công điểm xếp hạng cho bạn bè, bạn bè sẽ được thông báo',

	'submit_invalid' => 'Nguồn gửi yêu cầu không hợp lệ hoặc chuỗi xác nhận biểu mẫu không đúng, không thể gửi. Vui lòng thử duyệt web bằng trình duyệt tiêu chuẩn.',
	'no_privilege_my_status' => 'Xin lỗi, trang hiện tại đã đóng chức năng đa ứng dụng của người dùng.',
	'no_privilege_myapp' => 'Xin lỗi, ứng dụng này không tồn tại hoặc đã bị khóa, bạn có thể <a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">chọn ứng dụng khác</a>',

	'report_error' => 'Xin lỗi, vui lòng chỉ định đúng đối tượng cần báo cáo',
	'report_success' => 'Cảm ơn bạn đã báo cáo, chúng tôi sẽ xử lý sớm nhất',
	'manage_no_perm' => 'Bạn chỉ được quản lý nội dung mình đăng <a href="javascript:;" onclick="hideMenu();">[Đóng]</a>',
	'repeat_report' => 'Xin lỗi, không cần báo cáo lặp lại',
	'the_normal_information' => 'Đối tượng bạn báo cáo được quản trị viên xác nhận không vi phạm, không cần báo cáo lại',
	'friend_ignore_next' => 'Đã bỏ qua yêu cầu kết bạn của người dùng \\1, đang xử lý yêu cầu tiếp theo (<a href="cp.php?ac=friend&op=request">Dừng lại</a>)',
	'friend_addconfirm_next' => 'Bạn và \\1 đã là bạn bè, đang xử lý các yêu cầu tiếp theo (<a href="cp.php?ac=friend&op=request">Dừng lại</a>)',

	//source/cp_event.php
	'event_title_empty'=>'Tên hoạt động không được để trống',
	'event_classid_empty'=>'Bắt buộc chọn loại hoạt động',
	'event_city_empty'=>'Bắt buộc chọn thành phố tổ chức hoạt động',
	'event_detail_empty'=>'Bắt buộc nhập chi tiết giới thiệu hoạt động',
	'event_bad_time_range'=>'Thời gian hoạt động không được vượt quá 60 ngày',
	'event_bad_endtime'=>'Thời gian kết thúc không được sớm hơn thời gian bắt đầu',
	'event_bad_deadline'=>'Thời gian kết thúc đăng ký không được muộn hơn thời gian kết thúc hoạt động',
	'event_bad_starttime'=>'Thời gian bắt đầu không được sớm hơn hiện tại',
	'event_already_full'=>'Số lượng người tham gia hoạt động đã đầy',
	'event_will_full' => 'Số lượng quá giới hạn hoạt động',
	'no_privilege_add_event'=>'Bạn không có quyền tạo sự kiện mới',
	'no_privilege_edit_event'=>'Bạn không có quyền chỉnh sửa thông tin sự kiện này',
	'no_privilege_manage_event_members' =>'Bạn không có quyền quản lý thành viên sự kiện này',
	'no_privilege_manage_event_comment' => 'Bạn không có quyền quản lý bình luận của sự kiện này',
	'no_privilege_manage_event_pic' => 'Bạn không có quyền quản lý album ảnh sự kiện này',
	'no_privilege_do_eventinvite' =>'Bạn không có quyền gửi lời mời sự kiện',
	'event_does_not_exist'=>'Sự kiện không tồn tại hoặc đã bị xóa',
	'event_create_failed'=>'Tạo sự kiện thất bại, vui lòng kiểm tra thông tin đã nhập',
	'event_need_verify'=>'Tạo sự kiện thành công, đợi quản trị viên kiểm duyệt',
	'upload_photo_failed'=>'Tải ảnh sự kiện thất bại',
	'choose_right_eventmember'=>'Vui lòng chọn thành viên thích hợp cho thao tác',
	'choose_event_pic'=>'Vui lòng chọn ảnh sự kiện',
	'only_creator_can_set_admin'=>'Chỉ người tạo sự kiện mới có thể đặt người tổ chức khác',
	'event_not_set_verify'=>'Sự kiện không yêu cầu kiểm duyệt',
	'event_join_limit'=>'Sự kiện này chỉ cho phép tham gia bằng lời mời',
	'cannot_quit_event'=>'Bạn không thể rời khỏi sự kiện, do bạn chưa tham gia hoặc bạn là người tạo sự kiện',
	'event_not_public'=>'Đây là sự kiện riêng tư, chỉ xem được khi được mời',
	'no_privilege_do_event_invite' => 'Sự kiện này không cho phép mời bạn bè',
	'event_under_verify' => 'Sự kiện này đang chờ kiểm duyệt',
	'cityevent_under_condition' => 'Để xem hoạt động thành phố cần khai báo nơi cư trú',
	'event_is_over' => 'Sự kiện đã kết thúc',
	'event_meet_deadline'=>'Sự kiện đã hết hạn đăng ký',
	'bad_userevent_status'=>'Vui lòng chọn đúng trạng thái thành viên sự kiện',
	'event_has_followed'=>'Bạn đã theo dõi sự kiện này',
	'event_has_joint'=>'Bạn đã tham gia sự kiện này',
	'event_is_closed'=>'Sự kiện đã đóng',
	'event_only_allows_members_to_comment'=>'Sự kiện này chỉ cho phép thành viên bình luận',
	'event_only_allows_admins_to_upload'=>'Chỉ người tổ chức mới được tải ảnh',
	'event_only_allows_members_to_upload'=>'Chỉ thành viên mới được tải ảnh sự kiện',
	'eventinvite_does_not_exist'=>'Bạn không có thư mời sự kiện này',
	'event_can_not_be_opened' => 'Sự kiện này hiện tại chưa mở được',
	'event_can_not_be_closed' => 'Sự kiện này hiện tại chưa đóng được',
	'event_only_allows_member_thread' => 'Chỉ thành viên sự kiện mới được đăng hoặc trả lời chủ đề sự kiện',
	'event_mtag_not_match' => 'Nhóm được chỉ định không liên kết với hoạt động này',
	'event_memberstatus_limit' => 'Sự kiện kín, chỉ thành viên mới được truy cập',
	'choose_event_thread' => 'Vui lòng chọn ít nhất một chủ đề sự kiện để thao tác',

	//source/cp_magic.php
	'magicuse_success' => 'Dùng đạo cụ thành công',
	'unknown_magic' => 'Đạo cụ chỉ định không tồn tại hoặc đã bị cấm',
	'choose_a_magic' => 'Vui lòng chọn một đạo cụ',
	'magic_is_closed' => 'Đạo cụ này đã bị vô hiệu hóa',
	'magic_groupid_not_allowed' => 'Nhóm người dùng của bạn không có quyền dùng đạo cụ',
	'input_right_buynum' => 'Vui lòng nhập đúng số lượng mua',
	'credit_is_not_enough' => 'Điểm của bạn không đủ để mua đạo cụ này',
	'not_enough_storage' => 'Tồn kho đạo cụ không đủ, lần bổ sung tiếp theo vào \\1',
	'magicbuy_success' => 'Mua đạo cụ thành công, tốn điểm \\1',
	'magicbuy_success_with_experence' => 'Mua đạo cụ thành công, tốn điểm \\1, tăng kinh nghiệm \\2',
	'bad_friend_username_given' => 'Tên bạn bè nhập vào không hợp lệ',
	'has_no_more_present_magic' => 'Bạn chưa có giấy phép chuyển nhượng đạo cụ, <a id="a_buy_license" href="cp.php?ac=magic&op=buy&mid=license" onclick="ajaxmenu(event, this.id, 1)">mua ngay</a>',
	'has_no_more_magic' => 'Bạn chưa có đạo cụ \\1, <a id="\\2" href="\\3" onclick="ajaxmenu(event, this.id, 1)">mua ngay</a>',
	'magic_can_not_be_presented' => 'Đạo cụ này không thể tặng',
	'magicpresent_success' => 'Đã tặng đạo cụ thành công cho \\1',
	'magic_store_is_closed' => 'Cửa hàng đạo cụ đã đóng cửa',
	'magic_not_used_under_right_stage' => 'Đạo cụ này không hợp ngữ cảnh hiện tại',
	'magic_groupid_limit' => 'Nhóm người dùng của bạn không được phép mua đạo cụ này',
	'magic_usecount_limit' => 'Bị giới hạn số lần dùng đạo cụ, bạn hãy thử lại sau \\1',
	'magicuse_note_have_no_friend' => 'Bạn chưa có bạn bè nào',
	'magicuse_author_limit' => 'Đạo cụ này chỉ được dùng cho nội dung của mình',
	'magicuse_object_count_limit' => 'Đạo cụ đã dùng cho đối tượng này đạt tối đa (\\1 lần)',
	'magicuse_object_once_limit' => 'Bạn đã từng dùng đạo cụ này cho đối tượng, không thể dùng lại',
	'magicuse_bad_credit_given' => 'Số điểm bạn nhập không hợp lệ',
	'magicuse_not_enough_credit' => 'Số điểm nhập vượt quá số điểm hiện có của bạn',
	'magicuse_bad_chunk_given' => 'Số điểm trao theo phần không hợp lệ',
	'magic_gift_already_given_out' => 'Lì xì đã được phát hết',
	'magic_got_gift' => 'Bạn đã nhận được lì xì: tăng \\1 điểm',
	'magic_had_got_gift' => 'Bạn đã nhận lì xì này rồi',
	'magic_has_no_gift' => 'Không gian hiện không có lì xì',
	'magicuse_object_not_exist' => 'Đối tượng tác động của đạo cụ không tồn tại',
	'magicuse_bad_object' => 'Chưa chọn đúng đối tượng đạo cụ để tác động',
	'magicuse_condition_limit' => 'Không đủ điều kiện dùng đạo cụ',
	'magicuse_bad_dateline' => 'Thời gian nhập vào không hợp lệ',
	'magicuse_not_click_yet' => 'Bạn chưa đánh giá cho thông tin này',
	'not_enough_coupon' => 'Số lượng phiếu giảm giá không đủ',
	'magicuse_has_no_valid_friend' => 'Dùng đạo cụ thất bại, không có bạn bè hợp lệ',
	'magic_not_hidden_yet' => 'Bạn chưa ở trạng thái ẩn danh',
	'magic_not_for_sale' => 'Đạo cụ này không được phép mua',
	'not_set_gift' => 'Bạn chưa lập lì xì nào',
	'not_superstar_yet' => 'Bạn chưa là siêu sao',
	'no_flicker_yet' => 'Bạn chưa hiệu ứng cầu vồng cho thông tin này',
	'no_color_yet' => 'Bạn chưa hiệu ứng đèn màu cho thông tin này',
	'no_frame_yet' => 'Bạn chưa hiệu ứng khung ảnh cho thông tin này',
	'no_bgimage_yet' => 'Bạn chưa hiệu ứng thư nền cho thông tin này',
	'bad_buynum' => 'Số lượng mua nhập vào không hợp lệ',

	'feed_no_found' => 'Nội dung động đang xem không tồn tại',
	'not_open_updatestat' => 'Website chưa mở tính năng thống kê xu hướng',
	
	'topic_subject_error' => 'Tiêu đề chủ đề không được ngắn hơn 4 ký tự',
	'topic_no_found' => 'Sự kiện động chỉ định không tồn tại',
	'topic_list_none' => 'Hiện chưa có sự kiện động nào để tham gia',

	'space_has_been_locked' => 'Không gian đã bị khóa, không thể truy cập, thắc mắc xin liên hệ quản trị viên',

	
);

?>