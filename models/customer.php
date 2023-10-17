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

    // Getter for conn
    public function getConnection()
    {
        return $this->conn;
    }
    // ...

    // Setter for conn
    public function setConnection($conn)
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

    // Display bookings for the currently signed-in user
    public function displayUserBookings($userID)
    {
        $sqlQuery = "
            SELECT
                b.booking_id,
                h.name AS hotel_name,
                b.check_in,
                b.check_out,
                b.days,
                b.total_cost,
                b.status
            FROM
                bookings AS b
            INNER JOIN
                customers AS c ON b.customer_id = c.customer_id
            INNER JOIN
                users AS u ON c.user_id = u.user_id
            INNER JOIN
                hotels AS h ON b.hotel_id = h.hotel_id
            WHERE
                u.user_id = ?
        ";

        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param("i", $userID);

        if ($statement->execute()) {
            $result = $statement->get_result();
            $bookings = $result->fetch_all(MYSQLI_ASSOC);
            return $bookings;
        } else {
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


    // Delete user account
    public function deleteUserAccount($userID)
    {
        $sqlQuery = "DELETE FROM users WHERE user_id = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $userID);

        if ($statement->execute()) {
            session_unset();
            session_destroy();
            return true;
        } else {
            return false;
        }
    }
    // ...
}
?>