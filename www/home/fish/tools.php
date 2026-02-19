<?php

# Giao diện quản lý

include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);


//Xác định quyền truy cập
$mod_list = array(
	'exchange', //Mua lại
	'setting'//Cài đặt game
);

//Xây dựng tên ứng dụng
$mod_name = $_REQUEST['mod'] ? $_REQUEST['mod'] : '';
$mod_name .= $_REQUEST['act'] ? '_' . $_REQUEST['act'] : '';
$mod_name = strtolower($mod_name);

//Tải ứng dụng
if(in_array($mod_name, $mod_list)) {
	include_once("source/tools/mod/{$mod_name}.php");
} else {
	die('Lỗi tham số');
}

?>