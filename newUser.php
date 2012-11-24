
<?php

    /**
     * This page is the new user form.
     * 
     * This page will retireve any inforamtion posted to if thier is an error message.
     * It then allows the user to enter thier cradentials.
     * 
     * The form validation id done with Jquery
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
        $title = "New User";
	include 'Header.php';
        
          $errorMessage = $_POST[error]; 
          $userName = $_POST['username'];
          $password = $_POST['password'];
          $email = $_POST['email'];
          $SSN = $_POST['ssn'];
          $firstName = $_POST['firstName'];
          $lastName = $_POST['lastName'];
          $phone =  $_POST['phone'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $zip = $_POST['zip'];
          $age = $_POST['age'];
          $classification = $_POST['accountType'];
          
        
?>


<!-- Page Content -->
  
        <div id="mainContent">
            <form id="newUserForm" method="post" action="newUserRedirect.php">
                <table class="tableForm" width="900px;">
                    <font class="formheader">Create and Account</font>
                    
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
                         <lable class="label">Username:</label><br/><input type="text" title="User Name" name="username" class="required" value="<?php echo $userName; ?>" minlength="5" />
                         </td>
                         <td>
                           <lable class="label">Password:</label><br/><input title="Password" type="password" id="password" class="required" value="<?php echo $password; ?>" name="password1">
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
                           <lable class="label">First Name:</label><br/><input title="First name" type="text" name="fname" value="<?php echo $firstName; ?>" class="required">
                         </td>

                         <td colspan="2">
                           <lable class="label">Last Name:</label><br/><input title="Last name" type="text" name="lname" value="<?php echo $lastName; ?>" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable class="label">Email:</label><br/><input title="Email address" type="text" id="email" value="<?php echo $email; ?>" name="email1" class="required email">
                         </td>
                         <td>
                             <lable class="label">Confirm Email:</label><br/><input title="Confirm email" type="text" value="<?php echo $email; ?>" id="email_again" name="email_again" class="required email">
                         </td>
                         <td>
                             <lable class="label">Phone:</label><br/><input title="Phone" type="text" name="phone" value="<?php echo $phone; ?>" class="required">
                         </td>
                    </tr>
                    <tr class="hr">
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                     <tr>
                         <td>
                             <lable class="label">Address:</label><br/><input title="Address" type="text" name="address" width="400px" value="<?php echo $address; ?>" class="required">
                         </td>
                         <td>
                             <lable class="label">City:</label><br/><input title="City" type="text" name="city" value="<?php echo $city; ?>" class="required">
                         </td>
                         <td>
                             <lable class="label">State:</label><br/><input title="State" type="text" name="state" value="<?php echo $state; ?>" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable class="label">Zip:</label><br/><input title="Zip code" type="text" name="zip" value="<?php echo $zip; ?>" class="required">
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
    $("#newUserForm").validate({
        onkeyup: false,
        onclick: false,
        ignoreTitle: true,
        
        rules: {        
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
  