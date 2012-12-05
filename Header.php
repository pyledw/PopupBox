<?php 

/**
 * This page contains the hearder elements and navigation elements.  It includes all the inital page elements
 * and the navigation bar. Initally it check to see if the user is logged in and if they have a cookie stored.
 * If a cookie was store the sesion will be reinitated with the previus info.
 * It also has the user welcom and option to log in.  The navigation portion will determing
 * the current page and will display the navidation button acordingly.
 * if the user is on the myhood page the myhood navigation bar will be called as well.
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */
	//require 'config.inc.php';
    if (session_id() == '')
	{
	    session_start();
    }    
        
    /** This allow for the user to stay logged in even after the session has expired.
      *  It will checks to see if cookies were saved with login info 
      */
    /*
    if(isset($_COOKIE['userID']))
    {
        $_SESSION['userID'] = $_COOKIE['userID'];
        $_SESSION['user'] = $_COOKIE['user'];
        $_SESSION['type'] = $_COOKIE['type'];
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    }
     * 
     */
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == '1')
    {
        
    }
 else {
        
    /** This ensures that the session will expire after 10 minutes of inactivity. */
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*10)) 
    {
        /** last request was more than 10 minates ago */
        session_unset();     // unset $_SESSION variable for the runtime 
        session_destroy();   // destroy session data in storage
    }
 }
    
	$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
       
?>


<!--Header to be displayed on all pages.  This will show deal with HTML head elements as well
as the Title, and CSS/Javascript References.  It also contains the navigation bar element.-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= $title ?></title>
    
    <!--Meta Data-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!--Link to Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" />
    
    <!--Link to Main css file -->
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css" />
    
    <!--Link to Navigation bar css file -->
    <link rel="stylesheet" type="text/css" href="css/navigationBarStyle.css" />
    
    <!--Javascript Reference to Jquery-->
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    
    <!--Javascript Reference to Browser Selector-->
    <script type="text/javascript" src="js/css_browser_selector.js"></script>
    
    <!--Javascript Reference to Cookie Extension-->
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    
    <!--Javascript Reference to Jquery Validator-->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    
    <!--Javascript Reference to Jquery Validator-->
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    
    <!--Referance to Search result Style-->
    <link rel="stylesheet" type="text/css" href="css/searchResults.css" />
    
    <!--CSS Reference to Form Styles-->
    <link rel="stylesheet" type="text/css" href="css/formStyle.css" />
    
    <!-- These reference the external files for popups -->
    <script type="text/javascript" src="js/facebox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/facebox.css" />
    
    <!-- These reference the needed external files for the date picker using Jquery UI -->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <!--CSS Reference to Add on for timepicker-->
    <link rel="stylesheet" href="css/jquery-ui-timepicker-addon.css" />
    <!--Javascript Reference to Add on for timepicker-->
    <script src="js/jquery-ui-timepicker-addon.js"></script>
    
    <!--Javascript Reference to Add on for counting the characters in a textbox-->
    <script src="js/charCount.js"></script>
    
    
</head>

    <body>
        
<!-- This section creates the wrapper, and then creates and aligns the wrapper
     It then inserts the navigation bar based on if the user is logged in, and what type of user it is.-->

	<div id="wrapper">
            
            <div id="header">
            <a href="index.php"><img class="logo" src="images/logo.jpg" alt="LeaseHood Logo" /></a>
            
            <h1 class="header">Lease<font color="#000000">Hood...</font></h1> <h2 class="subHeader">"Putting the Best Residents in Rental Homes"</h2>
            <?php
                /**
                 * This retrieves the filename of the current window and sets it exual to $filename
                 */
	       	$currentFile = $_SERVER["REQUEST_URI"];;
		$parts = Explode('/', $currentFile);
		$fileName = $parts[count($parts) - 1];
                                                
                /** check to see if the user is already logged in. */
                if(isset($_SESSION["user"]))
                {
                    echo '<div style="float:right; margin-right:20px;"><h3>Welcome '. $_SESSION["user"] . '</h3><a href="logout.php">Logout</a></div>' ; 
                }
                else
                {
                    echo '<div style="float:right; margin-right:20px;"><h3>Welcome</h3><a href="popupLogin.php?URL='. $fileName . '" rel="facebox" >Login</a></div>';
                }
            ?>
            </div>
            <div id="nav">
                <?php
                                        
                                                
                                        /** Testing to see if the current window corisponds to the tab on the navigation bar */
	       				if ($fileName == 'gettingStarted.php') {
                                                        //If found, it will create an element with current Class
							echo '<a href="gettingStarted.php" class="current">Getting Started</a>';
						}
						else {
                                                        //Else it creates an element with a standard style for navigation link
							echo '<a href="gettingStarted.php">Getting Started</a>';
						}
                                        /** Testing to see if the current window corisponds to the tab on the navigation bar */
	       				if ($fileName == 'searchHomes.php') {
							echo '<a href="searchHomes.php" class="current">Search Homes</a>';
						}
						else {
							echo '<a href="searchHomes.php">Search Homes</a>';
						}

	       				
                                                
                                                
                                        /** If the user is logged in, this will run to change based on user */
                                        if(isset($_SESSION['user']))
                                            {
                                                if($_SESSION['type'] == 2)
                                                    {
                                                        if ($fileName == 'listHome.php') 
                                                            {
                                                            echo '<a href="listHome.php" class="current">List Home</a>';
                                                            }
                                                    else 
                                                        {
                                                                echo '<a href="listHome.php">List Home</a>';
                                                        }
                                                    }
                                                if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') 
                                                    {
                                                            echo '<a href="login.php" class="current">My Hood</a>';
                                                    }
                                                else 
                                                    {
                                                            echo '<a href="login.php">My Hood</a>';
                                                    }
                                            

                                                
                                            }
                                        /** If the user is not logged in MyHood will appear as "Login" */
                                        else{
                                            if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') {
                                                            echo '<a href="login.php" class="current">Login</a>';
                                                    }
                                                    else {
                                                            echo '<a href="login.php">Login</a>';
                                                    }
                                            }
                                        /** Testing to see if the current window corisponds to the tab on the navigation bar */
	       				if ($fileName == 'newUser.php') {
							echo '<a href="newUser.php" class="current">New User</a>';
						}
						else {
							echo '<a href="newUser.php">New User</a>';
						}
                                        /** Testing to see if the current window corisponds to the tab on the navigation bar */
	       				if ($fileName == 'resources.php') {
							echo '<a href="resources.php" class="current">Resources</a>';
						}
						else {
							echo '<a href="resources.php">Resources</a>';
						}
					/** Testing to see if the current window corisponds to the tab on the navigation bar */	
					if ($fileName == 'pricing.php') {
							echo '<a href="pricing.php" class="current">Pricing</a>';
						}
						else {
							echo '<a href="pricing.php">Pricing</a>';
						}
                                        /** Testing to see if the current window corisponds to the tab on the navigation bar */
					if ($fileName == 'support.php') {
							echo '<a href="support.php" class="current">Support</a>';
						}
						else {
							echo '<a href="support.php">Support</a>';
						}
                                         
	       			?>
            </div>
                                <?php
                                        /** If the user is on the myhood page, setup for the secondary navigation bar */
                                        if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') {
                                                        include 'myHoodNavigationBar.php';
						}
						else {
                                                        /**creating the popup for specials*/
							echo '<a href="popupSpecials.php" rel="facebox"><img src="images/Special.jpg" class="special"></a>';
						}
                                ?>
            
            <script>
                /** This makes the facebox option available from all pages as it will be needed for confirmations */
                jQuery(document).ready(function($) {
                    $('a[rel*=facebox]').facebox()
                    })
            </script>
             
