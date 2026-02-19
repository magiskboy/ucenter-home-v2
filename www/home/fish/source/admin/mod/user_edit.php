<?php

$id = intval($_GET['id']);
if($id < 1) {
	die('2|&|Lỗi tham số.');
}

if($_GET['submit'] == 1) {
	$reclaim = intval($_REQUEST['reclaim']);
	$exp = intval($_REQUEST['exp']);
	$money = intval($_REQUEST['money']);
	$yb = intval($_REQUEST['yb']);
	if($reclaim < 1 || $reclaim > 18) {
		die('1|&|không sửa đội được, số lượng đất nông nghiệp cần được lớn hơn 1 và ít hơn 19.');
	} 
	//Sửa đổifarmlandstatusDữ liệu -- START --
	$query = $_QFG['db']->query("SELECT bstatus,reclaim FROM " . qf_getTName("fish_ui") ." where uid=" . $id);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}

	$bstatus = qf_decode($list[0]['bstatus']);
	//Nhận số lượng thực tế
	$fishCount = count($bstatus);
	//Thêm yêu cầu cải tạo
	if($fishCount < $reclaim) {
		for($i = $fishCount; $i < $reclaim; $i++) {
			$bstatus[$i] = array("a"=>(int)$reclaim,"b"=>0,"c"=>0,"g"=>0,"d"=>0,"m"=>0,"h"=>0,"j"=>0,"k"=>0,"bn"=>"","n"=>array(),"p"=>array(),"w"=>0,"q"=>0,"r"=>0,"s"=>0,"t"=>0,"x"=>100);
		}
	}
	//Hủy bỏ thêm
	elseif($fishCount > $reclaim) {
		foreach($bstatus as $k => $v) {
			if($k >= $reclaim) {
				unset($bstatus[$k]);
			}
		}
	}
	
	//Sử đổi bdstatusDữ liệu -- OVER --
	$_QFG['db']->query("UPDATE " . qf_getTName('fish_ui') . " set exp=" . $exp . ",reclaim=" . $reclaim . ", bstatus='" . qf_encode(array_values($bstatus)) . "', yb=" . $yb . ",money=" . $money . " where uid=" . $id);
	die('1|&|Sửa đổi người dùng(UID:' . $id . ')Sự thành công của thông tin.|&|refresh');
} else {
	$query = $_QFG['db']->query(
		"SELECT * from ".qf_getTName('fish_ui')." where uid=" . $id
	);
	$value = $_QFG['db']->fetch_array($query);
	$value['level'] = qf_toLevel($value['exp']);//Cấp
	$value['username'] = qf_getUserName($id, true);//Yêu cầu nhập tên thật
	qf_getView("admin/user_edit");
}

?>