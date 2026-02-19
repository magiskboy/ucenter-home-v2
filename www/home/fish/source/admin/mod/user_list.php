<?php

//Thông số phân trang
$psize = 25;
$pid = intval($_GET['pid']);
$pid = $pid < 1 ? 1 : $pid;
$start = ($pid - 1) * $psize;

//Xử lý yêu cầu
$purl = "admin.php?mod=user_list";
$qqfarm_user_list = array();
$count = $_QFG['db']->result($_QFG['db']->query("SELECT COUNT(*) FROM " . qf_getTName('fish_ui')), 0);
if($count) {
	$query = $_QFG['db']->query(
		"SELECT * from ".qf_getTName('fish_ui')." order by uid asc LIMIT {$start},{$psize}"
	);
	while($value = $_QFG['db']->fetch_array($query)) {
		$value['level'] = qf_toLevel($value['exp']);
		$value['visittime'] = date("Y-m-d",($value['visittime']));
		$qqfarm_user_list[] = $value;
	}
}

qf_getView("admin/user_list");

?>