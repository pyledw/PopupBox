<?php
    session_start();
    $_SESSION['propertyID'] = $_GET['propertyID'];
    
    header( 'Location: /payListingFee.php' );
    
?>
