
<?php
        $title = "New User";
	include 'Header.php';
?>

<!-- Page Content -->

    <h1 class="Title">Account Set Up</h1>
    <hr class="Title" />
    <div id="mainContent">

        <?php
               include 'formElements.php';
                createForm('100%', '90%', 'Create new profile', 'newUserData.php');
        ?>

        <?php
                radioGroup(array("Tenant","Landlord"), array("tenant","landlord"), "classification", "You are a: ");
                newline();
                createTextField("username", "Enter username","","");
                
                ?>
                
        <?php

                createPasswordField("password1","Enter Password: ");

                createPasswordField("password2", "Confirm Password: ");

                createTextField("fname", "First name", "","");
                createTextField("lname", "Last name", "","");
                createTextField("email1", 'Email', "","");
                createTextField("email2", 'Confirm email',"","");

                createTextField("phone", "Phone Number", "","");
                createTextField("address", "Enter Address", "","400px");

                createTextField("DOB", "Date Of Birth", "","");
                createTextField("city", "City", "","");
                createTextField("state", "State", "","");
                createTextField("zip", "Zip", "","");

                createTextField("SSN", "Enter last 4 of SSN", "","");
                newLine();
                createButton("submit", "Save and Continue", "button");
                createButton("reset", "Reset Form", "button");

        ?>
        </form>
    </div>
<?
	include 'Footer.php';
?>