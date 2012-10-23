<?php
    session_start();
    
    require "config.inc.php";
         
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
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        $isapproved = false;
        $row = mysql_fetch_array($result);
        //Will eventually test to see if the applicaiton was compleate, and go back to the next needed page.
        
        
        
        header( 'Location: /newHousingApplication.php' );

?>
