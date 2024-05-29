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

    // Search for the employee in the database
    $sql = "SELECT * FROM employee WHERE Emp_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Employee found, display form to edit their information
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Agency</title>
    <link rel="icon" href="../Assets/images/Logo.png" class="icon" />
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../Assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">Car Agency</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Employees
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="add_employee.html">Add Employee</a></li>
                            <li><a class="dropdown-item" href="delete_employee.html">Delete Employee</a></li>
                            <li><a class="dropdown-item" href="edit_employee.html">Edit Employee</a></li>
                            <li><a class="dropdown-item" href="employees_data.php">Explore Employees</a></li>
                            <li><a class="dropdown-item" href="add_rate.html">Add Rate</a></li>
                            <li><a class="dropdown-item" href="add_sales.html">Add Sales</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Vehicles
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Vehicle/add_vehicle.html">Add Vehicle</a></li>
                            <li><a class="dropdown-item" href="../Vehicle/delete_vehicle.html">Delete Vehicle</a></li>
                            <li><a class="dropdown-item" href="../Vehicle/edit_vehicle.html">Edit Vehicle</a></li>
                            <li><a class="dropdown-item" href="../Vehicle/vehicles_data.php">Explore Vehicles</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Service/add_service.html">Add Service</a></li>
                            <li><a class="dropdown-item" href="../Service/delete_service.html">Delete Service</a></li>
                            <li><a class="dropdown-item" href="../Service/edit_service.html">Edit Service</a></li>
                            <li><a class="dropdown-item" href="../Service/services_data.php">Explore Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Clients
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Client/add_client.html">Add Client</a></li>
                            <li><a class="dropdown-item" href="../Client/delete_client.html">Delete Client</a></li>
                            <li><a class="dropdown-item" href="../Client/edit_client.html">Edit Client</a></li>
                            <li><a class="dropdown-item" href="../Client/clients_data.php">Explore Clients</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Contracts
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Contract/new_contract.html">New Contract</a></li>
                            <li><a class="dropdown-item" href="../Contract/delete_contract.html">Delete Contract</a>
                            </li>
                            <li><a class="dropdown-item" href="../Contract/edit_contract.html">Edit Contract</a></li>
                            <li><a class="dropdown-item" href="../Contract/contracts_data.php">Explore Contracts</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="add_employee container my-5" id="employees">
        <h2>Edit Employee with ID <span class="danger"><?php echo $row['Emp_ID']; ?></span> </h2>
        <form class="row g-3" action="update_employee.php" method="post">
            <input type="hidden" name="emp_id" value="<?php echo $row['Emp_ID']; ?>">
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="<?php echo $row['FirstName']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="<?php echo $row['LastName']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="sex" class="form-label">Sex</label>
                <select id="sex" class="form-select" name="sex" required>
                    <option <?php if ($row['Sex'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option <?php if ($row['Sex'] == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="phone" class="form-control" id="phone_number" name="phone_number"
                    value="<?php echo $row['Phone_Number']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['City']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="<?php echo $row['Street']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="building" class="form-label">Building</label>
                <input type="text" class="form-control" id="building" name="building"
                    value="<?php echo $row['Building']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="apartment" class="form-label">Apartment</label>
                <input type="number" class="form-control" id="apartment" name="apartment"
                    value="<?php echo $row['Apartment']; ?>">
            </div>
            <div class="col-md-6">
                <label for="working_hours" class="form-label">Working Hours</label>
                <select id="working_hours" class="form-select" name="working_hours" required>
                    <option <?php if ($row['Working_Hours'] == 'Full Time') echo 'selected'; ?>>Full Time</option>
                    <option <?php if ($row['Working_Hours'] == 'Part Time') echo 'selected'; ?>>Part Time</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary"
                    value="<?php echo $row['Salary']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="supervises_emp_id" class="form-label">Supervisor ID</label>
                <input type="number" class="form-control" id="supervises_emp_id" name="supervises_emp_id"
                    value="<?php echo $row['Supervises_Emp_ID']; ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Employee</button>
            </div>
        </form>
    </section>

    <!-- JavaScript -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../Assets/bootstrap/js/popper.min.js"></script>
    <script src="../Assets/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.js"></script>
    <script src="../Assets/Js/script.js"></script>
</body>

</html>
<?php
    } else {
        echo "Employee not found.";
    }
} else {
    echo "Invalid request.";
}
?>