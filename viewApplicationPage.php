
<?php

    /**
     * This page will display the applicaiton page of a applicaiton based on the $post data.
     * 
     * It allows the administrator to approve the applicaiton, and is also allows the landlord to
     * pick the user as the winnind bid of their auction.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */

    $title = 'Application';
    include 'Header.php';
    
    
    $applicationID = $_POST[applicationID];
    $auctionID = $_POST[auctionID];
    
    include_once 'config.inc.php';
            //Connecting to the sql database
            $con = get_dbconn("");
            
            $result = mysql_query("SELECT * FROM APPLICATION
                INNER JOIN USER
                ON USER.UserID=APPLICATION.UserID
                WHERE ApplicationID = '$applicationID'");
            
            $row = mysql_fetch_array($result);
           
?>

<div id="mainContent">    
        <div id="Applicationheader"><h1><?php echo $applicationID; ?> Tenant Application</h1></div>
    <div class="content">
        <table>
            <tr>
                <td>
                   First Name: 
                </td>
                <td>
                    <?php echo $row['FirstName']; ?>
                </td>
                <td>
                    Last Name:
                </td>
                <td>
                    <?php echo $row['LastName']; ?>
                </td>
                <td>
                    Email:
                </td>
                <td>
                    <?php echo $row['Email']; ?>
                </td>
            </tr>
            <tr>
                <td>
                   City:
                </td>
                <td>
                    <?php echo $row['City']; ?>
                </td>
                <td>
                    State:
                </td>
                <td>
                   <?php echo $row['State']; ?>
                </td>
                <td>
                   Earliest Move In: 
                </td>
                <td>
                   <?php echo $row['EarlyMoveIn']; ?>
                </td>
                <td>
                    Latest Move In:
                </td>
                <td>
                    <?php echo $row['LateMoveIn']; ?>
                </td>
            </tr>
            <tr>
                <td>
                   ADA Complient: 
                </td>
                <td>
                   <?php 
                   if($row['IsADA'] == 1)
                       {
                       echo 'Yes';
                       }
                       else
                       {
                           echo 'No';
                       }
                   ?>
                </td>
                <td>
                    Smoking:
                </td>
                <td>
                    <?php 
                   if($row['IsSmokingRequired'] == 1)
                       {
                       echo 'Yes';
                       }
                       else
                       {
                           echo 'No';
                       }
                   ?>
                </td>
                <td>
                   Number of occupants:
                </td>
                <td>
                   <?php echo $row['NumOtherOccupants']; ?>
                </td>
                <td>
                    ESignature:
                </td>
                <td>
                    <?php echo $row['ESignature']; ?>
                </td>
            </tr>
            
            <?php 
            
            if($row['SecondaryOccupantFName'] != '')
                {
                    echo '<tr>
                <td>
                   Secondary Resident:
                </td>
                <td colspan="2">
                    '.$row['SecondaryOccupantFName'] . " " . $row['SecondaryOccupantLName'].'
                </td
                <td>
                    Secondary Resident Age:
                </td>
                <td>
                   '.$row['SecondaryOccupantAge'].'
                </td>
                <td>
                   Secondary Resident Relationship:
                </td>
                <td>
                   '.$row['SecondaryOccupantRelationship'].'
                </td>
            </tr>';
                }
                
                
                
            if($row['CurrentEmployerName'] != '')
            {
                echo '<tr>
                <td>
                   Current Employer:
                </td>
                <td colspan="2">
                    '.$row['CurrentEmployerName'].'
                </td>
                <td>
                    Current Supervisor name:
                </td>
                <td>
                   '.$row['CurrentSupFName'] . ' ' . $row['CurrentSupLName'].'
                </td>
                <td>
                   Supervisor Phone:
                </td>
                <td>
                   '. $row['CurrentSupPhone'] .'
                </td>
            </tr>
            
             <tr>
                <td>
                   Current Position:
                </td>
                <td>
                    '.$row['CurrentPositionName'].'
                </td>
                <td>
                    Months Employed:
                </td>
                <td>
                   '.$row['CurrentMonthsEmployed'].'
                </td>
                <td>
                   Annual Salary:
                </td>
                <td>
                   '.$row['CurrentAnnualSalary'].'
                </td>
            </tr>';
            }
            
            if($row['PrevEmployerName'] != '')
            {
                echo '<tr>
                <td>
                   Previous Employer
                </td>
                <td>
                    '.$row['PrevEmployerName'].'
                </td>
                <td>
                    Previous Supervisor Name
                </td>
                <td>
                   '.$row['PrevSupFName'] . " " . $row['PrevSupLName'].'
                </td>
                <td>
                   Phone:
                </td>
                <td>
                   '.$row['PrevSupPhone'].'
                </td>
                <td>
                   Position:
                </td>
                <td>
                   '.$row[PrevPositionName].'
                </td>
            </tr>
            
            <tr>
                <td>
                   Previous Job Duration:
                </td>
                <td>
                    '.$row['PrevMonthsEmployed'].'
                </td>
                <td>
                    Previous Annual Salary
                </td>
                <td>
                   '.$row['PrevAnnualSalary'].'
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
            </tr>';
            }
            
            if($row['CoAppEmployerName'] != '')
            {
                echo '<tr>
                <td>
                   Co Applicant Employer:
                </td>
                <td>
                    '.$row['CoAppEmployerName'].'
                </td>
                <td>
                    Co Applicant Supervisor Name
                </td>
                <td>
                   '.$row['CoAppSupFName'] . " " . $row['CoAppSupLName'].'
                </td>
                <td>
                   Co Applicant Employer Phone:
                </td>
                <td>
                   '.$row['CoAppSupPhone'].'
                </td>
                <td>
                   Co Applicant Position:
                </td>
                <td>
                   '.$row['CoAppPositionName'].'
                </td>
            </tr>
            
            <tr>
                <td>
                   Co Applicant Job Duration:
                </td>
                <td>
                    '.$row['CoAppMonthsEmployed'].'
                </td>
                <td>
                    Co Applicant Salary:
                </td>
                <td>
                   '.$row['CoAppAnnualSalary'].'
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
            </tr>';
            }
            
            echo '<tr>
                <td colspan="8">Vehicles</td>
            </tr>';
            
            if($row['Vehicle1Desc'] != '')
            {
                echo '<tr>
                            <td>
                               Vehicle Description:
                            </td>
                            <td colspan="3">
                                '.$row['Vehicle1Desc'].'
                            </td>
                            <td>
                                Vehicle License Number:
                            </td>
                            <td>
                               '.$row['Vehicle1LicenseNo'].'
                            </td>
                            <td>
                               Vehicle License State:
                            </td>
                            <td>
                               '.$row['Vehicle1LicenseState'].'
                            </td>

                    </tr>';
            }
            
            if($row['Vehicle2Desc'] != '')
            {
                echo '<tr>
                            <td>
                               Vehicle Description:
                            </td>
                            <td colspan="3">
                                '.$row['Vehicle2Desc'].'
                            </td>
                            <td>
                                Vehicle License Number:
                            </td>
                            <td>
                               '.$row['Vehicle2LicenseNo'].'
                            </td>
                            <td>
                               Vehicle License State:
                            </td>
                            <td>
                               '.$row['Vehicle2LicenseState'].'
                            </td>

                    </tr>';
            }
            if($row['Vehicle3Desc'] != '')
            {
                echo '<tr>
                            <td>
                               Vehicle Description:
                            </td>
                            <td colspan="3">
                                '.$row['Vehicle3Desc'].'
                            </td>
                            <td>
                                Vehicle License Number:
                            </td>
                            <td>
                               '.$row['Vehicle3LicenseNo'].'
                            </td>
                            <td>
                               Vehicle License State:
                            </td>
                            <td>
                               '.$row['Vehicle3LicenseState'].'
                            </td>

                    </tr>';
            }
            if($row['Vehicle4Desc'] != '')
            {
                echo '<tr>
                            <td>
                               Vehicle Description:
                            </td>
                            <td colspan="3">
                                '.$row['Vehicle4Desc'].'
                            </td>
                            <td>
                                Vehicle License Number:
                            </td>
                            <td>
                               '.$row['Vehicle4LicenseNo'].'
                            </td>
                            <td>
                               Vehicle License State:
                            </td>
                            <td>
                               '.$row['Vehicle4LicenseState'].'
                            </td>

                    </tr>';
            }
            
            echo '
                <tr>
                    <td colspan="8">Pets</td>
                </tr>';
            
            
            
            if($row['Pet1Weight'] != '')
            {
                echo '<tr>
                        <td>
                           Pet Type:
                        </td>
                        <td>
                            '.$row['Pet1Type'].'
                        </td>
                        <td>
                           Pet Breed:
                        </td>
                        <td>
                           '.$row['Pet1Breed'].'
                        </td>
                        <td>
                            Pet Weight:
                        </td>
                        <td>
                           '.$row['Pet1Weight'].'
                        </td>

                        <td>
                           Pet1Age
                        </td>
                        <td>
                           '.$row['Pet1Age'].'
                        </td>

                    </tr>';
            }
            
            if($row['Pet2Weight'] != '')
            {
                echo '<tr>
                        <td>
                           Pet Type:
                        </td>
                        <td>
                            '.$row['Pet2Type'].'
                        </td>
                        <td>
                           Pet Breed:
                        </td>
                        <td>
                           '.$row['Pet2Breed'].'
                        </td>
                        <td>
                            Pet Weight:
                        </td>
                        <td>
                           '.$row['Pet2Weight'].'
                        </td>

                        <td>
                           Pet1Age
                        </td>
                        <td>
                           '.$row['Pet2Age'].'
                        </td>

                    </tr>';
            }
            
            if($row['Pet3Weight'] != '')
            {
                echo '<tr>
                        <td>
                           Pet Type:
                        </td>
                        <td>
                            '.$row['Pet3Type'].'
                        </td>
                        <td>
                           Pet Breed:
                        </td>
                        <td>
                           '.$row['Pet3Breed'].'
                        </td>
                        <td>
                            Pet Weight:
                        </td>
                        <td>
                           '.$row['Pet3Weight'].'
                        </td>

                        <td>
                           Pet1Age
                        </td>
                        <td>
                           '.$row['Pet3Age'].'
                        </td>

                    </tr>';
            }
            
            
            echo '  <tr>
                        <td colspan="8">History Details</td>
                    </tr>';
            
            
            
                ?>

            <tr>
                <td>
                   Criminal History
                </td>
                <td>
                    <?php 
                   if($row['HasCrimHist'] == 1)
                       {
                       echo 'Yes';
                       }
                       else
                       {
                           echo 'No';
                       }
                   ?>
                </td>
                <td>
                   Bankrupcy History
                </td>
                <td>
                   <?php 
                   if($row['HasBankruptHist'] == 1)
                       {
                       echo 'Yes';
                       }
                       else
                       {
                           echo 'No';
                       }
                   ?>
                </td>
                <td>
                    Eviction History
                </td>
                <td>
                   <?php 
                   if($row['HasEvictHist'] == 1)
                       {
                       echo 'Yes';
                       }
                       else
                       {
                           echo 'No';
                       }
                   ?>
                </td>
                
                <td>
                   
                </td>
                <td>
                   
                </td>

            </tr>
            
            <tr>
                <td>
                   Criminal History Description:
                </td>
                <td>
                    <?php echo $row['CrimHistDesc']; ?>
                    
                </td>
                <td colspan="2">
                   Bankruptcy History Description: 
                </td>
                <td>
                   <?php echo $row['BankruptHistDesc']; ?>
                </td>
                <td>
                    Eviction History Description:
                </td>
                <td colspan="2">
                   <?php echo $row['EvictHistDescription']; ?>
                </td>
               

            </tr>
            
            <tr>
                <td>
                   Consumer Debt:
                </td>
                <td>
                    <?php echo $row['TotalConsumerDebt']; ?>
                </td>
                <td>
                   Loan Debt:
                </td>
                <td>
                   <?php echo $row['TotalLoanDebt']; ?>
                </td>
                <td>
                    Monthly Debt Payment:
                </td>
                <td>
                   <?php echo $row['MonthlyDebtPayment']; ?>
                </td>
                
                <td>
                   Total Assets:
                </td>
                <td>
                   <?php echo $row['TotalAssets']; ?>
                </td>

            </tr>
            
            <?php
            if($row['ContactFName'] != '')
            {
                        echo '<tr>
                        <td colspan="8">Co-Signer</td>
                    </tr>
                    <tr>
                        <td>
                           Name:
                        </td>
                        <td>
                            '.$row['ContactFName'] . ' ' . $row['ContactLName'].'
                        </td>
                        <td>
                           Address:
                        </td>
                        <td>
                           '.$row['ContactAddress'] . ', ' . $row['ContactState'] . ' ' . $row['ContactZip'].'
                        </td>
                        <td>
                            Relation:
                        </td>
                        <td>
                           '.$row['ContactRelation'].'
                        </td>

                        <td>
                           Home Phone:
                        </td>
                        <td>
                           '.$row['ContactHomePhone'].'
                        </td>

                    </tr>

                    <tr>
                        <td>
                           Cell Phone:
                        </td>
                        <td>
                            '.$row['ContactWorkPhone'].'
                        </td>
                        <td>
                           Work Phone:
                        </td>
                        <td>
                           '.$row['ContactCellPhone'].'
                        </td>
                    </tr>';
                    }
            ?>
             
        </table>
        
        
        
        
        <?php
            if($_SESSION[type] == 3)
            {
                
                echo '<br/>
                 <form method="post" action="approveApplication.php"><button class="button" type="submit">Activate</button><input type="text" value="'. $row['ApplicationID'] .'" style="display:none;" name="ApplicationID"/></form><a href="resetApplicaiton?applicaitonID='.$row['ApplicationID'].'" >Reset Application</a><a href="mailto:'.$row['Email'].'">Email</a>';
            }
        ?>
    </div>
    </div>
<?php

    include 'Footer.php';
?>
