
<?php
    $userType = $_POST["classification"];
    echo $userType;
    if($userType == "tenant")
    {
        header( 'Location: /newHousingApplication.php' ) ;
    }
    else 
    {
        header( 'Location: /newListing1.php' );
    }
?>
