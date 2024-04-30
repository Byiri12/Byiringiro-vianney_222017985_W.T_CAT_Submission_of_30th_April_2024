<?php
include('database_connection.php');

if(isset($_GET['query'])) {
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Perform the search query
    $sql = "SELECT * FROM appointments WHERE Customer_Id LIKE '%$searchTerm%'";
    $result_appoint = $connection->query($sql);

    // Search in the customer table
    $sql = "SELECT * FROM customers WHERE First_Name LIKE '%$searchTerm%'";
    $result_customer = $connection->query($sql);

    // Search in the Employees table
    $sql = "SELECT * FROM employees WHERE First_Name LIKE '%$searchTerm%'";
    $result_Employee = $connection->query($sql);

    // Search in the party_inventory table
    $sql = "SELECT * FROM party_inventory WHERE Item_Name LIKE '%$searchTerm%'";
    $result_Inventory = $connection->query($sql);

    // Search in the Services table
    $sql = "SELECT * FROM services WHERE Service_Name LIKE '%$searchTerm%'";
    $result_Service = $connection->query($sql);

    // Search in the transactions table
    $sql = "SELECT * FROM transactions WHERE Transaction_Name LIKE '%$searchTerm%'";
    $result_transaction = $connection->query($sql);

    // Search in the vehicles table
    $sql = "SELECT * FROM vehicles WHERE Vehicle_Identification_Number LIKE '%$searchTerm%'";
    $result_Vehicle = $connection->query($sql);

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";
    echo "<h3>Appointments:</h3>";
    if ($result_appoint->num_rows > 0) {
        while ($row = $result_appoint->fetch_assoc()) {
            echo "<p>" . $row['Appointment_Id'] . "</p>";
        }
    } else {
        echo "<p>No appointments found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Customers:</h3>";
    if ($result_customer->num_rows > 0) {
        while ($row = $result_customer->fetch_assoc()) {
            echo "<p>" . $row['First_Name'] . "</p>";
        }
    } else {
        echo "<p>No customer found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Employees:</h3>";
    if ($result_Employee->num_rows > 0) {
        while ($row = $result_Employee->fetch_assoc()) {
            echo "<p>" . $row['First_Name'] . "</p>";
        }
    } else {
        echo "<p>No employees found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Party Inventory:</h3>";
    if ($result_Inventory->num_rows > 0) {
        while ($row = $result_Inventory->fetch_assoc()) {
            echo "<p>" . $row['Item_Name'] . "</p>";
        }
    } else {
        echo "<p>No party inventory found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Services:</h3>";
    if ($result_Service->num_rows > 0) {
        while ($row = $result_Service->fetch_assoc()) {
            echo "<p>" . $row['Service_Name'] . "</p>";
        }
    } else {
        echo "<p>No services found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Vehicles:</h3>";
    if ($result_Vehicle->num_rows > 0) {
        while ($row = $result_Vehicle->fetch_assoc()) {
            echo "<p>" . $row['Vehicle_Identification_Number'] . "</p>";
        }
    } else {
        echo "<p>No vehicles found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Transactions:</h3>";
    if ($result_transaction->num_rows > 0) {
        while ($row = $result_transaction->fetch_assoc()) {
            echo "<p>" . $row['Transaction_Name'] . "</p>";
        }
    } else {
        echo "<p>No transactions found matching the search term: " . $searchTerm . "</p>";
    }

    $connection->close();
} else {
    echo "No search term was provided.";
}
?>
