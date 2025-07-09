<?php
require 'db.php';
session_start();

// الحماية: افترض أن admin ID = 1
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM bookings ORDER BY created_at DESC");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لوحة تحكم الإدارة</title>
  <style>
    body { font-family: 'Segoe UI'; background: #f5f7fa; padding: 20px; }
    table { width: 100%; border-collapse: collapse; background: #fff; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; font-size: 0.95em; }
    th { background-color: #3a7ca5; color: white; }
    h2 { text-align: center; color: #3a7ca5; }
  </style>
</head>
<body>

<h2>لوحة تحكم الحجوزات</h2>
<table>
  <tr>
    <th>#</th>
    <th>المقاسات (ط*ع*ا)</th>
    <th>الكمية</th>
    <th>النوع</th>
    <th>شفاف؟</th>
    <th>زينة؟</th>
    <th>قواطع؟</th>
    <th>عدد القواطع</th>
    <th>تاريخ الحجز</th>
  </tr>
  <?php foreach ($bookings as $booking): ?>
  <tr>
    <td><?= $booking['id'] ?></td>
    <td><?= "{$booking['length_cm']} * {$booking['width_cm']} * {$booking['depth_cm']}" ?></td>
    <td><?= $booking['quantity'] ?></td>
    <td><?= $booking['box_type'] ?></td>
    <td><?= $booking['transparent'] ?></td>
    <td><?= $booking['decoration'] ?></td>
    <td><?= $booking['has_dividers'] ?></td>
    <td><?= $booking['divider_count'] ?? '-' ?></td>
    <td><?= $booking['created_at'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>

<p style="text-align:center; margin-top: 20px;">
  <a href="logout.php">تسجيل الخروج</a>
</p>

</body>
</html>