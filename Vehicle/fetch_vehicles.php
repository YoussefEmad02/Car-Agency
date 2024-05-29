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

// SQL query to fetch vehicle data
$sql = "SELECT Vehicle_ID, Type, Model, Manufacturer, Year, InteriorColor, ExteriorColor, Price, Emp_ID FROM vehicle";
// $sql_new = "SELECT Vehicle_ID, Type, Model, Manufacturer, Year, InteriorColor, ExteriorColor, Price, Emp_ID FROM vehicle";

$result = $conn->query($sql);


?>
