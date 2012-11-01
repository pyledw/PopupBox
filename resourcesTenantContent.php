<div id="mainContent">
    <h1>Application Status</h1>
    <?php
        //check for application status return color and information
        
        require_once "config.inc.php";
         
	$con = get_dbconn("");
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        $isapproved = false;
        $row = mysql_fetch_array($result);
        
        
