<?php require_once __DIR__ . ("../../config/database.php"); ?>

<?php
class Staff
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


    // METHODS

    // Display users
    public function displayUsers()
    {
        $sqlQuery = "SELECT * FROM users";
        $statement = $this->conn->prepare($sqlQuery);

        if ($statement->execute()) {
            $users = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            $statement->close();
            return $users;
        } else {
            echo "Query failed";
            return [];
        }
    }
    // ...
    
    // Display bookings
    public function displayBookings()
    {
        $sqlQuery = "
        SELECT
            b.booking_id,
            u.fullname AS customer_name,
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
            hotels AS h ON b.hotel_id = h.hotel_id;
        ";

        $statement = $this->conn->prepare($sqlQuery);

        if ($statement->execute()) {
            $result = $statement->get_result();
            $booking = $result->fetch_all(MYSQLI_ASSOC);
            $statement->close();
            return $booking;
        } else {
            echo "Query Failed";
            return [];
        }
    }
    // ...
}
?>
