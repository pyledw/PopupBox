<?php
    $title = "New Listing Part 5";
    include 'Header.php';
    
    
    /**
     * First Check is to ensur ethe user is logged in, and get the data of the correct user and property listing.
     * 
     * At the end of the page it check to see that if the Property was complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    
    /** Test to check if user is logged in or not IF not they will be redirected to the login page */
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    if(isset($_SESSION[propertyID]))
    {
        $propertyID = $_SESSION[propertyID];
    }
    elseif(isset($_POST[propertyID]))
    {
        $propertyID = $_POST[propertyID];
        $_SESSION['propertyID'] = $propertyID;
    }
    else
    {
        header( 'Location: /myHood.php' );
    }
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
                         to abide by the Fair Housing Laws and Fair Credit Lawsâ€¦
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Enter Email:</label><input class="required email" type="text" name="email"/></br>
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
        ignoreTitle: true,
        onkeyup: false,
        onclick: false
        
    });
  });
    </script>