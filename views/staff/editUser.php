<?php
// For the sake of displaying the users existing information when editing 
require_once __DIR__ . "/../../models/staff.php";
$newStaffInstance = new Staff($conn);
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"])) {
    $userID = $_POST["userID"];
    $user = $newStaffInstance->getUserByID($userID);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/fonts.css">
    <link rel="stylesheet" href="../../assets/css/staff/editHotel.css">
</head

<body>
    <div class="heading">
        <h3>Edit</h3>
    </div>

    <div class="editContainer">

        <form class="formContainer" action="../../include/updateUserField.php" method="post">
            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            <div class="formItemContainer">
                <div class="item">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $user["username"]; ?>">
                </div>
                <div class="item">
                    <label>Full Name</label>
                    <input type="text" name="fullname" value="<?php echo $user["fullname"]; ?>">
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $user["email"]; ?>">
                </div>
                <div class="item">
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo $user["password"]; ?>">
                </div>
            </div>
            <div class="formItemContainer">
                <div class="item">
                    <label>Role</label>
                    <input type="text" name="role" value="<?php echo $user["role"]; ?>">
                </div>
            </div>
            <div class="submitContainer">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>

</body>

</html>