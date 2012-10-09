<?php
include 'Header.php';
include 'formElements.php';
$resident = 1;
?>




<!-- Page Content -->

<script>
var val1 = 0;
$(document).ready(function(){
  $("#btn1").click(function(){
      val1 = val1 + 1;
      $("#residents").append('<div id="resident' + val1 + '">Name: <input type="text" name="Name' + val1 + '" /> Age: <input type="text" name="age' + val1 + '"/><br />Relationship: <input type="text" name"relationship' + val1 + '"/></div>');
  });
  $("#removeResident").click(function(){
      if(val1 > 0)
          {
            $("#resident" + val1).remove();
            val1 = val1 - 1;
          }
  });
});

$(function()
            {
				$('.date-pick').datePicker({autoFocusNextInput: true});
            });




</script>

    <h1 class="Title">New Housing Application</h1>
    <hr class="Title">
    <div id="mainContent">
        
<?php
   createForm("90%", "90%", "Housing Application", "newHousingApplication.php");
   
?>

    Earliest Move in Date: <input type="text" name="earliestDate" id="datepicker" /><br />
    Latest Move in Date: <input type="text" name="latestDate" id="datepicker" />
    
    <div id="residents">
        <div id="resident">
            Name: <input type="text" name="Name' + val1 + '" />
            Age: <input type="text" name="age' + val1 + '"/><br />
            Relationship: <input type="text" name="relationship"/>
        </div>
        
        <font class="button" id="btn1">Add new resident</font>
        <font class="button" id="removeResident">remove</font>
    </div>
  
    </form>
</div>

<?php
    include 'Footer.php';
?>
