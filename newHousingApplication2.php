<?php
    $title = "New Housing Application";
    include 'Header.php';
    include "formElements.php";
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
//echo $userType;
?>   
<h1 class="Title" >New Housing Application Continued</h1>
<hr class="Title">
<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication2Redirect.php">
        <div id="employers">
            <div class="formElement" id="employer1">
                Current Employer</br>
                Employer: <input type="text" name="employerName1" />
                Supervisor First Name: <input type="text" name="superVisorFName1" /><br/>
                Supervisor Last Name: <input type="text" name="superVisorLName1" /><br/>
                Supervisor Phone: <input type="text" name="superVisorPhone1" />
                Position Held: <input type="text" name="position1" /><br/>
                Months Employed: <input type="text" name="monthsEmployed1" />
                Annual Salary: <input type="text" name="annualSalary1" />
            </div>
            
            <div class="formElement" id="employer2" style="display:none;">
                Employer #1</br>
                Employer: <input type="text" name="employerName2" />
                Supervisor First Name: <input type="text" name="superVisorFName2" /><br/>
                Supervisor Last Name: <input type="text" name="superVisorLName2" /><br/>
                Supervisor Phone: <input type="text" name="superVisorPhone2" />
                Position Held: <input type="text" name="position2" /><br/>
                Months Employed: <input type="text" name="monthsEmployed2" />
                Annual Salary: <input type="text" name="annualSalary2" />
            </div>
        </div>
        <font class="button" id="addEmployer">Add Employer</font>
        <font class="button"  id="removeEmployer">Remove Employer</font><br/><br/>
        
        <div id="coAppEmployers">
            <div class="formElement" id="coAppEmployer1" style="display: none;">
                Co Applicant Employer #1</br>
                Employer: <input type="text" name="coAppEmployerName1" />
                Supervisor First Name: <input type="text" name="coAppSuperVisorFName1" /><br/>
                Supervisor Last Name: <input type="text" name="coAppSuperVisorLName1" /><br/>
                Supervisor Phone: <input type="text" name="coAppSuperVisorPhone1" />
                Position Held: <input type="text" name="coAppPosition1" /><br/>
                Months Employed: <input type="text" name="coAppMonthsEmployed1" />
                Annual Salary: <input type="text" name="coAppAnnualSalary1" />

            </div>
            <div class="formElement" id="coAppEmployer2" style="display: none;">
                Co Applicant Employer #2</br>
                Employer: <input type="text" name="coAppEmployerName2" />
                Supervisor First Name: <input type="text" name="coAppSuperVisorFName2" /><br/>
                Supervisor Last Name: <input type="text" name="coAppSuperVisorLName2" /><br/>
                Supervisor Phone: <input type="text" name="coAppSuperVisorPhone2" />
                Position Held: <input type="text" name="coAppPosition2" /><br/>
                Months Employed: <input type="text" name="coAppMonthsEmployed2" />
                Annual Salary: <input type="text" name="coAppAnnualSalary2" />

            </div>
        </div>
        
        <font class="button" id="addCoAppEmployer">Add Co Applicant Employer</font>
        <font class="button"  id="removeCoAppEmployer">Remove Co Applicant Employer</font><br/><br/>
        
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