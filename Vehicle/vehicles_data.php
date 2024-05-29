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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <i class="bi bi-funnel-fill">Filter</i>
        </button>
        <h2>Vehicles Data</h2>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="card bg-light">
                    <div class="card-body">
                        <form action="filterd_data.php" method="post" class="row g-3">
                            <div class="col-md-12">
                                <label for="vehicle_id" class="form-label">Vehicle ID</label>
                                <input type="number" class="form-control" id="vehicle_id" name="vehicle_id" >
                            </div>
                            <div class="col-md-6">
                                <label for="type" class="form-label">Type</label>
                                <select id="type" class="form-select" name="type" >
                                    <option selected></option>
                                    <option value="Car">Car</option>
                                    <option value="Motorcycle">Motorcycle</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="model" class="form-label">Model</label>
                                <input type="text" class="form-control" id="model" name="model" >
                            </div>
                            <div class="col-md-6">
                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" >
                            </div>
                            <div class="col-md-6">
                                <label for="year" class="form-label">Year</label>
                                <input type="number" class="form-control" id="year" name="year" >
                            </div>
                            <div class="col-md-6">
                                <label for="interior_color" class="form-label">Interior Color</label>
                                <input type="text" class="form-control" id="interior_color" name="interior_color"
                                    >
                            </div>
                            <div class="col-md-6">
                                <label for="exterior_color" class="form-label">Exterior Color</label>
                                <input type="text" class="form-control" id="exterior_color" name="exterior_color"
                                    >
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" >
                            </div>
                            <div class="col-md-6">
                                <label for="emp_id" class="form-label">Employee ID</label>
                                <input type="number" class="form-control" id="emp_id" name="emp_id" >
                            </div>
                            <div class="col-12">
                                <button type="submit" name="save" value="submit" class="btn btn-primary">Add
                                    Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="container-fluid">
            <table class="table table-striped">
                <thead class="thead-dark bg-primary">
                    <th>Vehicle ID</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                    <th>Year</th>
                    <th>Interior Color</th>
                    <th>Exterior Color</th>
                    <th>Price</th>
                    <th>Employee ID</th>
                    <th>Quantity</th>
                    <th>Licence Plate</th>
                    <th>Odometer</th>
                    <th>Condition</th>
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

            // SQL query to fetch vehicle data
            $sql = "SELECT Vehicle_ID, Type, Model, Manufacturer, Year, InteriorColor, ExteriorColor, Price, Emp_ID FROM vehicle";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Vehicle_ID"] . "</td>";
                    echo "<td>" . $row["Type"] . "</td>";
                    echo "<td>" . $row["Model"] . "</td>";
                    echo "<td>" . $row["Manufacturer"] . "</td>";
                    echo "<td>" . $row["Year"] . "</td>";
                    echo "<td>" . $row["InteriorColor"] . "</td>";
                    echo "<td>" . $row["ExteriorColor"] . "</td>";
                    echo "<td>" . $row["Price"] . "</td>";
                    echo "<td>" . $row["Emp_ID"] . "</td>";
            
                    // Check if there are new entries for this vehicle
                    $sql_new = "SELECT Quantity FROM new WHERE Vehicle_ID = " . $row["Vehicle_ID"];
                    $result_new = $conn->query($sql_new);
            
                    if ($result_new->num_rows > 0) {
                        $row_new = $result_new->fetch_assoc();
                        echo "<td>" . $row_new["Quantity"] . "</td>";
            
                        // Determine the condition based on the presence of new entries
                        echo "<td></td>"; // Placeholder for License Plate
                        echo "<td></td>"; // Placeholder for Odometer
                        echo "<td>New</td>";
                    } else {
                        echo "<td></td>"; // Placeholder for Quantity
                        // Check if there are used entries for this vehicle
                        $sql_used = "SELECT License_Plate, Odometer FROM used WHERE Vehicle_ID = " . $row["Vehicle_ID"];
                        $result_used = $conn->query($sql_used);
            
                        if ($result_used->num_rows > 0) {
                            $row_used = $result_used->fetch_assoc();
                            echo "<td>" . $row_used["License_Plate"] . "</td>";
                            echo "<td>" . $row_used["Odometer"] . "</td>";
                        } else {
                            echo "<td></td>"; // Placeholder for License Plate
                            echo "<td></td>"; // Placeholder for Odometer
                        }
            
                        // Determine the condition based on the absence of new entries
                        echo "<td>Used</td>";
                    }
            
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>No Vehicles found</td></tr>";
            }
            
            
            // Close connection
            $conn->close();
            ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../Assets/bootstrap/js/popper.min.js"></script>
    <script src="../Assets/bootstrap/js/jquery-3.7.1.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.js"></script>
    <script src="../Assets/Js/script.js"></script>

    <script>
    document.getElementById('condition').addEventListener('change', function() {
        var condition = this.value;
        var licensePlateInput = document.getElementById('license_plate_input');
        var odometerInput = document.getElementById('odometer_input');
        var quantityInput = document.getElementById('quantity_input');
        var licensePlateField = document.getElementById('license_plate');
        var odometerField = document.getElementById('odometer');
        var quantityField = document.getElementById('quantity');

        if (condition === 'New') {
            licensePlateInput.style.display = 'none';
            odometerInput.style.display = 'none';
            quantityInput.style.display = 'block';
        } else if (condition === 'Used') {
            licensePlateInput.style.display = 'block';
            odometerInput.style.display = 'block';
            quantityInput.style.display = 'none';
        } else {
            licensePlateInput.style.display = 'none';
            odometerInput.style.display = 'none';
            quantityInput.style.display = 'none';
        }
    });
    </script>
</body>

</html>