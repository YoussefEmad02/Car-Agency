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
        <h2>Client Data</h2>

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
                            <div class="col-md-6">
                                <label for="client_id" class="form-label">Client ID</label>
                                <input type="number" class="form-control" id="client_id" name="client_id">
                            </div>
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="phone" class="form-control" id="phone_number" name="phone_number">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="contract_number" class="form-label">Contract Number</label>
                                <input type="number" class="form-control" id="contract_number" name="contract_number">
                            </div> -->
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Client ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Contract Number(s)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            // Include the PHP script that fetches data from the database
            include 'fetch_clients.php';

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Client_ID"] . "</td>";
                    echo "<td>" . $row["FirstName"] . "</td>";
                    echo "<td>" . $row["LastName"] . "</td>";
                    echo "<td>" . $row["Phone_Number"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    // Fetch all contract numbers for this client
                    $clientID = $row["Client_ID"];
                    $sql_new = "SELECT Contract_Number FROM contract WHERE Client_ID = '$clientID'";
                    $result_new = $conn->query($sql_new);
                    if ($result_new->num_rows > 0) {
                        // Initialize an empty string to store contract numbers
                        $contractNumbers = "";
                        // Concatenate all contract numbers into a single string
                        while ($row_new = $result_new->fetch_assoc()) {
                            $contractNumbers .= $row_new["Contract_Number"] . ", ";
                        }
                        // Remove the trailing comma and space
                        $contractNumbers = rtrim($contractNumbers, ", ");
                        // Display the contract numbers in the table cell
                        echo "<td>" . $contractNumbers . "</td>";
                    } else {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No clients found</td></tr>";
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
</body>

</html>