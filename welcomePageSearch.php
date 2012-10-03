<?php
        $title = "Welcome";
	include 'Header.php';
?>
	Zip code entered was: <?php echo $_POST["zip"];?>
	
<?php
	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	echo $parts[count($parts) - 1];
	include 'Footer.php';
?>
