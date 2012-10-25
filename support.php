<?php

        $title = "Contact LeaseHood";
	include 'Header.php';
?>
    <h1 class="Title">Contact LeaseHood</h1>
    <hr class="Title" />
    <!--<div id="mainContent">-->
        <form action="processComments.php" method="post" style="display: inline;">
        <table border="0" align="left" >
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" size="15" maxlength="25"/></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="lname" size="15" maxlength="25"/></td>
            </tr>
            <tr>
                <td>Comments: </td>
                <td><textarea name="comments" rows="6" cols="30" wrap="virtual"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" align="center" value="Submit" class="button" />
            </tr>
        </table>
        </form>
    
    <!--</div>-->

<?php
    include 'Footer.php';
?>