<?php require_once __DIR__ . "/../../include/displaySelectedHotelInfo.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($hotelInfo as $hotel) : ?>
        <title><?php echo $hotel["name"]; ?></title>
    <?php endforeach; ?>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/hotel.css">
</head>

<body>
    <?php foreach ($hotelInfo as $hotel) :  ?>
        <div class="hotelInformationContainer">

            <div class="hotelDetails" id="info">

                <h1 class="heading"><?php echo $hotel["name"]; ?></h1>

                <div class="detail">
                    <img src="../../assets/images/icons/cityMarker.png" alt="">
                    <span><?php echo $hotel["city"] ?></span>
                </div>

                <div class="detail">
                    <img src="../../assets/images/icons/addressMarker.png" alt="">
                    <span><?php echo $hotel["address"]; ?></span>
                </div>

                <div class="detail">
                    <img src="../../assets/images/icons/ratingStar.png" alt="">
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

                <div class="bookingContainer">
                    <div class="date">
                        <label>Check-in</label>
                        <input type="date">
                    </div>
                    <div class="date">
                        <label>Checkout</label>
                        <input type="date">
                    </div>

                    <div class="submitContainer">
                        <input type="submit" value="Book">
                    </div>

                </div>
            </div>

        </div>
</body>
<?php endforeach; ?>

</html>