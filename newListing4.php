<?php
    $title = "New Listing Part 4";
    include 'Header.php';
    
     //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    if(isset($_SESSION[propertyID]))
    {
        $propertyID = $_SESSION[propertyID];
    }
    else if(isset ($_POST[propertyID]))
    {
        $propertyID = $_POST[propertyID];
        $_SESSION[propertyID] = $propertyID;
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
    <h1 class="Title">New House Listing - Applicant Screening Restrictions  </h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing4Redirect.php">
          
            Will you allow a resident(s) with a criminal history?
            Yes<input type="radio" name="criminalHistory"  value="1" <?php if($row[AllowCriminalHistory] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="criminalHistory"  value="0" <?php if($row[AllowCriminalHistory] == '0'){echo "checked='checked'";}?>/><br/>
            Will you allow only residents with a minimum salary?
            Yes<input type="radio" name="minSalary"  value="1" <?php if($row[MinimumSalary] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="minSalary"  value="0"<?php if($row[MinimumSalary] == '0'){echo "checked='checked'";}?> /><br/>
            Will you allow only non-smoking residents?
            Yes<input type="radio" name="smoking"  value="1" <?php if($row[AllowSmoking] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="smoking"  value="0" <?php if($row[AllowSmoking] == '0'){echo "checked='checked'";}?>/><br/>
            Will you allow an applicant with a slightly different move-in date availability to submit a PFO?  If so, please specifiy:
            Yes<input type="radio" name="moveInDate"  value="1" <?php if($row[PreMarket] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="moveInDate"  value="0" <?php if($row[PreMarket] == '0'){echo "checked='checked'";}?>/><br/>
            Would you like to limit the number of occupants in your property?
            Yes<input type="radio" name="numberOfOccupants"  value="1" <?php if($row[PreMarket] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="numberOfOccupants"  value="0" <?php if($row[PreMarket] == '0'){echo "checked='checked'";}?>/><br/>
            Will you allow cats?
            Yes<input type="radio" name="cats"  value="1" <?php if($row[AllowCats] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="cats"  value="0" <?php if($row[AllowCats] == '0'){echo "checked='checked'";}?>/><br/>
            Will you allow dogs?
            Yes<input type="radio" name="dogs"  value="1" <?php if($row[AllowDogs] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="dogs"  value="0" <?php if($row[AllowDogs] == '0'){echo "checked='checked'";}?>/><br/>
            Required Pet Deposit
            Yes<input type="radio" name="petdeposit"  value="1" <?php if($row[PetDepost] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="petdeposit"  value="0" <?php if($row[PetDepost] == '0'){echo "checked='checked'";}?>/><br/>
            Is Pet Deposit Refundable?
            Yes<input type="radio" name="petDepositrefundable"  value="1" <?php if($row[AllowPetDepositRefund] == '1'){echo "checked='checked'";}?>/>
            No<input type="radio" name="petDepositRefundable"  value="0" <?php if($row[AllowPetDepositRefund] == '0'){echo "checked='checked'";}?>/><br/>
            Prohibited breeds<input type="text" name="prohibitedBreeds" value="<?php echo $row[ProhibitedBreeds]?>"/>

            <button type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>
  
        </form>
    </div>
<?php
    include 'Footer.php';
?>
