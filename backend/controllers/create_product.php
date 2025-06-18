<?php
<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $image       = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image);
    if ($stmt->execute()) {
        echo "Product created!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>