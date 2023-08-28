<?php session_start(); ?>
<?php require_once __DIR__ . "../../models/staff.php" ?>

<?php
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $costPerNight = $_POST["costPerNight"];
    $type = $_POST["type"];
    $beds = $_POST["beds"];
    $rating = $_POST["rating"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $newStaffInstance = new Staff($conn);
    $addHotel = $newStaffInstance->addHotel($userID, $name, $costPerNight, $type, $beds, $rating, $city, $address);
}
?>