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
                        Address:<input class="required" type="text" name="address" value="<?php echo $row[Address]?>">
                    </td>
                    <td>
                        City:<input class="required" type="text" name="city" value="<?php echo $row[City]?>">
                    </td>
                    <td>
                        State:<input class="required" type="text" name="state" value="<?php echo $row[State]?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Zip Code:<input class="required" type="text" name="zipCode" value="<?php echo $row[Zip]?>">
                    </td>
                    <td colspan="2">
                        Approximate square feet of heated living space<input class="required" type="text" name="sqrFt" value="<?php echo $row[SF]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        County:<input type="text" name="county" value="<?php echo $row[County]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <td>
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
                    </td>
                    <td>
                         Number of bathrooms:
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
                        Garage:
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
                        Type of heating:
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
                        Type of air conditioning:
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
                    </td>
                </tr>
                <tr>
                    <td>
                        Ice Maker<br/>
                        Yes<input type="radio" name="ice"  value="1" <?php if($row[IceMaker] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="ice"   value="0" <?php if($row[IceMaker] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        Dish Washer <br/>
                        Yes<input type="radio" name="dishWasher"  value="1" <?php if($row[DishWasher] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="dishWasher"   value="0" <?php if($row[DishWasher] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        Disposal<br/>
                        Yes<input type="radio" name="disposal"  value="1" <?php if($row[Disposal] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="disposal"   value="0" <?php if($row[Disposal] != '1'){echo "checked='checked'";}?> />
                    </td>
                </tr>
                <tr>
                    <td>
                        Clothes Washer<br/>
                        Yes<input type="radio" name="clothesWasher"  value="1" <?php if($row[ClothesWasher] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="clothesWasher"   value="0" <?php if($row[ClothesWasher] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        Clothes Dryer<br/>
                        Yes<input type="radio" name="clothesDryer"  value="1" <?php if($row[ClothesDryer] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="clothesDryer"   value="0" <?php if($row[ClothesDryer] != '1'){echo " checked='checked'";}?> />
                    </td>
                    <td>
                        Microwave<br/>
                        Yes<input type="radio" name="microwave"  value="1" <?php if($row[Microwave] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="microwave"   value="0"  <?php if($row[Microwave] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Security System<br/>
                        Yes<input type="radio" name="security"  value="1" <?php if($row[SecurityAlarm] == '1'){echo " checked='checked'";}?> />
                        No<input type="radio" name="security"   <?php if($row[SecurityAlarm] != '1'){echo " checked='checked'";}?> value="0" />
                    </td>
                    <td>
                        Deck<br/>
                        Yes<input type="radio" name="deck"  value="1" <?php if($row[Deck] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="deck"   value="0" <?php if($row[Deck] != '1'){echo " checked='checked'";}?>/>
                    </td>
                    <td>
                        Pool<br/>
                        Yes<input type="radio" name="pool"  value="1" <?php if($row[Pool] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="pool"   value="0" <?php if($row[Pool] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Fenced<br/>
                        Yes<input type="radio" name="fenced"  value="1" <?php if($row[Fenced] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="fenced"   value="0" <?php if($row[Fenced] != '1'){echo " checked='checked'";}?>/>
                    </td>
                    <td colspan="2">
                        Are you advertising this house as ADA (Americans with Disability Act) compliant?<br/>
                        Yes<input type="radio" name="ADA"  value="1" <?php if($row[ADACompliant] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="ADA"   value="0" <?php if($row[ADACompliant] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Clothes Dryer Hookups?<br/>
                        Yes<input type="radio" name="dryerHookup"  value="1" <?php if($row[ClothesDryerHookup] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="dryerHookup"   value="0" <?php if($row[ClothesDryerHookup] != '1'){echo " checked='checked'";}?>/>
                    </td>
                    <td>
                        Clothes Washer Hookups?<br/>
                        Yes<input type="radio" name="washerHookup"  value="1" <?php if($row[ClothesWasherHookup] == '1'){echo " checked='checked'";}?>/>
                        No<input type="radio" name="washerHookup"   value="0" <?php if($row[ClothesWasherHookup] != '1'){echo " checked='checked'";}?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="1" style="vertical-align: central;">
                        Comments about the home:
                    </td>
                    <td colspan="2">
                        <textarea id="message" name="description" rows="4" cols="50" value="<?php echo $row[Description]?>"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" class="button">Save and Continue</button>
                        <button type="reset" class="button">Clear</button>
                    </td>
                </tr>
            </table> 
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
        ignoreTitle: true
        
    });
  });

   $(function(){
         $.fn.formLabels();
   });
</script>
