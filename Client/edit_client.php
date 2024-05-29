<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $client_id = $_POST['client_id'];

    // Search for the client in the database
    // Assuming $conn is your database connection
    $sql = "SELECT * FROM client WHERE Client_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Client found, display form to edit their information
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
                            <li><a class="dropdown-item" href="../Employee/add_employee.html">Add Employee</a></li>
                            <li><a class="dropdown-item" href="../Employee/delete_employee.html">Delete Employee</a>
                            </li>
                            <li><a class="dropdown-item" href="../Employee/edit_employee.html">Edit Employee</a></li>
                            <li><a class="dropdown-item" href="../Employee/employees_data.php">Explore Employees</a>
                            <li><a class="dropdown-item" href="../Employee/add_rate.html">Add Rate</a></li>
                            <li><a class="dropdown-item" href="../Employee/add_sales.html">Add Sales</a></li>
                    </li>
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
                        <li><a class="dropdown-item" href="add_client.html">Add Client</a></li>
                        <li><a class="dropdown-item" href="delete_client.html">Delete Client</a></li>
                        <li><a class="dropdown-item" href="edit_client.html">Edit Client</a></li>
                        <li><a class="dropdown-item" href="clients_data.php">Explore Clients</a></li>
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
    <div class="container">
        <h2>Edit Client with ID <span class="text-danger"><?php echo $row['Client_ID']; ?></span></h2>
        <form action="update_client.php" method="post">
            <input type="hidden" name="client_id" value="<?php echo $row['Client_ID']; ?>">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $row['FirstName']; ?>" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $row['LastName']; ?>" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" name="phone_number" value="<?php echo $row['Phone_Number']; ?>" class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="<?php echo $row['Email']; ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
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
<?php
    } else {
        echo "Client not found.";
    }
} else {
    echo "Invalid request.";
}
?>