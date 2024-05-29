<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $vehicle_id = $_POST['vehicle_id'];

    // Search for the vehicle in the database
    $sql = "SELECT * FROM vehicle WHERE Vehicle_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vehicle_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Vehicle found, display form to edit its information
        $row = $result->fetch_assoc();

        // Initialize variables
        $row_used = array('License_Plate' => '', 'Odometer' => '');
        $row_new = array('Quantity' => '');

        // Check if there are new entries for this vehicle
        $sql_new = "SELECT Quantity FROM new WHERE Vehicle_ID = ?";
        $stmt_new = $conn->prepare($sql_new);
        $stmt_new->bind_param("i", $vehicle_id);
        $stmt_new->execute();
        $result_new = $stmt_new->get_result();

        if ($result_new->num_rows > 0) {
            $row_new = $result_new->fetch_assoc();
        }

        // Check if there are used entries for this vehicle
        $sql_used = "SELECT License_Plate, Odometer FROM used WHERE Vehicle_ID = ?";
        $stmt_used = $conn->prepare($sql_used);
        $stmt_used->bind_param("i", $vehicle_id);
        $stmt_used->execute();
        $result_used = $stmt_used->get_result();

        if ($result_used->num_rows > 0) {
            $row_used = $result_used->fetch_assoc();
        }


    
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
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Vehicles
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="add_vehicle.html">Add Vehicle</a></li>
                            <li><a class="dropdown-item" href="delete_vehicle.html">Delete Vehicle</a></li>
                            <li><a class="dropdown-item" href="edit_vehicle.html">Edit Vehicle</a></li>
                            <li><a class="dropdown-item" href="vehicles_data.php">Explore Vehicles</a></li>
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
    <section class="edit_vehicle container my-5">
        <h2>Edit Vehicle with ID <?php echo $row['Vehicle_ID']; ?></h2>
        <form class="row g-3" action="update_vehicle.php" method="post">
            <input type="hidden" name="vehicle_id" value="<?php echo $row['Vehicle_ID']; ?>">
            <div class="col-md-6">
                <label for="type" class="form-label">Type</label>
                <select id="type" class="form-select" name="type" required>
                    <option value="Car" <?php if ($row['Type'] == 'Car') echo 'selected'; ?>>Car</option>
                    <option value="Motorcycle" <?php if ($row['Type'] == 'Motorcycle') echo 'selected'; ?>>Motorcycle
                    </option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="condition" class="form-label">Condition</label>
                <select id="condition" class="form-select" name="condition" required>
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                </select>
            </div>
            <div id="license_plate_input" style="display: none;" class="col-md-6">
                <label for="license_plate" class="form-label">License Plate</label>
                <input type="text" class="form-control" id="license_plate" name="license_plate"
                    value="<?php echo $row_used['License_Plate']; ?>" required>
            </div>
            <div id="odometer_input" style="display: none;" class="col-md-6">
                <label for="odometer" class="form-label">Odometer</label>
                <input type="number" class="form-control" id="odometer" name="odometer"
                    value="<?php echo $row_used['Odometer']; ?>" required>
            </div>
            <div id="quantity_input" style="display: none;" class="col-md-6">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity"
                    value="<?php echo $row_new['Quantity']; ?>" required>
            </div>


            <div class="col-md-6">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="<?php echo $row['Model']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="manufacturer" class="form-label">Manufacturer</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                    value="<?php echo $row['Manufacturer']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="<?php echo $row['Year']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="interior_color" class="form-label">Interior Color</label>
                <input type="text" class="form-control" id="interior_color" name="interior_color"
                    value="<?php echo $row['InteriorColor']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="exterior_color" class="form-label">Exterior Color</label>
                <input type="text" class="form-control" id="exterior_color" name="exterior_color"
                    value="<?php echo $row['ExteriorColor']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['Price']; ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label for="emp_id" class="form-label">Employee ID</label>
                <input type="number" class="form-control" id="emp_id" name="emp_id"
                    value="<?php echo $row['Emp_ID']; ?>" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update Vehicle</button>
            </div>
        </form>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var licensePlateInput = document.getElementById('license_plate_input');
        var odometerInput = document.getElementById('odometer_input');
        var quantityInput = document.getElementById('quantity_input');
        var conditionSelect = document.getElementById('condition');
        var licensePlateField = document.getElementById('license_plate');
        var odometerField = document.getElementById('odometer');
        var quantityField = document.getElementById('quantity');

        // Function to show or hide inputs based on condition selection
        function toggleInputs(condition) {
            if (condition === 'New') {
                licensePlateInput.style.visibility = 'hidden';
                licensePlateInput.style.display = 'none';
                odometerInput.style.visibility = 'hidden';
                odometerInput.style.display = 'none';
                quantityInput.style.visibility = 'visible';
                quantityInput.style.display = 'block';
                licensePlateField.removeAttribute('required');
                odometerField.removeAttribute('required');
                quantityField.setAttribute('required', 'required');
            } else if (condition === 'Used') {
                licensePlateInput.style.visibility = 'visible';
                licensePlateInput.style.display = 'block';
                odometerInput.style.visibility = 'visible';
                odometerInput.style.display = 'block';
                quantityInput.style.visibility = 'hidden';
                quantityInput.style.display = 'none';
                licensePlateField.setAttribute('required', 'required');
                odometerField.setAttribute('required', 'required');
                quantityField.removeAttribute('required');
            } else {
                licensePlateInput.style.visibility = 'hidden';
                licensePlateInput.style.display = 'none';
                odometerInput.style.visibility = 'hidden';
                odometerInput.style.display = 'none';
                quantityInput.style.visibility = 'hidden';
                quantityInput.style.display = 'none';
                licensePlateField.removeAttribute('required');
                odometerField.removeAttribute('required');
                quantityField.removeAttribute('required');
            }
        }


        // Event listener for condition select
        conditionSelect.addEventListener('change', function() {
            toggleInputs(this.value);
        });

        // Check initial values of odometer and quantity
        var odometerValue = document.getElementById('odometer').value;
        var licensePlateValue = document.getElementById('license_plate').value;
        var quantityValue = document.getElementById('quantity').value;

        // Set initial condition based on values
        if (odometerValue !== '' || licensePlateValue !== '') {
            conditionSelect.value = 'Used';
            toggleInputs('Used');
        } else if (quantityValue !== '') {
            conditionSelect.value = 'New';
            toggleInputs('New');
        }
    });
    </script>



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
        echo "Vehicle not found.";
    }
} else {
    echo "Invalid request.";
}
?>