<?php
$db = new MySQLi("localhost", "root", "", "test");

foreach ($_POST as $key => $value) {
	$_POST[$key] = addslashes($value);   
}

foreach ($_GET as $key => $value) {
	$_GET[$key] = addslashes($value);   
}

?>