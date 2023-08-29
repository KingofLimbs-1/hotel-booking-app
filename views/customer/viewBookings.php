<?php session_start(); ?>

<?php require_once __DIR__ . "/../../models/navbar.php" ?>
<?php $navbar = new Navbar('../../index.php', '../../assets/images/logo.png', '../../register.php', '../../login.php', '../../views/customer/profile.php', '../../assets/images/icons/userIcon.png', '../../include/logoutProcess.php'); ?>

<?php require_once __DIR__ . "/../../models/customer.php" ?>
<?php $newCustomerInstance = new Customer($conn); ?>
<?php $userID = $_SESSION["userID"]; ?>
<?php $userBookings = $newCustomerInstance->displayUserBookings($userID); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/viewBookings.css">
</head>

<body>

    <div class="navbar">
        <?php echo $navbar->renderLogo(); ?>
        <?php echo $navbar->renderNavItems($userID); ?>
    </div>

    <div class="heading">
        <h3>My Bookings</h3>
    </div>

    <div class="tableContainer">
        <table>
            <tr class="headers">
                <th>Hotel</th>
                <th>Check In</th>
                <th>Checkout</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php if (!empty($userBookings)) { ?>
                <?php foreach ($userBookings as $bookingInfo) { ?>
                    <tr>
                        <td><?php echo $bookingInfo["hotel_name"]; ?></td>
                        <td><?php echo date("Y-m-d", strtotime($bookingInfo["check_in"])); ?></td>
                        <td><?php echo date("Y-m-d", strtotime($bookingInfo["check_out"])); ?></td>
                        <td><?php echo $bookingInfo["days"] . " " . "days"; ?></td>
                        <td><?php echo $bookingInfo["status"]; ?></td>
                        <td>
                            <form action="">
                                <button class="cancelBookingButton" type="submit">Cancel</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6">No Bookings Yet</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>