<?php

$id = intval($_GET['id']);
if($id < 1) {
	die('1|&|Lỗi tham số. ');
}

$_QFG['db']->query("DELETE FROM " . qf_getTName('fish_ui') . " WHERE uid=" . $id);
$_QFG['db']->query("DELETE FROM " . qf_getTName('fish_logs') . " WHERE uid=" . $id);

die('1|&|XóaUIDĐể' . $id . 'Ao cá trong sự thành công của người sử dụng.|&|refresh');

?>