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
    <title>Manage Account</title>
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/profile.css">
</head>

<body>
<div class="navbar">
        <?php echo $navbar->renderLogo(); ?>
        <?php echo $navbar->renderNavItems($userID); ?>
    </div>
    <div class="heading">
        <h1>Manage Account</h1>
    </div>

    <div class="interactionButtons">
        <div class="personalInformationButton" id="button">
            <a id="container" href="../../views/customer/viewProfile.php">
                <img src="../../assets/images/icons/manageAccount.png" alt="manage account icon">
                <div class="text">
                    <h2>Personal Information</h2>
                    <h3>View and make changes to your information</h3>
                </div>
            </a>
        </div>

        <div class="bookingsButton" id="button">
            <a id="container" href="../../views/customer/viewBookings.php">
                <img src="../../assets/images/icons/manageBookings.png" alt="view bookings icon">
                <div class="text">
                    <h2>Manage Bookings</h2>
                    <h3>View your past & present hotel bookings</h3>
                </div>
            </a>
        </div>
    </div>
</body>

</html>