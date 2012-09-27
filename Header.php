
<link rel="stylesheet" type="text/css" href="mainStyle.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="mainJavaScript.js"></script>
    		</head>

    <body>
        
        
	<div id="wrapper">
            
            <a href="index.php"><img class="logo" src="images/leasehoodlogo.jpg" alt="LeaseHood Logo"></a>
    		
    		<div id="list-nav">
                    
	       		<ul>
                            
                                
                                
	       			<!--This section enables the navigation bar to detect what page it is currently on and change the color so that the user will
	       				Know when they are alread on a page in the main navigiont bar. -->
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

	       				if ($fileName == 'searchHolmes.php') {
							echo '<li><a href="searchHolmes.php" class="current">Search Holmes</a></li>';
						}
						else {
							echo '<li><a href="searchHolmes.php">Search Holmes</a></li>';
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
			
				<img src="images/Special.jpg" style="float:right;" />
