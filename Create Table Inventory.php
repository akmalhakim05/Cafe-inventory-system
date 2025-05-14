<?php

// Database Connection & Create table name
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

// sql to create table
$sql = "CREATE TABLE inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    storage_places SET('Refrigerators', 'Freezers', 'Dry Storage', 'Warehouses'),
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    exp_date DATE NOT NULL,
    supplier_type ENUM('Local Supplier', 'Imported Supplier') NOT NULL,
    image_path VARCHAR(255),
    notes TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table inventory created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

