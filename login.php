<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: thank_you.html");
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
  <title>تسجيل الدخول</title>
</head>
<body>
  <h2>تسجيل الدخول</h2>
  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST" action="login.php">
    <label>البريد الإلكتروني:</label>
    <input type="email" name="email" required><br>
    <label>كلمة المرور:</label>
    <input type="password" name="password" required><br>
    <button type="submit">دخول</button>
  </form>
  <p>ليس لديك حساب؟ <a href="register.php">سجل هنا</a></p>
</body>
</html>