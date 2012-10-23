<?php
        $title = "Search Homes";
	include 'Header.php';
        if(!isset($_COOKIE['search']))
        {
            header( 'Location: /searchHomes.php' );
        }
        $searchTerm = $_COOKIE['search'];
        
        
        
?>

<?php
        //Connecting to the sql database
        $con = mysql_connect($db_server,$db_user,$db_pass );
        if(!$con)
        {
            die('could not connect: ' .mysql_error());
        }
        else
        {
        //echo "connected to mySQL";
        }
        
        //Selecting the Database
        $select = mysql_selectdb($db_database, $con);
        if(!$select)
        {
            die('could not connect: ' .mysql_error());
        }
        

    ?>


<script>


$(document).ready(function(){
  $(".searchResult").click(function(){
      var ID = "Default"
      ID = $(this).attr("value");
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
        
            <?php
        //Query the database for only the row containing that users information
        $result = mysql_query("SELECT * FROM PROPERTY
            ");
        
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
        //fetching the array of query elements
        while($row = mysql_fetch_array($result))
        {
            
            echo '<tr class="searchResult" value="'.$row[PropertyID].'">
                
                <td class="idNumb">
                    '.$row[PropertyID].'
                </td>
                <td>
                    '.$row[Media].'
                </td>
                <td>
                    '.$row[Address].'
                </td>
                <td>
                    '.$row[Zip].'
                </td>
                <td>
                    '.$row[City].'
                </td>
                <td>
                    '.$row[SQ].'
                </td>
                <td>
                    '.$row[Bedroom].' '.$row[Bath].'
                </td>
                <td>
                    '.$row[StartingBod].'
                </td>
                <td>
                    '.$row[RentNowRate].'
                </td>
                <td>
                    '.$row[AllowDogs].'
                </td>
                <td>
                    '.$row[AllowSmoking].'
                </td>
                <td>
                    '.$row[DateTimeOpenHouse1].' <br/>
                    '.$row[DateTimeOpenHouse2].'    
                </td>
                <td>
                    <font class="redTextArea">'. date("Y-m-d") . " <br/><br/> " . $row[DatePFOEndAccept].'</font>
                </td>
            
            </tr>
   ';
        }
    ?>
    </table>
        </button>
    </form>
</div>

<?php
	include 'Footer.php';
?>