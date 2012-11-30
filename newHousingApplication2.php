<?php
    $title = "New Application #2";
    include 'Header.php';
    
    /**
     * First Check is to ensur ethe user is logged in, and get the data of the correct user.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * 
     * At the end of the page it check to see that if the application was not complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    //Test if user is logged in IF not they will be prompted to log in
    if(!isset($_SESSION['userID']))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");

    //Query that is retrieving the data from the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='".$_SESSION['userID']."'");   
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //setting the query data into a variable
    $row = mysql_fetch_array($result);
        

//echo $userType;
?>   

<div id="mainContent">
    <form id="newApplicationForm" method="post" action="newHousingApplication2Redirect.php">
        <table class="tableForm" width="1000px">
            <font class="formheader" style="left:200px">Employment History</font>
            <tr>
                <th colspan="2">
                    Current Employer
                </th>
            </tr>
            <tr>
                <td>
                    <label class="label">Employer: </label><br/> <input class="required" type="text" name="employerName1" value="<?php echo $row['CurrentEmployerName']?>" />
                </td>
                <td>
                    <label class="label">Supervisor First Name: </label><br/><input type="text" name="superVisorFName1" value="<?php echo $row['CurrentSupFName']?>" />
                </td>
                <td>
                    <label class="label">Supervisor Last Name: </label><br/><input type="text" name="superVisorLName1" value="<?php echo $row['CurentSupLName']?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Supervisor Phone: </label><br/><input id="phone0" type="text" name="superVisorPhone1" value="<?php echo $row['CurrentSupPhone']?>"/>
                </td>
                <td>
                    <label class="label">Position Held: </label><br/><input class="required" type="text" name="position1" value="<?php echo $row['CurrentPositionName']?>"/><br/>
                </td>
                <td>
                    <label class="label">Months Employed: </label><br/><input class="required number" type="text" maxlength="3" name="monthsEmployed1" value="<?php echo $row['CurrentMonthsEmployed']?>"/>
                </td>
            </tr>
            <tr>
                <td>
                     <label class="label">Annual Salary: </label><br/><input class="required number" type="text" name="annualSalary1" value="<?php echo $row['CurrentAnnualSalary']?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr/>
                </td>
            </tr>
            <tr>
                <th>
                    Former Employer
                </th>
            </tr>
            <tr>
                <td>
                    <label class="label">Employer: </label><br/><input type="text" name="employerName2" value="<?php echo $row['PrevEmployerName']?>"/>
                </td>
                <td>
                    <label class="label">Supervisor First Name: </label><br/><input type="text" name="superVisorFName2" value="<?php echo $row['PrevSupFName']?>"/><br/>
                </td>
                <td>
                    <label class="label">Supervisor Last Name: </label><br/><input type="text" name="superVisorLName2" value="<?php echo $row['PrevSupLName']?>"/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Supervisor Phone: </label><br/><input id="phone1" type="text" name="superVisorPhone2" value="<?php echo $row['PrevSupPhone']?>"/>
                </td>
                <td>
                    <label class="label">Position Held: </label><br/><input type="text" name="position2" value="<?php echo $row['PrevPositionName']?>"/><br/>
                </td>
                <td>
                    <label class="label">Months Employed: </label><br/><input type="text" name="monthsEmployed2" class="number" maxlength="3"  value="<?php echo $row['PrevMonthsEmployed']?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Annual Salary: </label><br/><input type="text" name="annualSalary2" class="number" value="<?php echo $row['PrevAnnualSalary']?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr/>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="label">Co Applicant Employer
                </th>
            </tr>
            <tr>
                <td>
                    <label class="label">Employer: </label><br/><input type="text" name="coAppEmployerName1" value="<?php echo $row[CoAppEmployerName]?>"/>
                </td>
                <td>
                    <label class="label">Supervisor First Name: </label><br/><input type="text" name="coAppSuperVisorFName1" value="<?php echo $row[CoAppSupFName]?>"/><br/>
                </td>
                <td>
                    <label class="label">Supervisor Last Name: </label><br/><input type="text" name="coAppSuperVisorLName1" value="<?php echo $row[CoAppSupLName]?>"/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Supervisor Phone: </label><br/><input id="phone2" type="text" name="coAppSuperVisorPhone1" value="<?php echo $row[CoAppSupPhone]?>"/>
                </td>
                <td>
                    <label class="label">Position Held: </label><br/><input type="text" name="coAppPosition1" value="<?php echo $row[CoAppPositionName]?>"/><br/>
                </td>
                <td>
                    <label class="label">Months Employed: </label><br/><input type="text" class="number" maxlength="3"  name="coAppMonthsEmployed1" value="<?php echo $row[CoAppMonthsEmployed]?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Annual Salary: </label><br/><input type="text" class="number" name="coAppAnnualSalary1" value="<?php echo $row[CoAppAnnualSalary]?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a class="button" href="newHousingApplication.php">Back</a>
                    
                    <a class="button" href="myHood.php">Exit without saving</a>
                    
                    <button type="submit" class="button">Save and Continue</button>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="3">
                    Page 2 of 5
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
include 'Footer.php';
?>

<!--//The script below manages the ability to have dynamic fields, and ensures that at least one employer is entered-->
<script>
var val1 = 1;
$(document).ready(function(){
  $("#addEmployer").click(function(){
      if(val1 < 2)
          {
            val1 +=1 ;
            $('#employer' + val1).show();
          }
      else{
          alert("You have reached the maximum number of employers");
      }
  });
  $("#removeEmployer").click(function(){
      if(val1 > 1)
          {
            $('#employer' + val1).hide();
            val1 -= 1;
          }
      else
      {
        alert("Must fill in at least one employer");
      }
  });
});

var val2 = 0;
$(document).ready(function(){
  $("#addCoAppEmployer").click(function(){
      if(val2 < 2)
          {
            val2 +=1 ;
            $('#coAppEmployer' + val2).show();
          }
      else{
          alert("You have reached the maximum number of Co Applicant Employers");
      }
  });
  $("#removeCoAppEmployer").click(function(){
      if(val2 > 0)
          {
            $('#coAppEmployer' + val2).hide();
            val2 -= 1;
          }
      else
      {
      }
  });
});

 $(document).ready(function(){
      jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
	return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "Please specify a valid phone number");

    $("#newApplicationForm").validate({
        onkeyup: false,
        onclick: false,
        
        rules: {
            superVisorPhone1: {
            phoneUS: true
            },   
            superVisorPhone2: {
            phoneUS: true
            },   
            coAppSuperVisorPhone1: {
            phoneUS: true
            }   
        }
    });
  });
</script>

