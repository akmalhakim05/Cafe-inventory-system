<?php

// Database Connection & Create database name
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli ($servername, $username, $password) ;

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error) ;
}

// Create database
$sql = "CREATE DATABASE Cafe_db";
if ($conn->query ($sql) === TRUE) {
echo "Database created successfully";
echo "<a href='create_table_users.php'>Create User Table</a><br>";
} else {
echo "Error creating database: " . $conn->error;
}

$conn->close () ;
?>