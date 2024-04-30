<?php
include('database_connection.php');

// Check if Customer_Id is set
if (isset($_REQUEST['Customer_Id'])) {
    $Customer_Id = $_REQUEST['Customer_Id'];

    $gms = $connection->prepare("SELECT * FROM customers WHERE Customer_Id=?");
    $gms->bind_param("i", $Customer_Id);
    $gms->execute();
    $result = $gms->get_result();
 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['First_Name'];
        $c = $row['Last_Name']; 
        $d = $row['Contact_Number'];
        $e = $row['Address'];
    } else {
        echo "Customer not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Customer form -->
    <h2><u>Update Form of Customer</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <label for="Fname">First Name:</label>
        <input type="text" name="First_Name" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="Lname">Last Name:</label> 
        <input type="text" name="Last_Name" value="<?php echo isset($c) ? $c : ''; ?>"> 
        <br><br>

        <label for="Contnumber">Contact Number:</label> 
        <input type="text" name="Contact_Number" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

 <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>
                
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Fname = $_POST['First_Name']; 
    $Lname = $_POST['Last_Name']; 
    $Contnumber = $_POST['Contact_Number']; 
    $Addr = $_POST['Address'];
    
    // Update the customer in the database
    $gms = $connection->prepare("UPDATE customers SET First_Name=?, Last_Name=?, Contact_Number=?, Address=? WHERE Customer_Id=?");
    $gms->bind_param("ssssi", $Fname, $Lname, $Contnumber, $Addr, $Customer_Id);
    $gms->execute();

// Redirect to Customer.php
    header('Location: Customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>