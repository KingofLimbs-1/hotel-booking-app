<?php session_start(); ?>
<?php require_once __DIR__ . "/include/displayHotels.php"; ?>

<?php
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
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
            <?php $imageLink = "./assets/images/logo.png" ?>
            <?php include __DIR__ . "/./config/logo.php" ?>
        </div>

        <div class="navItems" id="center">
            <a href="./index.php">Home</a>
            <a href="./views/customer/hotel.php">Hotels</a>
            <a href="#">Contact</a>
        </div>

        <!-- Markup if user is not signed in -->
        <?php if (!isset($username)) : ?>
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
        <?php if (isset($username)) : ?>
            <div class="navItems" id="right">
                <!-- <hr> -->
                <a href="./views/customer/profile.php">
                    <img src="./assets/images/icons/userIcon.png" alt="userIcon">
                    <p><?php echo $username; ?></p>
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
            <div class="hotelContainer">
                <div class="thumbnail">
                    <img src="<?php echo $hotel["thumbnail"]; ?>" alt="hotel thumbnail">
                </div>

                <div class="informationContainer">

                    <div class="information">
                        <span><?php echo $hotel["name"]; ?></span>
                        <span><?php echo $hotel["beds"]; ?></span>
                        <span><?php echo $hotel["type"]; ?></span>
                    </div>

                    <div class="information">
                        <span><?php echo $hotel["city"]; ?></span>
                        <span>0</span>
                        <span><?php echo "R" . $hotel["cost_per_night"]; ?></span>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <!-- Content section end -->
</body>

</html>