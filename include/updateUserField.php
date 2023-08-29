<?php require_once __DIR__ . "../../models/staff.php"; ?>
<?php $newStaffInstance = new Staff($conn); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"])) {
    $userID = $_POST["userID"];

    // Determine which field is being updated
    if (isset($_POST["username"])) {
        $fieldToUpdate = "username";
        $newValue = $_POST["username"];
    } elseif (isset($_POST["fullname"])) {
        $fieldToUpdate = "fullname";
        $newValue = $_POST["fullname"];
    } elseif (isset($_POST["email"])) {
        $fieldToUpdate = "email";
        $newValue = $_POST["email"];
    } elseif (isset($_POST["password"])) {
        $fieldToUpdate = "password";
        $newValue = $_POST["password"];
    } elseif (isset($_POST["role"])) {
        $fieldToUpdate = "role";
        $newValue = $_POST["role"];
    }

    $result = $newStaffInstance->updateUserField($userID, $fieldToUpdate, $newValue);

    // If user info is successfully updated
    if ($result) {
        header("Location: ./../views/staff/landing.php?content=viewUsers");
        exit();
    } else {
        echo "Error updating user field.";
    }
}
?>
