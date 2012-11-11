<!-- This is the index page, or Landing Page.  It displays the inital information and allows the user to search by zip code. -->

<?php
        $title = "Welcome";
	include 'Header.php';
?>

<!-- PAGE CONTENT -->

        <h1 class="Title">Welcome to LeaseHood</h1>
        <hr class="Title" />
        <h2 class="Title">"Putting the Best Residents in Rental Homes"</h2>

        <div id="mainContent">
            <table width="1000px">
                <tr style="height: 35px;">
                    <td>
                        <a href="gettingStarted.php" class="button">Getting Started</a><br/>
                    </td>
                     <td>
                        Learn the basics of LeaseHood
                    </td>
                     <td colspan="2" rowspan="4" align="right">
                        <!--<img src="images/House.jpg" alt="House" style="float:right" />-->
                         <?php
                            $pictureArray = array('images/keys.jpg','images/housemag.jpg','images/House.jpg','images/housekeyboard.jpg');
                            shuffle($pictureArray);
                            for($picturesLoop = 0; $picturesLoop < 1; $picturesLoop++)
                            {
                                echo "<img src=\"";
                                echo $pictureArray[$picturesLoop];
				echo "\"/>";   
                            }
                         ?>
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td>
                       <a href="howItWorksRenters.php" class="button">I am a Renter</a><br/>
                    </td>
                     <td>
                        Learn how LeaseHood can help you find your next home
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td>
                        <a href="#" class="button">I am a Landlord</a><br/>
                    </td>
                     <td>
                        Learn how Leasehood can help you find your next resident
                    </td>
                </tr>
            </table>


                    <form action="searchRedirect.php" method="post">
                        <input name="type" value="zip" style="display:none;" />
                        <input type="text" style="color:grey;'" name="search" value="Zip Code" onfocus='this.value = changeTextInBox(this.value,this.defaultValue), this.style.color = changeColorInBox(this.value,this.defaultValue);' 
                                    onblur="this.value = textBoxExit(this.value, this.defaultValue), this.style.color = textBoxExitColor(this.value,this.defaultValue);"/>
                        <button class="button" type="submit" name="homeSearch" value="Quick Home Search" style="margin:0 20px 0 20px;">Quick Home Search</button>

                    </form>

                <div id="layoutBottom">

                    <p>
                        <img src="images/BBB.png" alt="BBB" style="float:right" />
                        <img src="images/Flame.png" alt="Flame" style="float:right" />
                        <img src="images/homes.png" alt="Homes" style="float:right" />
                    </p>
                </div>
        </div>
        
	<?php
	include 'Footer.php';
?>
