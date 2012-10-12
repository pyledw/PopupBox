
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
                ?>
            </div>
            <img src="images/Special.jpg" class="special" style="margin-top: -40px;">

