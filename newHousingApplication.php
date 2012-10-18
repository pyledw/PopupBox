<?php
$title = "New Application";
include 'Header.php';

?>


    <h1 class="Title">New Housing Application</h1>
    <hr class="Title">
    <div id="mainContent">
    <form class="formStyle" width="90%" height="90%" method="post" action="newHousingApplication2.php">


        Earliest Move in Date: <input type="text" name="earliestDate" id="datepicker" />
        Latest Move in Date: <input type="text" name="latestDate" id="datepicker2" />
        <br/>
        Do you need ADA (Americans with Disability Act) facilities?
        Yes<input type="radio" name="ADA"  value="Y" />
        No<input type="radio" name="ADA"checked='checked'  value="N" /><br/>
        Will you be smoking?
        Yes<input type="radio" name="smoking"  value="Y" />
        No<input type="radio" name="smoking"checked='checked'  value="N" /><br/>
        
        <div id="residents">
            <div class="formElement" id="resident1">
                Resident #1<br />
                Name: <input type="text" name="Name1" />
                Age: <input type="text" name="age1"/><br />
                Relationship: <input type="text" name="relationship1"/>
            </div>




        </div>
        <font class="button" id="addResident">Add resident</font>
        <font class="button"  id="removeResident">Remove resident</font>
        <br/>
        <br/>

            <div id="pets">
                <div class="formElement" id="pet1">
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
        <br/>
        <font class="button" id="addPet">Add pet</font>
        <font class="button"  id="removePet">Remove pet</font><br/><br/>
        <button type="submit" class="button">Save and Continue</button>
        <button type="reset" class="button">Clear</button>
    </form>
</div>

<?php
    include 'Footer.php';
?>
    
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            numberOfMonths: 3,
            showButtonPanel: true
        });
    });
    $(function() {
        $( "#datepicker2" ).datepicker({
            numberOfMonths: 3,
            showButtonPanel: true
        });
    });

var val1 = 1;
$(document).ready(function(){
  $("#addResident").click(function(){
      if(val1 < 6)
          {
            val1 = val1 + 1;
            var residentContent = '<div class="formElement" id="resident' + val1 + '">\n\
                    Resident #'+(val1)+'<br /> \n\
                    Name: <input type="text" name="Name' + val1 + '" />\n\
                    Age: <input type="text" name="age' + val1 + '"/><br />\n\
                    Relationship: <input type="text" name"relationship' + val1 + '"/></div>';
            $("#residents").append(residentContent);
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
            var petContent = '<div class="formElement" id="pet' + val2 + '">Pet #' + val2 +
                '<br/>Type:<select id="animalType1">\n\
                    <option>Dog</option>\n\
                    <option>Cat</option>\n\
                    <option>Bird\n\</option>\n\
                    <option>Other</option>\n\
                </select><br/>\n\
                Weight:<input type="text" id="weight1" />Breed:\n\
                <input type="text" id="breed1" />Age:\n\
                <input type="text" id="age1" /> </div>';
            $("#pets").append(petContent);
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