<?php
    $listingID = $_GET[listingID];
    $title = 'Listing #HREDS2345'; //This will be retrieved from the element that was clicked on in the search
    
    
    include 'Header.php';

    

        //Connecting to the sql database
        $con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
        //echo "connected to mySQL";
        }
        
        //Selecting the Database
        $select = mysql_selectdb($db_database, $con);
        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        
        $result = mysql_query("SELECT * FROM PROPERTY
           WHERE PropertyID = $listingID ");
        
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
                <td rowspan="6">
                    Here will be the option to place a bid
                    
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
            <tr>
                <td  colspan="2">
                    USERNAME
                </td>
                <td>
                    BID AMOUNT
                </td>
            </tr>
            
            <tr>
                <td  colspan="2">
                    USERNAME
                </td>
                <td>
                    BID AMOUNT
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td colspan="4">
                    MyHood Match
                </td>
            </tr>
        </table>



    </div>
<?php
    include 'Footer.php';
?>
