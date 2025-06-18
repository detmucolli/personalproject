<?php
session_start();
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: ../../frontend/pages/products.html?msg=Login successful!");
        } else {
            header("Location: ../../frontend/pages/login.html?msg=Invalid credentials.");
        }
    } else {
        header("Location: ../../frontend/pages/login.html?msg=User not found.");
    }
    $stmt->close();
    exit();
}
?>