<!-- This page will show all the Pricing information about Leasehood -->

<?php
        $title = "Pricing";
	include 'Header.php';
        include 'formElements.php';
?>
<h1 class="Title">Pricing</h1>
    <hr class="Title" />
    
    <?php
        createForm("", "", "test Form", "form.php");
        createDropdownMenu("drop1","drop1", array("1","2","3","4","5"), "Number: ");
    ?>
</form>

<h2>This is a heading</h2>
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<button id="show" class="button">show</button>
<button id="hide" class="button">hide</button>



<?php
	include 'Footer.php';
?>