<?php
// Replace these variables with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted and client ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["client_id"])) {
    $clientID = $_POST["client_id"];

    // SQL query to delete client by ID
    $sql = "DELETE FROM Client WHERE Client_ID = '$clientID'";

    if ($conn->query($sql) === TRUE) {
        echo "Client with ID $clientID deleted successfully!";
    } else {
        echo "Error deleting client: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
