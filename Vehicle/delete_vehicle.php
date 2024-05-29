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

// Check if form is submitted and vehicle ID is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Vehicle_ID"])) {
    $Vehicle_ID = $_POST["Vehicle_ID"];

    // Begin a transaction
    $conn->begin_transaction();

    // SQL query to delete vehicle by ID from 'new' table
    $sql_delete_new = "DELETE FROM new WHERE Vehicle_ID = '$Vehicle_ID'";
    
    // Execute the query to delete from 'new' table
    if ($conn->query($sql_delete_new) === TRUE) {
        echo "Vehicle with ID $Vehicle_ID deleted from 'new' table successfully!<br>";
    } else {
        $conn->rollback();
        die("Error deleting Vehicle from 'new' table: " . $conn->error . "<br>");
    }

    // SQL query to delete vehicle by ID from 'used' table
    $sql_delete_used = "DELETE FROM used WHERE Vehicle_ID = '$Vehicle_ID'";
    
    // Execute the query to delete from 'used' table
    if ($conn->query($sql_delete_used) === TRUE) {
        echo "Vehicle with ID $Vehicle_ID deleted from 'used' table successfully!<br>";
    } else {
        $conn->rollback();
        die("Error deleting Vehicle from 'used' table: " . $conn->error . "<br>");
    }

    // SQL query to delete vehicle by ID from 'vehicle' table
    $sql_delete_vehicle = "DELETE FROM vehicle WHERE Vehicle_ID = '$Vehicle_ID'";
    
    // Execute the query to delete from 'vehicle' table
    if ($conn->query($sql_delete_vehicle) === TRUE) {
        echo "Vehicle with ID $Vehicle_ID deleted from 'vehicle' table successfully!<br>";
        // Commit the transaction if all queries are successful
        $conn->commit();
    } else {
        $conn->rollback();
        die("Error deleting Vehicle from 'vehicle' table: " . $conn->error . "<br>");
    }
}

// Close connection
$conn->close();
?>
