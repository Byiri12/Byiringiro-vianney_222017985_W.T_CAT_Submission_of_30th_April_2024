<?php
include('database_connection.php');

// Check if Service_Id is set
if(isset($_REQUEST['Service_Id'])) {
    $Servid = $_REQUEST['Service_Id'];
    
    // Prepare and execute the DELETE statement
    $gms = $connection->prepare("DELETE FROM services WHERE Service_Id=?");
    $gms->bind_param("i", $Servid);

    // Execute the DELETE statement
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($gms->execute()) {
            echo "Record deleted successfully.<br><br>
            <a href='Services.php'>OK</a>";
        } else {
            echo "Error deleting data: " . $gms->error;
        }
        $gms->close();
        exit(); // Ensure no other content is sent after redirection
    }
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
        <input type="hidden" name="Service_Id" value="<?php echo $Servid; ?>">
        <input type="submit" value="Delete">
    </form>
</body>
</html>

<?php
} else {
    echo "Service_Id is not set.";
}

$connection->close();
?>
