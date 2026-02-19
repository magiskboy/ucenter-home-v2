<?php

# QQFarm Interface For UCHome 2.0

# 链接: http://ngoinhaviet.biz/fish


defined('API_ROOT') || exit('Access denied');


///////////////////////////////Tổng chức năng////////////////////

//Nhận trang chủ cá nhân
function qf_getHomePage($uid = 0) {
	global $_QFG;
	$uid = $uid > 0 ? $uid : $_QFG['uid'];
	return "../space.php?uid=" . $uid;
}

//Nhận địa chỉ
function qf_getheadPic($uid = 0, $size = 'small') {
	global $_QFG, $_QSC;
	$uid = $uid > 0 ? $uid : $_QFG['uid'];
	return $_QSC['UC_API'] . '/avatar.php?uid=' . $uid . '&size=' . $size . '&type=virtual';
}

//Nhận được danh sách bạn bè
function qf_getFriends($uid = 0) {
	global $_QFG;
	$uid = $uid > 0 ? $uid : $_QFG['uid'];
	$friend = array();
	$query = $_QFG['db']->query("SELECT fuid FROM " . qf_getTName('friend') . " WHERE uid='{$uid}' AND status='1'");
	while($value = $_QFG['db']->fetch_array($query)) {
		$friend[] = $value['fuid'];
	}
	return implode(',', $friend);
}

//Nhận tên thực người dùng
function qf_getUserName($uid = 0, $update = false) {
	global $_QFG;
	$uid = $uid > 0 ? $uid : $_QFG['uid'];
	//Truy vấn cơ sở dữ liệu đầu tiên
	if(!$update) {
		$username = $_QFG['db']->result($_QFG['db']->query("SELECT username FROM " . qf_getTName("fish_ui") . " where uid=" . $uid), 0);
	}
	//Sau đó, truy vấn các cơ sở dữ liệu bên máy chủ 
	if(!$username) {
		$value = $_QFG['db']->fetch_array($_QFG['db']->query("SELECT username,name,namestatus FROM " . qf_getTName("space") . " where uid=" . $uid));
		$username = $value['namestatus'] ? $value['name'] : $value['username'];
		//Thông tin cơ sở dữ liệu
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " SET username='" . $username . "' where uid=" . $uid);
	}
	return $username;
}

//Nhà điều hành
function qf_userCredit($uid = 0, $credit = null) {
	global $_QFG;
	$uid = $uid > 0 ? $uid : $_QFG['uid'];
	//Đổi tích phân
	if($uid > 0 && $credit) {
		return $_QFG['db']->query("UPDATE " . qf_getTName('space') . " set credit=" . $credit . " where uid=" . $uid);
	}
	//Nhận được điểm
	else {
		$uid = $uid > 0 ? $uid : $_QFG['uid'];
		return (int)$_QFG['db']->result($_QFG['db']->query('SELECT credit FROM ' . qf_getTName('space') . ' where uid=' . $uid), 0);
	}
}

//Nhận số của xu và tiền tệ
function qf_getMoney($uid = 0) {
	global $_QFG;
	$uid = $uid > 0 ? $uid : $_QFG['uid'];
	$query = $_QFG['db']->query('select yb,money FROM ' . qf_getTName('fish_ui') . ' where uid=' . $uid);
	while($value = $_QFG['db']->fetch_array($query)) {
		$money = $value[money];
		$yb = $value[yb];
	}
	return array((int)$money, (int)$yb);
}

///////////////////////////////Hệ thống chức năng lập bản đồ////////////////////
//Đẩy sự kiện
function qf_addFeed($type) {
	include_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'feed.php');
	qf_addFeed2($type);
}

//Kiểm tra đăng nhập
function qf_checkauth() {
	global $_QFG, $_QSC;
	if($auth = $_COOKIE[$_QSC['cookiepre'].'auth']) {
		@list($password, $uid) = explode("\t", qf_authcode($auth, 'DECODE', $_QSC['UC_KEY']));
		$_QFG['uid'] = intval($uid);
		if($password && $_QFG['uid']) {
			$query = $_QFG['db']->query("SELECT * FROM " . qf_getTName('session') . " WHERE uid='$_QFG[uid]'");
			if($member = $_QFG['db']->fetch_array($query)) {
				if($member['password'] != $password) {
					$_QFG['uid'] = 0;
				}
			}
		}
	}
	if(!$_QFG['uid']) {//for uch width pw
		include_once(MAIN_ROOT.'/uc_client/client.php');
		function_exists('checkpwauto') && checkpwauto();
	}
	if($_QFG['uid']) {
		$_QFG['uname'] = qf_getUserName($_QFG['uid']);
		return '';
	}
	return '请先登录.';
}

/**
 * Chuỗi mã hóa và giải mã các chức năng
 *
 * @param string $string     Văn bản hoặc bản mã
 * @param string $operation  Điều hành(ENCODE | DECODE), 默认为 DECODE
 * @param string $key        Key
 * @param int $expiry        Bản mã có giá trị, hiệu quả mã hóa thời gian, chỉ trong vài giây, 0 cho vĩnh viễn
 * @return string            Sau khi điều trị, bản gốc hoặc base64_encode xử lý mã hóa
 *
 * @example
 *
 *  $a = authcode('abc', 'ENCODE', 'key');
 *  $b = authcode($a, 'DECODE', 'key');  // $b(abc)
 *
 *  $a = authcode('abc', 'ENCODE', 'key', 3600);
 *  $b = authcode('abc', 'DECODE', 'key'); // Trong vòng một giờ，$b(abc)，Nếu $b có sản phẩm nào
 */
function qf_authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	global $_QSC;
	$ckey_length = 4; //Ngẫu nhiên giá trị độ dài khóa 0-32;
	//Thêm phím ngẫu nhiên, bạn có thể làm cho bản mã không có pháp luật, thậm chí cùng một văn bản chính xác và quan trọng, kết quả sẽ được mã hóa khác nhau mỗi thời gian, tăng sự khó khăn của crack。
	//Giá trị lớn hơn, lớn hơn những thay đổi mã hóa trong các luật, thay đổi trong các bản mã = 16 của $ckey_length 次方
	//Khi giá trị này là 0, không tạo ra các phím ngẫu nhiên
	$key = md5($key);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';
	$cryptkey = $keya . md5($keya . $keyc);
	$key_length = strlen($cryptkey);
	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
	$string_length = strlen($string);
	$result = '';
	$box = range(0, 255);
	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}
	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}
	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}
	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc . str_replace('=', '', base64_encode($result));
	}
}

?>