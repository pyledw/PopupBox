<?php
    $title = "New Listing Part 1";
    include 'Header.php';
    
    /**
     * First Check is to ensur ethe user is logged in, and get the data of the correct user and property listing.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * 
     * At the end of the page it check to see that if the Property was complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    
    //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }
    
    if(isset($_SESSION[propertyID]))
    {
        $propertyID = $_SESSION[propertyID];
    }
    else if(isset ($_POST[propertyID]))
    {
        $propertyID = $_POST[propertyID];
        $_SESSION[propertyID] = $propertyID;
    }

    include_once 'config.inc.php';
    $con= get_dbconn("");
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM PROPERTY
        WHERE PropertyID ='$propertyID'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //Setting the query results into a variable
    $row = mysql_fetch_array($result);
    
?>
<!-- Page Content -->

    <h1 class="Title">New House Listing - House Details</h1>
    <hr class="Title">
    <div id="mainContent">
        <form id="listingForm" method="post" action="newListing1Redirect.php">
            <table class="tableForm">
                <font class="formheader">New Home Listing Basics</font>
                <tr>
                    <td>
                        <label class="label">Address:</label><br/><input class="required" type="text" name="address" value="<?php echo $row[Address]?>">
                    </td>
                    <td>
                        <label class="label">City:</label><br/><input class="required" type="text" name="city" value="<?php echo $row[City]?>">
                    </td>
                    <td>
                        <label class="label">State:</label><br/><input class="required" type="text" name="state" value="<?php echo $row[State]?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Zip Code:</label><br/><input class="required" type="text" name="zipCode" value="<?php echo $row[Zip]?>">
                    </td>
                    <td colspan="2">
                        <label class="label">Square feet:</label><br/><input class="required" type="text" name="sqrFt" value="<?php echo $row[SF]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <label class="label">County:</label><br/><input type="text" name="county" value="<?php echo $row[County]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Number of bedrooms:</label><br/>
                        <select name="bedRooms">

                            <option <?php if($row[BedRoom] == '1'){echo '  selected=" selected" ' ;} ?>>
                                1
                            </option>
                            <option <?php if($row[Bedroom] == '2'){echo "  selected=' selected'";}?>>
                                2
                            </option>
                            <option <?php if($row[Bedroom] == '3'){echo "  selected=' selected'";}?>>
                                3
                            </option >
                            <option<?php if($row[Bedroom] == '4'){echo "  selected=' selected'";}?>>
                                4
                            </option>
                            <option<?php if($row[Bedroom] == '4+'){echo "  selected=' selected'";}?>>
                                4+
                            </option>
                        </select>
                    </td>
                    <td>
                         <label class="label">Number of bathrooms:</label><br/>
                         <select name="bathRooms">
                            <option <?php if($row[Bath] == '1'){echo "  selected=' selected'";}?>>
                                1
                            </option>
                            <option <?php if($row[Bath] == '1.5'){echo "  selected=' selected'";}?>>
                                1.5
                            </option>
                            <option <?php if($row[Bath] == '2'){echo "  selected=' selected'";}?>>
                                2
                            </option>
                            <option <?php if($row[Bath] == '2.5'){echo "  selected=' selected'";}?>>
                                2.5
                            </option>
                            <option <?php if($row[Bath] == '3'){echo "  selected=' selected'";}?>>
                                3
                            </option>
                            <option <?php if($row[Bath] == '3+'){echo "  selected=' selected'";}?>>
                                3+
                            </option>
                        </select>
                    </td>
                    <td>
                        <label class="label">Garage:</label><br/>
                        <select name="garage">
                            <option <?php if($row[Garage] == '1-car garage'){echo "  selected=' selected'";}?>>
                                1-car garage
                            </option>
                            <option <?php if($row[Garage] == '2-car garage'){echo "  selected=' selected'";}?>>
                                2-car garage
                            </option>
                            <option <?php if($row[Garage] == '1-car carport'){echo "  selected=' selected'";}?>>
                                1-car carport
                            </option>
                            <option <?php if($row[Garage] == '2-car carport'){echo "   selected=' selected'";}?>>
                                2-car carport
                            </option >
                            <option <?php if($row[Garage] == 'None'){echo "  selected=' selected'";}?>>
                                None
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Type of heating:</label><br/>
                        <select name="heating">
                            <option <?php if($row[Heating] == 'Central'){echo "  selected=' selected'";}?>>
                                Central
                            </option>
                            <option <?php if($row[Heating] == 'Wall'){echo "  selected=' selected'";}?>>
                                Wall
                            </option>
                            <option <?php if($row[Heating] == 'Ceiling'){echo "  selected=' selected'";}?>>
                                Ceiling
                            </option>
                            <option <?php if($row[Heating] == 'Portable'){echo "  selected=' selected'";}?>>
                                Portable
                            </option>
                            <option <?php if($row[Heating] == 'Other'){echo "  selected=' selected'";}?>>
                                Other
                            </option>
                            <option <?php if($row[Heating] == 'None'){echo "  selected=' selected'";}?>>
                                None
                            </option>
                        </select>
                    </td>
                    <td>
                        <label class="label">Type of air conditioning:</label><br/>
                        <select name="airConditioning">
                            <option <?php if($row[AC] == 'Central'){echo "  selected=' selected'";}?>>
                                Central
                            </option>
                            <option <?php if($row[AC] == 'Window'){echo " selected=' selected'";}?>>
                                Window
                            </option>
                            <option <?php if($row[AC] == 'Other'){echo " selected=' selected'";}?>>
                                Other
                            </option>
                            <option <?php if($row[AC] == 'None'){echo " selected=' selected'";}?>>
                                None
                            </option>
                        </select>
                    </td>
                    <td>
                        <label class="label">Media (cable, satellite, etc.):</label><br/>
                        <select name="media">
                            <option <?php if($row[Media] == 'Cable'){echo " selected=' selected'";}?>>
                                Cable
                            </option>
                            <option <?php if($row[Media] == 'Satellite'){echo " selected=' selected'";}?>>
                                Satellite
                            </option>
                            <option <?php if($row[Media] == 'Other'){echo " selected=' selected'";}?>>
                                Other
                            </option>
                            <option <?php if($row[Media] == 'None'){echo " selected=' selected'";}?>>
                                None
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label class="label"> Ice Maker:</label><br/>
                        Yes<input type="radio" name="ice"  value="1" <?php if($row[IceMaker] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="ice"   value="0" <?php if($row[IceMaker] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        <label class="label">Dish Washer:</label><br/>
                        Yes<input type="radio" name="dishWasher"  value="1" <?php if($row[DishWasher] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="dishWasher"   value="0" <?php if($row[DishWasher] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        <label class="label">Disposal:</label><br/>
                        Yes<input type="radio" name="disposal"  value="1" <?php if($row[Disposal] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="disposal"   value="0" <?php if($row[Disposal] != '1'){echo "checked='checked'";}?> />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Clothes Washer:</label><br/>
                        Yes<input type="radio" name="clothesWasher"  value="1" <?php if($row[ClothesWasher] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="clothesWasher"   value="0" <?php if($row[ClothesWasher] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        <label class="label">Clothes Dryer:</label><br/>
                        Yes<input type="radio" name="clothesDryer"  value="1" <?php if($row[ClothesDryer] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="clothesDryer"   value="0" <?php if($row[ClothesDryer] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        <label class="label">Microwave:</label><br/>
                        Yes<input type="radio" name="microwave"  value="1" <?php if($row[Microwave] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="microwave"   value="0"  <?php if($row[Microwave] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Security System:</label><br/>
                        Yes<input type="radio" name="security"  value="1" <?php if($row[SecurityAlarm] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="security"   <?php if($row[SecurityAlarm] != '1'){echo " checked='checked'";}?> value="0" />
                    </td>
                    <td>
                        <label class="label">Deck:</label><br/>
                        Yes<input type="radio" name="deck"  value="1" <?php if($row[Deck] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="deck"   value="0" <?php if($row[Deck] != '1'){echo " checked='checked'";}?>/>
                    </td>
                    <td>
                        <label class="label">Pool:</label><br/>
                        Yes<input type="radio" name="pool"  value="1" <?php if($row[Pool] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="pool"   value="0" <?php if($row[Pool] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Fenced:</label><br/>
                        Yes<input type="radio" name="fenced"  value="1" <?php if($row[Fenced] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="fenced"   value="0" <?php if($row[Fenced] != '1'){echo " checked='checked'";}?>/>
                    </td>
                    <td colspan="2">
                        <label class="label">ADA (Americans with Disability Act) compliant?</label><br/>
                        Yes<input type="radio" name="ADA"  value="1" <?php if($row[ADACompliant] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="ADA"   value="0" <?php if($row[ADACompliant] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label">Clothes Dryer Hookups?</label><br/>
                        Yes<input type="radio" name="dryerHookup"  value="1" <?php if($row[ClothesDryerHookup] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="dryerHookup"   value="0" <?php if($row[ClothesDryerHookup] != '1'){echo " checked='checked'";}?>/>
                    </td>
                    <td>
                        <label class="label">Clothes Washer Hookups?</label><br/>
                        Yes<input type="radio" name="washerHookup"  value="1" <?php if($row[ClothesWasherHookup] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="washerHookup"   value="0" <?php if($row[ClothesWasherHookup] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="vertical-align: central;">
                        <label class="label">Comments about the home:</label><br/>
                    </td>
                    <td colspan="2">
                        <textarea id="message" name="description" rows="4" cols="50"><?php echo $row[Description]?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" class="button">Save and Continue</button>
                        <button type="reset" class="button">Clear</button>
                    </td>
                </tr>
            </table> 
            <?php
        //create finding email query
        $gettingEmail = "select Email from USER where UserID ='$_SESSION[userID]'";
        $getEmail = $con->query($gettingEmail);
        if (!getEmail)
        {   
            echo 'Could not find email';
        }   
        else  
        {
        //setting and sending the email and its contents. 
        $row = $getEmail->fetch_object();
        $email = $row->Email;
        $from = "From: noReply@leasehood.com \r\n";
        $subject = "Welcome To LeaseHood.com";
        $mesg = "Test email. This is sent from the tester at Leasehood.com \n".
                "Please ignore if you do not know this site. \n";
        mail($email, $subject, $mesg, $from);
        
	echo "A confirmation email has been sent to your acount."
        ."If this email appears in your junk folder, please mark it as not junk.";
    
        }
            ?>
        </form>
    </div>         
    <?php
        include 'Footer.php';
    ?>
    
<script type="text/javascript">
	$(document).ready(function(){
		$("#message").charCount({
			allowed: 500,		
			warning: 50,
			counterText: 'Characters left: '	
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#listingForm").validate({
        ignoreTitle: true,
        onkeyup: false,
        onclick: false
        
    });
  });
</script>
