<!-- This page is for the advanced search.  It will allow the user to input any number of constraints for searching -->
<?php
        $title = "Search Homes - Advanced";
	include 'Header.php';
?>


<h1 class="Title">Home Search - Advanced</h1>
<hr class="Title" />
<form id="searchForm" method="post" action="advancedSearchRedirect.php">
    <table class="tableForm" width="900">
        <font class="formheader">Advanced Search</font>
        <tr>
            <td>
                 <label class="label">Zip Code:</label><br/><input type="text" name="zip" />
            </td>
            <td>
                 <label class="label">City:</label><br/><input type="text" name="city" />
            </td>
        </tr>
        <tr>
            <td>
                  <label class="label">Street:</label><br/><input type="text" name="street" />
            </td>
            
            <td>
                  <label class="label">County:</label><br/><input type="text" name="county" />
            </td>
        </tr>
        <tr>
            <td>
                 <label class="label">Min-Bedrooms:</label><br/>
                 
                        <select name="min-Bedrooms">
                            <option>
                                0
                            </option>
                            <option>
                                1
                            </option>
                            <option>
                                2
                            </option>
                            <option>
                                3
                            </option >
                            <option>
                                4
                            </option>
                            <option>
                                4+
                            </option>
                        </select>
            </td>
            
            <td>
                 <label class="label">Max-Bedrooms:</label><br/>
                 
                        <select name="max-Bedrooms">
                            <option>
                                0
                            </option>
                            <option>
                                1
                            </option>
                            <option>
                                2
                            </option>
                            <option>
                                3
                            </option >
                            <option>
                                4
                            </option>
                            <option>
                                4+
                            </option>
                        </select>
            </td>
        </tr>
        <tr>
            <td>
                 <label class="label">Min-Bathrooms:</label><br/>
                 
                 <select name="min-Bathrooms">
                            <option>
                                0
                            </option>
                            <option>
                                1
                            </option>
                            <option>
                                1.5
                            </option>
                            <option>
                                2
                            </option>
                            <option>
                                2.5
                            </option>
                            <option>
                                3
                            </option>
                            <option>
                                3+
                            </option>
                        </select>
            </td>
            
            <td>
                 <label class="label">Max-Bathrooms:</label><br/>
                 
                 <select name="max-Bathrooms">
                            <option>
                                0
                            </option>
                            <option>
                                1
                            </option>
                            <option>
                                1.5
                            </option>
                            <option>
                                2
                            </option>
                            <option>
                                2.5
                            </option>
                            <option>
                                3
                            </option>
                            <option>
                                3+
                            </option>
                        </select>
                 
            </td>
        </tr>
        <tr>
            <td>
                 <label class="label">Min-Square Feet:</label><br/><input type="text" name="min-SquareFeet" />
            </td>
            
            <td> 
                 <label class="label">Max-Square Feet:</label><br/><input type="text" name="max-SquareFeet" />
            </td>
        </tr>
        <tr>
            <td>
                 <label class="label">Min-Price:$</label><br/><input type="text" name="min-Price" />
            </td>
            <td>
                 <label class="label">Max-Price:$</label><br/><input type="text" name="max-Price" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="button">Save and Continue</button>
                <button type="reset" class="button">Clear</button>
            </td>
        </tr>
   </table>
</form>
<?php
	include 'Footer.php';
?>