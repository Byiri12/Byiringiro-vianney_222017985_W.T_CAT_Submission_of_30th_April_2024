<?php
include('database_connection.php');

// Check if Appointment_Id is set
if(isset($_REQUEST['Appointment_Id'])) {
    $Appoint_Id = $_REQUEST['Appointment_Id'];
    
    // Prepare and execute the DELETE statement
    $gms = $connection->prepare("DELETE FROM appointments WHERE Appointment_Id=?");
    $gms->bind_param("i", $Appointid);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="Appointid" value="<?php echo $Appointid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($gms->execute()) {
        echo "Record deleted successfully.<br><br>
        <a href='Appointment.php'>ok</a>";
    } else {
        echo "Error deleting data: " . $gms->error;
    }
    }
?>
</body>
</html>
<?php

    $gms->close();
} else {
    echo "Appointment_Id is not set.";
}

$connection->close();
?>
