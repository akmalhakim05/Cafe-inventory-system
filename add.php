<?php
// Sambung ke MySQL
$conn = new mysqli("localhost", "root", "", "mini project web");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$item_name = $_POST['item_name'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$exp_date = $_POST['exp_date'];
$supplier = $_POST['supplier'];
$notes = $_POST['notes'];
$storage = implode(", ", $_POST['storage']); // gabungkan checkbox jadi satu string

// Upload gambar ke folder
$target_dir = "uploads/";
$image_name = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $image_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validasi jenis fail
$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed)) {
    die("Only JPG, JPEG, PNG, and GIF files are allowed.");
}

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // Simpan ke dalam database
    $sql = "INSERT INTO inventory_items (item_name, category, storage_places, quantity, price, exp_date, supplier_type, image_path, notes)
            VALUES ('$item_name', '$category', '$storage', '$quantity', '$price', '$exp_date', '$supplier', '$image_name', '$notes')";

    if ($conn->query($sql) === TRUE) {
        echo "Item berjaya ditambah!<br><a href='add_inventory.html'>Tambah Lagi</a>";
    } else {
        echo "Ralat SQL: " . $conn->error;
    }
} else {
    echo "Ralat semasa muat naik gambar.";
}

$conn->close();
?>
