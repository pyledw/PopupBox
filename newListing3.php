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
    <h1 class="Title">New House Listing - Action Details</h1>
    <hr class="Title">
    <div id="mainContent">
        <form id="listingForm" method="post" action="newListing3Redirect.php">
            <table class="tableForm">
                <font class="formheader">Dates</font>
                <tr>
                    <td>
                        <label class="label">Date the property will first be available for occupancy:</label><br/><input type="text" name="available" class="required" id="datepicker1" value="<?php echo $row[DateAvailable]?>" />
                    </td>
                    <td>
                        <label class="label">Date you will begin accepting PFOs:</label><br/><input type="text" name="acceptingPFO" id="datepicker2" class="required" value="<?php echo $row[DatePFOAccept]?>" />
                    </td>
                    <td>
                        <label class="label">Date you will stop accepting PFOs:</label><br/><input type="text" name="stopAcceptingPFO" id="datepicker3" class="required" value="<?php echo $row[DatePFOEndAccept]?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Date and times of 1st Open House:</label><br/><input type="text" name="openHouse1" id="datepicker4" class="required" value="<?php echo $row[DateTimeOpenHouse1]?>" />
                    </td>
                    <td>
                        <label class="label">Date and times of 2nd Open House:</label><br/><input type="text" name="openHouse2" id="datepicker5" value="<?php echo $row[DateTimeOpenHouse2]?>" />
                    </td>
                    <td>
                        
                    </td>    
                        
                </tr>
                <tr>
                    <td>
                        <label class="label">Starting Bid Monthly Rental Rate:</label><br/><input type="text" name="startingBid" class="required" value="<?php echo $row[StartingBid]?>"/>
                    </td>
                    <td>
                        <label class="label">Minimum Bid Increment:</label><br/><input type="text" name="bidIncrement" class="required" value="<?php echo $row[MinBidIncrement]?>"/>
                    </td>
                    <td>
                        <label class="label">Required Deposit:</label><br/><input type="text" name="requiredDeposit" class="required" value="<?php echo $row[RequiredDeposit]?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Rent-it-Now Monthly Rental Rate:</label><br/><input type="text" name="rentItNowRate" value="<?php echo $row[RentNowRate]?>"/>
                    </td>
                    <td>
                        <label class="label">Minimum rental term, months:</label><br/><input type="text" name="minTerm" class="required" value="<?php echo $row[MinimumTerm]?>"/>
                    </td>
                    <td>
                        <label class="label">Do you want to Pre-Market?</label><br/>
                         Yes<input type="radio" name="comingSoon"  value="1" <?php if($row[PreMarket] == '1'){echo "checked='checked'";}?> />
                         No<input type="radio" name="comingSoon"checked='checked'  value="0" <?php if($row[PreMarket] != '1'){echo "checked='checked'";}?> />
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> 
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

<script>
    $(function() {
        $( "#datepicker1" ).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
        
        
    });
    $(function() {
        $( "#datepicker2" ).datetimepicker({
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd',
            showMinute: 'false',
            minDate: 0
            
            
        });
        
    });
    $(function() {
        $( "#datepicker3" ).datetimepicker({
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd',
            showMinute: 'false',
            minDate: 0
        });
        
    });
    $(function() {
        $( "#datepicker4" ).datetimepicker({
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd',
            showMinute: 'false',
            minDate: 0
        });
        
    });
    $(function() {
        $( "#datepicker5" ).datetimepicker({
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd',
            showMinute: 'false',
            minDate: 0
        });
        
    });
    
    $(document).ready(function(){
    $("#listingForm").validate({
        ignoreTitle: true,
        onkeyup: false,
        onclick: false
        
    });
  });
</script>
