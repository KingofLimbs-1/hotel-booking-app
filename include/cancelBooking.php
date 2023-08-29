<?php require_once __DIR__ . "../../models/booking.php" ?>
<?php $newBookingInstance = new Booking($conn); ?>

<?php
if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["cancelBooking"])) {
    $bookingIDToCancel = $_POST["bookingID"];
    $cancelBooking = $newBookingInstance->cancelBooking($bookingIDToCancel);

    if ($cancelBooking) {
        header('location: ./../views/customer/viewBookings.php');
        exit();
    } else {
        echo "Failed to cancel booking.";
    }
}
