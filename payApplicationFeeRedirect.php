<?php
        
        /**
         * Updating the database if the fee has been paid.
         */

     if($_POST[result] == 'SUCCESS')
        {
        session_start();
        $userID = $_SESSION['userID'];
        include_once 'config.inc.php';
        $con = get_dbconn("");
        echo $userID;
        
        mysql_query("UPDATE APPLICATION SET IsPaid='1'
            WHERE UserID = '$userID'");
        
        
        }
        header( 'Location: /myHood.php' );
?>
