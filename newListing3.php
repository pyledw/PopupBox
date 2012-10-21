<?php
    $title = "New Listing Part 3";
    include 'Header.php';
?>
    <h1 class="Title">New House Listing - Action Details</h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing3Redirect.php">
          
            Date the property will first be available for occupancy:<input type="text" name="available" id="datepicker1" />
            Date you will begin accepting PFOs<input type="text" name="acceptingPFO" id="datepicker2" />
            Date you will stop accepting PFOs<input type="text" name="stopAcceptingPFO" id="datepicker3" />
            Date and times of 1st Open House<input type="text" name="openHouse1" id="datepicker4" />
            Date and times of 2nd Open House<input type="text" name="openHouse2" id="datepicker5" />
            Starting Bid Monthly Rental Rate<input type="text" name="startingBid" />
            Minimum Bid Increment<input type="text" name="bidIncrement" />
            Required Deposit<input type="text" name="requiredDeposit" />
            Rent-it-Now Monthly Rental Rate<input type="text" name="rentItNowRate" />
            Minimum rental term, months<input type="text" name="minTerm" />
            
            Do you want to market this property as “Coming Soon?”  You have 8 days until your listing will "go live."
            Yes<input type="radio" name="comingSoon"  value="Y" />
            No<input type="radio" name="comingSoon"checked='checked'  value="N" /><br/>

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