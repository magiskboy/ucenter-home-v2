<?php

# Quản lý trang chủ

$farmTest = array();

$farmTest['Phiên bản ao cá'][0] = FARM_VERSION;
$farmTest['Phiên bản ao cá'][1] = '<a href="javascript:check_version();">Kiểm tra mới nhất</a> <a href="http://ngoinhaviet.biz/fish" target="_blank">Tải về phiên bản mới nhất</a>';

$farmTest['Máy chủ'][0] = PHP_OS.' / PHP v' . PHP_VERSION;

$farmTest['Cơ sở dữ liệu'][0] = mysql_get_server_info();

if(function_exists('json_encode') & function_exists('json_decode')) {
	$farmTest['PHP JSON Mở rộng'][0] = true;
	if(@version_compare(PHP_VERSION, '5.2.1', '<')) {
		$farmTest['PHP JSON Mở rộng'][1] = "Được hỗ trợ bởi PEAR";
	}
} else {
	$farmTest['PHP JSON Mở rộng'][0] = false;
}

qf_getView("admin/home");

?>