<?php
include('database_connection.php');

// Check if Employee_Id is set
if(isset($_REQUEST['Employee_Id'])) {
    $Employee_Id = $_REQUEST['Employee_Id'];
    
    // Prepare and execute the DELETE statement
    $gms = $connection->prepare("DELETE FROM employees WHERE Employee_Id=?");
    if ($gms) {
        $gms->bind_param("i", $Employee_Id);
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
            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($gms->execute()) {
            echo "Record deleted successfully.";
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
        echo "Error preparing statement: " . $connection->error;
    }
} else {
    echo "Employee_Id is not set.";
}

$connection->close();
?>
