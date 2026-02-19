<?php

include_once("common.php");

realname_set($_SGLOBAL['supe_uid'], $_SGLOBAL['supe_username']);
realname_get();

$qfCharset = $_SC['charset'] ? strtolower($_SC['charset']) : 'utf-8';

if(!@include('fish/data/cache/qsc.php')) {
	@include('fish/data/qsc.php');
}

include template('fish/view/api_uchome/main.' . $qfCharset);

?>