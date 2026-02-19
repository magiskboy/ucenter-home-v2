<?php
/**
 * Gateway: mở QQFarm trong ngữ cảnh UCenter Home.
 * Cần chạy sau common.php để có $_SGLOBAL, $_SC, template(), realname_*.
 */
include_once('./common.php');

// Bắt buộc đăng nhập để vào Nông trại
checklogin();

include_once(S_ROOT . './qqfarm/qqfarm.inc.php');
