
<?php
        /**
         * This page is the main myhood page.
         * 
         * This page will check to ensure the user is logged in.
         * It will then check to see what the user id is and call
         * the appropriate content based on the usertype.
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
        session_start();
        if(!isset($_SESSION[userID])){
           // header( 'Location: /login.php' );
        }
        $title = "MyHood - Home";
	include "Header.php";
        
        if(isset($_SESSION[propertyID]))
        {
            unset($_SESSION[propertyID]);
        }
        $userType = $_SESSION["type"];
?>

<?php

    
    //Test for user type calling content based apon user type
    if($userType == "1")
    {
        include 'myHoodTenantContent.php';
    }
    //Test for user type calling content based apon user type
    if($userType == "2")
    {
        include 'myHoodLandlordContent.php';
    }
    if($userType == "3")
    {
        include 'myHoodAdminContent.php';
    }
?>
    

<?php
	include 'Footer.php';
?>