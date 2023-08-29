<?php session_start(); ?>
<?php require_once __DIR__ . "../../models/staff.php"; ?>

<?php
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newStaffInstance = new Staff($conn);

    $hotelID = $_POST["hotelID"];
    $editedFields = array(
        "name" => $_POST["name"],
        "cost_per_night" => $_POST["costPerNight"],
        "type" => $_POST["type"],
        "beds" => $_POST["beds"],
        "rating" => $_POST["rating"],
        "city" => $_POST["city"],
        "address" => $_POST["address"],
    );

    $result = $newStaffInstance->updateHotel($userID, $hotelID, $editedFields);

    if ($result) {
        header('location: ./../views/staff/landing.php?content=viewHotels');
        exit();
    } else {
        echo "Update failed";
    }
}
?>