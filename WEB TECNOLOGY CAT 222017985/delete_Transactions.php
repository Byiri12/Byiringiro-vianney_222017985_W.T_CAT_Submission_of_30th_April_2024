<?php
include('database_connection.php');

// Check if Transaction_Id is set
if(isset($_REQUEST['Transaction_Id'])) {
    $Transaction_Id = $_REQUEST['Transaction_Id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM transactions WHERE Transaction_Id=?");
    $stmt->bind_param("i", $Transaction_Id);
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
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>
        <a href='Transactions.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
    }
?>
</body>
</html>
<?php


    $stmt->close();
} else {
    echo "Transaction_Id is not set.";
}

$connection->close();
?>
