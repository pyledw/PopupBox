<?php
    $title = "New Listing Part 1";
    include 'Header.php';
?>
<!-- Page Content -->

    <h1 class="Title">New House Listing - House Details</h1>
    <hr class="Title">
    <div id="mainContent">
        <form class="formStyle" width="90%" height="90%" method="post" action="newListing2.php">
                Address:<input type="text" name="address">
                City:<input type="text" name="city">
                State:<input type="text" name="state">
                Zip Code:<input type="text" name="zipCode">
                Approximate square feet of heated living space<input type="text" name="sqrFt">
                <br/>
                <hr/>
                <br/>
                Number of bedrooms:<select name="bedRooms">
                    <option>
                        1
                    </option>
                    <option>
                        2
                    </option>
                    <option>
                        3
                    </option>
                    <option>
                        4
                    </option>
                    <option>
                        4+
                    </option>
                </select>
                Number of bathrooms:<select name="bathRooms">
                    <option>
                        1
                    </option>
                    <option>
                        1.5
                    </option>
                    <option>
                        2
                    </option>
                    <option>
                        2.5
                    </option>
                    <option>
                        3
                    </option>
                    <option>
                        3+
                    </option>
                </select>
                Garage:<select name="garage">
                    <option>
                        1-car garage
                    </option>
                    <option>
                        2-car garage
                    </option>
                    <option>
                        1-car carport
                    </option>
                    <option>
                        2-car carport
                    </option>
                    <option>
                        None
                    </option>
                </select>
                Type of heating:<select name="heating">
                    <option>
                        Central
                    </option>
                    <option>
                        Wall
                    </option>
                    <option>
                        Ceiling
                    </option>
                    <option>
                        Portable
                    </option>
                    <option>
                        Other
                    </option>
                    <option>
                        None
                    </option>
                </select>
                Type of air conditioning:<select name="airConditioning">
                    <option>
                        Central
                    </option>
                    <option>
                        Window
                    </option>
                    <option>
                        Other
                    </option>
                    <option>
                        None
                    </option>
                </select>
                Media (cable, satellite, etc.)
                <select name="media">
                    <option>
                        Cable
                    </option>
                    <option>
                        Satellite
                    </option>
                    <option>
                        Other
                    </option>
                    <option>
                        None
                    </option>
                </select>
                Ice Maker
                Yes<input type="radio" name="ice"  value="Y" />
                No<input type="radio" name="ice"checked='checked'  value="N" /><br/>
                Dish Washer
                Yes<input type="radio" name="dishWasher"  value="Y" />
                No<input type="radio" name="dishWasher"checked='checked'  value="N" /><br/>
                Disposal
                Yes<input type="radio" name="disposal"  value="Y" />
                No<input type="radio" name="disposal"checked='checked'  value="N" /><br/>
                Clothes Washer
                Yes<input type="radio" name="clothesWasher"  value="Y" />
                No<input type="radio" name="clothesWasher"checked='checked'  value="N" /><br/>
                Clothes Dryer
                Yes<input type="radio" name="clothesDryer"  value="Y" />
                No<input type="radio" name="clothesDryer"checked='checked'  value="N" /><br/>
                Microwave
                Yes<input type="radio" name="microwave"  value="Y" />
                No<input type="radio" name="microwave"checked='checked'  value="N" /><br/>
                Security System
                Yes<input type="radio" name="security"  value="Y" />
                No<input type="radio" name="security"checked='checked'  value="N" /><br/>
                Deck
                Yes<input type="radio" name="deck"  value="Y" />
                No<input type="radio" name="deck"checked='checked'  value="N" /><br/>
                Pool
                Yes<input type="radio" name="pool"  value="Y" />
                No<input type="radio" name="pool"checked='checked'  value="N" /><br/>
                Fenced
                Yes<input type="radio" name="fenced"  value="Y" />
                No<input type="radio" name="fenced"checked='checked'  value="N" /><br/>
                Are you advertising this house as ADA (Americans with Disability Act) compliant?
                Yes<input type="radio" name="ADA"  value="Y" />
                No<input type="radio" name="ADA"checked='checked'  value="N" /><br/>
                
                Comments about the home:<textarea id="message" rows="4" cols="50"></textarea>

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
