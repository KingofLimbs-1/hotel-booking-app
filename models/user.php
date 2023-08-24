<?php
session_start();
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

    // Utility functions

    // Redirect
    private function redirect($location)
    {
        header("Location: $location");
        exit();
    }
    // ... 


    // Methods

    // Log user into site
    public function loginUser($username, $password)
    {
        $sqlQuery = "SELECT * FROM users WHERE username = ? AND password = ? ";
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
                    // Create session variable for user
                    $_SESSION["username"] = $user["fullname"];
                    // Redirect to landing page once signed in
                    $this->redirect("../index.php");
                } else {
                    // If user is an admin

                    // Create session variable for user
                    $_SESSION["username"] = $user["username"];
                    // Redirect to staff landing page once signed in
                    $this->redirect("../views/staff/landing.php");
                }
            } else {
                // User not found
                echo "Error" . "</br>" . "User not found or information is incorrect." . "</br>" . "Please register or retry.";
            }
        }
    }
    // ...

    // Log user out of site
    public function logout($username)
    {
        if (!isset($username)) {
            echo "Error: user is not signed in";
        } else {
            session_unset();
            session_destroy();

            $this->redirect("../index.php");
        }
    }
    // ...

    // Register user on site
    public function registerUser($username, $fullName, $email, $password)
    {
        // Check to see if user exist in the database
        $sqlQuery = "SELECT * FROM users WHERE username = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('s', $username);

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
                    // Grab userID of most recent user registration
                    $userID = $statement2->insert_id;
                    // Query that creates a record of users in the customer table
                    $sqlQuery3 = "INSERT INTO customers (user_id) VALUES (?)";
                    $statement3 = $this->conn->prepare($sqlQuery3);
                    $statement3->bind_param('i', $userID);
                    // ...
                    if ($statement3->execute()) {
                        $_SESSION["username"] = $fullName;
                        $this->redirect("../index.php");
                    } else {
                        echo "Error: Query failed, user could not be added to database";
                    }
                }
            }
        }
        // ...
    }
    // ...
}
?>