<?php require_once __DIR__ . ("../../config/database.php"); ?>

<?php
class hotel
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

    // Display hotels
    public function displayHotels()
    {
        $sqlQuery = "SELECT * FROM hotels";
        $statement = $this->conn->prepare($sqlQuery);

        if ($statement->execute()) {
            $hotels = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            $statement->close();
            return $hotels;
        } else {
            echo "Query failed";
            return [];
        }
    }
    // ...


    // Display selected hotel information
    public function displaySelectedHotelInfo($hotelID)
    {
        $sqlQuery = "SELECT * FROM hotels WHERE hotel_id = ?";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->bind_param('i', $hotelID);

        if ($statement->execute()) {

            $hotelInfo = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            return $hotelInfo;
        } else {
            echo "Query failed";
            return [];
        }
    }
    // ...
}
?>