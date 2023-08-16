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
}
?>