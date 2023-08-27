<?php session_start(); ?>
<?php require_once __DIR__ . "../../models/customer.php"; ?>
<?php $customerClassInstance = new customer($conn); ?>

<?php
if (isset($_POST["userID"])) {
    $userID = $_POST["userID"];
    echo $userID;
}
?>

<?php
$delete = $customerClassInstance->deleteUserAccount($userID);

if ($delete) {
    header('location: ../index.php');
    exit();
} else {
    echo "Query Failed";
}
?>