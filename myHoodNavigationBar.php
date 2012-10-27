<?php                    
//SETTING USER TYPE - Will be defined by database eventually set from the database
$userType = $_SESSION["type"];
?>

<link rel="stylesheet" type="text/css" href="css/myHoodStyle.css" /><!--Link to Main css file -->

<div id="myHoodNavigation">
                <?php
                    if($fileName == "myHood.php")
                    {
                       echo '<a class="current" href="myHood.php">Home</a>';
                    }
                    else
                    {
                        echo '<a href="myHood.php">Home</a>';
                    }
                ?>
                <?php
                    if($fileName == "myHood_Account.php")
                    {
                       echo '<a class="current" href="myHood_Account.php">Account</a>';
                    }
                    else
                    {
                        echo '<a href="myHood_Account.php">Account</a>';
                    }
                ?>
                <?php
                    if($fileName == "myHood_Mail.php")
                    {
                       echo '<a class="current" href="myHood_Mail.php">Mail</a>';
                    }
                    else
                    {
                        echo '<a href="myHood_Mail.php">Mail</a>';
                    }
                    

                    
                    if($userType == '2')
                    {
                       echo '<a href="newListing1.php">Create New Listing</a>';
                    }
                   
                    
                ?>
            </div>
            <a href="popupSpecials.php" rel="facebox"><img src="images/Special.jpg" class="special" style="margin-top: -40px;" /></a>

