<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/./assets/css/fonts.css">
    <link rel="stylesheet" href="./assets/css/customer/login.css">
</head>

<body>
    <div class="logo">
        <?php $imageLink = "./assets/images/logo.png" ?>
        <?php include __DIR__ . "/./config/logo.php" ?>
    </div>


    <div class="loginContainer">
        <form action="./include/loginProcess.php" method="post">

            <div class="formContainer">

                <label>Username</label>
                <input type="text" name="username">

                <label>Full name</label>
                <input type="text" name="fullName">

                <label>Email</label>
                <input type="text" name="email">
        
                <label>Password</label>
                <input type="password" name="password">

                <div class="submitContainer">
                    <input type="submit" value="submit" name="submit">
                </div>

            </div>
        </form>

    </div>
</body>

</html>