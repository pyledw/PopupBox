<?php
    $listingID = $_GET[listingID];
    $title = 'Listing #HREDS2345'; //This will be retrieved from the element that was clicked on in the search
    
    
    include 'Header.php';
    echo $listingID;
?>
    <link rel="stylesheet" type="text/css" href="css/homeListing.css" /><!--Link to Main css file -->
    <div id="mainContent">
        <!--Content will be retrieved via php.  This is just a template for user latter-->
        <h1 class="Title">This is the Title</h1>
        <hr class="Title" />
        <table id="houseListing">
            <tr>
                <td colspan="3" width="600px">
                    245 Brown Street - HREDS2345  <a href="#">Map It</a> - Print Brochure
                </td>
                <td colspan="1" class="greyBackground">
                    Current Rental Rate: $900
                </td>
            </tr>
            <tr>
                <td>
                    <img class="mainPhoto" src="#" alt="Main Photo">
                </td>
                    
                <td>
                    <img class="thumbs" src="#" alt="thumbnail">
                    <img class="thumbs" src="#" alt="thumbnail">
                    <img class="thumbs" src="#" alt="thumbnail"><br/>
                    <img class="thumbs" src="#" alt="thumbnail">
                    <img class="thumbs" src="#" alt="thumbnail">
                    <img class="thumbs" src="#" alt="thumbnail"><br/>
                    <img class="thumbs" src="#" alt="thumbnail">
                    <img class="thumbs" src="#" alt="thumbnail">
                </td>
                <td class="alignCenter">
                    <a class="button" href="#">Move in Now $850</a><br/><br/>
                    <a class="button" href="#">Save this home</a><br/><br/>
                    <a class="button" href="#">Print Flyer</a><br/><br/>
                </td>
                <td>
                    BR: 4 BA:3<br/>
                    SQ: 1,500<br/>
                    AC: Window Heat: Stove<br/>
                    Pets: None
                    Deposit: $740
                    Open House 1: 09/24/3323
                    Open House 2: 04/34/2425
                    Listing End: 05/04/2345
                    Date Available: 03/24/2012
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                    The description about this listing will do here.  For now I will just show the blank data.
                </td>
            </tr>
            <tr>
                <td class="redBackground" colspan="3">
                    Bid History
                </td>
                <td rowspan="6">
                    Here will be the option to place a bid
                    
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Username
                </td>
                <td>
                    Bid Amount
                </td>
            </tr>
            <tr>
                <td  colspan="2">
                    USERNAME
                </td>
                <td>
                    BID AMOUNT
                </td>
            </tr>
            
            <tr>
                <td  colspan="2">
                    USERNAME
                </td>
                <td>
                    BID AMOUNT
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td colspan="4">
                    MyHood Match
                </td>
            </tr>
        </table>



    </div>
<?php
    include 'Footer.php';
?>
