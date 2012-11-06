<!-- This window will preform validation as well as an confirmation box. -->

<?php session_start(); ?>
<form id="placebid" method="post" action="placeBid.php">
    <font class="greyBackground">My Proposal for occupancy</font><br/>
    <label class="label">Your Bid: <?php echo $_GET["amt"] ?></label><br/>
    <p>Are you sure you want to submit your bid?</p>
    <input type="text" style="display: none;" name="amt" value="<?php echo $_GET["amt"] ?>" />
    <input type="text" style="display: none;" name="auctionID" value="<?php echo $_GET["auctionID"] ?>" />
    <input type="text" style="display: none;" name="userID" value="<?php echo $_SESSION[userID] ?>" />
    <input type="text" style="display: none;" name="propertyID" value="<?php echo $_GET["propertyID"] ?>" />
    Submit <button type="submit">Submit</button>
</form>