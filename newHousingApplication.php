<?php
   $title = "New Housing";
   include 'Header.php';
   
   ?>

<!-- Page Content -->

    <h1 class="Title">New Housing Application</h1>
    <hr class="Title">
    <div id="mainContent">
        
<?php
   include 'formElements.php';
   createForm("90%", "90%", "Housing Application", "newHousingApplication.php");
   radioGroup(["yes","no"], ["yes","no"], "Smoking", "Will you be smoking?");
           
?>
</div>
    


<?php
    include 'Footer.php';
?>
