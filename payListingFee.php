<?php
    /**
     * This page allow the user to pay thier listing fee
     */
        $title = "Contact LeaseHood";
	include 'Header.php';
        $propertyID = $_GET[propertyID];
        if(isset($_SESSION['propertyID']))
        {
            $propertyID = $_SESSION['propertyID'];
        }
        
    include_once 'config.inc.php';
    $con = get_dbconn("");

    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
    WHERE PropertyID ='$propertyID'");
        
    if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
    $row = mysql_fetch_array($result);
    
    
    
    if($row[IsPaid] == 1)
    {
        header( 'Location: /myHood.php' );
    }
?>



    <h1 class="Title">Pay for Listing</h1>
    <hr class="Title" />
    <div id="mainContent">
        PAY LISTING FEE HERE<br/><br/>
        <?php 
        if(!isset($propertyID))
        {
            echo 'There is no property specified with this pament.  DO NOT PAY FEE!<br/>';
        }
        ?>
        
        Form
        
        <form action="payListingFeeRedirect.php" method="post">
            <input type="text" name="propertyID" value="<?php echo $propertyID; ?>" style="display: none;" />
        <table class="tableForm" border="0" >
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" size="15" maxlength="25"/></td>
            </tr>
            <tr>
                <td>SUCCESS/FAILURE</td>
                <td><input type="text" name="result" size="15" maxlength="25"/></td>
            </tr>
            <tr>
                <td><input type="submit"  value="Pay" class="button" />
            </tr>
        </table>
        </form>
    </div>
    
<?php
        include 'Footer.php';
?>