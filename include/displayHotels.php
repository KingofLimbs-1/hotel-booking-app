<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/hotel.php"; ?>
<?php $customerClassInstance = new hotel($conn); ?>

<?php
$hotels = $customerClassInstance->displayHotels();
?>