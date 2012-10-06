
<?php

//This function initiates and creates the form with the specified peramiters
function createForm($height, $width, $title, $sendDataTo)
{
    echo '<form class="formStyle" style="width: ' . $width . '; height:' . $height . ';" method="post" action="' . $sendDataTo . '">';
    echo '<h2>' . $title . '</h2></br>';
    
}

//This function creates a new text field using the peramiters required
function createTextField($name,$display,$label,$width)
{
    echo $label . '<input type="text" style="color:grey;width:' . $width . ';" name="' . $name . '" value="' . $display . '" onfocus="this.value = changeTextInBox(this.value, this.defaultValue), this.style.color = changeColorInBox(this.value,this.defaultValue);" 
								onblur="this.value = textBoxExit(this.value,this.defaultValue), this.style.color = textBoxExitColor(this.value,this.defaultValue);"/>';
}

//This funciton inserts a simple line break
function newLine(){
    echo '<br />';
}

//This function creates a new text box for a password
function createPasswordField($name,$label)
{
    echo $label . '<input type="password" name="' . $name . '" value="" onfocus="this.value = changeTextInBox(this.value, this.defaultValue)" 
								onblur="this.value = textBoxExit(this.value,this.defaultValue)"/>';
}

//This funciton will create a new radio group with the specified elements in a hoizontal line
function radioGroup($names,$values,$groupName,$groupLabel)
{
    echo $groupLabel;
    
    $numb = 0;
    foreach ($values as $value) 
        {
            
            echo '<input type="radio" name="' . $groupName . '" ' . "checked" . '  value="' . $value . '">' . $names[$numb] . ' ';
            $numb = $numb + 1;
        }
}
//This will create a radio list in a vertical format
function createRadioGroupList($numberOfElements, $titles,$names, $groupName)
{
    
    for ($numb = 0;$numb < $numberOfElements;++$numb) 
    {
        echo '<input type="radio" name="' . $groupName . '" value="' . $names[$numb] . '"> ' . $titles[$numb] . ' ';
        
    }
}

//This function creates a new dropdown list using teh specified elements
function createDropdownMenu($class, $name,$Items,$label)
{
    echo $label;
    echo '<select id="' . $class . '" name="' . $name . '">';
    
    foreach ($Items as $value) 
    {
        echo '<option>' . $value . '</option>';
        
    }
    
    echo '</select>';
}

//This funciton creates a checkbox field
function createCheckBox($name,$value,$title)
{
    echo '<input type="checkbox" name="' . $name . '" value="' . $value . '">' . $title .  '';
    
}

//This funciton creates a simple button
function createButton($type,$label,$class)
{
    echo '<input class="' . $class . '" type="' . $type . '" value="' . $label . '">';
}

function createTextBoxField($cols,$rows,$name,$label)
{
    echo $label . ' <textarea cols="' . $cols . '" rows="' . $rows .'" name="' . $name . '">
    </textarea>';
}

?>
