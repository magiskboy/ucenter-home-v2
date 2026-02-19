<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: uc.php 6756 2010-03-25 08:53:42Z liguode $
 */

define('UC_CLIENT_VERSION', '1.5.0');	//note UCenter 版本标识
define('UC_CLIENT_RELEASE', '20081212');

define('API_DELETEUSER', 1);		//用户删除 API 接口开关
define('API_RENAMEUSER', 1);		//用户名修改 API 接口开关
define('API_GETTAG', 1);		//获取标签 API 接口开关
define('API_SYNLOGIN', 1);		//同步登录 API 接口开关
define('API_SYNLOGOUT', 1);		//同步登出 API 接口开关
define('API_UPDATEPW', 1);		//更改用户密码 开关
define('API_UPDATEBADWORDS', 1);	//更新关键字列表 开关
define('API_UPDATEHOSTS', 1);		//更新HOST文件 开关
define('API_UPDATEAPPS', 1);		//更新应用列表 开关
define('API_UPDATECLIENT', 1);		//更新客户端缓存 开关
define('API_UPDATECREDIT', 1);		//更新用户积分 开关
define('API_GETCREDIT', 1);	//向 UC 提供积分 开关
define('API_GETCREDITSETTINGS', 1);	//向 UC 提供积分设置 开关
define('API_UPDATECREDITSETTINGS', 1);	//更新应用积分设置 开关
define('API_ADDFEED', 1);	//向 UCHome 添加feed 开关

define('API_RETURN_SUCCEED', '1');
define('API_RETURN_FAILED', '-1');
define('API_RETURN_FORBIDDEN', '-2');

//加载共享库
if(chdir('../')) {
	include_once('common.php');
} else die(API_RETURN_FAILED);


//获取参数
$post = $get = array();
$post = uc_serialize(file_get_contents('php://input'));
parse_str(uc_authcode($_GET['code'], 'DECODE', UC_KEY), $get);
$get = uc_addslashes($get, 0);
if(time() - $get['time'] > 3600) {
	exit('Authracation has expiried');
}
if(empty($get)) {
	exit('Invalid Request');
}

//触发函数
if(in_array($get['action'], array('test', 'synlogin', 'synlogout', 'updatepw'))) {
	$uc_note = new uc_note();
	exit($uc_note->$get['action']($get, $post));
} else {
	exit(API_RETURN_FAILED);
}

class uc_note {
	function uc_note() {
		global $_QFG;
		$this->db = $_QFG['db'];
	}
	#通信检测
	function test($get, $post) {
		return API_RETURN_SUCCEED;
	}
	#同步登陆
	function synlogin($get, $post) {
		if(!API_SYNLOGIN) {
			return API_RETURN_FORBIDDEN;
		}
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		$uid = intval($get['uid']);
		$query = $this->db->query("SELECT password FROM ".qf_getTName('qqfarm_user')." WHERE uid='$uid'");
		if($member = $this->db->fetch($query)) {
			setcookie($cookiepre.'auth', uc_authcode("$member[password]\t$uid", 'ENCODE'), 31536000);
		}
	}
	#同步退出
	function synlogout($get, $post) {
		if(!API_SYNLOGOUT) {
			return API_RETURN_FORBIDDEN;
		}
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		setcookie('auth', '', -31536000);
	}
	#更新用户密码
	function updatepw($get, $post) {
		if(!API_UPDATEPW) {
			return API_RETURN_FORBIDDEN;
		}
		$regname = $get['username'];
		$newpw = md5(time().rand(100000, 999999));
		$this->db->query("UPDATE ".qf_getTName('qqfarm_user')." SET password='$newpw' WHERE regname='$regname'");
		return API_RETURN_SUCCEED;
	}
}

?>