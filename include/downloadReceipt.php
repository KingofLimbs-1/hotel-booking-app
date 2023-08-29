<?php require_once __DIR__ . "../../models/booking.php" ?>
<?php $newBookingInstance = new Booking($conn); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["bookingID"])) {
    $bookingIDToDownload = $_GET["bookingID"];
    $newBookingInstance->downloadReceipt($bookingIDToDownload);
}
?>