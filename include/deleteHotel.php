<?php session_start(); ?>
<?php require_once __DIR__ . "../../models/staff.php"; ?>
<?php $newStaffInstance = new Staff($conn); ?>

<?php
if (isset($_SESSION["userID"]) && isset($_POST["hotelID"])) {
    $userID = $_SESSION["userID"];
    $hotelID = $_POST["hotelID"];
    $deleteHotel =  $newStaffInstance->deleteHotel($userID, $hotelID);
    if ($deleteHotel) {
        header('location: ./../views/staff/landing.php?content=viewHotels');
        exit();
    }
}
?>