<?php

# Quản lý thông báo

if($_GET['submit'] == 1) {
	//Viết thông báo
	$main_text = $main_href = array();
	foreach($_POST as $key => $value) {
		if(strpos($key, 'main_text') === 0) {
			$main_text[] = $value;
		} elseif(strpos($key, 'main_href') === 0) {
			$main_href[] = $value;
		}
	}
	for($i=0; $i<count($main_text); $i++) {
		$_NOTICE['main'][$i]['text'] = $main_text[$i];
		$_NOTICE['main'][$i]['href'] = $main_href[$i];
	}
	//Lưu Thông báo
	if(qf_putCache('NOTICE', $_NOTICE)) {
		die('1|&|Thay đổi thành công|&|refresh');
	}
	die('0|&|Thay đổi không thành công');
}

qf_getView("admin/notice");

?>