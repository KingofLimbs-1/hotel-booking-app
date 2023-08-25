<?php session_start(); ?>
<?php require_once __DIR__ . "/include/displayHotels.php"; ?>

<?php
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <link rel="stylesheet" href="./assets/css/fonts.css">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
        <nav>
            <div class="logo">
                <?php $redirectLink = "./index.php" ?>
                <?php $imageLink = "./assets/images/logo.png" ?>
                <?php include __DIR__ . "/./config/logo.php" ?>
            </div>

            <!-- Markup if user is not signed in -->
            <?php if (!isset($userID)) : ?>
                <div class="navItems" id="right">
                    <a href="./register.php">
                        <p>Register</p>
                    </a>
                    <hr>
                    <a href="./login.php">
                        <p>Login</p>
                    </a>
                </div>
            <?php endif; ?>
            <!-- ... -->

            <!-- Markup if user is signed in -->
            <?php if (isset($userID)) : ?>
                <div class="navItems" id="right">
                    <a href="./views/customer/profile.php">
                        <img src="./assets/images/icons/userIcon.png" alt="userIcon">
                    </a>
                    <hr>
                    <a href="./include/logoutProcess.php">
                        <p>Logout</p>
                    </a>
                </div>
            <?php endif; ?>
            <!-- ... -->
        </nav>

        <!-- Landing -->
        <section class="landingContainer">
            <div class="innerContainer">
                <div class="innerText">
                    <h1>Elevate Your Getaways</h1>
                    <h2>Discover, Reserve, Experience</h2>
                    <a class="scrollBtn" href="#hotels">Find Your Perfect Stay</a>
                </div>
            </div>
        </section>
    <!-- Landing end -->

    <!-- Content section -->
    <section class="hotelSection" id="hotels">
        <?php foreach ($hotels as $hotel) : ?>
            <?php if (isset($userID)) : ?>
                <form action="./views/customer/hotel.php" method="post">
                <?php endif; ?>
                <input type="hidden" value="<?php echo $hotel["hotel_id"]; ?>" name="hotelID">
                <button type="submit" class="hotelContainer">
                    <div class="thumbnail">
                        <img src="<?php echo $hotel["thumbnail"]; ?>" alt="hotel thumbnail">
                    </div>

                    <div class="informationContainer">

                        <div class="information">
                            <span><?php echo $hotel["name"]; ?></span>
                            <div class="beds">
                                <img src="./assets/images/icons/beds.png" alt="bed icon">
                                <span><?php echo $hotel["beds"]; ?></span>
                            </div>
                            <span><?php echo $hotel["type"]; ?></span>
                        </div>

                        <div class="information">
                            <span id="city"><?php echo $hotel["city"]; ?></span>
                            <div class="rating">
                                <img src="./assets/images/icons/ratingStar.png" alt="rating star">
                                <span id="rating"><?php echo $hotel["rating"] ?></span>
                            </div>
                            <span id="price"><?php echo "R" . $hotel["cost_per_night"]; ?></span>
                        </div>
                    </div>

                </button>
                </form>
            <?php endforeach; ?>
    </section>
    <!-- Content section end -->
</body>

</html>