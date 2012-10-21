<?php
    $title = "New Application #3";
    include 'Header.php';
    include "formElements.php";
    
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

    mysql_query("UPDATE APPLICATION SET CurrentEmployerName='$_POST[employerName]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentSupFName='$_POST[superVisorFName]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurentSupLName='$_POST[superVisorLName]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentSupPhone='$_POST[superVisorPhone]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentPositionName='$_POST[position]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentMonthsEmployed='$_POST[monthsEmployed]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CurrentAnnualSalary='$_POST[annualSalary]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //Seconday Employer
    
    mysql_query("UPDATE APPLICATION SET PrevEmployerName='$_POST[employerName2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET PrevSupFName='$_POST[superVisorFName2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET PrevSupLName='$_POST[superVisorLName2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET PrevSupPhone='$_POST[superVisorPhone2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET PrevPositionName='$_POST[position2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET PrevMonthsEmployed='$_POST[monthsEmployed2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET PrevAnnualSalary='$_POST[annualSalary2]'
    WHERE UserID = '$_SESSION[userID]'");
    
    //Co Applicant Employers
    
    mysql_query("UPDATE APPLICATION SET CoAppEmployerName='$_POST[coAppEmployerName1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppSupFName='$_POST[coAppSuperVisorFName1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppSupLName='$_POST[coAppSuperVisorLName1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppSupPhone='$_POST[coAppSuperVisorPhone1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppPositionName='$_POST[coAppPosition1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppMonthsEmployed='$_POST[coAppMonthsEmployed1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET CoAppAnnualSalary='$_POST[coAppAnnualSalary1]'
    WHERE UserID = '$_SESSION[userID]'");
    
    
    mysql_close();
    
    ?>
<h1 class="Title">Application Page #3</h1>
<hr class="Title">

<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication4.php">
        <div id="formerHomes">
            <div class="formElement" id="formerHome1">
                
                <h3>Former Residence #1</h3><br/>
                Type Of Residence:<select id="select" name="type1">
                    <option>
                        Owned
                    </option>
                    <option>
                        Rented
                    </option>
                    <option>
                        Family Friend
                    </option>
                </select>
                Address:<input title="THIS IS A TOOLTIP" type="text" name="address1">
                City:<input type="text" name="city1">
                State:<input type="text" name="state1">
                Zip Code:<input  type="text" name="zipCode1">
                <div id="renter" style="display: none;">
                Landlords Name:<input type="text" name="landlordsName1">
                Phone Number:<input type="text" name="phoneNumber1">
                Reason For Leaving:<input type="text" name="reasonForLeaving1">
                Rent:<input type="text" name="rent1">
                </div>
                <div id="owner">
                Mortgage:<input type="text" name="mortgage1">
                </div>

            </div>
        </div>
        <font class="button" id="addFormerHome">Add another home</font>
        <font class="button"  id="removeFormerHome">Remove home</font><br/><br/>
        <h3>Personal History</h3>
        
        Have you ever been convicted of a felony?
        Yes<input type="radio" name="felony"  value="Y" />
        No<input type="radio" name="felony"checked='checked'  value="N" /><br/>
        Have you ever been evicted?
        Yes<input type="radio" name="evicted"  value="Y" />
        No<input type="radio" name="evicted"checked='checked'  value="N" /><br/>
        Have you ever declared bankruptcy?
        Yes<input type="radio" name="bankruptcy"  value="Y" />
        No<input type="radio" name="bankruptcy"checked='checked'  value="N" /><br/>
        
        If yes, Explain: <textarea cols="50" rows="4" name="ifYes"></textarea>
        

        <h3>Credit History</h3>
        Total outstanding balance on consumer debt (credit cards, charge accounts, etc.): <input type="text" name="devitCardDebt" value=""/><br/>
        Total monthly payment on all credit/loan accounts: <input type="text" name="monthlyPayments" value=""/><br/>
        Total outstanding balance on loans (auto, education, mortgage, etc.)<input type="text" name="loans value="/><br/>
        Approximate total assets (cash, investments, property equity, etc.): <input type="text" name="equity" value=""/><br/>
        
        <br/>
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
  $("#addFormerHome").click(function(){
      if(val1 < 3)
          {
            val1 = val1 + 1;
            var formerHomeContent = '<div class="formElement" id="formerHome'+val1+'">\n\
                         <h3>Former Residence #'+val1+'</h3><br/>\n\
                        Type Of Residence:<select name="type' + val1 +'">\n\
                            <option>Rented</option>\n\
                            <option>Owned</option>\n\
                            <option>Family Friend</option>\n\
                        </select>\n\
                        Address:<input type="text" name="address'+ val1 +'>\n\
                        City:<input type="text" name="city'+val1+'">\n\
                        State:<input type="text" name="state'+ val1 +'>\n\
                        Zip Code:<input type="text" name="zipCode'+val1+'>\n\
                        Landlords Name:<input type="text" name="landlordsName'+val1+'">\n\
                        Phone Number:<input type="text" name="phoneNumber'+val1+'">\n\
                        Reason For Leaving:<input type="text" name="reasonForLeaving'+val1+'">\n\
                        Rent:<input type="text" name="rent'+val1+'">\n\
                        Mortgage:<input type="text" name="mortgage'+val1+'"></div>';
            $("#formerHomes").append(formerHomeContent);
          }
      else{
          alert("Maximum number of homes met");
      }
  });
  $("#removeFormerHome").click(function(){
      if(val1 > 1)
          {
            $("#formerHome" + val1).remove();
            val1 = val1 - 1;
          }
      else
      {
        alert("Must fill in at least one residence");
      }
  });
});

$(document).ready(function(){
  $("#select").change(function(){
      var value = $("select").val();
      if(value == 'Owned')
          {
              $('#renter').hide();
              $('#owner').show();
          }
      else
          {
              $('#renter').show();
              $('#owner').hide();
          }
  });
     
});

</script>

