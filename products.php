<?php
<?php
session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle Add
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $stmt = $conn->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $desc, $price);
    $stmt->execute();
    $stmt->close();
    header("Location: products.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: products.php");
    exit();
}

// Handle Edit
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("ssdi", $name, $desc, $price, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: products.php");
    exit();
}

// Fetch products
$products = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head><title>Products</title></head>
<body>
<h2>Product List</h2>
<a href="logout.php">Logout</a>
<table border="1" cellpadding="5">
<tr><th>Name</th><th>Description</th><th>Price</th><th>Actions</th></tr>
<?php while($row = $products->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['description']) ?></td>
    <td><?= htmlspecialchars($row['price']) ?></td>
    <td>
        <a href="products.php?edit=<?= $row['id'] ?>">Edit</a>
        <a href="products.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<h3>Add Product</h3>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required />
    <input type="text" name="description" placeholder="Description" required />
    <input type="number" step="0.01" name="price" placeholder="Price" required />
    <button type="submit" name="add">Add</button>
</form>

<?php
// Edit form
if (isset($_GET['edit'])):
    $id = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM products WHERE id=$id");
    $prod = $res->fetch_assoc();
?>
<h3>Edit Product</h3>
<form method="POST">
    <input type="hidden" name="id" value="<?= $prod['id'] ?>" />
    <input type="text" name="name" value="<?= htmlspecialchars($prod['name']) ?>" required />
    <input type="text" name="description" value="<?= htmlspecialchars($prod['description']) ?>" required />
    <input type="number" step="0.01" name="price" value="<?= $prod['price'] ?>" required />
    <button type="submit" name="edit">Update</button>
</form>
<?php endif; ?>
</body>
</html>