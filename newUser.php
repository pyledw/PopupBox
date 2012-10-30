
<?php
        $title = "New User";
	include 'Header.php';
?>

<!-- Page Content -->

    <h1 class="Title">Account Set Up</h1>
    <hr class="Title" />
    <div id="mainContent">
             <form class="formStyle" method="post" action="newUserRedirect.php">
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
                            <input type="text" name="username">
                         </td>
                         <td>
                           Password:
                         </td>
                         <td>
                           <input id="password1" type="password" name="password1">
                         </td>
                         <td>
                            Confirm Password:
                         </td>
                         <td>
                           <input id="password2" type="password" name="password2">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           First Name:
                         </td>
                         <td>
                           <input type="text" name="fname">
                         </td>
                         <td>
                           Last Name: 
                         </td>
                         <td>
                           <input type="text" name="lname">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           Email: 
                         </td>
                         <td>
                             <input type="text" name="email1">
                         </td>
                         <td>
                           Confirm Email: 
                         </td>
                         <td>
                             <input type="text" name="email2">
                         </td>
                         <td>
                           Phone: 
                         </td>
                         <td>
                             <input type="text" name="phone">
                         </td>
                    </tr>
                     <tr>
                         <td>
                           Address: 
                         </td>
                         <td>
                             <input type="text" name="address" width="400px">
                         </td>
                         <td>
                          City: 
                         </td>
                         <td>
                             <input type="text" name="city">
                         </td>
                         <td>
                           State: 
                         </td>
                         <td>
                             <input type="text" name="state">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           Zip Code: 
                         </td>
                         <td>
                             <input type="text" name="zip">
                         </td>
                         <td>
                          Date of birth: 
                         </td>
                         <td>
                             <input type="text" name="DOB">
                         </td>
                         <td>
                           Last 4 digits in your Social Security Number
                         </td>
                         <td>
                             <input type="text" name="SSN">
                         </td>
                    </tr>
                    <tr>
                         <td>
                           
                         </td>
                         <td>
                          <button type="submit" class="button">Save and Continue</button>
                         </td>
                         <td>
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