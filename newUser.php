<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
   			<head>
   			<title>New User Page</title>
   			<link rel="shortcut icon" href="images/favicon.ico" />
<?php
	include 'Header.php';
?>
<h1 class="Title">Account Set Up</h1>
<hr class="Title">
<div id="mainContent">
	

        <?php
            include 'formElements.php';
            
            createForm('10px', '10px', 'Create new profile', 'newUserData.php');
            ?>

    <?php
            createRadioGroup(2, ['Landlord', 'Tenant'], ['landlord', 'Tenant'], "profileType","I am a: ");
            newline();
            createTextField("username", "Enter username","");
            ?>
            <a href="" style="left:-10px; position:relative;" onmouseover="tooltip.show('Please Select a Username', 200);"
               onmouseout="tooltip.hide();">?</a>
    <?php
            
            createPasswordField("password1","Enter Password: ");
            
            createPasswordField("password2", "Confirm Password: ");

            createTextField("fname", "First name", "");
            createTextField("lname", "Last name", "");
            createTextField("email1", 'Email', "");
            createTextField("email2", 'Confirm email',"");

            createTextField("phone", "Phone Number", "");
            createTextField("address", "Enter Address", "","400px");
            
            createTextField("DOB", "Date Of Birth", "");
            createTextField("city", "City", "");
            createTextField("state", "State", "");
            createTextField("zip", "Zip", "");

            createTextField("SSN", "Enter last 4 of SSN", "");
            newLine();
            createButton("submit", "Save and Continue", "button");
            createButton("reset", "Reset Form", "button");
            
            
    ?>

           

        </form>

</div>
<?
	include 'Footer.php';
?>