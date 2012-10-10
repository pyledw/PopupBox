<?php
include 'Header.php';
include 'formElements.php';
?>


<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    $(function() {
        $( "#datepicker2" ).datepicker();
    });

var val1 = 1;
$(document).ready(function(){
  $("#addResident").click(function(){
      if(val1 < 6)
          {
            val1 = val1 + 1;
            $("#residents").append('<div id="resident' + val1 + '">Resident #'+(val1)+'<br /> Name: <input type="text" name="Name' + val1 + '" /> Age: <input type="text" name="age' + val1 + '"/><br />Relationship: <input type="text" name"relationship' + val1 + '"/></div>');
          }
  });
  $("#removeResident").click(function(){
      if(val1 > 1)
          {
            $("#resident" + val1).remove();
            val1 = val1 - 1;
          }
  });
});

var val2 = 1;
$(document).ready(function(){
  $("#addPet").click(function(){
      if(val2 < 4)
          {
            val2 = val2 + 1;
            $("#pets").append('<div id="pet' + val2 + '">Pet #' + val2 + '<br/>Type:<select id="animalType1"><option>Dog</option><option>Cat</option><option>Bird</option><option>Other</option></select><br/>Weight:<input type="text" id="weight1" />Breed:<input type="text" id="breed1" />Age:<input type="text" id="age1" /> </div>');
          }
  });
  $("#removePet").click(function(){
      if(val2 > 1)
          {
            $("#pet" + val2).remove();
            val2 = val2 - 1;
          }
  });
});

</script>

    <h1 class="Title">New Housing Application</h1>
    <hr class="Title">
    <div id="mainContent">
        
<?php
   createForm("90%", "90%", "Housing Application part #1", "newHousingApplication2.php");
   
?>

    Earliest Move in Date: <input type="text" name="earliestDate" id="datepicker" />
    Latest Move in Date: <input type="text" name="latestDate" id="datepicker2" />
    <br/>
<?php
    radioGroup(array("Yes","No"), array("yes","no"), "ADA", "Do you need ADA (Americans with Disability Act) facilities?");
    radioGroup(array("Yes","No"), array("yes","no"), "smoking", "Will you be smoking?");
    
?>
    <div id="residents">
        <div id="resident1">
            Resident #1<br />
            Name: <input type="text" name="Name1" />
            Age: <input type="text" name="age1"/><br />
            Relationship: <input type="text" name="relationship1"/>
        </div>
        
        
        
        
    </div>
    <font class="button" id="addResident">Add resident</font>
    <font class="button"  id="removeResident">Remove resident</font>
        
        <div id="pets">
            <div id="pet1">
                Pet #1<br/>
                Type:<select id="animalType1">
                    <option>Dog</option>
                    <option>Cat</option>
                    <option>Bird</option>
                    <option>Other</option>
                </select>
                <br/>
                Weight:<input type="text" id="weight1" />
                Breed:<input type="text" id="breed1" />
                Age:<input type="text" id="age1" />
            </div>
            
        </div>
    <font class="button" id="addPet">Add pet</font>
    <font class="button"  id="removePet">Remove pet</font><br/><br/>
    <button type="submit" class="button">Save and Continue</button>
    <button type="reset" class="button">Clear</button>
    </form>
</div>

<?php
    include 'Footer.php';
?>
