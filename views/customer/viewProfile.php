<?php require_once __DIR__ . "/../../include/displayUserInfo.php"; ?>

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
    <title>My Account</title>
    <link rel="stylesheet" href="../../assets/css/navbar.css">
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/viewProfile.css">
</head>

<body>
    <div class="navbar">
        <?php echo $navbar->renderLogo(); ?>
        <?php echo $navbar->renderNavItems($userID); ?>
    </div>

    <div class="heading">
        <h1>My Account</h1>
    </div>

    <?php foreach ($userInfo as $user) : ?>
        <div class="userInfoContainer">
            <div class="infoItem">
                <h4>Username</h4>
                <div class="content">
                    <span><?php echo $user["username"]; ?></span>
                    <a href="../../views/customer/edit.php?property=username">
                        <img src="../../assets/images/icons/editButton.png" alt="edit button icon">
                    </a>
                </div>
            </div>
            <div class="infoItem">
                <h4>Full Name</h4>
                <div class="content">
                    <span><?php echo $user["fullname"]; ?></span>
                    <a href="../../views/customer/edit.php?property=fullname">
                        <img src="../../assets/images/icons/editButton.png" alt="edit button icon">
                    </a>
                </div>
            </div>
            <div class="infoItem">
                <h4>Email Address</h4>
                <div class="content">
                    <span><?php echo $user["email"]; ?></span>
                    <a href="../../views/customer/edit.php?property=email">
                        <img src="../../assets/images/icons/editButton.png" alt="edit button icon">
                    </a>
                </div>
            </div>
        </div>

        <div class="deleteAccountContainer">
            <form action="../../include/deleteUserAccount.php" method="post">
                <input type="hidden" value="<?php echo $user["user_id"]; ?>" name="userID">
                <button type="submit">Delete Account</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>

</html>