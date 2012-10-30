<?php
    $title = "New Listing Part 2";
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
    }
    else
    {
        header( 'Location: /myHood.php' );
    }
    
    
    //Creating connection to the Database
    include_once 'config.inc.php';
    $con = get_dbconn("");
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE PropertyID ='$propertyID'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    
    
?>
    <h1 class="Title">New House Listing - Photos</h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing2Redirect.php">
          Photo Policy:
            LeaseHood believes in providing all interested parties with the tools necessary to make intelligent decisions.  To that end, we believe all advertised homes should be accurately and thoroughly depicted, including those features which uniquely identity the property.  Please submit at least one photo of the front of the house, one kitchen photo, and one photo of the main bathroom. You can download up to 7 photos, which will be visible to all applicants on LeaseHood.com.  However, only the first 4 photos will be submitted for 3rd party advertising media. 

            Please Note: LeaseHood reserves the right to remove photos and/or listings at any time if inappropriate or explicit content has been downloaded to or input into LeaseHood.com by a user.


            Maximum photo size:	400 KB
            Photo formats:		*.jpg, *.tif, __________
            
            <button type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>
  
        </form>
    </div>
<?php
    include 'Footer.php';
?>
