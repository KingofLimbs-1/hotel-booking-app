<?php require_once __DIR__ . "/../../models/staff.php" ?>
<?php $newStaffInstance = new Staff($conn); ?>
<?php $bookingItem = $newStaffInstance->displayBookings(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/staff/viewTab.css">
</head>

<body>
    <div class="heading">
        <h3>Bookings</h3>
    </div>

    <div class="tableContainer">
        <table>
            <tr class="headers">
                <th>Booking ID</th>
                <th>User</th>
                <th>Hotel</th>
                <th>Check In</th>
                <th>Checkout</th>
                <th>Duration</th>
                <th>Status</th>
            </tr>

            <?php foreach ($bookingItem as $booking) : ?>
                <tr>
                    <td><?php echo $booking["booking_id"]; ?></td>
                    <td><?php echo $booking["customer_name"]; ?></td>
                    <td><?php echo $booking["hotel_name"]; ?></td>
                    <td><?php echo date("Y-m-d", strtotime($booking["check_in"])); ?></td>
                    <td><?php echo date("Y-m-d", strtotime($booking["check_out"])); ?></td>
                    <td><?php echo $booking["days"] . " " . "days"; ?></td>
                    <td class="status-cell <?php echo strtolower($booking["status"]); ?>"><?php echo $booking["status"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>