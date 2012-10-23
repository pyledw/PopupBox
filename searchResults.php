<?php
        $title = "Search Homes";
	include 'Header.php';
        if(!isset($_COOKIE['search']))
        {
            header( 'Location: /searchHomes.php' );
        }
        $searchTerm = $_COOKIE['search'];
?>
<script>


$(document).ready(function(){
  $(".searchResult").click(function(){
      var ID = "Default"
      ID = $(".idNumb").val();
      window.open("homeListing.php?listingID=" + ID,'_self');
  });
});


</script>
<link rel="stylesheet" type="text/css" href="css/searchResults.css" /><!--Link to Main css file -->

<h1 class="Title">Home Search Results</h1>
<hr class="Title" />
<div id="mainContent">
    <?php
        echo "Searched by: ";
        echo $searchTerm;
    ?>
    <table id="searchResults">
        
            <tr class="searchHeader">
                <th width="75px">
                    ID#
                </th>
                <th width="75px">
                    Media
                </th>
                <th width="150px">
                    Street Address
                </th>
                <th width="50px">
                    Zip Code
                </th>
                <th width="75px">
                    City
                </th>
                <th width="50px">
                    Square Footage
                </th>
                <th width="50px">
                    BR/BA
                </th>
                <th width="75px">
                    Current Price
                </th>
                <th width="75px">
                    Move In Now Price
                </th>
                <th width="40px">
                    Pets
                </th>
                <th width="50px">
                    Smoking
                </th>
                <th width="75px">
                    Open House
                </th>
                <th width="75px">
                    Ending
                </th>
            </tr>
        
            <tr class="searchResult">
                
                <td class="idNumb">
                    Test ID
                </td>
                <td>
                    Media
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
   
            <tr class="searchResult">
                
                <td class="ID">
                    Test ID
                </td>
                <td>
                    MEdia
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
        </button>
    </form>
</div>

<?php
	include 'Footer.php';
?>