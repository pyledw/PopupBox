<?php
$title = "New Housing Application";
include 'Header.php';
include "formElements.php";
?>   
<h1 class="Title" >New Housing Application Continued</h1>
<hr class="Title">
<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication3.php">
        <div id="employers">
            <div class="formElement" id="employer1">
                Employer #1</br>
                Employer: <input type="text" name="employerName1" />
                Supervisor Name: <input type="text" name="superVisorName1" /><br/>
                Supervisor Phone: <input type="text" name="superVisorPhone1" />
                Position Held: <input type="text" name="position1" /><br/>
                Months Employed: <input type="text" name="monthsEmployed1" />
                Annual Salary: <input type="text" name="annualSalary1" />


            </div>
        </div>
        <font class="button" id="addEmployer">Add Employer</font>
        <font class="button"  id="removeEmployer">Remove Employer</font><br/><br/>
        <div id="coAppEmployers">
            <div class="formElement" id="coAppEmployer1">
                Co Applicant Employer #1</br>
                Employer: <input type="text" name="coAppEmployerName1" />
                Supervisor Name: <input type="text" name="coAppSuperVisorName1" /><br/>
                Supervisor Phone: <input type="text" name="coAppSuperVisorPhone1" />
                Position Held: <input type="text" name="coAppPosition1" /><br/>
                Months Employed: <input type="text" name="coAppMonthsEmployed1" />
                Annual Salary: <input type="text" name="coAppAnnualSalary1" />

            </div>
        </div>
        <font class="button" id="addCoAppEmployer">Add Co Applicant Employer</font>
        <font class="button"  id="removeCoAppEmployer">Remove Co Applicant Employer</font><br/><br/>
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
      if(val1 < 5)
          {
            val1 = val1 + 1;
            var employerContent = '<div class="formElement" id="employer' + val1 + '">\n\
                Employer #'+(val1)+'<br />\n\
                Employer: <input type="text" name="employerName' + val1 + '" />\n\
                Supervisor Name: <input type="text" name="superVisorName' + val1 + '" /><br/>\n\
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
      if(val2 < 4)
          {
            val2 = val2 + 1;
            var coAppEmployerContent = '<div class="formElement" id="coAppEmployer' + val2 + '">\n\
                Co Applicant Employer #'+(val2)+'<br />\n\
                Employer: <input type="text" name="employerName' + val2 + '" />\n\
                Supervisor Name: <input type="text" name="superVisorName' + val2 + '" /><br/>\n\
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