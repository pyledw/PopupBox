<?php
$title = "New Housing Application";
include 'Header.php';
include "formElements.php";
?>

<script>
var val1 = 1;
$(document).ready(function(){
  $("#addEmployer").click(function(){
      if(val1 < 5)
          {
            val1 = val1 + 1;
            $("#employers").append('<div id="employer' + val1 + '">Employer #'+(val1)+'<br />Employer: <input type="text" name="employerName' + val1 + '" />Supervisor Name: <input type="text" name="superVisorName' + val1 + '" /><br/>Supervisor Phone: <input type="text" name="superVisorPhone' + val1 + '" />Position Held: <input type="text" name="position' + val1 + '" /><br/>Months Employed: <input type="text" name="monthsEmployed' + val1 + '" />Annual Salary: <input type="text" name="annualSalary' + val1 + '" /></div>');
          }
  });
  $("#removeEmployer").click(function(){
      if(val1 > 1)
          {
            $("#employer" + val1).remove();
            val1 = val1 - 1;
          }
  });
});

var val2 = 1;
$(document).ready(function(){
  $("#addCoAppEmployer").click(function(){
      if(val2 < 4)
          {
            val2 = val2 + 1;
            $("#coAppEmployers").append('<div id="coAppEmployer' + val2 + '">Co Applicant Employer #'+(val2)+'<br />Employer: <input type="text" name="employerName' + val2 + '" />Supervisor Name: <input type="text" name="superVisorName' + val2 + '" /><br/>Supervisor Phone: <input type="text" name="superVisorPhone' + val2 + '" />Position Held: <input type="text" name="position' + val2 + '" /><br/>Months Employed: <input type="text" name="monthsEmployed' + val2 + '" />Annual Salary: <input type="text" name="annualSalary' + val2 + '" /></div>');
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
<h1 class="Title" >New Housing Application Continued</h1>
<hr class="Title">
<div id="mainContent">
    <?php
    createForm("90%", "90%", "Housing Application part #2", "newHousingApplication3.php");
    ?>
    <div id="employers">
        <div id="employer1">
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
        <div id="coAppEmployer1">
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