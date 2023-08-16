<?php
require_once __DIR__ . ("../../config/database.php");
?>

<?php
class user
{

    // Fields
    private $conn;
    // ...

    // Constructor
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    // ...


    // Methods

    // Log user into site
    public function loginUser($username, $password)
    {
        $sqlQuery = "SELECT * FROM users WHERE username = ? AND password = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('ss', $username, $password);

        if ($statement->execute()) {
            // Fetch all rows that match query criteria
            $result = $statement->get_result();

            // Check to see if there are any matching rows
            if ($result->num_rows > 0) {
                // Iterate through result and fetch rows as arrays
                $user = $result->fetch_assoc();

                // User seperation
                if ($user["role"] == "customer") {
                    header('location: ../index.php');
                    exit();
                } else {
                    // If user is an admin, redirect to appropriate page
                    header('location: ../views/staff/landing.php');
                    exit();
                }
            } else {
                // User not found
                echo "Error" . "</br>" . "User not found or information is incorrect." . "</br>" . "Please register or retry.";
            }
        }
    }
    // ...

    // Register user on site
    public function registerUser($username, $fullName, $email, $password)
    {
        // Check to see if user exist in the database
        $sqlQuery = "SELECT * FROM users WHERE username = ? AND password = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('ss', $username, $password);

        if ($statement->execute()) {
            // Fetch all rows that match query criteria
            $result = $statement->get_result();

            // Check to see if there are any matching rows
            if ($result->num_rows > 0) {
                echo "User exists, please login";
            } else {
                // User is not registered, so add to database
                $sqlQuery2 = "INSERT INTO users (username, fullname, email, password, role) VALUES (?, ?, ?, ?, 'customer')";
                $statement2 = $this->conn->prepare($sqlQuery2);
                $statement2->bind_param('ssss', $username, $fullName, $email, $password);

                if ($statement2->execute()) {
                    header('location: ../index.php');
                    exit();
                } else {
                    echo "Error: Query failed, user could not be added to database";
                }
            }
        }
        // ...
    }
    // ...
}
?>