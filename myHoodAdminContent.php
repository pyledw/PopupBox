<div id="mainContent">
    <?php
        include_once 'config.inc.php';
        //Connecting to the sql database
        $connectionInfo= get_dbconn();
        $con = $connectionInfo[0];
        $select = $connectionInfo[1];
        

    ?>
    <h1>
        New users applications needing review
    </h1>
    <?php
        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM APPLICATION
            WHERE IsApproved ='N'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            echo $row[UserID] . " " . $row[ApplicationID] .  " " . $row[ContactFName] . '<form method="post" action="approveApplication.php"><button type="submit">Activate</button><input type="text" value="'. $row[ApplicationID] .'" style="display:none;" name="ApplicationID"/></form><br/>';
        }

    ?>
    <h1>
        New listings needing review
    </h1>
    <?php
        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM PROPERTY
            WHERE IsApproved ='0'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            echo $row[UserID] . " " . $row[PropertyID] .  " " . $row[Address] . '<form method="post" action="approveListing.php"><button type="submit">Activate</button><input type="text" value="'. $row[PropertyID] .'" style="display:none;" name="propertyID"/></form><br/>';
        }

    ?>
</div>

