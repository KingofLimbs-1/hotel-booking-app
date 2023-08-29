<?php require_once __DIR__ . ("../../config/database.php"); ?>

<?php
class Booking
{
    // Fields
    private $conn;

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

    // Get the ID of the last inserted booking
    public function getLastInsertedID()
    {
        return $this->conn->insert_id;
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
    }
    // ...

    // Get booking info
    public function getBookingInfo($bookingID)
    {
        $sqlQuery = "SELECT b.booking_id, b.check_in, b.check_out, b.total_cost, b.days, u.fullname AS user_fullname, u.email AS user_email, h.hotel_id AS hotel_id, h.name AS hotel_name, h.type as hotel_type, h.beds AS hotel_beds, h.rating AS hotel_rating, h.cost_per_night AS hotel_cost_per_night, h.address AS hotel_address, h.thumbnail as hotel_thumbnail
                     FROM bookings AS b
                     JOIN customers AS c ON b.customer_id = c.customer_id
                     JOIN users AS u ON c.user_id = u.user_id
                     JOIN hotels AS h ON b.hotel_id = h.hotel_id
                     WHERE b.booking_id = ?";

        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $bookingID);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    // ...

    // Get related hotels
    public function getRelatedHotels($hotelID, $costPerNight, $limit = 4)
    {
        $sqlQuery = "SELECT * FROM hotels WHERE hotel_id != ? AND cost_per_night  BETWEEN ? AND ? LIMIT ?";

        // Limits to what the lowest and highest difference can be
        $lowerLimit = $costPerNight - 50;
        $upperLimit = $costPerNight + 50;

        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('iiii', $hotelID, $lowerLimit, $upperLimit, $limit);
        $statement->execute();

        $result = $statement->get_result();

        $relatedHotels = [];

        while ($row = $result->fetch_assoc()) {
            $relatedHotels[] = $row;
        }
        return $relatedHotels;
    }
    // ...

    // Cancel booking
    public function cancelBooking($bookingID)
    {
        $sqlQuery = "UPDATE bookings SET status = 'cancelled' WHERE booking_id = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $bookingID);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // ...

    // Complete booking
    public function completeBooking($bookingID)
    {
        $sqlQuery = "UPDATE bookings SET status = 'completed' WHERE booking_id = ?";

        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $bookingID);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // ...
}
?>
