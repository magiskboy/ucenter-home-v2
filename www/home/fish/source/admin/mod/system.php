<?php

# Cấu hình hệ thống

if($_GET['submit'] == 1) {
	//Thông báo hệ thống
	$_QSC['friendType'] = (int)$_POST['friendType'];
	$_QSC['closefarm'] = (int)$_POST['closefarm'];
	$_QSC['closeinfo'] = $_POST['closeinfo'];
	$_QSC['view']['player'] = (int)$_POST['view_player'];
	$_QSC['adminer'] = explode(',', $_POST['adminer']);;

	//Lưu cấu hình hệ thống
	if(qf_putCache('QSC', $_QSC) && qf_putCache('HIDE', $_HIDE)) {
		die('1|&|Thay đổi thành công|&|refresh');
	}
	die('0|&|Thay đổi không thành công');
}

qf_getView("admin/system");

?>