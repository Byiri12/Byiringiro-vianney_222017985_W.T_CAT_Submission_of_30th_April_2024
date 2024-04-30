<?php
include('database_connection.php');

// Check if Employee_Id is set
if (isset($_REQUEST['Employee_Id'])) {
    $Employee_Id = $_REQUEST['Employee_Id'];

    $gms = $connection->prepare("SELECT * FROM employees WHERE Employee_Id=?");
    $gms->bind_param("i", $Employee_Id);
    $gms->execute();
    $result = $gms->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['First_Name'];
        $c = $row['Last_Name']; // Corrected field name
        $d = $row['Contact_Number'];
        $e = $row['Email'];
        $f = $row['Position']; // Corrected variable name
    } else {
        echo "Employee not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Employee form -->
    <h2><u>Update Form of Employee</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

<html>
<body>
    <form method="POST">
        <!-- Corrected field names and added missing input type -->
        <label for="fname">First Name:</label>
        <input type="text" name="First_Name" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="Lname">Last Name:</label> <!-- Corrected label -->
        <input type="text" name="Last_Name" value="<?php echo isset($c) ? $c : ''; ?>"> <!-- Corrected input name -->
        <br><br>

        <label for="Contnumber">Contact Number:</label> <!-- Corrected label -->
        <input type="number" name="Contact_Number" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="Email">Email:</label>
        <input type="text" name="Email" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="post">Position:</label>
        <input type="text" name="Position" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>
                
        <input type="submit" name="up" value="Update">
        <input type="hidden" name="Employee_Id" value="<?php echo isset($Employee_Id) ? $Employee_Id : ''; ?>"> <!-- Added hidden input field -->
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Employee_Id = $_POST['Employee_Id'];
    $First_Name = $_POST['First_Name']; // Corrected variable name
    $Last_Name = $_POST['Last_Name']; // Corrected variable name
    $Contact_Number = $_POST['Contact_Number']; // Corrected variable name
    $Email = $_POST['Email'];
    $Position = $_POST['Position'];

    // Update the employee in the database
    $gms = $connection->prepare("UPDATE employees SET First_Name=?, Last_Name=?, Contact_Number=?, Email=?, Position=? WHERE Employee_Id=?");
    $gms->bind_param("ssdssi", $First_Name, $Last_Name, $Contact_Number, $Email, $Position, $Employee_Id);
    $gms->execute();

    // Redirect to Employee.php
    header('Location: Employee.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
