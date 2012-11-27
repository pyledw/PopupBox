<?php

/**
 * This page redirects the user to the correct form depending on their choosen account type
 * 
 * This page will get the users classification and send them to the correct form after they
 * have creted a new account.
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 */

if($_POST["classification"] == "tenant")
{
    $title = "New Resident Application";
}
else
{
    $title = "New Property";
}
include 'Header.php';

if($_POST["classification"] == "tenant")
{
    include 'newHousingApplication.php';
}
else
{
    include 'newListing.php';
}

/*
echo $_POST["username"];
echo "</br>";
echo $_POST["password1"];
echo "</br>";
echo $_POST["password2"];
echo "</br>";
echo $_POST["fname"];
echo "</br>";
echo $_POST["lname"];
echo "</br>";
echo $_POST["email1"];
echo "</br>";
echo $_POST["email2"];
echo "</br>";
echo $_POST["phone"];
echo "</br>";
echo $_POST["address"];
echo "</br>";
echo $_POST["DOB"];
echo "</br>";
echo $_POST["city"];
echo "</br>";
echo $_POST["state"];
echo "</br>";
echo $_POST["zip"];
echo "</br>";
echo $_POST["SSN"];
echo "</br>";
 * 
 */






include 'Footer.php';
?>
