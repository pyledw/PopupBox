<?php
    $title = "New Application #3";
    include 'Header.php';
    include "formElements.php";
    ?>

<script>
var val1 = 1;
$(document).ready(function(){
  $("#addFormerHome").click(function(){
      if(val1 < 3)
          {
            val1 = val1 + 1;
            $("#formerHomes").append('<div id="formerHome'+val1+'"><h3>Former Residence #'+val1+'</h3><br/>Type Of Residence:<select name="type' + val1 +'"><option>Rented</option><option>Owned</option><option>Family Friend</option></select>Address:<input type="text" name="address'+ val1 +'>City:<input type="text" name="city'+val1+'">State:<input type="text" name="state'+ val1 +'>Zip Code:<input type="text" name="zipCode'+val1+'>Landlords Name:<input type="text" name="landlordsName'+val1+'">Phone Number:<input type="text" name="phoneNumber'+val1+'">Reason For Leaving:<input type="text" name="reasonForLeaving'+val1+'">Rent:<input type="text" name="rent'+val1+'">Mortgage:<input type="text" name="mortgage'+val1+'"></div>');
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
</script>
<h1 class="Title">Application Page #3</h1>
<hr class="Title">

<div id="mainContent">
    <?php

        createForm("90%", "90%", "Housing Application part #3", "newHousingApplication4.php");
    ?>
    <div id="formerHomes">
        <div id="formerHome1">
            <h3>Former Residence #1</h3><br/>
            Type Of Residence:<select name="type">
                <option>
                    Rented
                </option>
                <option>
                    Owned
                </option>
                <option>
                    Family Friend
                </option>
            </select>
            Address:<input type="text" name="address1">
            City:<input type="text" name="city1">
            State:<input type="text" name="state1">
            Zip Code:<input type="text" name="zipCode1">
            Landlords Name:<input type="text" name="landlordsName1">
            Phone Number:<input type="text" name="phoneNumber1">
            Reason For Leaving:<input type="text" name="reasonForLeaving1">
            Rent:<input type="text" name="rent1">
            Mortgage:<input type="text" name="mortgage1">
            
        </div>
    </div>
    <font class="button" id="addFormerHome">Add another home</font>
    <font class="button"  id="removeFormerHome">Remove home</font><br/><br/>
    <h3>Personal History</h3>
    <?php
    radioGroup(array("Yes","No"), array("Y","N"), "felony", "Have you ever been convicted of a felony?");
    newLine();
    radioGroup(array("Yes","No"), array("Y","N"), "bankrupcy", "Have you ever declared bancrupcy");
    newLine();
    radioGroup(array("Yes","No"), array("Y","N"), "evicted", "Have you ever been evicted?");
    newLine();
    createTextBoxField("40", "1", "explain", "If yes, please explain.");
    ?>
    <h3>Credit History</h3>
    <?php
    createTextField("debitCarDebt", "$", "Total outstanding balance on consumer debt (credit cards, charge accounts, etc.) ", "100px");
    createTextField("loans", "$", "Total outstanding balance on loans (auto, education, mortgage, etc.)", "100px");
    createTextField("monthlyPayments", "$", "Total monthly payment on all credit/loan accounts", "100px");
    createTextField("assets", "$", "Approximate total assets (cash, investments, property equity, etc.)", "100px");
    ?>
    <br/>
    <button type="submit" class="button">Save and Continue</button>
    <button type="reset" class="button">Clear</button>
</form>
</div>
<?php
    include 'Footer.php';
?>
