
<?php
        $title = "New User";
	include 'Header.php';
?>

<script>
   $(function(){
         $.fn.formLabels();
   });
</script>
<!-- Page Content -->

</textarea>
    <h1 class="Title">Account Set Up</h1>
    <hr class="Title" />
  
        <div id="mainContent">
            <form id="newUserForm" method="post" action="newUserRedirect.php">
                <table class="form" width="900px;">
                    
                      <tr height="80px" style="vertical-align: top;">
                         <td class="field2" colspan="3">
                            You are a:
                            
                         
                            Tenant<input type="radio" checked="checked" name="classification" value="tenant">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Landlord<input type="radio" name="classification" value="landlord">
                         </td>
                    </tr>
                    <tr>
                         <td class="field">
                             <input type="text" title="User Name" name="username" class="required" minlength="5" /><br/>
                         </td>
                         <td class="field">
                           <input title="Password" type="password" id="password" class="required" name="password1">
                         </td>
                         <td class="field">
                           <input title="Confirm Password" id="password_again" class="required" type="password" name="password_again">
                         </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                    <tr>

                         <td class="field">
                           <input title="First name" type="text" name="fname" class="required">
                         </td>

                         <td colspan="2" class="field">
                           <input title="Last name" type="text" name="lname" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td class="field">
                             <input title="Email address" type="text" id="email" name="email1" class="required email">
                         </td>
                         <td class="field">
                             <input title="Confirm email" type="text" id="email_again" name="email_again" class="required email">
                         </td>
                         <td class="field">
                             <input title="Phone" type="text" name="phone" class="required">
                         </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr />
                        </td>
                    </tr>
                     <tr>
                         <td class="field">
                             <input title="Address" type="text" name="address" width="400px" class="required">
                         </td>
                         <td class="field">
                             <input title="City" type="text" name="city" class="required">
                         </td>
                         <td class="field">
                             <input title="State" type="text" name="state" class="required">
                         </td>
                    </tr>
                    <tr>
                         <td class="field">
                             <input title="Zip code" type="text" name="zip" class="required">
                         </td>
                         <td class="field">
                             <input title="Birth Date" type="text" name="DOB" class="required">
                         </td>
                         <td class="field">
                             <input title="last 4 of SSN" type="text" name="SSN" class="required">
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

    
    
    
    
    
<style type="text/css">
* { 
    font-family: Verdana; font-size: 96%; }
label { 
    width: 10em; float: left; }
label.error { 
    float: none; color: red; padding-left: .5em; vertical-align: top; }
p {
    clear: both; }
.submit { 
    margin-left: 12em; }
em {
    font-weight: bold; padding-right: 1em; vertical-align: top; }
.stuff{
    position:relative;
    top:20px;
    left:5px;
}
</style>

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
  