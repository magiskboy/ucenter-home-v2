<?php

# 链接: http://ngoinhaviet.biz/fish



//Thêm dữ liệu
function inserttable($tablename, $insertsqlarr, $returnid = 0, $replace = false, $silent = 0) {
	global $_QFG;
	$insertkeysql = $insertvaluesql = $comma = '';
	foreach((array)$insertsqlarr as $insert_key => $insert_value) {
		$insertkeysql .= $comma . '`' . $insert_key . '`';
		$insertvaluesql .= $comma . '\'' . $insert_value . '\'';
		$comma = ', ';
	}
	$method = $replace ? 'REPLACE' : 'INSERT';
	$_QFG['db']->query($method . ' INTO ' . qf_getTName($tablename) . ' (' . $insertkeysql . ') VALUES (' . $insertvaluesql . ')', $silent ? 'SILENT' : '');
	if($returnid && !$replace) {
		return $_QFG['db']->insert_id();
	}
}

//Cập nhật dữ liệu
function updatetable($tablename, $setsqlarr, $wheresqlarr, $silent = 0) {
	global $_QFG;
	$setsql = $comma = '';
	foreach((array)$setsqlarr as $set_key => $set_value) {
		$setsql .= $comma . '`' . $set_key . '`' . '=\'' . $set_value . '\'';
		$comma = ', ';
	}
	$where = $comma = '';
	if(empty($wheresqlarr)) {
		$where = '1';
	} elseif(is_array($wheresqlarr)) {
		foreach($wheresqlarr as $key => $value) {
			$where .= $comma . '`' . $key . '`' . '=\'' . $value . '\'';
			$comma = ' AND ';
		}
	} else {
		$where = $wheresqlarr;
	}
	$_QFG['db']->query('UPDATE ' . qf_getTName($tablename) . ' SET ' . $setsql . ' WHERE ' . $where, $silent ? 'SILENT' : '');
}

//Tạo sự kiện
function feed_add($icon, $title_template = '', $title_data = array(), $body_template = '', $body_data = array(), $body_general = '', $images = array(), $image_links = array(), $target_ids = '', $friend = '', $appid = '', $returnid = 0) {
	global $_QFG, $_QSC;
	if(empty($appid)) {
		$appid = is_numeric($icon) ? 0 : $_QSC['UC_APPID'];
	}
	$feedarr = array('appid' => $appid, 'icon' => $icon, 'uid' => $_QFG['uid'], 'username' => $_QFG['uname'], 'dateline' => $_QFG['timestamp'], 'title_template' => $title_template, 'body_template' => $body_template, 'body_general' => $body_general, 'image_1' => empty($images[0]) ? '' : $images[0], 'image_1_link' => empty($image_links[0]) ? '' : $image_links[0], 'image_2' => empty($images[1]) ? '' : $images[1], 'image_2_link' => empty($image_links[1]) ? '' : $image_links[1], 'image_3' =>
		empty($images[2]) ? '' : $images[2], 'image_3_link' => empty($image_links[2]) ? '' : $image_links[2], 'image_4' => empty($images[3]) ? '' : $images[3], 'image_4_link' => empty($image_links[3]) ? '' : $image_links[3], 'target_ids' => $target_ids, 'friend' => $friend, 'id' => $id, 'idtype' => $idtype);
	$feedarr = qf_stripslashes($feedarr); //Hủy bỏ
	$feedarr['title_data'] = serialize(qf_stripslashes($title_data)); //Mảng chuyển đổi
	$feedarr['body_data'] = serialize(qf_stripslashes($body_data)); //Mảng chuyển đổi
	$feedarr['hash_template'] = md5($feedarr['title_template'] . "\t" . $feedarr['body_template']); //Băm tùy chọn
	$feedarr['hash_data'] = md5($feedarr['title_template'] . "\t" . $feedarr['title_data'] . "\t" . $feedarr['body_template'] . "\t" . $feedarr['body_data']); //合并hash
	$feedarr = qf_addslashes($feedarr); //Tăng thoát
	//Để lại
	$query = $_QFG['db']->query("SELECT feedid FROM " . qf_getTName('feed') . " WHERE uid='$feedarr[uid]' AND hash_data='$feedarr[hash_data]' LIMIT 0,1");
	if($oldfeed = $_QFG['db']->fetch_array($query)) {
		updatetable('feed', $feedarr, array('feedid' => $oldfeed['feedid']));
		return 0;
	}
	//Chèn
	if($returnid) {
		return inserttable('feed', $feedarr, $returnid);
	} else {
		inserttable('feed', $feedarr);
		return 1;
	}
}

//Đẩy giao diện
function qf_addFeed2($type) {
	global $_QFG;
	$icon = "fish";
	$title_template = $body_general = '';
	$actor = "<a href='space.php?uid={$_QFG['uid']}'>" . $_QFG['uname'] . "</a>";
	if(($toUid = intval($_REQUEST['u'])) > 0) {
		$touser = "<a href='space.php?uid={$toUid}'>" . qf_getUserName($toUid) . "</a>";
	}
	switch($type) {
		case 'user_init':
			$title_template = "{$actor} Nhập <a href='fish.php'>ao cá hạnh phúc</a> các trò chơi";
			$body_general = "Những người đáng kính nhất làm cá, ao cá làm người hạnh phúc hơn danh dự";
			break;
		case 'landstaus_clearweed1':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstaus_clearweed2':
			$title_template = "{$actor} Đi {$touser} Của <a href='fish.php'>ao cá hạnh phúc</a> Trợ giúp";
			$body_general = "Mình vì mọi người, mọi người vì mình!";
			break;
		case 'farmlandstatus_fertilize':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_harvest':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_planting':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_scarify':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_spraying1':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_spraying2':
			$title_template = "{$actor} Đi {$touser} Của <a href='fish.php'>ao cá hạnh phúc</a> Trợ giúp";
			$body_general = "Mình vì mọi người, mọi người vì mình!";
			break;
		case 'farmlandstatus_water1':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_water2':
			$title_template = "{$actor} Đi {$touser} Của <a href='fish.php'>ao cá hạnh phúc</a> Trợ giúp";
			$body_general = "Mình vì mọi người, mọi người vì mình!";
			break;
		case 'farmlandstatus_sale':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
		case 'farmlandstatus_saleall':
			$title_template = "{$actor} Để họ <a href='fish.php'>ao cá hạnh phúc</a> Các công việc đã hoàn tất";
			$body_general = "Có rất nhiều món trên menu！";
			break;
	}
	feed_add($icon, $title_template, null, null, null, $body_general);
}

?>