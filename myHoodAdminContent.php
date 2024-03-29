<?php
    /**
     * This page contains the content if the user is determined to be anadministrator.
     * 
     * This page will display all of the listings and applications that are needing to be approved.
     * The content will only be dsiplayed if the listings and applications have been paid.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
?>

<div id="mainContent">
    <form  method="post" action="userSearch.php">
        User Name Search:<input type="text" name="userName" />
        <button class="button" type="submit">Search</button>
    </form>
    <h1>
        New users applications needing review
    </h1>
    <?php
        include_once 'config.inc.php';
        //Connecting to the sql database
        $con = get_dbconn("");

        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM APPLICATION
            INNER JOIN USER
            ON USER.UserID=APPLICATION.UserID
            WHERE APPLICATION.PageCompleted='6' AND APPLICATION.IsApproved ='0' AND APPLICATION.IsPaid='1'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
         include_once 'listingFunctions.php';
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            displayApplications($row);
        }

    ?>
    
    
    <h1>
        New listings needing review
    </h1>
    <?php
        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM PROPERTY
            INNER JOIN USER
            ON USER.UserID=PROPERTY.UserID
            WHERE PROPERTY.PageCompleted='6' AND PROPERTY.IsApproved ='0' AND PROPERTY.IsPaid = '1'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        include_once 'listingFunctions.php';
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            displayListings($row);
        }

    ?>
</div>

