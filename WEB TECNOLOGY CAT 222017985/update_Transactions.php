<?php
include('database_connection.php');

// Check if Transaction_Id is set
if (isset($_REQUEST['Transaction_Id'])) {
    $Transaction_Id = $_REQUEST['Transaction_Id'];

    $stmt = $connection->prepare("SELECT * FROM transactions WHERE Transaction_Id=?");
    $stmt->bind_param("i", $Transaction_Id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Customer_Id'];
        $c = $row['Employee_Id'];
        $d = $row['Service_Id'];
        $e = $row['Transaction_Name'];
        $f = $row['Transaction_Date'];
        $g = $row['Total_Amount'];
        $h = $row['Payment_Method'];
    } else {
        echo "Transaction not found.";
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
        <label for="Custid">Customer_Id:</label>
        <input type="text" name="Customer_Id" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="Empid">Employee_Id:</label>
        <input type="text" name="Employee_Id" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="Servid">Service_Id:</label>
        <input type="number" name="Service_Id" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>

        <label for="Traname">Transaction_Name:</label>
        <input type="text" name="Transaction_Name" value="<?php echo isset($e) ? $e : ''; ?>">
        <br><br>

        <label for="Transdate">Transaction_Date:</label>
        <input type="text" name="Transaction_Date" value="<?php echo isset($f) ? $f : ''; ?>">
        <br><br>

        <label for="Total">Total_Amount:</label>
        <input type="text" name="Total_Amount" value="<?php echo isset($g) ? $g : ''; ?>">
        <br><br>

        <label for="Paymethod">Payment_Method:</label>
        <input type="text" name="Payment_Method" value="<?php echo isset($h) ? $h : ''; ?>">
        <br><br>
                
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Transaction_Id = $_REQUEST['Transaction_Id'];
    $Customer_Id = $_POST['Customer_Id'];
    $Employee_Id = $_POST['Employee_Id'];
    $Service_Id = $_POST['Service_Id'];
    $Transaction_Name = $_POST['Transaction_Name'];
    $Transaction_Date = $_POST['Transaction_Date'];
    $Total_Amount = $_POST['Total_Amount'];
    $Payment_Method = $_POST['Payment_Method'];

    // Update the transaction in the database
    $stmt = $connection->prepare("UPDATE transactions SET Customer_Id=?, Employee_Id=?, Service_Id=?, Transaction_Name=?, Transaction_Date=?, Total_Amount=?, Payment_Method=? WHERE Transaction_Id=?");
    $stmt->bind_param("ssssssdi", $Customer_Id, $Employee_Id, $Service_Id, $Transaction_Name, $Transaction_Date, $Total_Amount, $Payment_Method, $Transaction_Id);
    $stmt->execute();

    // Redirect to Transactions.php
    header('Location: Transactions.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
