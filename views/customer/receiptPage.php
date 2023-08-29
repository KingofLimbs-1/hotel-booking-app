<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["bookingID"])) {
    $bookingID = $_GET["bookingID"];
    $receiptDownloadURL = "../../include/downloadReceipt.php?bookingID=" . $bookingID;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Choice</title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/receiptPage.css">
</head>

<body>
    <div class="finalizedBookingContainer">
        <div class="finalizedContent">
            <h3>Booking Complete</h3>
            <p>Your booking is successfully completed.</p>
            <p>Do you want to download the receipt?</p>
            <div class="redirects">
                <a href="<?php echo $receiptDownloadURL; ?>">Download Receipt</a>
                <a href="../../index.php">Return to Home</a>
            </div>
        </div>
    </div>
</body>

</html>