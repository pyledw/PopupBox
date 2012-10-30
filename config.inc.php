<!-- This file is for the database configuration, and host the Username and Password for database connections.
     It also hold the function to be called for creating the connection to the database-->

<?php

$cfg['show_buildinfo'] = true;

$db_user = 'leasehood';
$db_pass = 'sunlight blanket floating change';  // db password
$db_server = '199.115.231.216';     // server name or IP address
$db_database = 'leasehood';     // database to select
$pw_salt = '68f33ecb44592ddd476af4145a2eae9f';

function get_dbconn($api) {
    global $db_user, $db_pass, $db_server, $db_database;
    $con = NULL;
    if ($api == NULL || $api == "mysql")
    {
	$con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
            //echo "connected to mySQL";
        }

        $select = mysql_selectdb($db_database, $con);

        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
            //echo "Selected Database";
        }
    }
    else if ($api == "PDO") {
        $dsn = 'mysql:host=' . $db_server . ';dbname=' . $db_database;
        $options =  array(PDO::ATTR_PERSISTENT => true);
        try 
	{
            $con = new PDO($dsn, $db_user, $db_pass, $options);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	} catch (PDOException $e) {
            echo 'Connection failed. ' . $e->getMessage();
	}
    }
    return $con;
}



?>
