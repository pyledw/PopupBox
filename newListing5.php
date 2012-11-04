<?php
    $title = "New Listing Part 5";
    include 'Header.php';
?>
    <h1 class="Title">New House Listing - Certification</h1>
    <hr class="Title">
    <div id="mainContent">
        <form id="listingForm" method="post" action="newListing5Redirect.php">
            <table class="tableForm">
                <font class="formheader">User Agreement</font>
                <tr>
                    <td>
                         Your listing is now complete.  It will be submitted for verification 
                         once your listing fee has been processed.  Please thoroughly review 
                         the terms and conditions below and continue with your listing.  After 
                         submission, you will be notified within 48 hours as to the status of 
                         your listing with LeaseHood.com, confirming your status to solicit 
                         Proposals for Occupancy.  Your listing will be valid for 45 days after 
                         verified, allowing you to list your property as many times as needed for
                         PFOs at separate times without additional listing fees.  You are encouraged 
                         to abide by the Fair Housing Laws and Fair Credit Laws…
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter Email<input class="required" type="text" name="email"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="agree" value="agree">I have Read and Agree with these terms and conditions
                    </td>
                </tr>
                <tr>
                    <td>
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
        $(document).ready(function(){
    $("#listingForm").validate({
        ignoreTitle: true
        
    });
  });
    </script>
