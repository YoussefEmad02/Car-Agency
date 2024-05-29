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
    $Emp_ID = $_POST['Emp_ID'];
    $Week_Number = $_POST['Week_Number'];
    $SalesPerWeek = $_POST['SalesPerWeek'];
    $CommissionsPerWeek = $_POST['CommissionsPerWeek'];

    $sql_query = "INSERT INTO salesperson (Emp_ID, Week_Number, SalesPerWeek, CommissionsPerWeek)
    VALUES ('$Emp_ID', '$Week_Number', '$SalesPerWeek', '$CommissionsPerWeek')";
    

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
