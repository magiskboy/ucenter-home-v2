<?php

# Ao cá plugin entry point

realname_set($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
realname_get();

define('FARM_ROOT', str_replace('\\', '/', dirname(__file__)));
if(!@include(FARM_ROOT . '/data/_qsc.php')) {
	@include(FARM_ROOT . '/data/qsc.php');
}

$qf_root = 'fish';
$qf_charset = $_SC['charset'] == 'gbk' ? 'gbk' : 'utf-8';
// Truyền uid + sig vào iframe để nhận diện user (cookie đôi khi không gửi kèm iframe)
$qf_sync_param = '';
if ($_SGLOBAL['supe_uid'] && defined('UC_KEY')) {
	$uid = (int)$_SGLOBAL['supe_uid'];
	$qf_sync_param = '&uid=' . $uid . '&sig=' . md5($uid . UC_KEY);
}
include template($qf_root . '/view/api_uchome/main.' . $qf_charset);

?>
