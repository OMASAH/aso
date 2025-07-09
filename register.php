<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $password]);

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل حساب</title>
</head>
<body>
  <h2>تسجيل حساب جديد</h2>
  <form method="POST" action="register.php">
    <label>الاسم الكامل:</label>
    <input type="text" name="name" required><br>
    <label>البريد الإلكتروني:</label>
    <input type="email" name="email" required><br>
    <label>كلمة المرور:</label>
    <input type="password" name="password" required><br>
    <button type="submit">تسجيل</button>
  </form>
  <p>هل لديك حساب؟ <a href="login.php">سجل الدخول</a></p>
</body>
</html>