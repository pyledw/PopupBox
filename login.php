
<?php
        $title = "Login";
	include 'Header.php';
	
	session_start();
	$_SESSION['User'] = $_POST['username'];
	echo $_SESSION['User'];
	

	include 'Footer.php';

?>
