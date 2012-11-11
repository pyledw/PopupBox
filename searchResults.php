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
        
        
?>
<h1 class="Title">Home Search Results</h1>
<hr class="Title" />
<div id="mainContent">
    <?php
        
    include_once 'searchFunction.php';
    $result = search($type,$val);
    
    
    //Setting the query results into a variable
    while($row = mysql_fetch_array($result))
    {
        include_once 'listingFunctions.php';
        displayMyProperty($row[AuctionID]);
    }
    ?>
</div>

<?php
	include 'Footer.php';
?>