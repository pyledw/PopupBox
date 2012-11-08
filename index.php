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
                        <a href="#" class="button">How it Works</a><br/>
                    </td>
                     <td>
                        How it works
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
                       <a href="#" class="button">I am a Renter</a><br/>
                    </td>
                     <td>
                        Rent a property
                    </td>
                </tr>
                <tr style="height: 35px;">
                    <td>
                        <a href="#" class="button">I am a Landlord</a><br/>
                    </td>
                     <td>
                        List a home
                    </td>
                </tr>
            </table>


                    <form action="searchRedirect.php" method="post">
                        <input name="type" value="zip" style="display:none;" />
                        <input type="text" style="color:grey;'" name="search" value="Zip" onfocus='this.value = changeTextInBox(this.value,this.defaultValue), this.style.color = changeColorInBox(this.value,this.defaultValue);' 
                                    onblur="this.value = textBoxExit(this.value, this.defaultValue), this.style.color = textBoxExitColor(this.value,this.defaultValue);"/>
                        <input type="submit" class="button" name="homeSearch" value="Quick Home Search" style="padding:5px 15px 5px 15px; margin:0 20px 0 20px;" />

                    </form>

                <div id="layoutBottom">

                    <p>

                        <img src="images/Fox.png" alt="Fox" style="float:left" />
                        <img src="images/NetQuote.png" alt="Net Quote" style="float: left" />
                        <img src="images/FirstTN.png" alt="FirstTN" style="float: left" />
                        <img src="images/BBB.png" alt="BBB" style="float:left" />
                        <img src="images/Flame.png" alt="Flame" style="float:left" />
                        <img src="images/homes.png" alt="Homes" style="float:left" />
                    </p>
                </div>
        </div>
        
	<?php
	include 'Footer.php';
?>
