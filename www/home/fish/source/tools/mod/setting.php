<?php

# Game Settings
# Modify by seaif@zealv.com

$query = $_QFG['db']->query("select tips FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
while($value = $_QFG['db']->fetch_array($query)) {
	$list[] = $value;
}
$Tips = qf_decode($list[0]['tips']);

if($_GET['do'] == "save") {
	$ncTips = array(
		's_h' => 'Cảm ơn bạn đã giúp đỡ！',
		'k_h' => 'Cảm ơn bạn đã giết cá mập！',
		'r_h' => 'Cám ơn bạn đã vớt rác lên！',
		'k_a' => 'Cảnh sát, hãy đến bắt kẽ xấu！',
		'r_a' => 'Bạn đang làm việc không tốt！'
	);
	$tip_type = $_POST['type'];
	$tip_value = $_POST['value'];
	if(array_key_exists($tip_type, $ncTips)) {
		$Tips[$tip_type] = $_POST['value'] ? $_POST['value'] : $ncTips[$tip_type];
		$result = $_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set tips ='" . qf_encode($Tips) . "' where uid=" . $_QFG['uid']);
		if($result) {
			die('1|&|Thay đổi thành công.|&|null|&|' . $Tips[$tip_type]);
		} else
			die('2|&|Bất thường, tiết kiệm không thành công.');
	} else
		die('3|&|tin nhắn không thể để trống.');
} else {
	qf_getView("tools/setting");
}

?>