<?php
/**
 * Fish App – Cài đặt lần đầu
 * Chạy: http://<domain>/home/fish/install/
 * Import fish-data.sql vào database UCHome, tạo install.lock.
 */

@header('Content-Type:text/html; charset=utf-8');
@header('Cache-Control: no-cache, must-revalidate');

define('FISH_ROOT', str_replace('\\', '/', dirname(__DIR__)));
define('FISH_INSTALL_LOCK', FISH_ROOT . '/data/install.lock');
define('FISH_SQL_FILE', FISH_ROOT . '/install/fish-data.sql');

// Chặn cài lại nếu đã cài
if (file_exists(FISH_INSTALL_LOCK)) {
	die('Fish đã được cài đặt. Để cài lại, hãy xóa file: <code>home/fish/data/install.lock</code> rồi chạy lại.');
}

// Kiểm tra file SQL
if (!is_readable(FISH_SQL_FILE)) {
	die('Không đọc được file dữ liệu. Kiểm tra file <code>home/fish/install/fish-data.sql</code> đã tồn tại.');
}

$sql = @file_get_contents(FISH_SQL_FILE);
if ($sql === false || trim($sql) === '') {
	die('File fish-data.sql trống hoặc không đọc được.');
}

// Load cấu hình UCHome (DB + tablepre)
$home_config = dirname(FISH_ROOT) . '/config.php';
if (!is_readable($home_config)) {
	die('Không tìm thấy cấu hình UCHome. Đảm bảo file <code>home/config.php</code> tồn tại.');
}
include_once $home_config;

if (empty($_SC) || empty($_SC['dbhost']) || empty($_SC['dbname'])) {
	die('Cấu hình database trong home/config.php chưa đúng (dbhost, dbname).');
}

$tablepre = isset($_SC['tablepre']) ? $_SC['tablepre'] : 'uchome_';
$dbcharset = isset($_SC['dbcharset']) ? $_SC['dbcharset'] : 'utf8';

// Thay prefix trong SQL: uchome_ → tablepre của site (chỉ tên bảng trong backtick)
$sql = str_replace('`uchome_', '`' . $tablepre, $sql);

// Kết nối DB (tương thích PHP 5.6)
$link = @mysql_connect($_SC['dbhost'], $_SC['dbuser'], $_SC['dbpw'], true);
if (!$link) {
	die('Kết nối database thất bại: ' . mysql_error());
}

if (!@mysql_select_db($_SC['dbname'], $link)) {
	mysql_close($link);
	die('Chọn database thất bại: ' . mysql_error());
}

if ($dbcharset && function_exists('mysql_set_charset')) {
	@mysql_set_charset(str_replace('-', '', $dbcharset), $link);
}

// Thực thi SQL
if (runquery($sql, $link, $tablepre, $dbcharset)) {
	@touch(FISH_INSTALL_LOCK);
	echo '<p><strong>Cài đặt Fish thành công.</strong></p>';
	echo '<p>Khuyến nghị: xóa hoặc đổi tên thư mục <code>home/fish/install/</code> để tránh chạy lại cài đặt.</p>';
	echo '<p><a href="../">Vào Ao cá</a> | <a href="../../">Về Trang chủ</a></p>';
} else {
	echo '<p>Cài đặt thất bại. Chi tiết lỗi: <code>' . htmlspecialchars(mysql_error($link)) . '</code></p>';
	echo '<p>Kiểm tra log (nếu có): <code>home/fish/data/logs/#mysql_error.log</code></p>';
}
mysql_close($link);

/**
 * Chạy từng câu lệnh SQL (tách theo ; \n)
 */
function runquery($sql, $link, $tablepre, $dbcharset) {
	$queries = array();
	$sql = str_replace("\r", "\n", $sql);
	$sql = explode(";\n", $sql);

	foreach ($sql as $stmt) {
		$stmt = trim($stmt);
		// Bỏ comment và dòng trống
		$lines = explode("\n", $stmt);
		$cleaned = '';
		foreach ($lines as $line) {
			$t = trim($line);
			if ($t === '' || $t[0] === '#' || (strlen($t) >= 2 && substr($t, 0, 2) === '--')) {
				continue;
			}
			$cleaned .= $line . "\n";
		}
		$stmt = trim($cleaned);
		if ($stmt === '') {
			continue;
		}

		// Chuẩn hóa CREATE TABLE: thêm ENGINE và CHARSET nếu thiếu
		if (stripos($stmt, 'CREATE TABLE') === 0) {
			if (stripos($stmt, 'ENGINE=') === false && stripos($stmt, 'TYPE=') === false) {
				$stmt = preg_replace('/\s*\)\s*$/s', ') ENGINE=MyISAM DEFAULT CHARSET=' . $dbcharset, $stmt);
			}
		}

		if (!@mysql_query($stmt, $link)) {
			return false;
		}
	}
	return true;
}
