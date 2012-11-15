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
        
        $RecentSearch = $_SESSION['recentSearch'];
        
        $search = array($type,$val, strtotime(date("Y-m-d H:i:s")));
        
        while(count($RecentSearch) > 4)
        {
            $RecentSearch = array_reverse($RecentSearch);
            array_pop($RecentSearch);
            $RecentSearch = array_reverse($RecentSearch);
        }
        if(count($RecentSearch) != 0)
        {
            array_push($RecentSearch, $search);
        }
        else
        {
            $RecentSearch = array($search);
        }
        
        
        
        $_SESSION['recentSearch'] = $RecentSearch;
        
        
?>
<form style="float:right;" method="post" action="searchRedirect.php">
        <table width="" style="text-align: center;">
        <tr>
            <td>
                <label class="label">Search: </label><input type="text" value="<?php echo $val; ?>" name="search">
        <select name="type">
                <option <?php if($type == "zip"){echo 'selected="selected"';} ?> value="zip">Zip</option>
                <option <?php if($type == "address"){echo 'selected="selected"';} ?> value="address">Address</option>
                <option <?php if($type == "city"){echo 'selected="selected"';} ?> value="city">City</option>
        </select>
                 
            </td>
            <td>
                <button type="submit" class="button">Search</button>
            </td>
        </tr>
        </table>
    </form>
<h1 class="Title">Home Search Results</h1>

<hr class="Title" />

<div id="mainContent">

 <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent" >
            
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