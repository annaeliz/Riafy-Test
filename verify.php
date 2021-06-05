<?php
session_start();

include "connection.php";

$_POST['username'] = trim($_POST['username']);
$_POST['password'] = trim($_POST['password']);

if($_POST['username'] == "" || $_POST['password'] == "") {
	header("Location: index.php?msg=4");
	die("Exit");
}

$md5 = md5($_POST['password']);
$sql = "SELECT * FROM `Users2` WHERE `username` = '$_POST[username]' 
                                      AND `password` = '$md5'  ";
$res = $db->query($sql);
$row = $res->fetch_array();
if($row) {
	$_SESSION['login']    = true;

	$arr = explode(" ", $row['fullname']);
	$_SESSION['fname'] = $arr[0];
	header("Location: search2.php");
}
else {
	header("Location: index.php?msg=2");
}
			
		

?>