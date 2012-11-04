<?php
    $title = "New Housing Application";
    include 'Header.php';
    
    //Test if user is logged in IF not they will be prompted to log in
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");

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

<div id="mainContent">
    <form id="newApplicationForm" method="post" action="newHousingApplication2Redirect.php">
        <table class="tableForm">
            <font class="formheader">Employment History</font>
            <tr>
                <th colspan="2">
                    Current Employer
                </th>
            </tr>
            <tr>
                <td>
                    Employer: <input class="required" type="text" name="employerName1" value="<?php echo $row[CurrentEmployerName]?>" />
                </td>
                <td>
                    Supervisor First Name: <input type="text" name="superVisorFName1" value="<?php echo $row[CurrentSupFName]?>" />
                </td>
                <td>
                    Supervisor Last Name: <input type="text" name="superVisorLName1" value="<?php echo $row[CurentSupLName]?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Supervisor Phone: <input type="text" name="superVisorPhone1" value="<?php echo $row[CurrentSupPhone]?>"/>
                </td>
                <td>
                    Position Held: <input class="required" type="text" name="position1" value="<?php echo $row[CurrentPositionName]?>"/><br/>
                </td>
                <td>
                    Months Employed: <input class="required" type="text" name="monthsEmployed1" value="<?php echo $row[CurrentMonthsEmployed]?>"/>
                </td>
            </tr>
            <tr>
                <td>
                     Annual Salary: <input class="required" type="text" name="annualSalary1" value="<?php echo $row[CurrentAnnualSalary]?>"/>
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
                    Employer: <input type="text" name="employerName2" value="<?php echo $row[PrevEmployerName]?>"/>
                </td>
                <td>
                    Supervisor First Name: <input type="text" name="superVisorFName2" value="<?php echo $row[PrevSupFName]?>"/><br/>
                </td>
                <td>
                    Supervisor Last Name: <input type="text" name="superVisorLName2" value="<?php echo $row[PrevSupLName]?>"/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    Supervisor Phone: <input type="text" name="superVisorPhone2" value="<?php echo $row[PrevSupPhone]?>"/>
                </td>
                <td>
                    Position Held: <input type="text" name="position2" value="<?php echo $row[PrevPositionName]?>"/><br/>
                </td>
                <td>
                    Months Employed: <input type="text" name="monthsEmployed2" value="<?php echo $row[PrevMonthsEmployed]?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Annual Salary: <input type="text" name="annualSalary2" value="<?php echo $row[PrevAnnualSalary]?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr/>
                </td>
            </tr>
            <tr>
                <th>
                    Co Applicant Employer
                </th>
            </tr>
            <tr>
                <td>
                    Employer: <input type="text" name="coAppEmployerName1" value="<?php echo $row[CoAppEmployerName]?>"/>
                </td>
                <td>
                    Supervisor First Name: <input type="text" name="coAppSuperVisorFName1" value="<?php echo $row[CoAppSupFName]?>"/><br/>
                </td>
                <td>
                    Supervisor Last Name: <input type="text" name="coAppSuperVisorLName1" value="<?php echo $row[CoAppSupLName]?>"/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    Supervisor Phone: <input type="text" name="coAppSuperVisorPhone1" value="<?php echo $row[CoAppSupPhone]?>"/>
                </td>
                <td>
                    Position Held: <input type="text" name="coAppPosition1" value="<?php echo $row[CoAppPositionName]?>"/><br/>
                </td>
                <td>
                    Months Employed: <input type="text" name="coAppMonthsEmployed1" value="<?php echo $row[CoAppMonthsEmployed]?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    Annual Salary: <input type="text" name="coAppAnnualSalary1" value="<?php echo $row[CoAppAnnualSalary]?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" class="button">Save and Continue</button>
                    <button type="reset" class="button">Clear</button>
                    <a class="button" href="myHood.php">Exit without saving</a>
                </td>
            </tr>
        </table>
  
        
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

 $(document).ready(function(){
    $("#newApplicationForm").validate({
        ignoreTitle: true
        
    });
  });
</script>

