<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['save'])) {
    // Retrieve data from POST request
    $vehicle_id = $_POST['vehicle_id'];
    $type = $_POST['type'];
    $condition = $_POST['condition'];
    $license_plate = isset($_POST['license_plate']) ? $_POST['license_plate'] : '';
    $odometer = isset($_POST['odometer']) ? $_POST['odometer'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $model = $_POST['model'];
    $manufacturer = $_POST['manufacturer'];
    $year = $_POST['year'];
    $interior_color = $_POST['interior_color'];
    $exterior_color = $_POST['exterior_color'];
    $price = $_POST['price'];
    $emp_id = $_POST['emp_id'];

    // Insert data into Vehicle_ table
    $vehicle_query = "INSERT INTO Vehicle (Vehicle_ID, Type, Model, Manufacturer, Year, InteriorColor, ExteriorColor, Price, Emp_ID)
                      VALUES ('$vehicle_id', '$type', '$model', '$manufacturer', '$year', '$interior_color', '$exterior_color', '$price', '$emp_id')";

    if(mysqli_query($conn, $vehicle_query)) {
        echo "Vehicle details added successfully." . "<br>";
    } else {
        echo "Error: " . $vehicle_query . "<br>" . mysqli_error($conn);
    }

    // Insert data into appropriate table based on condition
    if ($condition === 'New') {
        // Insert into New table
        $new_query = "INSERT INTO new (Quantity, Vehicle_ID) VALUES ('$quantity', '$vehicle_id')";
        if(mysqli_query($conn, $new_query)) {
            echo "New details added successfully.";
        } else {
            echo "Error: " . $new_query . "<br>" . mysqli_error($conn);
        }
    } elseif ($condition === 'Used') {
        // Insert into Used table
        $used_query = "INSERT INTO used (License_Plate, Odometer, Vehicle_ID) VALUES ('$license_plate', '$odometer', '$vehicle_id')";
        if(mysqli_query($conn, $used_query)) {
            echo "Used details added successfully.";
        } else {
            echo "Error: " . $used_query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
