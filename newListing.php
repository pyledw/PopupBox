
<!-- Page Content -->

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
                createDropdownMenu("numberOfBedrooms", array("1","2","3","4","5"), "Number Of Bedrooms: ");
                createDropdownMenu("numberOfBathrooms", array("1","2","3","4","5"),"Number Of Bathrooms: ");



        ?>
        </form>
    </div>                    
