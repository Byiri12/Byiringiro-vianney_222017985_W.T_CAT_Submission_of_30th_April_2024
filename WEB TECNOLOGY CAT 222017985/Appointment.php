<!DOCTYPE html>
<html>
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About the System</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: white;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: green;
    }
    /* Unvisited link */
    a:link {
      color: green; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: white;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */
      padding: 8px;  
    }
    header{
  background-color: #8987;
  padding: 20px;
}
    section{
      padding:32px;
    }
    footer{
  background-color: #8987;
  padding: 20px;
}

  </style>
  <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
</head>
<header>
<body bgcolor="skyblue"><br>

  <form class="d-flex" role="search" action="search.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
      <img src="./image/wolves.jpg" width="90" height="60" alt="Logo">
    </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Appointment.php">APPOINTMENT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Employee.php">EMPLOYEE</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Customer.php">CUSTOMER</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Inventory.php">INVENTORY</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Transactions.php">TRANSACTIONS</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Services.php">SERVICES</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Vehicles.php">VEHICLES</a></li>
  
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: white; background-color: greenyellow; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
  </ul>
</header>

  <section>
    <h1>Appointment Form</h1>
     <form method="post" onsubmit="return confirmInsert();">
        <label for="Appointid">Appointment Id:</label>
        <input type="number" id="Appointid" name="Appointid" required><br><br>

        <label for="Custid">Customer Id:</label>
        <input type="number" id="Custid" name="Custid" required><br><br>

        <label for="Vehid">Vehicle Id:</label>
        <input type="number" id="Vehid" name="Vehid" required><br><br>

        <label for="Servid">Service Id:</label>
        <input type="number" id="Servid" name="Servid" required><br><br>

        <label for="Appointdate">Appointment Date:</label>
        <input type="date" id="Appointdate" name="Appointdate" required><br><br>

        <label for="Status">Status:</label>
        <input type="text" id="Status" name="Status" required><br><br>

        <input type="submit" name="insert" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>
    </form>

    <?php
    include('database_connection.php');

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $gms = $connection->prepare("INSERT INTO appointments(Appointment_Id, Customer_Id, Vehicle_Id, Service_Id, Appointment_Date, Status) VALUES (?, ?, ?, ?, ?, ?)");
        $gms->bind_param("iiisss", $Appointid, $Custid, $Vehid, $Servid, $Appointdate, $Status);

        // Set parameters from POST and execute
        $Appointid = $_POST['Appointid'];
        $Custid = $_POST['Custid'];
        $Vehid = $_POST['Vehid'];
        $Servid = $_POST['Servid'];
        $Appointdate = $_POST['Appointdate'];
        $Status = $_POST['Status'];

        if ($gms->execute()) {
            echo "New record has been added successfully.<br><br>
                 <a href='Appointment.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $gms->error;
        }

        $gms->close();
    } 
    ?>

    <center><h2>Table of Appointment</h2></center>
    <table>
        <tr>
            <th>Appointment_Id</th>
            <th>Customer_Id</th>
            <th>Vehicle_Id</th>
            <th>Service_Id</th>
            <th>Appointment_Date</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        // SQL query to fetch data from the Appointment table
        $sql = "SELECT * FROM appointments";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Appointid = $row["Appointment_Id"]; // Added this line to fetch Appointment_Id
                echo "<tr>
                    <td>" . $row["Appointment_Id"] . "</td>
                    <td>" . $row["Customer_Id"] . "</td>
                    <td>" . $row["Vehicle_Id"] . "</td> 
                    <td>" . $row["Service_Id"] . "</td>
                    <td>" . $row["Appointment_Date"] . "</td>
                    <td>" . $row["Status"] . "</td>
                    <td><a style='padding:4px' href='delete_Appointment.php?Appointment_Id=$Appointid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Appointment.php?Appointment_Id=$Appointid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        // Close connection
        $connection->close();
        ?>
    </table>
  </section>

    <footer>
        <center> 
            <b><h2>UR CBE BIT &copy; 2024 &reg; 222017985, Designed by: BYIRINGIRO VIANNEY</h2></b>
        </center>
    </footer>
</body>
</html>
