

<?php

    /**
     * This is the logical process that manages when a user tries to edit their application
     * it will route them to the correct page where they left off, or if the application was
     * completed it will route to the first page.  It pulls the number page they completed.
     * If the number represents the application was complete, the user is rerouted to the inital
     * application page.  If the users applicaiton was not complete they will be rerouted to the
     * page they last left.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    session_start();
    
    require_once "config.inc.php";
         
        $con = get_dbconn("");
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
        
        
        /** Will test to see if the applicaiton was compleate, and go back to the next needed page. */
        if($row[PageCompleted] == "1")
        {
            header( "Location: /newHousingApplication.php" );
        }
        else
        {
            //echo $row[PageCompleted];
            /** Test for if teh application was completed */
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
