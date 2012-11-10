
<?php
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
        <table class="tableForm">
            <font class="formheader" style="left:200px;">Resident Application</font>
            <tr>
                <td>
                   First Name: 
                </td>
                <td>
                    <?php echo $row[FirstName]; ?>
                </td>
                <td>
                    Last Name:
                </td>
                <td>
                    <?php echo $row[FirstName]; ?>
                </td>
                <td>
                    Email:
                </td>
                <td>
                    <?php echo $row[Email]; ?>
                </td>
                <td>
                    Zip Code:
                </td>
                <td>
                    <?php echo $row[ZipCode]; ?>
                </td>
            </tr>
            <tr>
                <td>
                   City:
                </td>
                <td>
                    <?php echo $row[City]; ?>
                </td>
                <td>
                    State:
                </td>
                <td>
                   <?php echo $row[State]; ?>
                </td>
                <td>
                   Earliest Move In: 
                </td>
                <td>
                   <?php echo $row[EarlyMoveIn]; ?>
                </td>
                <td>
                    Latest Move In:
                </td>
                <td>
                    <?php echo $row[LateMoveIn]; ?>
                </td>
            </tr>
            <tr>
                <td>
                   ADA Complient: 
                </td>
                <td>
                   <?php 
                   if($row[IsADA] == 1)
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
                   if($row[IsSmokingRequired] == 1)
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
                   Number of occupants 
                </td>
                <td>
                   <?php echo $row[NumOtherOccupants]; ?>
                </td>
                <td>
                    ESignature
                </td>
                <td>
                    <?php echo $row[ESignature]; ?>
                </td>
            </tr>
            <tr>
                <td>
                   Secondary Resident:
                </td>
                <td colspan="2">
                    <?php echo $row[SecondaryOccupantFName] . " " . $row[SecondaryOccupantLName]; ?>
                </td>
                <td>
                    Secondary Resident Age:
                </td>
                <td>
                   <?php echo $row[SecondaryOccupantAge]; ?>
                </td>
                <td>
                   Secondary Resident Relationship:
                </td>
                <td>
                   <?php echo $row[SecondaryOccupantRelationship]; ?>
                </td>
            </tr>
            
             <tr>
                <td>
                   Current Employer:
                </td>
                <td colspan="2">
                    <?php echo $row[CurrentEmployerName]; ?>
                </td>
                <td>
                    Current Supervisor name:
                </td>
                <td>
                   <?php echo $row[CurrentSupFName] . " " . $row[CurrentSupLName]; ?>
                </td>
                <td>
                   Supervisor Phone:
                </td>
                <td>
                   <?php echo $row[CurrentSupPhone]; ?>
                </td>
            </tr>
            
             <tr>
                <td>
                   Current Position:
                </td>
                <td>
                    <?php echo $row[CurrentPositionName]; ?>
                </td>
                <td>
                    Months Employed:
                </td>
                <td>
                   <?php echo $row[CurrentMonthsEmployed]; ?>
                </td>
                <td>
                   Annual Salary:
                </td>
                <td>
                   <?php echo $row[CurrentAnnualSalary]; ?>
                </td>
            </tr>
            
            <tr>
                <td>
                   Previous Employer
                </td>
                <td>
                    <?php echo $row[PrevEmployerName]; ?>
                </td>
                <td>
                    Previous Supervisor Name
                </td>
                <td>
                   <?php echo $row[PrevSupFName] . " " . $row[PrevSupLName]; ?>
                </td>
                <td>
                   Phone:
                </td>
                <td>
                   <?php echo $row[PrevSupPhone]; ?>
                </td>
                <td>
                   Position:
                </td>
                <td>
                   <?php echo $row[PrevPositionName]; ?>
                </td>
            </tr>
            
            <tr>
                <td>
                   Previous Job Duration:
                </td>
                <td>
                    <?php echo $row[PrevMonthsEmployed]; ?>
                </td>
                <td>
                    Previous Annual Salary
                </td>
                <td>
                   <?php echo $row[PrevAnnualSalary]; ?>
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
            </tr>
            
            <tr>
                <td>
                   Co Applicant Employer:
                </td>
                <td>
                    <?php echo $row[CoAppEmployerName]; ?>
                </td>
                <td>
                    Co Applicant Supervisor Name
                </td>
                <td>
                   <?php echo $row[CoAppSupFName] . " " . $row[CoAppSupLName]; ?>
                </td>
                <td>
                   Co Applicant Employer Phone:
                </td>
                <td>
                   <?php echo $row[CoAppSupPhone]; ?>
                </td>
                <td>
                   Co Applicant Position:
                </td>
                <td>
                   <?php echo $row[CoAppPositionName]; ?>
                </td>
            </tr>
            
            <tr>
                <td>
                   Co Applicant Job Duration:
                </td>
                <td>
                    <?php echo $row[CoAppMonthsEmployed]; ?>
                </td>
                <td>
                    Co Applicant Salary:
                </td>
                <td>
                   <?php echo $row[CoAppAnnualSalary]; ?>
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
                <td>
                   
                </td>
            </tr>
            
            <tr>
                <td colspan="8">Vehicles</td>
            </tr>
            
           <tr>
                <td>
                   Vehicle Description:
                </td>
                <td colspan="3">
                    <?php echo $row[Vehicle2Desc]; ?>
                </td>
                <td>
                    Vehicle License Number:
                </td>
                <td>
                   <?php echo $row[Vehicle2LicenseNo]; ?>
                </td>
                <td>
                   Vehicle License State:
                </td>
                <td>
                   <?php echo $row[Vehicle2LicenseState]; ?>
                </td>

            </tr>
            
            <tr>
                <td>
                   Vehicle Description:
                </td>
                <td colspan="3">
                    <?php echo $row[Vehicle3Desc]; ?>
                </td>
                <td>
                    Vehicle License Number:
                </td>
                <td>
                   <?php echo $row[Vehicle3LicenseNo]; ?>
                </td>
                <td>
                   Vehicle License State:
                </td>
                <td>
                   <?php echo $row[Vehicle3LicenseState]; ?>
                </td>

            </tr>
            
            <tr>
                <td>
                   Vehicle Description:
                </td>
                <td colspan="3">
                    <?php echo $row[Vehicle1Desc]; ?>
                </td>
                <td>
                    Vehicle License Number:
                </td>
                <td>
                   <?php echo $row[Vehicle1LicenseNo]; ?>
                </td>
                <td>
                   Vehicle License State:
                </td>
                <td>
                   <?php echo $row[Vehicle1LicenseState]; ?>
                </td>

            </tr>
            
            <tr>
                <td>
                   Vehicle Description:
                </td>
                <td colspan="3">
                    <?php echo $row[Vehicle4Desc]; ?>
                </td>
                <td>
                    Vehicle License Number:
                </td>
                <td>
                   <?php echo $row[Vehicle4LicenseNo]; ?>
                </td>
                <td>
                   Vehicle License State:
                </td>
                <td>
                   <?php echo $row[Vehicle4LicenseState]; ?>
                </td>

            </tr>
             <tr>
                <td colspan="8">Pets</td>
            </tr>
            <tr>
                <td>
                   Pet Type:
                </td>
                <td>
                    <?php echo $row[Pet1Type]; ?>
                </td>
                <td>
                   Pet Breed:
                </td>
                <td>
                   <?php echo $row[Pet1Breed]; ?>
                </td>
                <td>
                    Pet Weight:
                </td>
                <td>
                   <?php echo $row[Pet1Weight]; ?>
                </td>
                
                <td>
                   Pet1Age
                </td>
                <td>
                   <?php echo $row[Pet1Age]; ?>
                </td>

            </tr>
            
            <tr>
                <td>
                   Pet Type:
                </td>
                <td>
                    <?php echo $row[Pet2Type]; ?>
                </td>
                <td>
                   Pet Breed:
                </td>
                <td>
                   <?php echo $row[Pet2Breed]; ?>
                </td>
                <td>
                    Pet Weight:
                </td>
                <td>
                   <?php echo $row[Pet2Weight]; ?>
                </td>
                
                <td>
                   Pet1Age
                </td>
                <td>
                   <?php echo $row[Pet2Age]; ?>
                </td>

            </tr>
            
            <tr>
                <td>
                   Pet Type:
                </td>
                <td>
                    <?php echo $row[Pet3Type]; ?>
                </td>
                <td>
                   Pet Breed:
                </td>
                <td>
                   <?php echo $row[Pet3Breed]; ?>
                </td>
                <td>
                    Pet Weight:
                </td>
                <td>
                   <?php echo $row[Pet3Weight]; ?>
                </td>
                
                <td>
                   Pet Age:
                </td>
                <td>
                   <?php echo $row[Pet3Age]; ?>
                </td>

            </tr>
            <tr>
                <td colspan="8">History Details</td>
            </tr>
            <tr>
                <td>
                   Criminal History
                </td>
                <td>
                    <?php 
                   if($row[HasCrimHist] == 1)
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
                   if($row[HasBankruptHist] == 1)
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
                   if($row[HasEvictHist] == 1)
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
                    <?php echo $row[CrimHistDesc]; ?>
                    
                </td>
                <td colspan="2">
                   Bankruptcy History Description: 
                </td>
                <td>
                   <?php echo $row[BankruptHistDesc]; ?>
                </td>
                <td>
                    Eviction History Description:
                </td>
                <td colspan="2">
                   <?php echo $row[EvictHistDescription]; ?>
                </td>
               

            </tr>
            
            <tr>
                <td>
                   Consumer Debt:
                </td>
                <td>
                    <?php echo $row[TotalConsumerDebt]; ?>
                </td>
                <td>
                   Loan Debt:
                </td>
                <td>
                   <?php echo $row[TotalLoanDebt]; ?>
                </td>
                <td>
                    Monthly Debt Payment:
                </td>
                <td>
                   <?php echo $row[MonthlyDebtPayment]; ?>
                </td>
                
                <td>
                   Total Assets:
                </td>
                <td>
                   <?php echo $row[TotalAssets]; ?>
                </td>

            </tr>
             <tr>
                <td colspan="8">Emergency Contact</td>
            </tr>
            <tr>
                <td>
                   Name:
                </td>
                <td>
                    <?php echo $row[ContactFName] . ' ' . $row[ContactLName]; ?>
                </td>
                <td>
                   Address
                </td>
                <td>
                   <?php echo $row[ContactAddress] . ', ' . $row[ContactState] . ' ' . $row[ContactZip] ; ?>
                </td>
                <td>
                    Relation:
                </td>
                <td>
                   <?php echo $row[ContactRelation]; ?>
                </td>
                
                <td>
                   Home Phone
                </td>
                <td>
                   <?php echo $row[ContactHomePhone]; ?>
                </td>

            </tr>
            
            <tr>
                <td>
                   Cell Phone:
                </td>
                <td>
                    <?php echo $row[ContactWorkPhone]; ?>
                </td>
                <td>
                   Work Phone:
                </td>
                <td>
                   <?php echo $row[ContactCellPhone]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    
                    <?php
                        if($_SESSION[type] == 3)
                        {
                            echo '<br/>
                             <form method="post" action="approveApplication.php"><button class="button" type="submit">Activate</button><input type="text" value="'. $row[ApplicationID] .'" style="display:none;" name="ApplicationID"/></form>';
                        }
                        if(isset($auctionID))
                        {
                            echo '<a class="button" rel="facebox" href="confirmPFOSelection.php?auctionID='.$auctionID.'&applicationID='.$applicationID.'">Select as winning Bid</a>';
                        }
                    ?>
                </td>
            </tr>
        </table>
    </div>
<?php

    include 'Footer.php';
?>
