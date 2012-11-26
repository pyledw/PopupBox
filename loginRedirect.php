<?php

        /**
         * This page is the redirect page for the user login.
         * 
         * It will check to see if the users cradentials were valid.
         * It will then set the informaiton into sesison variables.
         * If the login fails the user is redirected back to the login
         * page with an error message to be displayed.
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */

        session_start();
        //taking information from login page
        $myName = $_POST["userName"];
        $userPassword = $_POST['password'];
        $lastPage = $_POST['URL'];
        $loggedIn = $_POST['rememberMe'];
        
        echo $lastPage;
        
        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("PDO");
		$stmt = $con->prepare("SELECT * FROM USER WHERE UserName = :username AND PASSWORD = :password");
		$stmt->bindValue(":username", $myName, PDO::PARAM_STR);
		$stmt->bindValue(":password", crypt($userPassword, $pw_salt), PDO::PARAM_STR);
		$stmt->execute();
		
        //fetching the array of query elements
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
            
        
            header( 'Location: /login.php?error=Username or Password is incorrect' );
            echo "Username does not exist";
        }
?>
