<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $client_id = $_POST['client_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Update the client information in the database
    // Assuming $conn is your database connection
    $sql = "UPDATE Client SET FirstName=?, LastName=?, Phone_Number=?, Email=? WHERE Client_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $first_name, $last_name, $phone_number, $email, $client_id);
    
    if ($stmt->execute()) {
        // Update successful, redirect to a confirmation page
        header("Location: confirmation_page.php");
        exit();
    } else {
        // Error occurred during update
        echo "Error updating client: " . $conn->error;
    }
} else {
    // Redirect to an error page or back to the edit form
    header("Location: edit_client.html");
    exit();
}
?>
