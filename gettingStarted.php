
<?php
        $title = "Getting Started";
	include 'Header.php';
?>

<!--PAGE CONTENT -->

	<h1 class="Title">What is Leasehood?</h1>
        <hr class="Title">
        <div id="mainContent">
            <img src="images/ForRent.png" style="float:right;" />
                <p>LeaseHood provides a most unique opportunity for prospective residents of rental homes,
                         primarily single family and similar homes, to be paired with landlords.  
                         Both prospective residents (applicants) and landlords can advertise their 
                         needs to initiate and execute residential lease contracts.  All applicants 
                         have completed a free online application, similar to a traditional lease application.
                         Whether a tenancy is advertised or a rental home is advertised, both are available 
                         for a specified time to solicit interest from opposing parties.
                </p>
            <p>
                    <ul style="list-style: none;">
                            <li>A prospective resident can:</li>
                            <li>
                                    <ul>
                                            <li>Search for available properties for rent and submit a 
                                                    “Proposal for Occupancy” (PFO) or</li>
                                            <li>
                                                    Advertise their tenancy needs and solicit properties that meet their criteria
                                            </li>
                                    </ul>
                            </li>
                    </ul>
            </p>
            <p>
                    <ul style="list-style: none;">
                            <li>A landlord can:</li>
                            <li>
                                    <ul>
                                            <li>Advertise available rental property and select from multiple pre-qualified applicants that meet minimum
                                            criteria such as housing history, salary, pets, etc. or</li>
                                            <li>
                                                    Search for applicants whose tenancy needs conform to the landlord's  offering
                                    </ul>
                            </li>
                    </ul>
            </p>
            <h2>Quick Glance</h2>
            <p>
                    <h3>For the LandLord</h3>

            <?php

                    require 'tableCreator.php';

                    createTable("Feature","Traditional Listing","LeaseHood");

                    addRow('Landlord spends hours on phone calls, application review, 
                            placing multiple ads, background checks, individual property showings, etc.', '', "X");

                    addRow('Only PRE-QUALIFIED APPLICANTS can express interest in property, based on landlord' . "'" . 's criteria ', 'X', '');

                    addRow("Landlord conducts one or two Open Houses instead of individual showings", 'X', "not normally");

                    addRow("Property available for pre-marketing online", "X", "");

                    addRow("LeaseHood listing creates advertising templates for common real estate websites", "X", "");

                    addRow("LeaseHood listing can be advertised in local MLS", "X", "not normally");

                    addRow("Landlord experiences true market value, regardless of 
                            market conditions, removing the rental rate guess-work", "X", "");

                    addRow("As an option, landlord can select from a group 
                            of prospective residents who meet his rental criteria and are ready to rent his property", "X", "");

                    closeTable();
            ?>

            </p>

            <p>

                    <h3>For the Renter</h3>
            <?php
                    createTable('Feature', 'Traditional Renting', 'LeaseHood');

                    addRow('Complete multiple applications and pay multiple fees to find the right rental home', "X", "");

                    addRow("YOU establish the market value for a rental home, not the landlord", "", "X");

                    addRow("Complete ONE FREE APPLICATION for multiple properties", "", "X");

                    addRow('Know which houses you qualify for BEFORE visiting the property', "", "X");

                    addRow("View a comprehensive set of photos BEFORE visiting the property, always consisting of a front, kitchen, and main bathroom view", "", "X");



                    closeTable();
            ?>

            </p>
            <a href="gettingStartedContinued.php" class="button">Continue</a>
</div>
<?php
	include 'Footer.php';
?>