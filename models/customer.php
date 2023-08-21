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

}
?>