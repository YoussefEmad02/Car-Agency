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
    $rating = $_POST['rating'];
    $emo_id = $_POST['emp_id'];

    $sql_query = "INSERT INTO customerservicerepresentative (Rating, Emp_ID)
    VALUES ('$rating','$emo_id')";
    

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
