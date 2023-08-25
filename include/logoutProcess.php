<?php session_start(); ?>
<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/user.php"; ?>
<?php $userClassInstance =  new user($conn); ?>

<?php
if (isset($_SESSION["userID"])) {
    $errors = [];
    $userID = $_SESSION["userID"];
    $userClassInstance->logout($userID);
} else {
    $errors[] = "Error: Cannot sign user out";
}
?>

<?php
// Check to see if errors occured
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "</br>";
    }
}
// ...
?>