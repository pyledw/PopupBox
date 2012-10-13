<?php
        $title = "Search Homes";
	include 'Header.php';
?>

<link rel="stylesheet" type="text/css" href="css/searchResults.css" /><!--Link to Main css file -->

<h1 class="Title">Home Search Results</h1>
<hr class="Title" />
<div id="mainContent">
    <table id="searchResults">
            <tr class="searchHeader">
                <td width="75px">
                    ID#
                </td>
                <td width="75px">
                    Media
                </td>
                <td width="150px">
                    Street Address
                </td>
                <td width="50px">
                    Zip Code
                </td>
                <td width="75px">
                    City
                </td>
                <td width="50px">
                    Square Footage
                </td>
                <td width="50px">
                    BR/BA
                </td>
                <td width="75px">
                    Current Price
                </td>
                <td width="75px">
                    Move In Now Price
                </td>
                <td width="40px">
                    Pets
                </td>
                <td width="50px">
                    Smoking
                </td>
                <td width="75px">
                    Open House
                </td>
                <td width="75px">
                    Ending
                </td>
            </tr>
            <tr class="searchResult">
                <td>
                    Test ID
                </td>
                <td>
                    SOme media Infor
                </td>
                <td>
                    105 riverchase dr
                </td>
                <td>
                    37221
                </td>
                <td>
                    Nashville
                </td>
                <td>
                    1,200
                </td>
                <td>
                    4BR 3BA
                </td>
                <td>
                    900
                </td>
                <td>
                    1,400
                </td>
                <td>
                    Dogs
                </td>
                <td>
                    No
                </td>
                <td>
                    09/16/2014
                </td>
                <td>
                    <font class="redTextArea">4Hrs</font>
                </td>
            </tr>
    </table>
</div>

<?php
	include 'Footer.php';
?>