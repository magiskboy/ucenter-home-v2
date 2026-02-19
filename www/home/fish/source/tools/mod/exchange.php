<?php

# Mua lại
# Modify by seaif@zealv.com

if($_GET['do'] == 'save') {
	//Nhận điểm người sử dụng hiện tại
	$credit = qf_userCredit(0);
	$number = $_GET['number'];
	$number = (!is_numeric($number) || $number < 1) ? 0 : intval($number);
	$type = $_GET['type'];
	if($type == "yb") {
		if($number * 10 > $credit)
			die('1|&|Bạn có đủ điểm.');
		elseif($number <= 0)
			die('2|&|Nhập số không nhỏ hơn hoặc bằng 0.');
		else {
			qf_userCredit(0, "credit-" . ($number * 10));
			$_QFG['db']->query("UPDATE " . qf_getTName('fish_ui') . " set yb=yb+" . $number . " where uid=" . $_QFG['uid']);
			die('3|&|Trao đổi điểm thành công.|&|refresh');
		}
	} elseif($type == "jb") {
		if($number > $credit)
			echo '1|&|Bạn có đủ điểm.';
		elseif($number <= 0)
			echo '2|&|Nhập số không nhỏ hơn hoặc bằng0.';
		else {
			qf_userCredit(0, "credit-" . $number);
			$_QFG['db']->query("UPDATE " . qf_getTName('fish_ui') . " set money=money+" . ($number * 100) . " where uid=" . $_QFG['uid']);
			die('3|&|Trao đổi điểm thành công.|&|refresh');
		}
	}
} else {
	qf_getView("tools/exchange");
}

?>