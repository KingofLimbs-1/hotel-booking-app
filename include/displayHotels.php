<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/customer.php"; ?>
<?php $customerClassInstance = new customer($conn); ?>

<?php
$hotels = $customerClassInstance->displayHotels();
?>