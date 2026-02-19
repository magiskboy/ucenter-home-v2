<?php
include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);
include_once("source/ui/fish.php");
if($_REQUEST['mod']=='chat' && $_REQUEST['act']=='getallinfo') {
	$uId = $_POST['u'];
	$query = $_QFG['db']->query('SELECT username,money,exp,repertory,yb FROM ' . qf_getTName('fish_ui') . ' where uid=' . $uId);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$repertory = qf_decode($list[0]['repertory']);
	foreach($repertory as $k=>$v) {
		if(!empty($rep)) {
			$rep .= ',{"bid":'.$v["cId"].',"bname":"'.$fishtype[$v["cId"]]["bn"].'","harvestnumber":'.$v["h"].',"scroungenumber":'.$v["s"].'}';
		} else {
			$rep = '{"bid":'.$v["cId"].',"bname":"'.$fishtype[$v["cId"]]["bn"].'","harvestnumber":'.$v["h"].',"scroungenumber":'.$v["s"].'}';
		}
	}
//type:1偷鱼,2帮忙,3放垃圾，4狗咬，5放鲨鱼
$_QFG['db']->query("delete from ".qf_getTName( "fish_logs" )." where   uid = " . $uId . " and (UNIX_TIMESTAMP(now()) - time) >7*24*3600"); //清除七天前的日志
$log = array();
$query = $_QFG['db']->query("SELECT * FROM " . qf_getTName("fish_logs") . " WHERE uid = " . $uId . " ORDER BY time DESC limit 0,50");
while($value = $_QFG['db']->fetch_array($query)) {
	$username = qf_getUserName($value[fromid]);
	if($value[type] == 1) {
		$counts_ = explode(';', $value[counts]);
		$counts_all = "";
		foreach($counts_ as $value_) {
			$counts_t = explode(':', $value_);
			$counts_all .= $counts_t[1] . "\u6761" . $fishtype[$counts_t[0]]['bn'] . "\u3001";
		}
		if($counts_all != "") {
			$counts_all = substr($counts_all, 0,-6 );
		}
		$msg = "\"<font color=\\\"#009900\\\"><b>" . $username . "</b></font> \u6765\u9C7C\u5858\u5077\u7A83\uFF0C\u5077\u8D70{$counts_all}\u3002\"";
	}
	elseif($value[type] == 2) {
		$counts_all = "";
		$counts_ = explode(':', $value[counts]);
		if($counts_[0] > 0) {
			$counts_all .= "\u6CBB\u75C5" . $counts_[0] . "l\u1EA7n\u3001";
		}
		if($counts_[1] > 0) {
			$counts_all .= "\u6E05\u7406\u5783\u573E" . $counts_[1] . "l\u1EA7n\u3001";
		}
		if($counts_[2] > 0) {
			$counts_all .= "\u5BB0\u6740\u9CA8\u9C7C" . $counts_[2] . "l\u1EA7n\u3001";
		}
		if($counts_all != "") {
			$counts_all = substr($counts_all, 0, -6);
		}
		$msg = "\"<font color=\\\"#009900\\\"><b>" . $username . "</b></font> \u6765\u9C7C\u5858\u5E2E\u5FD9{$counts_all}\uFF01\"";
	}
	elseif($value[type] == 3) {
		$msg = "\"<font color=\\\"#009900\\\"><b>" . $username . "</b></font> \u6765\u9C7C\u5858\u653E\u5783\u573E\uFF01\"";
	}
	elseif($value[type] == 4) {
		$msg = "\"<font color=\\\"#009900\\\"><b>" . $username . "</b></font> \u6765\u9C7C\u5858\u5077\u4E1C\u897F\u88AB\u6293\u4F4F\uFF0C\u9003\u8DD1\u65F6\u9057\u843D\u4E86" . $value[count] . "\u4E2A\u91D1\u5E01\u3002\"";
	}
	elseif($value[type] == 5) {
		$msg = "\"<font color=\\\"#009900\\\"><b>" . $username . "</b></font> \u6765\u9C7C\u5858\u653E\u9CA8\u9C7C\uFF01\"";
	}
	
	$log[] = "{\"time\":" . $value['time'] . ",\"msg\":" . $msg . "}";
}

$log = '[' . implode(',', $log) . ']';
	echo '{"user":{"un":"'.$list[0]['username'].'","headpicbig":"' . qf_getheadPic($uId, 'big') . '","l":' . qf_toLevel($list[0]['exp']) . ',"e":'.$list[0]["exp"].',"m":'.$list[0]['money'].',"f":'.$list[0]['yb'].',"homepage":"' . qf_getHomePage($uId) . '"},"log":'.$log.',"chat":[],"repertory":['.$rep.']}';
}
?>