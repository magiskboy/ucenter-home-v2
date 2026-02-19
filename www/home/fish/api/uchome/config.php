<?php

# Cấu hình cho Home và Fish

// Luôn thiết lập dbConf để tránh MySQL 2002 (cache có thể thiếu dbConf)
if (empty($_QSC['dbConf']) && !empty($_QSC['db'])) {
	$_QSC['dbConf'] = array(
		'dbhost'   => $_QSC['db']['dbhost'],
		'dbuser'   => $_QSC['db']['dbuser'],
		'dbpwd'    => isset($_QSC['db']['dbpwd']) ? $_QSC['db']['dbpwd'] : (isset($_QSC['db']['dbpass']) ? $_QSC['db']['dbpass'] : ''),
		'dbname'   => $_QSC['db']['dbname'],
		'charset'  => $_QSC['db']['charset'],
		'pconnect' => $_QSC['db']['pconnect'],
		'tbprefix' => $_QSC['db']['tbprefix'],
	);
}

if(!$_QSC['UC_KEY']) {

	if(@include_once(dirname(FARM_ROOT) . '/config.php')) {
		$_SC || $_SC = $GLOBALS['_SC'];
	} else die('Không thể tải yêu cầu UCHome profile');

	//Thanh danh sách người sáng lập
	$founder = explode(',', $_SC['founder']);
	$_QSC['adminer'] = array_merge($founder, (array)$_QSC['adminer']);
	$_QSC['adminer'] = array_unique($_QSC['adminer']);

	//Tham số cơ sở dữ liệu
	$_QSC['dbConf']['dbhost'] = $_SC['dbhost']; //Host
	$_QSC['dbConf']['dbuser'] = $_SC['dbuser']; //Username
	$_QSC['dbConf']['dbpwd'] = $_SC['dbpw']; //Password
	$_QSC['dbConf']['dbname'] = $_SC['dbname']; //Database
	$_QSC['dbConf']['charset'] = 'utf8'; //Ngôn ngữ mặc định, không cần thay đổi
	$_QSC['dbConf']['pconnect'] = $_SC['pconnect']; //Kết nối liên tục
	$_QSC['dbConf']['tbprefix'] = $_SC['tablepre']; //Tên tiền tố

	//Các thông số
	$_QSC['charset'] = $_SC['charset']; //Đặt ký tự trang
	$_QSC['cookiepre'] = $_SC['cookiepre']; //Cookie
	$_QSC['UC_APPID'] = UC_APPID;
	$_QSC['UC_KEY'] = UC_KEY;
	$_QSC['UC_API'] = UC_API;
	
	//Thông tin bộ nhớ
	qf_putCache('QSC', $_QSC);

}

?>