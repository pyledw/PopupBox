<?php

        $title = "Contact LeaseHood";
	include 'Header.php';
        $userID = $_SESSION[userID];
?>

    <h1 class="Title">Contact LeaseHood</h1>
    <hr class="Title" />
    <div id="mainContent">
        PAY LISTING FEE HERE<br/><br/>
        
        Form
        
        <form action="payApplicationFeeRedirect.php" method="post">
            <input type="text" name="propertyID" value="<?php echo $userID; ?>" style="display: none;" />
        <table border="0" >
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