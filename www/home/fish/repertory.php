<?php
include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);
include_once("source/ui/fish.php");

# Cá 3D
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="getblist" && $_REQUEST['type']=="3") {
	$fishtype3 = array();
	foreach($fishtype as $value) {
		if( $value['bt']==3 ) {
			$fishtype3[] = $value;
		}
	}
	$echo_str = ui_jsonCode(array_values($fishtype3));
	die($echo_str);
}

# Cá 2D
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="getblist") {
	$fishtype2 = array();
	foreach($fishtype as $value) {
		if( $value['bt']==2 ) {
			$fishtype2[] = $value;
		}
	}
	$echo_str = ui_jsonCode(array_values($fishtype2));
	die($echo_str);
}

# Cá 1D
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="buyb") {
	$b = $_REQUEST['b'];
	$num = $_REQUEST['num'];
	# Cá 1
	 if($_REQUEST['f']==0){
		$query = $_QFG['db']->query("SELECT money,package FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$money = $list[0]['money'];
		$package = qf_decode($list[0]['package']);
		$moneytotal = $num*$fishtype[$b]['price'];
		if($money<$moneytotal) {
			die('{"b":'.$b.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
		$package[$b] += $num;

		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set package='" . qf_encode($package) . "',money=money-" . $moneytotal . " where uid=" . $_QFG['uid']);

		die('{"b":'.$b.',"code":1,"bn":"'.$fishtype[$b]["bn"].'","num":'.$num.',"m":-'.$moneytotal.',"f":0}');
	 }

	 # Cá 2
	if($_REQUEST['f']==1) {
		$query = $_QFG['db']->query("SELECT yb,package FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$yb = $list[0]['yb'];
		$package = qf_decode($list[0]['package']);
		$ybtotal = $num*$fishtype[$b]['fprice'];
		if($yb<$ybtotal) {
			die('{"b":'.$b.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
		$package[$b] += $num;
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set package='" . qf_encode($package) . "',yb=yb-" . $ybtotal . " where uid=" . $_QFG['uid']);
		die('{"b":'.$b.',"code":1,"bn":"'.$fishtype[$b]["bn"].'","num":'.$num.',"m":0,"f":-'.$ybtotal.'}');
	}
}



# Danh sách 1
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="gettlist") {
	$echo_str = ui_jsonCode(array_values($toolstype));
	die($echo_str);
}

# Danh Sách 2
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="buyt") {
	$t = $_REQUEST['t'];
	$num = $_REQUEST['num'];
	# Danh sách 2A
	 if($_REQUEST['f']==0){
		$query = $_QFG['db']->query("SELECT money,tools FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$money = $list[0]['money'];
		$tools = qf_decode($list[0]['tools']);
		$moneytotal = $num*$toolstype[$t]['price'];		
		if($money<$moneytotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
		$tools[$t] += $num;

		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money-" . $moneytotal . ",tools='" . qf_encode($tools) . "' where uid=" . $_QFG['uid']);
		
		die('{"t":'.$t.',"code":1,"num":'.$num.',"m":-'.$moneytotal.',"f":0,"e":0,"d":"\u60a8\u8d2d\u4e70\u4e86 '.$num.' \u4efd '.$toolstype[$t]["tn"].'","levelup":false}');
	}
     # Danh sách 2B
	 if($_REQUEST['f']==1){
		$query = $_QFG['db']->query("SELECT yb,tools FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$yb = $list[0]['yb'];
		$tools = qf_decode($list[0]['tools']);
		$ybtotal = $num*$toolstype[$t]['fprice'];
		if($yb<$ybtotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
		$tools[$t] += $num;

		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set yb=yb-" . $ybtotal . ",tools='" . qf_encode($tools) . "' where uid=" . $_QFG['uid']);

		die('{"t":'.$t.',"poptype":0,"code":1,"num":'.$num.',"m":0,"f":-'.$ybtotal.',"e":0,"d":"\u60a8\u8d2d\u4e70\u4e86 '.$num.' \u4efd '.$toolstype[$t]["tn"].'","levelup":false}');
	}
}

# Danh sách 3
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="buyfr") {
	$t = $_REQUEST['ri'];
	# Danh sách 3A
	 if($_REQUEST['f']==0){
		$query = $_QFG['db']->query("SELECT money,fr FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$money = $list[0]['money'];
		$fr_arr = qf_decode($list[0]['fr']);
		$moneytotal = $toolstype[$t]['price'];	
		if($money<$moneytotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
		$fr_arr['fr'] =  $toolstype[$t]['effect'] ;
		$fr_arr['time'] = $_QFG['timestamp'] + $toolstype[$t]['timelimit'] ;
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money-" . $moneytotal . ",fr='" . qf_encode($fr_arr) . "' where uid=" . $_QFG['uid']);
		
		die('{"code":1,"d":"","re":'.$fr_arr['fr'].',"rt":'.$t.',"rn":"'.$toolstype[$t]['tn'].'","m":-'.$moneytotal.',"f":0}');
	}
     # Danh sách 3B
	 if($_REQUEST['f']==1){
				$query = $_QFG['db']->query("SELECT yb,fr FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$yb = $list[0]['yb'];
		$fr_arr = qf_decode($list[0]['fr']);
		$ybtotal = $toolstype[$t]['price'];	
		if($yb<$ybtotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
		$fr_arr['fr'] =  $toolstype[$t]['effect'] ;
		$fr_arr['time'] = $_QFG['timestamp'] + $toolstype[$t]['timelimit'] ;
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set yb=yb-" . $ybtotal . ",fr='" . qf_encode($fr_arr) . "' where uid=" . $_QFG['uid']);
		
		die('{"code":1,"d":"","re":'.$fr_arr['fr'].',"rt":'.$t.',"rn":"'.$toolstype[$t]['tn'].'","m":0,"f":-'.$ybtotal.'}');
	}
}

# Danh sách 4
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="buyd") {
	$t = (int)$_REQUEST['t'];
	$num = $_REQUEST['num'];
	# Danh sách 4A
	 if($_REQUEST['f']==0){
		$query = $_QFG['db']->query("SELECT money,dog FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$money = $list[0]['money'];
		$dog = qf_decode($list[0]['dog']);
		$moneytotal = $toolstype[$t]['price'];		
		if($money<$moneytotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}

		$dog['t'] = $t;
		$dog['ds']  = 'f';
		$dog['dt'] = $_QFG['timestamp']+4*24*3600;
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money-" . $moneytotal . ",dog='" . qf_encode($dog) . "' where uid=" . $_QFG['uid']);
		
		die('{"t":'.$t.',"poptype":0,"code":1,"num":'.$num.',"m":-'.$moneytotal.',"f":0,"e":0,"d":"","levelup":false}');
	}
     # Danh sách 4B
	 if($_REQUEST['f']==1){
		$query = $_QFG['db']->query("SELECT yb,dog FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$yb = $list[0]['yb'];
		$dog = qf_decode($list[0]['dog']);
		$ybtotal = $toolstype[$t]['fprice'];		
		if($yb<$ybtotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}

		$dog['t'] = $t;
		$dog['ds']  = 'f';
		$dog['dt'] = $_QFG['timestamp']+4*24*3600;
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set yb=yb-" . $ybtotal . ",dog='" . qf_encode($dog) . "' where uid=" . $_QFG['uid']);
		
		die('{"t":'.$t.',"poptype":0,"code":1,"num":'.$num.',"m":0,"f":-'.$ybtotal.',"e":0,"d":"","levelup":false}');
	}
}

# Danh sách 5
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="buydf") {
	$t = (int)$_REQUEST['t'];
	$num = $_REQUEST['num'];
	# Danh sách 5A
	 if($_REQUEST['f']==0){
		$query = $_QFG['db']->query("SELECT money,dog FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$money = $list[0]['money'];
		$dog = qf_decode($list[0]['dog']);
		$moneytotal = $num*$toolstype[$t]['price'];
		$effecttotal = $num*$toolstype[$t]['effect'];	
		if($money<$moneytotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
	
		if($dog['dt']<$_QFG['timestamp']) {
			$dog['dt'] = $_QFG['timestamp'] + $effecttotal;
		} else {
			$dog['dt'] +=  $effecttotal;
		}
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money-" . $moneytotal . ",dog='" . qf_encode($dog) . "' where uid=" . $_QFG['uid']);
		
		die('{"t":'.$t.',"poptype":0,"code":1,"num":'.$num.',"m":-'.$moneytotal.',"f":0,"e":0,"d":"","levelup":false}');
	}
     # Danh sách 5B
	 if($_REQUEST['f']==1){
		$query = $_QFG['db']->query("SELECT yb,dog FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$yb = $list[0]['yb'];
		$dog = qf_decode($list[0]['dog']);
		$ybtotal = $num*$toolstype[$t]['price'];
		$effecttotal = $num*$toolstype[$t]['effect'];	
		if($yb<$ybtotal) {
			die('{"t":'.$t.',"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}
	
		if($dog['dt']<$_QFG['timestamp']) {
			$dog['dt'] = $_QFG['timestamp'] + $effecttotal;
		} else {
			$dog['dt'] +=  $effecttotal;
		}
		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set yb=yb-" . $ybtotal . ",dog='" . qf_encode($dog) . "' where uid=" . $_QFG['uid']);
		
		die('{"t":'.$t.',"poptype":0,"code":1,"num":'.$num.',"m":0,"f":-'.$ybtotal.',"e":0,"d":"","levelup":false}');
	}
}

# Danh sách 6
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="getilist") {
	$echo_str = ui_jsonCode(array_values($itemtype));
	die($echo_str);
}

# Danh sách 7
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="buyitem") {
    $itemid = $_REQUEST['i'];

	# Danh sách 7A
	if($_REQUEST['f']==0){
		$query = $_QFG['db']->query("SELECT money,decorative FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$money = $list[0]['money'];
		$decorative = qf_decode($list[0]['decorative']);

		$buy_money = $itemtype[$itemid]['m'];
		$buy_time = $itemtype[$itemid]['lc'];
		$buy_type = $itemtype[$itemid]['t'];
		$buy_exp = $itemtype[$itemid]['e'];
		if($money < $buy_money) {
			die('{"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}

		foreach($decorative as $item_type => $value) {
			if($buy_type == $item_type) {
				foreach($value as $key => $value1) {
					if($key == $itemid) {
						die('{"d":"\u4F60\u5DF2\u7ECF\u8D2D\u4E70\u8FC7\u4E86\uFF0C\u4E0D\u5FC5\u91CD\u590D\u8D2D\u4E70\uFF01"}');
					} else {
						$dec = 1;
						$decorative[$item_type][$itemid]['status'] = 1;
						$decorative[$item_type][$itemid]['validtime'] = $_QFG['timestamp'] + $buy_time;
					}
				}
				if($dec) {
					foreach($value as $key => $value1) {
						if($key != $itemid) $decorative[$item_type][$key]['status'] = 0;
					}
				}
			}
		}

		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money - " . $buy_money . ",exp = exp + " . $buy_exp . ",decorative='" . qf_encode($decorative) . "' where uid=" . $_QFG['uid']);
		
		die('{"code":1,"e":' . $buy_exp . ',"m":-' . $buy_money . ',"levelUp":false,"d":"\u60a8\u8d2d\u4e70\u4e86 '.$itemtype[$itemid]['in'].'" }');
	 }

	# Danh sách 7B
	if($_REQUEST['f']==1){
		$query = $_QFG['db']->query("SELECT yb,decorative FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
		while($value = $_QFG['db']->fetch_array($query)) {
			$list[] = $value;
		}
		$yb = $list[0]['yb'];
		$decorative = qf_decode($list[0]['decorative']);

		$buy_yb = $itemtype[$itemid]['f'];
		$buy_time = $itemtype[$itemid]['lc'];
		$buy_type = $itemtype[$itemid]['t'];
		$buy_exp = $itemtype[$itemid]['e'];
		if($yb < $buy_yb) {
			die('{"code":0,"d":"\u60A8\u7684\u4F59\u989D\u4E0D\u8DB3\uFF01"}');
		}

		foreach($decorative as $item_type => $value) {
			if($buy_type == $item_type) {
				foreach($value as $key => $value1) {
					if($key == $itemid) {
						die('{"d":"\u4F60\u5DF2\u7ECF\u8D2D\u4E70\u8FC7\u4E86\uFF0C\u4E0D\u5FC5\u91CD\u590D\u8D2D\u4E70\uFF01"}');
					} else {
						$dec = 1;
						$decorative[$item_type][$itemid]['status'] = 1;
						$decorative[$item_type][$itemid]['validtime'] = $_QFG['timestamp'] + $buy_time;
					}
				}
				if($dec) {
					foreach($value as $key => $value1) {
						if($key != $itemid) $decorative[$item_type][$key]['status'] = 0;
					}
				}
			}
		}

		$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set yb=yb - " . $buy_yb . ",exp = exp + " . $buy_exp . ",decorative='" . qf_encode($decorative) . "' where uid=" . $_QFG['uid']);
		
		die('{"code":1,"e":' . $buy_exp . ',"f":-' . $buy_yb . ',"levelUp":false,"d":"\u60a8\u8d2d\u4e70\u4e86 '.$itemtype[$itemid]['in'].'" }');
	 }
}

# Danh sách 8
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="getuseritems") {

	$decorative = $_QFG['db']->result($_QFG['db']->query("SELECT decorative FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	$decorative = qf_decode($decorative);
	foreach($decorative as $item_type => $value) {
		foreach($value as $key => $value1) {
			if($value1['validtime'] > $_QFG['timestamp'] || $value1['validtime'] == 1) {
				if($key == 11001) {
					$get_itemName = '\u7f3a\u7701\u80cc\u666f';
					$validTime = 2000000000;
				} elseif($key == 12001) {
					$get_itemName = '\u7f3a\u7701\u623f\u5b50';
					$validTime = 2000000000;
				} elseif($key == 13001) {
					$get_itemName = '\u7f3a\u7701\u6e38\u8247';
					$validTime = 2000000000;
				} elseif($key == 14001) {
					$get_itemName = '\u7f3a\u7701\u55b7\u6cc9';
					$validTime = 2000000000;
				} else {
					$get_itemName = $itemtype[$key]['in'];
					$validTime = $value1['validtime'];
				}
				$decorative_str[] = '{"i":' . $key . ',"in":"' . $get_itemName . '","lc":' . $validTime . ',"bt":0,"et":' . $validTime . ',"use":' . $value1['status'] . '}';
			}
		}
	}

echo '[' . implode(',', $decorative_str) . ']';
}

# Danh sách 9
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="getusergoods") {
	$query = $_QFG['db']->query("SELECT package,tools FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']);
	while($value = $_QFG['db']->fetch_array($query)) {
		$list[] = $value;
	}

	$package = qf_decode($list[0]['package']);
	foreach($package as $key => $value) {
		$hour = ($cropstype[$key]['growthCycle']) / 3600;
		if(0 < $value) {
			$packagearr[] = '{"type":1,"b":' . $key . ',"bn":"' . $fishtype[$key]["bn"] . '","amount":' . $value . '}';
		}
	}

	$tools = qf_decode($list[0]['tools']);
	foreach($tools as $key => $value) {
		if(0 < $value && $key < 500) {
			$packagearr[] = '{"type":2,"t":' . $key . ',"tn":"' . $toolstype[$key]["tn"] . '","amount":' . $value . '}';	
		}
	}

	echo '[' . implode(',', (array)$packagearr) . ']';

}

# Danh sách 10
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="getuserhavest") {
	$fruit = $_QFG['db']->result($_QFG['db']->query("SELECT fruit FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	$fruit = qf_decode($fruit);
	$fruitarr = array();
	foreach($fruit as $key => $value) {
		if(0 < $value) {
			$fruitarr[] = '{"b":' . $key . ',"bn":"' . $fishtype[$key]['bn'] . '","amount":' . $value . ',"sale":' . $fishtype[$key]['sale'] . '}';	
		}
	}
	if($fruitarr) {
		$fruitarr = '[' . implode(',', $fruitarr) . ']';
	} else {
		$fruitarr = '[]';
	}

	echo $fruitarr;

}

# Danh sách 11
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="sale") {

	$fruit = $_QFG['db']->result($_QFG['db']->query("SELECT fruit FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	$fruit = qf_decode($fruit);
	if($fruit[$_REQUEST['b']] < $_REQUEST['num']) {
		die('{"b":0,"code":0,"d":"\u8BF7\u786E\u8BA4\u6570\u503C\uFF01"}');
	}

	$fruit[$_REQUEST['b']] -= $_REQUEST['num'];
	foreach($fruit as $key => $value) {
		if($value == 0) {
			unset($fruit[$key]);
		}
	}
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money+" . $fishtype[$_REQUEST['b']][sale] * $_REQUEST['num'] . ",fruit='" . qf_encode($fruit) . "' where uid=" . $_QFG['uid']);

	die('{"b":"'.$_REQUEST['b'].'","code":1,"d":"\u606d\u559c\u4f60\u5356\u51fa\u4e86<b>'.$fishtype[$_REQUEST['b']]['sale'] * $_REQUEST['num'].'<\\\/b>\u4e2a\u91d1\u5e01!","e":0,"m":'.$fishtype[$_REQUEST['b']]['sale'] * $_REQUEST['num'].'}');

}

# Danh sách 12
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="saleall") {

	$fruit = $_QFG['db']->result($_QFG['db']->query("SELECT fruit FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	$fruit = qf_decode($fruit);
	$money = 0;
	foreach($fruit as $key => $value) {
		if(0 < $value ) {
			$money = $money + $fishtype[$key]['sale'] * $value;
			unset($fruit[$key]);
		}
	}
	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set money=money+" . $money . ",fruit='" . qf_encode($fruit) . "' where uid=" . $_QFG['uid']);

	die( '{"code":1,"d":"\u606d\u559c\u4f60\u5356\u51fa\u4e86<b>'.$money.'<\\\/b>\u4e2a\u91d1\u5e01!","e":0,"m":'.$money.'}');

}

# Danh sách 13
if($_REQUEST['mod']=="repertory" && $_REQUEST['act']=="cleanb") {
    $a = $_REQUEST['a'];
	$bstatus = $_QFG['db']->result($_QFG['db']->query("SELECT bstatus FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	$bstatus = qf_decode($bstatus);
	$exp = 2;
	if($bstatus[$a]['c']!=5){
	$exp = 0;
	} 
	$bstatus[$a]['b'] = 0;
	$bstatus[$a]['c'] = 0;

	$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set bstatus='" . qf_encode(array_values($bstatus)) . "', exp=exp+".$exp ."  where uid=" . $_QFG['uid']);


	die('{"a":'.$a.',"code":1,"e":'.$exp .',"levelup":false}');
}
?>