<?php
$title = "New Application";
include 'Header.php';

    //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }

    include_once 'config.inc.php';
    $con= get_dbconn("");
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM APPLICATION
        WHERE UserID ='" . $_SESSION[userID] . "'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //Setting the query results into a variable
    $row = mysql_fetch_array($result);
        

?>

<!-- Main content will load with exiting elements being pre filled into the form
     Various testing methods are used to ensure that the display will be identical to the users 
     previus input if the user has already compeleted this page-->
    <h1 class="Title">New Housing Application</h1>
    <hr class="Title">
    <div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplicationRedirect.php">

        <?php echo $row[EarlyMoveIn] ?>
        Earliest Move in Date: <input type="text" name="earliestDate" value="<?php echo $row[EarlyMoveIn]?>" id="datepicker" />
        Latest Move in Date: <input type="text" name="latestDate"value="<?php echo $row[LateMoveIn]?>" id="datepicker2" />
        <br/>
        Do you need ADA (Americans with Disability Act) facilities?
        <?php if ($row[IsADA] == "N")
                {
                    echo 'Yes<input type="radio" name="ADA" checked="checked"  value="Y" />
                        No<input type="radio" name="ADA"  value="N" /><br/>';
                }
                    
            else
                {
                    
                    echo 'Yes<input type="radio" name="ADA"  value="Y" />No<input type="radio" checked="checked" name="ADA"  value="N" /><br/>';
                }

            ?>
        Will you be smoking?
         <?php if ($row[IsSmokingRequired] == "N")
                {
                     echo 'Yes<input type="radio" checked="checked" name="smoking"  value="Y" />
                          No<input type="radio" name="smoking"  value="N" /><br/>';
                }
                    
            else
                {
                   
                    echo 'Yes<input type="radio" name="smoking"  value="Y" />
                           No<input type="radio" name="smoking"checked="checked"  value="N" /><br/>';
                }
            ?>
        Number of Occupants:
        <select name="numbOccupants">
            <option<?php if($row[NumOtherOccupants] == "1"){ echo ' selected="selected" ' ; };?>>1</option>
            <option<?php if($row[NumOtherOccupants] == "2"){ echo ' selected="selected" ' ; };?>>2</option>
            <option<?php if($row[NumOtherOccupants] == "3"){ echo ' selected="selected" ' ; };?>>3</option>
            <option<?php if($row[NumOtherOccupants] == "4"){ echo ' selected="selected" ' ; };?>>4</option>
            <option<?php if($row[NumOtherOccupants] == "5"){ echo ' selected="selected" ' ; };?>>5</option>
            <option<?php if($row[NumOtherOccupants] == "6"){ echo ' selected="selected" ' ; };?>>6</option>
            <option<?php if($row[NumOtherOccupants] == "7"){ echo ' selected="selected" ' ; };?>>7</option>
            <option<?php if($row[NumOtherOccupants] == "8"){ echo ' selected="selected" ' ; };?>>8</option>
        </select>
        
        <div id="residents">
            <div class="formElement" id="resident1">
                Secondary Resident<br />
                First Name: <input type="text" value="<?php echo $row[SecondaryOccupantFName]?>" name="fName" />
                Last Name: <input type="text" value="<?php echo $row[SecondaryOccupantLName]?>" name="lName" />
                Age: <input type="text" value="<?php echo $row[SecondaryOccupantAge]?>" name="age"/><br />
                Relationship: <input type="text" value="<?php echo $row[SecondaryOccupantRelationship]?>" name="relationship"/>
            </div>




        </div>
        
        <!--<font class="button" id="addResident">Add resident</font>
        <font class="button"  id="removeResident">Remove resident</font> -->
        
        <br/>
        <br/>

            <div id="pets">
                <div class="formElement" id="pet1">
                    Pet #1<br/>
                    Type:<select name="animalType">
                        
                        <option <?php if($row[Pet1Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                        <option <?php if($row[Pet1Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                        <option <?php if($row[Pet1Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                        <option <?php if($row[Pet1Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                    </select>
                    <br/>
                    Weight:<input type="text" value="<?php echo $row[Pet1Weight]?>" name="animalWeight" />
                    Breed:<input type="text" value="<?php echo $row[Pet1Breed]?>" name="animalBreed" />
                    Age:<input type="text" value="<?php echo $row[Pet1Age]?>" name="animalAge" />
                </div>
                <div class="formElement" id="pet2" <?php if($row[Pet2Type] == "")?>>
                    Pet #2<br/>
                    Type:<select name="animalType2">
                        <option <?php if($row[Pet2Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                        <option <?php if($row[Pet2Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                        <option <?php if($row[Pet2Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                        <option <?php if($row[Pet2Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                    </select>
                    <br/>
                    Weight:<input type="text" value="<?php echo $row[Pet2Weight]?>" name="animalWeight2" />
                    Breed:<input type="text" value="<?php echo $row[Pet2Breed]?>" name="animalBreed2" />
                    Age:<input type="text" value="<?php echo $row[Pet2Age]?>" name="animalAge2" />
                </div>
                <div class="formElement" id="pet3" <?php if($row[Pet3Type] == "")?>>
                    Pet #3<br/>
                    Type:<select name="animalType3">
                        <option <?php if($row[Pet3Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                        <option <?php if($row[Pet3Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                        <option <?php if($row[Pet3Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                        <option <?php if($row[Pet3Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                    </select>
                    <br/>
                    Weight:<input type="text" value="<?php echo $row[Pet3Weight]?>" name="animalWeight3" />
                    Breed:<input type="text" value="<?php echo $row[Pet3Breed]?>" name="animalBreed3" />
                    Age:<input type="text" value="<?php echo $row[Pet3Age]?>" name="animalAge3" />
                </div>
                <div class="formElement" id="pet4" <?php if($row[Pet4Type] == "")?>>
                    Pet #4<br/>
                    Type:<select name="animalType4">
                        <option <?php if($row[Pet4Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                        <option <?php if($row[Pet4Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                        <option <?php if($row[Pet4Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                        <option <?php if($row[Pet4Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                    </select>
                    <br/>
                    Weight:<input type="text" value="<?php echo $row[Pet4Weight]?>" name="animalWeight4" />
                    Breed:<input type="text" value="<?php echo $row[Pet4Breed]?>" name="animalBreed4" />
                    Age:<input type="text" value="<?php echo $row[Pet4Age]?>" name="animalAge4" />
                </div>

            </div>
        <br/>
        <!--<font class="button" id="addPet">Add pet</font>
        <font class="button"  id="removePet">Remove pet</font><br/><br/>-->
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    </form>
</div>

<?php
    include 'Footer.php';
?>

<!-- The script below controls the date pickers, as well as the dynamic viewing of the pet fields -->
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            
            showButtonPanel: true,
            dateFormat:"yy-mm-dd"
        });
    });
    $(function() {
        $( "#datepicker2" ).datepicker({
            
            
            showButtonPanel: true,
            dateFormat: 'yy-mm-dd'
        });
    });

var val2 = 1;
$(document).ready(function(){
  $("#addPet").click(function(){
      if(val2 < 3)
          {
              val2 += 1;
              $('#pet' + val2).show();
          }
       else
           {
               alert("No more than 4 pets may be entered");
           }
  });
  
  $("#removePet").click(function(){
      if(val2 > 1)
          {
              $("#pet" + val2).hide();
            val2 = val2 - 1;
          }
      else
          {
              alert("If no pets leave one field empty");
          }
  });
});

</script>
