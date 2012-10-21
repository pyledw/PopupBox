<?php
    $title = "New Housing Application";
    include 'Header.php';
    include "formElements.php";
    
//echo $userType;
    require "config.inc.php";
         
    $con = mysql_connect($db_server,$db_user,$db_pass );
    if(!$con)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "connected to mySQL";
    }
    $select = mysql_selectdb($db_database, $con);
    if(!$select)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "Selected Database";
    }
    
    
     
    $sql="INSERT INTO APPLICATION (NumOtherOccupants,SecondaryOccupantFName,UserID, EarlyMoveIn, LateMoveIn, IsADA, IsSmokingRequired, SecondaryOccupantLName, SecondaryOccupantAge, SecondaryOccupantRelationship,Pet1Type,Pet1Breed,Pet1Age,Pet1Weight,Pet2Type,Pet2Breed,Pet2Age,Pet2Weight,Pet3Type,Pet3Breed,Pet3Age,Pet3Weight)
    VALUES
    ('$_POST[numbOccupants]','$_POST[fName]','$_SESSION[userID]','$_POST[earliestDate]','$_POST[latestDate]','$_POST[ADA]','$_POST[smoking]','$_POST[lName]','$_POST[age]','$_POST[relationship]','$_POST[animalType]','$_POST[animalBreed]','$_POST[animalAge]','$_POST[animalWeight]','$_POST[animalType2]','$_POST[animalBreed2]','$_POST[animalAge2]','$_POST[animalWeight2]','$_POST[animalType3]','$_POST[animalBreed3]','$_POST[animalAge3]','$_POST[animalWeight3]')";
    
    if (!mysql_query($sql,$con))
    {
        die('Error: ' . mysql_error());
    }
    mysql_close();








?>   
<h1 class="Title" >New Housing Application Continued</h1>
<hr class="Title">
<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication3.php">
        <div id="employers">
            <div class="formElement" id="employer1">
                Current Employer</br>
                Employer: <input type="text" name="employerName" />
                Supervisor First Name: <input type="text" name="superVisorFName" /><br/>
                Supervisor Last Name: <input type="text" name="superVisorLName" /><br/>
                Supervisor Phone: <input type="text" name="superVisorPhone" />
                Position Held: <input type="text" name="position" /><br/>
                Months Employed: <input type="text" name="monthsEmployed" />
                Annual Salary: <input type="text" name="annualSalary" />
            </div>
        </div>
        <font class="button" id="addEmployer">Add Employer</font>
        <font class="button"  id="removeEmployer">Remove Employer</font><br/><br/>
        
        <div id="coAppEmployers">
            <div class="formElement" id="coAppEmployer1">
                Co Applicant Employer #1</br>
                Employer: <input type="text" name="coAppEmployerName1" />
                Supervisor First Name: <input type="text" name="coAppSuperVisorFName1" /><br/>
                Supervisor Last Name: <input type="text" name="coAppSuperVisorLName1" /><br/>
                Supervisor Phone: <input type="text" name="coAppSuperVisorPhone1" />
                Position Held: <input type="text" name="coAppPosition1" /><br/>
                Months Employed: <input type="text" name="coAppMonthsEmployed1" />
                Annual Salary: <input type="text" name="coAppAnnualSalary1" />

            </div>
        </div>
        
        <!--<font class="button" id="addCoAppEmployer">Add Co Applicant Employer</font>
        <font class="button"  id="removeCoAppEmployer">Remove Co Applicant Employer</font><br/><br/>-->
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    </form>
</div>
<?php
include 'Footer.php';
?>

<script>
var val1 = 1;
$(document).ready(function(){
  $("#addEmployer").click(function(){
      if(val1 < 2)
          {
            val1 = val1 + 1;
            var employerContent = '<div class="formElement" id="employer' + val1 + '">\n\
                Employer #'+(val1)+'<br />\n\
                Employer: <input type="text" name="employerName' + val1 + '" />\n\
                Supervisor Firt Name: <input type="text" name="superVisorFName' + val1 + '" /><br/>\n\
                Supervisor Last Name: <input type="text" name="superVisorLName' + val1 + '" /><br/>\n\
                Supervisor Phone: <input type="text" name="superVisorPhone' + val1 + '" />\n\
                Position Held: <input type="text" name="position' + val1 + '" /><br/>\n\
                Months Employed: <input type="text" name="monthsEmployed' + val1 + '" />\n\
                Annual Salary: <input type="text" name="annualSalary' + val1 + '" /></div>';
            $("#employers").append(employerContent);
          }
      else{
          alert("You have reached the maximum number of employers");
      }
  });
  $("#removeEmployer").click(function(){
      if(val1 > 1)
          {
            $("#employer" + val1).remove();
            val1 = val1 - 1;
          }
      else
      {
        alert("Must fill in at least one employer");
      }
  });
});

var val2 = 1;
$(document).ready(function(){
  $("#addCoAppEmployer").click(function(){
      if(val2 < 2)
          {
            val2 = val2 + 1;
            var coAppEmployerContent = '<div class="formElement" id="coAppEmployer' + val2 + '">\n\
                Co Applicant Employer #'+(val2)+'<br />\n\
                Employer: <input type="text" name="employerName' + val2 + '" />\n\
                Supervisor First Name: <input type="text" name="superVisorFName' + val2 + '" /><br/>\n\
                Supervisor Last Name: <input type="text" name="superVisorLName' + val2 + '" /><br/>\n\
                Supervisor Phone: <input type="text" name="superVisorPhone' + val2 + '" />\n\
                Position Held: <input type="text" name="position' + val2 + '" /><br/>\n\
                Months Employed: <input type="text" name="monthsEmployed' + val2 + '" />\n\
                Annual Salary: <input type="text" name="annualSalary' + val2 + '" /></div>';
            $("#coAppEmployers").append(coAppEmployerContent);
          }
  });
  $("#removeCoAppEmployer").click(function(){
      if(val2 > 1)
          {
            $("#coAppEmployer" + val2).remove();
            val2 = val2 - 1;
          }
  });
});

</script> 