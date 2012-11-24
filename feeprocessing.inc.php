<?
class FeeProcessing
{
    const STATUS_BEGIN = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_CANCEL = 3;
    const STATUS_ERROR = 4;

    const SERVICE_PAYPAL = 1;

    const FEE_TYPE_LISTING = 1;
    const FEE_TYPE_APPLICATION = 2;

    const FEE_INSERT_SQL = "
              INSERT INTO FEE
                  (UserID, FeeType, Amount, PropertyID, ApplicationID,
                   PaymentServiceID, PaymentToken, TransactionStatusID)
              VALUES
                  (:userid, :feetype, :amount, :propertyid, :applicationid, :serviceid, :token, :statusid)";

    public function write_listing_fee_record($userid, $propertyid, $token, $price)
    {
        $con = get_dbconn("PDO");
        $stmt = $con->prepare(self::FEE_INSERT_SQL);

        $stmt->bindValue(':userid',        $userid,                PDO::PARAM_INT);
        $stmt->bindValue(':amount',        $price,                 PDO::PARAM_STR);
        $stmt->bindValue(':propertyid',    $propertyid,            PDO::PARAM_INT);
        $stmt->bindValue(':token',         $token,                 PDO::PARAM_STR);
        $stmt->bindValue(':applicationid', null,                   PDO::PARAM_INT);
        $stmt->bindValue(':statusid',      self::STATUS_BEGIN,     PDO::PARAM_INT);
        $stmt->bindValue(':feetype',       self::FEE_TYPE_LISTING, PDO::PARAM_INT);
        $stmt->bindValue(':serviceid',     self::SERVICE_PAYPAL,   PDO::PARAM_INT);

        $stmt->execute();
        return $con->lastInsertId();
    }

    public function write_application_fee_record($userid, $applicationid, $token, $price)
    {
        $con = get_dbconn("PDO");
        $stmt = $con->prepare(self::FEE_INSERT_SQL);

        $stmt->bindValue(':userid',        $userid,                    PDO::PARAM_INT);
        $stmt->bindValue(':amount',        $price,                     PDO::PARAM_STR);
        $stmt->bindValue(':applicationid', $auctionid,                 PDO::PARAM_INT);
        $stmt->bindValue(':token',         $token,                     PDO::PARAM_STR);
        $stmt->bindValue(':statusid',      self::STATUS_BEGIN,         PDO::PARAM_INT);
        $stmt->bindValue(':feetype',       self::FEE_TYPE_APPLICATION, PDO::PARAM_INT);
        $stmt->bindValue(':serviceid',     self::SERVICE_PAYPAL,       PDO::PARAM_INT);

        $stmt->execute();
        return $con->lastInsertId();
    }
}

?>
