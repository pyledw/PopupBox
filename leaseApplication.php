<?php
   $title = "New Renter Application";
   include 'Header.php';
   
   ?>

<!-- Page Content -->

    <h1 class="Title">New Renter Application</h1>
    <hr class="Title">
    <div id="mainContent">
        
<?php
   include 'formElements.php';
   createForm("90%", "90%", "Renter Application", "leaseApplicationData.php");
   createTextField("rentalDate", "Rental Date", "", "");
   RadioGroup(["Yes","No"], ["yes","no"], "smokingPreferance", "Will you be Smoking?");
   RadioGroup(["Yes","No"], ["yes","no"], "ADA", "Do you need ADA (Americans with Disability Act) facilities?");
   createDropdownMenu("numberOfResidents", ["1","2","3","4","5","6","7"], "Number of residents: ");
   createButton("submit", "Submit and Continue", "button");
   createButton("reset", "Reset", "button");
           
?>
</div>
    


<?php
    include 'Footer.php';
?>
