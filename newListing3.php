<?php
    $title = "New Listing Part 3";
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
    $connectionInfo = get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE PropertyID ='$propertyID'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    
    $row = mysql_fetch_array($result);
    
?>
    <h1 class="Title">New House Listing - Action Details</h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" method="post" action="newListing3Redirect.php">
          
            Date the property will first be available for occupancy:<input type="text" name="available" id="datepicker1" value="<?php echo $row[DateAvailable]?>" />
            Date you will begin accepting PFOs<input type="text" name="acceptingPFO" id="datepicker2" value="<?php echo $row[DatePFOAccept]?>" />
            Date you will stop accepting PFOs<input type="text" name="stopAcceptingPFO" id="datepicker3" value="<?php echo $row[DatePFOEndAccept]?>" />
            Date and times of 1st Open House<input type="text" name="openHouse1" id="datepicker4" value="<?php echo $row[DateTimeOpenHouse1]?>" />
            Date and times of 2nd Open House<input type="text" name="openHouse2" id="datepicker5" value="<?php echo $row[DateTimeOpenHouse2]?>" />
            Starting Bid Monthly Rental Rate<input type="text" name="startingBid" value="<?php echo $row[StartingBid]?>"/>
            Minimum Bid Increment<input type="text" name="bidIncrement" value="<?php echo $row[MinBidIncrement]?>"/>
            Required Deposit<input type="text" name="requiredDeposit" value="<?php echo $row[RequiredDeposit]?>"/>
            Rent-it-Now Monthly Rental Rate<input type="text" name="rentItNowRate" value="<?php echo $row[RentNowRate]?>"/>
            Minimum rental term, months<input type="text" name="minTerm" value="<?php echo $row[MinimumTerm]?>"/>
            
            Do you want to market this property as “Coming Soon?”  You have 8 days until your listing will "go live."
            Yes<input type="radio" name="comingSoon"  value="1" <?php if($row[PreMarket] == '1'){echo "checked='checked'";}?> />
            No<input type="radio" name="comingSoon"checked='checked'  value="0" <?php if($row[PreMarket] == '0'){echo "checked='checked'";}?> /><br/>

            <button type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>
  
        </form>
    </div>
<?php
    include 'Footer.php';
?>

<script>
    $(function() {
        $( "#datepicker1" ).datepicker();
    });
    $(function() {
        $( "#datepicker2" ).datepicker();
    });
    $(function() {
        $( "#datepicker3" ).datepicker();
    });
    $(function() {
        $( "#datepicker4" ).datepicker();
    });
    $(function() {
        $( "#datepicker5" ).datepicker();
    });
</script>