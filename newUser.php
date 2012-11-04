
<?php
        $title = "New User";
	include 'Header.php';
?>


<!-- Page Content -->
  
        <div id="mainContent">
            <form id="newUserForm" method="post" action="newUserRedirect.php">
                <table class="tableForm" width="900px;">
                    <font class="formheader">Create and Account</font>
                    
                      <tr height="80px" style="vertical-align: top;">
                         <td class="field2" colspan="3">
                            You are a:
                            
                         
                            Tenant<input type="radio" checked="checked" name="classification" value="tenant">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Landlord<input type="radio" name="classification" value="landlord">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable>Username:</label><input type="text" title="User Name" name="username" class="required" minlength="5" /><br/>
                         </td>
                         <td>
                           <lable>Password:</label><input title="Password" type="password" id="password" class="required" name="password1">
                         </td>
                         <td>
                           <lable>Confirm Password</label><input title="Confirm Password" id="password_again" class="required" type="password" name="password_again">
                         </td>
                    </tr>
                    <tr class="hr">
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                    <tr>

                         <td>
                           <lable>First Name:</label><input title="First name" type="text" name="fname" class="required">
                         </td>

                         <td colspan="2">
                           <lable>Last Name:</label><input title="Last name" type="text" name="lname" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable>Email:</label><input title="Email address" type="text" id="email" name="email1" class="required email">
                         </td>
                         <td>
                             <lable>Confirm Email:</label><input title="Confirm email" type="text" id="email_again" name="email_again" class="required email">
                         </td>
                         <td>
                             <lable>Phone:</label><input title="Phone" type="text" name="phone" class="required">
                         </td>
                    </tr>
                    <tr class="hr">
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                     <tr>
                         <td>
                             <lable>Address</label><input title="Address" type="text" name="address" width="400px" class="required">
                         </td>
                         <td>
                             <lable>City</label><input title="City" type="text" name="city" class="required">
                         </td>
                         <td>
                             <lable>State</label><input title="State" type="text" name="state" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable>Zip</label><input title="Zip code" type="text" name="zip" class="required">
                         </td>
                         <td  >
                             <lable>BirthDay</label><input title="Birth Date" type="text" name="DOB" class="required">
                         </td>
                         <td>
                             <lable>SSN:</label><input title="last 4 of SSN" type="text" name="SSN" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td colspan="3" align="left">
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

    
    
    

  <script>
  $(document).ready(function(){
    $("#newUserForm").validate({
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
  