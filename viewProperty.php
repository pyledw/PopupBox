<?php
    session_start();
    $propertyID = $_GET[propertyID];
    
    include_once 'config.inc.php';
            //Connecting to the sql database
            $con= get_dbconn("");
            
            $result = mysql_query("SELECT * FROM PROPERTY
                INNER JOIN USER
                ON USER.UserID=PROPERTY.UserID
                WHERE PropertyID = '$propertyID'");
            
            $row = mysql_fetch_array($result);
            
    
?>

    <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent">
        <!--Content will be retrieved via php.  This is just a template for user latter-->
        <h1 class="Title"><?php echo $row[Address] . " - " . $row[PropertyID] ?></h1>
        <hr class="Title" />
        <?php
            echo $row[AuctionID];
        ?>
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
                    <img class="mainPhoto" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo">
                </td>
                    
                <td>
                    <img class="thumbs" src="<?php echo $row[ImagePathKitchenThumb]; ?>" alt="thumbnail">
                    <img class="thumbs" src="<?php echo $row[ImagePathMainBathThumb]; ?>" alt="thumbnail">
                    <img class="thumbs" src="<?php echo $row[ImagePath4Thumb]; ?>" alt="thumbnail"><br/>
                    <img class="thumbs" src="<?php echo $row[ImagePath5Thumb]; ?>" alt="thumbnail">
                    <img class="thumbs" src="<?php echo $row[ImagePath6Thumb]; ?>" alt="thumbnail">
                    <img class="thumbs" src="<?php echo $row[ImagePath7Thumb]; ?>" alt="thumbnail"><br/>
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
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                </td>
            </tr>
            <tr>
                <td class="redBackground" colspan="3">
                    Bid History
                </td>
                <td rowspan="6" align="center">
                    <form method="post" action="placeBid.php">
                        <font class="greyBackground">My Proposal for occupancy</font><br/>
                        Bid Amount<input type="text" name="amt" /><br/>
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
                    
                    $result2 = mysql_query("SELECT * FROM BID
                        WHERE AuctionID='$row[AuctionID]'");
                    while($row2 = mysql_fetch_array($result2))
                    {
                        echo '<tr>
                            <td  colspan="2">
                                USERNAME
                            </td>
                            <td>
                                '. $row2[MonthlyRate]. '
                            </td>
                        </tr>'; 
                    }
                    
                    
                    
            ?>
            
        </table>
        <?php
        echo '<form method="post" action="approveListing.php"><button type="submit">Activate</button><input type="text" value="'. $row[PropertyID] .'" style="display:none;" name="propertyID"/></form>';
        ?>

    </div>

