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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $contract_number = $_POST['contract_number'];
    $date = $_POST['date'];
    $client_id = $_POST['client_id'];
    $deposit = $_POST['deposit'];
    $payment_method = $_POST['payment_method'];
    $vehicle_id = $_POST['vehicle_id'];

    // Update the contract information in the database
    $sql = "UPDATE Contract SET Date=?, Client_ID=?, Deposit=?, Payment_Method=?, Vehicle_ID=? WHERE Contract_Number=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisii", $date, $client_id, $deposit, $payment_method, $vehicle_id, $contract_number);
    
    if ($stmt->execute()) {
        // Update successful, redirect to a confirmation page
        header("Location: confirmation_page.php");
        exit();
    } else {
        // Error occurred during update
        echo "Error updating contract: " . $conn->error;
    }
} else {
    // Redirect to an error page or back to the edit form
    header("Location: edit_contract.html");
    exit();
}

$conn->close();
?>
