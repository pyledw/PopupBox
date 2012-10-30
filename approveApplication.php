<!-- This page is for the approving of an application for the administrator.
     it retrieves the applicationID in a post, and then changes the data 
     in the database. -->
<?php

echo "redirect";
echo $_POST[ApplicationID];

require_once "config.inc.php";
        //Connecting to the sql database
        $con = get_dbconn("");
        
        mysql_query("UPDATE APPLICATION SET IsApproved='Y'
        WHERE ApplicationID = '$_POST[ApplicationID]'");
        
        header( 'Location: /myHood.php' );
        
?>
