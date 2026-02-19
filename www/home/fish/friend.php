<?php
include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);

# 好友列表
if($_REQUEST['mod']=="friend" && $_REQUEST['act']=="get" || $_REQUEST['act']=="refresh"){
	//好友条件
	$condition = ' limit 0,1000';
	if($_QSC['friendType'] == 1) {
		$friends = qf_getFriends(0);
		$friends .= (empty($friends) ? '' : ',') . $_QFG['uid'];
		$condition = " WHERE uid IN({$friends}) group by uid " . $condition;
	}  else {
		$condition = " group by uid ".$condition;
	}

	$query = $_QFG['db']->query("SELECT uid,username,money,exp FROM " . qf_getTName("fish_ui") ."" . $condition);

	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}

	foreach($list as $key => $value) {
		$friendheadPic = qf_getheadPic($value['uid'], 'small');
		$exp = $value['exp'];
		if($exp < 1){
		$exp = 0;
		}
		$username=$value['username'];
		if(!$username){
		  $username='\u9C7C\u5858\u73A9\u5BB6';
		}
		$friend_str[] = '{"u":' . $value['uid'] . ',"un":"' . $username . '","e":' . $exp . ',"m":' . $value['money'] . ',"headpic":"' . $friendheadPic . '"}';
	}
	$friend_str = '[' . implode(',', $friend_str) . ']';

	echo $friend_str;
}
?>