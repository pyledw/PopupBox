

<?php
    /**
     * This page is the landing page for the site.  This is the inital location that any user will reach
     * if they go to Leasehood.com
     */
        $title = "LeaseHood";
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
                        <a href="howItWorksLandlords.php" class="button">I am a Landlord</a><br/>
                    </td>
                     <td>
                        Learn how Leasehood can help you find your next resident
                    </td>
                </tr>
            </table>


                    <form id="searchForm" action="searchRedirect.php" method="post">
                        <input name="type" value="zip" style="display:none;" />
                        <input id="input" type="text" style="color:grey;'" name="search" value="Zip Code" onfocus='if(this.value=="Zip Code"){this.value=""; this.style.color = "black";}'
                               onblur="if(this.value == ''){this.value='Zip Code';
                                            this.style.color='grey'}"/>
                        <button class="button" type="submit" name="homeSearch" value="Quick Home Search" style="margin:0 20px 0 20px;">Quick Home Search</button>

                    </form>
        </div>
        
	<?php
	include 'Footer.php';
        ?>

        
        
        <script>
        //This script is setting the input field to nothing if the user searches
        //without having entered anything.
            $(document).ready(function(){
                $("#searchForm").submit(function(){
                    if($("#input").val() == 'Zip Code')
                        {
                            $("#input").val("");
                        }
                });
            
        });
        </script>
