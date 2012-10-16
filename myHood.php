
<?php
    
    
            $myName = $_POST["userName"];
            $userType = $_POST['userType'];
            
            if(!isset($_COOKIE['user']))
            {
                
                setcookie("user", $myName,time()+3600);
                setcookie("type", $userType,time()+3600);
            }
        
        
    
        
        $title = "MyHood - Home";
	include "Header.php"
?>
    <a href="login.php" class="button" id="logout">Log Out</a>

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

    <script>
        $(document).ready(function(){
    $("#logout").click(function(){
        $.removeCookie('user');
        $.removeCookie('type');
  });
     
});
    </script>