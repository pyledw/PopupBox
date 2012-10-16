<?php
        session_start();
        //taking information from login page
        $myName = $_POST["userName"];
        $userType = $_POST['userType'];
        
        //Testing to make sure it is a valid name
        //This will be where we check to see if credentails are correct
        if($myName == 'fail')
        {
            echo 'USER LOGIN FAILED';
        }
        //if credentials are correct this will set the cookies so the session will
        //be remembered.  Might also eventually use a session to store some of this data
        //as it is more secure.
        //It then redirects the user to the myHood page.
        else
        {
            
            $_SESSION['userID'] = $myName;
            $_SESSION['userIDType'] = $userType;
            header( 'Location: /myHood.php' );
        }
        
    
?>
