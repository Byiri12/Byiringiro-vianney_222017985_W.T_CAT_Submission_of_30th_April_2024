<?php
include('database_connection.php');

// Check if Appointment_Id is set
if (isset($_REQUEST['Appointment_Id'])) {
    $Appointment_Id = $_REQUEST['Appointment_Id'];

    $gms = $connection->prepare("SELECT * FROM appointments WHERE Appointment_Id=?");
    $gms->bind_param("i", $Appointment_Id);
    $gms->execute();
    $result = $gms->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Customer_Id'];
        $c = $row['Vehicle_Id'];
        $d = $row['Service_Id'];
        $e = $row['Appointment_Date']; // Corrected field name
        $f = $row['Status'];
    } else {
        echo "Appointment not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Appointment</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Appointment form -->
    <h2><u>Update Form of Appointment</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <!-- Corrected field names and added missing input type -->
        <label for="Customer_Id">Customer id:</label>
        <input type="number" name="Customer_Id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="Vehicle_Id">Vehicle id:</label>
        <input type="number" name="Vehicle_Id" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="Service_Id">Service id:</label>
        <input type="number" name="Service_Id" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="Appointment_Date">Appointment date:</label> <!-- Corrected input name -->
        <input type="date" name="Appointment_Date" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="Status">Status:</label>
        <input type="text" name="Status" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Appointment_Id = $_POST['Appointment_Id'];
    $Customer_Id = $_POST['Customer_Id'];
    $Vehicle_Id = $_POST['Vehicle_Id'];
    $Service_Id = $_POST['Service_Id'];
    $Appointment_date = $_POST['Appointment_Date']; // Corrected field name
    $Status = $_POST['Status'];

    // Update the appointment in the database
    $gms = $connection->prepare("UPDATE appointments SET Customer_Id=?, Vehicle_Id=?, Service_Id=?, Appointment_Date=?, Status=? WHERE Appointment_Id=?");
    $gms->bind_param("iiisii", $Customer_Id, $Vehicle_Id, $Service_Id, $Appointment_date, $Status, $Appointment_Id);
    $gms->execute();

    // Redirect to Appointment.php
    header('Location: Appointment.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
