<?php
require_once('config/db.php');

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email=? OR username=?");
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $username);
    $stmt->execute();
    if ($stmt->fetch()) {
        $msg = "Email or username already exists";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        if ($stmt->execute()) {
            header("Location: login.php?msg=Signup successful! Please login.");
            exit();
        } else {
            $msg = "Signup failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Signup</title></head>
<body>
<h2>Signup</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required /><br>
    <input type="email" name="email" placeholder="Email" required /><br>
    <input type="password" name="password" placeholder="Password" required /><br>
    <button type="submit">Signup</button>
</form>
<div style="color:red;"><?= htmlspecialchars($msg) ?></div>
<a href="login.php">Already have an account? Login</a>
</body>
</html>