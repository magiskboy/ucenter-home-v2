<?php

# Khởi tạo một người sử dụng dữ liệu mới
if($nc_uid == null) {
	//Vàng ban đầu
	$money = 500;
	//Tiền Y ban đầu
	$yb = 0;
	//Các thông số ao ban đầu
	$bstatus='[{"a":0,"b":42,"c":4,"g":22,"d":13,"m":22,"h":0,"j":0,"k":0,"bn":"\\\u867e\\\u864e\\\u9c7c","n":[],"p":[],"w":0,"q":'.($_QFG['timestamp']-21700).',"r":0,"s":0,"t":'.($_QFG['timestamp']-21700).',"x":100},{"a":1,"b":42,"c":4,"g":22,"d":13,"m":22,"h":0,"j":0,"k":0,"bn":"\\\u867e\\\u864e\\\u9c7c","n":[],"p":[],"w":0,"q":'.($_QFG['timestamp']-12000).',"r":0,"s":0,"t":'.($_QFG['timestamp']-12000).',"x":100},{"a":2,"b":43,"c":4,"g":27,"d":16,"m":27,"h":0,"j":0,"k":0,"bn":"\\\u6c99\\\u7538\\\u9c7c","n":[],"p":[],"w":0,"q":'.($_QFG['timestamp']-16200).',"r":0,"s":0,"t":'.($_QFG['timestamp']-16200).',"x":100},{"a":3,"b":0,"c":0,"g":0,"d":0,"m":0,"h":0,"j":0,"k":0,"bn":"","n":[],"p":[],"w":0,"q":0,"r":0,"s":0,"t":0,"x":100},{"a":4,"b":0,"c":0,"g":0,"d":0,"m":0,"h":0,"j":0,"k":0,"bn":"","n":[],"p":[],"w":0,"q":0,"r":0,"s":0,"t":0,"x":100},{"a":5,"b":0,"c":0,"g":0,"d":0,"m":0,"h":0,"j":0,"k":0,"bn":"","n":[],"p":[],"w":0,"q":0,"r":0,"s":0,"t":0,"x":100}]';

	//Kinh nghiệm ban đầu
	$exp = 0;
	//Trang trí ban đầu
	$decorative ='{"1":{"11001":{"status":1,"validtime":1}},"2":{"12001":{"status":1,"validtime":1}},"3":{"13001":{"status":1,"validtime":1}},"4":{"14001":{"status":1,"validtime":1}}}';
	//Tạo chó
	$dog = '{"t":0,"ds":"n","dc":0,"dm":0,"dt":0}';
	//Cần câu cá
	$fr = '{"t":0,"effect":1,"time":0}';
    //Tạo hướng dẫn
	$tips ='{"s_h":"谢谢帮忙，你真是个好人！","k_h":"谢谢你，鲨鱼被宰杀掉了！","r_h":"谢谢你，垃圾清除干净了！","k_a":"警察呢，快来捉坏人啊！","r_a":"可恶啊！你真不是个好人！"}';

	//Các thông số lưu trữ
	$_QFG['db']->query("INSERT INTO " . qf_getTName("fish_ui") . "(uid,username,money,yb,bstatus,exp,decorative,dog,fr,tips) VALUES({$_QFG['uid']},'".$_QFG['uname']."',{$money},{$yb},'" . $bstatus . "',{$exp},'" .$decorative . "','".$dog."','".$fr."','".$tips."')");
	//Thêm Feed
	qf_addFeed('user_init');
}

?>