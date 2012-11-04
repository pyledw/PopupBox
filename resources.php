<?php
        $title = "Resources";
	include 'Header.php';
        
        if(isset($_SESSION[propertyID]))
        {
            unset($_SESSION[propertyID]);
        }
        
?>
 <?php
 
    if($userType == "1")
    {
        include 'resourcesTenantContent.php';
    }
    //Test for user type calling content based apon user type
    if($userType == "2")
    {
        include 'resourcesLandlordContent.php';
    }
    if($userType == "0" || !$userType)
    {
        echo'
        <h1 class="Title">Resources</h1>
        <hr class="Title" />

        <div id="mainContent">

            <p>Throughout your experience with LeaseHood, whether an applicant or landlord, you 
            will be provided with valuable resources to help  make your experience more enjoyable 
            and efficient.  Once you create an account and login, you will be provided with 
            the following resources:</p>
    
            <ul>
                <li>Tips for listing property</li>
                <li>Submitting a Proposal for Occupancy</li>
                <li>Fair Housing laws</li>
                <li>Tenant/landlord laws</li>
                <li>Brokerage statutes</li>
            </ul>
        </div>';
    }
    include 'Footer.php';
?>