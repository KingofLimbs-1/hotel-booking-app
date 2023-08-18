<?php session_start(); ?>
<?php require_once __DIR__ . "/../config/database.php"; ?>
<?php require_once __DIR__ . "/../models/user.php"; ?>
<?php $userClassInstance =  new user($conn); ?>

<?php
if (isset($_SESSION["username"])) {
    $errors = [];
    $username = $_SESSION["username"];
    $userClassInstance->logout($username);
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