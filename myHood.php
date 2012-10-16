
<?php
        //if(!isset($_SESSION['userID'])){
          //  header( 'Location: /login.php' );
        //}
        $title = "MyHood - Home";
	include "Header.php"
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
?>
    

<?php
	include 'Footer.php';
?>