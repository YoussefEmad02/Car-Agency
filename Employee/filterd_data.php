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
                            <li><a class="dropdown-item" href="delete_employee.html">Delete Employee</a>
                            </li>
                            <li><a class="dropdown-item" href="edit_employee.html">Edit Employee</a></li>
                            <li><a class="dropdown-item" href="employees_data.php">Explore Employees</a>
                            </li>
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid m-1">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <i class="bi bi-funnel-fill">Filter</i>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="employees_data.php" method="post" class="row g-3">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">Remove Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <h2>Employee Data</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Street</th>
                    <th>Building</th>
                    <th>Apartment</th>
                    <th>Working Hours</th>
                    <th>Salary</th>
                    <th>Supervises Emp ID</th>
                </tr>
            </thead>
            <tbody>
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
            
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve form data
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
                
                    // Construct SQL query based on provided parameters
                    $sql = "SELECT * FROM employee WHERE 1=1";
                
                    if (!empty($emp_id)) {
                        $sql .= " AND Emp_ID = $emp_id";
                    }
                    if (!empty($first_name)) {
                        $sql .= " AND FirstName = '$first_name'";
                    }
                    if (!empty($last_name)) {
                        $sql .= " AND LastName = '$last_name'";
                    }
                    if (!empty($sex)) {
                        $sql .= " AND Sex = '$sex'";
                    }
                    if (!empty($phone_number)) {
                        $sql .= " AND Phone_Number = $phone_number";
                    }
                    if (!empty($email)) {
                        $sql .= " AND Email = '$email'";
                    }
                    if (!empty($city)) {
                        $sql .= " AND City = '$city'";
                    }
                    if (!empty($street)) {
                        $sql .= " AND Street = '$street'";
                    }
                    if (!empty($building)) {
                        $sql .= " AND Building = '$building'";
                    }
                    if (!empty($apartment)) {
                        $sql .= " AND Apartment = $apartment";
                    }
                    if (!empty($working_hours)) {
                        $sql .= " AND Working_Hours = '$working_hours'";
                    }
                    if (!empty($salary)) {
                        $sql .= " AND Salary = $salary";
                    }
                    if (!empty($supervisor_id)) {
                        $sql .= " AND Supervises_Emp_ID = $supervisor_id";
                    }

                
                    // Execute the query
                    $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Emp_ID"] . "</td>";
                        echo "<td>" . $row["FirstName"] . "</td>";
                        echo "<td>" . $row["LastName"] . "</td>";
                        echo "<td>" . $row["Sex"] . "</td>";
                        echo "<td>" . $row["Phone_Number"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["City"] . "</td>";
                        echo "<td>" . $row["Street"] . "</td>";
                        echo "<td>" . $row["Building"] . "</td>";
                        echo "<td>" . $row["Apartment"] . "</td>";
                        echo "<td>" . $row["Working_Hours"] . "</td>";
                        echo "<td>" . $row["Salary"] . "</td>";
                        echo "<td>" . $row["Supervises_Emp_ID"] . "</td>";    
                        echo "</tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='6'>No Contracts found</td></tr>";
            }
            // Close database connection
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>


    <!-- JavaScript -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../Assets/bootstrap/js/popper.min.js"></script>
    <script src="../Assets/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.js"></script>
    <script src="../Assets/Js/script.js"></script>
</body>

</html>