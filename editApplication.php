<?php
    session_start();
    
    require_once "config.inc.php";
         
        $con = get_dbconn();
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
        
        
        //Will eventually test to see if the applicaiton was compleate, and go back to the next needed page.
        
        
        
        if($row[PageCompleted] == "1")
        {
            header( "Location: /newHousingApplication.php" );
        }
        else
        {
            //echo $row[PageCompleted];
            
            if($row[PageCompleted] == "6")
            {
                header( "Location: /newHousingApplication.php" );
            }
            else
            {
               header( "Location: /newHousingApplication".$row[PageCompleted] .".php" );
            }
        }

?>
