<?php
// Database connection details
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

// Get the search query from the form
$searchQuery = $_GET['search'];

// Build the SQL query
$sql = "SELECT * FROM inventory WHERE item_name LIKE '%$searchQuery%'";

// Execute the query
$result = $conn->query($sql);

// Close connection
$conn->close();
?>


<html>
<head>
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h1>Search Results</h1>
    <p>Search Query: "<?php echo htmlspecialchars($searchQuery); ?>"</p>

    <?php if ($result && $result->num_rows > 0): ?>
        <table border="1">
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
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['item_id']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['item_image']); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>"></td>
                    <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['storage_places']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['exp_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['supplier_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['notes']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No items found matching the search query.</p>
    <?php endif; ?>

    <br>
    <a href="search.html">Back to Search</a><br><br>
    <a href="index.html">Back to Home</a>
</body>
</html>
