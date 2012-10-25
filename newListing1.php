<?php
    $title = "New Listing Part 1";
    include 'Header.php';
    
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

    //Creates a connection to the database and stores the connection string in $con and the Selected database in $select
    include_once 'config.inc.php';
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
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
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing1Redirect.php">
                <?php if(isset($_POST[propertyID])) {echo '<input type="text" name="propertyID" value="' . $_POST[propertyID] . '"/>';} ?>
                Address:<input type="text" name="address" value="<?php echo $row[Address]?>">
                City:<input type="text" name="city" value="<?php echo $row[City]?>">
                State:<input type="text" name="state" value="<?php echo $row[State]?>">
                Zip Code:<input type="text" name="zipCode" value="<?php echo $row[Zip]?>">
                Approximate square feet of heated living space<input type="text" name="sqrFt" value="<?php echo $row[SF]?>">
                
                <br/>
                <hr/>
                <br/>
                Number of bedrooms:
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
                Number of bathrooms:<select name="bathRooms">
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
                Garage:<select name="garage">
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
                Type of heating:<select name="heating">
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
                Type of air conditioning:<select name="airConditioning">
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
                Media (cable, satellite, etc.)
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
                Ice Maker
                Yes<input type="radio" name="ice"  value="1" <?php if($row[IceMaker] == '1'){echo " checked='checked'";}?> />
                No<input type="radio" name="ice"   value="0" <?php if($row[IceMaker] == '0'){echo " checked='checked'";}?> /><br/>
                Dish Washer
                Yes<input type="radio" name="dishWasher"  value="1" <?php if($row[DishWasher] == '1'){echo " checked='checked'";}?> />
                No<input type="radio" name="dishWasher"   value="0" <?php if($row[DishWasher] == '0'){echo " checked='checked'";}?> /><br/>
                Disposal
                Yes<input type="radio" name="disposal"  value="1" <?php if($row[Disposal] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="disposal"   value="0" <?php if($row[Disposal] == '0'){echo "checked='checked'";}?> /><br/>
                Clothes Washer
                Yes<input type="radio" name="clothesWasher"  value="1" <?php if($row[ClothesWasher] == '1'){echo " checked='checked'";}?> />
                No<input type="radio" name="clothesWasher"   value="0" <?php if($row[ClothesWasher] == '0'){echo " checked='checked'";}?> /><br/>
                Clothes Dryer
                Yes<input type="radio" name="clothesDryer"  value="1" <?php if($row[ClothesDryer] == '1'){echo " checked='checked'";}?> />
                No<input type="radio" name="clothesDryer"   value="0" <?php if($row[ClothesDryer] == '0'){echo " checked='checked'";}?> /><br/>
                Microwave
                Yes<input type="radio" name="microwave"  value="1" <?php if($row[Microwave] == '1'){echo " checked='checked'";}?> />
                No<input type="radio" name="microwave"   value="0"  <?php if($row[Microwave] == '0'){echo " checked='checked'";}?>/><br/>
                Security System
                Yes<input type="radio" name="security"  value="1" <?php if($row[SecurityAlarm] == '1'){echo " checked='checked'";}?> />
                No<input type="radio" name="security"   <?php if($row[SecurityAlarm] == '0'){echo " checked='checked'";}?> value="0" /><br/>
                Deck
                Yes<input type="radio" name="deck"  value="1" <?php if($row[Deck] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="deck"   value="0" <?php if($row[Deck] == '0'){echo " checked='checked'";}?>/><br/>
                Pool
                Yes<input type="radio" name="pool"  value="1" <?php if($row[Pool] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="pool"   value="0" <?php if($row[Pool] == '0'){echo " checked='checked'";}?>/><br/>
                Fenced
                Yes<input type="radio" name="fenced"  value="1" <?php if($row[Fenced] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="fenced"   value="0" <?php if($row[Fenced] == '0'){echo " checked='checked'";}?>/><br/>
                Are you advertising this house as ADA (Americans with Disability Act) compliant?
                Yes<input type="radio" name="ADA"  value="1" <?php if($row[ADACompliant] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="ADA"   value="0" <?php if($row[ADACompliant] == '0'){echo " checked='checked'";}?>/><br/>
                
                Clothes Dryer Hookups?
                Yes<input type="radio" name="dryerHookup"  value="1" <?php if($row[ClothesDryerHookup] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="dryerHookup"   value="0" <?php if($row[ClothesDryerHookup] == '0'){echo " checked='checked'";}?>/><br/>
                
                Clothes Washer Hookups?
                Yes<input type="radio" name="washerHookup"  value="1" <?php if($row[ClothesWasherHookup] == '1'){echo " checked='checked'";}?>/>
                No<input type="radio" name="washerHookup"   value="0" <?php if($row[ClothesWasherHookup] == '0'){echo " checked='checked'";}?>/><br/>
                
                Comments about the home:<textarea id="message" name="description" rows="4" cols="50" value="<?php echo $row[Description]?>"></textarea>

                <br/>
                <br/>
                <button type="submit" class="button">Save and Continue</button>
                <button type="reset" class="button">Clear</button>
                
                
                
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
