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

// Check if form is submitted and service number is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["service_number"])) {
    $service_number = $_POST["service_number"];

    // SQL query to delete service by number
    $sql = "DELETE FROM service WHERE Service_Number = '$service_number'";

    if ($conn->query($sql) === TRUE) {
        echo "Service with number $service_number deleted successfully!";
    } else {
        echo "Error deleting Service: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
