<?php
/**
 * Image functions for getting data from the database
 * 
 * @package ImageFunctions
 * 
 * @author David Pyle <Pyledw@Gmail.com>
 * 
 */


/**
 * This function will get the main photo thumb image url
 * 
 * @param type $propertyID
 * @return string
 * 
 * @author David Pyle <Pyledw@gmail.com>
 */
function getMainThumbPath($propertyID)
{
    $resultImage = mysql_query("SELECT * FROM IMAGE
                            WHERE PropertyID='$propertyID' AND ImageType=1");
                        
                      
    $row = mysql_fetch_array($resultImage);
    
    return $row['ImagePathThumb'];
 
}

/**
 * This function will get the main photo image url
 * 
 * @param type $propertyID
 * @return string
 * 
 * @author David Pyle <Pyledw@gmail.com>
 */
function getMainPath($propertyID)
{
    $resultImage = mysql_query("SELECT * FROM IMAGE
                            WHERE PropertyID='$propertyID' AND ImageType=1");
                        
                      
    $row = mysql_fetch_array($resultImage);
    
    return $row['ImagePathOriginal'];
 
}

/**
 * This function will get the non main photo thumbs
 * 
 * @param type $propertyID
 * @return array
 * 
 * @author David Pyle <Pyledw@gmail.com>
 */
function getPhotoInfo($propertyID)
{
    $resultImage = mysql_query("SELECT * FROM IMAGE
                            WHERE PropertyID='$propertyID' AND ImageType<>1");
    if(!$resultImage)
        {
            die('could not connect: ' .mysql_error());
        }
    return $resultImage;
}
?>
