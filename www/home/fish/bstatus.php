<?php
include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);
include_once("source/ui/fish.php");

# 鱼塘放鱼
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "raise" ){
    $a = $_REQUEST['a'];
	$b = $_REQUEST['b'];
	$query = $_QFG['db']->query("SELECT bstatus,package FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($list[0]['bstatus']);
	$package = qf_decode($list[0]['package']);
    if($bstatus[$a]['b'] > 0){
		die( '{"b":'.$b.',"a":'.$a.',"bn":"'.$fishtype[$b]['bn'].'","code":0,"d":"\u9C7C\u5858\u5DF2\u7ECF\u6709\u9C7C\u4E86\uFF01","poptype":0}');
	}
	$package[$b] = $package[$b] - 1 ;
	$bstatus[$a]['b'] = (int)$b;
	$bstatus[$a]['c'] = 1;
	$bstatus[$a]['g'] = $fishtype[$b]['output'];
	$bstatus[$a]['d'] =  (int)($fishtype[$b]['output']*0.6);
	$bstatus[$a]['m'] = $fishtype[$b]['output'];
	$bstatus[$a]['h'] = 0;
	$bstatus[$a]['j'] = 0;
	$bstatus[$a]['k'] = 0;
	$bstatus[$a]['bn'] = $fishtype[$b]['bn'];
	$bstatus[$a]['n'] = array();
	$bstatus[$a]['p'] = array();
	$bstatus[$a]['w'] = 0;
	$bstatus[$a]['q'] = $_QFG['timestamp'];
	$bstatus[$a]['r'] = 0;
	$bstatus[$a]['s'] = 0;
	$bstatus[$a]['t'] = $_QFG['timestamp'];
	$bstatus[$a]['x'] = 100;

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "' ,package='" . qf_encode($package) . "'  where uid=" . $_QFG['uid']);

	die( '{"b":'.$b.',"a":'.$a.',"bn":"'.$fishtype[$b]['bn'].'","code":1,"d":""}');
}

# 鱼塘收鱼
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "harvest" ){
    $a = $_REQUEST['a'];
	$query = $_QFG['db']->query("SELECT bstatus,fruit,repertory FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($list[0]['bstatus']);
	$fruit = qf_decode($list[0]['fruit']);
	$repertory = qf_decode($list[0]['repertory']);

    $cid = $bstatus[$a]['b'];
	if($cid == 0) {
		exit();
	}
	$output = $bstatus[$a]['m'];
	$fruit[$cid] = $fruit[$cid] + $output;
	$harvest = $bstatus[$a]['m'];
    $raisetime = $bstatus[$a]['t'];
	$bstatus[$a]['b'] = 1;
	$bstatus[$a]['c'] = 5;
	$bstatus[$a]['g'] = 0;
	$bstatus[$a]['d'] = 0;
	$bstatus[$a]['m'] = 0;
	$bstatus[$a]['h'] = 0;
	$bstatus[$a]['j'] = 1;
	$bstatus[$a]['k'] = 0;
	$bstatus[$a]['n'] = array();
	$bstatus[$a]['p'] = array();
	$bstatus[$a]['w'] = 0;
	$bstatus[$a]['q'] = 0;
	$bstatus[$a]['r'] = 0;
	$bstatus[$a]['s'] = 0;
	$bstatus[$a]['t'] = 0;
	$bstatus[$a]['x'] = 100;

	$flag = false;
	foreach((array)$repertory as $key => $val) {
		if($cid == $val['cId']) {
			$flag = true;
			$repertory[$key]['h'] = $repertory[$key]['h'] + $output;
		}
	}
	if(!$flag) {
		$repertory[] = array("cId"=>$cid,"h"=>$output,"s"=>0);
	}

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "', exp=exp+".$fishtype[$cid]['e']." ,fruit='" . qf_encode($fruit) . "', repertory='" . qf_encode($repertory) . "'  where uid=" . $_QFG['uid']);

	die('{"a":"'.$a.'","code":1,"poptype":4,"d":"","status":{"b":1,"c":5,"oldk":0,"oldr":0,"olds":0,"output":'.$output.',"min":0,"leavings":0,"feed":0,"raisetime":'.$raisetime.',"updatetime":'.$_QFG['timestamp'].',"thief":[],"action":[],"health":100,"harvestTimes":0,"k":0,"r":0,"s":0},"harvest":'.$harvest.',"e":'.$fishtype[$cid]['e'].',"levelup":false}');
}

# 喂养饲料
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "feed" ){
    $a = $_REQUEST['a'];
	$t = $_REQUEST['t'];
	$query = $_QFG['db']->query("SELECT bstatus,tools FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($list[0]['bstatus']);
	$fertarr = qf_decode($list[0]['tools']);
	if($fertarr[$t] == 0) {
		exit();
	}

	$zuowutime = $_QFG['timestamp'] - $bstatus[$a]['q'];
    if($zuowutime > $fishtime[$bstatus[$a]['b']][2]){
		exit();
	}
	$ii = 0;
	foreach($fishtime[$bstatus[$a]['b']] as $key => $value) { //没有相对应的fishtime 110...
		if($value <= $zuowutime) {
			$ii = $key + 1;
		}
	}
	echo $ii."**";
	exit();
	if($bstatus[$a]['w'] == $ii + 1) {
		exit();
	}
	$zuowutime += $toolstype[$t]['effect'];

	if($fishtime[$bstatus[$a]['b']][$ii] < $zuowutime) {
		$zuowutime = $fishtime[$bstatus[$a]['b']][$ii];
	}
	$bstatus[$a]['q'] = $bstatus[$a]['q'] - $toolstype[$t]['effect'];
	$bstatus[$a]['w'] = $ii + 1;
    $fertarr[$t] = $fertarr[$t] - 1;
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "',tools='" . qf_encode($fertarr) . "'  where uid=" . $_QFG['uid']);

	die( '{"a":'.$a.',"code":1,"t":'.$t.',"status":{"b":'.$bstatus[$a]['b'].',"bn":"'.$bstatus[$a]['bn'].'","c":1,"oldk":0,"oldr":0,"olds":0,"output":'.$bstatus[$a]['g'].',"min":0,"leavings":'.$bstatus[$a]['m'].',"feed":'.$bstatus[$a]['w'].',"raisetime":'.$bstatus[$a]['q'].',"updatetime":'.$bstatus[$a]['t'].',"thief":' . qf_jsonCode($n) . ',"action":' . qf_jsonCode($p) . ',"health":100,"harvestTimes":0,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].'}}');
	

}

# 偷好友鱼
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "scrounge" ){
    $a = $_REQUEST['a'];
	$bstatus = $_QFG['db']->result($_QFG['db']->query("select bstatus from ".qf_getTName('fish_ui') . " WHERE uid = ". $_REQUEST['u']), 0);
	$dog = $_QFG['db']->result($_QFG['db']->query("select dog from ".qf_getTName('fish_ui') . " WHERE uid = ". $_REQUEST['u']), 0);
	$query = $_QFG['db']->query("SELECT fruit,repertory,fr,money FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($bstatus);
	$fruit = qf_decode($list[0]['fruit']);
	$fr_arr = qf_decode($list[0]['fr']);
	$dog_arr =qf_decode($dog);
	$repertory = qf_decode($list[0]['repertory']);
	$money = $list[0]['money'];
	$b = $bstatus[$a]['b'] ;
	$g = $bstatus[$a]['g'] ;
	$d = $bstatus[$a]['d'] ;
	$m = $bstatus[$a]['m'] ;
	$n = $bstatus[$a]['n'] ;
	$n_temp = array_flip($n);
	if(in_array($_QFG['uid'], $n_temp) && $money<100) {
		die('{"code":0,"d":"\u505A\u4EBA\u8981\u539A\u9053\uFF01"}');
	}  else {
		//被狗咬
		if( $dog_arr['dt']>=$_QFG['timestamp'] )  {
			$dogrand = rand(1,100);
			if( $dogrand<=30 ) {
				$dm = rand(50,100);
				$dog_arr['dc'] += 1;
				$dog_arr['dm'] += $dm;
				$n[$_QFG['uid']] = 0;
				$bstatus[$a]['n'] = $n;
				$_QFG['db']->query("UPDATE " . qf_getTName('fish_ui') . " set money=money+".$dm.", dog='".qf_encode($dog_arr)."', bstatus='" . qf_encode(array_values($bstatus)) . "' where uid=" . $_REQUEST['u']);
				$_QFG['db']->query("UPDATE " . qf_getTName('fish_ui') . " set money=money-".$dm." where uid=" . $_QFG['uid']);

				//狗咬日志
						$sql1 = "SELECT `id`, `uid`, `fromid`, `count`, `type` FROM  " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] . " and type = 4 and uid = " . $_REQUEST['u'];
						$result = $_QFG['db']->query($sql1);
						$result = $_QFG['db']->fetch_array($result);
						if($result != null) {
							$sql = "UPDATE " . qf_getTName("fish_logs") . " set count = count+" . $dm . ", time = " . $_QFG['timestamp'] . " where fromid = " . $_QFG['uid'] . " and type = 4 and uid = " . $_REQUEST['u'];
						} else {
							$sql = "INSERT INTO " . qf_getTName("fish_logs") . " (`uid`, `type`, `count`, `fromid`, `time`, `cropid`, `isread`) VALUES (" . $_REQUEST['u'] . ", 4," . $dm . ", " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", 0, 0);";
						}
						$_QFG['db']->query($sql);
				//狗咬日志

				die( '{"a":'.$a.',"code":1,"harvest":'.$n[$_QFG['uid']].',"poptype":1,"u":"'.$_REQUEST['u'].'","e":0,"m":-'.$dm.',"levelup":false,"d":"\u4F60\u88AB\u72D7\u54AC\u4E86\uFF0C\u6389\u4E86'.$dm.'\u94B1\uFF01","price":0,"status":{"b":'.$bstatus[$a]['b'].',"c":4,"bn":"'.$_REQUEST['bn'].'","oldk":0,"oldr":0,"olds":'.$n[$_QFG['uid']].',"output":'.$bstatus[$a]['g'].',"min":0,"leavings":'.$bstatus[$a]['m'].',"feed":'.$bstatus[$a]['w'].',"raisetime":'.$bstatus[$a]['q'].',"updatetime":'.$bstatus[$a]['t'].',"thief":' . qf_jsonCode($n) . ',"action":' . qf_jsonCode($p) . ',"health":100,"harvestTimes":0,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].'}}');
			}
		}
	} 

				if($fr_arr['fr']==2) {
					$n[$_QFG['uid']] = 2;
				} elseif ($fr_arr['fr']==3) {
					$n[$_QFG['uid']] = 3;
				} else {
					$n[$_QFG['uid']] = 1;
				}

				$n[$_QFG['uid']] = min(($m - $d), $n[$_QFG['uid']]); //计算最大可偷数
				$fruit[$b] += $n[$_QFG['uid']];
				$m -= $n[$_QFG['uid']];
				//作物剩下产量小于最低产量或未偷取，跳过~
				if($m < $d || $n[$_QFG['uid']] == 0) {
					die('{"code":0,"d":"\u7ED9\u9C7C\u5858\u4E3B\u4EBA\u7559\u70B9\uFF01"}');
				}

				$flag = false;
				foreach($repertory as $key_1=>$value_1) {
					if($b == $value_1['cId']) {
						$flag = true;
						$repertory[$key_1]['s'] = $repertory[$key_1]['s'] +$n[$_QFG['uid']] ;
					}
				}

			if(!$flag) {
				$repertory[] = array("cId"=>$b,"h"=>0,"s"=>$n[$_QFG['uid']]);
			}

	$bstatus[$a]['g'] = $g;
	$bstatus[$a]['d'] = $d;
	$bstatus[$a]['m'] = $m;
	$bstatus[$a]['n'] = $n;

			//偷取日志
			$counts = $_QFG['db']->result($_QFG['db']->query("SELECT `counts` FROM " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] ." and type=1 and uid = " . $_REQUEST['u'] . " and time > " . ($_QFG['timestamp'] - 3600)), 0);
			$countid = $_QFG['db']->result($_QFG['db']->query("SELECT `id` FROM " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] ." and type=1 and uid = " . $_REQUEST['u'] . " and time > " . ($_QFG['timestamp'] - 3600)), 0);

			if ($counts) {
				$countss = array();
				$chk = 0;
				$count_arr = explode(";",$counts);
				foreach($count_arr as $cv) {
					$count_t = explode(":", $cv);
					if($count_t[0]==$b) {
						$chk = 1;
						$count_t[1] += $n[$_QFG['uid']];
					}
					$countss[] = implode(":", $count_t);
				}

				if( $chk == 1 ) {
					$counts_all = implode(";", $countss);
				} else {
					$counts_all = $counts . ";".$b.":".$n[$_QFG['uid']];
				}

				$sql = "UPDATE " . qf_getTName("fish_logs") . " set count = count+1,counts='".$counts_all."',time = " . $_QFG['timestamp'] . " where id = " . $countid;
				
			} else {
				$sql = "INSERT INTO " . qf_getTName("fish_logs") . " (`uid`, `type`, `count`,`counts`, `fromid`, `time`, `cropid`, `isread`) VALUES (" . $_REQUEST['u'] . ", 1, 1,'{$b}:".$n[$_QFG['uid']]."', " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", " . $b . ", 0);";
			}
			$_QFG['db']->query($sql);

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "' where uid=" . $_REQUEST['u']);
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set fruit='" . qf_encode($fruit) . "',repertory='" . qf_encode($repertory) . "'  where uid=" . $_QFG['uid']);

	die( '{"a":'.$a.',"code":1,"harvest":'.$n[$_QFG['uid']].',"poptype":2,"u":"'.$_REQUEST['u'].'","e":0,"levelup":false,"d":"","price":0,"status":{"b":'.$bstatus[$a]['b'].',"c":4,"bn":"'.$_REQUEST['bn'].'","oldk":0,"oldr":0,"olds":'.$n[$_QFG['uid']].',"output":'.$bstatus[$a]['g'].',"min":0,"leavings":'.$bstatus[$a]['m'].',"feed":'.$bstatus[$a]['w'].',"raisetime":'.$bstatus[$a]['q'].',"updatetime":'.$bstatus[$a]['t'].',"thief":' . qf_jsonCode($n) . ',"action":' . qf_jsonCode($p) . ',"health":100,"harvestTimes":0,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].'}}');
	
}

# 给鱼治病
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "doctor" ){
    $a = (int)$_REQUEST['a'];
	$query = $_QFG['db']->query("SELECT bstatus,tips FROM " . qf_getTName("fish_ui") . " where uid=" . $_REQUEST['u']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($list[0]['bstatus']);
	$tips_arr = qf_decode($list[0]['tips']);
    if($bstatus[$a]['s'] < 1){
		exit();
	}
	$bstatus[$a]['s'] = $bstatus[$a]['s'] - 1;

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "' where uid=" . $_REQUEST['u']);
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set exp=exp + 2 where uid=" . $_QFG['uid']);

	if($_REQUEST['u']==$_QFG['uid']) {
		qf_addFeed('farmlandstaus_clearweed1');
	} else {
		qf_addFeed('farmlandstaus_clearweed2');
		//帮忙治病日志
		$sql1 = "SELECT `id`, `uid`, `cropid`, `fromid`, `count`,`counts`,`time`, `type` FROM  " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] . " and type=2 and uid = " . $_REQUEST['u'] . " and time > " . ($_QFG['timestamp'] - 3600);
		$query_r = $_QFG['db']->query($sql1);
		$value_r = $_QFG['db']->fetch_array($query_r);
		if($value_r != null) {
			$result[] = $value_r;
			if(strpos($result[0][counts], ':') !== false) {
				$counts_ = explode(':', $result[0][counts]);
				$counts_[0]++;
				$counts_all = join(':', $counts_);
			} else {
				$counts_all = "1:0:0";
			}
			$sql = "UPDATE " . qf_getTName("fish_logs") . " set count = count+1,counts='{$counts_all}',time = " . $_QFG['timestamp'] . " where id = " . $result[0][id];
		} else {
			$sql = "INSERT INTO " . qf_getTName("fish_logs") ." (`uid`, `type`, `count`,`counts`, `fromid`, `time`, `cropid`, `isread` ) VALUES (" . $_REQUEST['u'] . ", 2, 1,'1:0:0', " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", 0, 0);";
		}
		$_QFG['db']->query($sql);
		die('{"a":'.$a.',"code":1,"poptype":1,"d":"'.$tips_arr['s_h'].'","k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
	}

	die('{"a":'.$a.',"code":1,"poptype":0,"d":"","k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
}

# 宰杀鲨鱼
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "cleank" ){
    $a = $_REQUEST['a'];
	$query = $_QFG['db']->query("SELECT bstatus,putk,tips FROM " . qf_getTName("fish_ui") . " where uid=" . $_REQUEST['u']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$putk_arr = qf_decode($list[0]['putk']);
	$bstatus = qf_decode($list[0]['bstatus']);
	$tips_arr = qf_decode($list[0]['tips']);
    if($bstatus[$a]['k'] == 0){
		exit();
	}
	if($putk_arr[$a] == $_QFG['uid']) {
		die('{"a":"'.$a.'","code":0,"poptype":0,"m":0,"d":"\u60a8\u505a\u7684\u574f\u4e8b\u4e0d\u80fd\u6bc1\u706d\u8bc1\u636e\uff01","e":0,"levelUp":false,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
	}
	$bstatus[$a]['k'] = 0;
	unset($putk_arr[$a]);

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "', putk='".qf_encode($putk_arr)."' where uid=" . $_REQUEST['u']);
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set exp=exp + 2 where uid=" . $_QFG['uid']);

	if($_REQUEST['u']==$_QFG['uid']) {
		qf_addFeed('farmlandstatus_water1');
	} else {
		qf_addFeed('farmlandstatus_water2');
		//帮忙宰杀鲨鱼日志
		$sql1 = "SELECT `id`, `uid`, `cropid`, `fromid`, `count`,`counts`,`time`, `type` FROM  " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] . " and type=2 and uid = " . $_REQUEST['u'] . " and time > " . ($_QFG['timestamp'] - 3600);
		$query_r = $_QFG['db']->query($sql1);
		$value_r = $_QFG['db']->fetch_array($query_r);
		if($value_r != null) {
			$result[] = $value_r;
			if(strpos($result[0][counts], ':') !== false) {
				$counts_ = explode(':', $result[0][counts]);
				$counts_[2]++;
				$counts_all = join(':', $counts_);
			} else {
				$counts_all = "0:0:1";
			}
			$sql = "UPDATE " . qf_getTName("fish_logs") . " set count = count+1,counts='{$counts_all}',time = " . $_QFG['timestamp'] . " where id = " . $result[0][id];
		} else {
			$sql = "INSERT INTO " . qf_getTName("fish_logs") ." (`uid`, `type`, `count`,`counts`, `fromid`, `time`, `cropid`, `isread` ) VALUES (" . $_REQUEST['u'] . ", 2, 1,'0:0:1', " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", 0, 0);";
		}
		$_QFG['db']->query($sql);
		die('{"a":"'.$a.'","code":1,"poptype":1,"m":0,"d":"'.$tips_arr['k_h'].'","e":2,"levelUp":false,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
	}

	die( '{"a":"'.$a.'","code":1,"poptype":0,"m":0,"d":"","e":2,"levelUp":false,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');

}

# 放鲨鱼
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "putk" ){
    $a = (int)$_REQUEST['a'];
	$query = $_QFG['db']->query("SELECT bstatus,putk,tips FROM " . qf_getTName("fish_ui") . " where uid=" . $_REQUEST['u']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$putk_arr = qf_decode($list[0]['putk']);
	$bstatus = qf_decode($list[0]['bstatus']);
	$tips_arr = qf_decode($list[0]['tips']);

    if($bstatus[$a]['k'] > 0 && $bstatus[$a]['b'] < 0){
		die( '{"a":"'.$a.'","code":0,"poptype":0,"m":0,"d":"\u53EA\u80FD\u653E\u4E00\u6761\u9CA8\u9C7C\uFF01"}');
	}

    if($_QFG['timestamp'] - $bstatus[$a]['q'] > $fishtime[$bstatus[$a]['b']][2]){
		die( '{"a":"'.$a.'","code":0,"poptype":0,"m":0,"d":"\u73B0\u9636\u6BB5\u4E0D\u80FD\u653E\u9CA8\u9C7C\uFF01"}');
	}

	$bstatus[$a]['k'] = $_QFG['timestamp'];
	$putk_arr[$a] = $_QFG['uid'];

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "', putk='".qf_encode($putk_arr)."' where uid=" . $_REQUEST['u']);

	//鲨鱼日志
	$sql1 = "SELECT `id`, `uid`, `fromid`, `count`, `type` FROM  " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] . " and type = 5 and uid = " . $_REQUEST['u'];
	$result = $_QFG['db']->query($sql1);
	$result = $_QFG['db']->fetch_array($result);
	if($result != null) {
		$sql = "UPDATE " . qf_getTName("fish_logs") . " set time = " . $_QFG['timestamp'] . " where fromid = " . $_QFG['uid'] . " and type = 5 and uid = " . $_REQUEST['u'];
	} else {
		$sql = "INSERT INTO " . qf_getTName("fish_logs") . " (`uid`, `type`, `count`, `fromid`, `time`, `cropid`, `isread`) VALUES (" . $_REQUEST['u'] . ", 5,0, " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", 0, 0);";
	}
	$_QFG['db']->query($sql);

	die('{"a":"'.$a.'","code":1,"poptype":1,"d":"'.$tips_arr['k_a'].'","k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');

}

# 放垃圾
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "putr" ){
    $a = (int)$_REQUEST['a'];
	$query = $_QFG['db']->query("SELECT bstatus,putr,tips FROM " . qf_getTName("fish_ui") . " where uid=" . $_REQUEST['u']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($list[0]['bstatus']);
	$putr_arr = qf_decode($list[0]['putr']);
	$tips_arr = qf_decode($list[0]['tips']);
    if($bstatus[$a]['r'] >= 3){
		die( '{"a":"'.$a.'","code":0,"poptype":0,"m":0,"d":"\u9C7C\u5858\u5783\u573E\u4EE5\u653E\u6EE1\uFF01"}');
	}

    if($_QFG['timestamp'] - $bstatus[$a]['q'] > $fishtime[$bstatus[$a]['b']][2]){
		die( '{"a":"'.$a.'","code":0,"poptype":0,"m":0,"d":"\u73B0\u9636\u6BB5\u4E0D\u80FD\u653E\u5783\u573E\uFF01"}');
	}

	$bstatus[$a]['r'] += 1;
	$putr_arr[$a][] = $_QFG['uid'];

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "', putr='".qf_encode($putr_arr)."' where uid=" . $_REQUEST['u']);

	//放垃圾日志
	$sql1 = "SELECT `id`, `uid`, `fromid`, `count`, `type` FROM  " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] . " and type = 3 and uid = " . $_REQUEST['u'];
	$result = $_QFG['db']->query($sql1);
	$result = $_QFG['db']->fetch_array($result);
	if($result != null) {
		$sql = "UPDATE " . qf_getTName("fish_logs") . " set time = " . $_QFG['timestamp'] . " where fromid = " . $_QFG['uid'] . " and type = 3 and uid = " . $_REQUEST['u'];
	} else {
		$sql = "INSERT INTO " . qf_getTName("fish_logs") . " (`uid`, `type`, `count`, `fromid`, `time`, `cropid`, `isread`) VALUES (" . $_REQUEST['u'] . ", 3,0, " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", 0, 0);";
	}
	$_QFG['db']->query($sql);

	die('{"a":'.$a.',"code":1,"poptype":1,"d":"'.$tips_arr['r_a'].'","k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');

}

# 清理垃圾
if ( $_REQUEST['mod'] == "bstatus" && $_REQUEST['act'] == "cleanr" ){
    $a = $_REQUEST['a'];
	$query = $_QFG['db']->query("SELECT bstatus,putr,tips FROM " . qf_getTName("fish_ui") . " where uid=" . $_REQUEST['u']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}
	$bstatus = qf_decode($list[0]['bstatus']);
	$putr_arr = qf_decode($list[0]['putr']);
	$tips_arr = qf_decode($list[0]['tips']);
    if($bstatus[$a]['r'] < 1){
		exit();
	}
	$r_cnt = array_count_values($putr_arr[$a]);
	if( $bstatus[$a]['r'] <= $r_cnt[$_QFG['uid']] ) {
		die('{"a":"'.$a.'","code":0,"poptype":0,"m":0,"d":"\u60a8\u505a\u7684\u574f\u4e8b\u4e0d\u80fd\u6bc1\u706d\u8bc1\u636e\uff01","e":0,"levelUp":false,"k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
	}

	$bstatus[$a]['r'] = $bstatus[$a]['r'] - 1;
	foreach($putr_arr[$a] as $key=>$value) {
		if( $value != $_QFG['uid']) {
			unset($putr_arr[$a][$key]);
			if(empty($putr_arr[$a])) {
				unset($putr_arr[$a]);
			}
			break;
		}
	}

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "',putr='".qf_encode($putr_arr)."' where uid=" . $_REQUEST['u']);
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set exp=exp + 2 where uid=" . $_QFG['uid']);

	if($_REQUEST['u']==$_QFG['uid']) {
		qf_addFeed('farmlandstatus_spraying1');
	} else {
		qf_addFeed('farmlandstatus_spraying2');
		//帮忙清理垃圾日志
		$sql1 = "SELECT `id`, `uid`, `cropid`, `fromid`, `count`,`counts`,`time`, `type` FROM  " . qf_getTName("fish_logs") . " WHERE fromid = " . $_QFG['uid'] . " and type=2 and uid = " . $_REQUEST['u'] . " and time > " . ($_QFG['timestamp'] - 3600);
		$query_r = $_QFG['db']->query($sql1);
		$value_r = $_QFG['db']->fetch_array($query_r);
		if($value_r != null) {
			$result[] = $value_r;
			if(strpos($result[0][counts], ':') !== false) {
				$counts_ = explode(':', $result[0][counts]);
				$counts_[1]++;
				$counts_all = join(':', $counts_);
			} else {
				$counts_all = "0:1:0";
			}
			$sql = "UPDATE " . qf_getTName("fish_logs") . " set count = count+1,counts='{$counts_all}',time = " . $_QFG['timestamp'] . " where id = " . $result[0][id];
		} else {
			$sql = "INSERT INTO " . qf_getTName("fish_logs") ." (`uid`, `type`, `count`,`counts`, `fromid`, `time`, `cropid`, `isread` ) VALUES (" . $_REQUEST['u'] . ", 2, 1,'0:1:0', " . $_QFG['uid'] . ", " . $_QFG['timestamp'] . ", 0, 0);";
		}
		$_QFG['db']->query($sql);
		die('{"a":'.$a.',"code":1,"poptype":1,"d":"'.$tips_arr['r_h'].'","k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
	}

	die('{"a":'.$a.',"code":1,"poptype":0,"d":"","k":'.$bstatus[$a]['k'].',"r":'.$bstatus[$a]['r'].',"s":'.$bstatus[$a]['s'].',"u":"'.$_REQUEST['u'].'"}');
}

?>