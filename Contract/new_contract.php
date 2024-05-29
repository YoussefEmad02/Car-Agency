<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $contract_number = $_POST['contract_number'];
    $date = $_POST['date'];
    $client_id = $_POST['client_id'];
    $deposit = $_POST['deposit'];
    $payment_method = $_POST['payment_method'];
    $vehicle_id = $_POST['vehicle_id'];

    // Perform database insertion
    $sql = "INSERT INTO contract (Contract_Number, Date, Client_ID, Deposit, Payment_Method, Vehicle_ID) VALUES ('$contract_number', '$date', '$client_id' ,'$deposit', '$payment_method', '$vehicle_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Contract added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
