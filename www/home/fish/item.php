<?php
include_once('common.php');
header('Content-Type:text/html; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

$auth && die($auth);
include_once("source/ui/fish.php");

# V&#7853;t ph&#7849;m
if($_REQUEST['mod']=="item" && $_REQUEST['act']=="activeitem") {
	$i = $_POST['i'];
	$decorative = $_QFG['db']->result($_QFG['db']->query("SELECT decorative FROM " . qf_getTName("fish_ui") . " where uid=" . $_QFG['uid']), 0);
	$decorative = qf_decode($decorative);
	foreach($decorative as $item_type => $value) {
			foreach((array)$value as $key => $value1) {
					if($key == $i) {
						$dec = $item_type;
						$decorative[$item_type][$i]['status'] = 1;
					}
				}
			}
			if($dec) {
				foreach($decorative as $item_type => $value)
					if($item_type == $dec) {
						foreach((array)$value as $key => $value1) {
							if($key != $i)
								$decorative[$item_type][$key]['status'] = 0;
						}
					}
			}
			$_QFG['db']->query("UPDATE " . qf_getTName("fish_ui") . " set decorative='" . qf_encode($decorative) . "' where uid=" . $_QFG['uid']);
	
	echo '{"code":1,"i":' . $i . '}';
}

?>