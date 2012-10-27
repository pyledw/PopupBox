
<?php
        $title = "Search Homes";
	include 'Header.php';
?>


<h1 class="Title">Home Search</h1>
<hr class="Title" />
<div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="searchResults.php">
        Search: <input type="text" name="search">
        <select name="type">
            <option value="zip">Zip</option>
            <option value="address">Address</option>
            <option value="city">City</option>
        </select>
        <a href="advancedHomeSearch.php">Advanced Search</a>
        <br/>
            <button type="submit" class="button">Save and Continue</button>
            <button type="reset" class="button">Clear</button>
    </form>
</div>
<?php
	include 'Footer.php';
?>