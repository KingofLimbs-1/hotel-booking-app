<?php require_once __DIR__ . ("../../config/database.php"); ?>

<?php
class customer
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

    //  METHODS

    // Display user information
    public function displayLoggedInUsersInfo($userID)
    {
        $sqlQuery = "SELECT * FROM users where user_id = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('s', $userID);

        if ($statement->execute()) {
            $userInfo = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            return $userInfo;
        } else {
            echo "Query failed";
            return [];
        }
    }
    // ...


    // Edit user information
    public function editUserInformation($userID, $property, $newValue)
    {
        // Query to update user information based on specified property
        switch ($property) {
            case "username":
                $sqlQuery = "UPDATE users SET username = ? WHERE user_id = ?";
                break;
            case "fullname":
                $sqlQuery = "UPDATE users SET fullname = ? WHERE user_id = ?";
                break;
            case "email":
                $sqlQuery = "UPDATE users SET email = ? WHERE user_id = ?";
                break;
                // 
            default:
                return false;
        }
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('si', $newValue, $userID);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // ...
}
?>