<?php
        
        include_once 'config.inc.php';
        $con = get_dbconn("");

        //Query to select the user's application using their userID number
        $result = mysql_query("SELECT * FROM PROPERTY
        WHERE UserID ='" . $_SESSION[userID] . "'");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }//

?>

<h1 class="Title">Tenant Resources</h1>
    <hr class="Title" />
    <div id="mainContent">
 <?php
     include_once 'config.inc.php';
 ?>
        <h3><a id="top">As an applicant you are provided with valuable resources to help 
                make your experience more enjoyable and efficient.</a></h3><br />
                
        <p><font weight="bold"><a href="#tips">Tips for Submitting a PFO:</a></font><br /> 
        These tips will help enhance your position as an applicant; from the application 
        process to the PFO submittal, it’s all here.</p>
        
        <p><font weight="bold"><a href="#act">Tennessee Landlord and Tenant Act:</a></font><br />
        As a Tenant, you have both obligations and rights regarding your tenancy, and 
        it is very important to understand the Landlord Tenant Act.</p>
        
        <p><font weight="bold"><a href="#laws">Fair Housing Laws:</a></font><br />  
        Fair Housing and Credit Laws are established to eliminate discrimination between 
        otherwise identical parties and provide protection for tenants.</p>
        
        <p><font weight="bold"><a href="#brokerage">Brokerage and Agency:</a></font><br />  
        LeaseHood is a licensed real estate broker in the state in which the subject real 
        estate is located.  Depending upon which position you assume, LeaseHood may require 
        that a limited agency relationship be developed.  Brokerage statutes are provided 
        here for your reference.</p>
        
        <p><font weight="bold" color="blue">General Tenant Tips:</font><br />
        These tips will help you maintain a positive relationship with your Landlord during your tenancy.</p>
        <hr />
        
        <p><a id="tips"><h3><font color="#78923B"><u>Tips for Submitting a Proposal for Occupancy (PFO):</u></font></h3></a><br />
        <ol>
            <li>Be completely honest when you submit your application.  Most landlords have experienced 
                the struggles of finding great residents.  Chances are, you will be subject to an application 
                verification fee, a copy of your recent paycheck stub, a background check, referral 
                verification, etc. required by the landlord should your Proposal for Occupancy (PFO) 
                be accepted.  These activities are done outside of LeaseHood.com.</li>
            <li>
                Be sure you are serious about submitting a PFO.  A PFO is a legal intent to inhabit 
                a rental property.  There are very few circumstances in which you can retract your 
                PFO without penalty, so be careful when you submit a PFO.</li>
            <li>Don't submit a PFO until you have seen the property.  Typically, an open house 
                will be available to view the property.  And there may be other interested parties 
                viewing the property at the same time as you do.</li>
            <li>Frequently monitor the listed property for which you submitted a PFO.  
                Some interested parties may wait until the last few moments to submit a PFO. 
                You can always increase your PFO rental amount.</li>
            <li>If you are really intrigued by the property, use the Move-in-Now option to secure 
                it.  Each property is unique and likely results in different worhts for different parties.  
                While someone may think a certain property is about average, another person may be 
                particularly excited about the nice deck, or the kitchen, or that's it's located a 
                few minutes from work or in a certain school zone, etc.</li>
        </ol></p>
        
        <a href="#top">Back to top</a>
        
        <p><a id="act"><h3><font color="#78923B"><u>Tennessee Landlord and Tenant Act:</u></font></h3></a><br />
        According to the Tennessee Consumer Affairs Division, the Tennessee Uniform Residential Landlord 
        and Tenant Act was enacted in 1975 to establish the rights and obligations of landlords and 
        tenants involved in rental properties.  In general, the provisions of the act apply only to 
        dwelling units residing in counties with a population  of more than 68,000, according to the 
        most recent census.  The full act can be accessed <a href="http://tn.gov/consumer/documents/UniformResidentialLandlordandTenantAct7.12.12.pdf">here</a>
        </p>
        
        <a href="#top">Back to top</a>
        
        <p><a id="laws"><h3><font color="#78923B"><u>Fair Housing Laws:</u></font></h3></a><br />
        The Fair Housing Act makes it illegal to discriminate in the buying, selling or renting of a 
        home because of a person’s race, color, national origin, religion, sex, familial status and 
        disability. Amendments to the Fair Housing Act added sex as a protected class in 1974 and 
        familial status and disability as protected classes in 1988.</p>
        
        <p>Familial status includes children under the age of 18 living with parents or legal 
        custodians, pregnant women and people securing custody of children under the 
        age of 18. To read the Fair Housing Act, <a href="http://www.usccr.gov/pubs/TNFairHousingReport.pdf">click here.</a></p>
        
        <p>States or local governments may enact fair housing laws that extend protections to other groups. Tennessee 
        has included creed as a protected class in the Tennessee Human Rights Act (4-21-600.)</p>
        
        <a href="#top">Back to top</a>
        
        <p><a id="statutes"><h4><font color="#78923B"><u>Brokerage Statutes</u></font></h4></a><br />
            Please <a href="http://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=2&ved=0CCcQFjAB&url=http%3A%2F%2Fwww.tnaptassoc.org%2FLandlord%2520Tenant%2520Act.doc&ei=075ZUN-NL4Wm9ASXoIHwAw&usg=AFQjCNGGkb4K0aowfioprBVdJw8juhSd6w">click here</a>
        for a link to the statutes regulating the sale and rental of real estate in Tennessee.</p>
        
        <a href="#top">Back to top</a>
</div>  