<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/staff/landing.css">
</head>

<body>
    <div class="navBarContainer">
        <div class="nav">
            <div class="logo" id="navItem">
                <?php
                $imageLink = "../../assets/images/logo.png";
                include "../../config/logo.php"
                ?>
            </div>
            <div class="navButtons" id="navItem">
                <a href="?content=viewUsers">
                    <div class="navButton" id="users">
                        <span>Users</span>
                    </div>
                </a>

                <a href="?content=viewHotels">
                    <div class="navButton" id="hotels">
                        <span>Hotels</span>
                    </div>
                </a>

                <a href="?content=viewBookings">
                    <div class="navButton" id="bookings">
                        <span>Bookings</span>
                    </div>
                </a>
            </div>
            <div class="logoutButton" id="navItem">
                <a href="../../include/logoutProcess.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="content" id="dynamicContent">
        <?php
        if (isset($_GET["content"])) {
            $content = $_GET["content"];
            include "$content.php";
        };
        ?>
    </div>
</body>

</html>