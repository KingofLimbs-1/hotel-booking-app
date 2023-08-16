<?php require_once __DIR__ . "/../config/database.php" ?>
<?php require_once __DIR__ . "/../models/user.php" ?>
<?php $userClassInstance =  new user($conn); ?>

<?php
$errors = [];

// Check to see that all input fields are filled
if (empty($_POST["username"]) || empty($_POST["fullName"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    $errors[] = "Error: Please fill in all input fields";
    // ...
} else {
    // Login method call
    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $userClassInstance->registerUser($username, $fullName, $email, $password);
    }
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