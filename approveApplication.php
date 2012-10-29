<!-- This page is for the approving of an application for the administrator.
     it retrieves the applicationID in a post, and then changes the data 
     in the database. -->
<?php

echo "redirect";
echo $_POST[ApplicationID];

require "config.inc.php";
        //SQL connection information

        
        //Connecting to the sql database
        $con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
        //echo "connected to mySQL";
        }
        
        //Selecting the Database
        $select = mysql_selectdb($db_database, $con);
        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        
        mysql_query("UPDATE APPLICATION SET IsApproved='Y'
        WHERE ApplicationID = '$_POST[ApplicationID]'");
        
        header( 'Location: /myHood.php' );
        
?>
