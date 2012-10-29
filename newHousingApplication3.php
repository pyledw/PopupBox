<?php
    $title = "New Application #3";
    include 'Header.php';
    include "formElements.php";
    
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn();
        //Getting the users applicaiton data
        $result1 = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        
        //casting the query data into a variable
        $row = mysql_fetch_array($result1);
        
        //second query getting all the previous residences of the applicaiton
        $result = mysql_query("SELECT * FROM PREVIOUSRESIDENCE
            WHERE ApplicationID = $row[ApplicationID] ");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        
        
    
    ?>

<!-- Main content will load with exiting elements being pre filled into the form
     Various testing methods are used to ensure that the display will be identical to the users 
     previous input if the user has already completed this page-->
<h1 class="Title">Application Page #3</h1>
<hr class="Title">

<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication3Redirect.php">
        <div id="formerHomes">
            
            <?php
            if(mysql_num_rows($result) > 0)
            {
                $intCount=1;
                while($row = mysql_fetch_array($result))
                    {
                       echo '<div class="formElement" id="formerHome'.$intCount.'">              
                    <h3>Former Residence</h3><br/>
                    Type Of Residence:<select id="select" name="type'.$intCount.'">
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
                    Address:<input type="text" name="address'.$intCount.'" value="'.$row[PrevStreetAddress].'"/>
                    City:<input type="text" name="city'.$intCount.'" value="'.$row[PrevCity].'" />
                    State:<input type="text" name="state'.$intCount.'" value="'.$row[PrevState].'"/>
                    Zip Code:<input  type="text" name="zipCode'.$intCount.'" value="'.$row[PrevZip].'"/>
                    months lived there:<input  type="text" name="months'.$intCount.'" value="'.$row[TotalMonths].'"/>
                    <div id="renter">
                    Landlords First Name:<input type="text" name="landlordsFName'.$intCount.'" value="'.$row[PrevLandLordFName].'"/>
                    Landlords Last Name:<input type="text" name="landlordsLName'.$intCount.'" value="'.$row[PrevLandLordLName].'"/>
                    Phone Number:<input type="text" name="phoneNumber'.$intCount.'" value="'.$row[PrevPhone].'"/>
                    Reason For Leaving:<input type="text" name="reasonForLeaving'.$intCount.'" value="'.$row[ReasonForLeaving].'"/>
                    Rent:<input type="text" name="rent'.$intCount.'" value="'.$row[PrevMonthlyRent].'"/>
                    </div>
                    <div id="owner">
                    Mortgage:<input type="text" name="mortgage'.$intCount.'" value="'.$row[PrevStreetAddress].'"/>
                    </div>
                    <input id="number" type="text" name="number'.$intCount.'" style="display: block; visibility: hidden" value="'.$row[PrevResidenceID].'" />

                </div>';
                       $intCount += 1;
                    }
                    while($intCount <= 4)
                    {
                        echo '
                <div class="formElement" id="formerHome'.$intCount.'">              
                        <h3> New Former Residence</h3><br/>
                        Type Of Residence:<select id="select" name="type'.$intCount.'">
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
                        Address:<input type="text" name="address'.$intCount.'"/>
                        City:<input type="text" name="city'.$intCount.'" />
                        State:<input type="text" name="state'.$intCount.'"/>
                        Zip Code:<input  type="text" name="zipCode'.$intCount.'"/>
                        months lived there:<input  type="text" name="months'.$intCount.'"/>
                    <div id="renter">
                        Landlords First Name:<input type="text" name="landlordsFName'.$intCount.'" />
                        Landlords Last Name:<input type="text" name="landlordsLName'.$intCount.'"/>
                        Phone Number:<input type="text" name="phoneNumber'.$intCount.'"/>
                        Reason For Leaving:<input type="text" name="reasonForLeaving'.$intCount.'"/>
                        Rent:<input type="text" name="rent'.$intCount.'"/>
                    </div>
                    <div id="owner">
                        Mortgage:<input type="text" name="mortgage'.$intCount.'"/>
                    </div>
                </div>
                    <input id="number" type="text" name="number'.$intCount.'" style="display: block; visibility: hidden" value="" />';
                        $intCount += 1;
                    }
            }
            else
            {
                echo '<div class="formElement" id="formerHome1">              
                <h3>New Former Residence</h3><br/>
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
                Address:<input type="text" name="address1"/>
                City:<input type="text" name="city1" />
                State:<input type="text" name="state1"/>
                Zip Code:<input  type="text" name="zipCode1"/>
                months lived there:<input  type="text" name="months1"/>
                <div id="renter">
                Landlords First Name:<input type="text" name="landlordsFName1" />
                Landlords Last Name:<input type="text" name="landlordsLName1"/>
                Phone Number:<input type="text" name="phoneNumber1"/>
                Reason For Leaving:<input type="text" name="reasonForLeaving1"/>
                Rent:<input type="text" name="rent1"/>
                </div>
                <div id="owner">
                Mortgage:<input type="text" name="mortgage1"/>
                </div>
            </div>
            <div class="formElement" id="formerHome2" style="display:none;">
                
                <h3>Former Residence #2</h3><br/>
                Type Of Residence:<select id="select" name="type2">
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
                Address:<input type="text" name="address2"/>
                City:<input type="text" name="city2"/>
                State:<input type="text" name="state2"/>
                Zip Code:<input  type="text" name="zipCode2"/>
                months lived there:<input  type="text" name="months2"/>
                <div id="renter2">
                Landlords First Name:<input type="text" name="landlordsFName2"/>
                Landlords Last Name:<input type="text" name="landlordsLName2"/>
                Phone Number:<input type="text" name="phoneNumber2"/>
                Reason For Leaving:<input type="text" name="reasonForLeaving2"/>
                Rent:<input type="text" name="rent2"/>
                </div>
                <div id="owner2">
                Mortgage:<input type="text" name="mortgage2"/>
                </div>
                
            </div>
            <div class="formElement" id="formerHome3">
                
                <h3>Former Residence #3</h3><br/>
                Type Of Residence:<select id="select" name="type3">
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
                Address:<input type="text" name="address3" />
                City:<input type="text" name="city3" />
                State:<input type="text" name="state3"/>
                Zip Code:<input  type="text" name="zipCode3" />
                months lived there:<input  type="text" name="months3" />
                <div id="renter3">
                Landlords First Name:<input type="text" name="landlordsFName3" />
                Landlords Last Name:<input type="text" name="landlordsLName3" />
                Phone Number:<input type="text" name="phoneNumber3" />
                Reason For Leaving:<input type="text" name="reasonForLeaving3" />
                Rent:<input type="text" name="rent3" />
                </div>
                <div id="owner3">
                Mortgage:<input type="text" name="mortgage3" />
                </div>

            </div>
            <div class="formElement" id="formerHome4" style="display:none;">
                
                <h3>Former Residence #4</h3><br/>
                Type Of Residence:<select id="select" name="type4">
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
                Address:<input type="text" name="address4" />
                City:<input type="text" name="city4" />
                State:<input type="text" name="state4" />
                Zip Code:<input  type="text" name="zipCode4" />
                months lived there:<input  type="text" name="months4" />
                <div id="renter4">
                Landlords First Name:<input type="text" name="landlordsFName4" />
                Landlords Last Name:<input type="text" name="landlordsLName4" />
                Phone Number:<input type="text" name="phoneNumber4" />
                Reason For Leaving:<input type="text" name="reasonForLeaving4" />
                Rent:<input type="text" name="rent4" />
                </div>
                <div id="owner4">
                Mortgage:<input type="text" name="mortgage4" />
                </div>

            </div>
        </div>
        <font class="button" id="addFormerHome">Add another home</font>
        <font class="button"  id="removeFormerHome">Remove home</font><br/><br/>';
            }
            
        //Creating a new query in order to get the applicaiton data
        $result1 = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        
        //Recasting the query data into $row
        $row = mysql_fetch_array($result1);
            ?>

        
        <h3>Personal History</h3>
        
        Have you ever been convicted of a felony?
        Yes<input type="radio" name="felony"  value="Y" <?php if($row[HasCrimHist] == 'Y'){echo "checked='checked'";} ?>/>
        No<input type="radio" name="felony" <?php if($row[HasCrimHist] == 'N'){echo "checked='checked'";}?>  value="N" /><br/>
        Have you ever been evicted?
        Yes<input type="radio" name="evicted" <?php if($row[HasEvictHist] == 'Y'){echo "checked='checked'";}?>  value="Y" />
        No<input type="radio" name="evicted" <?php if($row[HasEvictHist] == 'N'){echo "checked='checked'";}?>  value="N" /><br/>
        Have you ever declared bankruptcy?
        Yes<input type="radio" name="bankruptcy" <?php if($row[HasBankruptHist] == 'Y'){echo "checked='checked'";}?> value="Y" />
        No<input type="radio" name="bankruptcy" <?php if($row[HadBankruptHist] == 'N'){echo "checked='checked'";}?>  value="N" /><br/>
        
        If yes, Explain: <textarea cols="50" rows="4" name="ifYes"></textarea>
        

        <h3>Credit History</h3>
        Total outstanding balance on consumer debt (credit cards, charge accounts, etc.): <input type="text" name="devitCardDebt" <?php echo "value='" .$row[TotalConsumerDebt] . "'"?>/><br/>
        Total monthly payment on all credit/loan accounts: <input type="text" name="monthlyPayments" <?php echo "value='" .$row[MonthlyDebtPayment] . "'"?>/><br/>
        Total outstanding balance on loans (auto, education, mortgage, etc.)<input type="text" name="loans" <?php echo "value='" .$row[TotalLoanDebt] . "'"?>/><br/>
        Approximate total assets (cash, investments, property equity, etc.): <input type="text" name="equity" <?php echo "value='" .$row[TotalAssets] . "'"?>/><br/>
        
        <br/>
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    </form>
</div>
</div>
<?php
    include 'Footer.php';
?>

<!--The script below manages the dynamic data on the page -->
<script>
var val1 = 1;
$(document).ready(function(){
  $("#addFormerHome").click(function(){
      if(val1 < 4)
          {
            val1 +=1 ;
            $('#formerHome' + val1).show();
          }
      else{
          alert("You have reached the maximum number of former homes");
      }
  });
  $("#removeFormerHome").click(function(){
      if(val1 > 1)
          {
            $('#formerHome' + val1).hide();
            val1 -= 1;
          }
      else
      {
        alert("Must fill in at least one former Home");
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

