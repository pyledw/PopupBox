<!--//Header to be displayed on all pages.  This will show deal with HTML head elements as well
//as the Title, and CSS/Javascript References.  It also contains the navigation bar element.-->


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>

        <?php
            
            echo $title;//Element defined in the Html document before the Header.php is called
        ?>

    </title>
    <link rel="shortcut icon" href="images/favicon.ico" /><!--Link to Favicon-->
    <link rel="stylesheet" type="text/css" href="mainStyle.css" /><!--Link to Main css file -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--Meta Data-->
    <script src="mainJavaScript.js"></script><!--Javascript Reference-->
    <script src="jquery-1.8.2.js"></script>
    <script src="css_browser_selector.js" type="text/javascript"></script>
</head>

    <body>
        
<!-- This section creates the wrapper, and then 
    creates and aligns the wrapper
     It then inserts the navigation bar.-->

	<div id="wrapper">
            
            <a href="index.php"><img class="logo" src="images/leasehoodlogo.jpg" alt="LeaseHood Logo"></a>
            
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

	       				if ($fileName == 'searchApplicants.php') {
							echo '<a href="searchApplicants.php" class="current">Search Applicants</a>';
						}
						else {
							echo '<a href="searchApplicants.php">Search Applicants</a>';
						}
	       			
	       				if ($fileName == 'myHood.php') {
							echo '<a href="myHood.php" class="current">My Hood (Login)</a>';
						}
						else {
							echo '<a href="myHood.php">My Hood (Login)</a>';
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
            
    		
                              
          <img src="images/Special.jpg" style="float:right;" /> <!--This image is for the later placed object for county specials-->
