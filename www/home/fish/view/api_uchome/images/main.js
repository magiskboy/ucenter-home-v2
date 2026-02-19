/*!
 * 提示: 此文件继承UCH模板中加载的js定义
 */


//菜单选择
function qfMenu(o) {
	if(o) {
		$('myfarm').src = o.href;
		//设置样式
		var thisTab = o.parentNode,
		    lastTab = qfMenu.lastTab || $('tab0');
		lastTab.className = '';
		thisTab.className = 'active';
		qfMenu.lastTab = thisTab;
	}
	else dlBox1_Show();
	return false;
}

/*!
 * 音乐播放器控制
 * height:48|83|230
 */
function loadPlayer(height) {
	if(height > 0) {
		if(!loadPlayer.status) {
			loadPlayer.status = 1;
			$("qfplayer_main").className = 'qfplayer_main';
			$("qfplayer_main").innerHTML = '<div id="mp3Player"></div>';
			swfobject.embedSWF(
				"http://box.baidu.com/widget/flash/list.swf?id=605861&autoPlay=true", 
				"mp3Player", "100%", "100%",
				"9.0.124", "qqfarm/source/script/swfobject/expressInstall.swf",
				{}, {wmode:"opaque", allowscriptaccess:"always"}
			);
		}
		$("qfplayer_main").style.height = height + 'px';
	}
	else {
		loadPlayer.status = 0;
		$("qfplayer_main").className = '';
		$("qfplayer_main").innerHTML = '';
		$("qfplayer_main").style.height = '0px';
	}
}


//////////////////////////////////////////////////////////////////////
