<?php
session_start();
include "connection.php";

$fullname   = trim($_POST['fullname']);
$username   = trim($_POST['username']);
$password   = trim($_POST['password']);
$password2  = trim($_POST['password2']);

if($password != $password2) {
	$_SESSION['saved_form'] = $_POST;
	header("Location: register.php?msg=1");
	die("Exit");
}

$sql = "SELECT * FROM `Users2` WHERE `username` = '$username'  ";
$res = $db->query($sql);
$row = $res->fetch_array();
if($row) {
	$_SESSION['saved_form'] = $_POST;
	header("Location: register.php?msg=2");
	die("Exit");
}

$sql = "SELECT * FROM `Users2` WHERE `email` = '$_POST[email]'  ";
$res = $db->query($sql);
$row = $res->fetch_array();
if($row) {
	$_SESSION['saved_form'] = $_POST;
	header("Location: register.php?msg=3");
	die("Exit");
}

$md5 = md5($_POST['password']);

$sql = "INSERT INTO `Users2` (`id`, `fullname`, `email`, `username`, `password`) VALUES (NULL, '$_POST[fullname]', '$_POST[email]', '$_POST[username]', '$md5')";
$res = $db->query($sql);
			
header("Location: index.php?msg=5");
die("Exit");
 
?>