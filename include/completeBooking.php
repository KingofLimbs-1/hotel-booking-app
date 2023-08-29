<?php require_once __DIR__ . "../../models/booking.php"; ?>
<?php $newBookingInstance = new Booking($conn); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["completeBooking"])) {
    $bookingIDToComplete = $_POST["bookingID"];
    $completeBooking = $newBookingInstance->completeBooking($bookingIDToComplete);

    if ($completeBooking) {
        // Booking is successfully completed
        // Redirect to receipt page to finalize booking + download receipt
        header('location: ./../views/customer/receiptPage.php?bookingID=' . $bookingIDToComplete);
        exit();
    } else {
        // Booking failed or an error occurred
        header('location: ./../index.php');
        exit();
    }
}
?>