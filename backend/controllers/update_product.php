<?php
<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id          = $_POST['id'];
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $image       = $_POST['image'];

    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, image=? WHERE id=?");
    $stmt->bind_param("ssdsi", $name, $description, $price, $image, $id);
    if ($stmt->execute()) {
        echo "Product updated!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>