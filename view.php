<?php
// Database connection parameters
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

// Query to get all inventory items
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

$conn->close();
?>


<html>
<head>
    <title>View Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            border-radius: 5px;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c0392b;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Inventory List</h1>  

<table>
    <tr>
        <th>Item ID</th>
        <th>Item Image</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Storage Places</th>
        <th>Quantity</th>
        <th>Price (RM)</th>
        <th>EXP Date</th>
        <th>Supplier Type</th>
        <th>Notes</th>
    </tr>

   <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td><img src='uploads/{$row['image_path']}' alt='{$row['item_name']}'></td>
                        <td>{$row['item_name']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['storage_places']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['exp_date']}</td>
                        <td>{$row['supplier_type']}</td>
                        <td>{$row['notes']}</td>
                        <td>{$row['username']}</td>
                      </tr>";
            }
        } else 
            echo "<tr><td colspan='11'>No items found.</td></tr>";
            ?> 
</table>

<a href="index.html">Back to Home</a>

</body>
</html>