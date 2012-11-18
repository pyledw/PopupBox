<?php

/**
 * This page is the redirect for if the user selects that they want to resilt thier posting
 * 
 * It will reset the listing so and seput to create a new auction.  It will do this by 
 * changing the Property IsApproved field back to 0, allowinf the administrator to re 
 * approve a new auction.
 *
 * @author David Pyle <Pyledw@Gmail.com>
 */
    session_start();
    include 'config.inc.php';
    
    $_SESSION[propertyID] = $_POST[propertyID];
    
    $con = get_dbconn("");
    
    mysql_query("UPDATE PROPERTY
        SET IsApproved=0, DateAvailable=NULL, DatePFOAccept=NULL, DatePFOEndAccept=NULL, DateTimeOpenHouse1=NULL,DateTimeOpenHouse2=NULL,PageCompleted='3'
        WHERE PropertyID='$_SESSION[propertyID]'");
    header( 'Location: /newListing3.php' );
?>
