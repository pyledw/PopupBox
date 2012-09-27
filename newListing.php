<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
   			<head>
   			<title>New Listing</title>
   			<link rel="shortcut icon" href="images/favicon.ico" />
<?php
	include 'Header.php';
?>
                        <h1 class="Title">Account Set Up</h1>
<hr class="Title">
<div id="mainContent">
    
<?php
        include 'formElements.php';
        createForm('90%', '90%', 'Create new home listing', 'newListingData.php');
        createTextField("streetAddress", "Address", "Street Address: ", "300px");
        createTextField("city", "City", "", "");
        createTextField("state", "State", "", "40px");
        createTextField("zip", "Zip", "", "50px");
        echo '<hr>';
        createTextField("squareFootage", "Sq. Ft.", "Square Feet: ", "");
        createDropdownMenu("numberOfBedrooms", ["1","2","3","4","5"], "Number Of Bedrooms: ");
        createDropdownMenu("numberOfBathrooms",["1","2","3","4","5"],"Number Of Bathrooms: ");
        
            

?>
    </form>
</div>                    

<?php
        include 'Footer.php';
?>
