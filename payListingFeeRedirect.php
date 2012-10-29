<?php
    if($_POST[result] == 'SUCCESS')
    {
        include_once 'config.inc.php';
        $con = get_dbconn();
        
        mysql_query("UPDATE PROPERTY SET IsPaid='1'
            WHERE PropertyID = '$_POST[propertyID]'");
        
        header( 'Location: /myHood.php' );

    }
    else
    {
        
    }
?>
