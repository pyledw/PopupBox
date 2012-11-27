 <?php
    $title = "New Application #3";
    include 'Header.php';
    
    /**
     * This page will allow the user to enter new information or edit old information about thier application.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * 
     * At the end of the page it check to see that if the applicaiton was not complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    
    if(!isset($_SESSION['userID']))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");
        //Getting the users applicaiton data
        $result1 = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='".$_SESSION['userID']."'");
        
        if(!$result1)
        {
            die('could not connect: ' .mysql_error());
        }
        
        
        //casting the query data into a variable
        $row = mysql_fetch_array($result1);
        
        //second query getting all the previous residences of the applicaiton
        $result = mysql_query("SELECT * FROM PREVIOUSRESIDENCE
            WHERE ApplicationID ='".$row['ApplicationID']."'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        
    ?>

<div id="mainContent">
    <form id="newApplicationForm" method="post" action="newHousingApplication3Redirect.php">
            <table class="tableForm" width="1000px">
                <font class="formheader" style="left:400px;">Residence History</font>
                <?php
                if(mysql_num_rows($result) > 0)
                {
                    $intCount=1;
                    while($row = mysql_fetch_array($result))
                    {
                        echo '<tr>
                            <th colspan="3">
                                 Former Residence
                            </th>
                                </tr>
                                    <tr>
                            <td>
                                <label class="label">Type Of Residence: </label><br/><select id="select" name="type'.$intCount.'">
                            <option';
                            
                            if($row['TypeOfResidence'] == "Owned")
                            {
                            echo ' selected="selected"'; 
                            
                            }
                            echo '>
                                Owned
                            </option>
                            <option ';
                            
                            if($row['TypeOfResidence'] == "Rented")
                            {
                            echo ' selected="selected"'; 
                            
                            }
                            echo '>
                                Rented
                            </option>
                            <option ';
                            
                            if($row['TypeOfResidence'] == "Family Friend")
                            {
                            echo ' selected="selected"'; 
                            
                            }
                            echo '>
                                Family Friend
                            </option>
                        </select>
                            </td>
                            <td>
                               <label class="label">Address: </label><br/><input type="text" name="address'.$intCount.'" value="'.$row['PrevStreetAddress'].'"/>
                            </td>
                            <td>
                                <label class="label">City: </label><br/><input type="text" name="city'.$intCount.'" value="'.$row['PrevCity'].'"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label">State: </label><br/><input type="text" maxlength="2" minlength="2" name="state'.$intCount.'" value="'.$row['PrevState'].'"/>
                            </td>
                            <td>
                                <label class="label">Zip Code: </label><br/><input title="Enter valid Zip Code" class="number" minlength="5" maxlength="5" type="text" name="zipCode'.$intCount.'" value="'.$row['PrevZip'].'"/>
                            </td>
                            <td>
                                <label class="label">months lived there:</label><br/><input class="number" maxlength="3" type="text" name="months2" value="'.$row['PrevLandLordFName'].'"/>
                            </td>     
                        </tr>
                        <tr>
                            <td>
                                <label class="label">Landlords First Name:</label><br/><input type="text" name="landlordsFName'.$intCount.'" value="'.$row['PrevLandLordLName'].'" />
                            </td>
                            <td>
                                <label class="label">Landlords Last Name:</label><br/><input type="text" name="landlordsLName'.$intCount.'" value="'.$row['PrevLandLordLName'].'" />
                            </td>
                            <td>
                                <label class="label">Phone Number:</label><br/><input id="phone" type="text" name="phoneNumber'.$intCount.'" value="'.$row['PrevPhone'].'" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label class="label">Reason For Leaving:</label><br/><input type="text" name="reasonForLeaving'.$intCount.'" value="'.$row['ReasonForLeaving'].'" />
                            </td>
                            <td>
                                <label class="label">Rent:</label><br/><input class="number" type="text" name="rent'.$intCount.'" value="'.$row['PrevMonthlyRent'].'" />
                            </td>
                            <td>
                                <input id="number" type="text" name="number'.$intCount.'" style="display: block; visibility: hidden" value="'.$row['PrevResidenceID'].'" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr/>
                            </td>
                        </tr>';
                        $intCount += 1;
                    }
                    while($intCount < 4)
                    {
                        echo '<tr>
                            <th colspan="3">
                                 Former Residence
                            </th>
                                </tr>
                                    <tr>
                            <td>
                                <label class="label">Type Of Residence:</label><br/><select id="select" name="type'.$intCount.'">
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
                            </td>
                            <td>
                               <label class="label">Address:</label><br/><input type="text" name="address'.$intCount.'" value="'.$row['PrevStreetAddress'].'"/>
                            </td>
                            <td>
                                <label class="label">City:</label><br/><input type="text" name="city'.$intCount.'" value="'.$row['PrevCity'].'"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label">State:</label><br/><input type="text" maxlength="2" minlength="2" name="state'.$intCount.'" value="'.$row['PrevState'].'"/>
                            </td>
                            <td>
                                <label class="label">Zip Code:</label><br/><input title="Enter valid Zip Code" class="number" minlength="5" maxlength="5" type="text" name="zipCode'.$intCount.'" value="'.$row['PrevZip'].'"/>
                            </td>
                            <td>
                                <label class="label">months lived there:</label><br/><input class="number" type="text" name="months2" value="'.$row['PrevLandLordFName'].'"/>
                            </td>     
                        </tr>
                        <tr>
                            <td>
                                <label class="label">Landlords First Name:</label><br/><input type="text" name="landlordsFName'.$intCount.'" value="'.$row['PrevLandLordLName'].'"/>
                            </td>
                            <td>
                                <label class="label">Landlords Last Name:</label><br/><input type="text" name="landlordsLName'.$intCount.'" value="'.$row['PrevLandLordLName'].'"/>
                            </td>
                            <td>
                                <label class="label">Phone Number:</label><br/><input id="phone" type="text" name="phoneNumber'.$intCount.'" value="'.$row['PrevPhone'].'"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label">Reason For Leaving:</label><br/><input type="text" name="reasonForLeaving'.$intCount.'" value="'.$row['ReasonForLeaving'].'"/>
                            </td>
                            <td>
                                <label class="label">Rent:</label><br/><input type="text" class="number" name="rent'.$intCount.'" value="'.$row['PrevMonthlyRent'].'"/>
                            </td>
                            <td>
                                <input id="number" type="text" name="number'.$intCount.'" style="display: block; visibility: hidden" value="'.$row['PrevResidenceID'].'" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr/>
                            </td>
                        </tr>';
                        $intCount += 1;
                    }
                }
                else
                {
                   echo '<tr>
                    <th colspan="3">
                        Former Residence
                    </th>
                </tr>
                <tr>
                    <td>
                        <label class="label">Type Of Residence:</label><br/><select id="select" name="type1">
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
                    </td>
                    <td>
                       <label class="label">Address:</label><br/><input type="text" name="address1"/>
                    </td>
                    <td>
                        <label class="label">City:</label><br/><input type="text" name="city1" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">State:</label><br/><input maxlength="2" minlength="2" type="text" name="state1"/>
                    </td>
                    <td>
                        <label class="label">Zip Code:</label><br/><input title="Enter valid Zip Code" class="number" minlength="5" maxlength="5" type="text" name="zipCode1"/>
                    </td>
                    <td>
                        <label class="label">months lived there:</label><br/><input class="number" maxlength="3" type="text" name="months1"/>
                    </td>     
                </tr>
                <tr>
                    <td>
                        <label class="label">Landlords First Name:</label><br/><input type="text" name="landlordsFName1" />
                    </td>
                    <td>
                        <label class="label">Landlords Last Name:</label><br/><input type="text" name="landlordsLName1"/>
                    </td>
                    <td>
                        <label class="label">Phone Number:</label><br/><input id="phone" type="text" name="phoneNumber1" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Reason For Leaving:</label><br/><input type="text" name="reasonForLeaving1"/>
                    </td>
                    <td>
                        <label class="label">Rent:</label><br/><input class="number" type="text" name="rent1"/>
                    </td>
                    <td>
                        <input id="number" type="text" name="number1" style="display: block; visibility: hidden" value="" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Former Residence 2
                    </th>
                </tr>
                <tr>
                    <td>
                        <label class="label">Type Of Residence:</label><br/><select id="select" name="type2">
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
                    </td>
                    <td>
                       <label class="label">Address:</label><br/><input type="text" name="address2"/>
                    </td>
                    <td>
                       <label class="label">City:</label><br/><input type="text" name="city2" />
                    </td>
                </tr>
                <tr>
                    <td>
                       <label class="label">State:</label><br/><input maxlength="2" minlength="2" type="text" name="state2"/>
                    </td>
                    <td>
                       <label class="label">Zip Code:</label><br/><input title="Enter valid Zip Code" class="number" minlength="5" maxlength="5" type="text" name="zipCode2"/>
                    </td>
                    <td>
                       <label class="label">months lived there:</label><br/><input class="number" type="text" name="months2"/>
                    </td>     
                </tr>
                <tr>
                    <td>
                        <label class="label">Landlords First Name:</label><br/><input type="text" name="landlordsFName2" />
                    </td>
                    <td>
                        <label class="label">Landlords Last Name:</label><br/><input type="text" name="landlordsLName2"/>
                    </td>
                    <td>
                        <label class="label">Phone Number:</label><br/><input id="phone" type="text" name="phoneNumber2"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Reason For Leaving:</label><br/><input type="text" name="reasonForLeaving2"/>
                    </td>
                    <td>
                        <label class="label">Rent:</label><br/><input class="number" type="text" name="rent2"/>
                    </td>
                    <td>
                        <input id="number" type="text" name="number2" style="display: block; visibility: hidden" value="" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        Former Residence 3
                    </th>
                </tr>
                <tr>
                    <td>
                        <label class="label">Type Of Residence:</label><br/><select id="select" name="type3">
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
                    </td>
                    <td>
                       <label class="label">Address:</label><br/><input type="text" name="address3"/>
                    </td>
                    <td>
                        <label class="label">City:</label><br/><input type="text" name="city3" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">State:</label><br/><input maxlength="2" minlength="2" type="text" name="state3"/>
                    </td>
                    <td>
                        <label class="label">Zip Code:</label><br/><input title="Enter valid Zip Code" class="number" minlength="5" maxlength="5" type="text" name="zipCode3"/>
                    </td>
                    <td>
                        <label class="label">months lived there:</label><br/><input class="number" type="text" name="months3"/>
                    </td>     
                </tr>
                <tr>
                    <td>
                        <label class="label">Landlords First Name:</label><br/><input type="text" name="landlordsFName3" />
                    </td>
                    <td>
                        <label class="label">Landlords Last Name:</label><br/><input type="text" name="landlordsLName3"/>
                    </td>
                    <td>
                        <label class="label">Phone Number:</label><br/><input id="phone" class="phone" type="text" name="phoneNumber3"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Reason For Leaving:</label><br/><input type="text" name="reasonForLeaving3"/>
                    </td>
                    <td>
                        <label class="label">Rent:</label><br/><input class="number" type="text" name="rent3"/>
                    </td>
                    <td>
                        <input id="number" type="text" name="number3" style="display: block; visibility: hidden" value="" />
                    </td>
                </tr>'; 
                }
                
                $result1 = mysql_query("SELECT * FROM APPLICATION
                WHERE UserID ='" . $_SESSION['userID'] . "'");
        
                //casting the query data into a variable
                $row = mysql_fetch_array($result1);
                ?>
                
                <tr>
                    <td colspan="3">
                        <h3>Personal History</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Have you ever been convicted of a felony?</label><br/>
                        
                        Yes<input type="radio" name="felony"  value="1" <?php if($row['HasCrimHist'] == '1'){echo "checked='checked'";} ?> />
                        No<input type="radio" name="felony" value="0" <?php if($row['HasCrimHist'] != '1'){echo "checked='checked'";}  ?><br/>
                    </td>
                    <td>
                        <label class="label">Explain:</label><br/>
                        <textarea cols="50" rows="4" name="ifYesFelony"><?php echo $row['CrimHistDesc'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Have you ever been evicted?</label><br/>
                        Yes<input type="radio" name="evicted" <?php if($row['HasEvictHist'] == '1'){echo "checked='checked'";}?>  value="1" />
                        No<input type="radio" name="evicted" <?php if($row['HasEvictHist'] != '1'){echo "checked='checked'";}?>  value="0" />
                    </td>
                    <td>
                        <label class="label">Explain:</label><br/>
                        <textarea cols="50" rows="4" name="ifYesEvicted"><?php echo $row['EvictHistDescription'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Have you ever declared bankruptcy?</label><br/>
                        Yes<input type="radio" name="bankruptcy" <?php if($row['HasBankruptHist'] == '1'){echo "checked='checked'";}?> value="1" />
                        No<input type="radio" name="bankruptcy" <?php if($row['HasBankruptHist'] != '1'){echo "checked='checked'";}?>  value="0" />
                    </td>
                    <td>
                        <label class="label">Explain:</label><br/>
                        <textarea cols="50" rows="4" name="ifYesBankruptcy"><?php echo $row['BankruptHistDesc'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <h3>Credit History</h3>
                    </th>
                </tr>
                <tr>
                    <td>
                        <label class="label">Total outstanding balance on consumer debt (credit cards, charge accounts, etc.): </label><br/><input class="number" type="text" name="devitCardDebt" <?php echo "value='" .$row['TotalConsumerDebt'] . "'"?>/>
                    </td>
                    <td>
                        <label class="label">Total monthly payment on all credit/loan accounts: </label><br/><input class="number" type="text" name="monthlyPayments" <?php echo "value='" .$row['MonthlyDebtPayment'] . "'"?>/><br/>
                    </td>
                    <td>
                        <label class="label">Total outstanding balance on loans (auto, education, mortgage, etc.)</label><br/><input class="number" type="text" name="loans" <?php echo "value='" .$row['TotalLoanDebt'] . "'"?>/><br/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Approximate total assets (cash, investments, property equity, etc.): </label><br/><input class="number" type="text" name="equity" <?php echo "value='" .$row['TotalAssets'] . "'"?>/><br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a class="button" href="newHousingApplication2.php">Back</a>
                        <a class="button" href="myHood.php">Exit without saving</a>
                        <button type="submit" class="button">Save and Continue</button>
                    </td>        
                </tr>
             <tr>
                <td style="text-align: center;" colspan="3">
                    Page 3 of 5
                </td>
             </tr>
                
            </table>
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

$(document).ready(function(){
      jQuery.validator.addMethod("phoneUS", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
	return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "Please specify a valid phone number");

    
    $("#newApplicationForm").validate({
        onkeyup: false,
        onclick: false,
        
        rules: {
            phoneNumber1: {
            phoneUS: true
            },   
            phoneNumber2: {
            phoneUS: true
            },   
            phoneNumber3: {
            phoneUS: true
            }   
        }
        
    });
  });
   
</script>