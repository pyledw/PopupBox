<?php

/**
 * This page is the redirect for if the user selects that they want to resilt their posting
 * 
 * It will reset the listing so and seput to create a new auction.  It will do this by 
 * changing the Property IsApproved field back to 0, allowinf the administrator to re 
 * approve a new auction.
 *
 * @author David Pyle <Pyledw@Gmail.com>
 */
    session_start();
    
    
    
    $_SESSION[propertyID] = $_GET[propertyID];
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
    //Connecting to the sql database
    $con = get_dbconn("");
    
    $result = mysql_query("UPDATE PROPERTY
        SET IsApproved=0, PageCompleted=3, DateAvailable=NULL, DatePFOAccept=NULL, DatePFOEndAccept=NULL, DateTimeOpenHouse1=NULL,DateTimeOpenHouse2=NULL,PageCompleted='3'
        WHERE PropertyID='$_SESSION[propertyID]'");
    
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    
    //echo $_SESSION[propertyID];
    
    header( 'Location: /newListing3.php' );
?>
