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
            ON AUCTION.PropertyID=PROPERTY.PropertyID
            WHERE PROPERTY.PropertyID = $listingID ");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
        include_once 'listingFunctions.php';
        
        //below is call to function that returns the timestring of time remaining or time till start
        $timeString = getTime($row[DatePFOAccept], $row[DatePFOEndAccept]);
        
        
        //The code below will return the listings status
        $status = getStatus($row[DatePFOAccept], $row[DatePFOEndAccept]);
        

        //this code is retrieving the highest bid of the auction and returning it
        
        $maxBid = getHighBid($row[PropertyID]);
        
?>
    <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent">
            <font style="float:right; position:relative; right:20px;">
                <?php
                    echo $timeString;
                    echo $status;

                ?>
            </font><br/>
        <table id="houseListing">

            <tr>
                <td colspan="3" width="600px">
                    <b><?php echo $row[Address] . " - " . $row[PropertyID] . " - " ?>  <a href="Http://www.google.com/maps?q=<?php echo $row[Address] . " " . $row[City] . " " . $row[State] ?>">Map It</a> - Print Brochure</b>
                </td>
                <td Style="background: grey;">
                    Current Rental Rate:
                    <?php echo $maxBid;?> 
                    
                </td>
            </tr>
            <tr>
                <td width="150px">
                    <img class="mainPhoto" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
                </td>
                    
                <td>
                    <img class="thumbs" src="<?php echo $row[ImagePathKitchenThumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePathMainBathThumb]; ?>" alt="thumbnail" /><br/>
                    <img class="thumbs" src="<?php echo $row[ImagePath4Thumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePath5Thumb]; ?>" alt="thumbnail" /><br/>
                    <img class="thumbs" src="<?php echo $row[ImagePath6Thumb]; ?>" alt="thumbnail" />
                    <img class="thumbs" src="<?php echo $row[ImagePath7Thumb]; ?>" alt="thumbnail" />
                </td>
                <td>
                    <table id="innerTable">
                        <tr>
                            <td colspan="2" class="greyBackground">Important Dates</td> 
                        </tr>
                        <tr>
                            <td>
                                Date Available:
                            </td>
                            <td>
                                <?php
                                echo " " . convertDate($row[DateAvailable],0); 
                                        
                                        
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Open House 1:
                            </td>
                            <td>
                                <?php echo " " . convertDate($row[DateTimeOpenHouse1],1) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Open House 2:
                            </td>
                            <td>
                                <?php echo " " . convertDate($row[DateTimeOpenHouse2],1) ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center">
                <?php 
                             
                             $auctionStatus = getStatusInt($row[DatePFOAccept], $row[DatePFOEndAccept]);
                             
                             if($auctionStatus == "1")
                             {
                                 $bidStatus = getUsersBidStatus($_SESSION[userID], $row[PropertyID]);
                                    if($bidStatus == "0")
                                    {
                                        echo '<form id="placebid" method="post">
                                         <font>My Proposal for occupancy</font><br/><br/>
                                         <label class="label">Bid Amount:</label><input class="required number" type="text" name="amt" /><br/>
                                         <input type="text" style="display: none;" name="auctionID" value="'.$row[AuctionID].'" />
                                         <input type="text" style="display: none;" name="userID" value="'.$_SESSION[userID].'" />
                                         <input type="text" style="display: none;" name="propertyID" value="'.$row[PropertyID].'" />
                                         <button class="button" type="submit">Submit</button>
                                         </form>';
                                    }
                                    elseif($bidStatus == "1")
                                    {
                                        echo 'Application has not been compleated';
                                    }
                                    elseif($bidStatus == "2")
                                    {
                                        echo 'Application has not been authorized';
                                    }
                                    elseif($bidStatus == "3")
                                    {
                                        echo 'Bid Fee has not been paid';
                                    }
                                    elseif($bidStatus == "4")
                                    {
                                        echo 'You have another active bid';
                                    }
                             }
                             elseif($auctionStatus == "2")
                             {
                                 echo 'Auciton Has not Started Yet';
                             }
                             else
                             {
                                 echo "Auciton has Ended";
                             }

                    ?>
                </td>
            </tr>
            
            <tr>
                <td colspan="4">
                    <?php echo $row[Description] ?>
                </td>
            </tr>
            <tr>
                <td class="redBackground" colspan="2">
                    Bid History
                </td>
                <td rowspan="10" colspan="1" align="center">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                Bedrooms: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[Bedroom] ?>
                            </td>
                            <td align="right">
                                Bathrooms: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[Bath] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Square Feet: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[SF] ?>
                            </td>
                            <td align="right">
                                Air: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[AC] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Allows Dogs: 
                            </td >
                            <td align="center">
                                <?php if($row[AllowDog] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td  align="right">
                                Allow Cats: 
                            </td>
                            <td align="center">
                                <?php if($row[AllowCat] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Ice Maker: 
                            </td>
                            <td align="center">
                                <?php if($row[IceMaker] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Dish Washer: 
                            </td>
                            <td align="center">
                                <?php if($row[DishWasher] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Clothes Washer: 
                            </td>
                            <td align="center">
                                <?php if($row[ClothesWasher] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Clothes Dryer: 
                            </td>
                            <td align="center">
                                <?php if($row[ClothesDryer] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                         <tr>
                            <td align="right">
                                Disposal: 
                            </td>
                            <td align="center">
                                <?php if($row[Disposal] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Washer Hookup: 
                            </td>
                            <td align="center">
                                <?php if($row[ClothesWasherHookup] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        
                    </table>
                 
                   
                    
                </td>
                <td rowspan="10" colspan="1" align="center">

                    <table id="innerTable">
                        <tr>
                            <td  align="right">
                                Media: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[Media] ?>
                            </td>
                            <td  align="right">
                                Garage: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[Garage] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Deposit: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[RequiredDeposit] ?>
                            </td>
                            <td align="right">
                                Min Term: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row[MinimumTerm] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Pet Deposit: 
                            </td>
                            <td align="center">
                                <?php if($row[PetDeposit] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Smoking: 
                            </td>
                            <td align="center">
                                <?php if($row[Smoking] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                ADA: 
                            </td>
                            <td align="center">
                                <?php if($row[ADAComplient] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Fenced: 
                            </td>
                            <td align="center">
                                <?php if($row[Fenced] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Pool: 
                            </td>
                            <td align="center">
                                <?php if($row[Pool] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Deck: 
                            </td>
                            <td align="center">
                                <?php if($row[Deck] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                         <tr>
                            <td align="right">
                                Security: 
                            </td>
                            <td align="center">
                                <?php if($row[SecurityAlarm] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Microwave: 
                            </td >
                            <td align="center">
                                <?php if($row[Microwave] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        
                    </table>
                   
                    
                </td>
            </tr>
            <tr>
                <td colspan="1">
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
                        WHERE AuctionID='$row[AuctionID]'
                        ORDER BY MonthlyRate DESC");
                    
                    while($row2 = mysql_fetch_array($result2))
                    {
                        echo '<tr>
                            <td  colspan="1">
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
        $(document).ready(function(){
            $("#placebid").validate({
                onkeyup: false,
                onclick: false
            });
        });
    
    </script>
        

