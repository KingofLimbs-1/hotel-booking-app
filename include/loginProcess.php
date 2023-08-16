<?php require_once __DIR__ . "/../config/database.php" ?>
<?php require_once __DIR__ . "/../models/user.php" ?>
<?php $userClassInstance =  new user($conn); ?>


<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check to see that all input fields are filled
    if (empty($_POST["username"]) || empty($_POST["fullName"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        $errors[] = "Error: Please fill in all input fields";
        // ...
    } else {
        // Login method call
        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $userClassInstance->loginUser($username, $password);
        }
        // ...
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

