<?php
        $title = "Resources - Landlord";
	include 'Header.php';

?>

    <h1 class="Title">Landlord Resources</h1><br />
    <hr class="Title" />
    <div id="mainContent">

<?php
    //pulling the data from the database
    
    include_once 'config.inc.php';
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
?>
        <h3><a id="top">LeaseHood offers the following resources to maximize your position as a landlord:</a></h3><br />
        
        <p><font color="blue" ><b>Tips for listing property:</b></font><br />
        These tips will help enhance your position as a Landlord and maximize your potential while using LeseHood.com.<br />
        From open house tips to listing tips to pricing tips, it’s all here.</p>

        <p><font color="blue" weight="bold">TN Tenant/Landlord Rights:</font><br />
        As a landlord, you have both obligations and rights regarding your tenants, and it is very important to <br/>
        understand the Landlord Tenant Act.</p>
        
        <p><font color="blue" weight="bold">Fair Housing laws:</font><br/>
        Fair Housing Laws are established to eliminate discrimination between otherwise identical parties.  As a <br/>
        Landlord, you are strongly encouraged to abide by them.</p>
        
        