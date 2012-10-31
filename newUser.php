
<?php
        $title = "New User";
	include 'Header.php';
?>

<script>
$(document).ready(function(){
  $("label").inFieldLabels();
    });
</script>
<!-- Page Content -->

    <h1 class="Title">Account Set Up</h1>
    <hr class="Title" />
  
        <div id="mainContent">
            <form id="newUserForm" method="post" action="newUserRedirect.php">
                        <p>
				<label for="name">Name</label><br />
				<input type="text" name="name" value="" id="name">
			</p>
                <table class="form" width="900px;">
                      <tr>
                         <td class="labels">
                            You are a: 
                            
                         </td>
                         <td class="field">
                            Tenant<input type="radio" checked="checked" name="classification" value="tenant">
                            Landlord<input type="radio" name="classification" value="landlord">
                         </td>
                    </tr>
                    <tr>
                         <td class="labels">
                           Enter username:
                         </td>
                         <td class="field">
                             <input name="username" class="required" minlength="5" /><br/>
                         </td>
                         <td class="labels">
                           Password:
                         </td>
                         <td class="field">
                           <input id="password" type="password" class="required" name="password1">
                         </td>
                         <td class="labels">
                            Confirm Password:
                         </td>
                         <td class="field">
                           <input id="password_again" class="required" type="password" name="password_again">
                         </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <hr />
                        </td>
                    </tr>
                    <tr>
                         <td class="labels">
                           First Name:
                         </td>
                         <td class="field">
                           <input type="text" name="fname" class="required">
                         </td>
                         <td class="labels">
                           Last Name: 
                         </td>
                         <td class="field">
                           <input type="text" name="lname" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td class="labels">
                           Email: 
                         </td>
                         <td class="field">
                             <input type="text" id="email" name="email1" class="required email">
                         </td>
                         <td class="labels">
                           Confirm Email: 
                         </td>
                         <td class="field">
                             <input type="text" id="email_again" name="email_again" class="required email">
                         </td>
                         <td class="labels">
                           Phone: 
                         </td>
                         <td class="field">
                             <input type="text" name="phone" class="required">
                         </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <hr />
                        </td>
                    </tr>
                     <tr>
                         <td class="labels">
                           Address: 
                         </td>
                         <td class="field">
                             <input type="text" name="address" width="400px" class="required">
                         </td>
                         <td class="labels">
                          City: 
                         </td>
                         <td class="field">
                             <input type="text" name="city" class="required">
                         </td>
                         <td class="labels">
                           State: 
                         </td>
                         <td class="field">
                             <input type="text" name="state" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td class="labels">
                           Zip Code: 
                         </td>
                         <td class="field">
                             <input type="text" name="zip" class="required">
                         </td>
                         <td class="labels">
                          Date of birth: 
                         </td>
                         <td class="field">
                             <input type="text" name="DOB" class="required">
                         </td>
                         <td class="labels">
                           Last 4 digits in your SSN:
                         </td>
                         <td class="field">
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
  $(document).ready(function(){
  $("label").inFieldLabels();
    });
  </script>
  