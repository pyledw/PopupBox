<?php
    session_start();
    
    require "config.inc.php";
         
    $con = mysql_connect($db_server,$db_user,$db_pass );
    if(!$con)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "connected to mySQL";
    }
    $select = mysql_selectdb($db_database, $con);
    if(!$select)
    {
        die('could not connect: ' .mysql_error());
    }
    else
    {
        //echo "Selected Database";
    }
    
    mysql_query("UPDATE APPLICATION SET HasCrimHist='$_POST[felony]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET HasEvictHist='$_POST[evicted]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET HasBankruptHist='$_POST[bankruptcy]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET BankruptHistDesc='$_POST[ifYes]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET TotalConsumerDebt='$_POST[devitCardDebt]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET MonthlyDebtPayment='$_POST[monthlyPayments]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET TotalLoanDebt='$_POST[loans]'
    WHERE UserID = '$_SESSION[userID]'");
    
    mysql_query("UPDATE APPLICATION SET TotalAssets='$_POST[equity]'
    WHERE UserID = '$_SESSION[userID]'");

    mysql_close();
    
    header( 'Location: /newHousingApplication4.php' );
?>
