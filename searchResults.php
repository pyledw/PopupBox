<?php

    /**
     * This page will recive the search term and search type in the form of a cookie.
     * 
     * This page will then save the recent search in the session.
     * 
     * Finally it will send the data to the search funciton and display the results acordingly.
     */

        //title is used to set page name
        $title = "Search Homes";
        
        //including the project header to initalize the page
	include 'Header.php';

        
        //Ceck to see if a search already existed
        if(isset($_COOKIE['searchType']))
        {
            //setting variables from previus search
            $type = $_COOKIE['searchType'];
            $val = $_COOKIE['searchVal'];
        }
        //if no variables reroutes back to search
        else
        {
            
            header( 'Location: /searchHomes.php' );
        }
        
        //retrieving search functions
        include_once 'listingFunctions.php';
        
        
        //getting recent searches from the session
        $RecentSearch = $_SESSION['recentSearch'];
        
        //setting the current search data into a value
        $search = array($type,$val);
        
        
        //while there are more than 4 searches will remove the oldest
        //by flipping the array and removing the one on the bottom.
        while(count($RecentSearch) > 4)
        {
            $RecentSearch = array_reverse($RecentSearch);
            array_pop($RecentSearch);
            $RecentSearch = array_reverse($RecentSearch);
        }
        
        //if the array has elements in it already
        if(count($RecentSearch) != 0)
        {
            array_push($RecentSearch, $search);
        }
        //if the array is empty initializes the array
        else
        {
            $RecentSearch = array($search);
        }
        
        
        //setting teh new recent searches back into the session
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
    //using the search functions
    include_once 'searchFunction.php';
    
    //This funciton uses the type and value and will return the
    //correct query based on those criteria
    $result = search($type,$val);
    
    
    //Setting the query results into a variable
    while($row = mysql_fetch_array($result))
    {
        //calling the functions
        include_once 'listingFunctions.php';
        
        //This funciton will display the listing and all informaiton about it
        //in the correct format.
        displaySearchResults($row[AuctionID]);
    }
    ?>
</div>

<?php

        //inclueding the project footer
	include 'Footer.php';
?>