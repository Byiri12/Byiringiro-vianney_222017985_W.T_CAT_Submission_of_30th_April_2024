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
<body bgcolor="grey"><br>

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
    <h1>Transaction Form</h1>
    <form method="post" onsubmit="return confirmInsert();">

        <label for="Transid">Transaction Id:</label>
        <input type="number" id="Transid" name="Transaction_Id" required><br><br>

        <label for="custid">Customer Id:</label>
        <input type="number" id="custid" name="Customer_Id" required><br><br>

        <label for="Empid">Employee id:</label>
        <input type="number" id="Empid" name="Employee_Id" required><br><br>

        <label for="Servid">Service id:</label>
        <input type="number" id="Servid" name="Service_Id" required><br><br>

        <label for="Transname">Transaction name:</label>
        <input type="text" id="Transname" name="Transaction_Name" required><br><br>

        <label for="Transdate">Transaction date:</label>
        <input type="number/number/number" id="Transdate" name="Transaction_Date" required><br><br>

        <label for="Total">Total amount:</label>
        <input type="text" id="Total" name="Total_Amount" required><br><br>

        <label for="Paymethod">Payment method:</label>
        <input type="text" id="Paymethod" name="Payment_Method" required><br><br>

        <input type="submit" name="insert" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>
    </form>

    <?php
   include('database_connection.php');
    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
        // Insert section
        $gms = $connection->prepare("INSERT INTO transactions(Transaction_Id, Customer_Id, Employee_Id, Service_Id, Transaction_Name, Transaction_Date, Total_Amount, Payment_Method) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $gms->bind_param("iiisssss", $Transid, $Custid, $Empid, $Servid, $Transname, $Transdate, $Totamount, $pmethod);

        // Set parameters from POST and execute
        $Transid = $_POST['Transaction_Id'];
        $Custid = $_POST['Customer_Id'];
        $Empid = $_POST['Employee_Id'];
        $Servid = $_POST['Service_Id'];
        $Transname = $_POST['Transaction_Name'];
        $Transdate = $_POST['Transaction_Date'];
        $Totamount = $_POST['Total_Amount'];
        $pmethod = $_POST['Payment_Method'];

        if ($gms->execute()) {
            echo "New record has been added successfully.<br><br>
                 <a href='Transactions.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $gms->error;
        }

        $gms->close();
    } 
    ?>

    <center><h2>Table of Transactions</h2></center>
    <table>
        <tr>
            <th>Transaction_Id</th>
            <th>Customer_Id</th>
            <th>Employee_Id</th>
            <th>Service_Id</th>
            <th>Transaction_Name</th>
            <th>Transaction_Date</th>
            <th>Total_Amount</th>
            <th>Payment_Method</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        include('database_connection.php');
        // SQL query to fetch data from the transactions table
        $sql = "SELECT * FROM transactions";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Transid = $row["Transaction_Id"];
                echo "<tr>
                    <td>" . $row["Transaction_Id"] . "</td>
                    <td>" . $row["Customer_Id"] . "</td>
                    <td>" . $row["Employee_Id"] . "</td> 
                    <td>" . $row["Service_Id"] . "</td>
                    <td>" . $row["Transaction_Name"] . "</td>
                    <td>" . $row["Transaction_Date"] . "</td>
                    <td>" . $row["Total_Amount"] . "</td>
                    <td>" . $row["Payment_Method"] . "</td>
                    <td><a style='padding:4px' href='delete_Transactions.php?Transaction_Id=$Transid'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Transactions.php?Transaction_Id=$Transid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No data found</td></tr>";
        }
        // Close connection
        $connection->close();
        ?>
    </table>

    <footer>
        <center> 
            <b><h2>UR CBE BIT &copy; 2024 &reg; 222017985, Designer by: BYIRINGIRO VIANNEY</h2></b>
        </center>
    </footer>
</body>
</html>
