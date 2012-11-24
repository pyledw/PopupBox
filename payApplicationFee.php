<?
    /**
     * This page is to allow the user to pay their application fee
     */

    include_once 'config.inc.php';
    $title = "Contact LeaseHood";
    $userID = $_SESSION[userID];

    $con = get_dbconn("");
    $result = mysql_query("SELECT * FROM APPLICATION WHERE UserID ='$userID'");

    if(!$result)
    {
        die('could not connect: ' .mysql_error());
    }
    $row = mysql_fetch_array($result);

    if($row[IsPaid] == 1)
    {
        header( 'Location: /myHood.php' );
    }

    include 'Header.php';		// needs to come after Location redirects
?>

    <h1 class="Title">Contact LeaseHood</h1>
    <hr class="Title" />
    <div id="mainContent">
        PAY LISTING FEE HERE<br/><br/>
    </div>

<?
        include 'Footer.php';
?>
