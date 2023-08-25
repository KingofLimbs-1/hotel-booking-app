<?php session_start(); ?>
<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/customer.php"; ?>
<?php $newCustomerClassInstance = new customer($conn); ?>

<?php
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
}
?>

<?php
$userInfo = $newCustomerClassInstance->displayLoggedInUsersInfo($userID);
?>