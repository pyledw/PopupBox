<?php
    $title = "New Listing Part 5";
    include 'Header.php';
?>
    <h1 class="Title">New House Listing - Certification</h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing5Redirect.php">

            Your listing is now complete.  It will be submitted for verification 
            once your listing fee has been processed.  Please thoroughly review 
            the terms and conditions below and continue with your listing.  After 
            submission, you will be notified within 48 hours as to the status of 
            your listing with LeaseHood.com, confirming your status to solicit 
            Proposals for Occupancy.  Your listing will be valid for 45 days after 
            verified, allowing you to list your property as many times as needed for
            PFOs at separate times without additional listing fees.  You are encouraged 
            to abide by the Fair Housing Laws and Fair Credit Laws…
            <br/>
            <br/>
            Enter Email<input type="text" name="email"/>
            <br/>
            <br/>
            <input type="checkbox" name="agree" value="agree">I have Read and Agree with these terms and conditions<br>

            <button type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>
  
        </form>
    </div>
<?php
    include 'Footer.php';
?>
