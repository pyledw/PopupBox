<div id="mainContent">
    <?php
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
        

    ?>
    <h1>
        New users needing review
    </h1>
    <?php
        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM USER
            WHERE IsApproved ='N'");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            echo $row[UserID] . " " . $row[UserName] .  " " . $row[FirstName] .  '<form method="post" action="approveUserAccount.php"><button type="submit">Activate</button><input type="text" value="'. $row[UserID] .'" style="display:none;" name="accountID"/></form><br/>';
        }
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
        //Will be added at a later time

    ?>
</div>

