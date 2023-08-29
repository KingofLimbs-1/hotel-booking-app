<?php session_start(); ?>
<?php require_once __DIR__ . "/../../config/database.php"; ?>
<?php require_once __DIR__ . "/../../models/booking.php"; ?>
<?php $newBookingInstance = new Booking($conn); ?>

<?php
if (isset($_GET["booking_id"])) {
    $bookingID = $_GET["booking_id"];

    // Get booking information using the booking ID
    $bookingInfo = $newBookingInstance->getBookingInfo($bookingID);

    if ($bookingInfo) {
        // Booking successful
        // Get related hotels
        $relatedHotels = $newBookingInstance->getRelatedHotels($bookingInfo["hotel_id"], $bookingInfo["hotel_cost_per_night"]);
    } else {
        echo "Booking not found or error occurred";
    }
} else {
    echo "Missing booking ID";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/confirmBooking.css">
</head>

<body>
    <div class="heading">
        <h3>Complete Booking</h3>
    </div>

    <div class="containerHeading">
        <h3>Your Trip</h3>
    </div>

    <div class="bookingDisplayContainer">
        <div class="bookingInfoContainer">
            <div class="bookingInfo">

                <div class="infoItem">
                    <span><?php echo $bookingInfo["user_fullname"] ?></span>
                    <span><?php echo $bookingInfo["user_email"]; ?></span>
                </div>

                <div class="infoItem" id="hotel">
                    <span><?php echo $bookingInfo["hotel_name"]; ?></span>
                    <span><?php echo $bookingInfo["hotel_type"]; ?></span>
                    <span>
                        <img id="bedsImg" src="../../assets/images/icons/beds.png" alt="">
                        <?php echo $bookingInfo["hotel_beds"]; ?>
                    </span>
                    <span>
                        <img src="../../assets/images/icons/ratingStar.png" alt="">
                        <?php echo $bookingInfo["hotel_rating"]; ?>
                    </span>
                </div>
                <div class="infoItem" id="time">
                    <div class="dates">
                        <span><?php echo date("Y-m-d", strtotime($bookingInfo["check_in"])); ?></span>
                        -
                        <span><?php echo date("Y-m-d", strtotime($bookingInfo["check_out"])); ?></span>
                    </div>
                    <div class="days">
                        <span><?php echo $bookingInfo["days"] ?> days</span>
                    </div>
                </div>
                <div class="infoItem" id="price">
                    <div class="costPerNight">
                        <span><?php echo "R" . $bookingInfo["hotel_cost_per_night"]; ?></span>
                        <span>x</span>
                        <span><?php echo $bookingInfo["days"] ?> days</span>
                    </div>
                    <div class="totalCost">
                        <span>Total = </span>
                        <span><?php echo "R" . $bookingInfo["total_cost"] ?></span>
                    </div>
                </div>
            </div>
            <div class="completeBookingContainer">
                <form action="../../include/completeBooking.php" method="post">
                    <input type="hidden" name="bookingID" value="<?php echo $bookingInfo["booking_id"]; ?>">
                    <input type="submit" name="completeBooking" value="Book">
                </form>
            </div>
            <div class="thumbnail">
                <img src="<?php echo "../." . $bookingInfo["hotel_thumbnail"]; ?>" alt="hotel thumbnail">
            </div>
        </div>
    </div>

    <div class="relatedHotelsHeading">
        <h3>Some other places you might like...</h3>
    </div>
    <div class="relatedHotelsContainer">
        <div class="relatedHotels">
            <?php foreach ($relatedHotels as $relatedHotel) : ?>
                <a href="<?php echo "./../../views/customer/hotel.php?hotel_id=" . $relatedHotel["hotel_id"]; ?>">
                    <div class="relatedHotel">
                        <div class="relatedThumbnail">
                            <img src="<?php echo "../." . $relatedHotel["thumbnail"] ?>" alt="">
                        </div>

                        <div class="name">
                            <span><?php echo $relatedHotel["name"]; ?></span>
                        </div>

                        <div class="rating">
                            <img src="../../assets/images/icons/ratingStar.png" alt="">
                            <span><?php echo $relatedHotel["rating"]; ?></span>
                        </div>

                        <div class="prices">
                            <span id="currentHotelCost"><?php echo "R" . $bookingInfo["hotel_cost_per_night"] ?></span>

                            <?php if ($relatedHotel["cost_per_night"] < $bookingInfo["hotel_cost_per_night"]) : ?>
                                <span id="relatedContainerPrice">
                                    <span><?php echo "R" . $relatedHotel["cost_per_night"] ?></span>
                                    <img src="../../assets/images/icons/discount.png" alt="">
                                </span>
                            <?php else : ?>
                                <span id="relatedContainerPrice">
                                    <span><?php echo "R" . $relatedHotel["cost_per_night"] ?></span>
                                    <img src="../../assets/images/icons/expensive.png" alt="">
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>