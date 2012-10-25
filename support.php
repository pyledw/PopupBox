<?php

        $title = "Contact LeaseHood";
	include 'Header.php';
?>
    <h1 class="Title">Contact LeaseHood</h1>
    <hr class="Title" />
    <div id="mainContent">
        <form action="processComments.php" method="post" style="float: right;">
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
        
        <p>LeaseHood, LLC<br/>
        P.O. Box 158479<br/>
        Nashville, Tennessee 37215</p>
        
        <p>P: (615) 202-0549 (M-F, 8 am to 5 pm, CST)<br/>
        F: (866) 357-1018</p>
        
        <a href="faq.php" class="button">Frequently Asked Questions</a>
    
    </div>

<?php
    include 'Footer.php';
?>