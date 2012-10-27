<?php
    if($_POST[result] == 'SUCCESS')
    {
        //Creates a connection to the database and stores the connection string in $con and the Selected database in $select
        include_once 'config.inc.php';
        $connectionInfo= get_dbconn();
        $con = $connectionInfo[0];
        $select = $connectionInfo[1];
        
        mysql_query("UPDATE PROPERTY SET IsPaid='1'
            WHERE PropertyID = '$_POST[propertyID]'");
        
        header( 'Location: /myHood.php' );

    }
    else
    {
        
    }
?>
