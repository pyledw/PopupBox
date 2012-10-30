<?php
    if($_POST[result] == 'SUCCESS')
    {
        include_once 'config.inc.php';
        $con = get_dbconn("");
        
        mysql_query("UPDATE USER SET IsPaid='1'
            WHERE UserID = '$_POST[userID]'");
        
        header( 'Location: /myHood.php' );

    }
    else
    {
        
    }
?>
