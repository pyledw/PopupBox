
<?php
        $title = "New User";
	include 'Header.php';
?>
<!-- Page Content -->

    <h1 class="Title">Account Set Up</h1>
    <hr class="Title" />
    <div id="mainContent">
             <form id="newUserForm" class="formStyle" method="post" action="newUserRedirect.php">
                 <table>
                     <tr>
                         <td>
                            You are a: 
                            
                         </td>
                         <td>
                            Tenant<input type="radio" checked="checked" name="classification" value="tenant">
                            Landlord<input type="radio" name="classification" value="landlord">
                         </td>
                         <td>
                            
                         </td>
                    </tr>
                    <tr>
                         <td>
                           Enter username:
                         </td>
                         <td>
                             <input name="username" size="25" class="required" minlength="5" />
                         </td>
                         <td>
                           Password:
                         </td>
                         <td>
                           <input id="password" type="password" class="required" name="password1">
                         </td>
                         <td>
                            Confirm Password:
                         </td>
                         <td>
                           <input id="password_again" class="required" type="password" name="password_again">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           First Name:
                         </td>
                         <td>
                           <input type="text" name="fname" class="required">
                         </td>
                         <td>
                           Last Name: 
                         </td>
                         <td>
                           <input type="text" name="lname" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           Email: 
                         </td>
                         <td>
                             <input type="text" id="email" name="email1" class="required email">
                         </td>
                         <td>
                           Confirm Email: 
                         </td>
                         <td>
                             <input type="text" id="email_again" name="email_again" class="required email">
                         </td>
                         <td>
                           Phone: 
                         </td>
                         <td>
                             <input type="text" name="phone" class="required">
                         </td>
                    </tr>
                     <tr>
                         <td>
                           Address: 
                         </td>
                         <td>
                             <input type="text" name="address" width="400px" class="required">
                         </td>
                         <td>
                          City: 
                         </td>
                         <td>
                             <input type="text" name="city" class="required">
                         </td>
                         <td>
                           State: 
                         </td>
                         <td>
                             <input type="text" name="state" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           Zip Code: 
                         </td>
                         <td>
                             <input type="text" name="zip" class="required">
                         </td>
                         <td>
                          Date of birth: 
                         </td>
                         <td>
                             <input type="text" name="DOB" class="required">
                         </td>
                         <td>
                           Last 4 digits in your SSN:
                         </td>
                         <td>
                             <input type="text" name="SSN" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td colspan="6" align="left">
                                <button type="submit" class="button">Save and Continue</button>
                                 <button type="reset" class="button">Clear</button>
                                
                         </td>
                    </tr>
                 

                 
                 
                 </table>
                
        </form>
    </div>
<?
	include 'Footer.php';
?>
    
<style type="text/css">
* { font-family: Verdana; font-size: 96%; }
label { width: 10em; float: left; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
p { clear: both; }
.submit { margin-left: 12em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>

  <script>
  $(document).ready(function(){
    $("#newUserForm").validate({
        rules: {        
        password: "required",
        password_again: {
        equalTo: "#password"}   
        }
    });
  });
  </script>
  