<?php
function displayPopupBox($Header,$Content,$ButtonTitle,$Href)
{
echo '<link rel="stylesheet" type="text/css" href="css/popupStyles.css" />
<div id="popupContent" style="width:400px;">
<h1 class="popupHeader">' . $Header . '</h1>
<p>' . $Content . '</p>
<a class="button" href="' . $Href . '">' . $ButtonTitle .  '</a> 
</div>';
}
?>
