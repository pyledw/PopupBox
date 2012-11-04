<?php
        $title = "Resources - Tenant";
	include 'Header.php';

?>

<h1 class="Title">Tenant Resources</h1>
    <hr class="Title" />
    <div id="mainContent">
    <?php
    //pulling the data from the database and returning the PFO
    
    //Creates a connection to the database and stores the connection string in $con and the Selected database in $select
    include_once 'config.inc.php';
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
    
