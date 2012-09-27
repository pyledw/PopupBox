
<?php
function createForm($height, $width, $title, $sendDataTo)
{
    echo '<form class="formStyle" height="' . $height . '" width="' . $width . '" method="post" action="' . $sendDataTo . '">';
    echo '<h2>' . $title . '</h2></br>';
    
}
function createTextField($name,$display,$label,$width)
{
    echo $label . '<input type="text" style="color:grey;width:' . $width . ';" name="' . $name . '" value="' . $display . '" onfocus="this.value = changeTextInBox(this.value, this.defaultValue), this.style.color = changeColorInBox(this.value,this.defaultValue);" 
								onblur="this.value = textBoxExit(this.value,this.defaultValue), this.style.color = textBoxExitColor(this.value,this.defaultValue);"/>';
}
function newLine(){
    echo '</br>';
}
function createPasswordField($name,$label)
{
    echo $label . '<input type="password" name="' . $name . '" value="" onfocus="this.value = changeTextInBox(this.value, this.defaultValue)" 
								onblur="this.value = textBoxExit(this.value,this.defaultValue)"/>';
}
function createRadioGroup($numberOfElements, $titles,$names, $groupName,$label)
{
    echo $label;
    $bool = true;
    for ($numb = 0;$numb < $numberOfElements;++$numb) 
    {
        $checked = "";
        if($bool)
        {
            $checked = "checked";
            $bool = false;
        }
        else
        {
            $checked = "";
        }
        echo '<input type="radio"' . $checked . ' name="' . $groupName . '" value="' . $names[$numb] . '"> ' . $titles[$numb] . ' ';
        
    }
}
function createRadioGroupList($numberOfElements, $titles,$names, $groupName)
{
    
    for ($numb = 0;$numb < $numberOfElements;++$numb) 
    {
        echo '<input type="radio" name="' . $groupName . '" value="' . $names[$numb] . '"> ' . $titles[$numb] . ' ';
        
    }
}
function createDropdownMenu($name,$Items,$label)
{
    echo $label;
    echo '<select name="' . $name . '">';
    
    foreach ($Items as $value) 
    {
        echo '<option>' . $value . '</option>';
        
    }
    
    echo '</select>';
}
function createCheckBox($name,$value,$title){
    echo '<input type="checkbox" name="' . $name . '" value="' . $value . '">' . $title .  '';
    
}
function createButton($type,$label,$class)
{
    echo '<input class="' . $class . '" type="' . $type . '" value="' . $label . '">';
}
?>
