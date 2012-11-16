<!-- This page simply creates the content for the getting started page -->
<?php
        /**
         * This page contains the getting started content for the user.
         * all elements are in HTML
         * 
         * @author David Pyle <Pyledw@Gmail.com>
         */
        $title = "Getting Started";
	include 'Header.php';
?>

<!--PAGE CONTENT -->

	<h1 class="Title">What is Leasehood?</h1>
        <hr class="Title" />
        <div id="mainContent">
            
                <p><img src="images/ForRent.png" alt="For Rent" style="float:right;" />
                    LeaseHood provides a most unique opportunity for prospective residents of rental homes,
                         primarily single family and similar homes, to be paired with landlords.  
                         Both prospective residents (applicants) and landlords can advertise their 
                         needs to initiate and execute residential lease contracts.  All applicants 
                         have completed a free online application, similar to a traditional lease application.
                         Whether a tenancy is advertised or a rental home is advertised, both are available 
                         for a specified time to solicit interest from opposing parties.
                         
                </p>
                
            
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
            
            
                    <ul style="list-style: none;">
                            <li>A landlord can:</li>
                            <li>
                                    <ul>
                                            <li>Advertise available rental property and select from multiple pre-qualified applicants that meet minimum
                                            criteria such as housing history, salary, pets, etc. or</li>
                                            <li>
                                                    Search for applicants whose tenancy needs conform to the landlord's  offering
                                            </li>
                                    </ul>
                            </li>
                    </ul>
            
            <h2>Quick Glance</h2>
            
                    <h3>For the LandLord</h3>
		<table class="displayTable">
			<tbody>
				<tr style="background-color: #CFCAA6">
					<td width="80%" style="text-align: center;">Feature</td>
					<td width="10%" style="text-align: center;">Traditional Listing</td>
					<td width="10%" style="text-align: center;">LeaseHood</td>
				</tr>
				<tr>
					<td style="text-align: left;">Landlord spends hours on phone calls, application review, 
						placing multiple ads, background checks, individual property showings, etc.</td>
						<td style="text-align: center;">X
					</td>
					<td style="text-align: center;"></td>
				</tr>
				<tr>
					<td style="text-align: left;">Only PRE-QUALIFIED APPLICANTS can express interest in property, based on landlord's criteria </td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">X</td>
				</tr>
				<tr>
					<td style="text-align: left;">Landlord conducts one or two Open Houses instead of individual showings</td>
					<td style="text-align: center;">not normally</td>
					<td style="text-align: center;">X</td>
				</tr>
				<tr>
					<td style="text-align: left;">Property available for pre-marketing online</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">X</td>
				</tr>
				<tr>
					<td style="text-align: left;">LeaseHood listing creates advertising templates for common real estate websites</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">X</td>
				</tr>
				<tr>
					<td style="text-align: left;">LeaseHood listing can be advertised in local MLS</td>
					<td style="text-align: center;">not normally</td>
					<td style="text-align: center;">X</td>
				</tr>
				<tr>
					<td style="text-align: left;">Landlord experiences true market value, regardless of 
										market conditions, removing the rental rate guess-work</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">X</td>
				</tr>
				<tr>
					<td style="text-align: left;">As an option, landlord can select from a group 
										of prospective residents who meet his rental criteria and are ready to rent his property</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">X</td>
				</tr>
			</tbody>
		</table>
             <h3>For the Renter</h3>
		<table class="displayTable">
			<tbody>
				<tr style="background-color: #CFCAA6">
					<td width="80%" style="text-align: center;">Feature</td>
					<td width="10%" style="text-align: center;">Traditional Renting</td>
					<td width="10%" style="text-align: center;">LeaseHood</td>
				</tr><tr>
					<td style="text-align: left;">Complete multiple applications and pay multiple fees to find the right rental home</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;">X</td>
				</tr><tr>
					<td style="text-align: left;">YOU establish the market value for a rental home, not the landlord</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;"></td>
				</tr><tr>
					<td style="text-align: left;">Complete ONE FREE APPLICATION for multiple properties</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;"></td>
				</tr><tr>
					<td style="text-align: left;">Know which houses you qualify for BEFORE visiting the property</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;"></td>
				</tr><tr>
					<td style="text-align: left;">View a comprehensive set of photos BEFORE visiting the property, always consisting of a front, kitchen, and main bathroom view</td>
					<td style="text-align: center;">X</td>
					<td style="text-align: center;"></td>
				</tr>
			</tbody>
		</table>            

<p>
            <a href="gettingStartedContinued.php" class="button">Continue</a>
            </p>
</div>
<?php
	include 'Footer.php';
?>
