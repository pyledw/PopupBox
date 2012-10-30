<div id="mainContent">
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
            WHERE APPLICATION.IsApproved ='N'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            echo '<div style="display:inline;width:500px;">'. $row[UserID] . " " . $row[LastName] .  ", " . $row[FirstName] . '
                                <a class="button" href="viewApplication.php?applicationID='.$row[ApplicationID].'" rel="facebox" >View Application</a></div><br/>';
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
            WHERE PROPERTY.IsApproved ='0' AND PROPERTY.IsPaid = '1'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            echo $row[UserID] . " " . $row[PropertyID] .  " " . $row[Address] . '<div style="display:inline;width:500px;"><a class="button" href="viewProperty.php?propertyID='.$row[PropertyID].'" rel="facebox" >View Property</a></div><br/><br/>';
        }

    ?>
</div>

