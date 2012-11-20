<?php

    /**
     * This page will delete the selected image from the server and database.
     * 
     */
    $_GET[imageID];
    
    echo $_GET[imageID];
    
    
    $db_user 	= 'leasehood';
    $db_pass 	= 'sunlight blanket floating change';  // db password
    $db_server 	= '199.115.231.216';     // server name or IP address
    $db_database = 'leasehood1112';     // database to select
    
    $con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
            //echo "connected to mySQL";
        }

        $select = mysql_selectdb($db_database, $con);

        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
            //echo "Selected Database";
        }
        
        $result = mysql_query("DELETE FROM IMAGE
            WHERE ImageID=$_GET[imageID]");
        
        if(!$result)
                             {
                                 die('could not connect: ' .mysql_error());
                             }
        
        
    echo 'This will eventually be a function to delete the listing.'; 
?>
