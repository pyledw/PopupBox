<?php
    $title = "New Listing #4";
    include 'Header.php';
    
    
    /**
     * First Check is to ensur ethe user is logged in, and get the data of the correct user and property listing.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * 
     * At the end of the page it check to see that if the Property was complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    
     //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION['userID']))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    if(isset($_SESSION['propertyID']))
    {
        $propertyID = $_SESSION['propertyID'];
    }
    else if(isset ($_POST['propertyID']))
    {
        $propertyID = $_POST['propertyID'];
        $_SESSION['propertyID'] = $propertyID;
    }
    else
    {
        header( 'Location: /myHood.php' );
    }
    
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE PropertyID ='$propertyID'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    
    $row = mysql_fetch_array($result);
    
?>
    <div id="mainContent">
        <form class="listingForm" width="90%" height="90%" method="post" action="newListing4Redirect.php">
            <table class="tableForm">
                <font class="formheader">Resident Requirements</font>
                <tr>
                    <td>
                        <label class="label">Will you allow a resident(s) with a criminal history?</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="criminalHistory"  value="1" <?php if($row['AllowCriminalHistory'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="criminalHistory"  value="0" <?php if($row['AllowCriminalHistory'] != '1'){echo "checked='checked'";}?>/>
                    </td>
                    <td>
                        <label class="label">Will you allow only residents with a minimum salary?</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="minSalary"  value="1" <?php if($row['MinimumSalary'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="minSalary"  value="0"<?php if($row['MinimumSalary'] != '1'){echo "checked='checked'";}?> />
                    </td>
                    <td>
                        <label class="label">Will you allow only non-smoking residents?</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="smoking"  value="1" <?php if($row['AllowSmoking'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="smoking"  value="0" <?php if($row['AllowSmoking'] != '1'){echo "checked='checked'";}?>/>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <label class="label">Will you allow cats?</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="cats"  value="1" <?php if($row['AllowCats'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="cats"  value="0" <?php if($row['AllowCats'] != '1'){echo "checked='checked'";}?>/>
                    </td>
                    <td>
                        <label class="label">Will you allow dogs?</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="dogs"  value="1" <?php if($row['AllowDogs'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="dogs"  value="0" <?php if($row['AllowDogs'] != '1'){echo "checked='checked'";}?>/>
                    </td>
                    <td>
                        <label class="label">Required Pet Deposit</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="petdeposit"  value="1" <?php if($row['PetDepost'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="petdeposit"  value="0" <?php if($row['PetDepost'] != '1'){echo "checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <label class="label">Is Pet Deposit Refundable?</label><br/>&nbsp;&nbsp;&nbsp;&nbsp;
                        Yes<input type="radio" name="petDepositRefundable"  value="1" <?php if($row['AllowPetDepositRefund'] == '1'){echo "checked='checked'";}?>/>
                        No<input type="radio" name="petDepositRefundable"  value="0" <?php if($row['AllowPetDepositRefund'] != '1'){echo "checked='checked'";}?>/>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a class="button" href="newListing3.php">Back</a>
                        <button type="submit" class="button">Save and Continue</button>
                        <button type="reset" class="button">Clear</button>
                    </td>
                </tr>
            </table>

  
        </form>
    </div>
<?php
    include 'Footer.php';
?>
