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
$sql = "SELECT Client_ID, FirstName, LastName, Phone_Number, Email, Contract_Number FROM client";

$result = $conn->query($sql);


?>
