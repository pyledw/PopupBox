<?php
    /**
     * This page will allow the user to enter new information or edit old information about thier application.
     * 
     * * Then main content will load with exiting elements being pre filled into the form
     * * Various testing methods are used to ensure that the display will be identical to the users 
     * * previus input if the user has already compeleted this page.
     * 
     * At the end of the page it check to see that if the applicaiton was not complete or not, and increments the page completed acordingly
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

$title = "New Application #4";
    include 'Header.php';
 if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }   
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
        //Connecting to the sql database
    $con = get_dbconn("");

        //Getting the users applicaiton data
        $result1 = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='$_SESSION[userID]'");
        
        //casting the query data into a variable
        $row = mysql_fetch_array($result1);
        
        //second query getting all the previous residences of the applicaiton
        $result = mysql_query("SELECT * FROM PREVIOUSRESIDENCE
            WHERE ApplicationID = '$row[ApplicationID]' ");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    
    
    
?>

<!-- Main content will load with exiting elements being pre filled into the form
     Various testing methods are used to ensure that the display will be identical to the users 
     previous input if the user has already completed this page-->
<div id="mainContent">
<form id="newApplicationForm" method="post" action="newHousingApplication4Redirect.php">
        <table class="tableForm" width="1000px">
            <font class="formheader" style="left:600px;">Other Information</font>
            <tr>
                <th colspan="3">
                    <h3>Co Signer</h3>    
                </th>
                
            </tr>
            <tr>
                <td>
                    <label class="label">First Name: </label><br/><input type="text" name="Fname" <?php echo "value='" .$row[ContactFName] . "'"?>/>
                </td>
                <td>
                    <label class="label">Last Name: </label><br/><input type="text" name="Lname" <?php echo "value='" .$row[ContactLName] . "'"?>/>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Address: </label><br/><input type="text" name="address" <?php echo "value='" .$row[ContactAddress] . "'"?>/>
                </td>
                <td>
                    <label class="label">State: </label><br/><input type="text" name="state" <?php echo "value='" .$row[ContactState] . "'"?>/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Zip: </label><br/><input type="text" name="zip" <?php echo "value='" .$row[ContactZip] . "'"?>/>
                </td>
                <td>
                    <label class="label">Relation: </label><br/><input type="text" name="relation" <?php echo "value='" .$row[ContactZip] . "'"?>/>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <label class="label">Home Phone:</label><br/><input type="text" name="homePhone" <?php echo "value='" .$row[ContactHomePhone] . "'"?>/>
                </td>
                <td>
                    <label class="label">Cell Phone: </label><br/><input type="text" name="cellPhone" <?php echo "value='" .$row[ContactCellPhone] . "'"?>/>
                </td>
                <td>
                    <label class="label">Work Phone: </label><br/><input type="text" name="workPhone" <?php echo "value='" .$row[ContactWorkPhone] . "'"?>/>
                </td>
            </tr>
            <tr>
                <th>
                   <h3>Vehicles</h3> 
                </th>
            </tr>
            <tr id="vehicle1">
                <td>
                    <label class="label">Make: </label><br/><input type="text" name="carMake" <?php echo "value='" .$row[Vehicle1Desc] . "'"?>>
                </td>
                <td><label class="label">
                    License Plate Number: </label><br/><input type="text" name="carLicenseNumber" <?php echo "value='" .$row[Vehicle1LicenseNo] . "'"?>>
                </td>
                <td>
                    <label class="label">State of plate:</label><br/><input type="text" name="carPlateState" <?php echo "value='" .$row[Vehicle1LicenseState] . "'"?>>
                </td>
            </tr>
            <tr id="vehicle2" style="display: none;">
                <td>
                    <label class="label">Make:</label><br/> <input type="text" name="carMake" <?php echo "value='" .$row[Vehicle2Desc] . "'"?>>
                </td>
                <td>
                    <label class="label">License Plate Number: </label><br/><input type="text" name="carLicenseNumber" <?php echo "value='" .$row[Vehicle2LicenseNo] . "'"?>>
                </td>
                <td>
                    <label class="label">State of plate:</label><br/><input type="text" name="carPlateState" <?php echo "value='" .$row[Vehicle2LicenseState] . "'"?>>
                </td>
            </tr>
            <tr id="vehicle3" style="display: none;">
                <td>
                    <label class="label">Make: </label><br/><input type="text" name="carMake" <?php echo "value='" .$row[Vehicle3Desc] . "'"?>>
                </td>
                <td>
                    <label class="label">License Plate Number: </label><br/><input type="text" name="carLicenseNumber" <?php echo "value='" .$row[Vehicle3LicenseNo] . "'"?>>
                </td>
                <td>
                    <label class="label">State of plate:</label><br/><input type="text" name="carPlateState" <?php echo "value='" .$row[Vehicle3LicenseState] . "'"?>>
                </td>
            </tr>
            <tr id="vehicle4" style="display: none;">
                <td>
                    <label class="label">Make: </label><br/><input type="text" name="carMake" <?php echo "value='" .$row[Vehicle4Desc] . "'"?>>
                </td>
                <td>
                    <label class="label">License Plate Number: </label><br/><input type="text" name="carLicenseNumber" <?php echo "value='" .$row[Vehicle4LicenseNo] . "'"?>>
                </td>
                <td>
                    <label class="label">State of plate:</label><br/><input type="text" name="carPlateState" <?php echo "value='" .$row[Vehicle4LicenseState] . "'"?>>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <font class="button" id="addVehicles">Add vehicle</font>
                    <font class="button"  id="removeVehicles">Remove vehicle</font>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr />
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a class="button" href="newHousingApplication3.php">Back</a>
                    <a class="button" href="myHood.php">Exit without saving</a>
                    <button type="submit" class="button">Save and Continue</button>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="3">
                    Page 4 of 5
                </td>
             </tr>
        </table>
    
    
    
</form>
</div>
<?php
    include 'Footer.php';
?>

<!-- This will create the dynamic fields for cars -->
<script>
var val1 = 1;
$(document).ready(function(){
  $("#addVehicles").click(function(){
      if(val1 < 4)
          {
            val1 = val1 + 1;
            $("#vehicle" + val1).show();
          }
      else{
          alert("You have reached the maximum number of vehicles");
      }
  });
  $("#removeVehicles").click(function(){
      if(val1 > 1)
          {
              $("#vehicle" + val1).hide();
            val1 = val1 - 1;
          }
      else
      {
        alert("Must fill in at least one vehicles");
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
