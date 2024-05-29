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

// SQL query to fetch client data
$sql = "SELECT Contract_Number, Date, Client_ID, Deposit, Payment_Method, Vehicle_ID  FROM contract";

$result = $conn->query($sql);

// Close connection
$conn->close();
?>
