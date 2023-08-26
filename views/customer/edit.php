<?php require_once __DIR__ . "/../../include/displayUserInfo.php"; ?>

<?php
if (isset($_GET["property"])) {
    $property = $_GET["property"];
    $userID = $_SESSION["userID"];
    $userProperty = "";

    foreach ($userInfo as $user) {
        if ($property === "username") {
            $userProperty = $user["username"];
        } elseif ($property === "fullname") {
            $userProperty = $user["fullname"];
        } elseif ($property === "email") {
            $userProperty = $user["email"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo ucfirst($property); ?></title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/customer/edit.css">
</head>

<body>

    <div class="heading">
        <h1>Edit <?php echo ucfirst($property); ?></h1>
    </div>
    <div class="editPropertyContainer">
        <form action="../../include/updateUserInformation.php" method="post">
            <div class="editItem" id="current">
                <label>Current</label>
                <span><?php echo $userProperty; ?></span>
            </div>

            <div class="editItem" id="new">
                <label>New</label>
                <input type="text" name="newValue" required>
            </div>

            <div class="submitContainer">
                <button type="submit" name="submitBtn">Save</button>
            </div>

            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            <input type="hidden" name="property" value="<?php echo $property; ?>">
        </form>
    </div>
</body>

</html>