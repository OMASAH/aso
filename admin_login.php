<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ? AND id = 1"); // فقط المسؤول
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "بيانات الدخول غير صحيحة.";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>دخول الإدارة</title>
</head>
<body>
  <h2>دخول الإدارة</h2>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST">
    <label>البريد الإلكتروني:</label>
    <input type="email" name="email" required><br>
    <label>كلمة المرور:</label>
    <input type="password" name="password" required><br>
    <button type="submit">دخول</button>
  </form>
</body>
</html>
