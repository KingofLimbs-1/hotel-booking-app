<?php
// For the sake of displaying the hotels existing information when editing 
require_once __DIR__ . "/../../models/hotel.php";
$newHotelInstance = new hotel($conn);
?>

<?php
if (isset($_POST["hotelID"])) {
    $hotelID = $_POST["hotelID"];
    $existingHotelData = $newHotelInstance->getHotelByID($hotelID);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/staff/editHotel.css">
</head>

<body>
    <div class="heading">
        <h3>Edit</h3>
    </div>

    <div class="editContainer">
        <form class="formContainer" action="../../include/updateHotelInformation.php" method="post">
            <input type="hidden" name="hotelID" value="<?php echo $hotelID; ?>">
            <div class="formItemContainer">
                <div class="item">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $existingHotelData["name"]; ?>">
                </div>
                <div class="item">
                    <label>Cost Per Night</label>
                    <input type="number" name="costPerNight" value="<?php echo $existingHotelData["cost_per_night"]; ?>">
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item">
                    <label>Type</label>
                    <input type="text" name="type" value="<?php echo $existingHotelData["type"]; ?>">
                </div>
                <div class="item">
                    <label>Beds</label>
                    <input type="number" name="beds" value="<?php echo $existingHotelData["beds"]; ?>">
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item">
                    <label>Rating</label>
                    <input type="number" name="rating" step="0.01" value="<?php echo $existingHotelData["rating"]; ?>">
                </div>
                <div class="item">
                    <label>City</label>
                    <input type="text" name="city" value="<?php echo $existingHotelData["city"]; ?>">
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item" id="address">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $existingHotelData["address"]; ?>">
                </div>
            </div>
            <div class="submitContainer">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>

</html>