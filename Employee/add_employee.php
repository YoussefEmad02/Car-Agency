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
    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $building = $_POST['building'];
    $apartment = $_POST['apartment'];
    $working_hours = $_POST['working_hours'];
    $salary = $_POST['salary'];
    $supervisor_id = $_POST['supervisor_id'];
    $position = $_POST['position'];
    $Specialization = $_POST['Specialization'];
    $Service_Number = $_POST['Service_Number'];


    $sql_query = "INSERT INTO employee (Emp_ID, FirstName, LastName, Sex, Phone_Number, Email, City, Street, Building, Apartment, Working_Hours, Salary, Supervises_Emp_ID)
    VALUES ('$emp_id', '$first_name', '$last_name', '$sex', '$phone_number', '$email', '$city', '$street', '$building', '$apartment', '$working_hours', '$salary', '$supervisor_id')";

    if(mysqli_query($conn, $sql_query))
    {
        echo "New Details Added";
    }   
    else
    {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }    
    

    // Insert data into appropriate table based on condition
    if ($position === 'Technician') {
        // Insert into Technician table
        $technician_query = "INSERT INTO technician (Specialization, Emp_ID, Service_Number) VALUES ('$Specialization', $emp_id, '$Service_Number')";
        if(mysqli_query($conn, $technician_query)) {
            echo "New details added successfully.";
        } else {
            echo "Error: " . $technician_query . "<br>" . mysqli_error($conn);
        }
    } 
    
    // elseif ($position === 'Salesperson') {
    //     // Insert into Used table
    //     $used_query = "INSERT INTO used (License_Plate, Odometer, Vehicle_ID) VALUES ('$license_plate', '$odometer', '$vehicle_id')";
    //     if(mysqli_query($conn, $used_query)) {
    //         echo "Used details added successfully.";
    //     } else {
    //         echo "Error: " . $used_query . "<br>" . mysqli_error($conn);
    //     }
    // }    


    
    mysqli_close($conn);

}

?>

