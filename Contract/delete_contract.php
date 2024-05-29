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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contract_number"])) {
    $contractNumber = $_POST["contract_number"];

    // SQL query to delete client by ID
    $sql = "DELETE FROM contract WHERE Contract_Number = '$contractNumber'";

    if ($conn->query($sql) === TRUE) {
        echo "Client with ID $contractNumber deleted successfully!";
    } else {
        echo "Error deleting client: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
