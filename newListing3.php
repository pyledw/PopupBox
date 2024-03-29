<?php
    $title = "New Listing #3";
    include 'Header.php';
    /**
     * First Check is to ensur ethe user is logged in, and get the data of the correct user and property listing.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * At the end of the page it check to see that if the Property was complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION['userID']))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    //Check to see what property they are wishing to edit.
    if(isset($_SESSION['propertyID']))//if the property ID is stored in the session
    {
        $propertyID = $_SESSION['propertyID'];//setting the variable into the current page
    }
    elseif(isset ($_POST['propertyID']))//If the proeprty id is in the form of a get
    {
        $propertyID = $_POST['propertyID'];//pulling the post and putting it into the current page
        $_SESSION['propertyID'] = $propertyID;//Creating a new session variable for the next pages
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
            <table class="tableForm" width="1000">
                <font class="formheader">Dates</font>
                <tr>
                    <td>
                        <label class="label">Date the property will be available:</label><br/><input type="text" name="available" class="required" id="datepicker1" value="<?php echo $row['DateAvailable']?>" />
                    </td>
                    <td>
                        <label class="label">Date you will begin accepting PFOs:</label><br/><input type="text" name="acceptingPFO" id="datepicker2" class="required" value="<?php echo $row['DatePFOAccept']?>" />
                    </td>
                    <td>
                        <label class="label">Date you will stop accepting PFOs:</label><br/><input type="text" name="stopAcceptingPFO" id="datepicker3" class="required" value="<?php echo $row['DatePFOEndAccept']?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Date and times of 1st Open House:</label><br/><input type="text" name="openHouse1" id="datepicker4" class="required" value="<?php echo $row['DateTimeOpenHouse1']?>" />
                    </td>
                    <td>
                        <label class="label">Date and times of 2nd Open House:</label><br/><input type="text" name="openHouse2" id="datepicker5" value="<?php echo $row['DateTimeOpenHouse2']?>" />
                    </td>
                    <td>
                        
                    </td>    
                        
                </tr>
                <tr>
                    <td>
                        <label class="label">Starting Bid Monthly Rental Rate:</label><br/><input type="text" name="startingBid" class="required number" value="<?php echo $row['StartingBid']?>"/>
                    </td>
                    <td>
                        <label class="label">Minimum Bid Increment:</label><br/><input type="text" name="bidIncrement" class="required number" value="<?php echo $row['MinBidIncrement']?>"/>
                    </td>
                    <td>
                        <label class="label">Required Deposit:</label><br/><input type="text" name="requiredDeposit" class="required number" value="<?php echo $row['RequiredDeposit']?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Rent-it-Now Monthly Rental Rate:</label><br/><input type="text" class="number" name="rentItNowRate" value="<?php echo $row['RentNowRate']?>"/>
                    </td>
                    <td>
                        <label class="label">Minimum rental term, months:</label><br/><input type="text" name="minTerm" class="required number" value="<?php echo $row['MinimumTerm']?>"/>
                    </td>
                    <td>
                        <!-- This was where the pre market option was, deleted due to non usage -->
                        <!--
                        <label class="label">Do you want to Pre-Market?</label><br/>
                         Yes<input type="radio" name="comingSoon"  value="1" <?php// if($row['PreMarket'] == '1'){echo "checked='checked'";}?> />
                         No<input type="radio" name="comingSoon"checked='checked'  value="0" <?php// if($row['PreMarket'] != '1'){echo "checked='checked'";}?> />
                        -->
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> 
                        <a class="button" href="newListing2.php">Back</a>
                        
                        <button type="reset" class="button">Clear</button>
                        <button type="submit" class="button">Save and Continue</button>
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
            minDate: 0,
            onSelect: function(dateStr) {
            var min = $(this).datepicker('getDate') || new Date(); // Selected date or today if none
            $('#datepicker3').datepicker('option', {minDate: min});
            $('#datepicker4').datepicker('option', {minDate: min});
            $('#datepicker5').datepicker('option', {minDate: min});
            }
            
        });
        
    });
    $(function() {
        $( "#datepicker3" ).datetimepicker({
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd',
            showMinute: 'false',
            minDate: 0,
            onSelect: function(dateStr) {
            var max = $(this).datepicker('getDate') || new Date(); // Selected date or today if none
            $('#datepicker4').datepicker('option', {maxDate: max});
            $('#datepicker5').datepicker('option', {maxDate: max});
            }
        });
        
    });
    $(function() {
        $( "#datepicker4" ).datetimepicker({
            timeFormat: 'hh:mm:ss',
            dateFormat: 'yy-mm-dd',
            showMinute: 'false',
            minDate: 0,
            onSelect: function(dateStr) {
            var min = $(this).datepicker('getDate') || new Date(); // Selected date or today if none
            $('#datepicker5').datepicker('option', {minDate: min});
        
            }
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
