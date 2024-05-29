<?php

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

// SQL query to fetch service data
$sql = "SELECT Service_Number, Type, Price FROM service";

$result = $conn->query($sql);

// Close connection
$conn->close();
?>
