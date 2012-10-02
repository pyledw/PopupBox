
<!-- Page Content -->

    <h1 class="Title">Account Set Up</h1>
    <hr class="Title">
    <div id="mainContent">

        <?php
                include 'formElements.php';
                createForm('90%', '90%', 'Home Info', 'newListingData.php');
                createTextField("streetAddress", "Address", "Street Address: ", "300px");
                createTextField("city", "City", "", "");
                createTextField("state", "State", "", "40px");
                createTextField("zip", "Zip", "", "50px");
                echo '<hr>';
                createTextField("squareFootage", "Sq. Ft.", "Square Feet: ", "");
                createDropdownMenu("numberOfBedrooms", array("1","2","3","4","5"), "Number Of Bedrooms: ");
                createDropdownMenu("numberOfBathrooms", array("1","2","3","4","5"),"Number Of Bathrooms: ");
                createDropdownMenu("garage", array("Garage","Carport","Other","None"), "Garage: ");
                createDropdownMenu("heating", array("Electric heating","Gas heating","Wood burning Stove","Dual","None"), "Type of Heating");
                newLine();
                createDropdownMenu("airConditioning", array("Electric air","None"), "Air Conditioning: ");
                createDropdownMenu("TV", array("Cable","Satilite","None"), "Media: ");
                radioGroup(array("Yes","No"), array("yes","no"), "ADA", "Are you advertising this house as ADA (Americans with Disability Act) compliant?");
                newLine();
                createTextBoxField("90%", "20%","discription", "Description: ");
                newLine();
                createButton("submit", "Save and Continue", "button");
                createButton("reset", "reset form", "button");
                


        ?>
        </form>
    </div>                    
