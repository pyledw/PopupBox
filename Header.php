<?php 
	//require 'config.inc.php';
        session_start();
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60*5)) 
            {
                // last request was more than 30 minates ago
                session_unset();     // unset $_SESSION variable for the runtime 
                session_destroy();   // destroy session data in storage
            }
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
         /*This displays all cookies and session data
         foreach ($_SESSION as $key=>$val)
         {
            echo $key." ".$val;
         }
         foreach ($_COOKIE as $key=>$val)
         {
            echo "<br>$key--> $val";
         }
          */
         


         
?>


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
    <link rel="stylesheet" type="text/css" href="css/navigationBarStyle.css" /><!--Link to Navigation bar css file -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--Meta Data-->
    <script type="text/javascript" src="js/mainJavaScript.js"></script><!--Javascript Reference to main-->
    <script type="text/javascript" src="js/jquery-1.8.2.js"></script><!--Javascript Reference to Jquery-->
    <script type="text/javascript" src="js/css_browser_selector.js"></script><!--Javascript Reference to Browser Selector-->
    <script type="text/javascript" src="js/jquery.cookie.js"></script><!--Javascript Reference to Cookie Extension-->
    <script type="text/javascript" src="js/jquery.validate.js"></script><!--Javascript Reference to Cookie Extension-->
    <link rel="stylesheet" type="text/css" href="css/searchResults.css" /><!--Javascript Reference to Search Result Style-->
    <link rel="stylesheet" type="text/css" href="css/formStyle.css" /><!--CSS Reference to Form Styles-->
    
    <script type="text/javascript" src="js/jquery.formLabels1.0.js"></script><!--Javascript Reference to Cookie Extension-->
    
    <!-- These reference the external files for popups -->
    <script type="text/javascript" src="js/facebox.js"></script>
    <link rel="stylesheet" type="text/css" href="css/facebox.css" />
    
    <!-- These reference the needed external files for the date picker using Jquery UI -->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/jquery-ui-timepicker-addon.css" /><!--Javascript Reference to Add on for timepicker-->
    <script src="js/jquery-ui-timepicker-addon.js"></script><!--Javascript Reference to Add on for timepicker-->
    
    
    <script src="js/charCount.js"></script><!--Javascript Reference to Add on for counting the characters in a textbox-->
    <!--<script>
        $(function() {
        $( document ).tooltip();
        });
    </script>-->
    
    
</head>

    <body>
        
<!-- This section creates the wrapper, and then creates and aligns the wrapper
     It then inserts the navigation bar based on if the user is logged in, and what type of user it is.-->

	<div id="wrapper">
            
            <div id="header">
            <a href="index.php"><img class="logo" src="images/leasehoodlogo.jpg" alt="LeaseHood Logo" /></a>
            
            <h1 class="header">Lease<font color="#000000">Hood...</font></h1> <h2 class="subHeader">"Putting the Best Residents in Homes"</h2>
            <?php
                //This retrieves the filename of the current window
	       	$currentFile = $_SERVER["REQUEST_URI"];;
		$parts = Explode('/', $currentFile);
		$fileName = $parts[count($parts) - 1];
                                                
                //check to see if the user is already logged in.
                if(isset($_SESSION["user"]))
                {
                    echo '<div style="float:right; margin-right:20px;"><h3>Welcome '. $_SESSION["user"] . '</h3> Not you <a href="popupLogin.php?URL='. $fileName . '" rel="facebox" >Login</a><br /><a href="logout.php">Logout</a></div>' ; 
                }
                else
                {
                    echo '<div style="float:right; margin-right:20px;"><h3>Welcome</h3><a href="popupLogin.php?URL='. $fileName . '" rel="facebox" >Login</a></div>';
                }
            ?>
            </div>
            <div id="nav">
                <?php
                                        
                                                
                                        //Testing to see if the current window corisponds to the tab on the navigation bar
	       				if ($fileName == 'gettingStarted.php') {
                                                        //If found, it will create an element with current Class
							echo '<a href="gettingStarted.php" class="current">Getting Started</a>';
						}
						else {
                                                        //Else it creates an element with a standard style for navigation link
							echo '<a href="gettingStarted.php">Getting Started</a>';
						}

	       				if ($fileName == 'searchHomes.php') {
							echo '<a href="searchHomes.php" class="current">Search Homes</a>';
						}
						else {
							echo '<a href="searchHomes.php">Search Homes</a>';
						}

	       				
                                                
                                                
                                        //If the user is logged in, this will run to change based on user
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
                                        //If the user is not logged in MyHood will appear as "Login"
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
                                        //If the user is on the myhood page, setup for the secondary navigation bar
                                        if ($fileName == 'myHood.php' || $fileName == 'myHood_Account.php' || $fileName == 'myHood_Mail.php') {
                                                        include 'myHoodNavigationBar.php';
						}
						else {
                                                        //creating the popup for specials
							echo '<a href="popupSpecials.php" rel="facebox"><img src="images/Special.jpg" class="special"></a>';
						}
                                ?>
            
            <script>
                //This makes the facebox option available from all pages as it will be needed for confirmations
                jQuery(document).ready(function($) {
                    $('a[rel*=facebox]').facebox()
                    })
            </script>
             
