<?php
	require ('config.php');
	session_start();

if ($_POST["username"] != USERNAME && $_POST['password'] != PASSWORD) {
	header("location:logon.php");	
	
}
	$_SESSION['user'] = $_POST["username"] ;

	
	
?>