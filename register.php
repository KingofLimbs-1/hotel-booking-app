<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/css/fonts.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <script src="./js/togglePassword.js" defer></script>
</head>

<body>
    <div class="logo">
        <?php $imageLink = "./assets/images/logo.png" ?>
        <?php $redirectLink = "./index.php" ?>
        <?php include __DIR__ . "/./config/logo.php" ?>
    </div>


    <div class="registerContainer">
        <form action="./include/registerProcess.php" method="post">

            <div class="formContainer">

                <label>Username</label>
                <input type="text" name="username">

                <label>Full name</label>
                <input type="text" name="fullName">

                <label>Email</label>
                <input type="text" name="email">

                <label>Password</label>
                <div class="passwordContainer">
                    <input type="password" id="password" name="password">
                    <a id="togglePasswordButtons">
                        <span class="passwordIcon hide" id="openEye"><img src="./assets/images/icons/showPW.png" alt="show password icon"></span>
                        <span class="passwordIcon" id="closedEye"><img src="./assets/images/icons/hidePW.png" alt="hide password icon"></span>
                    </a>
                </div>

                <div class="submitContainer">
                    <input type="submit" value="Register" name="register">
                </div>

            </div>
        </form>


    </div>
</body>

</html>