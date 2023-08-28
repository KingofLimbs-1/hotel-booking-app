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

    // UTILITY

    // Check to see if user performing admin-based operations has a role of user
    private function isAdmin($userID)
    {
        $sqlQuery = "SELECT role FROM users WHERE user_id = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param("i", $userID);

        if ($statement->execute()) {
            $result = $statement->get_result();
            $user = $result->fetch_assoc();
            $statement->close();
            return $user['role'] === 'admin';
        } else {
            return false;
        }
    }
    // ...

    // Execute queries and handle errors
    // Used for queries that don't return anything
    private function executeQuery($statement)
    {
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // ...

    // Insert into staff table
    private function insertIntoStaff($userID)
    {
        $sqlQuery = "INSERT INTO staff (user_id) VALUES (?)";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $userID);
        $statement->execute();
    }
    // ...

    // Insert into customer table
    private function insertIntoCustomers($userID)
    {
        $sqlQuery = "INSERT INTO customers (user_id) VALUES (?)";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $userID);
        $statement->execute();
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
            return [];
        }
    }
    // ...

    // Display bookings
    public function displayBookings($searchTerm = "")
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
            hotels AS h ON b.hotel_id = h.hotel_id
        WHERE
            u.fullname LIKE CONCAT('%', ?, '%')
            OR u.user_id = ?;
        ";

        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param("ss", $searchTerm, $searchTerm);

        if ($statement->execute()) {
            $result = $statement->get_result();
            $booking = $result->fetch_all(MYSQLI_ASSOC);
            $statement->close();
            return $booking;
        } else {
            return [];
        }
    }
    // ...

    // Add hotel
    public function addHotel($userID, $name, $costPerNight, $type, $beds, $rating, $city, $address)
    {
        if ($this->isAdmin($userID)) {
            $sqlQuery = "INSERT INTO hotels (name, cost_per_night, type, beds, rating, city, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->conn->prepare($sqlQuery);
            $statement->bind_param('sdsiiss', $name, $costPerNight, $type, $beds, $rating, $city, $address);

            return $this->executeQuery($statement);
        }
    }
    // ...

    // Delete hotel
    public function deleteHotel($userID, $hotelID)
    {
        if ($this->isAdmin($userID)) {
            $sqlQuery = "DELETE FROM hotels WHERE hotel_id = ?";
            $statement = $this->conn->prepare($sqlQuery);
            $statement->bind_param('i', $hotelID);

            return $this->executeQuery($statement);
        }
    }
    // ...

    // Add admin
    public function addAdmin($userID, $username, $fullname,  $email, $password, $role)
    {
        if ($this->isAdmin($userID)) {
            $sqlQuery = "INSERT INTO users (username, fullname, email, password, role) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->conn->prepare($sqlQuery);
            $statement->bind_param('sssss', $username, $fullname, $email, $password, $role);

            if ($statement->execute()) {
                $userID = $statement->insert_id;

                // If user role is "admin" create record in admin/staff table
                if ($role === "admin") {
                    $this->insertIntoStaff($userID);
                    // If user role is "customer" create record in customers table
                } elseif ($role === "customer") {
                    $this->insertIntoCustomers($userID);
                }

                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    // ...
}
?>
