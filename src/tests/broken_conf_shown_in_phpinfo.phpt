--TEST--
Broken configuration
--SKIPIF--
<?php if (!extension_loaded("snuffleupagus")) print "skip"; ?>
--INI--
sp.configuration_file={PWD}/config/broken_config_regexp.ini
--FILE--
<?php
ob_start();
phpinfo();
$info = ob_get_clean();
ob_get_clean();
if (strstr($info, 'Valid config => no') !== FALSE) {
	echo "win";
} else {
	echo "lose";
}
?>
--EXPECTF--
[snuffleupagus][0.0.0.0][config][error] Failed to compile '*.': %aon line 1.
[snuffleupagus][0.0.0.0][config][error] '.filename_r()' is expecting a valid regexp, and not '"*."' on line 1.
win
