                 
<?php
        $title = "Welcome";
	include 'Header.php';
?>

<!-- PAGE CONTENT -->

        <h1 class="Title">Welcome to LeaseHood</h1>
        <hr class="Title" />
        <h2 class="Title">"Putting the Best Residents in Rental Homes"</h2>

        <div id="mainContent">

            <div id="LayoutLeft">
                <p><a href="#" class="button">How it Works</a></p>
                <p><a href="#" class="button">I am a Renter</a></p>
                <p><a href="#" class="button">I am a Landlord</a></p>
            </div>


                <div id="layoutRight">

                    <img src="images/House.jpg" alt="House" style="float:right" />
                    <p>How it works</p>
                    <p>Rent a property</p>
                    <p>List a home</p>

                </div>

                    <form action="welcomePageSearch.php" method="post">

                        <input type="text" style="color:grey;'" name="zip" value="Zip, State, or County" onfocus='this.value = changeTextInBox(this.value,this.defaultValue), this.style.color = changeColorInBox(this.value,this.defaultValue);' 
                                    onblur="this.value = textBoxExit(this.value, this.defaultValue), this.style.color = textBoxExitColor(this.value,this.defaultValue);"/>
                        <input type="submit" class="button" name="homeSearch" value="Quick Home Search" style="padding:5px 15px 5px 15px; margin:0 20px 0 20px;" />
                        <input type="submit" class="button" name="applicantSearch" value="Quick Applicant Search" style="padding:5px 15px 5px 15px; margin:0 20px 0 20px;" />

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
