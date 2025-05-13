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
$id = $_POST['item_id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Corrected SQL statement with comma between quantity and price
$sql = "UPDATE inventory SET quantity='$quantity', price='$price' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>