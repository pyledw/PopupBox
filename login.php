<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
   			<head>
   			<title>Login</title>
   			<link rel="shortcut icon" href="images/favicon.ico" />
<?php
	include 'Header.php';
	
	session_start();
	$_SESSION['User'] = $_POST['username'];
	echo $_SESSION['User'];
	

	include 'Footer.php';

?>
