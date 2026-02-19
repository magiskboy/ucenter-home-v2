<?php

# Thư viện công cộng
# create by seaif@zealv.com

//Nhận bảng tên
function qf_getTName($name) {
	global $_QSC;
	return $_QSC['dbConf']['tbprefix'] . str_replace('fish', 'fish', $name);
}

/**
 * Tiêu bản gọi
 */
function qf_getView($name) {
	global $_QFG, $_QSC;
	if(!$_QFG['TPL']) {
		include_once('source/template.class.php');
		$_QFG['TPL'] = STemplate::getInstance($_QSC['view']);
	}
	$_QFG['TPL']->show($name);
}

/**
 * Lỗi Capture
 */
function qf_error_handler($errno, $errstr, $errfile, $errline) {
	if(in_array($errno, array(8, 1024, 8192))) return;//Bỏ qua một số lỗi
	$time = date("Y/m/d h:i:s");
	$errdata =
		"Message: [{$time}] {$_SERVER['REQUEST_URI']} \r\n" .
		"  Error: {$errstr} \r\n" .
		"         on line $errline in $errfile \r\n" .
		"  Errno: {$errno} \r\n \r\n";
	error_log($errdata, 3, "data/logs/#php_error.log");
}

/**
 * Mức độ kinh nghiệm sẽ được chuyển đổi thành
 */
function qf_toExp($lv) {
	return intval(pow(($lv + 0.5), 2) * 100 - 25);
}

/**
 * Sẽ được chuyển đổi thành cấp độ kinh nghiệm
 */
function qf_toLevel($exp) {
	return floor(sqrt(($exp + 25) / 100) - 0.5);
}



/**
 * Mô tả: JSON serialization
 *   Đầu ra dữ liệu cho khách hàng sử dụng
 */
function qf_jsonCode($data) {
	$data = json_encode($data);
	$data = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $data);
	return $data;
}

//xieph	Ao cá
function ui_jsonCode($data) {
	$data = json_encode($data);
	$data = str_replace("\\\u","\\u",$data);
	$data = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $data);
	return $data;
}
//_xieph

/**
 * Mô tả: QF tự mã hóa, các JSON mặc định
 *   Cho biết sẽ được lưu trữ trong cơ sở dữ liệu của PHP serialization, cấu trúc dữ liệu
 */
function qf_encode($data) {
	$data = json_encode($data);
	$data = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $data);
	return $data;
}

/**
 * Mô tả: tự giải mã QF-, các JSON mặc định, sử dụng unserialize
 *   Hủy bỏ các dữ liệu từ cơ sở dữ liệu để khôi phục lại cấu trúc dữ liệu PHP
 */
function qf_decode($data) {
	return (array)json_decode($data, true);
}

/**
 * Căn cứ chức năng: addslashes()
 * Chức năng Mô tả: Thêm một chuỗi hoặc một mảng thoát
 */
function qf_addslashes($value) {
	if(is_array($value)) {
		foreach($value as $k => $v) {
			$value[$k] = qf_addslashes($v);
		}
		return $value;
	}
	return addslashes($value);
}

/**
 * Căn cứ chức năng: stripslashes()
 * Chức năng mô tả: Huỷ bỏ một chuỗi hoặc một mảng thoát
 */
function qf_stripslashes($value) {
	if(is_array($value)) {
		foreach($value as $k => $v) {
			$value[$k] = qf_stripslashes($v);
		}
		return $value;
	}
	return stripslashes($value);
}

?>