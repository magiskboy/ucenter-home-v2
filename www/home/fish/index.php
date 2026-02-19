<?php

include_once('common.php');
header('Content-Type:text/html; charset=utf-8');

$auth && die($auth);

//Nhận thông số
$type = in_array($_GET['type'], array('ui')) ? $_GET['type'] : 'ui';

//Tải mẫu
qf_getView('ui');

?>