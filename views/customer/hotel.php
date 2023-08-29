<?php require_once __DIR__ . "/../../include/displaySelectedHotelInfo.php" ?>
<?php session_start(); ?>

<?php
$userID = null;
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
}
?>

<?php
require_once __DIR__ . '/../../models/navbar.php';
$navbar = new Navbar('../../index.php', '../../assets/images/logo.png', '../../register.php', '../../login.php', '../../views/customer/profile.php', '../../assets/images/icons/userIcon.png', '../../include/logoutProcess.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($hotelInfo as $hotel) : ?>
        <title><?php echo $hotel["name"]; ?></title>
    <?php endforeach; ?>
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/hotel.css">
</head>

<body>
    <?php foreach ($hotelInfo as $hotel) :  ?>
        <div class="navbar">
            <?php echo $navbar->renderLogo(); ?>
            <?php echo $navbar->renderNavItems($userID); ?>
        </div>

        <div class="hotelInformationContainer">

            <div class="hotelDetails" id="info">

                <h1 class="heading"><?php echo $hotel["name"]; ?></h1>

                <div class="detail">
                    <img src="../../assets/images/icons/hotelPrice.png" alt="price tag icon">
                    <span><?php echo "R" . $hotel["cost_per_night"] . " " . "Per Night"; ?></span>
                </div>

                <div class="detail">
                    <img src="../../assets/images/icons/cityMarker.png" alt="city marker icon">
                    <span><?php echo $hotel["city"] ?></span>
                </div>

                <div class="detail">
                    <img src="../../assets/images/icons/addressMarker.png" alt="address marker icon">
                    <span><?php echo $hotel["address"]; ?></span>
                </div>

                <div class="detail">
                    <img src="../../assets/images/icons/ratingStar.png" alt="rating icon">
                    <span><?php echo $hotel["rating"]; ?></span>
                </div>

            </div>

            <div class="imageCarousel" id="info">
                <?php $images = explode("\n", $hotel["images"]);
                foreach ($images as $image) {
                    $image = trim($image);
                    if (!empty($image)) {
                        echo "<img class='hotelImage' src= '$image'>";
                    }
                }
                ?>
            </div>

            <div class="description" id="info">
                <h1 class="heading">Description</h1>
                <span><?php echo $hotel["description"]; ?></span>
            </div>

            <div class="facilities" id="info">
                <h1 class="heading">Facilities</h1>
                <ul>
                    <?php $facilities = explode("\n", $hotel["features"]);
                    foreach ($facilities as $facility) {
                        $facility = trim($facility);
                        echo "<li>$facility</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="bookHotelContainer">

                <form action="../../include/createBooking.php" method="post">
                    <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                    <input type="hidden" name="hotelID" value="<?php echo $hotel["hotel_id"] ?>">
                    <input type="hidden" name="costPerNight" value="<?php echo $hotel["cost_per_night"]; ?>">

                    <div class="bookingContainer">
                        <div class="date">
                            <label>Check-in</label>
                            <input type="date" name="check-in" required>
                        </div>
                        <div class="date">
                            <label>Checkout</label>
                            <input type="date" name="check-out" required>
                        </div>

                        <div class="submitContainer">
                            <input type="submit" value="Book">
                        </div>

                    </div>
                </form>
            </div>

        </div>
</body>
<?php endforeach; ?>

</html>