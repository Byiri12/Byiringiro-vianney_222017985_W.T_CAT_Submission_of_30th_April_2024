<?php
include('database_connection.php');

// Check if Vehicle_Id is set
if (isset($_REQUEST['Vehicle_Id'])) {
    $Vehicle_Id = $_REQUEST['Vehicle_Id'];

    $stmt = $connection->prepare("SELECT * FROM vehicles WHERE Vehicle_Id=?");
    $stmt->bind_param("i", $Vehicle_Id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Customer_Id'];
        $c = $row['Make'];
        $d = $row['Model'];
        $e = $row['Licence_Plate'];
        $f = $row['Vehicle_Identification_Number'];
    } else {
        echo "Vehicle not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update products</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of products</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
<html>
<body>
    <form method="POST">
        <!-- Corrected field names and added missing input type -->
        <label for="Custid">Customer_Id:</label>
        <input type="number" name="Customer_Id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="Make">Make:</label>
        <input type="text" name="Make" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="Model">Model:</label>
        <input type="text" name="Model" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="Lplate">License Plate:</label>
        <input type="text" name="License_Plate" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="Vehidnumber">Vehicle Identification Number:</label>
        <input type="text" name="Vehicle_Identification_Number" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>
                
        <input type="submit" name="up" value="Update">
       
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Customer_Id = $_POST['Customer_Id'];
    $Make = $_POST['Make'];
    $Model = $_POST['Model'];
    $License_Plate = $_POST['License_Plate'];
    $Vehicle_Identification_Number = $_POST['Vehicle_Identification_Number'];

    // Update the vehicle in the database
    $stmt = $connection->prepare("UPDATE vehicles SET Customer_Id=?, Make=?, Model=?, Licence_Plate=?, Vehicle_Identification_Number=? WHERE Vehicle_Id=?");
    $stmt->bind_param("issssi", $Customer_Id, $Make, $Model, $License_Plate, $Vehicle_Identification_Number, $Vehicle_Id);
    $stmt->execute();

    // Redirect to Vehicles.php
    header('Location: Vehicles.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
