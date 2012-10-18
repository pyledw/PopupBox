<?php
        session_start();
        //taking information from login page
        $myName = $_POST["userName"];
        $userPassword = $_POST['password'];
        
        //SQL connection information
        $server = "199.115.231.216";
        $username = "scribe";
        $password = "board his combination flat";
        
        //Connecting to the sql database
        $con = mysql_connect($server,$username,$password );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
        //echo "connected to mySQL";
        }
        
        //Selecting the Database
        $select = mysql_selectdb("leasehood", $con);
        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        
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
