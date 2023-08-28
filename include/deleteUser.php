<?php session_start(); ?>
<?php require_once __DIR__ . "../../models/staff.php"; ?>
<?php $newStaffInstance = new Staff($conn); ?>

<?php
if (isset($_SESSION["userID"])) {
    $sessionUserID = $_SESSION["userID"];
    echo $sessionUserID;
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"]) {
    $userID = $_POST["userID"];
    $deleteUser = $newStaffInstance->deleteUser($sessionUserID, $userID);
    if ($deleteUser) {
        header('location: ./../views/staff/landing.php?content=viewUsers');
        exit();
    }
}
?>