<?php

        session_start();
        //taking information from login page
        $myName = $_POST["userName"];
        $userPassword = $_POST['password'];
        $lastPage = $_POST['URL'];
        $loggedIn = $_POST['rememberMe'];
        
        echo $lastPage;
        
        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("");

        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM USER WHERE UserName ='" . $myName . "' AND PASSWORD = '" . crypt($userPassword, $pw_salt) . "'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }

        //fetching the array of query elements
	$row = mysql_fetch_array($result);
        if ($row != NULL)
        {
            $userType = $row['AccountType'];
            $userID = $row['UserID'];

            //this will set the  so the session will
            //be remembered.  Might also eventually use a session to store some of this data
            //as it is more secure.
            //It then redirects the user to the myHood page.
            $_SESSION['userID'] = $userID;
            $_SESSION['user'] = $row[UserName];
            $_SESSION['type'] = $userType;
            if($loggedIn)
            {
                setcookie('userID', $userID);
                setcookie('user', $row[UserName]);
                setcookie('type', $userType);
                
            }
            else
            {
                setcookie('userID', "", time()-3600);
                setcookie('user', "", time()-3600);
                setcookie('type', "", time()-3600);
            }
            
            if(isset($lastPage))
            {
                header( 'Location: /'. $lastPage . '' ); 
            }
            else
            {
                header( 'Location: /myHood.php' );  
            }
            
        }
//endoftheline:
        else{
            
        
        header( 'Location: /loginFailed.php' );
        echo "Username does not exist";
        }
?>
