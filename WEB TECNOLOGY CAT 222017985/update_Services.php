<?php
include('database_connection.php');

// Check if Service_Id is set
if (isset($_REQUEST['Service_Id'])) {
    $Service_Id = $_REQUEST['Service_Id'];

    $gms = $connection->prepare("SELECT * FROM services WHERE Service_Id=?");
    $gms->bind_param("i", $Service_Id);
    $gms->execute();
    $result = $gms->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $b = $row['Service_Name'];
        $c = $row['Description'];
        $d = $row['Cost'];
    } else {
        echo "Service not found.";
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

        <label for="Servicename">Service Name:</label>
        <input type="text" name="Service_Name" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>

        <label for="Servicedescription">Service Description:</label>
        <!-- Corrected input name -->
        <input type="text" name="Description" value="<?php echo isset($c) ? $c : ''; ?>">
        <br><br>

        <label for="Cost">Cost:</label>
        <input type="number" name="Cost" value="<?php echo isset($d) ? $d : ''; ?>">
        <br><br>
                
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
include('database_connection.php');
if (isset($_POST['up'])) {
    // Retrieve updated values from the form
    $Service_Id = $_REQUEST['Service_Id'];
    $Service_Name = $_POST['Service_Name'];
    $Description = $_POST['Description'];
    $Cost = $_POST['Cost'];

    // Update the service in the database
    $gms = $connection->prepare("UPDATE services SET Service_Name=?, Description=?, Cost=? WHERE Service_Id=?");
    $gms->bind_param("ssdi", $Service_Name, $Description, $Cost, $Service_Id);
    $gms->execute();

    // Redirect to Services.php
    header('Location: Services.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
