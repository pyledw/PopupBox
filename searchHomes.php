
<?php

    /**
     * This page contains the search form for the simple search, and post all the data to the search redirect.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
        $title = "Search Homes";
	include 'Header.php';
?>



<div id="mainContent">
    <form id="search" method="post" action="searchRedirect.php">
        <table width="775px" class="tableForm" style="text-align: center;">
        <font class="formheader">Home Search</font>
        <tr>
            <td>
                <label class="label">Search: </label><br/><input type="text" name="search"><select name="type">
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
                <button type="submit" class="button">Search</button>
                <button type="reset" class="button">Clear</button>
            </td>
        </tr>
        </table>
    </form>
</div>
<?php
	include 'Footer.php';
?>