<?php
    $title = "New Housing Application";
    include 'Header.php';
    include "formElements.php";
    
    //Test if user is logged in IF not they will be prompted to log in
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn();

    //Query that is retrieving the data from the application of the user
    $result = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");   
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //setting the query data into a variable
    $row = mysql_fetch_array($result);
        

//echo $userType;
?>   

<!-- Main content will load with exiting elements being pre filled into the form
     Various testing methods are used to ensure that the display will be identical to the users 
     previous input if the user has already completed this page-->

<h1 class="Title" >New Housing Application Continued</h1>
<hr class="Title">
<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication2Redirect.php">
        <div id="employers">
            <div class="formElement" id="employer1">
                Current Employer</br>
                Employer: <input type="text" name="employerName1" value="<?php echo $row[CurrentEmployerName]?>" />
                Supervisor First Name: <input type="text" name="superVisorFName1" value="<?php echo $row[CurrentSupFName]?>" /><br/>
                Supervisor Last Name: <input type="text" name="superVisorLName1" value="<?php echo $row[CurentSupLName]?>"/><br/>
                Supervisor Phone: <input type="text" name="superVisorPhone1" value="<?php echo $row[CurrentSupPhone]?>"/>
                Position Held: <input type="text" name="position1" value="<?php echo $row[CurrentPositionName]?>"/><br/>
                Months Employed: <input type="text" name="monthsEmployed1" value="<?php echo $row[CurrentMonthsEmployed]?>"/>
                Annual Salary: <input type="text" name="annualSalary1" value="<?php echo $row[CurrentAnnualSalary]?>"/>
            </div>
            
            <div class="formElement" id="employer2">
                Employer #1</br>
                Employer: <input type="text" name="employerName2" value="<?php echo $row[PrevEmployerName]?>"/>
                Supervisor First Name: <input type="text" name="superVisorFName2" value="<?php echo $row[PrevSupFName]?>"/><br/>
                Supervisor Last Name: <input type="text" name="superVisorLName2" value="<?php echo $row[PrevSupLName]?>"/><br/>
                Supervisor Phone: <input type="text" name="superVisorPhone2" value="<?php echo $row[PrevSupPhone]?>"/>
                Position Held: <input type="text" name="position2" value="<?php echo $row[PrevPositionName]?>"/><br/>
                Months Employed: <input type="text" name="monthsEmployed2" value="<?php echo $row[PrevMonthsEmployed]?>"/>
                Annual Salary: <input type="text" name="annualSalary2" value="<?php echo $row[PrevAnnualSalary]?>"/>
            </div>
        </div>
        <!--<font class="button" id="addEmployer">Add Employer</font>
        <font class="button"  id="removeEmployer">Remove Employer</font><br/><br/>-->
        
        <div id="coAppEmployers">
            <div class="formElement" id="coAppEmployer1">
                Co Applicant Employer #1</br>
                Employer: <input type="text" name="coAppEmployerName1" value="<?php echo $row[CoAppEmployerName]?>"/>
                Supervisor First Name: <input type="text" name="coAppSuperVisorFName1" value="<?php echo $row[CoAppSupFName]?>"/><br/>
                Supervisor Last Name: <input type="text" name="coAppSuperVisorLName1" value="<?php echo $row[CoAppSupLName]?>"/><br/>
                Supervisor Phone: <input type="text" name="coAppSuperVisorPhone1" value="<?php echo $row[CoAppSupPhone]?>"/>
                Position Held: <input type="text" name="coAppPosition1" value="<?php echo $row[CoAppPositionName]?>"/><br/>
                Months Employed: <input type="text" name="coAppMonthsEmployed1" value="<?php echo $row[CoAppMonthsEmployed]?>"/>
                Annual Salary: <input type="text" name="coAppAnnualSalary1" value="<?php echo $row[CoAppAnnualSalary]?>"/>

            </div>
            <!--<div class="formElement" id="coAppEmployer2" style="display: none;">
                Co Applicant Employer #2</br>
                Employer: <input type="text" name="coAppEmployerName2" value="<?php echo $row[EarlyMoveIn]?>"/>
                Supervisor First Name: <input type="text" name="coAppSuperVisorFName2" value="<?php echo $row[EarlyMoveIn]?>"/><br/>
                Supervisor Last Name: <input type="text" name="coAppSuperVisorLName2" value="<?php echo $row[EarlyMoveIn]?>"/><br/>
                Supervisor Phone: <input type="text" name="coAppSuperVisorPhone2" value="<?php echo $row[EarlyMoveIn]?>"/>
                Position Held: <input type="text" name="coAppPosition2" value="<?php echo $row[EarlyMoveIn]?>"/><br/>
                Months Employed: <input type="text" name="coAppMonthsEmployed2" value="<?php echo $row[EarlyMoveIn]?>"/>
                Annual Salary: <input type="text" name="coAppAnnualSalary2" value="<?php echo $row[EarlyMoveIn]?>"/>

            </div>-->
        </div>
        
        <!--<font class="button" id="addCoAppEmployer">Add Co Applicant Employer</font>
        <font class="button"  id="removeCoAppEmployer">Remove Co Applicant Employer</font><br/><br/>-->
        
        <!--<font class="button" id="addCoAppEmployer">Add Co Applicant Employer</font>
        <font class="button"  id="removeCoAppEmployer">Remove Co Applicant Employer</font><br/><br/>-->
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    </form>
</div>
<?php
include 'Footer.php';
?>

//The script below manages the ability to have dynamic fields, and ensures that at least one employer is entered
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

</script> 
