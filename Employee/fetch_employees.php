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
$sql = "SELECT Emp_ID, FirstName, LastName, Sex, Phone_Number, Email, City, Street, Building, Apartment, Working_Hours, Salary, Supervises_Emp_ID  FROM employee";

$result = $conn->query($sql);

// Close connection
$conn->close();
?>
