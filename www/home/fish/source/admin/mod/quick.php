<?php

# Quản lý nhanh

$go = $_GET['go'];

if($go == "exchange_clean") {
	$_QFG['db']->query("DELETE FROM " . qf_getTName('fish_logs') . " ");
	die('1|&|Đăng nhập thành công.');
} elseif($go == "repertory_clean") {
	$_QFG['db']->query("update " . qf_getTName('fish_ui') . " set repertory=''");
	die('1|&|Kết quả đầu tiên.');
} else {
	qf_getView("admin/quick");
}

?>