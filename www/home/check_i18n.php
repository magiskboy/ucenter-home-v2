<?php
/**
 * Kiểm tra cấu hình i18n (chạy xong nên xóa hoặc bảo vệ)
 * Mở: http://localhost:8080/home/check_i18n.php
 */
@define('IN_UCHOME', TRUE);
define('S_ROOT', dirname(__FILE__).'/');
if (!@include_once(S_ROOT.'config.php')) {
    die('Không load được config.php');
}
$vi_vn_style = S_ROOT.'template/vi_VN/style.css';
$vi_vn_exists = file_exists($vi_vn_style);
header('Content-Type: text/plain; charset=utf-8');
echo "=== Check i18n UCHome ===\n";
echo "S_ROOT: " . S_ROOT . "\n";
echo "\$_SC['language']: " . (isset($_SC['language']) ? var_export($_SC['language'], true) : 'KHÔNG TỒN TẠI') . "\n";
echo "Đường dẫn template vi_VN: " . $vi_vn_style . "\n";
echo "File style.css vi_VN tồn tại: " . ($vi_vn_exists ? 'CÓ' : 'KHÔNG') . "\n";
echo "\nKết luận: " . ($vi_vn_exists && isset($_SC['language']) && trim($_SC['language']) === 'vi_VN' ? 'Cấu hình đúng, nên hiển thị tiếng Việt. Nếu vẫn thấy tiếng Trung: xóa thư mục data/tpl_cache/ rồi tải lại trang.' : 'Kiểm tra config.php (language = vi_VN) và có thư mục template/vi_VN/ trong image.') . "\n";
