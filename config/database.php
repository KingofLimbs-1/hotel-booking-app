<?php
require_once(__DIR__ . "../../config.php");
?>

<?php
// Database connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if errors occured during connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Special character handling
$conn->set_charset("utf8");

// ...
?>

<?php ?>