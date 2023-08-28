<?php session_start(); ?>
<?php require_once __DIR__ . "../../models/staff.php" ?>

<?php
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $newStaffInstance = new Staff($conn);
    $addAdmin = $newStaffInstance->addAdmin($userID, $username, $fullname, $email, $password, $role);
    if ($addAdmin) {
        header('location: ./../views/staff/landing.php?content=viewUsers');
        exit();
    }
}
?>