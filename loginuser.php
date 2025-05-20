<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Cafe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$username = $_POST['username'];
$password = $_POST['password'];

// Check user credentials
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login successful! Welcome, " . htmlspecialchars($username) . "!";
    // You can redirect to a protected page using: header("Location: index.html");
} else {
    echo "Invalid username or password. Please try again.";
    echo "<br><a href='login.html'>Go back to login</a>";
}

$conn->close();
?>
