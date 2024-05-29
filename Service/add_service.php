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

if(isset($_POST['save']))
{
    $service_number = $_POST['service_number'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    $sql_query = "INSERT INTO service (Service_Number, Type, Price) VALUES ('$service_number', '$type', '$price')";

    if(mysqli_query($conn, $sql_query))
    {
        echo "New Service Added";
    }   
    else
    {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);

}
?>
