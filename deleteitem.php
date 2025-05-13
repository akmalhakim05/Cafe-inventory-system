<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cafe_Inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$item_id = $_POST['item_id'];

// sql to delete a record
$sql = "DELETE FROM inventory WHERE id='$item_id' ";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>