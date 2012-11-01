
<?php
        $title = "Search Homes";
	include 'Header.php';
?>



<div id="mainContent">
    <form method="post" action="searchRedirect.php">
        <table width="750px" class="form" style="text-align: center;">
        <font class="formheader">Home Search</font>
        <tr>
            <td>
                 Search: <input type="text" name="search"><select name="type">
                <option value="zip">Zip</option>
                <option value="address">Address</option>
                <option value="city">City</option>
        </select><br/>
                 <a href="advancedHomeSearch.php">Advanced Search</a>
                 
            </td>
            <td>
                
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
</div>
<?php
	include 'Footer.php';
?>