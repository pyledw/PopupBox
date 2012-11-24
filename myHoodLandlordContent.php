<?php
    /**
     * This page contains the MyHood content for the landlord.
     * 
     * This page will retireve all of the listings of the user.
     * Is will call the methods for displaying them.
     * It then also shows and recent searches the user has stored in the session.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
?>


<div id="mainContent">
<h1>My Homes</h1>
    <?php
    //pulling the data from the database and returning the PFO
    
    include_once 'config.inc.php';
    $con = get_dbconn("");

    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE UserID ='". $_SESSION['userID'] . "'
            ORDER BY DatePFOEndAccept ASC");
    if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
    include_once 'listingFunctions.php';
    //Setting the query results into a variable
    while($row = mysql_fetch_array($result))
        {
            displayMyListings($row['PropertyID']);

        }
    ?>

    
    
    <?php 
    
    if(isset($_SESSION['recentSearch']))
    {
        echo '<b>Recent Searches</b><br/>';
    foreach (array_reverse($_SESSION['recentSearch']) as $value) 
        {
            echo "<a href='searchRedirect.php?type=".$value[0]."&term=".$value[1]."'>Searched for " . $value[1] . " by " . $value[0] . "</a><br/>";
        }
    }
    
    ?>

</div>
