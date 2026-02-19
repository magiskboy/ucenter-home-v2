<?php

# Thư viện cache
# create by seaif@zealv.com

/**
 * Đọc bộ nhớ cache
 */
function qf_getCache($key) {
	if(is_array($key)) {
		foreach($key as $k) qf_getCache($k);
	} else {
		$cName = '_'.strtoupper($key);
		$_tpl = 'data/' . strtolower($key) . '.php';
		$_cpl = 'data/cache/' . strtolower($key) . '.php';
		if(!@include($_cpl)) {
			include($_tpl);
			qf_putCache(strtoupper($key), $$cName);
		}
		$GLOBALS[$cName] = (array)$$cName;
	}
}

/**
 * Viết cache
 */
function qf_putCache($key, $value) {
	$_cpl = 'data/cache/' . strtolower($key) . '.php';
	$cValue = strtoupper($key) . " = " . var_export($value, true);
	return file_put_contents($_cpl, "<?php\r\n\$_" . $cValue . ";\r\n?>");
}

?>