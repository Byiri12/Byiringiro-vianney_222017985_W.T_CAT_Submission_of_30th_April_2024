<?php
include('database_connection.php');

// Check if Item_Id is set
if (isset($_REQUEST['item_Id'])) {
  $itid = $_REQUEST['item_Id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $gms = $connection->prepare("SELECT * FROM party_inventory WHERE Item_Id=?");
  $gms->bind_param("i", $itid);
  $gms->execute();
  $result = $gms->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['Item_Id'];
    $y = $row['Item_Name'];
    $z = $row['Description'];
    $w = $row['Item_Type'];
    $v = $row['Cost_Per_Type'];
  } else {
    echo "inventory not found.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update inventory</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
  <center>
    <!-- Update inventory form -->
    <h2><u>Update Form of inventory</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
      <label for="It_id">Item Id:</label>
      <input type="number" name="It_id" value="<?php echo isset($x) ? $x : ''; ?>">
      <br><br>

      <label for="Itname">Item name:</label>
      <input type="text" name="Itname" value="<?php echo isset($y) ? $y : ''; ?>">
      <br><br>

      <label for="Itdecript">Item description:</label>
      <input type="text" name="Itdecript" value="<?php echo isset($z) ? $z : ''; ?>">
      <br><br>

      <label for="Ittype">Item type:</label>
      <input type="text" name="Ittype" value="<?php echo isset($w) ? $w : ''; ?>">
      <br><br>

      <label for="Cosptype">Cost per type:</label>
      <input type="text" name="Cosptype" value="<?php echo isset($v) ? $v : ''; ?>">
      <br><br>
      <input type="submit" name="up" value="Update">
    </form>
  </center>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $Item_Id = $_POST['It_id'];
  $Item_Name = $_POST['Itname'];
  $Description = $_POST['Itdecript'];
  $Item_Type = $_POST['Ittype'];
  $Cost_Per_Type = $_POST['Cosptype'];

  // Update the inventory in the database (prepared statement again for security)
  $gms = $connection->prepare("UPDATE party_inventory SET Item_Name=?, Description=?, Item_Type=?, Cost_Per_Type=? WHERE Item_Id=?");
  $gms->bind_param("ssssi", $Item_Name, $Description, $Item_Type, $Cost_Per_Type, $Item_Id);
  $gms->execute();

  // Redirect to inventory.php
  header('Location: inventory.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
