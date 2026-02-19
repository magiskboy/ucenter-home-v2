<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	UCHome lang: Tiếng Việt (vi_VN). Mock: nội dung là bản copy tiếng Trung, sửa value thành tiếng Việt.
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['exiflang'] = array(

	'unknown' => 'Không xác định',
	'resolutionunit' => array('', '', 'inch', 'centimét'),
	'exposureprogram' => array('Chưa xác định', 'Thủ công', 'Chương trình chuẩn', 'Ưu tiên khẩu độ', 'Ưu tiên tốc độ', 'Ưu tiên độ sâu trường ảnh', 'Chế độ thể thao', 'Chế độ chân dung', 'Chế độ phong cảnh'),
	'meteringmode' => array(
		'0'		=>	'Không xác định',
		'1'		=>	'Trung bình',
		'2'		=>	'Đo sáng điểm trung tâm',
		'3'		=>	'Đo sáng điểm',
		'4'		=>	'Đo sáng vùng',
		'5'		=>	'Đánh giá',
		'6'		=>	'Cục bộ',
		'255'	=>	'Khác'
		),
	'lightsource' => array(
		'0'		=>	'Không xác định',
		'1'		=>	'Ánh sáng ban ngày',
		'2'		=>	'Đèn huỳnh quang',
		'3'		=>	'Đèn sợi đốt',
		'10'	=>	'Đèn flash',
		'17'	=>	'Ánh sáng tiêu chuẩn A',
		'18'	=>	'Ánh sáng tiêu chuẩn B',
		'19'	=>	'Ánh sáng tiêu chuẩn C',
		'20'	=>	'D55',
		'21'	=>	'D65',
		'22'	=>	'D75',
		'255'	=>	'Khác'
		),
	'img_info' => array ('Thông tin tệp' => 'Không có thông tin EXIF của hình ảnh'),
	
	'FileName' => 'Tên tệp',
	'FileType' => 'Loại tệp',
	'MimeType' => 'Định dạng tệp tin',
	'FileSize' => 'Kích thước tệp',
	'FileDateTime' => 'Dấu thời gian',
	'ImageDescription' => 'Mô tả ảnh',
	'auto'     => 'Tự động',
	'Make'     => 'Nhà sản xuất',
	'Model'    => 'Mẫu máy',
	'Orientation' => 'Định hướng',
	'XResolution' => 'Độ phân giải ngang',
	'YResolution' => 'Độ phân giải dọc',
	'Software'    => 'Phần mềm tạo',
	'DateTime'    => 'Thời gian chỉnh sửa',
	'Artist'      => 'Tác giả',
	'YCbCrPositioning' => 'Định vị YCbCr',
	'Copyright'   => 'Bản quyền',
	'Photographer'=> 'Bản quyền nhiếp ảnh',
	'Editor'      => 'Bản quyền biên tập',
	'ExifVersion' => 'Phiên bản Exif',
	'FlashPixVersion' => 'Phiên bản FlashPix',
	'DateTimeOriginal' => 'Thời gian chụp',
	'DateTimeDigitized'=> 'Thời gian số hoá',
	'Height'  => 'Chiều cao ảnh chụp',
	'Width'   => 'Chiều rộng ảnh chụp',
	'ApertureValue' => 'Khẩu độ',
	'ShutterSpeedValue' => 'Tốc độ màn trập',
	'ApertureFNumber'   => 'Khẩu độ màn trập',
	'MaxApertureValue'  => 'Giá trị khẩu độ lớn nhất',
	'ExposureTime'      => 'Thời gian phơi sáng',
	'FNumber'           => 'Số F',
	'MeteringMode'      => 'Chế độ đo sáng',
	'LightSource'       => 'Nguồn sáng',
	'Flash'             => 'Đèn flash',
	'ExposureMode'		=> 'Chế độ phơi sáng',
	'manual'            => 'Thủ công',
	'WhiteBalance'      => 'Cân bằng trắng',
	'ExposureProgram'   => 'Chương trình phơi sáng',
	'ExposureBiasValue' => 'Bù phơi sáng',
	'ISOSpeedRatings'   => 'Độ nhạy ISO',
	'ComponentsConfiguration' => 'Cấu hình thành phần',
	'CompressedBitsPerPixel'  => 'Tỷ lệ nén ảnh',
	'FocusDistance'     => 'Khoảng cách lấy nét',
	'FocalLength'       => 'Tiêu cự',
	'FocalLengthIn35mmFilm' => 'Tiêu cự quy đổi 35mm',
	'UserCommentEncoding' => 'Mã hóa chú thích người dùng',
	'UserComment'		=> 'Chú thích người dùng',
	'ColorSpace'		=> 'Không gian màu',
	'ExifImageLength'   => 'Chiều rộng ảnh Exif',
	'ExifImageWidth'    => 'Chiều cao ảnh Exif',
	'FileSource'        => 'Nguồn tệp',
	'SceneType'			=> 'Loại cảnh',
	'ThumbFileType'     => 'Định dạng tệp thu nhỏ',
	'ThumbMimeType'     => 'Định dạng MIME thu nhỏ'
);

?>