<? php

// Database Connection & Create database name
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli ($servername, $username, $password) ;

// Check connection
if ($conn->connect error) {
    die ("Connection failed: " . $conn->connect_error) ;
}

// Create database
$sql = "CREATE DATABASE Cafe_Inventory";
if ($conn->query ($sq1) === TRUE) {
echo "Database created successfully";
} else {
echo "Error creating database: " . $conn->error;
}

$conn->close () ;
?>