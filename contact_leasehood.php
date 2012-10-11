<?php

        $title = "Contact LeaseHood";
	include 'Header.php';
        include 'formElements.php'
?>
    <h1 class="Title">Contact LeaseHood</h1>
    <hr class="Title" />
    <div id="mainContent">

<?php        
    createTextField("fname", "First name", "","");
    createTextField("lname", "Last name", "","");
    createTextField("email1", 'Email', "","");
    createTextField("email2", 'Confirm email',"","");
    createTextBoxField("2", "4", "Comments", "commentBox")
?>                
    </div>

<?php
    include 'Footer.php';
?>