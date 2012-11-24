<?
require_once ("paypal.inc.php");
require_once ("log.inc.php");

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

    public static function write_listing_fee_record($userid, $propertyid, $token, $price)
    {
		loginfo('Calling write_listing_fee_record with: ' . print_r(func_get_args(), true));

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
		$id = $con->lastInsertId();
		loginfo("Resulting ID: $id";
		return $id;
    }

    public static function write_application_fee_record($userid, $applicationid, $token, $price)
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

	private static function update_status($token, $status, $amount)
	{
		$con = get_dbconn("PDO");
        $stmt = $con->prepare("UPDATE FEE 
                               SET 
                                   TransactionStatusID = :statusid, 
                                   Amount = :amt 
                               WHERE PaymentToken = :token");
        $stmt->bindValue(':token',     $token,   PDO::PARAM_STR);
		$stmt->bindValue(':amt',       $amount,  PDO::PARAM_STR);
        $stmt->bindValue(':statusid',  $status,  PDO::PARAM_INT);

        $stmt->execute();
	}

	public static function complete_paypal($token, $payerID)
	{
		$res = GetExpressCheckoutDetails($token);
		$finalPaymentAmount = $res["AMT"];

		$resArray = ConfirmPayment($token, $payerID, $finalPaymentAmount);
		$ack = strtoupper($resArray["ACK"]);
		if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING")
		{
			self::update_status($token, self::STATUS_SUCCESS, $finalPaymentAmount);
			return true;
		}
		else
		{	
			logerror("Problem with paypal-ConfirmPayment: " . print_r($resArray, true));
			self::update_status($token, self::STATUS_ERROR, $finalPaymentAmount);
			return false;
		}
	}

	public static function set_property_ispaid($token)
	{
		$con = get_dbconn("PDO");
        $stmt = $con->prepare("UPDATE PROPERTY
                               SET
                                   IsPaid = '1'
                               WHERE PropertyID = (SELECT PropertyID 
                                                   FROM FEE 
                                                   WHERE PaymentToken = :token)");
        $stmt->bindValue(':token',  $token,  PDO::PARAM_INT);
        $stmt->execute();
	}
}


