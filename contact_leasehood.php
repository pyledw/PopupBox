<?php

        $title = "Contact LeaseHood";
	include 'Header.php';
?>
    <h1 class="Title">Contact LeaseHood</h1>
    <hr class="Title" />
    <div id="mainContent">
        <form action="processComments.php" method="post">
        <table border="0" align="center">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" size="10" maxlength="25"></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="lname" size="10" maxlength="25"</td>
            </tr>
            <tr>
                <td>Comments: </td>
                <td><textarea name="comments" rows="8" cols="40" wrap="virtual" /></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" />
            </tr>
        </table>
        </form>
    </div>

<?php
    include 'Footer.php';
?>