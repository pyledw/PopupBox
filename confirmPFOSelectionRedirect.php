<?php
    /**
     * This page will set the selected BID as the winnning bid.  It first changes all the bids in the
     * listing to not being active.  It then selects the bid the landlord specified and changes it to
     * be set as the winning bid.  It then reroutes the user back to thier myhood page.
     * 
     * @author David Pyle <Pyledw@Gmail.com>
     */
                        
    

    $applicationID = $_POST['applicationID'];
    $auctionID = $_POST['auctionID'];
    
    include_once 'config.inc.php';
    
    $con = get_dbconn("");
    
    $result = mysql_query("
        SELECT * FROM BID
        INNER JOIN AUCTION
        ON BID.AuctionID=AUCTION.AuctionID
        INNER JOIN APPLICATION
        ON BID.ApplicationID=APPLICATION.ApplicationID
        WHERE AUCTION.AuctionID='$auctionID'
        ");
    
        if(!$result)
        {
            die('could not connect: ' .mysql_error());
        }
        $result2 = mysql_query("UPDATE AUCTION
            SET DatePFOEndAccept='date() - 1 Day'
            WHERE AUCTION.AuctionID='$auctionID'");
        if(!$result2)
        {
            die('could not connect: ' .mysql_error());
        }
    
    while($row = mysql_fetch_array($result))
    {
        echo $row['ApplicationID'] . ' <-Application ID from row';
        echo $applicationID . ' <-Application ID from Variable';
        
        if($row[ApplicationID] == $applicationID)
            {
                //Using the new method for inserting into the Database
                    $con = get_dbconn("PDO");
                    $stmt = $con->prepare("
                        UPDATE BID SET
                            IsActive=:activeBid, IsWinningBid=:winning
                            WHERE BidID='$row[BidID]'
                        ");
                    try {
                    $stmt->bindValue(':activeBid',     0,              PDO::PARAM_INT);
                    $stmt->bindValue(':winning',     1,              PDO::PARAM_INT);
                    $stmt->execute();
                } 
                catch (Exception $e) 
                {
                    echo 'Connection failed. ' . $e->getMessage();
                }
            }
        else
            {
                    //Using the new method for inserting into the Database
                    $con = get_dbconn("PDO");
                    $stmt = $con->prepare("
                        UPDATE BID SET
                            IsActive=:activeBid
                            WHERE BidID='$row[BidID]'
                        ");
                    try {
                    $stmt->bindValue(':activeBid',     0,              PDO::PARAM_INT);
                    $stmt->execute();
                } 
                catch (Exception $e) 
                {
                    echo 'Connection failed. ' . $e->getMessage();
                }
            }
    }
    
    
    header( 'Location: /myHood.php' );
?>
