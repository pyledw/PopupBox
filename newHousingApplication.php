<?php
$title = "New Application";
include 'Header.php';

    /**
     * First Check is to ensur ethe user is logged in, and get the data of the correct user.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * 
     * At the end of the page it check to see that if the applicaiton was not complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
    
    //Test to check if user is logged in or not IF not they will be redirected to the login page
    if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }

    include_once 'config.inc.php';
    $con= get_dbconn("");
    
    //Query to select the user's application using their userID number
    $result = mysql_query("SELECT * FROM APPLICATION
        WHERE UserID ='$_SESSION[userID]'");
    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }

    //Setting the query results into a variable
    $row = mysql_fetch_array($result);
        

?>

 
    <div id="mainContent">
    <form id="newApplicationForm" method="post" action="newHousingApplicationRedirect.php">
         <table class="tableForm" width="1000px">
             <font class="formheader" style="left:20px;">Rental Needs</font>
             <tr style="height: 90px;">
                 <td>
                     <label class="label">Earliest Move in Date:</label><br/><input class="required" type="text" name="earliestDate" value="<?php echo $row[EarlyMoveIn]?>" id="datepicker" />
                 </td>
                 <td colspan="2">
                     <label class="label">Latest Move in Date:</label><br/> <input class="required" type="text" name="latestDate" value="<?php echo $row[LateMoveIn]?>" id="datepicker2" />
                 </td>

             </tr>
             <tr>
                 <td>
                     <label class="label">Do you need ADA (Americans with Disability Act) facilities?</label><br/>
                    <?php 
                    //This goes through to ensure that if data already exist the previusly checked will apear checked
                    if ($row[IsADA] == "1")
                            {
                                echo 'Yes<input type="radio" name="ADA" checked="checked"  value="1" />
                                    No<input type="radio" name="ADA"  value="0" /><br/>';
                            }

                    else
                            {

                                echo 'Yes<input type="radio" name="ADA"  value="1" />No<input type="radio" checked="checked" name="ADA"  value="0" /><br/>';
                            }

                    ?>
                 </td>
                 <td>
                     <label class="label">Are you a smoker?</label><br/>
                    <?php 
                    //This goes through to ensure that if data already exist the previusly checked will apear checked
                    if ($row[IsSmokingRequired] == "1")
                        {
                             echo 'Yes<input type="radio" checked="checked" name="smoking"  value="1" />
                                  No<input type="radio" name="smoking"  value="0" /><br/>';
                        }

                    else
                        {

                            echo 'Yes<input type="radio" name="smoking"  value="1" />
                                   No<input type="radio" name="smoking"checked="checked"  value="0" /><br/>';
                        }
                    ?>
                 </td>
                 <td>
                     <label class="label">Number of Occupants:</label><br/>
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
                 </td>
             </tr>
             <tr>
                 <th colspan="4" style="background:#9d9d9d; padding: 10px 10px 10px 10px;">
                     <b>Secondary Resident</b>
                 </th>
             </tr>
             <tr>
                 <td>
                     <label class="label">First Name: </label><br/><input type="text" value="<?php echo $row[SecondaryOccupantFName]?>" name="fName" />
                 </td>
                 <td>
                     <label class="label">Last Name: <label><br><input type="text" value="<?php echo $row[SecondaryOccupantLName]?>" name="lName" />
                 </td>
                 <td>
                     <label class="label">Age: </label><input type="text" value="<?php echo $row[SecondaryOccupantAge]?>" name="age"/><br />
                 </td>
             </tr>
             <tr>
                 <td>
                     <label class="label">Relationship: </label><input type="text" value="<?php echo $row[SecondaryOccupantRelationship]?>" name="relationship"/>
                 </td>
                 <td>
                     
                 </td>
                 <td>
                     
                 </td>
             </tr>
             <tr>
                 <th colspan="4" style="background:#9d9d9d; padding: 10px 10px 10px 10px;">
                     <b>Pet(s)</b>
                 </th>
             </tr>
             <tr>
                 <td>
                     <label class="label">Type:</label><select name="animalType">

                                <option <?php if($row[Pet1Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                                <option <?php if($row[Pet1Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                                <option <?php if($row[Pet1Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                                <option <?php if($row[Pet1Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                          </select>
                 </td>
                 <td>
                      <label class="label">Weight:</label><br/><input type="text" value="<?php echo $row[Pet1Weight]?>" name="animalWeight" />
                 </td>
                 <td>
                     <label class="label">Breed:</label><br/><input type="text" value="<?php echo $row[Pet1Breed]?>" name="animalBreed" />
                 </td>
                 <td>
                     <label class="label">Age:</label><br/><input type="text" value="<?php echo $row[Pet2Age]?>" name="animalAge2" />
                 </td>
             </tr>
             
             <tr>
                 <td>
                     <label class="label">Type:</label><select name="animalType2">
                                <option <?php if($row[Pet2Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                                <option <?php if($row[Pet2Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                                <option <?php if($row[Pet2Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                                <option <?php if($row[Pet2Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                            </select>
                 </td>
                 <td>
                     <label class="label">Weight:</label><br/><input type="text" value="<?php echo $row[Pet2Weight]?>" name="animalWeight2" />
                 </td>
                 <td>
                     <label class="label">Breed:</label><br/><input type="text" value="<?php echo $row[Pet2Breed]?>" name="animalBreed2" />
                 </td>
                 <td>
                     <label class="label">Age:</label><br/><input type="text" value="<?php echo $row[Pet2Age]?>" name="animalAge2" />
                 </td>
                     
             </tr>
             <tr>
                 <td>
                     <label class="label">Type:</label><select name="animalType3">
                                <option <?php if($row[Pet3Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                                <option <?php if($row[Pet3Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                                <option <?php if($row[Pet3Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                                <option <?php if($row[Pet3Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                            </select>
                 </td>
                 <td>
                     <label class="label">Weight:</label><br/><input type="text" value="<?php echo $row[Pet3Weight]?>" name="animalWeight3" />
                 </td>
                 <td>
                     <label class="label">Breed:</label><br/><input type="text" value="<?php echo $row[Pet3Breed]?>" name="animalBreed3" />
                 </td>
                 <td>
                     <label class="label">Age:</label><br/><input type="text" value="<?php echo $row[Pet3Age]?>" name="animalAge3" />
                 </td>
                     
             </tr>
             <tr>
                 <td>
                     <label class="label">Type:</label><select name="animalType4">
                                <option <?php if($row[Pet4Type] == 'Dog'){echo ' selected="selected" ' ;} ?>>Dog</option>
                                <option <?php if($row[Pet4Type] == 'Cat'){echo ' selected="selected" ' ;} ?>>Cat</option>
                                <option <?php if($row[Pet4Type] == 'Bird'){echo ' selected="selected" ' ;} ?>>Bird</option>
                                <option <?php if($row[Pet4Type] == 'Other'){echo ' selected="selected" ' ;} ?>>Other</option>
                            </select>
                 </td>
                 <td>
                     <label class="label">Weight:</label><br/><input type="text" value="<?php echo $row[Pet4Weight]?>" name="animalWeight4" />
                 </td>
                 <td>
                     <label class="label">Breed:</label><br/><input type="text" value="<?php echo $row[Pet4Breed]?>" name="animalBreed4" />
                 </td>
                 <td>
                    <label class="label">Age:</label><br/><input type="text" value="<?php echo $row[Pet4Age]?>" name="animalAge4" />
                 </td>
                     
             </tr>
             <tr>
                 <td colspan="4">
                    
                    <a class="button" href="myHood.php">Exit without saving</a>
                    
                    <button type="submit" class="button">Save and Continue</button>
                <td>
             </tr>
             <tr>
                <td style="text-align: center;" colspan="4">
                    Page 1 of 5
                </td>
             </tr>  
         </table>
    </form>
</div>

<?php
    include 'Footer.php';
?>

<!-- The script below controls the date pickers, as well as the dynamic viewing of the pet fields -->
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            minDate: 0,
            showButtonPanel: true,
            dateFormat:"yy-mm-dd"
        });
    });
    $(function() {
        $( "#datepicker2" ).datepicker({
            
            minDate: 0,
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

  $(document).ready(function(){
    $("#newApplicationForm").validate({
        ignoreTitle: true,
        onkeyup: false,
        onclick: false
        
    });
  });
</script>
