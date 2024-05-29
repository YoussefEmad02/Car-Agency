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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emp_id"])) {
    $emp_id = $_POST["emp_id"];

    // Begin a transaction
    $conn->begin_transaction();

    // SQL query to delete vehicle by ID from 'Technican' table
    $sql_delete_technician = "DELETE FROM technician WHERE Emp_ID = '$emp_id'";
    
    // Execute the query to delete from 'Technician' table
    if ($conn->query($sql_delete_technician) === TRUE) {
        echo "Technician with ID $emp_id deleted from 'Technician' table successfully!<br>";
    } else {
        $conn->rollback();
        die("Error deleting Technician from 'Technician' table: " . $conn->error . "<br>");
    }

    // SQL query to delete SalesPerson by ID from 'salesperson' table
    $sql_delete_salesperson = "DELETE FROM salesperson WHERE Emp_ID = '$emp_id'";
    
    // Execute the query to delete from 'salesperson' table
    if ($conn->query($sql_delete_salesperson) === TRUE) {
        echo "Salesperson with ID $emp_id deleted from 'salesperson' table successfully!<br>";
    } else {
        $conn->rollback();
        die("Error deleting Salesperson from 'salesperson' table: " . $conn->error . "<br>");
    }

    // SQL query to delete customerservicerepresentative by ID from 'customerservicerepresentative' table
    $sql_delete_customerservicerepresentative = "DELETE FROM customerservicerepresentative WHERE Emp_ID = '$emp_id'";
    
    // Execute the query to delete from 'vehicle' table
    if ($conn->query($sql_delete_customerservicerepresentative) === TRUE) {
        echo "Customer Service Representative with ID $emp_id deleted from 'customerservicerepresentative' table successfully!<br>";
        // Commit the transaction if all queries are successful
        $conn->commit();
    } else {
        $conn->rollback();
        die("Error deleting Technician from 'vehicle' table: " . $conn->error . "<br>");
    }

    // SQL query to delete Employee by ID
    $sql = "DELETE FROM employee WHERE Emp_ID = '$emp_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Employee with ID $emp_id deleted successfully!";
    } else {
        echo "Error deleting Emmployee: " . $conn->error;
    }    
}

// Close connection
$conn->close();
?>
