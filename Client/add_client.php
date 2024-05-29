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
    $Client_ID = $_POST['client_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    $sql_query = "INSERT INTO client (Client_ID, FirstName, LastName, Phone_Number, Email)
    VALUES ('$Client_ID','$first_name', '$last_name', '$phone_number', '$email')";
    

    if(mysqli_query($conn, $sql_query))
    {
        echo "New Details Added";
    }   
    else
    {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);

}

?>
