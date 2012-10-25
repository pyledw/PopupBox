<?php
$title = "New Application #4";
    include 'Header.php';
    include 'formElements.php';
 if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }   
    
    //Creating conneciton to the Database
    include_once 'config.inc.php';
        //Connecting to the sql database
    $connectionInfo= get_dbconn();
    $con = $connectionInfo[0];
    $select = $connectionInfo[1];
    
        //Getting the users applicaiton data
        $result1 = mysql_query("SELECT * FROM APPLICATION
            WHERE UserID ='" . $_SESSION[userID] . "'");
        
        //casting the query data into a variable
        $row = mysql_fetch_array($result1);
        
        //second query getting all the previous residences of the applicaiton
        $result = mysql_query("SELECT * FROM PREVIOUSRESIDENCE
            WHERE ApplicationID = $row[ApplicationID] ");
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        
    
    
    
?>

<!-- Main content will load with exiting elements being pre filled into the form
     Various testing methods are used to ensure that the display will be identical to the users 
     previous input if the user has already completed this page-->
<h1 class="Title">Other</h1>
<hr class="Title" />
<div id="mainContent">
<form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication4Redirect.php">
    <h3>Emergency Contact</h3>
    First Name: <input type="text" name="Fname" <?php echo "value='" .$row[ContactFName] . "'"?>/>
    Last Name: <input type="text" name="Lname" <?php echo "value='" .$row[ContactLName] . "'"?>/>
    Address: <input type="text" name="address" <?php echo "value='" .$row[ContactAddress] . "'"?>/>
    City: <input type="text" name="city" <?php echo "value='" .$row[ContactCity] . "'"?>/>
    State: <input type="text" name="state" <?php echo "value='" .$row[ContactState] . "'"?>/>
    Sip: <input type="text" name="zip" <?php echo "value='" .$row[ContactZip] . "'"?>/>
    Relation: <input type="text" name="relation" <?php echo "value='" .$row[ContactZip] . "'"?>/>
    Home Phone:<input type="text" name="homePhone" <?php echo "value='" .$row[ContactHomePhone] . "'"?>/>
    Cell Phone: <input type="text" name="cellPhone" <?php echo "value='" .$row[ContactCellPhone] . "'"?>/>
    Work Phone: <input type="text" name="workPhone" <?php echo "value='" .$row[ContactWorkPhone] . "'"?>/>
    <h3>Vehicles</h3>
    <div id="vehicles">
        <div class="formElement" id="vehicle1">
            Vehicle #1<br/>
            
            Make: <input type="text" name="carMake" <?php echo "value='" .$row[Vehicle1Desc] . "'"?>>
            License Plate Number: <input type="text" name="carLicenseNumber" <?php echo "value='" .$row[Vehicle1LicenseNo] . "'"?>>
            State of plate:<input type="text" name="carPlateState" <?php echo "value='" .$row[Vehicle1LicenseState] . "'"?>>
        </div>
    </div>
    <div id="vehicles">
        <div class="formElement" id="vehicle2" style="display: none;">
            Vehicle #2<br/>
            
            Make: <input type="text" name="carMake2" <?php echo "value='" .$row[Vehicle2Desc] . "'"?>>
            
            License Plate Number: <input type="text" name="carLicenseNumber2" <?php echo "value='" .$row[Vehicle2LicenseNo] . "'"?>>
            State of plate:<input type="text" name="carPlateState2" <?php echo "value='" .$row[Vehicle2LicenseState] . "'"?>>
        </div>
    </div>
    <div id="vehicles">
        <div class="formElement" id="vehicle3" style="display: none;">
            Vehicle #3<br/>
            
            Make: <input type="text" name="carMake3" <?php echo "value='" .$row[Vehicle3Desc] . "'"?>>
            
            License Plate Number: <input type="text" name="carLicenseNumber3" <?php echo "value='" .$row[Vehicle3LicenseNo] . "'"?>>
            State of plate:<input type="text" name="carPlateState3" <?php echo "value='" .$row[Vehicle3LicenseState] . "'"?>>
        </div>
    </div>
    <div id="vehicles">
        <div class="formElement" id="vehicle4" style="display: none;">
            Vehicle #4<br/>
            
            Make: <input type="text" name="carMake4" <?php echo "value='" .$row[Vehicle4Desc] . "'"?>>
            
            License Plate Number: <input type="text" name="carLicenseNumber4" <?php echo "value='" .$row[Vehicle4LicenseNo] . "'"?>>
            State of plate:<input type="text" name="carPlateState4" <?php echo "value='" .$row[Vehicle4LicenseState] . "'"?>>
        </div>
    </div>
    <font class="button" id="addVehicles">Add vehicle</font>
    <font class="button"  id="removeVehicles">Remove vehicle</font><br/><br/>
    <button type="submit" class="button">Save and Continue</button>
    <button type="reset" class="button">Clear</button>
    
    
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
</script>