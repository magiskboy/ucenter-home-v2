<?php

# Tham số tập tin


@error_reporting(0);

define('FARM_SET', 1); //Cố định, không sửa đổi
define('FARM_DEBUG', 3); //Debug mode [= 0: off |> 0: Record MySQL error | = 2: Record PHP Error]
define('FARM_VERSION', '1.1 Final Build 20100505.1100'); //Hệ thống các phiên bản, không sửa đổi
define('FARM_ROOT', str_replace('\\', '/', dirname(__file__))); //Đường dẫn

//for PHP of Version < 5.2.0
if(@version_compare(PHP_VERSION, '5.2.0', '<')) {
	if(@version_compare(PHP_VERSION, '5.0.0', '<')) {
		die('phiên bản PHP của bạn không được hỗ trợ');
	}
	include_once('source/json.func.php');
}

//Tải bộ nhớ
include_once('source/cache.func.php');
qf_getCache(array('QSC','NOTICE'));

//Các biến
$_QFG = array();
$_QFG['uid'] = 0;
$_QFG['timestamp'] = time();

//Chức năng tải công cộng
include_once('source/common.func.php');
error_reporting(FARM_DEBUG == 3 ? 2037 : 0);
FARM_DEBUG == 2 && set_error_handler('qf_error_handler');

//Hủy Magic báo giá
if(get_magic_quotes_gpc()) {
	$_GET = qf_stripslashes($_GET);
	$_POST = qf_stripslashes($_POST);
	$_COOKIE = qf_stripslashes($_COOKIE);
}
if(get_magic_quotes_runtime()) {
	set_magic_quotes_runtime(0);
}

///////////////////////////////////////////////////////////////////////

//Định nghĩa giao diện
define('API_ROOT', FARM_ROOT . '/api/' . $_QSC['apiType']);
include_once(API_ROOT . '/config.php');

//Kết nối với cơ sở dữ liệu
include_once('source/mysql.class.php');
$_QFG['db'] = new dbstuff($_QSC['dbConf']);

//Tải giao diện
include_once(API_ROOT . '/main.php');
$auth = qf_checkauth(); //Kiểm tra trạng thái đăng nhập

$uikey = md5($_QFG['uid'].$_QFG['timestamp']);

//Đóng nông trại và thông báo
if($_QSC['closefarm'] == 0 && !in_array($_QFG['uid'],$_QSC['adminer'])) {
	header('Content-Type:text/html; charset=utf-8');
	echo "<div style='height:200px;line-height:25px;'>".$_QSC['closeinfo']."</div>";
	exit();
}
?>