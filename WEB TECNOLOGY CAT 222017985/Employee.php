<!D<!DOCTYPE html>
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
  background-color: #4567;
  padding: 20px;
}
    section{
      padding:32px;
    }
    footer{
  background-color: #4567;
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

</head>
<header>
<body bgcolor="yellow"><br>

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
    <h1>Employee Form</h1>
     <form method="post" onsubmit="return confirmInsert();">
      <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="Empid">Employee Id:</label>
        <input type="number" id="Empid" name="Empid" required><br><br>

        <label for="Empfname">Employee First Name:</label>
        <input type="text" id="Empfname" name="Empfname" required><br><br>

        <label for="Emplname">Employee Last Name:</label>
        <input type="text" id="Emplname" name="Emplname" required><br><br>

        <label for="Empcontnumber">Employee Contact Number:</label>
        <input type="text" id="Empcontnumber" name="Empcontnumber" required><br><br>

        <label for="Email">Employee Email:</label>
        <input type="email" id="Email" name="Email" required><br><br>

        <label for="Position">Employee Position:</label>
        <input type="text" id="Position" name="Position" required><br><br>

        <input type="submit" name="insert" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>

    </form>

    <?php
    include('database_connection.php');

    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $gms = $connection->prepare("INSERT INTO employees(Employee_Id, First_Name, Last_Name, Contact_Number, Email, Position) VALUES (?, ?, ?, ?, ?, ?)");
        $gms->bind_param("isssss", $Empid, $Fname, $Lname, $Contnumber, $Email, $Pos);

        // Set parameters from POST and execute
        $Empid = $_POST['Empid'];
        $Fname = $_POST['Empfname'];
        $Lname = $_POST['Emplname'];
        $Contnumber = $_POST['Empcontnumber'];
        $Email = $_POST['Email'];
        $Pos = $_POST['Position'];

        if ($gms->execute()) {
            echo "New record has been added successfully.<br><br>
                 <a href='Employee.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $gms->error;
        }

        $gms->close();
    } 
    ?>

    <center><h2>Table of Employee</h2></center>
    <table>
        <tr>
            <th>Employee_Id</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Contact_Number</th>
            <th>Email</th>
            <th>Position</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        include('database_connection.php');
        // SQL query to fetch data from the Employee table
        $sql = "SELECT * FROM employees";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Empid = $row["Employee_Id"];
                echo "<tr>
                    <td>" . $row["Employee_Id"] . "</td>
                    <td>" . $row["First_Name"] . "</td>
                    <td>" . $row["Last_Name"] . "</td> 
                    <td>" . $row["Contact_Number"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Position"] . "</td>
                    <td><a style='padding:4px' href='delete_Employee.php?Employee_Id=$Empid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Employee.php?Employee_Id=$Empid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        // Close connection
        $connection->close();
        ?>
    </table>

    <footer>
        <marquee> 
            <b><h2>UR CBE BIT &copy; 2024 &reg; 222017985, Designed by: BYIRINGIRO VIANNEY</h2></b>
        </marquee>
    </footer>
</body>
</html>
