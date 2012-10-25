
<?php

echo "redirect";

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
        
        mysql_query("UPDATE PROPERTY SET IsApproved='1'
        WHERE PropertyID = '$_POST[propertyID]'");
        
        header( 'Location: /myHood.php' );
        
?>
