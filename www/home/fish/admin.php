<?php

# Quảng lý bên trong


include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

//Kiểm tra quyền truy cập
$auth && die('0|&|' . $auth);
if(!in_array($_QFG['uid'], $_QSC['adminer'])) {
die('0|&|ở đây không phải là vị trí của bạn trong quá khứ');
}


//Xác định để cho phép truy cập vào các ứng dụng
$mod_list = array(
	'home', //Quản lý trang chủ
	'quick', //Các phím tắt
	'system', //Cấu hình hệ thống
	'notice', //Thông báo
	'user_list', //Danh sách thành viên
	'user_edit', //Quản lý thành viên
	'user_delete' //Xóa thành viên
);

//Xây dựng tên ứng dụng
$mod_name = $_REQUEST['mod'] ? $_REQUEST['mod'] : 'home';
$mod_name .= $_REQUEST['act'] ? '_' . $_REQUEST['act'] : '';
$mod_name = strtolower($mod_name);

//Tải ứng dụng
if(in_array($mod_name, $mod_list)) {
	include_once("source/admin/mod/{$mod_name}.php");
} else
die("0|&|Tham số bị lỗi");

?>