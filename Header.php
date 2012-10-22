<?php 
	require 'config.inc.php';
	session_start(); 
?>


<?php //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';//This displayes all session variables?>

<!--//Header to be displayed on all pages.  This will show deal with HTML head elements as well
//as the Title, and CSS/Javascript References.  It also contains the navigation bar element.-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>

        <?php
            
            echo $title;//Element defined in the Html document before the Header.php is called
        ?>

    </title>
    <link rel="shortcut icon" href="images/favicon.ico" /><!--Link to Favicon-->
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css" /><!--Link to Main css file -->
    <link rel="stylesheet" type="text/css" href="css/navigationBarStyle.css" /><!--Link to Main css file -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--Meta Data-->
    <script type="text/javascript" src="js/mainJavaScript.js"></script><!--Javascript Reference-->
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="js/css_browser_selector.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    
    <!-- These reference the external files for popups -->
    <script type="text/javascript" src="js/facebox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/facebox.css" />
    
    <!-- These reference the needed external files for the date picker -->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    
    <script src="js/charCount.js"></script>
    <script>
        $(function() {
        $( document ).tooltip();
        });
    </script>
    
    
</head>

    <body>
        
<!-- This section creates the wrapper, and then 
    creates and aligns the wrapper
     It then inserts the navigation bar.-->

	<div id="wrapper">
            
            <div id="header">
            <a href="index.php"><img class="logo" src="images/leasehoodlogo.jpg" alt="LeaseHood Logo" /></a>
            
            <h1 class="header">Lease<font color="#000000">Hood...</font></h1> <h2 class="subHeader">"Putting the Best Residents in Homes"</h2>
            <?php
                if(isset($_SESSION["user"]))
                {
                    echo '<div style="float:right; margin-right:20px;"><h3>Welcome '. $_SESSION["user"] . '</h3> Not you <a href="#loginPopup" rel="facebox" >Login</a><br /><a href="logout.php">Logout</a></div>' ; 
                }
            ?>
            </div>
            <div id="nav">
                <?php
	       				$currentFile = $_SERVER["PHP_SELF"];
						$parts = Explode('/', $currentFile);
						$fileName = $parts[count($parts) - 1];
	       				if ($fileName == 'gettingStarted.php') {
							echo '<a href="gettingStarted.php" class="current">Getting Started</a>';
						}
						else {
							echo '<a href="gettingStarted.php">Getting Started</a>';
						}

	       				if ($fileName == 'searchHomes.php') {
							echo '<a href="searchHomes.php" class="current">Search Homes</a>';
						}
						else {
							echo '<a href="searchHomes.php">Search Homes</a>';
						}

	       				if ($fileName == 'listHome.php') {
							echo '<a href="listHome.php" class="current">List Home</a>';
						}
						else {
							echo '<a href="listHome.php">List Home</a>';
						}
                                        if(isset($_SESSION['user'])){
                                            if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') {
							echo '<a href="login.php" class="current">My Hood</a>';
						}
						else {
							echo '<a href="login.php">My Hood</a>';
						}
                                        }
                                        else{
                                            if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') {
                                                            echo '<a href="login.php" class="current">Login</a>';
                                                    }
                                                    else {
                                                            echo '<a href="login.php">Login</a>';
                                                    }
                                        }
	       			
	       				if ($fileName == 'newUser.php') {
							echo '<a href="newUser.php" class="current">New User</a>';
						}
						else {
							echo '<a href="newUser.php">New User</a>';
						}
	       			
	       				if ($fileName == 'resources.php') {
							echo '<a href="resources.php" class="current">Resources</a>';
						}
						else {
							echo '<a href="resources.php">Resources</a>';
						}
						
					if ($fileName == 'pricing.php') {
							echo '<a href="pricing.php" class="current">Pricing</a>';
						}
						else {
							echo '<a href="pricing.php">Pricing</a>';
						}

					if ($fileName == 'support.php') {
							echo '<a href="support.php" class="current">Support</a>';
						}
						else {
							echo '<a href="support.php">Support</a>';
						}
                                         
	       			?>
            </div>
                                <?php
                                        if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') {
                                                        include 'myHoodNavigationBar.php';
						}
						else {
							echo '<a href="#specialsPopup" rel="facebox"><img src="images/Special.jpg" class="special"></a>';
						}
                                ?>
            <div id="loginPopup" style="display: none;">
                <?php
                    include "popupLogin.php";
                ?>
            </div>
            <div id="specialsPopup" style="display:none;">
                <?php
                    include 'popupSpecials.php';
                ?>
            </div>
            
            <script>
                jQuery(document).ready(function($) {
                    $('a[rel*=facebox]').facebox()
                    })
            </script>
             
