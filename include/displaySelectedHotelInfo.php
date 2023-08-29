<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/hotel.php"; ?>
<?php $customerClassInstance = new hotel($conn); ?>

<?php
if (isset($_GET["hotelID"])) {
    $hotelID = $_GET["hotelID"];
    $hotelInfo = $customerClassInstance->displaySelectedHotelInfo($hotelID);
}
?>