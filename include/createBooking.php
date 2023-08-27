<?php require_once __DIR__ . "../../models/booking.php"; ?>
<?php $newBookingInstance = new Booking($conn); ?>

<?php if (isset($_POST["userID"]) && isset($_POST["hotelID"]) && isset($_POST["check-in"]) && isset($_POST["check-out"])) {
    $userID = $_POST["userID"];
    $hotelID = $_POST["hotelID"];
    $checkIn = $_POST["check-in"];
    $checkOut = $_POST["check-out"];
    $costPerNight = $_POST["costPerNight"];

    $booking = $newBookingInstance->createBooking($userID, $hotelID, $checkIn, $checkOut, $costPerNight);
}
?>
