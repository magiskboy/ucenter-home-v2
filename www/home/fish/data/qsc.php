<?php

# QQFarm System Config [QSC]
# Create by seaif@zealv.com


//Bắt đầu từ những người đầu tiên
is_array($_QSC) || $_QSC = array();

//Chức năng kiểm soát chuyển đổi
$_QSC['apiType'] = 'uchome'; //Loại giao diện
$_QSC['friendType'] = 1; //Bạn bè trong danh sách loại [1: bạn bè mặc định, 2: Tất cả các trạm bạn bè]
$_QSC['missionName'] = '0415'; //Các hoạt động hiện tại [điền vào tiêu đề sự kiện, trống, gần]

//Tiêu bản thông số
$_QSC['view']['tplId'] = 'qf_default';//Tiêu bản Tên
$_QSC['view']['tplDir'] = 'view/';//Tiêu bản thư mục gốc
$_QSC['view']['cplDir'] = 'data/view/';//Xây dựng thư mục
$_QSC['view']['tplBak'] = 'view/qf_default/';//Sao lưu các mẫu
$_QSC['view']['player'] = 1; //Music Player [0: off | 1: Chơi nhạc]

//Danh sách các quản trị viên
$_QSC['adminer'] = array(1);//Định dạng mảng

//Đóng ao cá
$_QSC['closefarm'] = 1;//0 là tắt, 1 để mở
$_QSC['closeinfo'] = 'Thành viên sử dụng, Xin chào, tất cả mọi người：<br /><br />　　Để hiển thị những người của các dân tộc ở Thanh Hải Yushu chia buồn sâu sắc đến các nạn nhân động đất, Hội đồng Nhà nước quyết định 21 Tháng Tư 2010 là ngày quốc tang. Trong thời gian ngừng của tất cả các vui chơi giải trí công cộng.<br />　　Trong phản ứng của Bộ Ngoại giao kêu gọi để thể hiện trong trận động đất Yushu tỉnh Thanh Hải người bị ảnh hưởng của cảm xúc đau buồn, chúng tôi quyết định lúc 12:00 ngày 21 Tháng Tư 2010 trở đi, ngừng sử dụng tất cả các ứng dụng chơi game. Sẽ được tổ chức tại 0:00 vào ngày 22 Tháng Tư 2010 đã bắt đầu trở lại bình thường, cảm ơn bạn cho sự hiểu biết và hợp tác của bạn. Hãy để chúng tôi vượt qua, để đóng góp phần của mình.';//Đóng ao cá

?>