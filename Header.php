<!--//Header to be displayed on all pages.  This will show deal with HTML head elements as well
//as the Title, and CSS/Javascript References.  It also contains the navigation bar element.-->


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>

        <?php
            echo "$title";//Element defined in the Html document before the Header.php is called
        ?>

    </title>
    <link rel="shortcut icon" href="images/favicon.ico" /><!--Link to Favicon-->
    <link rel="stylesheet" type="text/css" href="mainStyle.css" /><!--Link to Main css file -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--Meta Data-->
    <script src="mainJavaScript.js"></script><!--Javascript Reference-->
</head>

    <body>
        
<!-- This section creates the wrapper, and then creates and aligns the wrapper
     It then inserts the navigation bar.-->

	<div id="wrapper">
            
            <a href="index.php"><img class="logo" src="images/leasehoodlogo.jpg" alt="LeaseHood Logo"></a>
    		
    		<div id="list-nav">
                    
	       		<ul>
                            
                                
                                
	       			<!--This section enables the navigation bar to detect what page it is currently on and change the color so that the user will
	       				Know when they are already on a page in the main navigation bar. -->
	       			<?php
	       				$currentFile = $_SERVER["PHP_SELF"];
						$parts = Explode('/', $currentFile);
						$fileName = $parts[count($parts) - 1];
	       				if ($fileName == 'gettingStarted.php') {
							echo '<li><a href="gettingStarted.php" class="current">Getting Started</a></li>';
						}
						else {
							echo '<li><a href="gettingStarted.php">Getting Started</a></li>';
						}

	       				if ($fileName == 'searchHomes.php') {
							echo '<li><a href="searchHomes.php" class="current">Search Homes</a></li>';
						}
						else {
							echo '<li><a href="searchHomes.php">Search Homes</a></li>';
						}

	       				if ($fileName == 'searchApplicants.php') {
							echo '<li><a href="searchApplicants.php" class="current">Search Applicants</a></li>';
						}
						else {
							echo '<li><a href="searchApplicants.php">Search Applicants</a></li>';
						}
	       			
	       				if ($fileName == 'myHood.php') {
							echo '<li><a href="myHood.php" class="current">My Hood (Login)</a></li>';
						}
						else {
							echo '<li><a href="myHood.php">My Hood (Login)</a></li>';
						}
	       			
	       				if ($fileName == 'newUser.php') {
							echo '<li><a href="newUser.php" class="current">New User</a></li>';
						}
						else {
							echo '<li><a href="newUser.php">New User</a></li>';
						}
	       			
	       				if ($fileName == 'resources.php') {
							echo '<li><a href="resources.php" class="current">Resources</a></li>';
						}
						else {
							echo '<li><a href="resources.php">Resources</a></li>';
						}
						
					if ($fileName == 'pricing.php') {
							echo '<li><a href="pricing.php" class="current">Pricing</a></li>';
						}
						else {
							echo '<li><a href="pricing.php">Pricing</a></li>';
						}

					if ($fileName == 'support.php') {
							echo '<li><a href="support.php" class="current">Support</a></li>';
						}
						else {
							echo '<li><a href="support.php">Support</a></li>';
						}


	       			?>
				  
				</ul>
			</div>
                              
          <img src="images/Special.jpg" style="float:right;" /> <!--This image is for the later placed object for county specials-->
