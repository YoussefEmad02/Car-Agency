<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $service_number = $_POST['service_number'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    // Update service information in the database
    $sql = "UPDATE service SET Type=?, Price=? WHERE Service_Number=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $type, $price, $service_number);
    
    if ($stmt->execute()) {
        // Update successful, redirect to a confirmation page
        header("Location: confirmation_page.php");
        exit();
    } else {
        // Error occurred during update
        echo "Error updating service: " . $conn->error;
    }
} else {
    // Redirect to an error page or back to the form
    header("Location: edit_service.html");
    exit();
}
?>
