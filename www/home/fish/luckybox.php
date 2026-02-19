<?php
include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);
include_once("source/ui/fish.php");

# ABC
if($_REQUEST['mod']=='luckybox' && $_REQUEST['act']=='getprice') {
	$lucktime = $_QFG['db']->result($_QFG['db']->query("SELECT lucktime FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	if( ($_QFG['timestamp']-$lucktime) < 24*3600 ) {
		die( '{"m":0,"f":0,"code":0,"d":"\u6bcf\u5929\u53ea\u80fd\u62bd\u5956\u4e00\u6b21\uff0c\u660e\u5929\u518d\u6765\u5427\uff01"}');
	}
   // echo '{"m":0,"f":0,"code":0,"d":"\u6bcf\u5929\u53ea\u80fd\u62bd\u5956\u4e00\u6b21\uff0c\u660e\u5929\u518d\u6765\u5427\uff01"}';

	echo '{"m":0,"f":0,"code":1,"d":"\u6b22\u8fce\u4f60\u4eca\u5929\u767b\u9646\u5f00\u5fc3\u9c7c\u5858\uff0c\u9009\u62e9\u4e00\u6b21\u5b9d\u8d1d\u74e2\u866b, \u6709\u60ca\u559c\u597d\u793c\u76f8\u9001"}';
}

# ABCD
if($_REQUEST['mod']=='luckybox' && $_REQUEST['act']=='getlucky') {
	$query = $_QFG['db']->query('select package,lucktime from '.qf_getTName("fish_ui").' where uid=' . $_QFG['uid']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$package_arr = qf_decode($list[0]['package']);
	$lucktime = $list[0]['lucktime'];
	if( ($_QFG['timestamp']-$lucktime) < 24*3600 ) {
		//24 ABCD
		exit();
	}
	$randfish = array_rand($fishtype);
	$package_arr[$randfish] += 1;
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set package = '".qf_encode($package_arr)."', lucktime=".$_QFG['timestamp'] ." where uid=" . $_QFG['uid']);
	echo '{"t":1,"i":'.$fishtype[$randfish]['b'].',"m":0,"f":0,"num":"0","count":1,"code":1,"d":"\u606d\u559c\u4f60\uff0c\u4f60\u9009\u4e2d\u7684\u5b9d\u8d1d\u74e2\u866b\u7ed9\u4f60\u5e26\u67651\u4efd'.$fishtype[$randfish]['bn'].'\uff0c\u53bb\u7f6e\u7269\u888b\u770b\u770b\u5427"}';
}


?>