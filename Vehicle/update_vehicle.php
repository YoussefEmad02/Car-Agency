<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $vehicle_id = $_POST['vehicle_id'];
    $type = $_POST['type'];
    $model = $_POST['model'];
    $manufacturer = $_POST['manufacturer'];
    $year = $_POST['year'];
    $interior_color = $_POST['interior_color'];
    $exterior_color = $_POST['exterior_color'];
    $price = $_POST['price'];
    $emp_id = $_POST['emp_id'];
    $condition = $_POST['condition'];

    // Based on condition, insert/update records in the appropriate table
    if ($condition == 'New') {
        $quantity = $_POST['quantity'];

        // Update Vehicle table
        $query = "UPDATE Vehicle SET Type='$type', Model='$model', Manufacturer='$manufacturer', Year=$year, InteriorColor='$interior_color', ExteriorColor='$exterior_color', Price=$price, Emp_ID=$emp_id WHERE Vehicle_ID=$vehicle_id";
        mysqli_query($conn, $query);

        // Update New table
        $query_new = "UPDATE new SET Quantity=$quantity WHERE Vehicle_ID=$vehicle_id";
        mysqli_query($conn, $query_new);
    } elseif ($condition == 'Used') {
        $license_plate = $_POST['license_plate'];
        $odometer = $_POST['odometer'];

        // Update Vehicle table
        $query = "UPDATE Vehicle SET Type='$type', Model='$model', Manufacturer='$manufacturer', Year=$year, InteriorColor='$interior_color', ExteriorColor='$exterior_color', Price=$price, Emp_ID=$emp_id WHERE Vehicle_ID=$vehicle_id";
        mysqli_query($conn, $query);

        // Update Used table
        $query_used = "UPDATE used SET License_Plate='$license_plate', Odometer=$odometer WHERE Vehicle_ID=$vehicle_id";
        mysqli_query($conn, $query_used);
    }

    // Redirect to a confirmation page or wherever you want after updating
    header("Location: confirmation_page.php");
    exit();
}
?>

