
<?php

    /**
     * This page is the new user form.
     * 
     * This page will retireve any inforamtion posted to if their is an error message.
     * It then allows the user to enter their credentials.
     * 
     * The form validation is done with jQuery
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
$title = "New User";
include 'Header.php';
if(isset($_SESSION['userID']))
{
    header( 'Location: /myHood.php' );
}


function getPost($key)
{
	if (isset($_POST[$key]))
	{
		return $_POST[$key];
	}
	return '';
}
$errorMessage 	= getPost('error');
$userName 		= getPost('username');
$password 		= getPost('password');
$email 			= getPost('email');
$SSN 			= getPost('ssn');
$firstName 		= getPost('firstName');
$lastName 		= getPost('lastName');
$phone 			= getPost('phone');
$address 		= getPost('address');
$city 			= getPost('city');
$state 			= getPost('state');
$zip 			= getPost('zip');
$age 			= getPost('age');
$classification = getPost('accountType');
          
        
?>


<!-- Page Content -->
  
        <div id="mainContent">
            <form id="newUserForm" method="post" action="newUserRedirect.php">
                <table class="tableForm" width="900px;">
                    <font class="formheader">Create an Account</font>
                    
                      <tr style="vertical-align: top;">
                         <td class="field2" colspan="3">
                            You are a:
                            
                         
                            Tenant<input type="radio" checked="checked" name="classification" value="tenant">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Landlord<input type="radio" <?php if($classification != 1){echo 'checked="checked"';} ?> name="classification" value="landlord">
                         </td>
                    </tr>
                    <?php echo "<tr><td colspan='3'><font color='red'>".$errorMessage."</font></td></tr>"; ?>
                    <tr>
                         <td>
                         <lable class="label">Username:</label><br/><input type="text" name="username" class="required" value="<?php echo $userName; ?>" minlength="5" />
                         </td>
                         <td>
                           <lable class="label">Password:</label><br/><input title="Password must be more than 8 characters" type="password" id="password" class="required" minlength="8" value="<?php echo $password; ?>" name="password1">
                         </td>
                         <td>
                           <lable class="label">Confirm Password:</label><br/><input title="Confirm Password" id="password_again" class="required" value="<?php echo $password; ?>" type="password" name="password_again">
                         </td>
                    </tr>
                    <tr class="hr">
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                    <tr>

                         <td>
                           <lable class="label">First Name:</label><br/><input  type="text" name="fname" value="<?php echo $firstName; ?>" class="required">
                         </td>

                         <td colspan="2">
                           <lable class="label">Last Name:</label><br/><input  type="text" name="lname" value="<?php echo $lastName; ?>" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable class="label">Email:</label><br/><input  type="text" id="email" value="<?php echo $email; ?>" name="email1" class="required email">
                         </td>
                         <td>
                             <lable class="label">Confirm Email:</label><br/><input title="Emails must match" type="text" value="<?php echo $email; ?>" id="email_again" name="email_again" class="required email">
                         </td>
                         <td>
                             <lable class="label">Phone:</label><br/><input id="phone" type="text" name="phone" value="<?php echo $phone; ?>" class="required">
                         </td>
                    </tr>
                    <tr class="hr">
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                     <tr>
                         <td>
                             <lable class="label">Address:</label><br/><input  type="text" name="address" value="<?php echo $address; ?>" class="required">
                         </td>
                         <td>
                             <lable class="label">City:</label><br/><input  type="text" name="city" value="<?php echo $city; ?>" class="required">
                         </td>
                         <td>
                             <lable class="label">State:</label><br/><input title="Enter State Initals" type="text" name="state" maxlength="2" minlength="2" value="<?php echo $state; ?>" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable class="label">Zip:</label><br/><input title="Enter valid zip code"  type="text" name="zip" minlength="5" maxlength="5" class="required number" value="<?php echo $zip; ?>">
                         </td>
                         <td>
                             <lable class="label">Age:</label><br/><input title="Must be over 18 years of age" type="text" value="<?php echo $age; ?>" name="age" class="required number" min="18">
                         </td>
                          
                    </tr>
                    <tr>
                         <td colspan="3" align="left">
                                <button type="submit" class="button">Save and Continue</button>
                                 <button type="reset" class="button">Reset</button>
                                
                         </td>
                    </tr>
                      
                </table>
            
            </form>
             
        </div>
<?
	include 'Footer.php';
?>

    
    
    

<script>
  $(document).ready(function(){
    jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
	return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "Please specify a valid phone number");

    $("#newUserForm").validate({
        onkeyup: false,
        onclick: false,
        
        rules: { 
        phone: {
            required: true,
            phoneUS: true
        },    
                
        password: "required",
        email: "required",
        email_again:{
        equalTo: "#email"    
        },
        password_again: {
        equalTo: "#password"}  
        
        }
    });
  });
  </script>
  
