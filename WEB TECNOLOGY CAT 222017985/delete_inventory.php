<?php
include('database_connection.php');

// Check if Inventory_Id is set
if(isset($_REQUEST['Item_Id'])) {
    // Sanitize input to prevent SQL injection
    $Item_Id = intval($_REQUEST['Item_Id']);

    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM party_inventory WHERE Item_Id = ?");
    $stmt->bind_param("i", $Item_Id);
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
        <a href='inventory.php'>Return to Inventory</a>";
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
    echo "Inventory_Id is not set.";
}

$connection->close();
?>
