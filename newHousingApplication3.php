<?php
    $title = "New Application #3";
    include 'Header.php';
    include "formElements.php";
    ?>
<h1 class="Title">Application Page #3</h1>
<hr class="Title">

<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication4.php">
        <div id="formerHomes">
            <div class="formElement" id="formerHome1">
                
                <h3>Former Residence #1</h3><br/>
                Type Of Residence:<select id="select" name="type">
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

