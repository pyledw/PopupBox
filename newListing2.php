<?php
    $title = "New Listing #2";
    include 'Header.php';
    
    include_once 'uploads.inc.php';
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
        $_SESSION[propertyID] = $_POST[propertyID];
    }
    else
    {
        header( 'Location: /myHood.php' );
    }
    
    
    //Creating connection to the Database
    include_once 'config.inc.php';
    include_once 'imageFunctions.php';
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
        
            <table class="tableForm">
                
                <tr>
                    <td colspan="10">
                         Photo Policy:
                        LeaseHood believes in providing all interested parties with the tools necessary to make intelligent decisions.  To that end, we believe all advertised homes should be accurately and thoroughly depicted, including those features which uniquely identity the property.  Please submit at least one photo of the front of the house, one kitchen photo, and one photo of the main bathroom. You can download up to 7 photos, which will be visible to all applicants on LeaseHood.com.  However, only the first 4 photos will be submitted for 3rd party advertising media. 

                        Please Note: LeaseHood reserves the right to remove photos and/or listings at any time if inappropriate or explicit content has been downloaded to or input into LeaseHood.com by a user.


                        Maximum photo size:	400 KB
                        Photo formats:		*.jpg, *.tif, __________
                    </td>
                    
                    
                </tr>
                        <?php 
                        
                            $resultImage = mysql_query("SELECT * FROM IMAGE
                                 WHERE PropertyID='$propertyID'");

                            if(!$resultImage)
                             {
                                 die('could not connect: ' .mysql_error());
                             }
                             echo '<tr>';
                             $num = 0;
                             while($row = mysql_fetch_array($resultImage))
                             {
                                 echo '<td width="100">';
                                 echo '<a href='.$row[ImagePathOriginal].'><img width="75px" src="'.$row[ImagePathThumb].'" /></a><br/>';
                                 echo '<a href="deleteImage.php?imageID='.$row[ImageID].'">Delete</a><br/>';
                                 echo '<a href="makePrimary.php?imageID='.$row[ImageID].'&propertyID='.$propertyID.'">Make Main</a><br/>';
                                 echo '</td>';
                                 ++$num;
                             }
                             
                             while($num < 10)
                             {
                                 echo '<td width="100">';
                                 echo '</td>';
                                 ++$num;
                             }

                             echo '</tr>';
                             
                        
                        ?>
                
                <tr>
                    <td colspan="10">
                        <form action="imageUpload.php" method="post" enctype="multipart/form-data">
			<label for="file">File #1</label>
			<input type="file" name="file" id="file" />
                        <input type="file" name="file" id="file" />
                        <input type="file" name="file" id="file" />
                        <input type="text" name="propertyID" style="display: none;" value='<?php echo $propertyID; ?>' />
			<br />
			<input type="submit" name="submit" value="Submit" />
                        </form>
                    </td>
                </tr>
                    
                <tr>
                    <td colspan="10">
                        <form class="listingForm" width="90%" height="90%" method="post" action="newListing2Redirect.php">
                        <button type="submit" class="button">Save and Continue</button>
                        <button type="reset" class="button">Clear</button>
                        </form>
                    </td>
                </tr>
            </table>
        
    </div>
<?php



    include 'Footer.php';
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#listingForm").validate({
        ignoreTitle: true,
        onkeyup: false,
        onclick: false
        
    });
  });
</script>