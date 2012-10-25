<?php
        session_start();
        //taking information from login page
        $myName = $_POST["userName"];
        $userPassword = $_POST['password'];
        
        include_once 'config.inc.php';
        //Connecting to the sql database
        $connectionInfo= get_dbconn();
        $con = $connectionInfo[0];
        $select = $connectionInfo[1];
        
        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM USER
            WHERE UserName ='" . $myName . "'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            //echo $row['Password'];
            $userType = $row['AccountType'];
            $userID = $row['UserID'];
            //Testing to make sure it is a valid name
            //This will be where we check to see if credentails are correct
            
            if($userPassword != $row['Password'])
            {
                
                echo 'Incorrect Password';
            }
            //if credentials are correct this will set the  so the session will
            //be remembered.  Might also eventually use a session to store some of this data
            //as it is more secure.
            //It then redirects the user to the myHood page.
            else
            {
                $_SESSION['userID'] = $userID;
                $_SESSION['user'] = $myName;
                $_SESSION['type'] = $userType;
                header( 'Location: /myHood.php' );
            }
        }
        
        echo "Username does not exist";
        
        
        
        
        
    
?>
