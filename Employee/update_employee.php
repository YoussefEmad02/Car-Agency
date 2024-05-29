<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
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
    // Check if supervisor ID is provided
    if (isset($_POST['supervises_emp_id']) && $_POST['supervises_emp_id'] !== '') {
        $supervises_emp_id = $_POST['supervises_emp_id'];
    } else {
        $supervises_emp_id = null; // Set supervisor ID to NULL if not provided
    }

    // Update employee information in the database
    $sql = "UPDATE Employee SET FirstName=?, LastName=?, Sex=?, Phone_Number=?, Email=?, City=?, Street=?, Building=?, Apartment=?, Working_Hours=?, Salary=?, Supervises_Emp_ID=? WHERE Emp_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssisiii", $first_name, $last_name, $sex, $phone_number, $email, $city, $street, $building, $apartment, $working_hours, $salary, $supervises_emp_id, $emp_id);
    
    if ($stmt->execute()) {
        // Update successful, redirect to a confirmation page
        header("Location: confirmation_page.php");
        exit();
    } else {
        // Error occurred during update
        echo "Error updating employee: " . $conn->error;
    }
} else {
    // Redirect to an error page or back to the form
    header("Location: edit_employee.html");
    exit();
}
?>
