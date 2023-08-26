<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/customer.php"; ?>
<?php $customerClassInstance = new customer($conn); ?>

<?php
$userID = $_POST["userID"];
$property = $_POST["property"];
$newValue = $_POST["newValue"];
?>

<?php
$update = $customerClassInstance->editUserInformation($userID, $property, $newValue);

if ($update) {
    header('location: ./../views/customer/viewProfile.php');
    exit();
} else {
    echo "Failed to update user info, please try again";
}
?>
