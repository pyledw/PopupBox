
<?php
        $title = "New User";
	include 'Header.php';
?>

<!-- Page Content -->

    <h1 class="Title">Account Set Up</h1>
    <hr class="Title" />
    <div id="mainContent">
             <form class="formStyle" width="90%" height="90%" method="post" action="newUserRedirect.php">
        <?php
               include 'formElements.php';
        ?>
                 You are a: 
                 Tenant<input type="radio" checked="checked" name="classification" value="tenant">
                 Landlord<input type="radio" name="classification" value="landlord">
                 <br/>
                 Enter username:<input type="text" name="username">
                 
                 Password:<input id="password1" type="password" name="password1">
                 Confirm Password:<input id="password2" type="password" name="password2">
                 
                 First Name: <input type="text" name="fname">
                 Last Name: <input type="text" name="lname">
                 Email: <input type="text" name="email1">
                 Confirm Email: <input type="text" name="email2">
                 Phone: <input type="text" name="phone">
                 Address: <input type="text" name="address" width="400px">
                 City: <input type="text" name="city">
                 State: <input type="text" name="state">
                 Zip Code: <input type="text" name="zip">
                 Date of birth: <input type="text" name="DOB">
                 Last 4 digits in your Social Security Number<input type="text" name="SSN">
                 <br/>
                 <br/>
                 <button type="submit" class="button">Save and Continue</button>
                 <button type="reset" class="button">Clear</button>
                
        </form>
    </div>
<?
	include 'Footer.php';
?>
    <script>
$(document).ready(function(){
    $("#password2").blur(function(){
        
        var pw1 = $("#password2").val();
        var pw2 = $("#password1").val();
        
        if(pw1 == pw2){
            
        }
        else{
            $("#password2").val("");
            $("#password1").val("");
            alert("Passwords Must Match");
        }
     
});
  });
    </script>