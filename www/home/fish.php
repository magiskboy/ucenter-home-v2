<?php
/**
 * Gateway: mở Fish trong ngữ cảnh UCenter Home.
 * Cần chạy sau common.php để có $_SGLOBAL, $_SC, template(), realname_*.
 */
include_once('./common.php');

// Bắt buộc đăng nhập để vào Ao cá
checklogin();

include_once(S_ROOT . './fish/fish.inc.php');
