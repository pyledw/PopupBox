
<?php

    /** 
     * This is the home listing page.  It uses the GET method in order to create a static address for each listing
     * It then retrieves the data from the database about the listing and displays it to the screen. It utilizes
     * functions from the listingfunctions.  It also inserts all the data from both the auciton and the listing
     * into the html code below.
     * 
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    $listingID = $_GET['listingID'];
    $title = 'Listing #' .$listingID; //This will be retrieved from the element that was clicked on in the search
    include 'Header.php';

    

        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("");

        //Returning all the information on the property and the auction
        $result = mysql_query("SELECT * FROM AUCTION
            INNER JOIN PROPERTY
            ON AUCTION.PropertyID=PROPERTY.PropertyID
            WHERE PROPERTY.PropertyID = $listingID 
                ORDER BY AUCTION.DatePFOAccept DESC");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $row = mysql_fetch_array($result);
        
        include_once 'listingFunctions.php';
        include_once 'imageFunctions.php';
        
        /** this code is retrieving the highest bid of the auction and returning it */
            $result2 = mysql_query("SELECT * FROM AUCTION
                WHERE AuctionID='$row[AuctionID]'");
            
            /** this is fetching the query results and setting them in an array */
            $row2 = mysql_fetch_array($result2);
            
        // below is call to function that returns the timestring of time remaining or time till start
        $timeString = getTime($row2['DatePFOAccept'], $row2['DatePFOEndAccept']);
        
        // The code below will return the listings status
        $status = getStatus($row2['DatePFOAccept'], $row2['DatePFOEndAccept']);
        
        //this code is retrieving the highest bid of the auction and returning it
        $maxBid = getHighBid($row['PropertyID']);
        
        
        if($maxBid == '')//If there is no max bid yet.  The price will be set to the starting min bid
        {
            $maxBid = '<font style="float:right;">$'.$row['StartingBid'].'</font>';
        }
        
?>
    <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent">
            <font style="float:right; position:relative; right:20px;">
                <?php
                /**
                 * Echo of strings calculated earlier.  These will display the time to end and the status
                 */
                    echo $timeString;
                    echo $status;

                ?>
            </font><br/>
        <table id="houseListing">

            <tr>
                <td colspan="3" width="600px">
                    <b><?php echo $row['Address'] . " - " . $row['PropertyID'] . " - " ?>  <a href="Http://www.google.com/maps?q=<?php echo $row['Address'] . " " . $row['City'] . " " . $row['State'] ?>" target="_blank">Map It</a> - Print Brochure</b>
                </td>
                <td Style="background: grey;">
                    Current Rental Rate:
                    <?php echo $maxBid;?> 
                    
                </td>
            </tr>
            <tr>
                <td width="150px">
                    <a href="<?php echo getMainPath($row[PropertyID]); ?>" rel="facebox"><img class="mainPhoto" src="<?php echo getMainThumbPath($row['PropertyID']); ?>" alt="Main Photo" /></a>
                </td>
                    
                <td width="100px" style="vertical-align:text-top;">
                    <?php 
                    /**
                     * Below is inserting the images into the listing as thumbnails
                     * When clicked these will use facebox to display the full size in a popup
                     */
                                   $images = getPhotoInfo($row[PropertyID]);
                                   
                                   if(!$images)
                                    {
                                        die('could not connect: ' .mysql_error());
                                    }
                                   if(mysql_num_rows($images) < 1)
                                   {
                                       echo '';
                                   }
                                   while($image = mysql_fetch_array($images))
                                   {
                                       echo '<a rel="facebox" href='.$image['ImagePathOriginal'].'><img class="thumbs" src="'.$image['ImagePathThumb'].'" alt="thumbnail" /></a>';
                                   }
                    
                    ?>
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
                                echo " " . convertDate($row['DateAvailable'],0); 
                                        
                                        
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Open House 1:
                            </td>
                            <td>
                                <?php echo " " . convertDate($row['DateTimeOpenHouse1'],1) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Open House 2:
                            </td>
                            <td>
                                <?php echo " " . convertDate($row['DateTimeOpenHouse2'],1) ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center">
                <?php 
                             //Below retrieves the auction status and returns it in the form of an int.  See function for details
                             $auctionStatus = getStatusInt($row2['DatePFOAccept'], $row2['DatePFOEndAccept']);
                             
                             
                             if(isset($_SESSION['userID']))//ensure the user is logged in
                             {
                                 if($_SESSION['type'] == "1")//Check to ensure suer is tenant
                                     {
                                       if($auctionStatus == "1")//Check to ensure auction is live
                                       {
                                           $bidStatus = getUsersBidStatus($_SESSION['userID'], $row['PropertyID']);//Retreving the status of the users bids
                                           //echo $_SESSION[userID] . " " . $row[PropertyID];
                                           //echo $bidStatus;

                                              if($bidStatus == "0")//If the user is aproved to bid
                                              {
                                                  echo '<form id="placebid" method="post">
                                                   <font>My Proposal for occupancy</font><br/><br/>
                                                   <font color="red">Minimum Bid Amount: $'.$row['StartingBid'].'</font><br/>
                                                   <label class="label">PFO Amount:</label><input class="required number" min='.$row['StartingBid'].' type="text" name="amt" /><br/>
                                                   <input type="text" style="display: none;" name="auctionID" value="'.$row['AuctionID'].'" />
                                                   <input type="text" style="display: none;" name="userID" value="'.$_SESSION['userID'].'" />
                                                   <input type="text" style="display: none;" name="propertyID" value="'.$row['PropertyID'].'" />
                                                   <button class="button" type="submit">Submit</button>
                                                   </form><br/>';
                                                  echo '<a rel="facebox" href="rentItNow.php?auctionID='.$row['AuctionID'].'" class="button">Move In Now at $'.$row['RentNowRate'].'</a>';
                                              }
                                              elseif($bidStatus == "1")//If the users applicaiton is not complete
                                              {
                                                  echo 'Application has not been compleated<br/>Click <a href="myHood.php">here</a> to complete';
                                              }
                                              elseif($bidStatus == "2")//if the user has not been authorized
                                              {
                                                  echo 'Application has not been authorized';
                                              }
                                              elseif($bidStatus == "3")//if the user has not paid the bid fee
                                              {
                                                  echo 'Bid Fee has not been paid<br/>
                                                      Click <a href="myHood.php">here</a> to pay';
                                              }
                                              elseif($bidStatus == "4")//if the user had another bid active
                                              {
                                                  echo 'You have another active bid';
                                              }
                                              elseif($bidStatus == "5")//If the user has no applicaiton on file
                                              {
                                                  echo 'No Application on File<br/>
                                                      Click <a href="myHood.php">here</a> to complete';
                                              }
                                       }
                                       elseif($auctionStatus == "2")//If the auciton has not started
                                       {
                                           echo 'Auciton Has not Started Yet';
                                       }
                                       else//The auction is over
                                       {
                                           echo "Auciton has Ended";
                                       }
                                    }
                                    elseif($_SESSION['type'] == "2")//If the user is a landlord
                                    {
                                        echo 'Only Tenant Accounts can bid on lisitngs';
                                    }
                                    elseif($_SESSION['type'] == "3")//If the user is an administrator
                                    {
                                        echo '<a class="button" href="disableListing.php?listingID='.$row['PropertyID'].'&auctionID='.$row['AuctionID'].'">Disable Listing</a>';
                                    }
                                    else
                                    {
                                        
                                    }
                             }
                             else//If the user is not logged in
                             {
                                 echo "You must be logged in to place bids";
                             }

                    ?>
                    
                    
             <!-- This area is filling information using PHP.  All data is coming from the property Table -->
                </td>
            </tr>
            
            <tr>
                <td colspan="4">
                    <?php echo $row['Description'] ?>
                </td>
            </tr>
            <tr>
                <td class="redBackground" colspan="2">
                    Bid History
                </td>
                <td rowspan="6" colspan="1" align="center">
                    <table id="innerTable">
                        <tr>
                            <td align="right">
                                Bedrooms: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['Bedroom'] ?>
                            </td>
                            <td align="right">
                                Bathrooms: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['Bath'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Square Feet: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['SF'] ?>
                            </td>
                            <td align="right">
                                Air: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['AC'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Allows Dogs: 
                            </td >
                            <td align="center">
                                <?php if($row['AllowDog'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td  align="right">
                                Allow Cats: 
                            </td>
                            <td align="center">
                                <?php if($row['AllowCat'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Ice Maker: 
                            </td>
                            <td align="center">
                                <?php if($row['IceMaker'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Dish Washer: 
                            </td>
                            <td align="center">
                                <?php if($row['DishWasher'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Clothes Washer: 
                            </td>
                            <td align="center">
                                <?php if($row['ClothesWasher'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Clothes Dryer: 
                            </td>
                            <td align="center">
                                <?php if($row['ClothesDryer'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                         <tr>
                            <td align="right">
                                Disposal: 
                            </td>
                            <td align="center">
                                <?php if($row['Disposal'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Washer Hookup: 
                            </td>
                            <td align="center">
                                <?php if($row['ClothesWasherHookup'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        
                    </table>
                 
                   
                    
                </td>
                <td rowspan="6" colspan="1" align="center">

                    <table id="innerTable">
                        <tr>
                            <td  align="right">
                                Media: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['Media'] ?>
                            </td>
                            <td  align="right">
                                Garage: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['Garage'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Deposit: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['RequiredDeposit'] ?>
                            </td>
                            <td align="right">
                                Min Term: 
                            </td>
                            <td align="center">
                                <?php echo " " . $row['MinimumTerm'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Pet Deposit: 
                            </td>
                            <td align="center">
                                <?php if($row['PetDeposit'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Smoking: 
                            </td>
                            <td align="center">
                                <?php if($row['Smoking'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                ADA: 
                            </td>
                            <td align="center">
                                <?php if($row['ADAComplient'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Fenced: 
                            </td>
                            <td align="center">
                                <?php if($row['Fenced'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Pool: 
                            </td>
                            <td align="center">
                                <?php if($row['Pool'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Deck: 
                            </td>
                            <td align="center">
                                <?php if($row['Deck'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                        </tr>
                         <tr>
                            <td align="right">
                                Security: 
                            </td>
                            <td align="center">
                                <?php if($row['SecurityAlarm'] == "1"){echo "Yes";}else{echo "No";} ?>
                            </td>
                            <td align="right">
                                Microwave: 
                            </td >
                            <td align="center">
                                <?php if($row['Microwave'] == "1"){echo "Yes";}else{echo "No";} ?>
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
            /**
             * This section is getting all the current bids on the property
             * It will then display 4 of them with the option to display all
             * if more are there.
             */
            //This query is retriving all the bids on the auction of the property
            $auction = mysql_query('SELECT AuctionID FROM AUCTION
                WHERE propertyID="'.$listingID.'"
                ORDER BY AuctionID DESC');
            
            $auctionInfo = mysql_fetch_array($auction);
            
            
            //Selecting teh bid and the username from the database
            $bids = mysql_query("SELECT * FROM BID
                            INNER JOIN AUCTION
                            ON AUCTION.AuctionID=BID.AuctionID
                            INNER JOIN APPLICATION
                            ON APPLICATION.ApplicationID=BID.ApplicationID
                            INNER JOIN USER
                            ON USER.UserID=APPLICATION.UserID
                            WHERE BID.IsActive='1' AND AUCTION.AuctionID='".$auctionInfo['AuctionID']."' AND PropertyID='".$row['PropertyID']."'
                            ORDER BY MonthlyRate DESC");
            
                        //Below is keeping track of the number inserted in order to insert a view all option at the botom of the table
                        $max = 0;
                        $numRows = mysql_num_fields($bids);
                        while($bid = mysql_fetch_array($bids))
                        {
                         
                            echo  '<tr><td>' . $bid['UserName'] . '</td>' . 
                                   '<td>$'.$bid['MonthlyRate']. "</td></tr>";
                            $max += 1;
                            
                            if($max > 2)
                            {
                                if($numRows > 3)
                                {
                                    echo '<tr><td><a rel="facebox" href="seeAllBids.php?auctionID='.$row['AuctionID'].'">See all</a></td><td></td></tr>';
                                }
                                $max += 1;
                                break;
                            }
                        }
                        while($max <= 3)
                        {
                            echo '<tr><td height="19px" ></td><td></td></tr>';
                            $max += 1;
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
            var isValid = $("#placebid").valid();
            
            if(isValid)
                {
                    var url = "placeBidConfirm.php?";
                    url += "amt=" + $('[name=amt]').val();
                    url += "&auctionID=" + $('[name=auctionID]').val();
                    url += "&propertyID=" + $('[name=propertyID]').val();
                    jQuery.facebox({ ajax: url });
                }
        })
        $(document).ready(function(){
            $("#placebid").validate({
                onkeyup: false,
                onclick: false
            });
        });


    </script>
        

