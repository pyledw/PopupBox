
<?php
        $title = "Search Homes";
	include 'Header.php';
?>


<h1 class="Title">Home Search - Advanced</h1>
<hr class="Title" />
<form class="formStyle" width="90%" height="90%" method="post" action="searchResults.php">
    Zip Code:<input type="text" name="zip" />
    City:<input type="text" name="city" />
    Street:<input type="text" name="street" />
    County:<input type="text" name="county" />
    Min-Bedrooms:<input type="text" name="min-Bedrooms" />
    Max-Bedrooms:<input type="text" name="max-Bedrooms" />
    Min-Bathrooms:<input type="text" name="min-Bathrooms" />
    Max-Bathrooms:<input type="text" name="max-Bathrooms" />
    Min-Square Feet:<input type="text" name="min-SquareFeet" />
    Max-Square Feet:<input type="text" name="max-SquareFeet" />
    Min-Price:
    
    
    
    
    <br/>
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
</form>
<?php
	include 'Footer.php';
?>