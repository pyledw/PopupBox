<!-- This is the home listing page.  It uses the GET method in order to create a static address for each listing
     It then retrieves the data from the database about the listing and displays it to the screen. -->

<?php
    $listingID = $_GET[listingID];
    $title = 'Listing' .$listingID; //This will be retrieved from the element that was clicked on in the search
    include 'Header.php';

    

        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("");

        //Returning all the information on the property and the auction
        $result = mysql_query("SELECT * FROM PROPERTY
           INNER JOIN AUCTION
           ON PROPERTY.PropertyID=AUCTION.PropertyID
           WHERE PROPERTY.PropertyID = $listingID ");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
?>
    <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent">
        <!--Content will be retrieved via php.  This is just a template for user latter-->
        <h1 class="Title"><?php echo $row[Address] . " - " . $row[PropertyID] ?></h1>
        <hr class="Title" />
        <table id="houseListing">
            <tr>
                <td colspan="3" width="600px">
                    <?php echo $row[Address] . " - " . $row[PropertyID] ?>  <a href="Http://www.google.com/maps?q=<?php echo $row[Address] . " " . $row[City] . " " . $row[State] ?>">Map It</a> - Print Brochure
                </td>
                <td colspan="1" class="greyBackground">
                    Current Rental Rate: $900
                </td>
            </tr>
            <tr>
                <td>
                    <img class="mainPhoto" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
                </td>
                    
                <td>
                    <img class="thumbs" src="<?php echo $row[ImagePathKitchenThumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePathMainBathThumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePath4Thumb]; ?>" alt="thumbnail" /><br/>
                    <img class="thumbs" src="<?php echo $row[ImagePath5Thumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePath6Thumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePath7Thumb]; ?>" alt="thumbnail" /><br/>
                </td>
                <td class="alignCenter">
                    <a class="button" href="#">Move in Now <?php echo "$" . $row[RentNowRate] ?></a><br/><br/>
                    <a class="button" href="#">Save this home</a><br/><br/>
                    <a class="button" href="#">Print Flyer</a><br/><br/>
                </td>
                <td>
                    BR: <?php echo $row[Bedrooms] ?> BA: <?php echo $row[Bath] ?><br/>
                    SQ: <?php echo $row[SQ] ?><br/>
                    AC: <?php echo $row[AC] ?> Heat: <?php echo $row[Heat] ?><br/>
                    Pets: <?php echo $row[AllowDog] ?><br/>
                    Deposit: <?php echo "$".$row[RequiredDeposit] ?><br/>
                    Open House 1: <?php echo $row[DateTimeOpenHouse1] ?><br/>
                    Open House 2: <?php echo $row[DateTimeOpenHouse2] ?><br/>
                    Listing End: <?php echo $row[DatePFOEndAccept] ?><br/>
                    Date Available: <?php echo $row[DateAvailable] ?><br/>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo $row[Description] ?>
                </td>
            </tr>
            <tr>
                <td class="redBackground" colspan="3">
                    Bid History
                </td>
                <td rowspan="6" align="center">
                    <form id="placebid" method="post">
                        <font class="greyBackground">My Proposal for occupancy</font><br/>
                        <label class="label">Bid Amount:</label><input type="text" name="amt" /><br/>
                        <input type="text" style="display: none;" name="auctionID" value="<?php echo $row[AuctionID] ?>" />
                        <input type="text" style="display: none;" name="userID" value="<?php echo $_SESSION[userID] ?>" />
                        <input type="text" style="display: none;" name="propertyID" value="<?php echo $row[PropertyID] ?>" />
                        Submit <button type="submit">Submit</button>
                    </form>
                   
                    
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Username
                </td>
                <td>
                    Bid Amount
                </td>
            </tr>
            <?php
                    //This section is retrieving the bids and adding them to the page
                    $result2 = mysql_query("SELECT * FROM BID
                        INNER JOIN APPLICATION
                        ON APPLICATION.ApplicationID=BID.ApplicationID
                        INNER JOIN USER
                        ON APPLICATION.UserID=USER.UserID
                        WHERE AuctionID='$row[AuctionID]'");
                    
                    while($row2 = mysql_fetch_array($result2))
                    {
                        echo '<tr>
                            <td  colspan="2">
                                '. $row2[UserName] .'
                            </td>
                            <td>
                                '. $row2[MonthlyRate]. '
                            </td>
                        </tr>'; 
                    }
                    
                    
                    
            ?>
            
        </table>



    </div>
<?php
    include 'Footer.php';
?>

    <script>
        $("#placebid").submit(function(e){
            e.preventDefault();
            
            var url = "placeBidConfirm.php?";
            url += "amt=" + $('[name=amt]').val();
            url += "&auctionID=" + $('[name=auctionID]').val();
            url += "&propertyID=" + $('[name=propertyID]').val();
            jQuery.facebox({ ajax: url });
        })
    </script>
        

