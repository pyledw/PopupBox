<!-- this page contains the navigation elements for MyHood.  These are displayed if the user is logged in and
     at the myHood page.-->
<?php               
    /**
     * This page contains the MyHood navigation bar.  
     * 
     * This is the navigation bar for when the user is on the my hood page.
     * It will determin the usertype and then display the needed navigaiton
     * elements.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     * 
     */

include 'myHoodFunctions.php';

updateBids($_SESSION[UserID]);

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
                    

                    
                    if($userType == '2')
                    {
                       echo '<a href="newListing1.php">Create New Listing</a>';
                    }
                   
                    
                ?>
            </div>
            <a href="popupSpecials.php" rel="facebox"><img src="images/Special.jpg" class="special" style="margin-top: -40px;" /></a>

