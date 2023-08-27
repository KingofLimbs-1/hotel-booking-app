<?php require_once __DIR__ . ("../../config/database.php"); ?>

<?php
class Booking
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

    // Get signed in user customer ID 
    private function getCustomerID($userID)
    {
        $sqlQuery = "SELECT customer_id FROM customers where user_id = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $userID);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            return $row['customer_id'];
        } else {
            return null;
        }
    }
    // ...

    // Methods

    // Create booking
    public function createBooking($userID, $hotelID, $checkIn, $checkOut, $costPerNight)
    {
        // Calculate total cost of booking
        $checkInDate = new DateTime($checkIn);
        $checkOutDate = new DateTime($checkOut);

        // Calculate difference between dates
        $dateDifference = $checkInDate->diff($checkOutDate);

        // Access difference in the form of days
        $daysDifference = $dateDifference->days;

        // Access the total cost of the booking
        $totalCost = $costPerNight * $daysDifference;
        // ...

        // Query to create record in bookings table
        $customerID = $this->getCustomerID($userID);
        $sqlQuery = "INSERT into bookings (customer_id, hotel_id, check_in, check_out, days, total_cost) VALUES (?,?,?,?,?,?)";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('iissid', $customerID, $hotelID, $checkIn, $checkOut, $daysDifference, $totalCost);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
        // ...
    }
    // ...
}
?>
