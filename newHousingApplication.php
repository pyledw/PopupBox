
<!-- Page Content -->

    <h1 class="Title">New Housing Application</h1>
    <hr class="Title">
    <div id="mainContent">
        
<?php
   include 'formElements.php';
   createForm("90%", "90%", "Housing Application", "newHousingApplication.php");
   radioGroup(array("yes","no"), array("yes","no"), "Smoking", "Will you be smoking?");
   newLine();
   
   
?>
</div>
