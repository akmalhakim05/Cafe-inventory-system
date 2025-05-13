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
$user = $_POST['username'];
$password = $_POST['password'];

// Insert data
$sql = "INSERT INTO users (username, password)
        VALUES ('$user', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully!";
    echo "Login to your account <a href='login.html'>here</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>