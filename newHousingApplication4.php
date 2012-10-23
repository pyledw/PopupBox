<?php
$title = "New Application #4";
    include 'Header.php';
    include 'formElements.php';
 if(!isset($_SESSION[userID]))
    {
        header( 'Location: /loginRequired.php' ) ;
    }   
    
    
    
    
?>
<h1 class="Title">Other</h1>
<hr class="Title" />
<form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication4Redirect.php">
    <h3>Emergency Contact</h3>
    First Name: <input type="text" name="Fname">
    Last Name: <input type="text" name="Lname">
    Address: <input type="text" name="address">
    City: <input type="text" name="city">
    State: <input type="text" name="state">
    Sip: <input type="text" name="zip">
    Relation: <input type="text" name="relation">
    Home Phone:<input type="text" name="homePhone">
    Cell Phone: <input type="text" name="cellPhone">
    Work Phone: <input type="text" name="workPhone">
    <h3>Vehicles</h3>
    <div id="vehicles">
        <div class="formElement" id="vehicle1">
            Vehicle #1<br/>
            
            Make: <input type="text" name="carMake">
            Color: <input type="text" name="carColor">
            Year: <input type="text" name="carYear"><br/>
            
            License Plate Number: <input type="text" name="carLicenseNumber">
            State of plate:<input type="text" name="carPlateState">
        </div>
    </div>
    <font class="button" id="addVehicles">Add vehicle</font>
    <font class="button"  id="removeVehicles">Remove vehicle</font><br/><br/>
    <button type="submit" class="button">Save and Continue</button>
    <button type="reset" class="button">Clear</button>
    
    
</form>
<?php
    include 'Footer.php';
?>

<script>
var val1 = 1;
$(document).ready(function(){
  $("#addVehicles").click(function(){
      if(val1 < 5)
          {
            val1 = val1 + 1;
            var employerContent = '<div class="formElement" id="vehicle'+val1+'">\n\
                            Vehicle #'+val1+'<br/>\n\
                            Make: <input type="text" name="carMake'+val1+'">\n\
                            Color: <input type="text" name="carColor'+val1+'">\n\
                            Year: <input type="text" name="carYear'+val1+'"><br/> \n\
                            License Plate Number: <input type="text" name="carLicenseNumber'+val1+'">\n\
                            State of plate:<input type="text" name="carPlateState'+val1+'">\n\
                            </div>';
            $("#vehicles").append(employerContent);
          }
      else{
          alert("You have reached the maximum number of vehicles");
      }
  });
  $("#removeVehicles").click(function(){
      if(val1 > 1)
          {
            $("#vehicle" + val1).remove();
            val1 = val1 - 1;
          }
      else
      {
        alert("Must fill in at least one vehicles");
      }
  });
});
</script>