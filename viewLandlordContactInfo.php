<?php

    /**
     * This is displayed for the tenant after then have been selected as the winning bid
     * They will ba able to the the landlords name, phone, and email.
     * 
     * This retireves the property ID in a form GET request, and pulls the informaiton based
     * on the propertyID
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     * 
     */
    session_start();
    $propertyID = $_GET[propertyID];
    
    include_once 'config.inc.php';
            //Connecting to the sql database
            $con = get_dbconn("");
            
            $result = mysql_query("SELECT * FROM USER
                INNER JOIN PROPERTY
                ON USER.UserID=PROPERTY.UserID
                WHERE PropertyID = '$propertyID'");
            
            if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
            
            
            $row = mysql_fetch_array($result);
           
?>
<h1 style="width:100%; background: #4f6220; padding:0 5px 0 5px; margin: -8px 0px 0px -5px; ">Landlord Info</h1>
<table class="tableForm" width="300px" style="margin-top:0;">
                    <tr>
                         <td>
                           <lable>Name: </label><?php echo $row[FirstName] . " " . $row[LastName]; ?>
                         </td>
                    </tr>
                    <tr>
                         <td>
                             <lable>Email: </label><a href="mailto:<?php echo $row[Email]; ?>"><?php echo "     " . $row[Email]; ?></a>
                         </td>
                         
                    </tr>
                    <tr>
                        <td>
                             <lable>Phone: </label><?php echo $row[Phone]; ?>
                         </td>
                    </tr>
                    </table>
