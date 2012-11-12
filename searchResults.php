<?php
        $title = "Search Homes";
	include 'Header.php';

        
        
        if(isset($_COOKIE['searchType']))
        {
            $type = $_COOKIE['searchType'];
            $val = $_COOKIE['searchVal'];
        }
        else
        {
            header( 'Location: /searchHomes.php' );
        }
        
        include_once 'listingFunctions.php';
            
        
        
?>
<h1 class="Title">Home Search Results</h1>
<hr class="Title" />
<div id="mainContent">
    
 <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent">
            <font style="float:right; position:relative; right:20px;">
                <?php
                    echo $timeString;
                    echo $status;

                ?>
            </font><br/>
        <table id="houseListing">
            <img class="mainPhoto" style="float:left; position: relative; margin:-150px -150px; left:125px; top:125px;" src="<?php echo $row[ImagePathPrimary]; ?>" alt="Main Photo" />
            <tr>
                <td width="102px;" rowspan="6">
                    
                </td>
                <td colspan="3" width="600px">
                    <b><?php echo $row[Address] . " - " . $row[PropertyID] . " - " ?>  <a href="Http://www.google.com/maps?q=<?php echo $row[Address] . " " . $row[City] . " " . $row[State] ?>">Map It</a> - Print Brochure</b>
                </td>
                <td align="center">
                    Home Features
                </td>
            </tr>
            <tr>
                
                
                <td width="350px" rowspan="3" style="vertical-align: top;">
                    Description of the home. The home is on a great 4 acre lot, with a fenced in lawn and plenty of room for the kidos to run around and play.
                </td>
                <td colspan="2" style="text-align: center;" class="redBackground">
                    Current Bids
                </td>
                <td rowspan="5">
                    Features added here
                </td>
            </tr>
            <tr>
   
                <td>
                   Username
                </td>
                <td>
                    Bid AMT
                </td>
            </tr>
            <tr>
                <td>
                   Username
                </td>
                <td>
                    Bid AMT
                </td>
            </tr>
            <tr>
                <td height="40px" rowspan="2">
                    <a href="#" class="button">View Listing</a>
                </td>
                <td>
                   Username
                </td>
                <td>
                    Bid AMT
                </td>
            </tr>
            <tr>
                
            </tr>
        </table>
                </div>
    
    
    
    <?php
        
    include_once 'searchFunction.php';
    $result = search($type,$val);
    
    
    //Setting the query results into a variable
    while($row = mysql_fetch_array($result))
    {
        include_once 'listingFunctions.php';
        displaySearchResults($row[AuctionID]);
    }
    ?>
</div>

<?php
	include 'Footer.php';
?>